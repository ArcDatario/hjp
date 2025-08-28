<?php
// Include database connection
include "conn.php";

// Check if ID is provided via POST
if (isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Prepare and execute SQL query to delete the record
    $query = "DELETE FROM location_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success"; // Return success message
    } else {
        echo "Error: " . $stmt->error; // Return error message
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "ID is missing"; // If ID is not provided, return an error message
}
?>
