<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title></title>
</head>
<body>
<?php
$name1 = $_POST["firstname"];
$name2 = $_POST["lastname"];
$address1 = $_POST["address"];
$birth1 = $_POST["birth"];
$email1 = $_POST["email"];
$password1 = $_POST["password"];
$name3 = $name1 . $name2;

include("db.php");
if (!empty($name1) && !empty($name2) && !empty($address1) && !empty($birth1) && !empty($email1) && !empty($password1))
    mysqli_query($link,"insert into student values('0','$name3','$address1','$birth1','$email1','$password1')");
else echo "please insert all fields";
?>
<meta http-equiv="refresh" content="1;url=templatesignup.php">


</body>
</html>
