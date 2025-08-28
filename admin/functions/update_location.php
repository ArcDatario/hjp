<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    if (isset($_POST['id'], $_POST['municipality'], $_POST['rate'])) {
        // Sanitize input to prevent SQL injection
        $locationId = $_POST['id'];
        $municipality = mysqli_real_escape_string($conn, $_POST['municipality']);
        $rate = mysqli_real_escape_string($conn, $_POST['rate']);
        
        // Prepare and execute SQL query to update municipality and rate
        $query = "UPDATE location_tbl SET municipality=?, rate=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sii", $municipality, $rate, $locationId);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo "Incomplete form data.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
