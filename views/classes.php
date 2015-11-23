<?php

class question {

    public $groupID, $questionID, $question , $answer , $title;

    function  question($GID, $QID , $Q , $A , $T){
        $this->groupID=$GID;
        $this->questionID=$QID;
        $this->question=$Q;
        $this->answer=$A;
        $this->title=$T;
    }

}

class meeting {
    public $meetingID , $meetingDate , $meetingPlace , $groupID , $dateSuggestion1 , $dateSuggestion2 , $placeSuggestion1 , $placeSuggestion2;

    function  meeting($meetingID , $meetingDate , $meetingPlace , $groupID , $dateSuggestion1 , $dateSuggestion2 , $placeSuggestion1 , $placeSuggestion2){


        $this->meetingID=$meetingID;

        $this->meetingDate=$meetingDate;
        $this->meetingPlace=$meetingPlace;
        $this->groupID=$groupID;
        $this->dateSuggestion1=$dateSuggestion1;
        $this->dateSuggestion2=$dateSuggestion2;
        $this->placeSuggestion1=$placeSuggestion1;
        $this->placeSuggestion2=$placeSuggestion2;

    }
}


class group {
    public $groupId,$groupName, $createDate, $trainerName, $members, $adminName, $fileNames , $questions , $meetings , $meetingToVote , $subject;

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
            $this->groupId=$row[0];
            $this->groupName=$row[1];
            $this->createDate=$row[2];
            $this->subject=$row[6];
            $this->fileNames=array();
            $this->questions=array();
            $this->meetings=array();


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

                    //$result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);

                    $query = "SELECT * FROM student WHERE student_id='$rowTemp[1]'";
                    $resultTemp = $link->query($query);
                    if (!$resultTemp) die($link->error);
                    elseif ($resultTemp->num_rows) {
                        $rowStudent=$resultTemp->fetch_array(MYSQLI_NUM);
                        $resultTemp->close();
                        $this->members[$i]=$rowStudent[1];
                    }
                }
            }
            $result->close();

            //get matrial names
            $query = "SELECT * FROM materials WHERE group_id='$groupNumber'";
            $result = $link->query($query);
            $numberOfFiles = $result->num_rows;
            if (!$result) die($link->error);
            else {
                for ($i = 0; $i < $numberOfFiles; $i++) {

                    //$result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);
                    $this->fileNames[]=$rowTemp[1];
                }
            }

            $result->close();

            //get questions
            $query = "SELECT * FROM questions WHERE group_id='$groupNumber'";
            $result = $link->query($query);
            $numberOfQuestions = $result->num_rows;
            if (!$result) die($link->error);
            else {
                for ($i = 0; $i < $numberOfQuestions; $i++) {

                    //$result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);
                    $this->questions[]=new question($rowTemp[1],$rowTemp[0],$rowTemp[2],$rowTemp[3],$rowTemp[4]);
                }
            }

            $result->close();


            //get meetings
            $query = "SELECT * FROM meeting WHERE group_id='$groupNumber' and voting=0";
            $result = $link->query($query);
            $numberOfMeetings = $result->num_rows;
            if (!$result) die($link->error);
            else {
                for ($i = 0; $i < $numberOfMeetings; $i++) {

                    $rowTemp = $result->fetch_array(MYSQLI_NUM);
                    $this->meetings[]=new meeting($rowTemp[0], $rowTemp[1], $rowTemp[2], $rowTemp[4], $rowTemp[5], $rowTemp[6], $rowTemp[7], $rowTemp[8]);


                }
            }

            $result->close();


            //get meeting to vote
            $query = "SELECT * FROM meeting WHERE group_id='$groupNumber' and voting=1";
            $resultTemp = $link->query($query);
            if (!$resultTemp) die($link->error);
            elseif ($resultTemp->num_rows) {
                $rowTemp=$resultTemp->fetch_array(MYSQLI_NUM);
                $resultTemp->close();
                $this->meetingToVote=new meeting($rowTemp[0], $rowTemp[1], $rowTemp[2], $rowTemp[4], $rowTemp[5], $rowTemp[6], $rowTemp[7], $rowTemp[8]);
            }


        }
        $link->close();
    }
    function getGroupName(){
        return $this->groupName;
    }

    function getMeetings()
    {
        $temp = array();
        for ($i = 0; $i < count($this->meetings); $i++) {

            $temp[] = clone $this->meetings[$i];
        }
        return $temp;
    }
}

