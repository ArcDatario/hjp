<?php
include "conn.php"; 

$sql = "SELECT category, COUNT(*) AS search_count FROM search_tbl GROUP BY category ORDER BY search_count DESC";
$result = $conn->query($sql);

$total_count = 0;
$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $total_count += $row['search_count'];
        $data[$row['category']] = $row['search_count'];
    }
}

// Calculate percentages
foreach ($data as $category => $count) {
    $data[$category] = ($count / $total_count) * 100;
}

$conn->close();

echo json_encode($data);
?>
