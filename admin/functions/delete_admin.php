<?php
// Assuming you have your database connection established in 'conn.php'
include "conn.php";

// Check if admin ID is provided
if (isset($_POST['id'])) {
    $adminId = $_POST['id'];

    // Fetch admin details from the database
    $stmt = $conn->prepare("SELECT * FROM admins_acc WHERE id = ?");
    $stmt->bind_param("i", $adminId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $adminDetails = $result->fetch_assoc();

        // Delete admin from the database
        $deleteStmt = $conn->prepare("DELETE FROM admins_acc WHERE id = ?");
        $deleteStmt->bind_param("i", $adminId);
        if ($deleteStmt->execute()) {
            // Remove admin image from folder
            if (!empty($adminDetails['image'])) {
                $imagePath = "admin_images/" . $adminDetails['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete admin image
                }
            }
            echo "Admin deleted successfully.";
        } else {
            echo "Error deleting admin.";
        }
    } else {
        echo "Admin not found.";
    }
} else {
    echo "Admin ID is required.";
}

// Close database connection
$conn->close();
?>
<?php
// Assuming you have your database connection established in 'conn.php'
include "conn.php";

// Check if admin ID is provided
if (isset($_POST['id'])) {
    $adminId = $_POST['id'];

    // Fetch admin details from the database
    $stmt = $conn->prepare("SELECT * FROM admins_acc WHERE id = ?");
    $stmt->bind_param("i", $adminId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $adminDetails = $result->fetch_assoc();

        // Delete admin from the database
        $deleteStmt = $conn->prepare("DELETE FROM admins_acc WHERE id = ?");
        $deleteStmt->bind_param("i", $adminId);
        if ($deleteStmt->execute()) {
            // Remove admin image from folder
            if (!empty($adminDetails['image'])) {
                $imagePath = "admin_images/" . $adminDetails['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete admin image
                }
            }
            echo "Admin deleted successfully.";
        } else {
            echo "Error deleting admin.";
        }
    } else {
        echo "Admin not found.";
    }
} else {
    echo "Admin ID is required.";
}

// Close database connection
$conn->close();
?>
