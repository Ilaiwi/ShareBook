<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/AddQuestion.css"/>
    <title></title>
</head>
<body>
<div id="container">
    <header id="header">
         <a href="index.php">
        <img id="logo" src="../imgs/logo.png" alt="logo"/></a>
        <div id="headerButtons">
             <?php
        
                echo"<a href='templatestudenthomepage.php'>";
               $user=$_SESSION['username'];
               echo  $user;
               echo "</a>";
?>
                        <a href="logout.php">
            <input type="button" value="Log out" class="headerButtons"/></a>
        </div>
    </header>
    <div id="body">
        <div id="questionContainer">
            <?php
$groupselect = $_GET['id'];
echo"<form method='post' action='insertquestion.php?id=$groupselect'>";
echo " <label for='title'>"."Title"."</label><br/>";
echo " <input type='text' name='title' /><br/><br/>";
echo " <label for='question'>"."Question"."</label><br/>";
echo " <textarea name='question' id='question' cols='150' rows='20'></textarea><br/>";
echo "<input class='Button' type='submit' value='Add Question'/>";
?>

     
            
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

