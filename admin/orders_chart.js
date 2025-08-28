document.addEventListener("DOMContentLoaded", () => {
    let chart;
    let existingData = []; // Store existing data to check for updates
    
    // Function to create or update the chart
    function createOrUpdateChart(data) {
    if (!chart) {
    // Create the initial chart
    chart = new ApexCharts(document.querySelector("#sand_chart"), {
    series: data,
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
            show: true,
            tools: {
                download: true,
                selection: true,
                zoom: true,
                zoomin: true,
                zoomout: true,
                pan: true,
                reset: true | '<img src="/static/icons/reset.png" width="20">',
                customIcons: []
            },
            autoSelected: 'zoom'
        },
    },
    markers: {
        size: 5
    },
    colors: ['#4154f1', '#2eca6a', '#ff771d', '#ffdc34', '#a35cff', '#ff5722', '#00bcd4', '#e91e63', '#8bc34a', '#ffc107', '#9c27b0', '#2196f3'],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.4,
            opacityTo: 0.5,
            stops: [0, 90, 100]
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        width: 2
    },
    tooltip: {
          x: {
              formatter: function(val) {
                  return val;
              }
          },
          y: {
              formatter: function(val) {
                  return `₱ ${Math.floor(val).toLocaleString()}`; // Format to remove decimals and add comma separator
              }
          },
          shared: true, // Enable shared tooltip for all series
          custom: function({ series, seriesIndex, dataPointIndex, w }) {
              const seriesData = w.globals.series;
              const tooltipData = [];
              let hasData = false;
    
              seriesData.forEach((dataSet, index) => {
                  const value = dataSet[dataPointIndex];
                  if (value !== null && value !== undefined && value !== 0) {
                      const formattedValue = `₱ ${Math.floor(value).toLocaleString()}`;
                      tooltipData.push(`<span style="margin-top:10px; display: inline-block; width: 10px; height: 10px; background-color: ${w.config.colors[index]}; border-radius: 50%; margin-right: 5px;"></span><span style="font-size:12.5px; ">${w.config.series[index].name}:</span><span style="font-weight: 600; margin-left:8px;">${formattedValue}</span><br/>`);
    
                      hasData = true;
                  }
              });
    
              if (hasData) {
                  tooltipData.unshift('<div style="box-shadow: 10px 16px 40px 11px rgba(0,0,0,0.6); -webkit-box-shadow: 15px 19px 37px 4px rgba(0,0,0,0.6); -moz-box-shadow: 15px 19px 37px 4px rgba(0,0,0,0.6); background-color: rgba(0, 0, 0, 0); color: #fff; border-radius: 5px; padding: 8px;">');
                  tooltipData.push('</div>');
              }
    
              return tooltipData.join('');
          }
      }
    
    });
    
    // Render the chart
    chart.render();
    } else {
    // Update the existing chart with new data
    chart.updateSeries(data);
    }
    }
    
    
    // Function to fetch data from PHP file and update chart
    function fetchDataAndUpdateChart() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_orders_data.php', true);
    xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
        const data = JSON.parse(xhr.responseText);
    
        const filteredData = data.filter(month => month.data.length > 0);
    
        const newData = filteredData.map(month => ({
            name: month.name,
            data: month.data
        }));
    
        // Check if there are updates in the new data
        const updatedData = newData.filter(item => {
            const existingItem = existingData.find(existing => existing.name === item.name);
            return existingItem ? JSON.stringify(existingItem.data) !== JSON.stringify(item.data) : true;
        });
    
        if (updatedData.length > 0) {
            updatedData.forEach(item => {
                const existingItemIndex = existingData.findIndex(existing => existing.name === item.name);
                if (existingItemIndex !== -1) {
                    // Update the existing data with the new data
                    existingData[existingItemIndex].data = item.data;
                } else {
                    existingData.push(item);
                }
            });
    
            // Update the chart with the updated data
            createOrUpdateChart(existingData.map(item => ({ name: item.name, data: item.data })));
    
            // Calculate and download the CSV with total revenue
            // generateAndDownloadCSV(existingData); // Remove this line
        }
    } else {
        console.error('Failed to fetch data');
    }
    };
    xhr.send();
    }
    
    // Call fetchDataAndUpdateChart initially
    fetchDataAndUpdateChart();
    
    // Set interval to fetch data every 5 seconds (adjust as needed)
    setInterval(fetchDataAndUpdateChart, 1000); // Fetch data every 5 seconds
    
    // Event listener for Download CSV button
    document.querySelector('#downloadRestaurantCSVButton').addEventListener('click', () => {
    generateAndDownloadRestaurantCSV(existingData);
    });
    
    document.querySelector('#downloadRestaurantPNGButton').addEventListener('click', () => {
    downloadPNGRestaurantChart();
    });
    
    // Function to generate and download CSV with total revenue
    function generateAndDownloadRestaurantCSV(data) {
    let csvContent = 'Revenue';
    data.forEach(item => {
    csvContent += `,${item.name}`;
    });
    csvContent += '\n';
    
    const maxRows = Math.max(...data.map(item => item.data.length));
    
    for (let i = 0; i < maxRows; i++) {
    let row = '';
    data.forEach(item => {
        const value = item.data[i] || '';
        row += `,${value}`;
    });
    csvContent += `${row}\n`;
    }
    
    csvContent += '\nTotal ';
    data.forEach(item => {
    const total = item.data.reduce((acc, val) => acc + parseFloat(val), 0);
    csvContent += `,${total}`;
    });
    csvContent += '\n';
    
    
    const overallTotal = data.reduce((acc, item) => {
    const total = item.data.reduce((sum, val) => sum + parseFloat(val), 0);
    return acc + total;
    }, 0);
    csvContent += `\nOverall,${overallTotal}\n`;
    
    
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', 'Restaurant_Revenue_Reports.csv');
    
    // Append the link to the body and click it to trigger download
    document.body.appendChild(link);
    link.click();
    
    // Cleanup
    document.body.removeChild(link);
    window.URL.revokeObjectURL(url);
    }
    
    
    function downloadPNGRestaurantChart() {
    const chartCanvas = document.querySelector('#RestaurantreportsChart svg'); // Assuming the chart is an SVG element
    const chartSVG = new XMLSerializer().serializeToString(chartCanvas);
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const img = new Image();
    
    img.onload = function() {
    canvas.width = img.width;
    canvas.height = img.height + 50; // Increased height to accommodate total revenue text
    ctx.fillStyle = '#ffffff'; // White color
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(img, 0, 0);
    
    // Calculate and draw totals for each month
    const data = existingData.map(item => item.data);
    const totals = data.map(monthData => monthData.reduce((acc, val) => acc + parseFloat(val), 0));
    const months = existingData.map(item => item.name);
    ctx.fillStyle = '#000000'; // Black color for text
    ctx.font = '14px Arial';
    
    let totalText = 'Monthly Revenue:';
    months.forEach((month, index) => {
        totalText += ` ${month}: ₱${totals[index].toLocaleString()} `;
    });
    
    // Draw total revenue text at the bottom
    ctx.fillText(totalText, 10, canvas.height - 10); // Adjust position as needed
    
    // Create download link and trigger download
    const link = document.createElement('a');
    link.href = canvas.toDataURL('image/png');
    link.download = 'Restaurant_Chart_Report.png';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    };
    
    img.src = 'data:image/svg+xml;base64,' + btoa(chartSVG);
    }
    });