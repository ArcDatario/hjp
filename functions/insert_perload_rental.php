<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $total = $_POST['perload_total_input'];
    $load = $_POST['per_load'];
    $equipment_id = $_POST['perload_equipment_id'];
    $user_id = $_POST['perload_user_id'];
    $user_email = $_POST['perload_user_email'];
    $load_summary = $_POST['perload_total'];

    include "conn.php";

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO rental ( equipment_id, user_id, user_email, summary, total, equipment_load) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissii", $equipment_id, $user_id, $user_email, $load_summary, $total, $load);

    // Execute the statement
    if ($stmt->execute()) {
        // Deduct the equipment quantity from the database
        $stmt_select = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
        $stmt_select->bind_param("i", $equipment_id);
        $stmt_select->execute();
        $stmt_select->bind_result($equipment_qty);
        $stmt_select->fetch();
        $stmt_select->close();

    

        $new_quantity = $equipment_qty - 1; 

        
        $stmt_update = $conn->prepare("UPDATE equipment_tbl SET equipment_qty = ? WHERE id = ?");
        $stmt_update->bind_param("ii", $new_quantity, $equipment_id);
        $stmt_update->execute();
        $stmt_update->close();

        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

   
    $stmt->close();

    
    $conn->close();
} else {
   
    header("Location: index.php"); 
    exit();
}
?>
