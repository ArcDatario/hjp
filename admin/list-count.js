// Function to update pending count
function updatePendingCount() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var count = parseInt(xhr.responseText, 10);
                var pendingCountElement = document.getElementById("pendingCount");
                if (count > 0) {
                    pendingCountElement.textContent = count;
                    pendingCountElement.style.display = 'inline'; // Ensure it's displayed
                } else {
                    pendingCountElement.style.display = 'none'; // Hide if count is 0
                }
            } else {
                console.error('Error fetching data:', xhr.status);
            }
        }
    };
    xhr.open("GET", "list-count/fetch_pending_count.php", true);
    xhr.send();
}

// Call the function initially
updatePendingCount();

// Update pending count every 1 second
setInterval(updatePendingCount, 1000);

// Function to update approved count
function updateApprovedCount() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var count = parseInt(xhr.responseText, 10);
                var approvedCountElement = document.getElementById("approvedCount");
                if (count > 0) {
                    approvedCountElement.textContent = count;
                    approvedCountElement.style.display = 'inline'; // Ensure it's displayed
                } else {
                    approvedCountElement.style.display = 'none'; // Hide if count is 0
                }
            } else {
                console.error('Error fetching data:', xhr.status);
            }
        }
    };
    xhr.open("GET", "list-count/fetch_approved_count.php", true);
    xhr.send();
}

// Call the function initially
updateApprovedCount();

// Update approved count every 1 second
setInterval(updateApprovedCount, 1000);

// Function to update paid count
function updatePaidCount() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var count = parseInt(xhr.responseText, 10);
                var paidCountElement = document.getElementById("paidCount");
                if (count > 0) {
                    paidCountElement.textContent = count;
                    paidCountElement.style.display = 'inline'; // Ensure it's displayed
                } else {
                    paidCountElement.style.display = 'none'; // Hide if count is 0
                }
            } else {
                console.error('Error fetching data:', xhr.status);
            }
        }
    };
    xhr.open("GET", "list-count/fetch_paid_count.php", true);
    xhr.send();
}

// Call the function initially
updatePaidCount();

// Update paid count every 1 second
setInterval(updatePaidCount, 1000);

// Function to update pending orders count
function updatePendingOrdersCount() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var count = parseInt(xhr.responseText, 10);
                var pendingOrdersCountElement = document.getElementById("pendingOrdersCount");
                if (count > 0) {
                    pendingOrdersCountElement.textContent = count;
                    pendingOrdersCountElement.style.display = 'inline'; // Ensure it's displayed
                } else {
                    pendingOrdersCountElement.style.display = 'none'; // Hide if count is 0
                }
            } else {
                console.error('Error fetching data:', xhr.status);
            }
        }
    };
    xhr.open("GET", "list-count/fetch_pending_orders_count.php", true);
    xhr.send();
}

// Call the function initially
updatePendingOrdersCount();

// Update pending orders count every 1 second
setInterval(updatePendingOrdersCount, 1000);

// Function to update prepared orders count
function updatePreparingOrdersCount() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var count = parseInt(xhr.responseText, 10);
                var preparingOrdersCountElement = document.getElementById("preparingOrdersCount");
                if (count > 0) {
                    preparingOrdersCountElement.textContent = count;
                    preparingOrdersCountElement.style.display = 'inline'; // Ensure it's displayed
                } else {
                    preparingOrdersCountElement.style.display = 'none'; // Hide if count is 0
                }
            } else {
                console.error('Error fetching data:', xhr.status);
            }
        }
    };
    xhr.open("GET", "list-count/fetch_preparing_orders_count.php", true);
    xhr.send();
}

// Call the function initially
updatePreparingOrdersCount();

// Update prepared orders count every 1 second
setInterval(updatePreparingOrdersCount, 1000);

// Function to update on delivery orders count
function updateOnDeliveryOrdersCount() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var count = parseInt(xhr.responseText, 10);
                var onDeliveryOrdersCountElement = document.getElementById("onDeliveryOrdersCount");
                if (count > 0) {
                    onDeliveryOrdersCountElement.textContent = count;
                    onDeliveryOrdersCountElement.style.display = 'inline'; // Ensure it's displayed
                } else {
                    onDeliveryOrdersCountElement.style.display = 'none'; // Hide if count is 0
                }
            } else {
                console.error('Error fetching data:', xhr.status);
            }
        }
    };
    xhr.open("GET", "list-count/fetch_on_delivery_orders_count.php", true);
    xhr.send();
}

// Call the function initially
updateOnDeliveryOrdersCount();

// Update on delivery orders count every 1 second
setInterval(updateOnDeliveryOrdersCount, 1000);