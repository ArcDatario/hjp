// Function to fetch booked dates for a specific equipment ID
function fetchrentDates(equipmentId, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_booked.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var rentDates = JSON.parse(xhr.responseText);
            callback(rentDates);
        }
    };
    xhr.send("perday_equipment_id=" + equipmentId);
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

// Function to calculate total and update fields
function calculateTotal() {
    // Get start and end date values
    var startDateValue = document.getElementById("perday_rent_start_date").value;
    var endDateValue = document.getElementById("perday_rent_end_date").value;
    var rentButton = document.getElementById("rent_btn");

    // Check if both start and end dates are filled
    if (startDateValue && endDateValue) {
        // Convert date format to "YYYY-MM-DD"
        var startDate = new Date(startDateValue);
        var endDate = new Date(endDateValue);

        // Check if the end date is earlier than the start date
        if (endDate < startDate) {
            // Show invalid message, set the color to red, and keep Rent button disabled
            document.getElementById("perday_total_text").innerHTML = "Invalid";
            document.getElementById("perday_total_text").style.color = "red"; // Set text color to red
            document.getElementById("perday_total_input").value = ""; // Clear total field
            document.getElementById("perday_days_summary_input").value = ""; // Clear days summary
            document.getElementById("perday_days_summary_text").innerHTML = ""; // Clear days summary text
            rentButton.disabled = true; // Keep the "Rent" button disabled
            return; // Exit the function early to prevent further calculations
        }

        // Convert the dates back to "YYYY-MM-DD" format for hidden inputs
        var convertedStartDate = startDate.getFullYear() + '-' + ('0' + (startDate.getMonth() + 1)).slice(-2) + '-' + ('0' + startDate.getDate()).slice(-2);
        var convertedEndDate = endDate.getFullYear() + '-' + ('0' + (endDate.getMonth() + 1)).slice(-2) + '-' + ('0' + endDate.getDate()).slice(-2);

        // Set converted dates to hidden inputs
        document.getElementById("perday_convert_start_date").value = convertedStartDate;
        document.getElementById("perday_convert_end_date").value = convertedEndDate;

        // Get rate per day
        var ratePerDay = parseFloat(document.getElementById("perday_equipment_rate_per_day").value);

        // Calculate duration in days
        var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
        var duration = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Duration excluding the end date as it's counted as a full day

        // Calculate total
        var total = ratePerDay * (duration + 1); // Adding 1 to include both start and end dates

        // Update total input field
        document.getElementById("perday_total_input").value = total.toFixed(0);

        // Update total display element
        document.getElementById("perday_total_text").innerHTML = "Total: ₱" + total.toFixed(0);
        document.getElementById("perday_total_text").style.color = "black"; // Reset color to black

        // Update days summary input field
        document.getElementById("perday_days_summary_input").value = duration === 0 ? "1 day" : (duration + 1) + " days"; // Check if duration is 0 to display "1 day"

        document.getElementById("perday_days_summary_text").innerHTML = "Duration: " + (duration === 0 ? "1 day" : (duration + 1) + " days");

        // Enable the "Rent" button after valid calculation
        rentButton.disabled = false;

    } else {
        // Clear total input field, total display element, and days summary input field if either start or end date is empty
        document.getElementById("perday_total_input").value = "";
        document.getElementById("perday_total_text").innerHTML = "";
        document.getElementById("perday_days_summary_input").value = "";
        document.getElementById("perday_days_summary_text").innerHTML = "";

        // Keep the "Rent" button disabled if fields are empty
        rentButton.disabled = true;
    }
}



// Function to initialize Flatpickr for date inputs
function initFlatpickr() {
    // Set room ID when "Book Now" button is clicked
    $(".rent_now_btn").click(function() {
        var equipmentId = $(this).attr("equipment-id");
        $("#perday_equipment_id").val(equipmentId);

        // Fetch booked dates for the equipment
        fetchrentDates(equipmentId, function(rentDates) {
            // Initialize Flatpickr for Start Date input with disabled dates
            flatpickr("#perday_rent_start_date", {
                dateFormat: "Y-m-d",
                disable: rentDates.concat(disablePastDates()),
                onChange: function(selectedDates, dateStr, instance) {
                    calculateTotal();
                }
            });

            // Initialize Flatpickr for End Date input with disabled dates
            flatpickr("#perday_rent_end_date", {
                dateFormat: "Y-m-d",
                disable: rentDates.concat(disablePastDates()),
                onChange: function(selectedDates, dateStr, instance) {
                    calculateTotal();
                }
            });
        });
    });

    // Initially disable past dates in both pickers
    flatpickr("#perday_rent_start_date, #perday_rent_end_date", {
        dateFormat: "Y-m-d",
        disable: disablePastDates()
    });
}

// Call the initialization function
initFlatpickr();