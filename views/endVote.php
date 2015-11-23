<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 5/1/15
 * Time: 2:05 PM
 */
$meetingID=$_GET['meetingID'];
$vote1;
$vote2;
$place1;
$place2;
$time1;
$time2;
$link = new mysqli('localhost', 'root', 'root', 'sharebook');
if ($link->connect_error) die($link->connect_error);
$query = "select count(*) from vote where meeting_id=$meetingID and vote_num=1";
$result = $link->query($query);
if (!$result) die($link->error);
elseif ($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_NUM);
    $result->close();
    $vote1=$row[0];
}

$query = "select count(*) from vote where meeting_id=$meetingID and vote_num=2";
$result = $link->query($query);
if (!$result) die($link->error);
elseif ($result->num_rows) {
    $row = $result->fetch_array(MYSQLI_NUM);
    $result->close();
    $vote2=$row[0];
}

$query = "SELECT * FROM meeting WHERE meeting_id=$meetingID";
$resultTemp = $link->query($query);
if (!$resultTemp) die($link->error);
elseif ($resultTemp->num_rows) {
    $rowTemp = $resultTemp->fetch_array(MYSQLI_NUM);
    $resultTemp->close();
    $place1=$rowTemp[7];
    $time1=$rowTemp[5];
    $place2=$rowTemp[8];
    $time2=$rowTemp[6];
}
echo $time1. $time2;
if($vote1>$vote2){
    $query = "UPDATE meeting SET meeting_date='$time1',meeting_place=$place1,voting='0' WHERE meeting_id=$meetingID";
    $link->query($query);
    if(!$result) echo"failed";
}
else{
    $query = "UPDATE meeting SET meeting_date='$time2',meeting_place=$place2,voting='0' WHERE meeting_id=$meetingID";
    $link->query($query);
    if(!$result) echo"failed";
}

echo "<meta http-equiv='refresh' content='0;url=templatetrainerhomepage.php'>";

$link->close();