
$(document).ready(function(){
    // Function to fetch revenue data from the server
    function fetchRevenueData() {
        $.ajax({
            url: 'fetch_todays_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the revenue display
                animateRevenue(data.total_revenue_today);
                // Update the percentage change
                $('#rent_percentage_today').html(data.percentage_html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching revenue data: ' + error);
            }
        });
    }


    function animateRevenue(newRevenue) {
        var currentRevenue = parseInt($('#rent_sales_today').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#rent_sales_today').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#rent_sales_today').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch revenue data initially when the page loads
    fetchRevenueData();

    // Set interval to fetch revenue data periodically (every 5 seconds)
    setInterval(fetchRevenueData, 2000);
});


	$(document).ready(function(){
    // Function to fetch monthly revenue data from the server
    function fetchMonthlyRevenueData() {
        $.ajax({
            url: 'fetch_monthly_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the revenue display
                animateMonthlyRevenue(data.total_revenue_current_month);
                // Update the percentage change
                $('#rent_percentage_month').html(data.percentage_html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching monthly revenue data: ' + error);
            }
        });
    }

    // Function to animate the monthly revenue display
    function animateMonthlyRevenue(newRevenue) {
        var currentRevenue = parseInt($('#rent_sales_month').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#rent_sales_month').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#rent_sales_month').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch monthly revenue data initially when the page loads
    fetchMonthlyRevenueData();

    // Set interval to fetch monthly revenue data periodically (every 5 seconds)
    setInterval(fetchMonthlyRevenueData, 2000);
});


	$(document).ready(function(){
    // Function to fetch yearly revenue data from the server
    function fetchYearlyRevenueData() {
        $.ajax({
            url: 'fetch_yearly_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the revenue display
                animateYearlyRevenue(data.total_revenue_current_year);
                // Update the percentage change
                $('#rent_percentage_year').html(data.percentage_html);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching yearly revenue data: ' + error);
            }
        });
    }

    
    function animateYearlyRevenue(newRevenue) {
        var currentRevenue = parseInt($('#rent_sales_year').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#rent_sales_year').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#rent_sales_year').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch yearly revenue data initially when the page loads
    fetchYearlyRevenueData();

    // Set interval to fetch yearly revenue data periodically (every 5 seconds)
    setInterval(fetchYearlyRevenueData, 5000);
});


	$(document).ready(function(){
    // Function to fetch overall revenue data from the server
    function fetchOverallRevenueData() {
        $.ajax({
            url: 'fetch_overall_revenue.php', // Change this to the URL where your PHP script resides
            type: 'GET',
            success: function(response) {
                // Parse the response JSON
                var data = JSON.parse(response);
                // Animate the overall revenue display
                animateOverallRevenue(data.overall_revenue);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching overall revenue data: ' + error);
            }
        });
    }

    // Function to animate the overall revenue display
    function animateOverallRevenue(newRevenue) {
        var currentRevenue = parseInt($('#overall_rent_sales').text().replace(/[^\d]/g, ''));
        var difference = newRevenue - currentRevenue;
        var animationDuration = 1000; // Animation duration in milliseconds
        var frames = 60; // Number of frames for animation
        var increment = difference / frames;
        var current = currentRevenue;

        var timer = setInterval(function() {
            current += increment;
            $('#overall_rent_sales').html('₱' + numberWithCommas(Math.round(current))); // Format the revenue display with commas
            if (current >= newRevenue) {
                clearInterval(timer);
                $('#overall_rent_sales').html('₱' + numberWithCommas(newRevenue)); // Format the revenue display with commas
            }
        }, animationDuration / frames);
    }

    // Function to add commas to a number
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fetch overall revenue data initially when the page loads
    fetchOverallRevenueData();

    // Set interval to fetch overall revenue data periodically (every 5 seconds)
    setInterval(fetchOverallRevenueData, 5000);
});