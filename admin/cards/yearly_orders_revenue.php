<div class="col-md-6 col-lg-3" id="yearly_orders_revenue" style="display:none;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
									<img src="dunes.png" alt="" height="60" width="60">
								</div>
								<div class="col-8">
									<p>This Year</p>
									<?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');

  // Get the current year and the previous year
  $current_year = date("Y");
  $previous_year = $current_year - 1;

  // Query to get the total revenue for the current year
  $query_current_year = "SELECT IFNULL(SUM(total), 0) as total_revenue_current_year FROM orders WHERE status = 'Completed' AND YEAR(completed_date) = '$current_year'";
  $result_current_year = mysqli_query($conn, $query_current_year);
  $row_current_year = mysqli_fetch_assoc($result_current_year);
  $total_revenue_current_year = $row_current_year['total_revenue_current_year'];

  // Query to get the total revenue for the previous year
  $query_previous_year = "SELECT IFNULL(SUM(total), 0) as total_revenue_previous_year FROM orders WHERE status = 'Completed' AND YEAR(completed_date) = '$previous_year'";
  $result_previous_year = mysqli_query($conn, $query_previous_year);
  $row_previous_year = mysqli_fetch_assoc($result_previous_year);
  $total_revenue_previous_year = $row_previous_year['total_revenue_previous_year'];


  mysqli_close($conn);

  // Calculate the percentage change
  if ($total_revenue_previous_year != 0) {
      $percentage_change = (($total_revenue_current_year - $total_revenue_previous_year) / $total_revenue_previous_year) * 100;
      // Round the percentage change to a whole number
      $percentage_change = round($percentage_change);
  } else {
      // Set percentage change to 100% if previous year's revenue is zero
      $percentage_change = 100;
  }

  $sign = ($percentage_change >= 0) ? '+' : '-';
  $class = ($percentage_change >= 0) ? 'text-success' : 'text-danger';

  echo '<span class="' . $class . ' small pt-1 fw-bold" id="orders_percentage_year" style="color:black; float:right; margin-top:9%; font-size:0.8rem;">'. $sign . abs($percentage_change) . '%</span>';
  // Display the total revenue for the current year
  echo '<h5 id="orders_sales_year" style="font-size:1.1rem;">₱' . number_format($total_revenue_current_year, 0) . '</h5>';

  // Display percentage change and increase/decrease with the determined class

 
  ?>
								</div>
							</div>
						</div>
					</div>
				</div>