<?php

session_start();

// Function to update session variables
function updateSessionVariables($user_id, $conn) {
    $sql = "SELECT id, user_name, password, image,role FROM admins_acc WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['role'] = $row['role'];
    }
    $stmt->close();
}


if (!isset($_SESSION['user_id'])) {

    header("Location: auth-login.php");
    exit();
}


include "conn.php";

// Retrieve the latest user details from the database based on the session ID
$user_id = $_SESSION['user_id'];
updateSessionVariables($user_id, $conn); // Update session variables with the latest data

// Close database connection
$conn->close();

?>
