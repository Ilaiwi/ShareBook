<?php

$g_id=$_GET['id'];
$place1=$_POST['place1'];
$dating1=$_POST['dating1'];
$place2=$_POST['place2'];
$dating2=$_POST['dating2'];



include('db.php');

mysqli_query($link,"INSERT INTO meeting values ('0',' ','NULL','0','$g_id','$dating1','$dating2','$place1','$place2','1','')");
echo'<meta http-equiv="refresh" content="1;url=templatetrainerhomepage.php">';
?>

