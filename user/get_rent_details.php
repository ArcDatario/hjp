<?php
session_start();
include 'conn.php'; 


$rentId = $_POST['rent_id'];


$sql = "SELECT id, date, approved_date, paid_date, completed_date FROM rental WHERE id = $rentId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $rentDetails = $result->fetch_assoc();

 
    echo json_encode($rentDetails);
} else {

    echo json_encode(array('error' => 'Booking not found'));
}


$conn->close();
?>
