<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/24/15
 * Time: 6:13 PM




class trainer {
    public $trainerId,$name , $email, $birthDate , $registerNumber , $subjectNames , $reviews ;

    function trainer($nameOrId){


        $link = new mysqli('localhost', 'root', '', 'sharebook');
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
                    $result->data_seek($i);
                    $rowTemp = $result->fetch_array(MYSQLI_NUM);
                    $this->reviews[]=$rowTemp[3];
                }
                $result->close();

            }

        }

        $link->close();
    }
}
 *
 * */