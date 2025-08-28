<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

$query_overall_rental_revenue = "SELECT IFNULL(SUM(total), 0) as overall_rental_revenue FROM rental WHERE status IN ('Paid','Completed')";
$result_overall_rental_revenue = mysqli_query($conn, $query_overall_rental_revenue);
$row_overall_rental_revenue = mysqli_fetch_assoc($result_overall_rental_revenue);
$overall_rental_revenue = $row_overall_rental_revenue['overall_rental_revenue'];

$query_overall_order_revenue = "SELECT IFNULL(SUM(total), 0) as overall_order_revenue FROM orders WHERE status = 'Completed'";
$result_overall_order_revenue = mysqli_query($conn, $query_overall_order_revenue);
$row_overall_order_revenue = mysqli_fetch_assoc($result_overall_order_revenue);
$overall_order_revenue = $row_overall_order_revenue['overall_order_revenue'];

$overall_total_revenue = $overall_rental_revenue + $overall_order_revenue;

echo'<div id="overall_sales_orders_rent">';
echo '<h5 id="overall_total_sales" style="font-size:1.1rem;">₱' . number_format($overall_total_revenue, 0) . '</h5>';
echo'</div>';
mysqli_close($conn);
?>
