<?php
include "conn.php";

// Get the start and end dates from the POST data
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));


$sql = "SELECT 
            SUM(CASE WHEN status = 'Paid' THEN 1 ELSE 0 END) AS paid_count,
            SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_count,
            SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed_count,
            SUM(CASE WHEN status = 'Cancelled' THEN 1 ELSE 0 END) AS cancelled_count
        FROM rental
        WHERE date >= '$start_date' AND date < '$end_date_adjusted'";

$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch associative array
    $row = $result->fetch_assoc();
    
    // Construct result array
    $status_counts = array(
        "paid_count" => $row["paid_count"],
        "pending_count" => $row["pending_count"],
        "completed_count" => $row["completed_count"],
        "cancelled_count" => $row["cancelled_count"]
    );
    
    // Convert associative array to JSON format
    echo json_encode($status_counts);
} else {
    // If no results, return empty JSON object
    echo json_encode(array());
}

// Close database connection
$conn->close();
?>
