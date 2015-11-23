<?php

$q_id=$_GET['id'];
$cate=$_POST['answer'];
include('db.php');
mysqli_query($link,"UPDATE questions SET answer='$cate' where question_id=$q_id");
echo'<meta http-equiv="refresh" content="1;url=templatetrainerhomepage.php">';







?>