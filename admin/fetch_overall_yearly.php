<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Get the current year and the previous year
$current_year = date("Y");
$previous_year = $current_year - 1;

// Query to get the total revenue for the current year from orders
$query_current_year_orders = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_year FROM orders WHERE status = 'Completed' AND YEAR(completed_date) = '$current_year'";
$result_current_year_orders = mysqli_query($conn, $query_current_year_orders);
$row_current_year_orders = mysqli_fetch_assoc($result_current_year_orders);
$total_revenue_current_year_orders = $row_current_year_orders['total_revenue_current_year'];

// Query to get the total revenue for the previous year from orders
$query_previous_year_orders = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_year FROM orders WHERE status = 'Completed' AND YEAR(completed_date) = '$previous_year'";
$result_previous_year_orders = mysqli_query($conn, $query_previous_year_orders);
$row_previous_year_orders = mysqli_fetch_assoc($result_previous_year_orders);
$total_revenue_previous_year_orders = $row_previous_year_orders['total_revenue_previous_year'];

// Query to get the total revenue for the current year from rental
$query_current_year_rental = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_year FROM rental WHERE paid_status = 'Paid' AND YEAR(paid_date) = '$current_year'";
$result_current_year_rental = mysqli_query($conn, $query_current_year_rental);
$row_current_year_rental = mysqli_fetch_assoc($result_current_year_rental);
$total_revenue_current_year_rental = $row_current_year_rental['total_revenue_current_year'];

// Query to get the total revenue for the previous year from rental
$query_previous_year_rental = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_year FROM rental WHERE paid_status = 'Paid' AND YEAR(paid_date) = '$previous_year'";
$result_previous_year_rental = mysqli_query($conn, $query_previous_year_rental);
$row_previous_year_rental = mysqli_fetch_assoc($result_previous_year_rental);
$total_revenue_previous_year_rental = $row_previous_year_rental['total_revenue_previous_year'];

// Close the database connection
mysqli_close($conn);

// Calculate the total revenue for the current year and the previous year
$total_revenue_current_year = $total_revenue_current_year_orders + $total_revenue_current_year_rental;
$total_revenue_previous_year = $total_revenue_previous_year_orders + $total_revenue_previous_year_rental;

// Calculate the percentage change
if ($total_revenue_previous_year != 0) {
    $percentage_change = (($total_revenue_current_year - $total_revenue_previous_year) / $total_revenue_previous_year) * 100;
    // Round the percentage change to a whole number
    $percentage_change = round($percentage_change);
} else {
    // Set percentage change to 100% if previous year's revenue is zero
    $percentage_change = 100;
}

$sign = ($percentage_change >= 0) ? '+' : '-';
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

echo'<div id="overall_yearly">';
echo '<span class="' . $class . ' small pt-1 fw-bold" id="overall_percentage_year" style="color:black; float:right; margin-top:14%; font-size:0.8rem;">'. $sign . abs($percentage_change) . '%</span>';
echo '<h5 id="overall_sales_year" style="font-size:1.1rem;">₱' . number_format($total_revenue_current_year, 0) . '</h5>';
echo'</div>';
?>
