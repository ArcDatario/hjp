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

    // Query to fetch the total and occupied date from the bookings table for the current month
    $query = "SELECT total, paid_date FROM rental WHERE DATE_FORMAT(paid_date, '%Y-%m') = DATE_FORMAT('$start_date', '%Y-%m') AND paid_status='Paid' ";
    $result = mysqli_query($conn, $query);

    // Initialize an array to store the monthly total revenue and occupied dates
    $monthly_total = [];
    $occupied_dates = [];

    // Fetch and store the total revenue and occupied dates for each booking in the current month
    while ($row = mysqli_fetch_assoc($result)) {
        $monthly_total[] = $row['total'];
        $occupied_dates[] = $row['paid_date'];
    }

    // Store the monthly total revenue and occupied date data in the monthly_data array
    $monthly_data[] = [
        'name' => date("F", strtotime("$current_year-$month-01")), // Month name
        'data' => $monthly_total,
        'occupied_date' => $occupied_dates
    ];
}

// Close the database connection
mysqli_close($conn);

// Return the monthly data as JSON
echo json_encode($monthly_data);
?>
