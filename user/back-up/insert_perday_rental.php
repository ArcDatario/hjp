<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $start_date = $_POST['perday_start_date'];
    $end_date = $_POST['perday_end_date'];
    $equipment_id = $_POST['perday_equipment_id'];
    $user_id = $_POST['perday_user_id'];
    $user_email = $_POST['perday_user_email'];
    $user_municipality = $_POST['perday_user_municipality'];
    $user_barangay = $_POST['perday_user_barangay'];
    $user_details = $_POST['perday_user_details'];
    $days_summary = $_POST['perday_days_summary_input'];
    $total = $_POST['perday_total'];
    $equipment_name = $_POST['perday_equipment_name_input'];
    include "conn.php";

   
    $stmt = $conn->prepare("INSERT INTO rental (rent_start_date, rent_end_date, equipment_id, user_id, user_email, summary, total,equipment_name,municipality, barangay, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiississss", $start_date, $end_date, $equipment_id, $user_id, $user_email, $days_summary, $total, $equipment_name, $user_municipality, $user_barangay, $user_details);

    // Execute the statement
    if ($stmt->execute()) {
        // Deduct the equipment quantity from the database
        $stmt_select = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
        $stmt_select->bind_param("i", $equipment_id);
        $stmt_select->execute();
        $stmt_select->bind_result($equipment_qty);
        $stmt_select->fetch();
        $stmt_select->close();

        
        
        $new_quantity = $equipment_qty - 1; // Assuming you're deducting 1 for each rental

        
        $stmt_update = $conn->prepare("UPDATE equipment_tbl SET equipment_qty = ? WHERE id = ?");
        $stmt_update->bind_param("ii", $new_quantity, $equipment_id);
        $stmt_update->execute();
        $stmt_update->close();

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
