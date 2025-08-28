<?php
// Include database connection or include "conn.php" if available
include "conn.php";

// Check if user_id parameter is set in the GET request
if (isset($_GET['user_id'])) {
    
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

   
    $query = "SELECT id,username, email, phone, image FROM users_acc WHERE id = '$user_id'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch user details
        $user = mysqli_fetch_assoc($result);

        // Prepare JSON response
        $response = array(
            'username' => $user['username'],
            'email' => $user['email'],
            'id' => $user['id'],
            'phone' => $user['phone'],
            'image' => $user['image']
        );

       
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
       
        http_response_code(404);
        echo json_encode(array('error' => 'User not found'));
    }

    
    mysqli_close($conn);
    
} else {
    
    http_response_code(400);
    echo json_encode(array('error' => 'User ID parameter is missing'));
}
?>
