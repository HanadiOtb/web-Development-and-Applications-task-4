<?php

header("Content-Type: application/json; charset=UTF-8");
require_once "db.php";

$result = $conn->query("SELECT command FROM robot_state WHERE id = 1 LIMIT 1");

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode([
        "success" => true,
        "command" => $row["command"]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Could not get robot state"
    ]);
}

$conn->close();
?>
