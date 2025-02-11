<?php
session_start();
if (!$_SESSION['data']) {
    header("Location:admin.php");
    die();
}

if (!isset($_GET['ID'])) {
    header("location:admin.php");
}
require __DIR__ . "/config/database.php";

$sql = "DELETE FROM station_manager  where ID='$_GET[ID]'";
if (mysqli_query($conn, $sql)) {
    echo "deleted successfully.";
    header("location:profile_sm.php");
} else {
    echo "Loading............";
}


mysqli_close($conn);
