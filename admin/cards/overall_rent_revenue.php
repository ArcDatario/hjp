<div class="col-md-6 col-lg-3" id="overall_revenue" style="display:none;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 d-flex align-items-center">
								<img src="wheel-bulldozer.png" alt="" height="60" width="60">
								</div>
								<div class="col-8">
									<p>Overall</p>
									<?php
  // Include your database connection file
  include "../conn.php";

  date_default_timezone_set('Asia/Manila');

  $query_overall_revenue = "SELECT IFNULL(SUM(total), 0) as overall_revenue FROM rental WHERE status IN ('Paid','Completed')";
  $result_overall_revenue = mysqli_query($conn, $query_overall_revenue);
  $row_overall_revenue = mysqli_fetch_assoc($result_overall_revenue);
  $overall_revenue = $row_overall_revenue['overall_revenue'];

  echo '<h5 id="overall_rent_sales" style="font-size:1.1rem;">₱' . number_format($overall_revenue, 0) . '</h5>';
  ?>
								</div>
							</div>
						</div>
					</div>
				</div>