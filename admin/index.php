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
					<a href="index.php" class="active">
						<i class='bx bxs-dashboard icon' ></i> Dashboard
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

	<?php include "generate_report_modal.php";?>

	<div class="sidebar-overlay"></div>


	<!--Content Start-->
	<div class="content-start transition">
		<div class="container-fluid dashboard">
			
			<div class="content-header">
				<h1>Dashboard</h1>
				
			</div>
			<div class="wrapper">
  <div class="option">
    <input checked="" value="option1" name="toggle_btn" type="radio" id="today" class="toggle_input">
    <div class="toggle_btn">
      <span class="span">Today</span>
    </div>
  </div>
  <div class="option">
    <input value="option2" name="toggle_btn" type="radio" id="monthly" class="toggle_input">
    <div class="toggle_btn">
      <span class="span">Monthly</span>
    </div>  </div>
  <div class="option">
    <input value="option3" name="toggle_btn" type="radio" id="yearly" class="toggle_input">
    <div class="toggle_btn">
      <span class="span">Yearly</span>
    </div>  
  </div>
  <div class="option">
    <input value="option4" name="toggle_btn" type="radio" id="overall" class="toggle_input">
    <div class="toggle_btn">
      <span class="span">Overall</span>
    </div>  
  </div>
</div>

			<br>
			

			<div class="row">

			<div class="col-md-6 col-lg-3" id="today_revenue" style="display:block;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
								<img src="wheel-bulldozer.png" alt="" height="60" width="60">
								</div>
								<div class="col-8">
<p>Today</p> <?php
// Set the default time zone to the Philippines
date_default_timezone_set('Asia/Manila');

