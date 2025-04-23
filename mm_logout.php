<?php
session_start();
unset($_SESSION['user']);
session_destroy();
header("location:mm_login.php");

?>

