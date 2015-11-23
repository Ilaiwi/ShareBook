<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title></title>


    <link rel="stylesheet" href="../css/studentHomePage.css"/>

</head>
<body>
<div class="middle">
    <div class="group">
        <table border="0" class="group1" cellpadding="0" cellspacing="0">
            <tr style="color: #fcd15a">
                <td colspan="1">
                    Current Group
                </td>

                <?php

                $count = 0;
                include('classes.php');
                $user = $_SESSION['username'];
                $trainerTemp = new trainer($user);
                $temp = $trainerTemp;


                if (count($temp) == 0) {
                    echo " <tr style='background-color:  #c4d9e1 ; ' height=100><td>";
                    echo "no current group";
                    echo "</td></tr>";
                }
                else{
                    for ($i = 0; $i < count($temp->groups); $i++) {
                        if ($count % 2 == 0) {
                            echo " <tr style='background-color: #fff ; '>";
                        } else
                            echo " <tr style='background-color: #c4d9e1 ; '>";
                        echo "<td  width='100' height='30' colspan='2'>";
                        $groupselect = $temp->groups[$i]->groupId;
                        echo "<a href='grouphometrainer.php?id=$groupselect'>";

                        echo $temp->groups[$i]->groupName;
                        echo "</a>";
                        echo "</td></tr>";
                        $count++;

                    }
                }

                ?>


        </table>
    </div>


    <div class="group2">
        <table border="0" class="group1" cellpadding="0" cellspacing="0">
<!--            <tr style="color: #fcd15a; padding-bottom:20px; ">-->
<!--                <td colspan="1">-->
<!--                    Up Coming Meeting-->
<!--                </td>-->
<!---->
<!--                --><?php
//                //include('db.php');
//                // $count=0;
//                //  $catex=mysqli_query($link,"select group_id,group_name from subgroup");
//                //     while($cate=mysqli_fetch_array($catex)){
//
//                //  if ($count%2==0){
//                // echo " <tr style='background-color: #fff ; '>";
//                // echo "<td  width='100' height='30' colspan='2'>";
//
//                // echo $cate[1];
//                // echo "</td></tr>";
//                //  $count++;
//                // }
//                // else {
//                //   echo " <tr style='background-color: #c4d9e1 ; '>";
//                // echo "<td  width='100' height='30' colspan='2'>";
//                // echo $cate[1];
//                // echo "</td></tr>";
//                // $count++;
//                // }  }
//
//
//                ?>
<!---->

        </table>
    </div>
</div>

<div class="under">

<!--    <a href="templatecreateagroup.php" style="text-decoration: none;">-->
<!--        <input class="button" type="submit" value="create a group"></a>-->
<!--    <a href="searchforagroup.php">-->
<!--        <input class="button" type="submit" value="search for a group"></a>-->
</div>
</body>
</html>

