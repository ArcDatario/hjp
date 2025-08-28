<?php
// Assuming you have your database connection established in 'conn.php'
include "conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if admin ID is provided
    if (isset($_POST['id'])) {
        $adminId = $_POST['id'];

        // Fetch admin details from the database
        $stmt = $conn->prepare("SELECT * FROM admins_acc WHERE id = ?");
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $adminDetails = $result->fetch_assoc();


            $userName = $_POST['user_name'];
            $role = $_POST['role'];
            $password = !empty($_POST['pass_word']) ? md5($_POST['pass_word']) : $adminDetails['password'];
            $image = $_FILES['image'];

            // Check if image is uploaded
            if (!empty($image['name'])) {
                // Remove existing image from folder
                if (!empty($adminDetails['image'])) {
                    $oldImage = "admin_images/" . $adminDetails['image'];
                    if (file_exists($oldImage)) {
                        unlink($oldImage); // Delete old image
                    }
                }

                // Generate unique file name
                $randomNumber = rand(1, 50000);
                $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
                $newFileName = "admin_" . $randomNumber . "." . $imageFileType;
                $targetFolder = "admin_images/" . $newFileName;

                // Move uploaded image to target folder
                if (move_uploaded_file($image['tmp_name'], $targetFolder)) {
                    // Update admin details with new image
                    $stmt = $conn->prepare("UPDATE admins_acc SET user_name = ?, role = ?, password = ?, image = ? WHERE id = ?");
                    $stmt->bind_param("ssssi", $userName, $role, $password, $newFileName, $adminId);
                    if ($stmt->execute()) {
                        echo "Admin details updated successfully.";
                    } else {
                        echo "Error updating admin details.";
                    }
                } else {
                    echo "Error uploading image.";
                }
            } else {
                // Update admin details without changing image
                $stmt = $conn->prepare("UPDATE admins_acc SET user_name = ?, role = ?, password = ? WHERE id = ?");
                $stmt->bind_param("sssi", $userName, $role, $password, $adminId);
                if ($stmt->execute()) {
                    echo "Admin details updated successfully.";
                } else {
                    echo "Error updating admin details.";
                }
            }
        } else {
            echo "Admin not found.";
        }
    } else {
        echo "Admin ID is required.";
    }
} else {
    echo "Invalid request.";
}

// Close database connection
$conn->close();
?>