// Include your database connection file
include "conn.php";

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM rental WHERE DATE(paid_date) = '$today_revenue' AND paid_status = 'Paid'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die('Error fetching today\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM rental WHERE DATE(paid_date) = '$yesterday_revenue' AND paid_status = 'Paid'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die('Error fetching yesterday\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_yesterday = mysqli_fetch_assoc($result_revenue_yesterday);
$total_revenue_yesterday = $row_revenue_yesterday['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

$percentage_change = round($percentage_change);


$sign = ($percentage_change >= 0) ? '+' : '-';

$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

echo '<span class="' . $class . ' small pt-1 fw-bold" style="color:black; float:right; margin-top:2%;  font-size:0.8rem;" id="rent_percentage_today">' . $sign . abs($percentage_change) . '%</span>';

echo '<h5 id="rent_sales_today" style="font-size:1.1rem;">₱' . number_format($total_revenue_today, 0) . '</h5>';

?>

									
								</div>
							</div>
						</div>
					</div>
				</div>

					<?php include "cards/monthly_rent_revenue.php";?>
					<?php include "cards/yearly_rent_revenue.php";?>
					<?php include "cards/overall_rent_revenue.php";?>
				

				<div class="col-md-6 col-lg-3" id="today_orders_revenue" style="display:block;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
									
									<img src="dunes.png" alt="" height="60" width="60">
								</div>
								<div class="col-8">
									<p>Today</p>
									<?php
// Set the default time zone to the Philippines
date_default_timezone_set('Asia/Manila');

// Include your database connection file
include "conn.php";

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today
$query_revenue_today = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM orders WHERE DATE(completed_date) = '$today_revenue' AND status = 'Completed'";
$result_revenue_today = mysqli_query($conn, $query_revenue_today);

// Check if query executed successfully
if (!$result_revenue_today) {
    die('Error fetching today\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_today = mysqli_fetch_assoc($result_revenue_today);
$total_revenue_today = $row_revenue_today['total_revenue_today'];

// Query to calculate total revenue for yesterday
$query_revenue_yesterday = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(completed_date) = '$yesterday_revenue' AND status = 'Completed'";
$result_revenue_yesterday = mysqli_query($conn, $query_revenue_yesterday);

// Check if query executed successfully
if (!$result_revenue_yesterday) {
    die('Error fetching yesterday\'s revenue: ' . mysqli_error($conn));
}

$row_revenue_yesterday = mysqli_fetch_assoc($result_revenue_yesterday);
$total_revenue_yesterday = $row_revenue_yesterday['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

$percentage_change = round($percentage_change);


$sign = ($percentage_change >= 0) ? '+' : '-';

$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

echo '<span class="' . $class . ' small pt-1 fw-bold" style="color:black; float:right;margin-top:2.8%; font-size:0.8rem;" id="orders_percentage_today">' . $sign . abs($percentage_change) . '%</span>';

echo '<h5 id="orders_sales_today" style="font-size:1.1rem;">₱' . number_format($total_revenue_today, 0) . '</h5>';

?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php include "cards/monthly_orders_revenue.php";?>
				<?php include "cards/overall_orders_revenue.php";?>
				<?php include "cards/yearly_orders_revenue.php";?>

				<div class="col-md-6 col-lg-3" id="today_overall_sales" style="display:block;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
								<img src="philippine-peso.png" alt="" height="60" width="60">
								</div>
								<div class="col-8" >
									<p>Sales Today</p>
									
									<?php
// Include your database connection file
include "conn.php";

date_default_timezone_set('Asia/Manila');

// Get today's date
$today_revenue = date("Y-m-d");

// Calculate yesterday's date
$yesterday_revenue = date("Y-m-d", strtotime("-1 day", strtotime($today_revenue)));

// Query to calculate total revenue for today from orders
$query_revenue_today_orders = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM orders WHERE DATE(completed_date) = '$today_revenue' AND status = 'Completed'";
$result_revenue_today_orders = mysqli_query($conn, $query_revenue_today_orders);

// Check if query executed successfully for orders
if (!$result_revenue_today_orders) {
    die('Error fetching today\'s revenue from orders: ' . mysqli_error($conn));
}

$row_revenue_today_orders = mysqli_fetch_assoc($result_revenue_today_orders);
$total_revenue_today_orders = $row_revenue_today_orders['total_revenue_today'];

// Query to calculate total revenue for yesterday from orders
$query_revenue_yesterday_orders = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM orders WHERE DATE(completed_date) = '$yesterday_revenue' AND status = 'Completed'";
$result_revenue_yesterday_orders = mysqli_query($conn, $query_revenue_yesterday_orders);

// Check if query executed successfully for orders
if (!$result_revenue_yesterday_orders) {
    die('Error fetching yesterday\'s revenue from orders: ' . mysqli_error($conn));
}

$row_revenue_yesterday_orders = mysqli_fetch_assoc($result_revenue_yesterday_orders);
$total_revenue_yesterday_orders = $row_revenue_yesterday_orders['total_revenue_yesterday'];

// Query to calculate total revenue for today from rental
$query_revenue_today_rental = "SELECT IFNULL(SUM(total), 0) as total_revenue_today FROM rental WHERE DATE(paid_date) = '$today_revenue' AND paid_status = 'Paid'";
$result_revenue_today_rental = mysqli_query($conn, $query_revenue_today_rental);

// Check if query executed successfully for rental
if (!$result_revenue_today_rental) {
    die('Error fetching today\'s revenue from rental: ' . mysqli_error($conn));
}

$row_revenue_today_rental = mysqli_fetch_assoc($result_revenue_today_rental);
$total_revenue_today_rental = $row_revenue_today_rental['total_revenue_today'];

// Query to calculate total revenue for yesterday from rental
$query_revenue_yesterday_rental = "SELECT IFNULL(SUM(total), 0) as total_revenue_yesterday FROM rental WHERE DATE(paid_date) = '$yesterday_revenue' AND paid_status = 'Paid'";
$result_revenue_yesterday_rental = mysqli_query($conn, $query_revenue_yesterday_rental);

// Check if query executed successfully for rental
if (!$result_revenue_yesterday_rental) {
    die('Error fetching yesterday\'s revenue from rental: ' . mysqli_error($conn));
}

$row_revenue_yesterday_rental = mysqli_fetch_assoc($result_revenue_yesterday_rental);
$total_revenue_yesterday_rental = $row_revenue_yesterday_rental['total_revenue_yesterday'];

// Close the database connection
mysqli_close($conn);

// Compute total revenue for today
$total_revenue_today = $total_revenue_today_orders + $total_revenue_today_rental;

// Compute total revenue for yesterday
$total_revenue_yesterday = $total_revenue_yesterday_orders + $total_revenue_yesterday_rental;

// Calculate percentage change
if ($total_revenue_yesterday != 0) {
    $percentage_change = (($total_revenue_today - $total_revenue_yesterday) / $total_revenue_yesterday) * 100;
} else {
    // Handle the case when yesterday's revenue is zero
    $percentage_change = ($total_revenue_today != 0) ? $total_revenue_today : 0; // Set to today's revenue if today's revenue is positive and yesterday's is zero, otherwise 0%
}

$percentage_change = round($percentage_change);

$sign = ($percentage_change >= 0) ? '+' : '-';
$class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

echo '<div id="overall_sales_data">';

echo '<span class="' . $class . ' small pt-1 fw-bold" style="color:black; float:right; margin-top:7%; font-size:0.8rem;" id="overall_percentage_today">' . $sign . abs($percentage_change) . '%</span>';

// Display total revenue for today
echo '<h5 id="overall_sales_today" style="font-size:1.1rem;">₱' . number_format($total_revenue_today, 0) . '</h5>';
echo '</div>';
?>

								</div>
							</div>
						</div>
					</div>
				</div>

				<?php include "cards/monthly_overall_sales.php";?>
				<?php include "cards/yearly_overall_sales.php";?>
				<?php include "cards/overall_sales.php";?>


				<div class="col-md-6 col-lg-3" id="ratings_card">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
								<img src="rating.png" alt="" height="60" width="60">
								</div>
								<div class="col-8">
									<p>Overall Ratings</p>
									
									<?php
    // Connect to your MySQL database
    include "conn.php";

    // Query to calculate average rating
    $sql = "SELECT AVG(ratings) AS average_rating FROM feedbacks_tbl";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output average rating
        $row = $result->fetch_assoc();
        $average_rating = $row["average_rating"];
        // Format the average rating to have only one decimal place
        $formatted_average_rating = number_format($average_rating, 1);

        // Determine indication and color based on average rating
        $indication = "";
        $color = "";
        if ($average_rating >= 0 && $average_rating <= 1.5) {
            $indication = "Please Improve";
            $color = "red";
        } elseif ($average_rating > 1.5 && $average_rating <= 2.5) {
            $indication = "Moderate";
            $color = "yellow";
        } elseif ($average_rating > 2.5 && $average_rating <= 3.5) {
            $indication = "Good";
            $color = "green";
        } else {
            $indication = "Great!";
            $color = "green";
        }

        echo "<span style=\"float:right; margin-top:7%; color:$color;\">$indication</span>";
        echo "<h5>$formatted_average_rating / 5</h5>";
    } else {
        echo "0 results";
    }

    $conn->close();
?>


								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-6">
						
					<div class="card">
						<div class="card-header">
							<h4 style="display:none;" id="sand_monthly_sales">Sand & Gravel Monthly Sales</h4>
							<h4 style="display:block;" id="he_monthly_sales">Heavy Equipments Monthly Sales</h4>

							<div class="theme_switcher">
  							<label id="switch" class="switch">
    						<input type="checkbox" id="toggle-sales-monthly"><span class="slider round"></span>
  						</label>
						</div>
						</div>
						<div class="card-body">
						
						<div id="reportsChart" style="display:block;"></div>
						<div id="sand_chart" style="display:none;" ></div>	
						</div>
					</div>
				</div>
		
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4>Search Graph</h4>
						</div>

						<div class="card-body">
							<div id="searchChart"></div>
							
						</div>
					</div>
				</div>
				
				<?php include "piechart.php"; ?>

				
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Users Feedbacks</h4>
						</div>
						<div class="card-body"> 
						<div class="table-responsive"> 
						<table class="table table-striped" id="feedback_table">
							<thead>
							  <tr>
								<th scope="col">User</th>
								<th scope="col">Equipment</th>
								<th scope="col">Ratings</th>
								<th scope="col">Feedback</th>
								<th scope="col">Sentiment Analysis</th>
								<th scope="col">Summary</th>
								
							  </tr>
							</thead>
							<tbody>
							<?php

											include "conn.php";


											$sql = "SELECT users_acc.user_name,feedbacks_tbl.comments, equipment_tbl.equipment , ratings, feedbacks_tbl.analysis, feedbacks_tbl.summary
        FROM feedbacks_tbl 
        JOIN users_acc ON feedbacks_tbl.user_id = users_acc.id
        JOIN equipment_tbl ON feedbacks_tbl.equipment_id = equipment_tbl.id";

											$result = $conn->query($sql);
											$i=1;
											if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
											?>

							  <tr>
								<th scope="row"> <?php echo $row['user_name']; ?></th>
								<td> <?php echo $row['equipment']; ?>  </td>
								
								<td> <?php echo $row['ratings']; ?> Star  </td>
								<td> <?php echo $row['comments']; ?>  </td>
								<td> <?php echo $row['analysis']; ?>  </td>
								<td> <?php echo $row['summary']; ?>  </td>
								

							  </tr>

							  <?php
   											 }
											} else {
											?>
       							 <tr>
      								  <td colspan="4">No data found</td>
       								 </tr>
											<?php
											}

											?>  
							</tbody>
						  </table>
						  </div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Overall Equipments Income</h4>
						</div>
						<div class="card-body"> 
						<div class="table-responsive"> 
						<table class="table table-striped" id="rent_table">
							<thead>
							  <tr>
								<th scope="col">Equipment</th>
								<th scope="col">Total</th>
								
							  </tr>
							</thead>
							<tbody>
							<?php

											include "conn.php";


											$sql = "SELECT equipment_name, SUM(total) AS total_sum FROM rental WHERE paid_status='Paid' GROUP BY equipment_name ORDER BY total_sum DESC";
											$result = $conn->query($sql);
											$i=1;
											if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
											?>

							  <tr>
								<th scope="row"> <?php echo $row['equipment_name'];?>	</th>
								<td> <?php echo number_format($row['total_sum']); ?> </td>
								

							  </tr>

							  <?php
   											 }
											} else {
											?>
       							 <tr>
      								  <td colspan="4">No data found</td>
       								 </tr>
											<?php
											}

											?>  
							</tbody>
						  </table>
						  </div>
						</div>
					</div>
				</div>

				

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Overall Aggregates Income</h4>
						</div>
						<div class="card-body"> 
						<div class="table-responsive"> 
						<table class="table table-striped" id="rent_table">
							<thead>
							  <tr>
								<th scope="col">Aggregates</th>
								<th scope="col">Total</th>
								
							  </tr>
							</thead>
							<tbody>
							<?php

											include "conn.php";


											$sql = "SELECT sand_name, SUM(total) AS total_sum FROM orders WHERE status='Completed' GROUP BY sand_name ORDER BY total_sum DESC";
											$result = $conn->query($sql);
											$i=1;
											if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
											?>

							  <tr>
								<th scope="row"> <?php echo $row['sand_name'];?>	</th>
								<td> <?php echo number_format($row['total_sum']); ?> </td>
								

							  </tr>

							  <?php
   											 }
											} else {
											?>
       							 <tr>
      								  <td colspan="4">No data found</td>
       								 </tr>
											<?php
											}

											?>  
							</tbody>
						  </table>
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Users</h4>
						</div>
						<div class="card-body"> 
						<div class="table-responsive"> 
						<table class="table table-striped" id="users_tbl">
							<thead>
							  <tr>
								<th scope="col">Profile</th>
								<th scope="col">Name</th>
								
								
							  </tr>
							</thead>
							<tbody>
							<?php

											include "conn.php";


											$sql = "SELECT * FROM users_acc";

											$result = $conn->query($sql);
											$i=1;
											if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
											?>

							  <tr>
								<th scope="row"> <img src="../user_images/<?php echo $row['image']; ?>" alt="User Profile" style="height:80px; width:80px; border-radius:15px;"></th>
								<td> <?php echo $row['user_name']; ?>  </td>
								
								

							  </tr>

							  <?php
   											 }
											} else {
											?>
       							 <tr>
      								  <td colspan="4">No data found</td>
       								 </tr>
											<?php
											}

											?>  
							</tbody>
						  </table>
						  </div>
						</div>
					</div>
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





