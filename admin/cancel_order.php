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

    // Update order status to "Cancelled" in orders table
    $updateOrderSql = "UPDATE orders SET status = 'Cancelled', cancelled_date = NOW() WHERE id = $OrderId";

    if ($conn->query($updateOrderSql) === TRUE) {
        // Get customer email and order details from the database based on order ID
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
            $customerName = $row['user_name'];
            $customerEmail = $row['user_email'];

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
            $mail->Subject = "Your Order has been Cancelled";
            $mail->Body = "     
                            <h1 style='color:red;'>✖</h1>
                            <h2>Dear $customerName,</h2>
                            <h3>Your order has been cancelled. Order #$order_id</h3>
                            <p>We regret to inform you that your order for $Order_name has been cancelled. If you have any questions or concerns, please feel free to contact us.</p>
                            <p>Thank you for your understanding.</p>
                            <p>Sincerely,<br/>HjP Heavy Equipment Rental Services</p>
            ";
            $mail->send();
        }
        
        $conn->close();
        
        echo "success";
        exit(); 
    } else {
        echo "error_cancellation";
        exit(); 
    }
} else {
    echo "error_request";
    exit(); 
}
?>
