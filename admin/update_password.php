<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!isset($_POST['user_id']) || !isset($_POST['pass_word'])) {
        echo json_encode(array("status" => "error", "message" => "Missing user ID or password"));
        exit;
    }

    $user_id = $_POST['user_id'];
    $new_password = md5($_POST['pass_word']);

   

    
    include "conn.php";

    // Prepare and execute the update statement
    $sql = "UPDATE admins_acc SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_password, $user_id);

    if ($stmt->execute()) {
        // Update successful
        $_SESSION['updated'] = true;

       header('location: auth-reset-password.php');
    } else {
        
        echo json_encode(array("status" => "error", "message" => "Failed to update password"));
    }

    
    $stmt->close();
    $conn->close();
} else {
    // Redirect if not a POST request
    header("Location: auth-reset-password.php");
    exit;
}
?>
