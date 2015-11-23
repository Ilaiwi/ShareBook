<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/AddMeeting.css"/>
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
        <div id="meetingsContainer">
            <pre></pre>
            <?php
$group_id=$_GET['id'];
echo "  <form action='insertmeeting.php?id=$group_id' method='post'>";
?>
          
            <label for="Option1">
                first suggestion:
            </label>
            <pre></pre>
            <label for="place1">First Place</label>
            <pre></pre>
            <input id="place1" type="text" name="place1"/>
<pre></pre>
            <label for="date1">Date</label>
            <pre></pre>
            <input id="date1" type="date" name="dating1"/>
            <pre></pre>
            <label for="Option1">
                second suggestion:
            </label>
            <pre></pre>
            <label for="place2">Second Place</label>
            <pre></pre>
            <input id="place2" type="text" name="place2"/>
<pre></pre>
            <label for="date2">Date</label>
            <pre></pre>
            <input id="date2" type="date" name="dating2"/>
            <pre></pre>

            <input id="AddMeeting" class="Button" type="submit" value="Add Meeting"/>
                </form>
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
</body>
</html>

