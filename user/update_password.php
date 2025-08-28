<?php
// Assuming your database connection is already established
session_start();

include "conn.php";
// Retrieve POST data
$user_id = $_POST['user_id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];

// Example SQL query to check the current password
$query = "SELECT password FROM users_acc WHERE id = $user_id";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['password'];

    // Validate current password
    if (md5($current_password) == $stored_password) {
        // Update password
        $hashed_password = md5($new_password);
        $update_query = "UPDATE users_acc SET password = '$hashed_password' WHERE id = $user_id";
        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            $response = array("success" => false);
            echo json_encode($response);
        }
    } else {
        $response = array("success" => false);
        echo json_encode($response);
    }
} else {
    $response = array("success" => false);
    echo json_encode($response);
}
?>
