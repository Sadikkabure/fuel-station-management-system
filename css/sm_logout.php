<?php
session_start();
unset($_SESSION['station']);
session_destroy();
header("location:sm_login.php");

?>