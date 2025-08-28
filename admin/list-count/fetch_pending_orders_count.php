<?php
// Assuming you have already established a connection to your database
include "conn.php";

// Perform a SQL query to count orders with status "Pending"
$sql = "SELECT COUNT(*) AS pending_count FROM orders WHERE status='Pending'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the count from the result set
    $row = mysqli_fetch_assoc($result);
    $pending_count = $row['pending_count'];

    // Output the count
    echo $pending_count;
} else {
    // If there's an error in the query, handle it accordingly
    echo "Error";
}
?>
