<?php
include "conn.php";

$equipment_id = $_POST["equipment_id"];

$sql = "SELECT equipment_name FROM rental WHERE equipment_id = '$equipment_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["equipment_name"];
} else {
    echo "Equipment name not found";
}

$conn->close();
?>
