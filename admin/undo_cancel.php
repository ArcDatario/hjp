<?php
// Database connection
include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $equipmentId = $_POST['equipment_id'];

    // Update booking status to "Approved" in bookings table
    $updateEquipmentSql = "UPDATE rental SET status = 'Pending', cancelled_status = 'Not_Cancelled' WHERE id = $equipmentId ";

  if ($conn->query($updateEquipmentSql) === TRUE) {
    echo "success";
    exit(); 
  }
} else {
    echo "error_request";
    exit(); 
}

function formatDate($dateString) {
    $date = strtotime($dateString);
    if (date("H:i:s", $date) == "00:00:00") {
        return date("M j, Y", $date);
    } else {
        return date("M j, Y - h a", $date);
    }
}

?>
