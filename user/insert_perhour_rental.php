<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $start_date = $_POST['perhour_start_date'];
    $end_date = $_POST['perhour_end_date'];
    $equipment_id = $_POST['perhour_equipment_id'];
    $user_id = $_POST['perhour_user_id'];
    $user_email = $_POST['perhour_user_email'];
    $days_summary = $_POST['perhour_days_summary'];
    $total = $_POST['perhour_total'];
    $equipment_name = $_POST['perhour_equipment_name_input']; // Corrected variable name

    // Include the database connection file
    include "conn.php";

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO rental (rent_start_date, rent_end_date, equipment_id, user_id, user_email, summary, total, equipment_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiissis", $start_date, $end_date, $equipment_id, $user_id, $user_email, $days_summary, $total, $equipment_name);

    // Execute the statement
    if ($stmt->execute()) {
        // Deduct the equipment quantity from the database
        $stmt_select = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
        $stmt_select->bind_param("i", $equipment_id);
        $stmt_select->execute();
        $stmt_select->bind_result($equipment_qty);
        $stmt_select->fetch();
        $stmt_select->close();

        // Deduct the quantity needed for rental
        $new_quantity = $equipment_qty - 1; // Assuming you're deducting 1 for each rental

        // Update the equipment quantity in the database
        $stmt_update = $conn->prepare("UPDATE equipment_tbl SET equipment_qty = ? WHERE id = ?");
        $stmt_update->bind_param("ii", $new_quantity, $equipment_id);
        $stmt_update->execute();
        $stmt_update->close();

  
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
