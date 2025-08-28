<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $equipment_id = $_POST['equipment_id'];
    $user_id = $_POST['user_id'];

    $user_email = $_POST['user_email'];
    $days_summary = $_POST['days_summary'];
    $total = $_POST['total'];

    include "conn.php";

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO rental (rent_start_date, rent_end_date, equipment_id, user_id, user_email, summary, total) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiissi", $start_date, $end_date, $equipment_id, $user_id, $user_email, $days_summary, $total);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
} else {
    // If the form hasn't been submitted, redirect the user to another page
    header("Location: index.php"); // Replace "index.php" with the appropriate URL
    exit();
}
?>
