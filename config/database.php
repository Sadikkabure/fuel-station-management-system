<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fms_db";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed");
}

