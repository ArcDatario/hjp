
$(document).ready(function(){
    // Function to fetch daily orders revenue data from the server
    function fetchDailyOrdersRevenueData() {
        $.ajax({
            url: 'fetch_orders_daily_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the daily orders revenue display
                animateDailyOrdersRevenue(data.total_revenue_today, data.total_revenue_html);
                // Update the percentage change
                $('#orders_percentage_today').html(data.percentage_html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching daily orders revenue data: ' + error);
            }
        });
    }

    // Function to animate the daily orders revenue display
    function animateDailyOrdersRevenue(newRevenue, totalRevenueHTML) {
        var currentRevenue = parseInt($('#orders_sales_today').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#orders_sales_today').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#orders_sales_today').html(totalRevenueHTML); // Update the total revenue HTML
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch daily orders revenue data initially when the page loads
    fetchDailyOrdersRevenueData();

    // Set interval to fetch daily orders revenue data periodically (every 5 seconds)
    setInterval(fetchDailyOrdersRevenueData, 2000);
});



$(document).ready(function(){
    // Function to fetch monthly orders revenue data from the server
    function fetchMonthlyOrdersRevenueData() {
        $.ajax({
            url: 'fetch_monthly_orders_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the monthly orders revenue display
                animateMonthlyOrdersRevenue(data.total_revenue_current_month);
                // Update the percentage change
                $('#orders_percentage_month').html(data.percentage_html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching monthly orders revenue data: ' + error);
            }
        });
    }

    // Function to animate the monthly orders revenue display
    function animateMonthlyOrdersRevenue(newRevenue) {
        var currentRevenue = parseInt($('#orders_sales_month').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#orders_sales_month').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#orders_sales_month').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch monthly orders revenue data initially when the page loads
    fetchMonthlyOrdersRevenueData();

    // Set interval to fetch monthly orders revenue data periodically (every 5 seconds)
    setInterval(fetchMonthlyOrdersRevenueData, 5000);
});



	$(document).ready(function(){
    // Function to fetch yearly orders revenue data from the server
    function fetchYearlyOrdersRevenueData() {
        $.ajax({
            url: 'fetch_yearly_orders_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the yearly orders revenue display
                animateYearlyOrdersRevenue(data.total_revenue_current_year);
                // Update the percentage change
                $('#orders_percentage_year').html(data.percentage_html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching yearly orders revenue data: ' + error);
            }
        });
    }

    // Function to animate the yearly orders revenue display
    function animateYearlyOrdersRevenue(newRevenue) {
        var currentRevenue = parseInt($('#orders_sales_year').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#orders_sales_year').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#orders_sales_year').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch yearly orders revenue data initially when the page loads
    fetchYearlyOrdersRevenueData();

    // Set interval to fetch yearly orders revenue data periodically (every 5 seconds)
    setInterval(fetchYearlyOrdersRevenueData, 5000);
});


	$(document).ready(function(){
    // Function to fetch overall orders revenue data from the server
    function fetchOverallOrdersRevenueData() {
        $.ajax({
            url: 'fetch_overall_orders_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the overall orders revenue display
                animateOverallOrdersRevenue(data.overall_orders_revenue);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching overall orders revenue data: ' + error);
            }
        });
    }

    // Function to animate the overall orders revenue display
    function animateOverallOrdersRevenue(newRevenue) {
        var currentRevenue = parseInt($('#overall_orders_sales').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#overall_orders_sales').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#overall_orders_sales').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch overall orders revenue data initially when the page loads
    fetchOverallOrdersRevenueData();

    // Set interval to fetch overall orders revenue data periodically (every 5 seconds)
    setInterval(fetchOverallOrdersRevenueData, 2000);
});