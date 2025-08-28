<?php
include "conn.php";

// Set the timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

// Adjust the end date to include the entire end date day
$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));

// Modify the SQL query to include ordering by status with the specific order
$sql = "SELECT equipment_name, total, status, summary, date
        FROM rental 
        WHERE rental.date >= '$start_date' AND rental.date < '$end_date_adjusted' 
        ORDER BY FIELD(status, 'Completed', 'Paid', 'Pending', 'Cancelled'), total DESC"; // Ordering by status and then total

$result = $conn->query($sql);

$rentalData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rentalData[] = $row;
    }
}

echo json_encode($rentalData);

$conn->close();
?>
