<?php
session_start();
unset($_SESSION['maintenance']);
session_destroy();
header("location:mm_login.php");

?>

