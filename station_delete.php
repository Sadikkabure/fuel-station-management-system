<?php
session_start();
if (!$_SESSION['data']) {
    header("Location:admin.php");
    die();
}

if (!isset($_GET['station_id'])) {
    header("location:admin.php");
}
require __DIR__ . "/config/database.php";

$sql = "DELETE FROM stations  where station_id='$_GET[station_id]'";
if (mysqli_query($conn, $sql)) {
    echo "deleted successfully.";
    header("location:e_station.php");
} else {
    echo "Loading............";
}


mysqli_close($conn);
