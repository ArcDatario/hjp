<?php
session_start();
include "conn.php";

// Function to insert form data into the database
function insertFormData($rating, $feedback, $equipment_id, $user_id, $conn) {
    $sql = "INSERT INTO sand_feedbacks (ratings, comments, sand_id, user_id) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("isii", $rating, $feedback, $equipment_id, $user_id);

    if ($stmt->execute()) {
        $_SESSION['feedback_success'] = true; 
       
        header("Location: view_sand.php?id=$equipment_id&user_id=$user_id"); // Redirect to view_equipment.php with equipment_id and user_id
        $stmt->close(); // Close statement
        $conn->close(); // Close connection
        exit; // Exit script
    } else {
        echo "Error inserting data: " . $stmt->error;
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rating = $_POST["number_ratings"];
    $feedback = $_POST["comment"];
    $equipment_id = $_POST["sand_id"];
    $user_id = $_POST["user_id"];

    // Call the function to insert data
    if (insertFormData($rating, $feedback, $equipment_id, $user_id, $conn)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data.";
    }
}
?>
