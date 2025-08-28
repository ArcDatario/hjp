<?php
// Include database connection
include "conn.php";

// Check if equipment ID is provided via GET
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $equipmentId = $_GET['id'];

    // Prepare and execute SQL query to fetch equipment details
    $query = "SELECT * FROM equipment_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $equipmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if equipment exists
    if ($result->num_rows > 0) {
        // Fetch equipment details as an associative array
        $equipmentDetails = $result->fetch_assoc();

        // Return equipment details as JSON response
        echo json_encode($equipmentDetails);
    } else {
        // If equipment does not exist, return an empty response or handle accordingly
        echo json_encode(array('error' => 'Equipment not found'));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If equipment ID is not provided, return an error response
    echo json_encode(array('error' => 'Equipment ID is missing'));
}
?>
