<?php

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/trainerSignUp.css"/>
    <script language="JavaScript" src="../js/trainerSignUp.js"></script>
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
             <a href="templatelogin.php">
            <input type="button" value="Log in" class="headerButtons"/></a>
        </div>
    </header>
    <div id="body">
        <div id="signUpForm">
            <h2>Trainer Sign Up</h2>

            <form method="post" action="inserttrainer.php">
                <div style="padding: 10px; background: rgba(245,246,247,0.5); width: 30%; margin-left: 35%   ">
                <table border="0" align="center">
                    <tr style="height: 40px;">
                        <td colspan="2" style="color: #fcd15a">

                            <label for="name"> <font size="4px;">Name:</font></label>
                        </td>
                        </tr>
                    <tr>
                        <td>
                            <input type="text" name="name" size="30"/>
                        </td>
                    </tr>
                    <tr style="height: 40px;">
                        <td colspan="2" style="color: #fcd15a">
                            <label for="age"><font size="4px;"> Birthday:</font></label>
                        </td>
                        </tr>
                    <tr>
                        <td>
                            <input type="date"  name="birth" size="30"/>
                        </td>
                    </tr>
                    <tr style="height: 40px;">
                        <td colspan="2" style="color: #fcd15a">

                            <label for="email"><font size="4px;">Email </font></label>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <input type="text" value="ex@hotmail.com" name="email"  size="30"/>
                        </td>
                    </tr>
                    <tr style="height: 40px;">
                        <td colspan="2" style="color: #fcd15a">
                            <label for="password"><font size="4px;">Password:</font></label>
                        </td>
                        </tr>
                    <tr>
                        <td>
                            <input type="password" name="pass" size="30"/>
                        </td>
                    </tr>

                    <tr style="height: 40px;">
                        <td colspan="2" style="color: #fcd15a">
                            <label for="subject"> <font size="4px;">Subject:</font></label>
                        </td>
                        </tr>
                          <tr>
                        <td align="center">
                            <input class="addButton" id="addSubjectButton" type="button" value="add"/>
                        </td>
                    </tr>
                    </div>
                    <tr id="subject1">
                        <td>
                            <select name="fsubject" id="subject">
                                <?php
                                      echo "<option value='NULL'>";
                              echo "";
                           echo "</option>";
                             include("db.php");
                              $catex=mysqli_query($link,"select subject_id,subject_name from subject");
                          while($cate=mysqli_fetch_array($catex))
                              {
                          echo "<option value='$cate[0]'>";
                              echo $cate[1];
                           echo "</option>";
                                  }
                                     ?>

                            </select>
                        </td>
                        <td align="center">

                            <select name="mark" id="mark">
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                            </select>
                        </td>
                    </tr>

                    <tr id="subject2">
                        <td>
                            <select name="ssubject" id="subject">
                                 <?php
                                       echo "<option value='NULL'>";
                              echo "";
                           echo "</option>";
                             include("db.php");
                              $catex=mysqli_query($link,"select subject_id,subject_name from subject");
                          while($cate=mysqli_fetch_array($catex))
                              {
                          echo "<option value='$cate[0]'>";
                              echo $cate[1];
                           echo "</option>";
                                  }
                                     ?>
                            </select>
                        </td>
                        <td align="center">

                            <select name="mark" id="mark">
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                            </select>
                        </td>
                    </tr>



                    <tr id="subject3">
                        <td>
                            <select name="tsubject" id="subject">
                                 <?php
                                       echo "<option value='NULL'>";
                              echo "";
                           echo "</option>";
                             include("db.php");
                              $catex=mysqli_query($link,"select subject_id,subject_name from subject");
                          while($cate=mysqli_fetch_array($catex))
                              {
                          echo "<option value='$cate[0]'>";
                              echo $cate[1];
                           echo "</option>";
                                  }
                                     ?>
                            </select>
                        </td>
                        <td align="center">

                            <select name="mark" id="mark">
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                            </select>
                        </td>
                    </tr>

                    <tr id="subject4">
                        <td>
                            <select name="ffsubject" id="subject">
                                 <?php
                        echo "<option value='NULL'>";
                              echo "";
                           echo "</option>";
                             include("db.php");
                              $catex=mysqli_query($link,"select subject_id,subject_name from subject");
                          while($cate=mysqli_fetch_array($catex))
                              {
                             
                          echo "<option value='$cate[0]'>";
                              echo $cate[1];
                           echo "</option>";
                                  }
                                     ?>
                            </select>
                        </td>
                        <td align="center">

                            <select name="mark" id="mark">
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                            </select>
                        </td>
                    </tr>


               

         
          <tr>
                        <td align="center">
                            <input class="addButton" id="addSubjectButton" type="submit" value="submit"/>
                        </td>
                    </tr>


    </table>


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

