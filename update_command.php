<?php

header("Content-Type: application/json; charset=UTF-8");
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

$command = $_POST["command"] ?? "";
$allowed_commands = ["F", "B", "L", "R", "S"];

if (!in_array($command, $allowed_commands, true)) {
    echo json_encode(["success" => false, "message" => "Invalid command"]);
    exit;
}

$stmt = $conn->prepare("UPDATE robot_state SET command = ? WHERE id = 1");
$stmt->bind_param("s", $command);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "command" => $command,
        "message" => "Command updated successfully"
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to update command"]);
}

$stmt->close();
$conn->close();
?>
