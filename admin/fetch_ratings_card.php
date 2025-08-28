<?php
// Connect to your MySQL database
include "conn.php";

// Query to calculate average rating
$sql = "SELECT AVG(ratings) AS average_rating FROM feedbacks_tbl";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output average rating
    $row = $result->fetch_assoc();
    $average_rating = $row["average_rating"];
    // Format the average rating to have only one decimal place
    $formatted_average_rating = number_format($average_rating, 1);

    // Determine indication and color based on average rating
    $indication = "";
    $color = "";
    if ($average_rating >= 0 && $average_rating <= 1.5) {
        $indication = "Please Improve";
        $color = "red";
    } elseif ($average_rating > 1.5 && $average_rating <= 2.5) {
        $indication = "Moderate";
        $color = "yellow";
    } elseif ($average_rating > 2.5 && $average_rating <= 3.5) {
        $indication = "Good";
        $color = "green";
    } else {
        $indication = "Great!";
        $color = "green";
    }

    // Construct HTML content for the ratings card
    $ratingsCardContent = '<div class="card">' .
                            '<div class="card-body">' .
                                '<div class="row">' .
                                    '<div class="col-4 d-flex align-items-center">' .
                                        '<img src="rating.png" alt="" height="60" width="60">' .
                                    '</div>' .
                                    '<div class="col-8">' .
                                        '<p>Overall Ratings</p>' .
                                        '<span style="float:right; margin-top:1%; color:'.$color.';">'.$indication.'</span>' .
                                        '<h5 style="font-size:1.1rem; margin-top:-2%;">'.$formatted_average_rating.' / 5</h5>' .
                                    '</div>' .
                                '</div>' .
                            '</div>' .
                        '</div>';

    // Output the HTML content of the ratings card
    echo $ratingsCardContent;
} else {
    echo "0 results";
}

$conn->close();
?>
