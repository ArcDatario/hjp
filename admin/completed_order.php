<?php
// Database connection
include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $OrderId = $_POST['order_id'];

    // Update booking status to "Approved" in bookings table
    $updateOrderSql = "UPDATE orders SET status = 'Completed',   completed_date = NOW() WHERE id = $OrderId ";

    if ($conn->query($updateOrderSql) === TRUE) {
        // Get customer email, check-in date, and check-out date from the database based on booking ID
        $getEmailSql = "SELECT orders.id as order_id, orders.user_id, orders.user_email, orders.sand_id, orders.summary, orders.total, orders.municipality,
        orders.barangay, orders.details, orders.status, users_acc.user_name, users_acc.phone, sand_tbl.sand, orders.downpayment, orders.first_total
        FROM orders
        INNER JOIN sand_tbl ON orders.sand_id = sand_tbl.id
        INNER JOIN users_acc ON orders.user_id = users_acc.id 
        Where orders.id='$OrderId'";

        $result = $conn->query($getEmailSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $order_id = $row['order_id'];
            $Order_name = $row['sand'];
            $Order_summary = $row['summary'];
            $Order_total = $row['total'];
            $customerName = $row['user_name'];
            $customerEmail = $row['user_email'];
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
            $mail->Subject = "Order Completed!";
            $mail->Body = "     
                            <h1 style='color:green;'>✔</h1>
                            <h2>We're thrilled to inform you that your order has been successfully completed!</h2>
                            <h2>Order #$order_id</h2>
                            <h2>$Order_name</h2>
                            <h2><span>$Order_summary</span></h2>
                            <h2><span>₱$Order_total</span></h2>
                            <h4 style='font-weight:400;'>
                            We hope that the products you received meet 
                            your expectations and serve your needs effectively, 
                            as your satisfaction is our top priority. We're delighted
                             to have had the opportunity to fulfill your order. 
                             If you have any feedback or questions about your order 
                             or our services, please don't hesitate to reach out; we 
                             value your input and are committed to continuously 
                             improving our products and services to better serve you. 
                             Once again, thank you for choosing <span font-weight:700;> HjP Heavy Equipment Rental Services</span>; 
                             we sincerely appreciate your business and look forward to 
                             serving you again in the future.  
                             <span style='font-weight:700; text-decoration:underline;' > Order #$order_id</span> </h4>
                            
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
