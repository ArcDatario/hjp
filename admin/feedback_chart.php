<?php
// Include the database connection
include "conn.php";

// Query to get distinct likert values and their counts
$sql = "SELECT likert, COUNT(likert) AS total_likert FROM feedbacks_tbl GROUP BY likert";
$result = $conn->query($sql);

$likertData = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $likertData[] = array(
      "likert" => $row["likert"],
      "total_likert" => $row["total_likert"]
    );
  }
}

$conn->close();

// Output JSON encoded data
header('Content-Type: application/json');
echo json_encode($likertData);
?>
