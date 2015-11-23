<?php
session_start();
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 5/1/15
 * Time: 1:05 PM
 */
include ('classes.php');
$studentName=new student($_SESSION['username']);

$meetingID=$_GET['meetingid'];
if(isset($_POST['meetingVote'])){
    $votedFor=$_POST['meetingVote'];

    $link = new mysqli('localhost', 'root', 'root', 'sharebook');
    if ($link->connect_error) die($link->connect_error);
    $query = "insert into vote values ('0',$votedFor,$meetingID)";
    $result=$link->query($query);
    if (!$result) echo "INSERT failed: $query<br>" ;
    $link->close();

}
echo "<meta http-equiv='refresh' content='1;url=templatestudenthomepage.php'>";