<script>
   const today = document.getElementById('today');
  const monthly = document.getElementById('monthly');
  const yearly = document.getElementById('yearly');
  const overall = document.getElementById('overall');
  // Add event listener to toggle between Today and Monthly
  today.addEventListener('click', () => {
    document.getElementById('today_revenue').style.display = 'block';
    document.getElementById('monthly_revenue').style.display = 'none';
	document.getElementById('yearly_revenue').style.display = 'none';
	document.getElementById('overall_revenue').style.display = 'none';

	document.getElementById('today_orders_revenue').style.display = 'block';
	document.getElementById('monthly_orders_revenue').style.display = 'none';
	document.getElementById('yearly_orders_revenue').style.display = 'none';
	document.getElementById('overall_orders_revenue').style.display = 'none';

	document.getElementById('today_overall_sales').style.display = 'block';
	document.getElementById('monthly_overall_sales').style.display = 'none';
	document.getElementById('yearly_overall_sales').style.display = 'none';
	document.getElementById('overall_sales').style.display = 'none';
  });


  monthly.addEventListener('click', () => {
	document.getElementById('monthly_revenue').style.display = 'block';
    document.getElementById('today_revenue').style.display = 'none';
	document.getElementById('yearly_revenue').style.display = 'none';
	document.getElementById('overall_revenue').style.display = 'none';

	document.getElementById('monthly_orders_revenue').style.display = 'block';
	document.getElementById('today_orders_revenue').style.display = 'none';
	document.getElementById('yearly_orders_revenue').style.display = 'none';
	document.getElementById('overall_orders_revenue').style.display = 'none';

	document.getElementById('monthly_overall_sales').style.display = 'block';
	document.getElementById('today_overall_sales').style.display = 'none';
	document.getElementById('yearly_overall_sales').style.display = 'none';
	document.getElementById('overall_sales').style.display = 'none';
  });

  yearly.addEventListener('click', () => {
	document.getElementById('yearly_revenue').style.display = 'block';
	document.getElementById('monthly_revenue').style.display = 'none';
    document.getElementById('today_revenue').style.display = 'none';
	document.getElementById('overall_revenue').style.display = 'none';

	document.getElementById('yearly_orders_revenue').style.display = 'block';
	document.getElementById('monthly_orders_revenue').style.display = 'none';
	document.getElementById('today_orders_revenue').style.display = 'none';
	document.getElementById('overall_orders_revenue').style.display = 'none';

	document.getElementById('yearly_overall_sales').style.display = 'block';
	document.getElementById('monthly_overall_sales').style.display = 'none';
	document.getElementById('today_overall_sales').style.display = 'none';
	document.getElementById('overall_sales').style.display = 'none';
  });

  overall.addEventListener('click', () => {
	document.getElementById('yearly_revenue').style.display = 'none';
	document.getElementById('monthly_revenue').style.display = 'none';
    document.getElementById('today_revenue').style.display = 'none';
	document.getElementById('overall_revenue').style.display = 'block';

	document.getElementById('overall_orders_revenue').style.display = 'block';
	document.getElementById('yearly_orders_revenue').style.display = 'none';
	document.getElementById('monthly_orders_revenue').style.display = 'none';
	document.getElementById('today_orders_revenue').style.display = 'none';

	document.getElementById('overall_sales').style.display = 'block';
	document.getElementById('yearly_overall_sales').style.display = 'none';
	document.getElementById('monthly_overall_sales').style.display = 'none';
	document.getElementById('today_overall_sales').style.display = 'none';
	
  });



