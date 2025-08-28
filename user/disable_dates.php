<?php
// Connect to your database (replace placeholders with your actual database credentials)
include "conn.php";

// Initialize equipment ID from POST data
$equipmentId = isset($_POST['equipment_id']) ? $_POST['equipment_id'] : null;

if ($equipmentId) {
    // Prepare statement to fetch rented dates for the specific equipment
    $sql = "SELECT rent_start_date, rent_end_date FROM rental WHERE equipment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $equipmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize array to store rented dates
    $rentedDates = array();

    if ($result->num_rows > 0) {
        // Loop through each rental and construct an array of rented dates
        while ($row = $result->fetch_assoc()) {
            $startDate = strtotime($row["rent_start_date"]);
            $endDate = strtotime($row["rent_end_date"]);
            while ($startDate <= $endDate) {
                $rentedDates[] = date("Y-m-d", $startDate);
                $startDate = strtotime("+1 day", $startDate);
            }
        }
    }

    // Close statement
    $stmt->close();
} else {
    // If no equipment ID provided, return an empty array
    $rentedDates = array();
}

// Close connection
$conn->close();

// Output the rented dates as JSON
echo json_encode($rentedDates);
?>
