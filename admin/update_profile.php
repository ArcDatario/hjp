<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: auth-login.php");
    exit();
}

// Include database connection
include "conn.php";

// Function to generate random number between 1 and 50000
function generateRandomNumber() {
    return rand(1, 50000);
}

// Handle image upload
if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "functions/admin_images/";
    $fileName = "admin_" . generateRandomNumber() . "." . pathinfo($_FILES['new_image']['name'], PATHINFO_EXTENSION);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Check if file is a valid image
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowedTypes)) {
        // Fetch existing image filename
        $userId = $_SESSION['user_id'];
        $fetchImageQuery = "SELECT image FROM admins_acc WHERE id = $userId";
        $result = mysqli_query($conn, $fetchImageQuery);
        $row = mysqli_fetch_assoc($result);
        $existingImage = $row['image'];

        // Delete existing image file
        if (!empty($existingImage) && file_exists($targetDir . $existingImage)) {
            unlink($targetDir . $existingImage);
        }

        // Upload new image
        if (move_uploaded_file($_FILES['new_image']['tmp_name'], $targetFilePath)) {
            // Update admin image in database
            $updateImageQuery = "UPDATE admins_acc SET image = '$fileName' WHERE id = $userId";
            if(mysqli_query($conn, $updateImageQuery)) {

                $_SESSION['updated'] = true;
                header("Location: my-profile.php");
                exit();
            } else {
                echo "Error updating image in database";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}

// Handle username update
if (isset($_POST['user_name'])) {
    $userId = $_POST['user_id'];
    $user_name = $_POST['user_name'];

    // Update username in database
    $updateUsernameQuery = "UPDATE admins_acc SET user_name = '$user_name' WHERE id = $userId";
    if(mysqli_query($conn, $updateUsernameQuery)) {
    
        $_SESSION['updated'] = true;
        header("Location: my-profile.php");
    exit();
    } else {
        echo "Error updating username in database";
    }
}

// Redirect back to profile page
header("Location: ../admin/my-profile.php");
exit();
?>
