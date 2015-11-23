<?php
session_start();
include('classes.php');
$groupid = $_GET["id"];
$currentGroup = new group($groupid);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/GroupHome.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../bootstrap/bootstrap-theme.min.css">
    <title></title>
</head>
<body>
<div id="container">
    <header id="header">
        <a href="index.php">
            <img id="logo" src="../imgs/logo.png" alt="logo"/></a>

        <div id="headerButtons">
            <?php
            echo "<a href='templatetrainerhomepage.php'>";
            $user = $_SESSION['username'];
            echo $user;
            echo "</a>";
            ?>
            <a href="logout.php">
                <input type="button" value="Log out" class="headerButtons"/></a>
        </div>
    </header>
    <div id="body">
        <div id="tabs">
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" class="tabtext " data-toggle="tab">Meetings</a></li>
                    <li><a class="tabtext " href="#tab2" data-toggle="tab">Questions</a></li>
                    <li><a class="tabtext " href="#tab3" data-toggle="tab">Materials</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active tabtext" id="tab1">
                        <div id="insideMeetings">
                            <?php
                            if(!isset($currentGroup->meetingToVote)){
                                echo "<a href='addmeeting.php?id=$groupid'>
                                <input class='Button' id='addMeeting' type='button' value='Add Meeting'/></a>";
                            }
                            else{
                                $link = new mysqli('localhost', 'root', 'root', 'sharebook');
                                if ($link->connect_error) die($link->connect_error);


                                //$result->close();


                                $query = "SELECT * FROM meeting WHERE group_id='$groupid' and voting=1";
                                $resultTemp = $link->query($query);
                                if (!$resultTemp) die($link->error);
                                elseif ($resultTemp->num_rows) {
                                    $rowTemp = $resultTemp->fetch_array(MYSQLI_NUM);
                                    $resultTemp->close();
                                    echo "Can`t add a meeting until the one in progress is done";
                                    echo "<br/>";
                                    echo "<a href='endVote.php?meetingID=$rowTemp[0]'>
                                    <input class='Button' id='endVote' type='button' value='End voting'/></a>";
                            }
                                $link->close();
                            }
                            ?>
                            <div class="meetings">
                                <p class="upcoming">
                                    Upcoming meeting in:
                                </p>

                                <div class="times">
                                    <?php

                                    $link = new mysqli('localhost', 'root', 'root', 'sharebook');
                                    if ($link->connect_error) die($link->connect_error);
                                    $query = "SELECT * FROM meeting WHERE group_id='$groupid' and voting=0";
                                    $result = $link->query($query);
                                    $numberOfMeetings = $result->num_rows;
                                    if (!$result) die($link->error);
                                    else {
                                        for ($i = 0; $i < $numberOfMeetings; $i++) {

                                            $result->data_seek($i);
                                            $rowTemp = $result->fetch_array(MYSQLI_NUM);
                                            echo "place: " . $rowTemp[2] . "<br/>" . "Date: " . $rowTemp[1] . "<br/>" . "<br/>";


                                        }
                                    }

                                    $result->close();
                                    $link->close();
                                    ?>
                                </div>

                                <p class="upcoming">
                                    Voting for next meeting:
                                </p>

                                <div class="times">

                                    <form action="">
                                        <?php

                                        $link = new mysqli('localhost', 'root', 'root', 'sharebook');
                                        if ($link->connect_error) die($link->connect_error);


                                        //$result->close();


                                        $query = "SELECT * FROM meeting WHERE group_id='$groupid' and voting=1";
                                        $resultTemp = $link->query($query);
                                        if (!$resultTemp) die($link->error);
                                        elseif ($resultTemp->num_rows) {
                                            $rowTemp = $resultTemp->fetch_array(MYSQLI_NUM);
                                            $resultTemp->close();
                                            echo "Place: ".$rowTemp[7]."Time: ".$rowTemp[5]."<br>";
                                            echo "Place: ".$rowTemp[8]."Time: ".$rowTemp[6]."<br>";
                                            echo "<br/>";
                                        }

                                        $link->close();
                                        ?>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane tabtext" id="tab2">
                        <div id="insideQuestions">
                            <div class="questions">

                                <?php

                                for ($i = 0; $i < count($currentGroup->questions); $i++) {

                                    if ($currentGroup->questions[$i]->answer == '') {
                                        echo "<div class='title'>";
                                        echo "<a href='questionAnswer.php?id=".$currentGroup->questions[$i]->questionID."'".">";
                                        echo $currentGroup->questions[$i]->title;
                                        echo "</a>";
                                        echo "</div>";
                                    }

                                }

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabtext" id="tab3">
                        <div id="insideMaterials">
                            <a href="addmaterial.php?id=<?php echo $groupid; ?>">
                                <input class="Button" id="addMaterial" type="button" value="Add Material"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="members">
            <table>
                <tr>
                    <td class="labelName">
                        Trainer
                    </td>
                </tr>
                <tr>

                    <?php

                    echo "<td class='Name'>";
                    echo $currentGroup->trainerName;
                    echo "</td>";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td class="labelName">
                        Admin
                    </td>
                </tr>
                <tr>

                    <?php
                    echo "<td class='Name'>";
                    echo $currentGroup->adminName;
                    echo "</td>";
                    ?>
                    </td>
                </tr>
                <tr>
                    <td class="labelName">
                        Members
                    </td>
                </tr>

                <?php
                for ($i = 0; $i < count($currentGroup->members); $i++) {

                    echo "<tr><td class='Name'>";
                    echo $currentGroup->members[$i];
                    echo "</td></tr>";
                }
                ?>


            </table>
        </div>

        <div id="footer">
            <a class="footerLink" href="contactus.html">Contact us</a>
            <a class="footerLink" href="aboutus.html">About us</a>
            <a class="footerLink" href="">Find a group</a>
            <a class="footerLink" href="HowThisSiteWork.html">How this site work</a>

            <div class="footerLink">Copy Rights</div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script src="../bootstrap/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap/bootstrap.min.js"></script>
</body>
</html>

