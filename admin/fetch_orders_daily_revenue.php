<?php
// Include your database connection file
include "conn.php";

date_default_timezone_set('Asia/Manila');

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM orders WHERE DATE(completed_date) = '$today_revenue' AND status = 'Completed'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die('Error fetching today\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(completed_date) = '$yesterday_revenue' AND status = 'Completed'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die('Error fetching yesterday\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_yesterday = mysqli_fetch_assoc($result_revenue_yesterday);
$total_revenue_yesterday = $row_revenue_yesterday['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

$percentage_change = round($percentage_change);

$sign = ($percentage_change >= 0) ? '+' : '-';
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

$total_revenue_html = '<h5 id="orders_sales_today" style="font-size:1.1rem;">₱' . number_format($total_revenue_today, 0) . '</h5>';
// Construct HTML for percentage change
$percentage_html = '<span class="' . $class . ' small pt-1 fw-bold" style="color:black; float:right; margin-top:3.8%; font-size:0.8rem;" id="orders_percentage_today">' . $sign . abs($percentage_change) . '%</span>';
// Construct HTML for total revenue


// Encode data as JSON and send it back
echo json_encode([
    'percentage_html' => $percentage_html,
    'total_revenue_today' => $total_revenue_today,
    'total_revenue_html' => $total_revenue_html
]);
?>
