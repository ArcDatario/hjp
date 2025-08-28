function handleFormSubmission(event) {
    event.preventDefault();

    // Get the start and end dates from the input fields
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;

    // Format the dates for display
    var startDateFormatted = formatDate(startDate);
    var endDateFormatted = formatDate(endDate);

    var dateRange = `From: ${startDateFormatted} to ${endDateFormatted}`;

    // Start the AJAX request chain
    calculateTotal(startDate, endDate)
        .then(total => {
            return fetchRatingsCard().then(ratingsCardContent => ({
                total,
                ratingsCardContent
            }));
        })
        .then(data => {
            return fetchRentalData(startDate, endDate).then(rentalData => ({
                ...data,
                rentalData
            }));
        })
        .then(data => {
            return fetchStatusCounts(startDate, endDate).then(statusCounts => ({
                ...data,
                statusCounts
            }));
        })
        .then(data => {
            return fetchOrdersData(startDate, endDate).then(ordersData => ({
                ...data,
                ordersData
            }));
        })
        .then(data => {
            generatePrintWindow(dateRange, data.total, data.ratingsCardContent, data.rentalData, data.statusCounts, data.ordersData);
        })
        .catch(error => {
            console.error("Error processing report:", error);
            alert("Error processing report. Please try again.");
        });
}

// Helper function to format date
function formatDate(date) {
    return new Date(date).toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
}

