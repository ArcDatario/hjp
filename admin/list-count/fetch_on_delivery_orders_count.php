<?php
// Assuming you have already established a connection to your database
include "conn.php";

// Perform a SQL query to count orders with status "On Delivery"
$sql = "SELECT COUNT(*) AS on_delivery_count FROM orders WHERE status='On Delivery'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the count from the result set
    $row = mysqli_fetch_assoc($result);
    $on_delivery_count = $row['on_delivery_count'];

    // Output the count
    echo $on_delivery_count;
} else {
    // If there's an error in the query, handle it accordingly
    echo "Error";
}
?>
