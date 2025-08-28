<?php 
session_start();

?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Dashboard - Atrana</title>

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="assets/modules/bootstrap-5.1.3/css/bootstrap.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/buttons.css">
	<!-- FontAwesome CSS-->
	<link rel="stylesheet" href="assets/modules/fontawesome6.1.1/css/all.css">
	<!-- Boxicons CSS-->
	<link rel="stylesheet" href="assets/modules/boxicons/css/boxicons.min.css">
	<!-- Apexcharts  CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<link rel="stylesheet" href="assets/modules/apexcharts/apexcharts.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

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
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					   <i class="fa fa-bell size-icon-1"></i><span class="badge bg-danger notif">4</span>
					</a> 				 
					<div class="dropdown-menu dropdown-list">
						<div class="dropdown-header">Notifications</div>
						<div class="dropdown-list-content dropdown-list-icons">
							<div class="custome-list-notif"> 
							<a href="#" class="dropdown-item dropdown-item-unread">
								<div class="dropdown-item-icon bg-primary text-white">
								  <i class="fas fa-code"></i>
								</div>
								<div class="dropdown-item-desc">
									The Atrana template has the latest update!
								  <div class="time text-primary">3 Min Ago</div>
								</div>
							  </a>

							  <a href="#" class="dropdown-item">
								<div class="dropdown-item-icon bg-info text-white">
								  <i class="far fa-user"></i>
								</div>
								<div class="dropdown-item-desc">
								   Sri asks you for friendship!
								  <div class="time">12 Hours Ago</div>
								</div>
							  </a>

							  <a href="#" class="dropdown-item">
								<div class="dropdown-item-icon bg-danger text-white">
								  <i class="fas fa-check"></i>
								</div>
								<div class="dropdown-item-desc">
									Storage has been cleared, now you can get back to work!
								  <div class="time">20 Hours Ago</div>
								</div>
							  </a>

						  
							  <a href="#" class="dropdown-item">
								<div class="dropdown-item-icon bg-info text-white">
								  <i class="fas fa-bell"></i>
								</div>
								<div class="dropdown-item-desc">
								    Welcome to Atrana Template, I hope you enjoy using this template!
								  <div class="time">Yesterday</div>
								</div>
							  </a>
 
							</div>
						</div>

						<div class="dropdown-footer text-center">
						  <a href="#">View All</a>
						</div>

					  
				  </li>
			 
				  <li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					  <img src="assets/images/avatar/avatar-1.png" alt="">
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="my-profile.php"><i class="fa fa-user size-icon-1"></i> <span>My Profile</span></a>
						<a class="dropdown-item" href="settings.html"><i class="fa fa-cog size-icon-1"></i> <span>Settings</span></a>
						<hr class="dropdown-divider">
						<a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt  size-icon-1"></i> <span>My Profile</span></a>
					</ul>
				  </li>
			</ul>
		</div>
	</div>

	<!--Sidebar-->
	<div class="sidebar transition overlay-scrollbars animate__animated  animate__slideInLeft">
        <div class="sidebar-content"> 
        	<div id="sidebar">
			
			<!-- Logo -->
			<div class="logo">
					<h2 class="mb-0"><img src="assets/images/newlogo.png" style="hieght:100px !important; width:100px !important;"> Rental</h2>
			</div>

            <ul class="side-menu">
                <li>
					<a href="index.php">
						<i class='bx bxs-dashboard icon' ></i> Dashboard
					</a>
				</li>

				<!-- Divider-->
                <li class="divider" data-text="STARTER">Table</li>
                <li>
					<a href="rent_list.php">
					<i class='bx bx-list-ul icon'></i>
						Rent Lists
					</a>
				</li>

                <li>
					<a href="approve_list.php">
					<i class='bx bx-list-ul icon'></i>
						Approved Lists
					</a>
				</li>

                <li>
					<a href="paid_list.php">
					<i class='bx bx-list-ul icon'></i>
						Paid Lists
					</a>
				</li>
        
                <li>
					<a href="cancelled_list.php">
					<i class='bx bx-list-ul icon'></i>
						Cancelled Lists
					</a>
				</li>
				<li>
					<a href="equipment_list.php">
					<i class='bx bx-list-ul icon'></i>
						Equipment Lists
					</a>
				</li>
                <li>
					<a href="sand_list.php">
					<i class='bx bx-list-ul icon'></i>
						Sand Lists
					</a>
				</li>
                <li>
					<a href="location_list.php" class="active">
					<i class='bx bx-list-ul icon'></i>
						Location Lists
					</a>
				</li>

                <li>
                    <a href="#">
						<i class='bx bx-columns icon' ></i> 
						Layout 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="layout-default.html">Default Layout</a></li>
                        <li><a href="layout-top-navigation.html">Top Navigation</a></li>
                    </ul>
                </li>

                <li>
					<a href="blank-pages.html">
						<i class='bx bxs-meh-blank icon'></i> 
						Blank Page
					</a>
				</li>

                <li>
                    <a href="#">
						<i class='fa fa-th icon' ></i> 
						Bootstrap 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
						<li><a href="bootstrap-alert.html">Alert</a></li>
						<li><a href="bootstrap-badge.html">Badge</a></li>
						<li><a href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
						<li><a href="bootstrap-buttons.html">Buttons</a></li>
						<li><a href="bootstrap-card.html">Card</a></li>
						<li><a href="bootstrap-carousel.html">Carousel</a></li>
						<li><a href="bootstrap-dropdown.html">Dropdown</a></li>
						<li><a href="bootstrap-list-group.html">List Group</a></li>
						<li><a href="bootstrap-modal.html">Modal</a></li>
						<li><a href="bootstrap-nav.html">Navs</a></li>
						<li><a href="bootstrap-pagination.html">Pagination</a></li>
						<li><a href="bootstrap-progress.html">Progress</a></li>
						<li><a href="bootstrap-spinner.html">Spinner</a></li>
                    </ul>
                </li>

				<!-- Divider-->
                <li class="divider" data-text="Atrana">Atrana</li>

				<li>
                    <a href="#">
						<i class='bx bx-columns icon' ></i> 
						Components 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="component-avatar.html">Avatar</a></li>
						<li><a href="component-toastify.html">Toastify</a></li>
                        <li><a href="component-sweet-alert.html">Sweet Alert</a></li>
                        <li><a href="component-hero.html">Hero</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
						<i class='bx bxs-notepad icon' ></i> 
						Forms 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="forms-editor.html">Editor</a></li>
                        <li><a href="forms-validation.html">Validation</a></li>
                        <li><a href="forms-checkbox.html">Checkbox</a></li>
                        <li><a href="forms-radio.html">Radio</a></li>
                    </ul>
                </li>

				<li>
                    <a href="#">
						<i class='bx bxs-widget icon' ></i> 
						Widgets 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="widgets-chatboxs.html">ChatBox</a></li>
                        <li><a href="widgets-email.html">Emails</a></li>
                        <li><a href="widgets-pricing.html">Pricing</a></li>
                    </ul>
                </li>

				<li>
                    <a href="#">
						<i class='bx bxs-bar-chart-alt-2 icon' ></i> 
						Charts 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="chart-chartjs.html">ChartJS</a></li>
                        <li><a href="chart-apexcharts.html">Apexcharts</a></li>
                    </ul>
                </li>

				<li>
                    <a href="#">
						<i class='bx bxs-cloud-rain icon' ></i> 
						Icons 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="icons-fontawesome.html">Fontawesome</a></li>
                        <li><a href="icons-boostrap.html">Bootstrap Icons</a></li>
                    </ul>
                </li>

				<!-- Divider-->
				<li class="divider" data-text="Pages">Pages</li>

				<li>
                    <a href="#">
						<i class='bx bxs-user icon' ></i> 
						Auth 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="auth-login.php">Login</a></li>
                        <li><a href="auth-register.html">Register</a></li>
                        <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                        <li><a href="auth-reset-password.php">Reset Password</a></li>
                    </ul>
                </li>

				<li>
                    <a href="#">
						<i class='bx bxs-error icon' ></i> 
						Errors 
						<i class='bx bx-chevron-right icon-right' ></i>
					</a>
                    <ul class="side-dropdown">
                        <li><a href="errors-403.html">403</a></li>
                        <li><a href="errors-404.html">404</a></li>
                        <li><a href="errors-500.html">500</a></li>
                        <li><a href="errors-503.html">503</a></li>
                    </ul>
                </li>


				<li>
					<a href="credits.html"><i class='fa fa-pencil-ruler icon' ></i> 
						Credits
					</a>
				</li>

            </ul>

            <div class="ads">
				<div class="wrapper">
					<div class="help-icon"><i class="fa fa-circle-question fa-3x"></i></div>
					<p>Need Help with <strong>Atrana</strong>?</p>
                    <a href="docs/" class="btn-upgrade">Documentation</a>
                 </div>
            </div>
        </div>

       </div> 
	 </div>
	</div><!-- End Sidebar-->


	<div class="sidebar-overlay"></div>


	<!--Content Start-->
	<div class="content-start transition">
		<div class="container-fluid dashboard">
			<div class="content-header">
				<h1>Dashboard</h1>
				<p></p>
			</div>
			
			<div class="row">

				

		
				
				
				

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Sand Lists</h4>
                            
