<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/24/15
 * Time: 9:03 PM


class meeting {
    public $meetingID , $meetingDate , $meetingPlace , $groupID , $dateSuggestion1 , $dateSuggestion2 , $placeSuggestion1 , $placeSuggestion2;

    function  meeting($row){
        $this->meetingID=$row[0];
        $this->meetingDate=$row[1];
        $this->meetingPlace=$row[2];
        $this->groupID=$row[4];
        $this->dateSuggestion1=$row[5];
        $this->dateSuggestion2=$row[6];
        $this->placeSuggestion1=$row[7];
        $this->placeSuggestion1=$row[8];
    }
}
*/