</script>






<script>
   const today = document.getElementById('today');
  const monthly = document.getElementById('monthly');
  const yearly = document.getElementById('yearly');
  const overall = document.getElementById('overall');
  // Add event listener to toggle between Today and Monthly
  today.addEventListener('click', () => {
    document.getElementById('today_revenue').style.display = 'block';
    document.getElementById('monthly_revenue').style.display = 'none';
  });




  monthly.addEventListener('click', () => {
    document.getElementById('today_revenue').style.display = 'none';
    document.getElementById('monthly_revenue').style.display = 'block';
  });



</script>




<script>
	 const toggleMonthlySales = document.getElementById('toggle-sales-monthly');

// Get the elements to toggle
const heMonthlySales = document.getElementById('he_monthly_sales');
const sandMonthlySales = document.getElementById('sand_monthly_sales');
const reportsChart = document.getElementById('reportsChart');
const sand_chart = document.getElementById('sand_chart');
// Add event listener to toggle the sections
toggleMonthlySales.addEventListener('change', () => {
  if (toggleMonthlySales.checked) {
	reportsChart.style.display = 'none';
	heMonthlySales.style.display = 'none';
	sand_chart.style.display = 'block';
	sandMonthlySales.style.display = 'block';
  } else {
	reportsChart.style.display = 'block';
	heMonthlySales.style.display = 'block';
	sandMonthlySales.style.display = 'none';
	sand_chart.style.display = 'none';
  }
});
</script>



