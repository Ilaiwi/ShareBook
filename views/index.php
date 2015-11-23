<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/homestyle.css"/>
    <title></title>
</head>
<body>
<div id="container">
    <header id="header">
        <a href="index.php">
            <img id="logo" src="../imgs/logo.png" alt="logo"/></a>
        <div id="headerButtons">
            <a href="templatesignup.php">
                <input type="button" value="Sign up" class="headerButtons"/></a>
            <?php

            if(isset($_SESSION['username'])){
                if(isset($_SESSION['trainer'])){
                    echo "<a href='templatetrainerhomepage.php'>";

                    echo "<input type='button' value='Log in' class='headerButtons'/>";

                    echo "</a>";
                }
                else {
                    echo "<a href='templatestudenthomepage.php'>";

                    echo "<input type='button' value='Log in' class='headerButtons'/>";

                    echo "</a>";
                }

            }
            else {

                echo"<a href='templatelogin.php'>";

                echo "<input type='button' value='Log in' class='headerButtons'/>";

                echo "</a>";

            }


            ?>


        </div>
    </header>
    <div id="body">

        <div id="homeContent">
            <div id="discription">
                We all as students had that moment when we could not understand a subject or remember previous martial from a subject that another depends on. So as a project for the web development and software engineering courses we will use the skills taught to us to try and improve group education in our university by solving this problem.
            </div>
            <div id="bodyButtonContainer">
                <a href="trainersignup.php">
                    <input class="bodyButton" type="button" value="Train"/></a>
                <a href="templatesignup.php">
                    <input class="bodyButton" type="button" value="Study"/></a>
                <div class="clear"></div>
            </div>
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

