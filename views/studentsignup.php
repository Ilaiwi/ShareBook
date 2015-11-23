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
<form method="post" action="insertstudent.php">

    <table border="0" align="center">

        <tr align="center">
            <td colspan="2" style="color: #fcd15a"><h2>Student Sign Up</h2></td>
        </tr>

    </table>
    <div style="padding: 10px; background: rgba(245,246,247,0.5); width: 30%; margin-left: 35%   ">
        <table border="0" align="center">
            <tr>
                <td colspan="2" style="color: #fcd15a">
                    <font size="5px;">Name:
            </tr>
            </font>
            </td>
            <tr>
                <td>
                    <input type="text" name="firstname" size="15">
                    <input type="text" name="lastname" size="15">

                </td>
            </tr>

            <tr>
                <td colspan="2" style="color: #fcd15a">
                    <font size="5px;">Address:</font>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="address" size="30">
                </td>
            </tr>


            <tr>
                <td colspan="2" style="color: #fcd15a"><font size="5px;">
                        Birthdate:</font>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="birth" size="30">
                </td>
            </tr>

            <tr>
                <td colspan="2" style="color: #fcd15a"><font size="5px;">
                        Email:</font>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" size="30">
                </td>
            </tr>


            <tr>
                <td colspan="2" style="color: #fcd15a"><font size="5px;">
                        Password</font>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="password" size="30">
                </td>
            </tr>

        </table>
    </div>

    <table border="0" align="center">
        <tr style="height: 40px;">

            <td colspan="2" align="right">
                <input class="addbutton" style="margin: 20px;" type="submit" value="Submit">
            </td>
        </tr>


    </table>

</form>


</body>
</html>

