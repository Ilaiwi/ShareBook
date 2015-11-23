<?php
    
 $id2=$_GET['id'];

 $catex=$_POST['cate'];

 include('db.php');
$stu_id=mysqli_query($link,"select student_id from student where name='$catex'");
$student_id=mysqli_fetch_array($stu_id);

mysqli_query($link,"DELETE FROM group_student where group_id='$id2' and student_id='$student_id[0]'");

 echo'<meta http-equiv="refresh" content="0;url=templatestudenthomepage.php">';




?>
