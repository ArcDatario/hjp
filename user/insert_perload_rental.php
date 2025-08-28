<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $total = $_POST['perload_total_input'];
    $load = $_POST['per_load'];
    $equipment_id = $_POST['perload_equipment_id'];
    $user_id = $_POST['perload_user_id'];
    $user_email = $_POST['perload_user_email'];
    $load_summary = $_POST['perload_total'];
    $equipment_name = $_POST['perload_equipment_name_input'];
    $user_municipality = $_POST['perload_user_municipality'];
    $user_barangay = $_POST['perload_user_barangay'];
    $user_details = $_POST['perload_user_details'];

    include "conn.php"; // Include database connection

    // Enable error reporting for debugging
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    // Check if the equipment is available
    $stmt_select = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
    $stmt_select->bind_param("i", $equipment_id);
    $stmt_select->execute();
    $stmt_select->bind_result($equipment_qty);
    $stmt_select->fetch();
    $stmt_select->close();

    if ($equipment_qty > 0) {
        // Handle the receipt file upload
        $new_file_name = null;
        if (isset($_FILES['gcash_receipt']) && $_FILES['gcash_receipt']['error'] === UPLOAD_ERR_OK) {
            $receipt = $_FILES['gcash_receipt'];
            $random_number = rand(1, 50000);
            $upload_dir = "gcash/"; // Upload directory
            $file_extension = strtolower(pathinfo($receipt['name'], PATHINFO_EXTENSION)); // Ensure extension is lowercase
            $new_file_name = "receipt_{$random_number}.{$file_extension}";
            $target_file = $upload_dir . $new_file_name;

            // Validate the upload directory
            if (!is_dir($upload_dir) && !mkdir($upload_dir, 0777, true)) {
                die("Error: Failed to create upload directory.");
            }

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($receipt['tmp_name'], $target_file)) {
                die("Error: Unable to upload receipt file.");
            }
        } else {
            die("Error: Please upload a valid receipt.");
        }

        // Insert data into the rental table
        $stmt = $conn->prepare("
            INSERT INTO rental (equipment_id, user_id, user_email, summary, total, first_total, equipment_load, equipment_name, municipality, barangay, details, gcash_receipt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "iissiissssss", 
            $equipment_id, 
            $user_id, 
            $user_email, 
            $load_summary, 
            $total, 
            $total, 
            $load, 
            $equipment_name, 
            $user_municipality, 
            $user_barangay, 
            $user_details, 
            $new_file_name
        );

        if ($stmt->execute()) {
            // Update equipment quantity
            $new_quantity = $equipment_qty - 1;
            $stmt_update = $conn->prepare("UPDATE equipment_tbl SET equipment_qty = ? WHERE id = ?");
            $stmt_update->bind_param("ii", $new_quantity, $equipment_id);
            $stmt_update->execute();
            $stmt_update->close();

            // Redirect to success page
            header("Location: index.php");
            exit();
        } else {
            die("Error: " . $stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Show an error message if the equipment is fully loaded
        echo "<script>
            alert('Sorry! The equipment is fully loaded.');
        </script>";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect if the form hasn't been submitted
    header("Location: index.php");
    exit();
}
?>