<button class="button .add_btn" id="add_button" type="button">
  <span class="button__text">Add</span>
  <span class="button__icon"><svg class="svg" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="12" x2="12" y1="5" y2="19"></line><line x1="5" x2="19" y1="12" y2="12"></line></svg></span>
</button>

						</div>
						<div class="card-body"> 
						<div class="table-responsive"> 
						<table class="table table-striped">
							<thead>
							  <tr>
								
								<th scope="col">Municipality</th>
								
                                <th scope="col">Rate</th>
								
								<th scope="col">Actions</th>
							  </tr>
							</thead>
							<tbody>

                            <?php

include "conn.php";

$sql = "SELECT * FROM location_tbl order by id desc";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>


							<tr>
								
								<th scope="row"><?php echo $row['municipality']; ?></th>
								<td>₱<?php echo $row['rate']; ?></td>
								        <td>
                                        <button class="btn edit-btn" id="edit_btn"  data-id="<?php echo $row['id']; ?>" style="background-color:#081A51 !important; color:white !important;">
                                          <i class='bx bxs-edit'></i>
                                        </button>

                                    <button class="btn" id="delete_btn" data-id="<?php echo $row['id']; ?>" style="background-color:#F22F31 !important; color:white !important;"><i class='bx bx-trash'></i></button>
                                </td>
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

