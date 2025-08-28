<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Process form submission
    $sand_id = $_POST['sand_id'];
    $user_id = $_POST['user_id'];
    $user_email = $_POST['user_email'];
    $order_summary = $_POST['order_summary'];
    $order_total = $_POST['order_total'];
    $bucket_input = $_POST['bucket_input'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];

    include "conn.php";

    $stmt = $conn->prepare("INSERT INTO orders (sand_id, user_id, user_email, summary, total, municipality, barangay, street, bucket) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iississsi", $sand_id, $user_id, $user_email, $order_summary, $order_total, $municipality, $barangay, $street, $bucket_input);

    if ($stmt->execute()) {
        // Success message
        echo "success";
        exit();
    } else {
        // Error message
        echo "error";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect if accessed directly without form submission
    header("Location: index.php");
    exit();
}
?>
