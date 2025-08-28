<?php
session_start();
include "conn.php";

if (isset($_POST['user_name'], $_POST['role'], $_POST['pass_word'])) {
    $user_name = $_POST['user_name'];
    $role = $_POST['role'];
    $pass_word = md5($_POST['pass_word']);

    // Creating a random number between 1 and 50000
    $random_number = rand(1, 50000);
    $new_file_name = "admin_" . $random_number . ".png";
    $target_file = "admin_images/" . $new_file_name;
    
    // Copying the default admin image to the target folder with the new name
    $default_image = "admin.png";
    if (!copy($default_image, $target_file)) {
        echo "Failed to copy image file.";
        exit;
    }
    
    // Inserting data into the database
    $query = "INSERT INTO admins_acc (user_name, role, password, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $user_name, $role, $pass_word, $new_file_name);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "All fields are required.";
}
?>
