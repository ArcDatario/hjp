<?php
// Database connection
include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve POST data
    $equipmentId = $_POST['equipment_id'];
    $userId = $_POST['user_id'];
   
    // Update rental status and return status to mark the rent as completed
    $updateEquipmentSql = "UPDATE rental SET status = 'Completed', return_status = 'Returned',completed_status = 'Completed', return_date = NOW(), completed_date = NOW() WHERE id = $equipmentId ";

    if ($conn->query($updateEquipmentSql) === TRUE) {
        // Update equipment quantity
        $updateQuery = "UPDATE equipment_tbl SET equipment_qty = equipment_qty + 1 WHERE id = (SELECT equipment_id FROM rental WHERE id = $equipmentId)";
        if (!$conn->query($updateQuery)) {
            echo "Failed to update equipment quantity: " . $conn->error;
            exit();
        }

        // Fetch rental details
        $getEmailSql = "SELECT rental.id as rent_id,rental.equipment_id as id_equipment, rental.user_id, users_acc.user_name, rental.user_id, rental.user_email, rental.summary, rental.total, rental.rent_start_date, rental.rent_end_date,
                         equipment_tbl.image, equipment_tbl.equipment  
                        FROM rental 
                        INNER JOIN equipment_tbl ON rental.equipment_id = equipment_tbl.id
                        INNER JOIN users_acc ON rental.user_id = users_acc.id
                        WHERE rental.id = $equipmentId AND rental.user_id = users_acc.id";

        $result = $conn->query($getEmailSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $rent_id = $row['rent_id'];

            $equipmentId = $row['id_equipment'];
            $equipmentName = $row['equipment'];
            $customerName = $row['user_name'];
            $customerEmail = $row['user_email'];
            $rentStartDate = formatDate($row['rent_start_date']);
            $rentEndDate = formatDate($row['rent_end_date']);
            $message = "Thank you for renting our equipment! We're honored to support your project and are here to ensure everything runs smoothly. Should you need assistance, feel free to reach out. We look forward to a successful collaboration.";

            
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
            $mail->Subject = "Your Rent has been Completed";
            $mail->Body = "     
                            <h1 style='color:green;'>✔</h1>
                            <h2>Your Rent has been Completed. Rent #$equipmentId</h2>
                            <h3>Dear: $customerName </h3> 
                            <h3>Thank you for renting $equipmentName </h3> 
                            <h3 style='font-weight:400;'>We're thrilled to inform you that your equipment rental with <span style='font-weight:600;'> Hjp Heavy Equipment Rental Services </span> has been successfully completed! We sincerely hope that our services have contributed to the smooth progress of your project. Should you require our assistance in the future or have any feedback for us, please don't hesitate to reach out. Thank you once again for choosing us as your rental provider. Wishing you continued success in all your endeavors.You can also Use this as a receipt Rent #$rent_id</h3>
                            
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
        return ""; 
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
