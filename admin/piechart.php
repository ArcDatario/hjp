<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Feedbacks Chart</h4>
        </div>
        
        <div class="card-body piechart" id="piechart" style="text-align: center;"> 
            <div id="chartLabels">
                <p style="color:#50c878 !important; display: inline-block; margin-right: 5%;" id="positive">Positive</p>
                <p style="color:#808000 !important; display: inline-block; margin-right: 5%;" id="neutral">Neutral</p>
                <p style="color:#dc143c !important; display: inline-block; margin-right: 5%;" id="negative">Negative</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from feedbacks-chart.php using fetch API
    fetch('functions/analysis-chart.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Calculate total count for sentiment analysis (Positive, Neutral, Negative)
            var totalSentimentCount = data.reduce((total, item) => total + parseInt(item.total_analysis), 0);

            // Process sentiment analysis data for the chart
            var sentimentLabels = ['Positive', 'Neutral', 'Negative'];
            var sentimentSeries = sentimentLabels.map(label => {
                var found = data.find(item => item.analysis === label);
                if (found) {
                    var percentage = (found.total_analysis / totalSentimentCount) * 100;
                    return {
                        name: label,
                        percentage: parseFloat(percentage.toFixed(2)) // Round to 2 decimal places
                    };
                } else {
                    return {
                        name: label,
                        percentage: 0
                    };
                }
            });

            // ApexCharts configuration
            var options = {
                series: sentimentSeries.map(item => item.percentage), // Use sentiment analysis data for the chart
                chart: {
                    type: 'radialBar',
                    height: '390',
                    width: '100%',
                },
                plotOptions: {
                    radialBar: {
                        startAngle: 0,
                        endAngle: 270,
                        hollow: {
                            margin: 5,
                            size: '30%',
                            background: 'transparent',
                            image: undefined,
                        },
                        dataLabels: {
                            name: {
                                show: true,
                                offsetY: -10, // Adjust the label position
                                formatter: function (val) {
                                    return val;
                                }
                            },
                            value: {
                                show: false,
                            }
                        },
                        barLabels: {
                            enabled: true,
                            fontSize: '12px', // Set font size to 12px
                            formatter: function (opts) {
                                return sentimentSeries[opts.seriesIndex].name.toUpperCase() + " " + sentimentSeries[opts.seriesIndex].percentage.toFixed(0) + "%";
                            },
                        },
                    }
                },
                colors: ['#51A654', '#F2700B', '#BA2B2B'], // Colors for Positive, Neutral, Negative
                labels: sentimentLabels, // Labels for Positive, Neutral, Negative
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            show: true
                        }
                    }
                }]
            };

            // Render ApexCharts in the specified div
            var chart = new ApexCharts(document.querySelector("#piechart"), options);
            chart.render();

            // Update percentages in chart labels
            var chartLabels = document.getElementById('chartLabels');
            sentimentLabels.forEach((label, index) => {
                var percentage = sentimentSeries[index].percentage.toFixed(0) + "%";
                var labelElement = chartLabels.querySelector(`#${label.replace(/\s+/g, '-').toLowerCase()}`);
                if (labelElement) {
                    labelElement.innerHTML = `${label} ${percentage}`;
                }
            });
        })
        .catch(error => console.error('Error fetching or parsing data:', error));
});



</script>
