<?php
// Include your database connection file
include "conn.php";

date_default_timezone_set('Asia/Manila');

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today from orders
$query_revenue_today_orders = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM orders WHERE DATE(completed_date) = '$today_revenue' AND status = 'Completed'";
$result_revenue_today_orders = mysqli_query($conn, $query_revenue_today_orders);

// Check if query executed successfully for orders
if (!$result_revenue_today_orders) {
    die('Error fetching today\'s revenue from orders: ' . mysqli_error($conn));
}

$row_revenue_today_orders = mysqli_fetch_assoc($result_revenue_today_orders);
$total_revenue_today_orders = $row_revenue_today_orders['total_revenue_today'];

// Query to calculate total revenue for yesterday from orders
$query_revenue_yesterday_orders = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(completed_date) = '$yesterday_revenue' AND status = 'Completed'";
$result_revenue_yesterday_orders = mysqli_query($conn, $query_revenue_yesterday_orders);

// Check if query executed successfully for orders
if (!$result_revenue_yesterday_orders) {
    die('Error fetching yesterday\'s revenue from orders: ' . mysqli_error($conn));
}

$row_revenue_yesterday_orders = mysqli_fetch_assoc($result_revenue_yesterday_orders);
$total_revenue_yesterday_orders = $row_revenue_yesterday_orders['total_revenue_yesterday'];

// Query to calculate total revenue for today from rental
$query_revenue_today_rental = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM rental WHERE DATE(paid_date) = '$today_revenue' AND paid_status = 'Paid'";
$result_revenue_today_rental = mysqli_query($conn, $query_revenue_today_rental);

// Check if query executed successfully for rental
if (!$result_revenue_today_rental) {
    die('Error fetching today\'s revenue from rental: ' . mysqli_error($conn));
}

$row_revenue_today_rental = mysqli_fetch_assoc($result_revenue_today_rental);
$total_revenue_today_rental = $row_revenue_today_rental['total_revenue_today'];

// Query to calculate total revenue for yesterday from rental
$query_revenue_yesterday_rental = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM rental WHERE DATE(paid_date) = '$yesterday_revenue' AND paid_status = 'Paid'";
$result_revenue_yesterday_rental = mysqli_query($conn, $query_revenue_yesterday_rental);

// Check if query executed successfully for rental
if (!$result_revenue_yesterday_rental) {
    die('Error fetching yesterday\'s revenue from rental: ' . mysqli_error($conn));
}

$row_revenue_yesterday_rental = mysqli_fetch_assoc($result_revenue_yesterday_rental);
$total_revenue_yesterday_rental = $row_revenue_yesterday_rental['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Compute total revenue for today
$total_revenue_today = $total_revenue_today_orders + $total_revenue_today_rental;

// Compute total revenue for yesterday
$total_revenue_yesterday = $total_revenue_yesterday_orders + $total_revenue_yesterday_rental;

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

// Display percentage change
echo '<span class="' . $class . ' small pt-1 fw-bold" style="color:black; float:right; margin-top:7%; font-size:0.8rem;" id="overall_percentage_today">' . $sign . abs($percentage_change) . '%</span>';

// Display total revenue for today
echo '<h5 id="overall_sales_today" style="font-size:1.1rem;">₱' . number_format($total_revenue_today, 0) . '</h5>';
?>
