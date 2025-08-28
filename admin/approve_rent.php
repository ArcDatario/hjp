<?php
// Database connection
include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate input
    $equipmentId = isset($_POST['equipment_id']) ? intval($_POST['equipment_id']) : 0;
    $downpayment = isset($_POST['downpayment']) ? floatval($_POST['downpayment']) : 0;

    if ($equipmentId <= 0 || $downpayment <= 0) {
        echo "invalid_input";
        exit();
    }

    // Fetch the total amount for the rental
    $getTotalSql = "SELECT first_total FROM rental WHERE id = ?";
    $stmt = $conn->prepare($getTotalSql);
    $stmt->bind_param("i", $equipmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "not_found";
        exit();
    }

    $row = $result->fetch_assoc();
    $totalAmount = floatval($row['first_total']);

    // Ensure the downpayment is valid
    if ($downpayment > $totalAmount) {
        echo "invalid_downpayment";
        exit();
    }

    // Calculate the remaining amount
    $remainingAmount = $totalAmount - $downpayment;

    // Update the rental record with the downpayment and approve the rental
    $updateRentalSql = "
    UPDATE rental 
    SET 
        status = 'Approved',
        approved_status = 'Approved',
        approved_date = NOW(),
        downpayment = ?, 
        first_total = ? 
    WHERE id = ?
";
    $stmt = $conn->prepare($updateRentalSql);
    $stmt->bind_param("ddi",$downpayment, $remainingAmount, $equipmentId);

    if ($stmt->execute()) {
        // Fetch customer email and rental details for the notification
        $getEmailSql = "
            SELECT 
                rental.id AS rent_id, 
                rental.user_email, 
                rental.summary, 
                rental.rent_start_date, 
                rental.rent_end_date, 
                rental.equipment_load,
                rental.total,
                equipment_tbl.equipment
            FROM rental 
            INNER JOIN equipment_tbl ON rental.equipment_id = equipment_tbl.id 
            WHERE rental.id = ?
        ";
        $stmt = $conn->prepare($getEmailSql);
        $stmt->bind_param("i", $equipmentId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Prepare email details
            $rent_id = $row['rent_id'];
            $equipment_name = $row['equipment'];
            $summary = $row['summary'];
            $total = $row['total'];
            $rent_start_date = formatDate($row['rent_start_date']);
            $rent_end_date = formatDate($row['rent_end_date']);
            $equipment_load = $row['equipment_load'];
            $customerEmail = $row['user_email'];

            // Decide whether to show the start and end date or load based on the date values
            if ($rent_start_date === "" || $rent_end_date === "") {
                $datesHtml = "<li><strong>Load:</strong> $equipment_load</li>";
            } else {
                $datesHtml = "
                    <li><strong>Start Date:</strong> $rent_start_date</li>
                    <li><strong>End Date:</strong> $rent_end_date</li>
                ";
            }
            
            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'myphpproject2023@gmail.com';  // Replace with your email
                $mail->Password = 'eyufnbejzlkzgujl';  // Replace with your App password
                $mail->Port = 465;
                $mail->SMTPSecure = 'ssl';
                $mail->isHTML(true);
                $mail->setFrom('myphpproject2023@gmail.com', 'HjP Heavy Equipment Rental Services');
                $mail->addAddress($customerEmail);
                $mail->Subject = "Your Rent has been Approved";

                // Email Body
                $mail->Body = "
                     <h2>Rent Approved! Rent #$rent_id</h2>
                     
                     <p>Thank you for choosing HJP Heavy Equipment Rental Services. By proceeding with the rental, you’ve acknowledged and accepted our terms and conditions.</p>
                     <p>Your downpayment has been successfully processed and will be deducted from your remaining balance. Please keep this email as your official receipt. Rental ID: <strong>$rent_id</strong>.</p>
                      <p><strong>The daily rate applies from 7:00 AM to 4:00 PM. Please note that, as stated in the terms and conditions, the equipment operator is required to take a lunch break between 12:00 PM and 1:00 PM during this period.</strong></p>
                      <p>The declared working hours are 8 hours per day, based on the daily rate.</p>

                     <p><strong>Rent Details:</strong></p>
                     <ul>
                         <li><strong>Equipment:</strong> $equipment_name</li>
                         $datesHtml
                         <li><strong>Summary:</strong> $summary</li>
                         <li><strong>Total:</strong> ₱" . number_format($total, 2) . "</li>
                         <li><strong>Downpayment:</strong> ₱" . number_format($downpayment, 2) . "</li>
                         <li><strong>Remaining Amount:</strong> ₱" . number_format($remainingAmount, 2) . "</li>
                     </ul>
                     <p>If you have any questions or need further assistance, please contact our support team at support@hjp.com.</p>
                     <p>Thank you again for your trust and support.</p>
                     <p>Best regards,</p>
                     <p><strong>HJP Heavy Equipment Rental Services</strong></p>
                 ";
                $mail->send();
                echo "success"; // Success response
            } catch (Exception $e) {
                echo "email_failed: " . $mail->ErrorInfo; // Detailed error message
            }
        } else {
            echo "email_data_not_found"; // If rental data was not found
        }
    } else {
        echo "update_failed"; // If the rental record update failed
    }

    $conn->close();
} else {
    echo "invalid_request"; // Invalid request type
    exit();
}

// Function to format dates
function formatDate($dateString) {
    if ($dateString === "0000-00-00") {
        return ""; // Return blank if the date is "0000-00-00"
    } else {
        $date = strtotime($dateString);
        return date("F j, Y", $date); // Format as "November 16, 2024"
    }
}
?>
