<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title></title>
</head>
<body>
<?php
$name1 = $_POST["name"];
$birth1 = $_POST["birth"];
$email1 = $_POST["email"];
$password1 = $_POST["pass"];
$subject1=$_POST['fsubject'];
$subject2=$_POST['ssubject'];
$subject3=$_POST['tsubject'];
$subject4=$_POST['ffsubject'];
$reg="1";

include("db.php");
if (!empty($name1) && !empty($birth1) && !empty($email1) && !empty($password1))
    mysqli_query($link,"insert into trainer values('0','$name1','$email1','$birth1','$reg','$subject1','$subject2','$subject3','$subject4','$password1')");
else echo "please insert all text fields";
?>
<meta http-equiv="refresh" content="1;url=trainersignup.php">


</body>
</html>
