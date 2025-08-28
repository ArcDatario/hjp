<?php
session_start();
include "conn.php";

if (isset($_POST['sand'], $_POST['rate_per_bucket'], $_FILES['image'])) {
    $sand = $_POST['sand'];
    $rate_per_bucket = $_POST['rate_per_bucket'];
    $image = $_FILES['image'];

    // File handling
    $target_dir = "sand_images/";
    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
    $random_number = rand(1, 50000);
    $new_file_name = "sand_" . $random_number . "." . $imageFileType;
    $target_file = $target_dir . $new_file_name;

    // Attempt to move uploaded file
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Prepare and execute SQL query
        $query = "INSERT INTO sand_tbl (sand, rate_per_bucket, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sis", $sand, $rate_per_bucket, $new_file_name);

        if ($stmt->execute()) {
            // Whatever action you want to take upon successful insertion
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "All fields are required.";
}
?>
