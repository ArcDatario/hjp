<?php
include "conn.php";

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

// Adjust the end date to include the entire end date day
$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));

// Modify the SQL query to include ordering by status with the specific order
$sql = "SELECT sand_name, total, status ,summary
        FROM orders 
        WHERE date >= '$start_date' AND date < '$end_date_adjusted' 
        ORDER BY FIELD(status, 'Completed', 'Pending', 'Cancelled', 'On Delivery'), total DESC"; // Ordering by status and then total

$result = $conn->query($sql);

$ordersData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ordersData[] = $row;
    }
}

echo json_encode($ordersData);

$conn->close();
?>
