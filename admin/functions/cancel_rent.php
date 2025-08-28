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
    $updateEquipmentSql = "UPDATE rental SET status = 'Cancelled', cancelled_status = 'Cancelled',  cancelled_date = NOW() WHERE id = $equipmentId ";

    if ($conn->query($updateEquipmentSql) === TRUE) {
        // Get customer email, check-in date, and check-out date from the database based on booking ID
        $getEmailSql = "SELECT rental.user_email, rental.summary, rental.total, rental.rent_start_date, rental.rent_end_date, equipment_tbl.image ,equipment_tbl.equipment  
                FROM rental 
                INNER JOIN equipment_tbl ON rental.equipment_id = equipment_tbl.id 
                WHERE rental.id = $equipmentId";

        $result = $conn->query($getEmailSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
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
            $mail->setFrom('myphpproject2023@gmail.com', 'HjP Heavy Equipment Rental Services');
            $mail->addAddress($customerEmail);
            $mail->Subject = "Your Rent has been approved";
            $mail->Body = "   

            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <script src='https://unpkg.com/boxicons@2.1.4/dist/boxicons.js'></script>
            </head>
            <body>
                                        <h1 style='color:Red;'><i class='bx bx-error-circle'></i></h1>
                                        <h2>Your  Rent  has been Cancelled. Rent #$equipmentId</h2>
                                        <h2><span style='color:green;'>$rent_start_date</span>  - <span style='color:red;'>$rent_end_date</span></h2>
                                        <h4>Duration: $equipment_summary</h4>
                                        <h3> $equipment_name</h3>
                                        <h4 style='font-weight:400;'>Sorry! I regret to inform you that due to unforeseen circumstances, we must cancel your equipment rental reservation. We apologize for any inconvenience this may cause and assure you that we are available to assist you with alternative solutions or to address any concerns you may have. Please feel free to contact us at your earliest convenience to discuss further options. Thank you for your understanding.</h4>
            </body>
            </html>
                            
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
    $date = strtotime($dateString);
    if (date("H:i:s", $date) == "00:00:00") {
        return date("M j, Y", $date);
    } else {
        return date("M j, Y - h a", $date);
    }
}
?>
