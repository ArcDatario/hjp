<?php 
include "admin_session.php";

?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Profile - Atrana</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="assets/modules/bootstrap-5.1.3/css/bootstrap.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- FontAwesome CSS-->
	<link rel="stylesheet" href="assets/modules/fontawesome6.1.1/css/all.css">
	<!-- Boxicons CSS-->
	<link rel="stylesheet" href="assets/modules/boxicons/css/boxicons.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
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
					<a href="index.php" >
						<i class='bx bxs-dashboard icon' ></i> Dashboard
					</a>
				</li>

				
                <li class="divider" data-text="STARTER">Equipments Rent</li>
				
				<li>
					<a href="rent_list.php">
					<i class='bx bx-list-ul icon'></i>
						Pending Lists<span style='margin-left:7%;' class='badge bg-danger notif' id='pendingCount'></span>
					</a>
				</li>


				<li>
					<a href="approve_list.php">
					<i class='bx bx-list-ul icon'></i>
						Approved Lists<span style='margin-left:7%;' class='badge bg-danger notif' id='approvedCount'></span>
					</a>
				</li>

				<li>
					<a href="paid_list.php">
					<i class='bx bx-list-ul icon'></i>
						Paid Lists<span style='margin-left:7%;' class='badge bg-danger notif' id='paidCount'></span>
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
						Pending orders<span style='margin-left:7%;' class='badge bg-danger notif' id='pendingOrdersCount'></span>
					</a>
				</li>

				<li>
					<a href="prepaired_orders.php" >
					<i class='bx bx-list-ul icon'></i>
						Prepaired orders<span style='margin-left:7%;' class='badge bg-danger notif' id='prepairingOrdersCount'></span>
					</a>
				</li>
				<li>
					<a href="on_delivery_orders.php" >
					<i class='bx bx-list-ul icon'></i>
						On Delivery orders<span style='margin-left:7%;' class='badge bg-danger notif' id='onDeliveryOrdersCount'></span>
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
			<div class="content-header">
				<h4>Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?> !</h4>
				<p>Change information about yourself on this page</p>
			</div>
		  
            <div class="row">
                <div class="card">
                    <div class="card-body">
					<form action="update_profile.php" method="POST" enctype="multipart/form-data">
					<div class="d-flex align-items-start align-items-sm-center">
    <img src="functions/admin_images/<?php echo htmlspecialchars($_SESSION['image']); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100px" id="uploadedAvatar" />
    <div class="button-wrapper">
        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" name="new_image" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
        </label>
        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800Kb</p>
    </div>
</div>

                    </div>
                    
                    <div class="card-body"> 
                        
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input class="form-control" type="text" id="username" name="user_name" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" autofocus required/>
									<input class="form-control" type="hidden" id="userid" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" autofocus />
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>

                  
                </div>
            </div>


		</div> <!-- End Container -->
	</div><!-- End Content -->


			
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



	<div class="loader">
		<div class="spinner-border text-light" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	
	<!-- Loader -->
	<div class="loader-overlay"></div>
	<script>
    // Function to handle file input change event
    document.getElementById('upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('uploadedAvatar').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

	<!-- General JS Scripts -->
	<script src="assets/js/atrana.js"></script>

	<!-- JS Libraies -->
	<script src="assets/modules/jquery/jquery.min.js"></script>
	<script src="assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
	<script src="assets/modules/popper/popper.min.js"></script>
 
    <!-- Template JS File -->
	<script src="assets/js/script.js"></script>
	<script src="assets/js/custom.js"></script>

	<script src="list-count.js"></script>

 </body>
</html>
