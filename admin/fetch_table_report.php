<?php

include "conn.php";

// Check if start_date and end_date are set and not empty
if(isset($_POST["start_date"]) && isset($_POST["end_date"]) && !empty($_POST["start_date"]) && !empty($_POST["end_date"])) {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

    $end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));

    $sql = "SELECT equipment_name, SUM(total) AS total_sum FROM rental WHERE rental.paid_date >= '$start_date' AND rental.paid_date < '$end_date_adjusted' GROUP BY equipment_name";
    $result = $conn->query($sql);
    $tableContent = ""; 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Append table rows with equipment name and total sum to the table content variable
            $tableContent .= '<tr>
                                <th scope="row">' . $row['equipment_name'] . '</th>
                                <td>' . $row['total_sum'] . '</td>
                              </tr>';
        }
    } else {
        // If no data found, display a single table row with a message
        $tableContent .= '<tr>
                            <td colspan="2">No data found</td>
                          </tr>';
    }

    // Echo the table content
    echo $tableContent;
} else {
    // If start_date or end_date is not set or empty, return error message
    echo "Error: Missing start_date or end_date parameters.";
}

?>
