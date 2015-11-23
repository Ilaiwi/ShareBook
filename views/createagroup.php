<?php

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title></title>
    <style>
        .addbutton {
            background-color: #ffffff;
            color: #e05842;
            font-size: 15px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            margin: 5px;
        }


    </style>
</head>
<body>
<form method="post" action="insertgroup.php">
    <table border="0" align="center">

        <tr align="center">
            <td colspan="2" style="color: #fcd15a"><h2>Create a Group</h2></td>
        </tr>
    </table>

    <div style="padding: 10px; background: rgba(245,246,247,0.5); width: 30%; margin-left: 35%   ">
        <table border="0" align="center">
            <tr style="height: 40px;">
                <td colspan="2" style="color: #fcd15a">
                    <font size="5px;">
                        group name:</font>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="name" size="30">
                </td>
            </tr>

            <tr style="height: 40px;">
                <td colspan="2" style="color: #fcd15a">
                    <font size="5px;">
                        subject:
                    </font>
                </td>
            <tr id="subject1">
                <td>
                    <select name="subject" id="subject">
                        <?php

                        include("db.php");
                        $catex = mysqli_query($link, "select subject_id,subject_name from subject");
                        while ($cate = mysqli_fetch_array($catex)) {
                            echo "<option value='$cate[1]'>";
                            echo $cate[1];
                            echo "</option>";
                        }
                        ?>

                    </select>
                </td>
            </tr>


            <tr style="height: 40px;">
                <td colspan="2" style="color: #fcd15a">
                    <font size="5px;">
                        created date:
                    </font>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="added" size="20" value="<?php echo date('Y-m-d'); ?>">
                </td>
            </tr>


            <tr style="height: 40px;">
                <td colspan="2" style="color: #fcd15a">
                    <font size="5px;">
                        trainer:
                    </font>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="cate">
                        <?php
                        include("db.php");
                        $catex = mysqli_query($link, "select trainer_id,trainer_name from trainer");
                        while ($cate = mysqli_fetch_array($catex)) {
                            echo "<option value='$cate[0]'>";
                            echo $cate[1];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>





        </table>
    </div>


    <table align="center">

        <tr style="height: 40px;">
            <td colspan="2" align="center">
                <input class="addbutton" style="margin: 10px;" type="submit" value="create">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
<a href="create.php"></a>
