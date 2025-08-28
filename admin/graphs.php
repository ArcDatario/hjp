<?php 
include "admin_session.php";

?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dashboard - HjP</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="assets/modules/bootstrap-5.1.3/css/bootstrap.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/button.css">
	<!-- FontAwesome CSS-->
	<link rel="stylesheet" href="assets/modules/fontawesome6.1.1/css/all.css">
	<!-- Boxicons CSS-->
	<link rel="stylesheet" href="assets/modules/boxicons/css/boxicons.min.css">
	<!-- Apexcharts  CSS -->
	<link rel="stylesheet" href="assets/modules/apexcharts/new_apexcharts.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include the Canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
	<style>
		.wrapper {
  --font-color-dark: #fefefe;
  --font-color-light: #111;
  --bg-color: #25396f;
  --main-color: #fefefe;
  position: relative;
  width: 300px;
  height: 36px;
  background-color: var(--bg-color);
  border: 2px solid var(--main-color);
  border-radius: 34px;
  display: flex;
  flex-direction: row;
  box-shadow: 4px 4px var(--main-color);
}

.option {
  width: 80.5px;
  height: 28px;
  position: relative;
  top: 2px;
  left: 2px;
}

.toggle_input {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
  appearance: none;
  cursor: pointer;
}

.toggle_btn {
  width: 100%;
  height: 100%;
  background-color: var(--bg-color);
  border-radius: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.span {
  color: var(--font-color-dark);
}

.toggle_input:checked + .toggle_btn {
  background-color: var(--main-color);
}

.toggle_input:checked + .toggle_btn .span {
  color: var(--font-color-light);
}

.apexcharts-toolbar{
	display:none !important;
}




.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 20px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #b1b9c3;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

.slider:before {
  position: absolute;
  content: '';
  height: 30px;
  width: 30px;
  bottom: -5px;
  background: #18333E;
  -webkit-transition: 0.4s;
  transition: 0.4s;
}

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

input:checked+.slider {
  background-color: #b1b9c3;
}

input:checked+.slider:before {
  -webkit-transform: translateX(35px);
  -ms-transform: translateX(35px);
  transform: translateX(35px);
  background: #25396f;
}


#admins-list {
            display: block; /* Initially, show the admins list */
        }
        <?php if ($_SESSION['role'] === 'Staff'): ?>
            #admins-list {
                display: none; /* Hide the admins list if role is staff */
            }
        <?php endif; ?>

	</style>
</head>
<body>
<?php
  // Check if the booking was successful
  if (isset($_SESSION['updated']) && $_SESSION['updated'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "success",
                title: "Updated Successful!"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['updated']);
  }

  ?>
