<?php
    
$title1=$_POST['title'];
$question1=$_POST['question'];
$groupselect = $_GET['id'];
include('db.php');
if (!empty($title1) && !empty($question1)){
     mysqli_query($link,"insert into questions values('0','$groupselect','$question1','','$title1')");
     echo "<script language='javascript'>";
     echo "alert('Successfully added')";
      echo "</script>";
     echo"<meta http-equiv='refresh' content='1;url=addquestion.php?id=$groupselect'>";
}

 else {
      echo "please insert all fields";
   echo'<meta http-equiv="refresh" content="1;url=addquestion.php?id=$groupselect">';
 }
?>
