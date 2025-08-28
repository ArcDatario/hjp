$(document).ready(function(){
    // Function to fetch overall sales data from the server
    function fetchOverallSalesData() {
        $.ajax({
            url: 'fetch_overall_sales.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                $('#overall_sales_data').html(response); // Update the content of the revenue display container
            },
            error: function(xhr, status, error) {
                console.error('Error fetching overall sales data: ' + error);
            }
        });
    }

    // Fetch overall sales data initially when the page loads
    fetchOverallSalesData();

    // Set interval to fetch overall sales data periodically (every 5 seconds)
    setInterval(fetchOverallSalesData, 2000);
});





	$(document).ready(function(){
    // Function to fetch monthly revenue data from the server
    function fetchMonthlyRevenueData() {
        $.ajax({
            url: 'fetch_monthly_overall_sales.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                $('#monthly_sales').html(response); // Update the content of the revenue display container
            },
            error: function(xhr, status, error) {
                console.error('Error fetching monthly revenue data: ' + error);
            }
        });
    }

    // Fetch monthly revenue data initially when the page loads
    fetchMonthlyRevenueData();

    // Set interval to fetch monthly revenue data periodically (every 5 seconds)
    setInterval(fetchMonthlyRevenueData, 2000);
});


	$(document).ready(function(){
    // Function to fetch overall yearly sales data from the server
    function fetchOverallYearlyData() {
        $.ajax({
            url: 'fetch_overall_yearly.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                $('#overall_yearly').html(response); // Update the content of the yearly revenue display container
            },
            error: function(xhr, status, error) {
                console.error('Error fetching overall yearly data: ' + error);
            }
        });
    }

    // Fetch overall yearly sales data initially when the page loads
    fetchOverallYearlyData();

    // Set interval to fetch overall yearly sales data periodically (every 5 seconds)
    setInterval(fetchOverallYearlyData, 2000);
});


	 $(document).ready(function() {
        // Function to fetch overall total revenue data from the server
        function fetchOverallTotalRevenue() {
            $.ajax({
                url: 'fetch_overall_total_revenue.php', // Change this to the URL where your PHP script resides
                type: 'GET',
                success: function(response) {
                    $('#overall_sales_orders_rent').html(response); // Update the content of the overall total revenue display container
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching overall total revenue data: ' + error);
                }
            });
        }

        // Fetch overall total revenue data initially when the page loads
        fetchOverallTotalRevenue();

        // Set interval to fetch overall total revenue data periodically (every 5 seconds)
        setInterval(fetchOverallTotalRevenue, 2000);
    });