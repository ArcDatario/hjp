<?php
session_start();
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['sand'], $_POST['rate_per_bucket'])) {
        $sandId = $_POST['id'];
        $sand = $_POST['sand'];
        $rate_per_bucket = $_POST['rate_per_bucket'];
        
        // Sanitize input to prevent SQL injection
        $sandId = mysqli_real_escape_string($conn, $sandId);
        $sand = mysqli_real_escape_string($conn, $sand);
        $rate_per_bucket = mysqli_real_escape_string($conn, $rate_per_bucket);

        $sql = "UPDATE sand_tbl SET sand='$sand', rate_per_bucket='$rate_per_bucket' WHERE id='$sandId'";

        if ($conn->query($sql) === TRUE) {
            // Check if a new image is uploaded
            if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
                // Handle image upload
                $targetDir = "sand_images/";
                $randomNumber = rand(1, 50000);
                $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $newFileName = "sand_" . $randomNumber . "." . $imageFileType;
                $targetFilePath = $targetDir . $newFileName;

                // Delete the previous image file, if it exists
                $previousImageQuery = "SELECT image FROM sand_tbl WHERE id='$sandId'";
                $previousImageResult = $conn->query($previousImageQuery);
                if ($previousImageResult->num_rows > 0) {
                    $previousImage = $previousImageResult->fetch_assoc()['image'];
                    if ($previousImage) {
                        $previousImagePath = $targetDir . $previousImage;
                        if (file_exists($previousImagePath)) {
                            unlink($previousImagePath);
                        }
                    }
                }

                // Upload the new image
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                    $sqlUpdateImage = "UPDATE sand_tbl SET image='$newFileName' WHERE id='$sandId'";
                    if ($conn->query($sqlUpdateImage) === TRUE) {
                        echo "Sand equipment details and image updated successfully.";
                    } else {
                        echo "Error updating sand equipment image: " . $conn->error;
                    }
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Sand equipment details updated successfully.";
            }
        } else {
            echo "Error updating sand equipment details: " . $conn->error;
        }
    } else {
        echo "Incomplete form data.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