// Helper function to add commas to numbers
function numberWithCommas(x) {
    return parseFloat(x).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// AJAX call to calculate total
function calculateTotal(startDate, endDate) {
    return $.ajax({
        url: "calculate_report.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(response => response)
    .catch(error => {
        console.error("Error calculating total:", error);
        throw error;
    });
}

// AJAX call to fetch ratings card content
function fetchRatingsCard() {
    return $.ajax({
        url: "fetch_ratings_card.php",
        method: "GET"
    }).then(response => response)
    .catch(error => {
        console.error("Error fetching ratings card content:", error);
        throw error;
    });
}

// AJAX call to fetch rental data
function fetchRentalData(startDate, endDate) {
    return $.ajax({
        url: "fetch_rental_data.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(data => JSON.parse(data))
    .catch(error => {
        console.error("Error fetching rental data:", error);
        throw error;
    });
}

// AJAX call to fetch status counts
function fetchStatusCounts(startDate, endDate) {
    return $.ajax({
        url: "fetch_status_counts.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(data => JSON.parse(data))
    .catch(error => {
        console.error("Error fetching status counts:", error);
        throw error;
    });
}

// AJAX call to fetch orders data
function fetchOrdersData(startDate, endDate) {
    return $.ajax({
        url: "fetch_orders_data_print.php",
        method: "POST",
        data: { start_date: startDate, end_date: endDate }
    }).then(data => JSON.parse(data))
    .catch(error => {
        console.error("Error fetching orders data:", error);
        throw error;
    });
}

// Function to process rental data
function processRentalData(data) {
    var processedData = [];
    var equipmentMap = {};
    data.forEach(item => {
        if (item.status !== 'Pending' && item.status !== 'Cancelled' && item.status !== 'Approved') {
            var equipmentName = item.equipment_name;
            if (equipmentMap[equipmentName]) {
                equipmentMap[equipmentName].total += parseFloat(item.total);
            } else {
                equipmentMap[equipmentName] = {
                    equipment_name: equipmentName,
                    total: parseFloat(item.total)
                };
            }
        }
    });
    for (var key in equipmentMap) {
        processedData.push(equipmentMap[key]);
    }
    return processedData;
}

// Function to process orders data
function processOrdersData(data) {
    var processedOrdersData = [];
    var ordersMap = {};

    data.forEach(orders => {
        if (orders.status !== 'Pending' && orders.status !== 'Cancelled' && orders.status !== 'On Delivery') {
            var sandName = orders.sand_name;
            if (ordersMap[sandName]) {
                ordersMap[sandName].total += parseFloat(orders.total);
            } else {
                ordersMap[sandName] = {
                    sand_name: sandName,
                    total: parseFloat(orders.total)
                };
            }
        }
    });

    for (var key in ordersMap) {
        processedOrdersData.push(ordersMap[key]);
    }

    return processedOrdersData;
}


// Function to generate the print window
function generatePrintWindow(dateRange, total, ratingsCardContent, rentalData, statusCounts, ordersData) {
    var printWindow = window.open('', '_blank');
    var processedRentalData = processRentalData(rentalData);
    var processedOrdersData = processOrdersData(ordersData);

    function getStatusColorClass(status) {
        switch(status) {
            case 'Paid':
            case 'Completed':
                return 'status-green';
            case 'Pending':
                return 'status-orange';
            case 'Cancelled':
                return 'status-red';
                case 'On Delivery':
                return 'status-blue';
            default:
                return '';
        }
    }
    function calculateOrdersTotal(processedOrdersData) {
        return processedOrdersData.reduce((acc, item) => acc + parseFloat(item.total), 0);
    }

    function countStatusOccurrences(ordersData) {
        const statusCounts = {
            completed_count: 0,
            on_delivery_count: 0,
            pending_count: 0,
            cancelled_count: 0
        };
    
        ordersData.forEach(orders => {
            switch (orders.status) {
                case 'Completed':
                    statusCounts.completed_count++;
                    break;
                case 'On Delivery':
                    statusCounts.on_delivery_count++;
                    break;
                case 'Pending':
                    statusCounts.pending_count++;
                    break;
                case 'Cancelled':
                    statusCounts.cancelled_count++;
                    break;
                default:
                    break;
            }
        });
    
        return statusCounts;
    }
    
    // Call the function to count status occurrences
const orderStatus = countStatusOccurrences(ordersData);

    // Inside generatePrintWindow function after processing orders data
    var ordersTotal = calculateOrdersTotal(processedOrdersData);

    printWindow.document.write(`
        <html>
        <head>
            <title>HJP Heavy Equipment Rental Services & Aggregates</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <link rel="stylesheet" href="assets/css/bootstrap.css" >
            <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
            <style>
                .status-green { color: #2A7B5C; }
                .status-orange { color: orange; }
                .status-red { color: red; }
                .status-blue{color:#1E71AC;}
                .d-inline-block { display: inline-block; margin-right: 10px; }
                .d-inline-block1 { display: inline-block; margin-right: 10px; }
                @media print {
                    .page-break { page-break-before: always; }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2 class="text-center my-4">HJP Heavy Equipment Rental Services & Aggregates</h2>
                <div class="row mb-4">
                    <div class="col-4 text-center">
                        <img src="hjp.png" alt="HJP Logo" height="120" width="120">
                    </div>
                    <div class="col-4" style="text-align:center; float:right; margin-top:-120px; margin-right:240px;">
                        <p>Maligaya, Gloria Oriental Mindoro</p>
                        <h4>Rent Sales Report</h4>
                        <p style="font-size:0.9rem;">${dateRange}</p>
                    </div>
                    <div class="col-4" style="float:right; margin-top:-140px; margin-left:35%;">
                        <div class="ratings-card">${ratingsCardContent}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid black;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="width:100%; border-bottom:1px solid grey;">
                        <table class="table table-lg" style="font-size:0.9rem; width:100%">
                            <thead style="text-align:left;">
                                <tr><th>Equipment</th><th>Summary</th><th>Status</th><th>Revenue</th></tr>
                            </thead>
                            <tbody>
                                ${rentalData.map(item => `
                                    <tr>
                                        <td>${item.equipment_name}</td>
                                        <td>${item.summary}</td>
                                        <td class="${getStatusColorClass(item.status)}">${item.status}</td>
                                        <td>${numberWithCommas(item.total)}</td>
                                    </tr>`).join('')}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-sm" style="font-size:0.9rem; width:50%;">
                        <h4>Summary <span style="font-size:0.8rem; font-weight:400; opacity:0.5;">(only calculates the rent where paid and completed)</span> <span style="font-size:0.8rem; color:green; opcaity:0.5;">Completed - ${statusCounts.completed_count}</span>,
                        <span style="font-size:0.8rem; color:green; opcaity:0.5;">Paid - ${statusCounts.paid_count}</span>,
                        <span style="font-size:0.8rem; color:orange; opcaity:0.5;">Pending - ${statusCounts.pending_count}</span>,
                        <span style="font-size:0.8rem; color:red; opcaity:0.5;">Cancelled - ${statusCounts.cancelled_count}</span></h4>
                            <thead style="text-align:left;">
                                <tr><th>Equipment</th><th>Revenue</th></tr>
                            </thead>
                            <tbody>
                            ${processedRentalData.map(item => `<tr><td>${item.equipment_name}</td><td>${numberWithCommas(item.total)}</td></tr>`).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid grey;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 text-right">
                        <h4>Total: ₱ ${numberWithCommas(total)}</h4>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="page-break"></div>
            <div class="container">
                <h2 class="text-center my-4">HJP Heavy Equipment Rental Services & Aggregates</h2>
                <div class="row mb-4">
                    <div class="col-4 text-center">
                        <img src="hjp.png" alt="HJP Logo" height="120" width="120">
                    </div>
                    <div class="col-4" style="text-align:center; float:right; margin-top:-120px; margin-right:240px;">
                        <p>Maligaya, Gloria Oriental Mindoro</p>
                        <h4>Aggregates Sales Report</h4>
                        <p style="font-size:0.9rem;">${dateRange}</p>
                    </div>
                    <div class="col-4" style="float:right; margin-top:-140px; margin-left:35%;">
                        <div class="ratings-card">${ratingsCardContent}</div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid black;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="width:100%; border-bottom:1px solid grey;">
                        <table class="table table-lg" style="font-size:0.9rem; width:100%">
                            <thead style="text-align:left;">
                                <tr><th>Sand</th><th>Summary</th><th>Status</th><th>Revenue</th></tr>
                            </thead>
                            <tbody>
                                ${ordersData.map(orders => `
                                    <tr>
                                        <td>${orders.sand_name}</td>
                                        <td>${orders.summary}</td>
                                        <td class="${getStatusColorClass(orders.status)}">${orders.status}</td>
                                        <td>${numberWithCommas(orders.total)}</td>
                                    </tr>`).join('')}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-sm" style="font-size:0.9rem; width:50%;">
                        <h4>Summary <span style="font-size:0.8rem; font-weight:400; opacity:0.5;">(only calculates the orders where  completed)</span> 
    <span style="font-size:0.8rem; color:green; opacity:0.5;">Completed - ${orderStatus.completed_count}</span>,
    <span style="font-size:0.8rem; color:blue; opacity:0.5;">On Delivery - ${orderStatus.on_delivery_count}</span>,
    <span style="font-size:0.8rem; color:orange; opacity:0.5;">Pending - ${orderStatus.pending_count}</span>,
    <span style="font-size:0.8rem; color:red; opacity:0.5;">Cancelled - ${orderStatus.cancelled_count}</span>
</h4>

                            <thead style="text-align:left;">
                                <tr><th>Sand</th><th>Revenue</th></tr>
                            </thead>
                            <tbody>
                            ${processedOrdersData.map(item => `<tr><td>${item.sand_name}</td><td>${numberWithCommas(item.total)}</td></tr>`).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12" style="border-bottom:1px solid grey;"></div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 text-right">
                    <h4>Total Orders Revenue: ₱ ${numberWithCommas(ordersTotal)}</h4>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </body>
        </html>
    `);

    printWindow.focus();
    printWindow.print();
    printWindow.close();
}

// Attach the form submission handler to the form
document.getElementById("generate_report_form").addEventListener("submit", handleFormSubmission);
