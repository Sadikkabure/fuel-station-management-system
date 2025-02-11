<?php
session_start();
if (!$_SESSION['data']) {
    header("Location:admin.php");
    die();
}

if (!isset($_GET['employee_id'])) {
    header("location:admin.php");
}
require __DIR__ . "/config/database.php";

$sql = "DELETE FROM employees  where employee_id='$_GET[employee_id]'";
if (mysqli_query($conn, $sql)) {
    echo "deleted successfully.";
    header("location:profile_employes.php");
} else {
    echo "Loading............";
}


mysqli_close($conn);
