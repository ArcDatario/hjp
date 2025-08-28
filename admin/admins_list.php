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

<style>
    
.generate_btn {
    border: none;
    width: 10em;
    height: 3em;
    border-radius: 3em;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    background:  #25396f;
    cursor: pointer;
    transition: all 450ms ease-in-out;
    margin-left:15%;
  }
  
  .sparkle {
    fill: #AAAAAA;
    transition: all 800ms ease;
  }
  
  .text {
    font-weight: 600;
    color: #AAAAAA;
    font-size: medium;
  }
  
  .generate_btn:hover {
    background: linear-gradient(0deg,#A47CF3,#683FEA);
    box-shadow: inset 0px 1px 0px 0px rgba(255, 255, 255, 0.4),
    inset 0px -4px 0px 0px rgba(0, 0, 0, 0.2),
    0px 0px 0px 4px rgba(255, 255, 255, 0.2),
    0px 0px 180px 0px #9917FF;
    transform: translateY(-2px);
  }
  
  .generate_btn:hover .text {
    color: white;
  }
  
  .generate_btn:hover .sparkle {
    fill: white;
    transform: scale(1.2);
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
					<a href="index.php">
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
					<a href="equipment_list.php"  >
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

            
                <div id="admins-list" class="active">
				<li class="divider" data-text="Atrana">Admins List</li>
				<li>
					<a href="admins_list.php" class="active"  style="background:#3843B8;">
					<i class='bx bx-list-ul icon'></i>
						Admin's Accounts
					</a>
				</li>
				</div>

				<li class="divider" data-text="Pages">Pages</li>

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
				<p></p>
			</div>
			
			<div class="row">

				

		
				
				
				

				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Admin's Lists</h4>
                            
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
								<th scope="col">Image</th>
								<th scope="col">Username</th>
								<th scope="col">Role</th>
                               
								<th scope="col">Actions</th>
							  </tr>
							</thead>
							<tbody id="admin-table">

                            <?php
include "conn.php";

$sql = "SELECT * FROM admins_acc order by id desc";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>

							<tr>
								<th scope="row"><img src="functions/admin_images/<?php echo $row['image']; ?>" height="60" width="80" style="border-radius:10%;"></th>								
                                <td><?php echo $row['user_name']; ?></td>
                                <td><?php echo $row['role']; ?></td>
								                
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
        title: 'Add Admin',
        html: `
        <form  method="post" enctype="multipart/form-data" id="insert_admin_form">
          <div class="form-group">
            <label for="user_name" class="col-form-label">Username</label>
            <input type="text" class="form-control" id="user_name" name="user_name" >
          </div>
          <div class="row">
         
            <div class="col-md-12">
                <div class="form-group">
                    <label for="role" class="col-form-label">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="" disabled selected hidden>Choose Role</option>
                        <option value="Owner">Owner</option>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">Password</label>
            <input type="password" class="form-control" id="password" name="pass_word">
        </div>

       
        
    </form>
    `,
    showCancelButton: true,
    confirmButtonText: 'Add',
    cancelButtonText: 'Cancel',
    focusConfirm: false,
    preConfirm: function() {
        var form_data = new FormData(document.getElementById('insert_admin_form'));

        return fetch('functions/insert_admin.php', {
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
  title: "Admin Added!"
});
        }
    });
});


    </script>







<script>

$(document).on('click', '#edit_btn', function() {
    var adminId = $(this).data('id');
    
    // Fetch data of the selected admin using AJAX
    $.ajax({
        url: 'functions/get_admin_details.php',
        type: 'GET',
        data: { id: adminId }, // Pass admin ID to the server
        dataType: 'json',
        success: function(adminDetails) {
            if (adminDetails && Object.keys(adminDetails).length > 0) {
                // Populate Swal2 modal with fetched admin data
                Swal.fire({
                    title: 'Edit Admin',
                    html: `
                    <form method="post" enctype="multipart/form-data" id="edit_form">
                        <input type="hidden" id="edit_id" name="id" value="${adminDetails.id}"> 
                        <div class="form-group">
                            <label for="edit_user_name" class="col-form-label">Username</label>
                            <input type="text" value="${adminDetails.user_name}" class="form-control" id="edit_user_name" name="user_name" required>
                        </div>
                        <div class="form-group">
    <label for="edit_role" class="col-form-label">Role</label>
    <select class="form-control" id="edit_role" name="role" required>
        <option value="" disabled selected hidden>Choose Role</option>
        <option value="Owner" ${adminDetails.role === 'Owner' ? 'selected' : ''}>Owner</option>
        <option value="Manager" ${adminDetails.role === 'Manager' ? 'selected' : ''}>Manager</option>
        <option value="Staff" ${adminDetails.role === 'Staff' ? 'selected' : ''}>Staff</option>
    </select>
</div>

                        <div class="form-group">
                            <label for="edit_pass_word" class="col-form-label">Change Password(optional)</label>
                            <input type="password" class="form-control" id="edit_pass_word" name="pass_word">
                        </div>
                        <div class="form-group">
                            <label for="edit_image" class="col-form-label">Admin Image</label>
                            <input type="file" class="form-control" id="edit_image" accept="image/*" name="image">
                        </div>
                    </form>`,
                    confirmButtonText: 'Save',
                    focusConfirm: false,
                    preConfirm: function() {
                        // Handle form submission to update admin details
                        var formData = new FormData($('#edit_form')[0]);
                        formData.append('id', adminId); // Append admin ID to form data
                      
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
                            url: 'functions/update_admin.php',
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
                                    title: "Updated Successfully!"
                                });
                            },
                            error: function(xhr, status, error) {
                                // Display error message if AJAX request fails
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to update admin details.',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                });
            } else {
                // If admin details are empty or undefined, display an error message
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to fetch admin details.',
                    icon: 'error'
                });
            }
        },
        error: function(xhr, status, error) {
            // Display an error message if AJAX request fails
            Swal.fire({
                title: 'Error!',
                text: 'Failed to fetch admin details.',
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
            // Send AJAX request to delete the equipment
            $.ajax({
                url: 'functions/delete_admin.php',
                type: 'POST',
                data: { id: equipmentId },
                success: function(response) {
                    // Display success message
                    Swal.fire({
                        title: 'Deleted!',
                        text: response,
                        icon: 'success'
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

 <script>
    $(document).ready(function(){
        // Function to fetch recent occupied bookings and update the section
        function fetch_food_menu() {
            $.ajax({
                url: 'functions/get_admin_data.php', // Path to your PHP script fetching recent occupied bookings
                type: 'GET',
                success: function(response) {
                    $('#admin-table').html(response);
                }
            });
        }
        // Fetch recent occupied bookings every 5 seconds
        setInterval(fetch_food_menu, 1100); // Change interval as needed
      });
 </script>

<script src="list-count.js"></script>
 </body>
</html>
