<?php

$id11=$_GET['id'];
$catex=$_POST['add'];


include('db.php');
$stu_id=mysqli_query($link,"select student_id from student where name='$catex'");
$student_id=mysqli_fetch_array($stu_id);
if(!empty($student_id[0]))
  mysqli_query($link,"insert into group_student values('$id11','$student_id[0]')");

   echo'<meta http-equiv="refresh" content="0;url=templatestudenthomepage.php">';


?>


