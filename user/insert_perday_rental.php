<?php
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $start_date = $_POST['perday_start_date'];
    $end_date = $_POST['perday_end_date'];
    $equipment_id = $_POST['perday_equipment_id'];
    $user_id = $_POST['perday_user_id'];
    $user_email = $_POST['perday_user_email'];
    $user_municipality = $_POST['perday_user_municipality'];
    $user_barangay = $_POST['perday_user_barangay'];
    $user_details = $_POST['perday_user_details'];
    $days_summary = $_POST['perday_days_summary_input'];
    $total = $_POST['perday_total'];
    $equipment_name = $_POST['perday_equipment_name_input'];

    // Handle file upload
    $upload_dir = "gcash/"; // Folder to store the uploaded receipt
    $receipt_name = $_FILES['gcash_receipt']['name'];
    $receipt_tmp_name = $_FILES['gcash_receipt']['tmp_name'];
    $receipt_size = $_FILES['gcash_receipt']['size'];
    $receipt_error = $_FILES['gcash_receipt']['error'];

    // Validate the upload directory
    if (!is_dir($upload_dir) && !mkdir($upload_dir, 0777, true)) {
        die("Error: Failed to create upload directory.");
    }

    // Check if file upload is successful
    if ($receipt_error === UPLOAD_ERR_OK) {
        // Generate a unique file name
        $random_number = rand(1, 50000);
        $receipt_ext = strtolower(pathinfo($receipt_name, PATHINFO_EXTENSION));
        $new_receipt_name = "receipt_" . $random_number . "." . $receipt_ext;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($receipt_tmp_name, $upload_dir . $new_receipt_name)) {
            // File uploaded successfully
            include "conn.php";

            // Prepare SQL statement
            $stmt = $conn->prepare("
                INSERT INTO rental 
                (rent_start_date, rent_end_date, equipment_id, user_id, user_email, summary, total, equipment_name, municipality, barangay, details, gcash_receipt, first_total) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->bind_param(
                "ssiississsssd", 
                $start_date, 
                $end_date, 
                $equipment_id, 
                $user_id, 
                $user_email, 
                $days_summary, 
                $total, 
                $equipment_name, 
                $user_municipality, 
                $user_barangay, 
                $user_details, 
                $new_receipt_name, 
                $total
            );

            // Execute the statement
            if ($stmt->execute()) {
                // Update equipment quantity
                $stmt_select = $conn->prepare("SELECT equipment_qty FROM equipment_tbl WHERE id = ?");
                $stmt_select->bind_param("i", $equipment_id);
                $stmt_select->execute();
                $stmt_select->bind_result($equipment_qty);
                $stmt_select->fetch();
                $stmt_select->close();

                $new_quantity = $equipment_qty - 1;
                $stmt_update = $conn->prepare("UPDATE equipment_tbl SET equipment_qty = ? WHERE id = ?");
                $stmt_update->bind_param("ii", $new_quantity, $equipment_id);
                $stmt_update->execute();
                $stmt_update->close();

                // Redirect to a success page
                header("Location: index.php");
                exit();
            } else {
                echo "Error during database insertion: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: Failed to move the uploaded file.";
        }
    } else {
        echo "File upload error: " . $receipt_error;
    }

    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>