<script>
	 $(document).ready(function() {
        $(".generate_btn").click(function(e) {
            e.preventDefault(); 

  
            $("#reportModal").modal("show");
        });
    });


	 document.getElementById("close_modal_btn").addEventListener("click", function() {
        $('#reportModal').modal('hide'); // Manually hide the modal
    });


	
</script>
<script>
 
    </script>
</script>

<script>
	 flatpickr("#start_date_calendar", {
            dateFormat: "F d, Y", // Set date format to "May 03, 2024"
            onClose: function(selectedDates, dateStr, instance) {
                // Convert the selected date format and set it to the converted input
                document.getElementById("start_date").value = convertDateFormat(dateStr);
            }
        });

        // Function to convert date format
        function convertDateFormat(inputDate) {
            // Create a date object from the input string
            var dateObj = new Date(inputDate);

            // Check if the date object is valid
            if (isNaN(dateObj.getTime())) {
                return "Invalid Date";
            }

           
            var year = dateObj.getFullYear();
            var month = String(dateObj.getMonth() + 1).padStart(2, '0');
            var day = String(dateObj.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }

        flatpickr("#end_date_calendar", {
            dateFormat: "F d, Y", // Set date format to "May 03, 2024"
            onClose: function(selectedDates, dateStr, instance) {
                // Convert the selected date format and set it to the converted input
                document.getElementById("end_date").value = convertDateFormat(dateStr);
            }
        });

        
        function convertDateFormat(inputDate) {
            
            var dateObj = new Date(inputDate);

            
            if (isNaN(dateObj.getTime())) {
                return "Invalid Date";
            }

            // Format the date as YYYY-MM-DD
            var year = dateObj.getFullYear();
            var month = String(dateObj.getMonth() + 1).padStart(2, '0');
            var day = String(dateObj.getDate()).padStart(2, '0');

            return `${year}-${month}-${day}`;
        }
</script>
<script>
new DataTable('#feedback_table');
</script>

<script>
new DataTable('#users_tbl');
</script>



<script src="list-count.js"></script>
<script src="custom-report3.js"></script>
<script src="orders_chart.js"></script>
<script src="search_graph.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
 </body>
</html>
