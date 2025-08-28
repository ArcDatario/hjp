<div class="col-md-6 col-lg-3" id="monthly_revenue" style="display:none;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
								<img src="wheel-bulldozer.png" alt="" height="60" width="60">
								</div>
								<div class="col-8">
									<p>This Month</p>
									<?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');


  $current_month = date("m");
  $previous_month = date("m", strtotime("-1 month"));
  $current_year = date("Y");

  // Query to get the total revenue for the current month
  $query_current_month = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_month FROM rental WHERE paid_status = 'Paid' AND YEAR(paid_date) = '$current_year' AND MONTH(paid_date) = '$current_month'";
  $result_current_month = mysqli_query($conn, $query_current_month);
  $row_current_month = mysqli_fetch_assoc($result_current_month);
  $total_revenue_current_month = $row_current_month['total_revenue_current_month'];

  // Query to get the total revenue for the previous month
  $query_previous_month = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_month FROM rental WHERE paid_status = 'Paid' AND YEAR(paid_date) = '$current_year' AND MONTH(paid_date) = '$previous_month'";
  $result_previous_month = mysqli_query($conn, $query_previous_month);
  $row_previous_month = mysqli_fetch_assoc($result_previous_month);
  $total_revenue_previous_month = $row_previous_month['total_revenue_previous_month'];

  // Close the database connection
  mysqli_close($conn);

  // Calculate the percentage change
  if ($total_revenue_previous_month != 0) {
      $percentage_change = (($total_revenue_current_month - $total_revenue_previous_month) / $total_revenue_previous_month) * 100;
      // Round the percentage change to a whole number
      $percentage_change = round($percentage_change);
  } else {
      // Set percentage change to 100% if previous month's revenue is zero
      $percentage_change = 100;
  }

  $sign = ($percentage_change >= 0) ? '+' : '-';
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  echo '<span class="' . $class . ' small pt-1 fw-bold" style="color:black; float:right; margin-top:9%; font-size:0.8rem;" id="rent_percentage_month">'. $sign . abs($percentage_change) . '%</span>';
 
  echo '<h5 id="rent_sales_month" style="font-size:1.1rem;">₱' . number_format($total_revenue_current_month, 0) . '</h5>';


  ?>
								</div>
							</div>
						</div>
					</div>
				</div>