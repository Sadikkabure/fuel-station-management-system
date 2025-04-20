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

$sql = "DELETE FROM tankers  where tanker_number ='$_GET[tanker_number]'";
if (mysqli_query($conn, $sql)) {
    header("location: e_tanker.php");
} else {
    echo "Loading............";
}


mysqli_close($conn);
