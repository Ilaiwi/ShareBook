<?php
session_start();

?>


<?php


include('classes.php');
$link = new mysqli('localhost', 'root', 'root', 'sharebook');
if ($link->connect_error) die($link->connect_error);

if (isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    $un_temp = $_POST["email"];
    $pw_temp = $_POST["password"];
    $query = "SELECT * FROM student WHERE email='$un_temp'";
    $result = $link->query($query);
    if (!$result) die($link->error);
    elseif ($result->num_rows) {

        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();
        $token = $pw_temp;
        if ($token == $row[5]) {

            $_SESSION['username'] = $row[1];
            $_SESSION['password'] = $pw_temp;
            $_SESSION['student'] = new student($_SESSION['username']);
          
                
          echo "<meta http-equiv='refresh' content='0;url=templatestudenthomepage.php'>";


        } else
            echo "Invalid username/password combination111";
       // echo '<meta http-equiv="refresh" content="2;url=templatelogin.php">';
    } else {

        //trainer log in
        $query = "SELECT * FROM trainer WHERE email='$un_temp'";
        $result = $link->query($query);
        if (!$result) die($link->error);
        elseif ($result->num_rows) {

            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
            $token = $pw_temp;
            if ($token == $row[9]) {

                $_SESSION['username'] = $row[1];
                $_SESSION['password'] = $pw_temp;
                $_SESSION['trainer'] = new trainer($row[1]);

               

                echo "<meta http-equiv='refresh' content='0;url=templatetrainerhomepage.php'>";


            } else
                echo "Invalid username/password combination111";
          echo '<meta http-equiv="refresh" content="2;url=templatelogin.php">';
        }


        echo "Invalid username/password combination222";
      echo '<meta http-equiv="refresh" content="2;url=templatelogin.php">';
    }
} else {
    echo "Please enter your username and password333";

 echo '<meta http-equiv="refresh" content="2;url=templatelogin.php">';

}
$link->close();


