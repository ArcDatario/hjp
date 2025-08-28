<?php
// Include your database connection file
date_default_timezone_set('Asia/Manila');

include "../conn.php";

// Initialize an array to store the monthly data
$monthly_data = [];

// Get the current year
$current_year = date("Y");

// Loop through each month
for ($month = 1; $month <= 12; $month++) {
    // Construct the start and end dates of the month
    $start_date = date("Y-m-01", strtotime("$current_year-$month-01"));
    $end_date = date("Y-m-t", strtotime("$current_year-$month-01"));

    
    $query = "SELECT first_total, completed_date FROM orders WHERE DATE_FORMAT(completed_date, '%Y-%m') = DATE_FORMAT('$start_date', '%Y-%m') AND status='Completed' ";
    $result = mysqli_query($conn, $query);

    // Initialize an array to store the monthly total revenue for each distinct order number in the current month
    $monthly_total = [];

    // Fetch and store the monthly total revenue for each distinct order number in the current month
    while ($row = mysqli_fetch_assoc($result)) {
        $monthly_total[] = $row['first_total'];
    }

    // Store the monthly total revenue in the monthly_data array
    $monthly_data[] = [
        'name' => date("F", strtotime("$current_year-$month-01")), // Month name
        'data' => $monthly_total,
    ];
}

// Close the database connection
mysqli_close($conn);

// Return the monthly data as JSON
echo json_encode($monthly_data);
?>
