<?php
// Establish database connection (replace with your credentials)
include "conn.php";

// Query to count sentiment analysis values (Positive, Neutral, Negative)
$sql_analysis = "SELECT analysis, Count(analysis) AS total_analysis FROM feedbacks_tbl GROUP BY analysis";
$result_analysis = $conn->query($sql_analysis);

$analysisData = array();

// Fetch the sentiment data (Positive, Neutral, Negative)
if ($result_analysis->num_rows > 0) {
    while ($row = $result_analysis->fetch_assoc()) {
        $analysisData[] = array(
            "analysis" => $row["analysis"],
            "total_analysis" => $row["total_analysis"]
        );
    }
}

$conn->close();

// Output the analysis data as JSON
header('Content-Type: application/json');
echo json_encode($analysisData);
?>
