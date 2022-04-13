<?php
	session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    unset($_SESSION['edit_user']);
	header("Location: index.php");
?>