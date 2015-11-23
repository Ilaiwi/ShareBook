<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/19/15
 * Time: 7:17 PM
 */
/*
class group {
    public $groupName, $createDate, $trainerName, $members, $adminName;

    function group($groupNumber){
        $link = new mysqli('localhost', 'root', 'root', 'sharebook');
        if ($link->connect_error) die($link->connect_error);
        $query = "SELECT * FROM subgroup where group_id=$groupNumber";

        $result = $link->query($query);
        if (!$result) die($link->error);
        elseif ($result->num_rows) {
            $this->members=array();
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
            $this->groupName=$row[1];
            $this->createDate=$row[2];
            //echo $this->createDate;

            //get admin name
            $query = "SELECT * FROM student WHERE student_id='$row[5]'";
            $resultTemp = $link->query($query);
            if (!$resultTemp) die($link->error);
            elseif ($resultTemp->num_rows) {
                $rowStudent=$resultTemp->fetch_array(MYSQLI_NUM);
                $resultTemp->close();
                $this->adminName=$rowStudent[1];
            }

            //get the trianer name
            $query = "SELECT * FROM trainer WHERE trainer_id='$row[3]'";
            $resultTemp = $link->query($query);
            if (!$resultTemp) die($link->error);
            elseif ($resultTemp->num_rows) {
                $rowTrainer=$resultTemp->fetch_array(MYSQLI_NUM);
                $resultTemp->close();
                $this->trainerName=$rowTrainer[1];
            }


            //get members of group
            $query = "SELECT * FROM group_student WHERE group_id='$groupNumber'";
            $result = $link->query($query);
            $numberOfStudents = $result->num_rows;
            if (!$result) die($link->error);
            else {
                for($i=0;$i<$numberOfStudents;$i++){

                    $result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);

                    $query = "SELECT * FROM student WHERE student_id='$rowTemp[1]'";
                    $resultTemp = $link->query($query);
                    if (!$resultTemp) die($link->error);
                    elseif ($resultTemp->num_rows) {
                        $rowStudent=$resultTemp->fetch_array(MYSQLI_NUM);
                        $resultTemp->close();
                        $this->members[$numberOfStudents]=$rowStudent[1];
                    }
                }
            }
            $result->close();


        }
        $link->close();
    }
}
*/