<?php
  // Check if the booking was successful
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
                }
              });
              Toast.fire({
                icon: "success",
                title: "Signed In Successful!"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['logged_in']);
  }

  ?>
  <!--Topbar -->
  <div class="topbar transition">
	<div class="bars">
		<button type="button" class="btn transition" id="sidebar-toggle">
			<i class="fa fa-bars"></i>
		</button>
	</div>
		<div class="menu">
		
			<ul>
			
				<li class="nav-item dropdown dropdown-list-toggle">
						  
				</li>
			 
				 <?php include "admin-profile.php";?>
			</ul>
		</div>
	</div>

	
	<div class="sidebar transition overlay-scrollbars animate__animated  animate__slideInLeft">
        <div class="sidebar-content"> 
        	<div id="sidebar">
			
			
			<div class="logo">
					<h2 class="mb-0"><img src="assets/images/logo.png"> HjP</h2>
			</div>

            <ul class="side-menu">
                <li>
					<a href="index.php">
						<i class='bx bxs-dashboard icon' ></i> Dashboard
					</a>
				</li>
                <li>
					<a href="graphs.php" class="active">
						<i class='bx bxs-dashboard icon' ></i> Graphs
					</a>
				</li>

				
                <li class="divider" data-text="STARTER">Equipments Rent</li>
				
				<li>
    					<a href="rent_list.php">
        				<i class='bx bx-list-ul icon'></i>
       			 Pending Lists 
       			 <span style='margin-left:7%;' class='badge bg-danger notif' id='pendingCount'></span>
    				</a>
					</li>

				<li>
					<a href="approve_list.php">
					<i class='bx bx-list-ul icon'></i>
						Approved Lists
						<span style='margin-left:7%;' class='badge bg-danger notif' id='approvedCount'></span>
					</a>
				</li>

				<li>
					<a href="paid_list.php">
					<i class='bx bx-list-ul icon'></i>
						Paid Lists
						<span style='margin-left:7%;' class='badge bg-danger notif' id='paidCount'></span>
					</a>
				</li>

				<li>
					<a href="completed_list.php">
					<i class='bx bx-list-ul icon'></i>
						Completed
					</a>
				</li>

				<li>
					<a href="cancelled_list.php">
					<i class='bx bx-list-ul icon'></i>
						Cancelled Lists
					</a>
				</li>

				
				<li class="divider" data-text="Atrana">Orders</li>

				<li>
					<a href="pending_orders.php">
					<i class='bx bx-list-ul icon'></i>
						Pending orders
						<span style='margin-left:7%;' class='badge bg-danger notif' id='pendingOrdersCount'></span>
					</a>
				</li>

				<li>
					<a href="prepaired_orders.php" >
					<i class='bx bx-list-ul icon'></i>
						Prepaired orders
						<span style='margin-left:7%;' class='badge bg-danger notif' id='prepairingOrdersCount'></span>
					</a>
				</li>

				<li>
					<a href="on_delivery_orders.php" >
					<i class='bx bx-list-ul icon'></i>
						On Delivery orders
						<span style='margin-left:7%;' class='badge bg-danger notif' id='onDeliveryOrdersCount'></span>
					</a>
				</li>

				<li>
					<a href="completed_orders.php" >
					<i class='bx bx-list-ul icon'></i>
						Completed Orders
					</a>
				</li>
				<li>
					<a href="cancelled_orders.php">
					<i class='bx bx-list-ul icon'></i>
						Cancelled Orders
					</a>
				</li>

				<li class="divider" data-text="Atrana">Equipments & Aggregates</li>
				<li>
					<a href="equipment_list.php">
					<i class='bx bx-list-ul icon'></i>
						Equipment Lists
					</a>
				</li>

				<li>
					<a href="sand_list.php">
					<i class='bx bx-list-ul icon'></i>
						Sand  Lists
					</a>
				</li>
				
				<div id="admins-list">
				<li class="divider" data-text="Atrana">Admins List</li>
				<li>
					<a href="admins_list.php">
					<i class='bx bx-list-ul icon'></i>
						Admin's Accounts
					</a>
				</li>
				</div>
	


				<li class="divider" data-text="Pages">Manage</li>

				<li>
                    <a href="#">
						<i class='bx bxs-user icon' ></i> 
						Account 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>

                    <ul class="side-dropdown">
                        <li><a href="my-profile.php">My Profile</a></li>
                        <li><a href="auth-reset-password.php">Reset Password</a></li>
						<li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
  
				<button class="generate_btn" id="generate_btn" title="Generate Report">
    		<svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
       		 <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
    			</svg>

    			<span class="text">Generate</span>
					</button>
           			<br><br>


            </ul>
			
        </div>

       </div> 
	 </div>
    </div>

	

	<div class="sidebar-overlay"></div>


	<!--Content Start-->
	<div class="content-start transition">
		<div class="container-fluid dashboard">
			
			

			<br>
			

			<div class="row">

		
			

				
		
            <div class="container">
    <div class="row charts-row"></div>
