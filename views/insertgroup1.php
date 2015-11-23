<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/28/15
 * Time: 9:47 AM
 */
$name1=$_GET['name'];

include ('db.php');
$query="select group_id from subgroup where group_name='$name1'";
$group2_id=mysqli_fetch_array($query);
mysqli_query($link,"insert into group_student values('$group2[0]','$user_id[0]')");
echo'<meta http-equiv="refresh" content="0;url=templatecreateagroup.php">';

$link->close();