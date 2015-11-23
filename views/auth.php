<?php
session_start();
if(!isset($_SESSION['username']))
	echo '<meta http-equiv="refresh" content="0;url=index.php"> ';
	
?>

