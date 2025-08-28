$(document).ready(function(){
    // Initialize chart variable
    var chart;

    // Function to fetch data and update chart
    function fetchDataAndUpdateChart() {
        $.ajax({
            url: 'get_search_data.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Check if chart is already initialized
                if (!chart) {
                    // Initialize the chart
                    var options = {
                        series: [{
                            data: Object.values(data)
                        }],
                        chart: {
                            type: 'bar',
                            height: 345,
                            animations: {
                                enabled: true,
                                easing: 'easeinout',
                                speed: 800 // Animation duration
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false
                            }
                        },
                        xaxis: {
							categories: Object.keys(data),
                    labels: {
                        formatter: function(val, index) {
                            return val + " (" + data[val].toFixed(0) + "%)"; // Displaying the category along with its percentage value
                        }
                    }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(val) {
                                    return val.toFixed(0) + "%";
                                }
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val.toFixed(2) + "%";
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(document.querySelector("#searchChart"), options);
                    chart.render();
                } else {
                    // Update the existing chart with new data
                    chart.updateSeries([{
                        data: Object.values(data)
                    }]);
                }
            }
        });
    }

    // Initial fetch and render
    fetchDataAndUpdateChart();

    // Fetch and update the chart every 5 seconds (adjust interval as needed)
    setInterval(fetchDataAndUpdateChart, 5000);
});