<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Assuming you have a database connection established
include "conn.php";
// Query to select distinct equipment_name and the sum of total for each equipment_name
$query = "SELECT equipment_name, SUM(total) AS total_sum FROM rental GROUP BY equipment_name";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // Start constructing the HTML table
    echo "<table>\n";
    echo "<th>Equipment Name</th>\n<th>Total</th>\n<tbody>\n";

    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>\n";
        echo "<td>" . $row['equipment_name'] . "</td>\n";
        echo "<td>" . $row['total_sum'] . "</td>\n";
        echo "</tr>\n";
    }

    echo "</tbody>\n</table>";
} else {
    
    echo "Error retrieving data from the database: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>


</body>
</html>