</div>


				
				

				

				

				
			

		   </div>
		</div>
	</div>

	      
	<!-- Footer -->				
	<footer>
		<div class="footer">
			<div class="float-start">
				<p>2024 &copy; Rental</p>
			</div>
				<div class="float-end">
					<p>Crafted with 
						<span class="text-danger">
							<i class="fa fa-heart"></i> by 
							<a href="https://www.facebook.com/mindorostateuccs" class="author-footer">BSIT</a>
						</span> 
					</p>
			</div>
		</div>
	</footer>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>'
    <script>
    // Fetch the data from the PHP file
    fetch('monthlygraphs.php')
        .then(response => response.json())
        .then(data => {
            // Group data by month
            const groupedData = data.reduce((acc, item) => {
                acc[item.month] = acc[item.month] || [];
                acc[item.month].push(parseFloat(item.income));
                return acc;
            }, {});

            // Helper function to format month (e.g., "2024-01" -> "January, 2024")
            function formatMonth(monthString) {
                const [year, month] = monthString.split('-');
                const date = new Date(year, month - 1);
                return `${date.toLocaleString('default', { month: 'long' })}, ${year}`;
            }

            // Get the row container for the charts
            const rowContainer = document.querySelector(".charts-row");

            // Sort months in descending order
            const sortedMonths = Object.keys(groupedData).sort((a, b) => b.localeCompare(a));

            // Loop through each month and create a chart
            sortedMonths.forEach(month => {
                // Create a new column and card container for the chart
                const colDiv = document.createElement("div");
                colDiv.className = "col-md-6 mb-4";

                const cardDiv = document.createElement("div");
                cardDiv.className = "card";

                const cardHeader = document.createElement("div");
                cardHeader.className = "card-header";
                cardHeader.innerHTML = `<h5>Income for ${formatMonth(month)}</h5>`;

                const cardBody = document.createElement("div");
                cardBody.className = "card-body";

                const chartDiv = document.createElement("div");
                chartDiv.id = `chart-${month}`;

                const totalIncome = groupedData[month].reduce((acc, income) => acc + income, 0);  // Calculate total income for the month

                const totalIncomeDiv = document.createElement("div");
                totalIncomeDiv.className = "total-income";
                totalIncomeDiv.innerHTML = `<p><strong>Total Income: ₱${totalIncome.toLocaleString()}</strong></p>`;  // Display total income

                // Append elements to create the card structure
                cardBody.appendChild(chartDiv);
                cardBody.appendChild(totalIncomeDiv);  // Append the total income below the chart
                cardDiv.appendChild(cardHeader);
                cardDiv.appendChild(cardBody);
                colDiv.appendChild(cardDiv);
                rowContainer.appendChild(colDiv);

                // Create the bar chart
                const options = {
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    series: [{
                        name: `Income for ${formatMonth(month)}`,
                        data: groupedData[month]
                    }],
                    xaxis: {
                        categories: groupedData[month],  // Display actual income values as categories
                        title: {
                            text: "Income Values"
                        }
                    },
                    yaxis: {
                        title: {
                            text: "Income"
                        }
                    },
                    title: {
                        
                        align: 'center'
                    },
                    tooltip: {
                        y: {
                            formatter: function (value) {
                                return `Income: ₱${value.toLocaleString()}`;
                            }
                        }
                    }
                };

                const chart = new ApexCharts(chartDiv, options);
                chart.render();
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>







	<!-- Preloader -->
	<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<!-- Loader -->
	<div class="loader-overlay"></div>

	<!-- General JS Scripts -->
	<script src="assets/js/atrana.js"></script>

	<!-- JS Libraies -->
	<script src="assets/modules/jquery/jquery.min.js"></script>
	<script src="assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
	<script src="assets/modules/popper/popper.min.js"></script>

	<!-- Chart Js -->
	<script src="assets/modules/apexcharts/apexcharts.js"></script>
	<script src="assets/js/ui-apexcharts.js"></script>

    <!-- Template JS File -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/custom.js"></script>




<script src="monthly_chart_sales.js"></script>

<script src="rent_cards.js"></script>
<script src="orders_card.js"></script>

<script src="list-count.js"></script>
<script src="custom-report2.js"></script>
<script src="orders_chart.js"></script>
<script src="search_graph.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
 </body>
</html>
