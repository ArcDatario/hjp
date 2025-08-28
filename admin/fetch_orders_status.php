<?php
include "conn.php";

// Get the start and end dates from the POST data
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));


$sql = "SELECT 
            SUM(CASE WHEN status = 'On Delivery' THEN 1 ELSE 0 END) AS on_delivery_orders,
            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_orders,
            SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed_orders,
            SUM(CASE WHEN status = 'Cancelled' THEN 1 ELSE 0 END) AS cancelled_orders
        FROM orders
        WHERE date >= '$start_date' AND date < '$end_date_adjusted'";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch associative array
    $row = $result->fetch_assoc();
    
    // Construct result array
    $orders_status_count = array(
        "on_delivery_orders" => $row["on_delivery_orders"],
        "pending_orders" => $row["pending_orders"],
        "completed_orders" => $row["completed_orders"],
        "cancelled_orders" => $row["cancelled_orders"]
    );
    
    // Convert associative array to JSON format
    echo json_encode($orders_status_count);
} else {
    // If no results, return empty JSON object
    echo json_encode(array());
}

// Close database connection
$conn->close();
?>
