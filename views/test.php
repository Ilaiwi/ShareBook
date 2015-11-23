<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/19/15
 * Time: 8:59 PM
 */

////include ('group.php');
include ('classes.php');
////include ('trainer.php');
//
////echo "ahmad";
//$studentTemp=new student('AhmadIlawi');
//
//echo $studentTemp->getGroups()[0]->groupName;
//echo $studentTemp->getGroups()[0]->questions[0]->question;
//
//$temp=$studentTemp->getGroups();
//echo count($temp);
//for ($i=0;$i<count($temp);$i++){
//    echo $temp[$i]->groupName;
//    echo $temp[$i]->subject;
//}
$temp=new group(2);
//for ($i=0;$i<count($temp->members);$i++){
//    echo "<br/>";
//    echo $temp->members[$i];
//}
if(isset($temp->meetingToVote)){
    echo "set";
}
else {
    echo "not";
}

//echo "<br/>about to view info";
echo "<br/>";
//
//
//
//for ($i=0;$i<count($temp->meetings);$i++){
//    $temp->meetings[$i]->meetingDate;
//    echo "<br/> here";
//    $temp->meetings[$i]->meetingPlace;
//}


//$link = new mysqli('localhost', 'root', 'root', 'sharebook');
//if ($link->connect_error) die($link->connect_error);
//$query = "SELECT * FROM trainer where subject_name1='web' or subject_name2='web' or subject_name3='web' or subject_name4='web' ";
//$result = $link->query($query);
//$numberOfTriners = $result->num_rows;
//if (!$result) die($link->error);
//else {
//    for ($i = 0; $i < $numberOfTriners; $i++) {
//
//        $result->data_seek($i);
//        $rowTemp = $result->fetch_array(MYSQLI_NUM);
//        echo $rowTemp[1];
//    }
//}
//
//$result->close();
//$link->close();

//echo "<br/>";
//$temp->meetingToVote->dateSuggestion1;
//echo "<br/>";
//$temp->meetingToVote-$placeSuggestion1;
//
//echo '<br>';
//
//$trianer=new trainer(1);
////echo $temp->name;
////echo $temp->subjectNames[0];
//echo $temp->reviews[0];
//echo '<br>';


//$temp=$trianer->getGroups();
//echo count($trianer->groups);
////echo $trianer->groups[0]->groupName;
//for ($i=0;$i<count($trianer->groups);$i++){
//    echo $trianer->groups[$i]->groupName;
//    echo $trianer->groups[$i]->subject;
//}
//
//
//
//
