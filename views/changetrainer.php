<?php
 $id22=$_GET['id'];
 $catex=$_POST['cate'];
 include('db.php');
$tra_id=mysqli_query($link,"select trainer_id from trainer where trainer_name='$catex'");
$trainer1_id=mysqli_fetch_array($tra_id);

mysqli_query($link,"UPDATE subgroup set trainer_id=$trainer1_id[0] WHERE group_id=$id22");

 echo'<meta http-equiv="refresh" content="0;url=templatestudenthomepage.php">';

?>


