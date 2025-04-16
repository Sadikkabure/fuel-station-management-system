<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "sadik";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed");
}

