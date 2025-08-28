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
    $downpayment = $_POST['downpayment']; // Get downpayment from the request

    // Get the current total from the orders table
    $getOrderSql = "SELECT first_total FROM orders WHERE id = $OrderId";
    $result = $conn->query($getOrderSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentTotal = $row['first_total'];

        // Deduct the downpayment from the total amount
        $newTotal = $currentTotal - $downpayment;

        // Update the booking status to "Preparing" and deduct the downpayment from the total
        $updateOrderSql = "UPDATE orders SET status = 'Preparing', downpayment = $downpayment, first_total = $newTotal, prepair_date = NOW() WHERE id = $OrderId";

        if ($conn->query($updateOrderSql) === TRUE) {
            // Get customer email, order details, and other information from the database
            $getEmailSql = "SELECT orders.id as order_id, orders.user_id, orders.user_email, orders.sand_id, orders.summary, orders.total, orders.municipality,
                            orders.barangay,orders.first_total, orders.details, orders.status, users_acc.user_name, users_acc.phone, sand_tbl.sand
                            FROM orders
                            INNER JOIN sand_tbl ON orders.sand_id = sand_tbl.id
                            INNER JOIN users_acc ON orders.user_id = users_acc.id
                            WHERE orders.id='$OrderId'";

            $result = $conn->query($getEmailSql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $order_id = $row['order_id'];
                $Order_name = $row['sand'];
                $Order_summary = $row['summary'];
                $Order_total = $row['total'];
                $first_total = $row['first_total'];
                $customerName = $row['user_name'];
                $customerMunicipality = $row['municipality'];
                $customerBarangay = $row['barangay'];
                $customerDetails = $row['details'];

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
                $mail->Subject = "Your order is Preparing";
                $mail->Body = "
                <h2>Order Approved! Order #$order_id</h2>
                
                <p>Thank you for choosing HJP Aggregates. By proceeding with the order, you’ve acknowledged and accepted our terms and conditions.</p>
                <p>Your downpayment has been successfully verified and will be deducted from your remaining balance. Please keep this email as your official receipt. Order ID: <strong>$order_id</strong>.</p>
                 
                <p>Your Order is now prepairing please prepair this amount ₱$Order_total for completion of you remaining payment.</p>
                <p><strong>Order Details:</strong></p>
                <ul>
                    <li><strong>Equipment:</strong>$Order_name</li>
                    <li><strong>Summary:</strong> $Order_summary</li>
                    <li><strong>Total:</strong> $first_total</li>
                    <li><strong>Downpayment:</strong> ₱$downpayment</li>
                    <li><strong>Remaining Amount:</strong> ₱$Order_total</li>
                     <li><strong>Delivery Address:</strong>$customerBarangay  - $customerMunicipality,  $customerDetails</li>
                </ul>
                <p>If you have any questions or need further assistance, please contact our support team at support@hjp.com.</p>
                <p>Thank you again for your trust and support.</p>
                <p>Best regards,</p>
                <p><strong>HJP Aggregates</strong></p>
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
        echo "order_not_found";
        exit();
    }
} else {
    echo "error_request";
    exit(); 
}
?>
