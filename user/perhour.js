

const ratePerHourInput = document.getElementById('perhour_equipment_rate_per_hour');
const startDateInput = document.getElementById('perhour_rent_start_date');
const endDateInput = document.getElementById('perhour_rent_end_date');
const totalInput = document.getElementById('perhour_total_input');
const totalText = document.getElementById('perhour_total_text');
const hoursSummaryInput = document.getElementById('perhour_hours_summary_input');
const hoursSummaryText = document.getElementById('perhour_hours_summary_text');
const convertStartDateInput = document.getElementById('perhour_convert_start_date');
const convertEndDateInput = document.getElementById('perhour_convert_end_date');

// Function to calculate the total
function calculateperhourTotal() {
    // Check if start date and end date inputs are filled
    if (startDateInput.value && endDateInput.value) {
        const ratePerHour = parseFloat(ratePerHourInput.value);
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);

        // Calculate the duration in hours
        const duration = (endDate - startDate) / (1000 * 60 * 60); // milliseconds to hours

        // Calculate the total
        const total = ratePerHour * duration;

        // Update the total input field
        totalInput.value = total.toFixed(0); // Adjust decimal places as needed

        // Update the total text element
        totalText.textContent = `Total: ₱${total.toFixed(0)}`;

        // Update the hours summary input field
        hoursSummaryInput.value = duration === 1 ? '1 hour' : `${duration.toFixed(0)} hours`;

        // Update the hours summary label
        hoursSummaryText.textContent = `Duration: ${duration.toFixed(0)} hour${duration === 1 ? '' : 's'}`;

        // Convert and update start date input
        convertStartDateInput.value = convertDateFormat(startDateInput.value);

        // Convert and update end date input
        convertEndDateInput.value = convertDateFormat(endDateInput.value);
    } else {
        // If start date or end date is not filled, reset total input, text, and hours summary input
        totalInput.value = '';
        totalText.textContent = '';
        hoursSummaryInput.value = '';
        hoursSummaryText.textContent = '';
        convertStartDateInput.value = '';
        convertEndDateInput.value = '';
    }
}

// Function to convert date format
function convertDateFormat(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const day = date.getDate().toString().padStart(2, '0');
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    const seconds = date.getSeconds().toString().padStart(2, '0');
    
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

function validateEndDate() {
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    // Check if end date is earlier than start date
    if (endDate < startDate) {
        // Show SweetAlert toast indicating the issue
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "info",
            title: "Invalid Date!"
        });

        // Apply red border to start date and end date inputs
        startDateInput.style.border = '1px solid red';
        endDateInput.style.border = '1px solid red';

        // Disable the Rent button
        perhourBtn.disabled = true;
    } else {
        // Reset border to default
        startDateInput.style.border = '';
        endDateInput.style.border = '';

        // Enable the Rent button
        perhourBtn.disabled = false;
    }
}
const perhourBtn = document.getElementById('perhour_btn');
// Listen for changes in the inputs
ratePerHourInput.addEventListener('input', calculateperhourTotal);
startDateInput.addEventListener('input', calculateperhourTotal);
endDateInput.addEventListener('input', calculateperhourTotal);

endDateInput.addEventListener('input', validateEndDate);


  
function fetchperhourrentDates(equipmentId, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_perhour_rental.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var perhourrentDates = JSON.parse(xhr.responseText);
            callback(perhourrentDates);
        }
    };
    xhr.send("perhour_equipment_id=" + equipmentId);
}

// Function to disable past dates
function disableperHourPastDates() {
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




// Function to initialize Flatpickr for date inputs
function initFlatpickr() {
    // Set room ID when "Book Now" button is clicked
    $(".rent_now_btn").click(function() {
        var equipmentId = $(this).attr("equipment-id");
        $("#perhour_equipment_id").val(equipmentId);

        // Fetch booked dates for the equipment
        fetchrentDates(equipmentId, function(perhourrentDates) {
            // Initialize Flatpickr for Start Date input with disabled dates
            flatpickr("#perhour_rent_start_date", {
              enableTime: true,
                dateFormat: "Y-m-d h:00 K",
                disable: perhourrentDates.concat(disableperHourPastDates()),
                onChange: function(selectedDates, dateStr, instance) {
                  calculateperhourTotal()
                }
            });

            // Initialize Flatpickr for End Date input with disabled dates
            flatpickr("#perhour_rent_end_date", {
              enableTime: true,
                dateFormat: "Y-m-d h:00 K",
                disable: perhourrentDates.concat(disableperHourPastDates()),
                onChange: function(selectedDates, dateStr, instance) {
                  calculateperhourTotal()
                }
            });
        });
    });

    // Initially disable past dates in both pickers
    flatpickr("#perday_rent_start_date, #perday_rent_end_date", {
      enableTime: true,
        dateFormat: "Y-m-d h:00 K",
        disable: disableperHourPastDates()
    });
}

initFlatpickr();