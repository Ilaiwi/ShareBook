<?php
session_start();
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
    echo '<meta http-equiv="refresh" content="0;url=index.php"> ';

?>

