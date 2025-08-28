<?php
include "conn.php";

$sql = "SELECT id, equipment_qty, rate_category FROM equipment_tbl";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
?>