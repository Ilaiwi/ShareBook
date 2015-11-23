<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/26/15
 * Time: 3:02 PM
 */
include ('classes.php');
$user=$_SESSION['username'];
$studentTemp=new student($user);
$temp=$studentTemp->getGroups();
$content = isset($_GET['content']) ? $_GET['content'] : '';
$currentGroup;
if ($content=!''){
    for($i=0 ; $i<count($temp);$i++){
        if($content==$temp[$i]->groupName){
            $currentGroup=$temp[$i];
        }
        else header("Location: http://www.yourwebsite.com/user.php");
    }
}
echo <<<_END

    <a

_END;
