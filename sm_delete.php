<?php
require __DIR__ . "/config/database.php";
session_start();
if (!$_SESSION['data']) {
    header("Location:admin.php");
    die();
}

if (!isset($_GET['ID'])) {
    header("location:admin.php");
}

$sql = "DELETE FROM station_manager  where ID = '$_GET[ID]' ";
if (mysqli_query($conn, $sql)) {
    header("location:profile_sm.php");
} else {
    echo "Loading............";
}


mysqli_close($conn);
