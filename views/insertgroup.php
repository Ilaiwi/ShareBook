<?php
    session_start();
 $user=$_SESSION['username'];
 $name1=$_POST['name'];
 $subject=$_POST['subject'];
 $added1=$_POST['added'];
 $trainer1=$_POST['cate'];


 include('db.php');
 $user1=mysqli_query($link,"select student_id from student where name ='$user'");
 $user_id=mysqli_fetch_array($user1);

 if (!empty($name1) && !empty($subject) && !empty($added1) && !empty($trainer1)){
    mysqli_query($link,"insert into subgroup values('0','$name1','$added1','$trainer1','6','$user_id[0]','$subject')");

 }
else echo "please insert all fields";
$link->close();

echo'<meta http-equiv="refresh" content="1;url=templatecreateagroup.php">';

?>