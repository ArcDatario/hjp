<?php
include "conn.php";

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));

$sql = "SELECT equipment_name, total , summary
        FROM rental 
        WHERE rental.paid_date >= '$start_date' AND rental.paid_date < '$end_date_adjusted' 
        ORDER BY total DESC"; // Ordering by total value in descending order
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
