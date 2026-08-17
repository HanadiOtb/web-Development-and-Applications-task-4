<?php

$host = "sql310.infinityfree.com";
$user = "if0_42674652";
$pass = "hanadi123490";
$dbname = "if0_42674652_hanadi";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
