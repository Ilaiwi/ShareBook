<?php
/**
 * Created by PhpStorm.
 * User: ahmadilaiwi
 * Date: 4/18/15
 * Time: 9:03 PM
 */

session_start();
if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    echo "Welcome back $username.<br>
          Your full name is $username.<br>
          Your username is '$username'
          and your password is '$password'.";
}