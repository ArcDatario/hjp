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
    $updateOrderSql = "UPDATE orders SET status = 'On Delivery',   on_delivery_date = NOW() WHERE id = $OrderId ";

    if ($conn->query($updateOrderSql) === TRUE) {
        // Get customer email, check-in date, and check-out date from the database based on booking ID
        $getEmailSql = "SELECT orders.id as order_id, orders.user_id, orders.user_email, orders.sand_id, orders.summary, orders.total, orders.municipality,
        orders.barangay, orders.details, orders.status, users_acc.user_name, users_acc.phone, sand_tbl.sand
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
            $municipality = $row['municipality'];
            $barangay = $row['barangay'];
            $street = $row['details'];
            $customerName = $row['user_name'];
            $customerEmail = $row['user_email'];
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
            $mail->Subject = "Your Order is On Delivery";
            $mail->Body = "     
                            <h1 style='color:green;'>✔</h1>
                            <h2>Dear: $customerName</h2>
                            <h2>Your Order is On Delivery. Order #$order_id</h2>
                            <h2>$Order_name</h2>
                            <h2><span style='font-weight:700;'>$Order_summary</span>  - <span style='font-weight:700;'>Total:₱$Order_total</span></h2>
    
                            <h3>Please Prepare <span style='color:#0B88D5; text-decoration:underline;' >₱$Order_total</span> as your Total to be paid</h3>
                            <h4 style='font-weight:400;'>
                            Your Order $Order_summary of $Order_name is on Delivery. 
                            <span style='font-weight:700;'>Will be Delivered at this Address:$barangay, $municipality - $street </span>
                            <span style='font-weight:700;'> HjP Heavy Equipment Rental Services</span>.  <span style='font-weight:700; text-decoration:underline;' > Order #$order_id</span> </h4>
                            
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
