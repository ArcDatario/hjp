<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit(json_encode(['status' => 'not_logged_in']));
}



include "conn.php";

$roomId = $_POST['roomId'];
$userId = $_POST['userId'];


$sql = "SELECT status FROM rental WHERE user_id = $userId AND equipment_id = $roomId AND status = 'Completed'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(['status' => 'Completed']);
} else {
    echo json_encode(['status' => 'not_done']);
}

$conn->close();
?>
