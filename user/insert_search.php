<?php
session_start();

include "conn.php";

// Function to insert form data into the database
function insertFormData($category,  $conn) {
    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO search_tbl (category) VALUES (?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    
    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['category'] = $_POST["category"];
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close statement
    $stmt->close();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both category and rate are set and not empty
    if (isset($_POST["category"]) && !empty($_POST["category"]) ) {
        // Get form data
        $category = $_POST["category"];
      
        
        // Call the insert function
        insertFormData($category,  $conn);
        
        // Redirect to room_Search.php
        header("Location: equipment_search.php");
        exit(); // Ensure script stops execution after redirection
    } else {
        header("Location: index.php");
    }
}

// Close database connection
$conn->close();
?>
