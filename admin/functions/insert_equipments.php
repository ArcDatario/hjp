<?php
session_start();

include "conn.php";

if (isset($_POST['equipment'], $_POST['year_model'], $_POST['capacity'], $_POST['fuel'],$_POST['kmperliter'],$_POST['type'],
$_POST['category'],$_POST['rate_per_day'],$_POST['rate_category'],$_POST['equipment_qty'], $_FILES['image'])) {
    $equipment = $_POST['equipment'];
    $year_model = $_POST['year_model'];
    $capacity = $_POST['capacity'];
    $fuel = $_POST['fuel'];
    $kmperliter = $_POST['kmperliter'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $rate_per_day = $_POST['rate_per_day'];
    $rate_category = $_POST['rate_category'];
    $equipment_qty = $_POST['equipment_qty'];
    $image = $_FILES['image'];

    // File handling
    $target_dir = "equipment_images/";
    $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
    $random_number = rand(1, 50000);
    $new_file_name = "equipment_" . $random_number . "." . $imageFileType;
    $target_file = $target_dir . $new_file_name;

    // Attempt to move uploaded file
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Prepare and execute SQL query
        $query = "INSERT INTO equipment_tbl (equipment, year_model, capacity, fuel, kmperliter, type, category, 
        rate_per_day, image,rate_category,equipment_qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssisss", $equipment, $year_model, $capacity, $fuel, 
        $kmperliter, $type, $category, $rate_per_day, $new_file_name, $rate_category, $equipment_qty);

        if ($stmt->execute()) {
           
       
        
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
