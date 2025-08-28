<?php
// Include database connection
include "conn.php";

// Check if sand equipment ID is provided via GET
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $sandId = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare and execute SQL query to fetch sand equipment details
    $query = "SELECT * FROM sand_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $sandId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if sand equipment exists
    if ($result->num_rows > 0) {
        // Fetch sand equipment details as an associative array
        $sandDetails = $result->fetch_assoc();

        // Return sand equipment details as JSON response
        echo json_encode($sandDetails);
    } else {
        
        echo json_encode(array('error' => 'Sand equipment not found'));
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(array('error' => 'Sand equipment ID is missing'));
}
?>
