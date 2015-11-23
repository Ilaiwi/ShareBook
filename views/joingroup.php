<?php 
include('auth.php');
$user=$_SESSION['username'];
include('db.php');
$type=$_POST["searchedgroup"];

if(!empty($type)){
$stu_id=mysqli_query($link,"select student_id from student where name='$user'");
$grou_id=mysqli_query($link,"select group_id from subgroup where group_name='$type'");
$st_id=mysqli_fetch_array($stu_id);
$gr_id=mysqli_fetch_array($grou_id);
$student_id1=$st_id[0];
$group_id1=$gr_id[0];

mysqli_query($link,"insert into group_student values ('$group_id1','$student_id1')");

echo "<script language='javascript'>";
echo "alert('Successfully added to group $type ')";
echo "</script>";
echo "<meta http-equiv='refresh' content='0;searchforagroup.php'>";
}

if(empty($type)) {
    echo "<script language='javascript'>";
echo "alert(' please select a group ')";
echo "</script>";
echo "<meta http-equiv='refresh' content='0;searchforagroup.php'>";

}
?>

















