<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/StudentSearch.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script language="JavaScript" src="../js/SearchStudents.js"></script>
    <title></title>
</head>
<body>
<div id="container">
    <header id="header">
         <a href="index.php">
        <img id="logo" src="../imgs/logo.png" alt="logo"/></a>
        <div id="headerButtons">
                  <?php
         // $stu_id=$_GET['id'];
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

    <div id="search">


            <div id="buttons">
                <form method="post" action="">
                <input type="text" name="new" size="30"/>
                <input class="Button" type="submit" value="Search" />
                    </form>
            </div>
            <label for="sel1">Select students:</label>
            <br/>
           
            <?php
echo "<form method='post' action=''>";
echo "<select size='10' id='selStudents' name='searchedstudent'>";
include('db.php');
$new1=$_POST["new"];
$studentx=mysqli_query($link,"select * from student where name like '%$new1%'");
if(!empty($new1)){
while ($student=mysqli_fetch_array($studentx)){
    if(!empty($student)){
    echo "<option>";
    echo $student[1];
    echo "</option>";}
 
    
 
}}

echo "</select>.<br/>";
echo " <input id='Addbutton' class='Button' type='button' value='Add'/> ";
?>
            
            <br/>
           
            <div class="clear"></div>
    </div>
        <div id="addedStudents">
            <br/>
            <br/>
            <label for="selectedStudents">Selected students:</label>
            <select size="10" id="selectedStudents">

            </select>
            <br/>
            <input id="Removebutton" class="Button" type="button" value="Remove"/>
            <input id="AddStudentsbutton" class="Button" type="button" value="Add Students"/>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>

