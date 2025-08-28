// Function to fetch booked dates
function fetchBookedDates(equipmentId, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_booked_dates.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var bookedDates = JSON.parse(xhr.responseText);
            callback(bookedDates);
        }
    };
    xhr.send("equipment_id=" + equipmentId);
}

// Function to disable past dates
function disablePastDates() {
    var today = new Date();
    today.setHours(0, 0, 0, 0);

    var disabledDates = [];
    var dateIterator = new Date(today);
    dateIterator.setDate(dateIterator.getDate() - 1);

    while (dateIterator > new Date(0)) {
        disabledDates.push(new Date(dateIterator));
        dateIterator.setDate(dateIterator.getDate() - 1);
    }

    return disabledDates;
}

// Set room ID when "Book Now" button is clicked
$(".rent_now_btn").click(function() {
    var equipmentId = $(this).attr("equipment_id");
    $("#room_id_input").val(equipmentId);

    // Fetch booked dates for the room
    fetchBookedDates(equipmentId, function(bookedDates) {
        // Initialize Flatpickr for Check In date with disabled dates
        flatpickr("#date-in", {
            dateFormat: "Y-m-d",
            disable: bookedDates.concat(disablePastDates()),
            onChange: function(selectedDates, dateStr, instance) {
                convertAndDisplayDate(selectedDates[0], '#convert_date_in');
                calculateDaysAndNights();
            }
        });

        // Initialize Flatpickr for Check Out date with disabled dates
        flatpickr("#date-out", {
            dateFormat: "Y-m-d",
            disable: bookedDates.concat(disablePastDates()),
            onChange: function(selectedDates, dateStr, instance) {
                convertAndDisplayDate(selectedDates[0], '#convert_date_out');
                calculateDaysAndNights();
            }
        });
    });
});


// Initially disable past dates in both pickers
flatpickr("#date-in, #date-out", {
    dateFormat: "Y-m-d",
    disable: disablePastDates()
});

// Function to convert date format and display in input field
function convertAndDisplayDate(date, inputId) {
    var convertedDate = new Date(date);
    var formattedDate = ("0" + (convertedDate.getMonth() + 1)).slice(-2) + '-' + ("0" + convertedDate.getDate()).slice(-2) + '-' + convertedDate.getFullYear();
    $(inputId).val(formattedDate);
}

// Function to calculate days and nights
function calculateDaysAndNights() {
    var checkInDate = $("#convert_date_in").val();
    var checkOutDate = $("#convert_date_out").val();

    var checkIn = new Date(checkInDate);
    var checkOut = new Date(checkOutDate);

    if (!isNaN(checkIn.getTime()) && !isNaN(checkOut.getTime()) && checkOut >= checkIn) {
        var timeDifference = checkOut.getTime() - checkIn.getTime();
        var daysDifference = Math.floor(timeDifference / (1000 * 3600 * 24)) + 1; // Include the check-out day
        var nights = daysDifference > 1 ? daysDifference - 1 : 0; // Minus one night if more than one day

        var daysString = daysDifference === 1 ? "1 day" : daysDifference + " days";
        var nightsString = nights === 1 ? "1 night" : nights > 0 ? nights + " nights" : ""; // Only display nights if more than 0

        var result = daysString + (nightsString ? ", " + nightsString : "");

        $("#days_night").text(result);
        $("#days_night_input").val(result);

        // Get the price per night
        var pricePerNight = parseFloat($("#price_per_night").val());

        // Calculate the total cost
        var total = 0;
        if (daysDifference === 1) {
            total = pricePerNight; // If only 1 day, total is same as price per night
        } else {
            total = pricePerNight * nights;
        }

        $("#total").text("Total: ₱ " + total.toFixed(2));
        $("#total_input").val(total.toFixed(2));
    } else {

        $("#days_night_input").val("");
        $("#total").text("");
        $("#total_input").val("");
    }
}
