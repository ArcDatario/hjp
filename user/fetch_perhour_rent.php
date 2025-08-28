<?php
// Connect to your database (replace placeholders with your actual database credentials)
include "conn.php";

// Initialize equipment ID from POST data
$equipment_id = isset($_POST['perhour_equipment_id']) ? $_POST['perhour_equipment_id'] : null;

if ($equipment_id) {
    // Prepare statement to check equipment quantity
    $sql = "SELECT equipment_qty FROM equipment_tbl WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $equipment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if equipment quantity is equal to 0
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $equipment_qty = $row['equipment_qty'];

        if ($equipment_qty <= 0) {
            // Prepare statement to fetch booked dates for the specific equipment
            $sql = "SELECT rent_start_date, rent_end_date,status FROM rental WHERE equipment_id = ?  AND (status = 'Pending' OR status = 'Approved')";
            $stmt2 = $conn->prepare($sql); // Use a different variable for the second query
            $stmt2->bind_param("i", $equipment_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            // Initialize array to store booked dates
            $perHourRentDates = array();

            if ($result2->num_rows > 0) {
                // Loop through each booking and construct an array of booked dates
                while ($row = $result2->fetch_assoc()) {
                    $startDate = strtotime($row["rent_start_date"]);
                    $endDate = strtotime($row["rent_end_date"]);
                    while ($startDate <= $endDate) {
                        $perhourrentDates[] = date("Y-m-d", $startDate);
                        $startDate = strtotime("+1 day", $startDate);
                    }
                }
            }
        } else {
            // If equipment quantity is not 0, return an empty array
            $perhourrentDates = array();
        }
    } else {
        // If no equipment found, return an empty array
        $perhourrentDates = array();
    }

    // Close statements
    $stmt->close();
    if (isset($stmt2)) {
        $stmt2->close();
    }
} else {
    // If no equipment ID provided, return an empty array
    $perhourrentDates = array();
}

// Close connection
$conn->close();

// Output the booked dates as JSON
echo json_encode($perhourrentDates);
?>
