<?php
session_start();
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['municipality'], $_POST['rate'])) {
        $municipality = $_POST['municipality'];
        $rate = $_POST['rate'];

        // Sanitize input to prevent SQL injection
        $municipality = mysqli_real_escape_string($conn, $municipality);
        $rate = mysqli_real_escape_string($conn, $rate);

        // Prepare and execute SQL query
        $query = "INSERT INTO location_tbl (municipality, rate) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $municipality, $rate);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
