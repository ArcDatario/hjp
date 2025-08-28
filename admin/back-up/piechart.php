<div class="col-md-12">
	<div class="card">
						<div class="card-header">
							<h4>Feedbacks Chart</h4>
						</div>
						
						<div class="card-body piechart" id="piechart" style="text-align: center;"> 
						<div id="chartLabels">
    <p style="color:#50c878 !important; display: inline-block; margin-right: 5%;" id="very-satisfied">Very Satisfied</p>
    <p style="color:#228b22 !important; display: inline-block; margin-right: 5%;" id="satisfied">Satisfied</p>
    <p style="color:#808000 !important; display: inline-block; margin-right: 5%;" id="neutral">Neutral</p>
    <p style="color:#dc143c !important; display: inline-block; margin-right: 5%;" id="poor">Poor</p>
    <p style="color:#ff2400 !important; display: inline-block; margin-right: 5%;" id="very-poor">Very Poor</p>
</div>

					</div>

						
						
						
	</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from feedbacks-chart.php using fetch API
    fetch('functions/feedbacks-chart.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Calculate total count of all likert responses
            var totalCount = data.reduce((total, item) => total + parseInt(item.total_likert), 0);

            // Process data for ApexCharts
            var labels = ['Very Satisfied', 'Satisfied', 'Neutral', 'Poor', 'Very Poor'];
            var series = labels.map(label => {
                var found = data.find(item => item.likert === label);
                if (found) {
                    // Calculate percentage relative to totalCount
                    var percentage = (found.total_likert / totalCount) * 100;
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
                series: series.map(item => item.percentage),
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
                                return series[opts.seriesIndex].name.toUpperCase() + " " + series[opts.seriesIndex].percentage.toFixed(0) + "%";
                            },
                        },
                    }
                },
                colors: ['#50c878', '#228b22', '#808000', '#dc143c', '#ff2400'], // Colors for each likert category
                labels: labels, // Labels in the specified order
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
            labels.forEach((label, index) => {
                var percentage = series[index].percentage.toFixed(0) + "%";
                var labelElement = chartLabels.querySelector(`#${label.replace(/\s+/g, '-').toLowerCase()}`);
                if (labelElement) {
                    labelElement.innerHTML = `${label} ${percentage}`;
                }
            });
        })
        .catch(error => console.error('Error fetching or parsing data:', error));
});







</script>
