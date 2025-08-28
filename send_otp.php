<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Function to generate a random OTP
function generateOTP() {
    return rand(100000, 999999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'sendotp') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email address";
        exit;
    }

    // Generate OTP
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;
    $_SESSION['otp_timestamp'] = time();

    // Send OTP using PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'myphpproject2023@gmail.com';  // Your Gmail address
        $mail->Password = 'eyufnbejzlkzgujl';          // Your App Password for Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('myphpproject2023@gmail.com', 'HJP Construction');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Registration';
        $mail->Body = "Your OTP is: $otp<br>Please do not share it with anyone.<br>This OTP is valid for 5 minutes only.";

        $mail->send();
        echo "OTP Sent Successfully";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Failed to send OTP: " . $mail->ErrorInfo;
    }
} else {
    http_response_code(405);
    echo "Invalid Request";
}
