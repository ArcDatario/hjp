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
    $updateEquipmentSql = "UPDATE rental SET status = 'Approved', approved_status = 'Approved',  approved_date = NOW() WHERE id = $equipmentId ";

    if ($conn->query($updateEquipmentSql) === TRUE) {
        // Get customer email, check-in date, and check-out date from the database based on booking ID
        $getEmailSql = "SELECT rental.id as rent_id,rental.user_email, rental.summary, rental.total, rental.rent_start_date, rental.rent_end_date, equipment_tbl.image ,equipment_tbl.equipment  
                FROM rental 
                INNER JOIN equipment_tbl ON rental.equipment_id = equipment_tbl.id 
                WHERE rental.id = $equipmentId";

        $result = $conn->query($getEmailSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $rent_id = $row['rent_id'];
            $equipment_image = $row['image'];
            $equipment_name = $row['equipment'];
            $equipment_summary = $row['summary'];
            $equipment_total = $row['total'];
            $customerEmail = $row['user_email'];
            $rent_start_date = formatDate($row['rent_start_date']);
            $rent_end_date = formatDate($row['rent_end_date']);
            $message = "Thank you for renting our equipment! We're honored to support your project and are here to ensure everything runs smoothly. Should you need assistance, feel free to reach out. We look forward to a successful collaboration.";

            // Send email to the customer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'myphpproject2023@gmail.com';
            $mail->Password = 'eyufnbejzlkzgujl';
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';
            $mail->isHTML(true);
            $mail->setFrom('aeclothing26@gmail.com', 'HjP Heavy Equipment Rental Services');
            $mail->addAddress($customerEmail);
            $mail->Subject = "Your Rent has been approved";
            $mail->Body = "     
                            <h1 style='color:green;'>✔</h1>
                            <h2>Your  Rent  has been approved. Rent #$equipmentId</h2>
                            <h2><span style='color:green;'>$rent_start_date</span>  - <span style='color:red;'>$rent_end_date</span></h2>
                            <h4>Duration: $equipment_summary</h4>
                            <h3>Please Prepare <span style='color:#0B88D5; text-decoration:underline;' >₱$equipment_total</span> to rent <span style='text-decoration:underline;'>$equipment_name</span> </h3>
                            <h4 style='font-weight:400;'>Thank you for renting our equipment! We're honored to support your project and are here to ensure everything runs smoothly. Should you need assistance, feel free to reach out. We look forward to a successful collaboration. You can also use this email to show on our front desk that your rent request has been approve <span style='font-weight:700; text-decoration:underline;' >Rent #$rent_id</span> </h4>
                            
            ";
            $mail->send();
        }
        
        $conn->close();
        
        echo "success";
        exit(); 
    } else {
        echo "error_booking";
        exit(); 
    }
} else {
    echo "error_request";
    exit(); 
}

function formatDate($dateString) {
    if ($dateString == "0000-00-00 00:00:00") {
        return ""; // Return blank if the date is "0000-00-00 00:00:00"
    } else {
        $date = strtotime($dateString);
        if (date("H:i:s", $date) == "00:00:00") {
            return date("M j, Y", $date);
        } else {
            return date("M j, Y - h a", $date);
        }
    }
}

?>
