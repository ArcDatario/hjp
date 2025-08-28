<?php
session_start();
include "conn.php";

// Assuming $rentalDetails is an associative array containing rental details
$rentId = $_POST['rentId'];
$rentalDetails = array(
    'Rent ID' => $rentId,
    'Equipment' => 'Excavator',
    'Start Date' => '2024-05-01',
    'End Date' => '2024-05-05',
    'Duration' => '5 days',
    'Total' => '₱5000',
    'Status' => 'Approved',
    'Approved Date' => '2024-04-28',
    'Paid Date' => '2024-04-30',
    'Completed Date' => '2024-05-06'
);

// Convert the rental details array to JSON format
$rentalDetailsJSON = json_encode($rentalDetails);

// Send the JSON response
header('Content-Type: application/json');
echo $rentalDetailsJSON;
?>
