<?php
include "conn.php";

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $sandId = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare and execute SQL query to fetch sand equipment details
    $query = "SELECT * FROM location_tbl WHERE id = ?";
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
        // If sand equipment does not exist, return an empty response or handle accordingly
        echo json_encode(array('error' => 'Sand equipment not found'));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If sand equipment ID is not provided, return an error response
    echo json_encode(array('error' => 'Sand equipment ID is missing'));
}
?>
