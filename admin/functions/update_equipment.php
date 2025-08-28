<?php

session_start();

include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'], $_POST['equipment'],$_POST['rate_category'],$_POST['equipment_qty'], $_POST['year_model'], $_POST['capacity'], $_POST['fuel'], $_POST['kmperliter'], $_POST['type'], $_POST['category'], $_POST['rate_per_day'])) {
        $equipmentId = $_POST['id'];
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
        // Sanitize input to prevent SQL injection
        $equipmentId = mysqli_real_escape_string($conn, $equipmentId);
        $equipment = mysqli_real_escape_string($conn, $equipment);
        $year_model = mysqli_real_escape_string($conn, $year_model);
        $capacity = mysqli_real_escape_string($conn, $capacity);
        $fuel = mysqli_real_escape_string($conn, $fuel);
        $kmperliter = mysqli_real_escape_string($conn, $kmperliter);
        $type = mysqli_real_escape_string($conn, $type);
        $category = mysqli_real_escape_string($conn, $category);
        $rate_per_day = mysqli_real_escape_string($conn, $rate_per_day);
        $rate_category = mysqli_real_escape_string($conn, $rate_category);
        $equipment_qty = mysqli_real_escape_string($conn, $equipment_qty);

        $sql = "UPDATE equipment_tbl SET equipment='$equipment', year_model='$year_model', capacity='$capacity', fuel='$fuel', kmperliter='$kmperliter', type='$type', category='$category', rate_per_day='$rate_per_day', rate_category='$rate_category', equipment_qty='$equipment_qty' WHERE id='$equipmentId'";

        if ($conn->query($sql) === TRUE) {
            if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
                // Handle image upload
                $targetDir = "equipment_images/";
                $randomNumber = rand(1, 50000);
                $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $newFileName = "equipment_" . $randomNumber . "." . $imageFileType;
                $targetFilePath = $targetDir . $newFileName;

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                    $sqlUpdateImage = "UPDATE equipment_tbl SET image='$newFileName' WHERE id='$equipmentId'";
                    if ($conn->query($sqlUpdateImage) === TRUE) {
                        echo "Product details and image updated successfully.";
                    } else {
                        echo "Error updating product image: " . $conn->error;
                    }
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Product details updated successfully.";
            }
        } else {
            echo "Error updating product details: " . $conn->error;
        }
    } else {
        echo "Incomplete form data.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();

?>