<img src="" alt="">
							  
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

  




    <script>
     document.getElementById('add_button').addEventListener('click', function() {
    Swal.fire({
        title: 'Add Item',
        html: `
            <form method="post" enctype="multipart/form-data" id="insert_form">
                <div class="form-group">
                    <label for="sand" class="col-form-label">Municipality</label>
                    <input type="text" class="form-control" id="sand" name="municipality">
                </div>
                <div class="form-group">
                    <label for="rate" class="col-form-label">Rate(₱)</label>
                    <input type="number" class="form-control" id="rate" name="rate">
                </div>             
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Add',
        cancelButtonText: 'Cancel',
        focusConfirm: false,
        preConfirm: function() {
            var form_data = new FormData(document.getElementById('insert_form'));
            return fetch('functions/insert_location.php', {
                method: 'POST',
                body: form_data
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText);
                }
                return response.text();
            })
            .catch(error => {
                Swal.showValidationMessage(
                    `Request failed: ${error}`
                );
            });
        }
    }).then(result => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Equipment Added!"
            });
        }
    });
});


    </script>







<script>
$(document).on('click', '#edit_btn', function() {
    var sandId = $(this).data('id');
    
    // Fetch data of the selected sand equipment using AJAX
    $.ajax({
        url: 'functions/get_location_details.php',
        type: 'GET',
        data: { id: sandId },
        dataType: 'json',
        success: function(sandDetails) {
            if (sandDetails && Object.keys(sandDetails).length > 0) {
                // Populate Swal2 modal with fetched data
                Swal.fire({
                    title: 'Edit Sand Equipment',
                    html: `
                    <form method="post" enctype="multipart/form-data" id="edit_form">
                        <input type="hidden" id="edit_id" name="id" value="${sandDetails.id}"> 
                        <div class="form-group">
                            <label for="edit_sand" class="col-form-label">Municipality</label>
                            <input type="text" value="${sandDetails.municipality}" class="form-control" id="edit_sand" name="municipality" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_rate_per_bucket" class="col-form-label">Rate per Bucket (₱)</label>
                            <input type="number" value="${sandDetails.rate}" class="form-control" id="edit_rate_per_bucket" name="rate" required>
                        </div>
                    </form>`,
                    confirmButtonText: 'Save',
                    focusConfirm: false,
                    preConfirm: function() {
                        // Handle form submission to update sand equipment details
                        var formData = new FormData($('#edit_form')[0]);
                        formData.append('id', sandId); // Append sand equipment ID to form data
                      
                        var formFilled = true;
                        $('#edit_form .form-control[required]').each(function() {
                            if ($(this).val() === '') {
                                formFilled = false;
                                return false; // Break the loop if any required field is empty
                            }
                        });

                        // If any required field is empty, display error toast
                        if (!formFilled) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });

                            Toast.fire({
                                icon: "error",
                                title: "Please fill all the fields"
                            });
                            return false; // Prevent form submission
                        }

                        // Send AJAX request to update data
                        $.ajax({
                            url: 'functions/update_location.php',
                            type: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                // Display success message
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: "Data updated successfully!"
                                });
                            },
                            error: function(xhr, status, error) {
                                // Display error message if AJAX request fails
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to update sand equipment.',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            } else {
                // If sand equipment details are empty or undefined, display an error message
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to fetch sand equipment details.',
                    icon: 'error'
                });
            }
        },
        error: function(xhr, status, error) {
            // Display an error message if AJAX request fails
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch sand equipment details.',
                icon: 'error'
            });
        }
    });
});


</script>


<script>
  $(document).on('click', '#delete_btn', function() {
    var equipmentId = $(this).data('id');
    
    // Show Swal2 confirmation modal
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to delete this item.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request to delete the product
            $.ajax({
                url: 'functions/delete_location.php',
                type: 'POST',
                data: { id: equipmentId },
                success: function(response) {
                    // Display success message
                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });
                                Toast.fire({
                                    icon: "success",
                                    title: "Data  Deleted successfully!"
                                });
                    // Optional: Reload the page or update the UI after successful deletion
                },
                error: function(xhr, status, error) {
                    // Display error message if AJAX request fails
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to delete the item.',
                        icon: 'error'
                    });
                }
            });
        }
    });
});
</script>
 </body>
</html>
