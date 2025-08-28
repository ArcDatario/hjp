<?php
// Include database connection
include "conn.php";

// Check if product ID is provided
if(isset($_POST['id'])) {
    // Sanitize input to prevent SQL injection
    $equipmentId = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Construct SQL query to fetch image filename
    $sql = "SELECT image FROM sand_tbl WHERE id = '$equipmentId'";
    
    // Execute query
    $result = $conn->query($sql);
    
    // Check if query was successful
    if ($result->num_rows > 0) {
        // Fetch image filename
        $row = $result->fetch_assoc();
        $imageFilename = $row['image'];
        
        // Delete the product from the database
        $deleteSql = "DELETE FROM sand_tbl WHERE id = '$equipmentId'";
        if ($conn->query($deleteSql) === TRUE) {
            // Define directory path for storing images
            $targetDir = "sand_images/";
            
            // Construct the full path to the image file
            $imagePath = $targetDir . $imageFilename;
            
            // Check if the image file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
                echo "Data deleted successfully.";
            } else {
                echo "Image file not found.";
            }
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}

// Close database connection
$conn->close();
?>
