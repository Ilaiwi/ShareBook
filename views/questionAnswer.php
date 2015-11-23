<?php
session_start();
$id=$_GET['id'];
include ('classes.php');
include ('db.php');
$question;
$query = "SELECT * FROM questions WHERE question_id='$id'";
$resultTemp = $link->query($query);
if (!$resultTemp) die($link->error);
elseif ($resultTemp->num_rows) {
    $rowTemp=$resultTemp->fetch_array(MYSQLI_NUM);
    $resultTemp->close();
    $question=new question($rowTemp[1],$rowTemp[0],$rowTemp[2],$rowTemp[3],$rowTemp[4]);
    //echo $rowTemp[0];
}

$link->close();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/AddMaterial.css"/>
    <link rel="stylesheet" href="../css/GroupHome.css"/>
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
        <div id="MaterialContainer">

                <?php
                echo "<form action='insertAnswer.php?id=$id' method='post'>";
                echo "<div class='title'>";
                echo $question->title;
                echo "</div>";

                echo "<div class='question'>";
                echo "<p>" . $question->question . "</p>";
                echo "</div>";

                ?>
                <label for="answer">Answer</label>
                <br/>
                <textarea name="answer" id="answer" cols="70" rows="10"></textarea>
                <br/>
                <input type="submit" value="submit" class="Button"/>
            </form>
        </div>
        <div id="footer">
            <a class="footerLink" href="contactus.html">Contact us</a>
            <a class="footerLink" href="aboutus.html">About us</a>
            <a class="footerLink" href="">Find a group</a>
            <a class="footerLink" href="contactus.html">How this site work</a>
            <div class="footerLink">Copy Rights</div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>

