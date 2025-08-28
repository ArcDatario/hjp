<?php
include "conn.php";

// Set the timezone to Asia/Manila
date_default_timezone_set('Asia/Manila');

// Query to fetch individual income grouped by month and ordered by the latest month first
$sql = "
    SELECT id,
        DATE_FORMAT(completed_date, '%Y-%m') AS rental_month, 
        total AS individual_income
    FROM 
        rental
    WHERE 
        status = 'Completed'
    ORDER BY 
        rental_month DESC, 
        completed_date DESC
";

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'month' => $row['rental_month'],
            'income' => $row['individual_income'],
            'id' => $row['id']
        ];
    }
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
