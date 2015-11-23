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


<table border="0" align="center">

    <tr align="center">
        <td colspan="2" style="color: #fcd15a"><h2>LOG IN</h2></td>
    </tr>
</table>

<div style="padding: 10px; background: rgba(245,246,247,0.5); width: 30%; margin-left: 35%   ">
    <form action="authenticate.php" method="post">
        <table border="0" align="center">
            <tr>
                <td colspan="2" style="color: #fcd15a"><font size="5px;">
                        Email:</font>
            </tr>
            </td>
            <tr>
                <td>
                    <input type="text" name="email" size="30">


            <tr>
                <td colspan="2" style="color: #fcd15a"><font size="5px;">
                        Password:</font>
            </tr>
            </td>
            <tr>
                <td>
                    <input type="password" name="password" size="30">


                </td>
            </tr>

            </td>
            </tr>
        </table>
</div>

<table border="0" align="center">
    <tr style="height: 40px;">

        <td colspan="2" align="center">
            <input class="addbutton" style=" margin: 20px; color: #fcd15a;" type="submit" value="Log in">
        </td>
    </tr>
</table>
</form>
</body>
</html>
