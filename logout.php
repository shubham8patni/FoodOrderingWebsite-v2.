<?php
	
	include './class-autoload.inc.php';
	session_start();
	session_regenerate_id(); 

unset($_SESSION['iuser_id']);
unset($_SESSION['email']);
unset($_SESSION['f_name']);
unset($_SESSION['timeout']);
unset($_SESSION['contact']);
unset($_SESSION['id']);
unset($_SESSION['photoURL']);
unset($_SESSION['loggedin']);
session_destroy();
header("Location:login.php");
    exit;

?>