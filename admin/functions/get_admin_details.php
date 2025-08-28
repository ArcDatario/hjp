<?php
// Assuming you have your database connection established in 'conn.php'
include "conn.php";

// Check if the admin ID is provided in the request
if(isset($_GET['id'])) {
    $admin_id = $_GET['id'];

    // Prepare and execute SQL query to fetch admin details based on the provided admin ID
    $stmt = $conn->prepare("SELECT * FROM admins_acc WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if admin details are found
    if($result->num_rows > 0) {
        // Fetch admin details as an associative array
        $admin_details = $result->fetch_assoc();
        
        // Return admin details as JSON response
        echo json_encode($admin_details);
    } else {
        // If admin details are not found, return an error message
        echo json_encode(array("error" => "Admin details not found."));
    }
} else {
    // If admin ID is not provided in the request, return an error message
    echo json_encode(array("error" => "Admin ID is required."));
}

// Close database connection
$stmt->close();
$conn->close();
?>
