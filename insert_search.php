<?php
session_start();

include "conn.php";

// Function to insert form data into the database
function insertFormData($category, $rate, $conn) {
    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO search_tbl (category, rate) VALUES (?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $category, $rate);
    
    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['category'] = $_POST["category"];
        $_SESSION['rate'] = $_POST["rate"];
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement
    $stmt->close();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both category and rate are set and not empty
    if (isset($_POST["category"]) && isset($_POST["rate"]) && !empty($_POST["category"]) && !empty($_POST["rate"])) {
        // Get form data
        $category = $_POST["category"];
        $rate = $_POST["rate"];
        
        // Call the insert function
        insertFormData($category, $rate, $conn);
        
        // Redirect to room_Search.php
        header("Location: equipment_search.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Category and rate must be selected";
    }
}

// Close database connection
$conn->close();
?>
