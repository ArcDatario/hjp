<?php
session_start();
include "conn.php"; // Ensure the connection is correct

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Function to generate a random OTP
function generateOTP() {
    return rand(100000, 999999);
}

// Function to generate a random number for image naming
function generateRandomNumber() {
    return mt_rand(1, 50000);
}

// Check if request is for sending OTP
if (isset($_POST['action']) && $_POST['action'] === 'send_otp') {
    $email = $_POST['email'];
    
    // Generate OTP, store it in the session with timestamp
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;
    $_SESSION['otp_timestamp'] = time();

    // Send OTP via PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Update with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'myphpproject2023@gmail.com';
        $mail->Password = 'eyufnbejzlkzgujl';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('myphpproject2023@gmail.com', 'OTP Verification');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Registration';
        $mail->Body = "Your OTP is: $otp<br>It is valid for 5 minutes.";

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'OTP sent successfully.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send OTP.']);
    }
    exit;
}

// Handle OTP verification and registration
if (isset($_POST['action']) && $_POST['action'] === 'register') {
    $enteredOTP = $_POST['otp'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $municipality= $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $details = $_POST['details'];
    $password = md5($_POST['password']); // Plain password for hashing

    // Verify OTP
    if ($enteredOTP == $_SESSION['otp'] && $email == $_SESSION['otp_email'] && (time() - $_SESSION['otp_timestamp'] <= 300)) {
        
        // Hash the password securely using password_hash
        

        // Generate a unique image name
        $random_number = generateRandomNumber();
        $new_image_name = "user_" . $random_number . ".jpg";

        // Copy the default image to the user_images directory
        $source_file = "user-icon.jpg"; // Ensure this file exists
        $target_dir = "user_images/";
        $target_file = $target_dir . $new_image_name;
        copy($source_file, $target_file);

        // Proceed with registration after OTP verification
        $sql = "INSERT INTO users_acc (user_name, phone, municipality, barangay, details, email, password, image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $user_name, $phone, $municipality, $barangay, $details, $email, $password, $new_image_name);

        if ($stmt->execute()) {
            // Clear OTP from session
            unset($_SESSION['otp'], $_SESSION['otp_email'], $_SESSION['otp_timestamp']);
            $_SESSION['user_id'] = $stmt->insert_id;

            echo json_encode(['status' => 'success', 'message' => 'Registration successful.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Registration failed.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
    }
    exit;
}
?>
