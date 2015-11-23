<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css"/>
    <link rel="stylesheet" href="../css/groupsearch.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script language="JavaScript" src="../js/groupsearch.js"></script>
    <title></title>
</head>
<body>
<div id="container">
    <header id="header">
         <a href="index.php">
        <img id="logo" src="../imgs/logo.png" alt="logo"/></a>
        <div id="headerButtons">
           <?php
         //$stu_id=$_GET['id'];
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
                <form  method="post" action="" >
                <input type="text" name="new" size="30"/>
                <input class="Button" type="submit" value="search"  />
                </form>
                   
            </div>
            <label for="sel1">Select Group:</label>
            <br/>
          
 <?php
echo "<form method='post' action='joingroup.php'>";
echo "<select size='10' id='selStudents' name='searchedgroup'>";
include('db.php');
$new1=$_POST["new"];
$groupx=mysqli_query($link,"select * from subgroup where group_name like '%$new1%'");
if(!empty($new1)){
while ($group=mysqli_fetch_array($groupx)){
    if(!empty($group)){
    echo "<option>";
    echo $group[1];
    echo "</option>";}
  
    
 
}}
echo "</select>.<br/>";
echo "<input id='Addbutton' class='Button' type='submit' value='join'/> ";
?>
            
          
           
        
     <div class="clear"></div>
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

