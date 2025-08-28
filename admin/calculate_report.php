<?php


include "conn.php";


$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];


$end_date_adjusted = date('Y-m-d', strtotime($end_date . ' +1 day'));


$sql = "SELECT SUM(total) AS total_rental FROM rental WHERE date >= '$start_date' AND date < '$end_date_adjusted' AND paid_status = 'Paid'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_rental = $row["total_rental"];
    echo $total_rental;
} else {
    echo "0"; 
}

$conn->close();
?>
