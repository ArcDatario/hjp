<?php
// Include database connection or include "conn.php" if available
include "conn.php";

// Check if all required parameters are set
if (isset($_POST['user_id'], $_POST['fullname'], $_POST['email'], $_POST['phone_number'])) {
    // Sanitize input to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);

    // Update query
    $query = "UPDATE users_acc SET username = '$fullname', email = '$email', phone = '$phoneNumber' WHERE id = '$userId'";

    // Execute query
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if ($result) {
        // Check if an image file is uploaded
        if (isset($_FILES['image'])) {
            // Handle image upload
            $image = $_FILES['image'];
            $uploadDir = 'user_images/';

            // Remove existing image
            $query = "SELECT image FROM users_acc WHERE id = '$userId'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $existingImage = $row['image'];
                if (!empty($existingImage)) {
                    unlink($uploadDir . $existingImage);
                }
            }

            // Generate random number between 1 and 50000 for new image name
            $randomNumber = rand(1, 50000);
            $imageName = 'user_' . $randomNumber . '.jpg';
            $targetFile = $uploadDir . $imageName;

            // Move uploaded image to the target directory
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                // Update image name in the database
                $query = "UPDATE users_acc SET image = '$imageName' WHERE id = '$userId'";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    // Return error response if database update fails
                    echo json_encode(array('error' => 'Failed to update user image'));
                    exit;
                }
            } else {
                // Return error response if image upload fails
                echo json_encode(array('error' => 'Failed to upload image'));
                exit;
            }
        }
        // Return success response
        echo json_encode(array('success' => true));
    } else {
        // Return error response if database update fails
        echo json_encode(array('error' => 'Failed to update user details'));
    }
} else {
    // Return error response if required parameters are missing
    echo json_encode(array('error' => 'Missing parameters'));
}

// Close database connection
mysqli_close($conn);
?>