class student
{
    public $username, $password, $address, $birthDate, $email, $groups ,$studentID;

    function student($studentName)
    {
        $link = new mysqli('localhost', 'root', 'root', 'sharebook');
        if ($link->connect_error) die($link->connect_error);
        $query = "SELECT * FROM student WHERE name='$studentName'";
        $result = $link->query($query);
        if (!$result) die($link->error);
        elseif ($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
            $this->password = $row[5];
            $this->studentID=$row[0];
            $this->address = $row[2];
            $this->birthDate = $row[3];
            $this->email = $row[4];
            $this->groups = array();

            //get all groups goined by the user


            $query = "SELECT * FROM group_student WHERE student_id='$row[0]'";
            $resultTemp1 = $link->query($query);
            $numberOfGroups = $resultTemp1->num_rows;
            if (!$resultTemp1) die($link->error);
            else {
                for ($i = 0; $i < $numberOfGroups; $i++) {
                    $rowTemp = $resultTemp1->fetch_array(MYSQLI_NUM);
                    $this->groups[$i] = new group($rowTemp[0]);
                }
            }

            $resultTemp1->close();

            $query = "SELECT * FROM subgroup WHERE admin_id='$row[0]'";
            $resultTemp1 = $link->query($query);
            $numberOfGroups = $resultTemp1->num_rows;
            if (!$resultTemp1) die($link->error);
            else {
                for ($i = 0; $i < $numberOfGroups; $i++) {
                    $rowTemp = $resultTemp1->fetch_array(MYSQLI_NUM);
                    $this->groups[] = new group($rowTemp[0]);
                }
            }


        }

        $link->close();

    }

    /**
     *
     */
    function getGroups()
    {
        $temp = array();
        for ($i = 0; $i < count($this->groups); $i++) {

            $temp[] = clone $this->groups[$i];
        }
        return $temp;
    }


}




class trainer {
    public $trainerId,$name , $email, $birthDate , $registerNumber , $subjectNames , $reviews , $groups ;

    function trainer($nameOrId){


        $link = new mysqli('localhost', 'root', 'root', 'sharebook');
        if ($link->connect_error) die($link->connect_error);

        //echo "after query";

        if(gettype($nameOrId)=="integer"){
            //echo 'heree';
            $query = "SELECT * FROM trainer WHERE trainer_id='$nameOrId'";
        }
        elseif (gettype($nameOrId)=="string"){
            //echo 'hereeee';
            $query = "SELECT * FROM trainer WHERE trainer_name='$nameOrId'";
        }


        $result = $link->query($query);
        if (!$result) die($link->error);
        elseif ($result->num_rows) {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
            $this->trainerId=$row[0];
            $this->name=$row[1];
            $this->email=$row[2];
            $this->birthDate=$row[3];
            $this->registerNumber=$row[4];
            $this->subjectNames=array();
            $this->reviews=array();
            $this->groups=array();



            for($i=0; $i<4;$i++){
                //echo 'here';
                if($row[5+$i]!=null){
                    $this->subjectNames[]=$row[5+$i];
                    //echo $row[5+$i];
                }
                else{
                    //echo 'no subject   ';
                }

            }

            $query = "SELECT * FROM review WHERE trainer_id='$this->trainerId'";
            $result = $link->query($query);
            $numberOfReviews = $result->num_rows;
            if (!$result) die($link->error);
            elseif ($result->num_rows) {
                for($i=0;$i<$numberOfReviews;$i++) {
                    //$result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);
                    $this->reviews[]=$rowTemp[3];
                }
                $result->close();

            }

            $query="SELECT * FROM subgroup WHERE trainer_id='$this->trainerId'";
            $result = $link->query($query);
            $numberOfGroups = $result->num_rows;
            if (!$result) die($link->error);
            elseif ($result->num_rows) {
                for($i=0;$i<$numberOfGroups;$i++) {
                    //$result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);
                    $this->groups[]=new group($rowTemp[0]);
                }
                $result->close();

            }

        }

        function getGroups()
        {
            $temp = array();
            for ($i = 0; $i < count($this->groups); $i++) {

                $temp[] = clone $this->groups[$i];
            }
            return $temp;
        }

        $link->close();

    }
}