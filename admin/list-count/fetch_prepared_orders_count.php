<?php
// Assuming you have already established a connection to your database
include "conn.php";

// Perform a SQL query to count orders with status "Prepared"
$sql = "SELECT COUNT(*) AS prepared_count FROM orders WHERE status='Prepairing'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the count from the result set
    $row = mysqli_fetch_assoc($result);
    $prepared_count = $row['prepared_count'];

    // Output the count
    echo $prepared_count;
} else {
    // If there's an error in the query, handle it accordingly
    echo "Error";
}
?>
