<?php
// Include your database connection file
include "../conn.php";

date_default_timezone_set('Asia/Manila');

// Query to get the overall revenue
$query_overall_revenue = "SELECT IFNULL(SUM(total), 0) as overall_revenue FROM rental WHERE status IN ('Paid','Completed')";
$result_overall_revenue = mysqli_query($conn, $query_overall_revenue);
$row_overall_revenue = mysqli_fetch_assoc($result_overall_revenue);
$overall_revenue = $row_overall_revenue['overall_revenue'];

// Close the database connection
mysqli_close($conn);

// Encode data as JSON and send it back
echo json_encode([
    'overall_revenue' => $overall_revenue
]);
?>
