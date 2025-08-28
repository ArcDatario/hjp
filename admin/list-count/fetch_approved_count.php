<?php
// Assuming you have already established a connection to your database
include "conn.php";

// Perform a SQL query to count rentals with status "Approved"
$sql = "SELECT COUNT(*) AS approved_count FROM rental WHERE status='Approved'";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the count from the result set
    $row = mysqli_fetch_assoc($result);
    $approved_count = $row['approved_count'];

    // Output the count
    echo $approved_count;
} else {
    // If there's an error in the query, handle it accordingly
    echo "Error";
}
?>
