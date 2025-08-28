<?php

session_start();

// Function to update session variables
function updateSessionVariables($user_id, $conn) {
    $sql = "SELECT id, user_name, phone, email,municipality,barangay,details, image FROM users_acc WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Update session variables with the latest data
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['municipality'] = $row['municipality'];
        $_SESSION['barangay'] = $row['barangay'];
        $_SESSION['details'] = $row['details'];
        $_SESSION['image'] = $row['image'];
    }
    $stmt->close();
}

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: ../index.php");
    exit();
}

// Include database connection
include "conn.php";

// Retrieve the latest user details from the database based on the session ID
$user_id = $_SESSION['user_id'];
updateSessionVariables($user_id, $conn); // Update session variables with the latest data

// Close database connection
$conn->close();

?>
