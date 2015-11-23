<?php
$groupId=$_POST['id'];
$ori_name=$_FILES['fileToUpload']['name'];
$from=$_FILES['fileToUpload']['tmp_name'];
$type=explode(".",$ori_name);
$type1=end($type);
$new=rand(1000000000,100000000000).".".$type1;
$to="../files/".$new;

include('db.php');
if(move_uploaded_file($from,$to))
    mysqli_query($link,"insert into materials values('0','$new','$groupId')");
else
    echo "please select file";

echo "<meta http-equiv='refresh' content='2;url=addmaterial.php?id=$groupId'>";

?>