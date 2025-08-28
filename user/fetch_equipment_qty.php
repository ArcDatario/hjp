<?php
// Connect to your database
include "conn.php";

// Fetch equipment quantity based on equipmentId
if (isset($_POST['equipmentId'])) {
    $equipmentId = $_POST['equipmentId'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
    $stmt->bind_param("i", $equipmentId);

    // Execute SQL statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($equipmentQty);

    // Fetch value
    $stmt->fetch();

    // Close statement
    $stmt->close();

    // Return equipment quantity
    echo $equipmentQty;
} else {
    echo "Error: Equipment ID not provided.";
}

// Close connection
$conn->close();
?>
