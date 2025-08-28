<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect form data
    $sand_id = $_POST['sand_id'];
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $order_summary = $_POST['order_summary'];
    $order_total = $_POST['order_total'];
    $first_total = $_POST['order_total'];
    $bucket_input = $_POST['bucket_input'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $details = $_POST['details'];
    $sand_name = $_POST['sand_name'];

    include "conn.php";

    // Check if required fields are empty
    if (empty($bucket_input) || empty($municipality) || empty($barangay) || empty($details) || empty($sand_name)) {
        $_SESSION['empty_fields'] = true;
        header('location: index.php#sand');
        exit(); // Exit after the redirect to stop further execution
    }

    // Check if the gcash_receipt file is uploaded
    if (isset($_FILES['gcash_receipt']) && $_FILES['gcash_receipt']['error'] == UPLOAD_ERR_OK) {
        $receiptTmpName = $_FILES['gcash_receipt']['tmp_name'];
        $receiptOriginalName = $_FILES['gcash_receipt']['name'];
        $receiptExtension = pathinfo($receiptOriginalName, PATHINFO_EXTENSION);

        // Generate a random name for the file (receipt_1 to receipt_50000)
        $randomNumber = rand(1, 50000);
        $newFileName = "receipt_" . $randomNumber . "." . $receiptExtension;

        // Define the upload folder path
        $uploadDirectory = 'sand_gcash/';
        $uploadPath = $uploadDirectory . $newFileName;

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($receiptTmpName, $uploadPath)) {
            $_SESSION['upload_error'] = "Failed to upload receipt.";
            header('location: index.php#sand');
            exit(); // Exit after the redirect to stop further execution
        }
    } else {
        $_SESSION['upload_error'] = "No receipt file uploaded.";
        header('location: index.php#sand');
        exit(); // Exit after the redirect to stop further execution
    }

    // Prepare the SQL statement to insert the order and include the receipt file name
    // Corrected bind_param with the updated number of parameters and types
    $stmt = $conn->prepare("INSERT INTO orders (sand_id, user_id, user_email, summary, total, first_total, municipality, barangay, details, bucket, sand_name, gcash_receipt) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("iissiisssiss", $sand_id, $user_id, $user_email, $order_summary, $order_total, $order_total, $municipality, $barangay, $details, $bucket_input, $sand_name, $newFileName);


    // Execute the query
    if ($stmt->execute()) {
        $_SESSION['order_success'] = true;
        header('location: index.php#sand');
        exit(); // Exit after the redirect to stop further execution
    } else {
        $_SESSION['order_error'] = "Failed to place the order.";
        header('location: index.php#sand');
        exit(); // Exit after the redirect to stop further execution
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    $_SESSION['order_error'] = "Invalid request method.";
    header('location: index.php#sand');
    exit(); // Exit after the redirect to stop further execution
}
?>
