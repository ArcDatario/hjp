<?php
// Connect to your database (replace placeholders with your actual database credentials)
include "conn.php";

// Initialize room ID from POST data
$room_id = isset($_POST['equipment_id']) ? $_POST['equipment_id'] : null;

if ($room_id) {
    // Prepare statement to fetch booked dates for the specific room
    $sql = "SELECT rent_start_date, rent_end_date FROM rental WHERE equipment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize array to store booked dates
    $rentDates = array();

    if ($result->num_rows > 0) {
        // Loop through each booking and construct an array of booked dates
        while ($row = $result->fetch_assoc()) {
            $startDate = strtotime($row["rent_start_date"]);
            $endDate = strtotime($row["rent_end_date"]);
            while ($startDate <= $endDate) {
                $rentDates[] = date("Y-m-d", $startDate);
                $startDate = strtotime("+1 day", $startDate);
            }
        }
    }

    // Close statement
    $stmt->close();
} else {
    // If no room ID provided, return an empty array
    $rentDates = array();
}

// Close connection
$conn->close();

// Output the booked dates as JSON
echo json_encode($rentDates);
?>
