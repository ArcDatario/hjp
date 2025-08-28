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

<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<style>
    .approve_button {
  position: relative;
  background-color: transparent;
  color: #e8e8e8;
  font-size: 17px;
  font-weight: 600;
  border-radius: 10px;
  width: 90px;
  height: 35px;
  border: none;
  text-transform: uppercase;
  cursor: pointer;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(51, 51, 51, 0.2);
  transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
}

.approve_button::before {
  content: "Approve";
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  pointer-events: none;
  background: linear-gradient(135deg,#498B26,#379206 );
  transform: translate(0%,90%);
  z-index: 99;
  text-transform: none;
  position: relative;
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.approve_button::after {
  content: "✔";
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #333;
  width: 100%;
  height: 100%;
 
  pointer-events: none;
  transform-origin: top;
  transform: translate(0%,-100%);
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.approve_button:hover::before {
  transform: translate(0%,0%);
}

.approve_button:hover::after {
  transform: translate(0%,-200%);
}

.approve_button:focus {
  outline: none;
}

.approve_button:active {
  scale: 0.95;
}




.cancel_button {
  position: relative;
  background-color: transparent;
  color: #e8e8e8;
  font-size: 17px;
  font-weight: 600;
  border-radius: 10px;
  width: 90px;
  height: 35px;
  border: none;
  text-transform: uppercase;
  cursor: pointer;
  overflow: hidden;
  box-shadow: 0 10px 20px rgba(51, 51, 51, 0.2);
  transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
}

.cancel_button::before {
  content: "Cancel";
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  pointer-events: none;
  background: linear-gradient(135deg,#7b4397,#dc2430 );
  transform: translate(0%,90%);
  z-index: 99;
  text-transform: none;
  position: relative;
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.cancel_button::after {
  content: "X";
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #333;
  width: 100%;
  height: 100%;
color:#FF8E8E;
  pointer-events: none;
  transform-origin: top;
  transform: translate(0%,-100%);
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.cancel_button:hover::before {
  transform: translate(0%,0%);
}

.cancel_button:hover::after {
  transform: translate(0%,-200%);
}

.cancel_button:focus {
  outline: none;
}

.cancel_button:active {
  scale: 0.95;
}



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
					<a href="index.php" >
						<i class='bx bxs-dashboard icon' ></i> Dashboard
					</a>
				</li>

				
                <li class="divider" data-text="STARTER">Equipments Rent</li>
				
                <li>
    <a href="rent_list.php" class="active">
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
				<p></p>
			</div>
			
			<div class="row">

				

		
				

            <div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4>Latest Transaction</h4>
						</div>
						<div class="card-body"> 
						<div class="table-responsive"> 
						<table class="table table-striped" id="rent_pending_table">
							<thead>
							  <tr>
								<th scope="col">Rent Id</th>
                                <th scope="col">Equipment</th>
								<th scope="col">Start Date</th>
								<th scope="col">End Date</th>
                                <th scope="col">Summary</th>
								<th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Address</th>
                                <th scope="col">Receipt</th>
								<th scope="col">Actions</th>
                               
							  </tr>
							</thead>

              <tbody>

<?php
include "conn.php";

$sql = "SELECT rental.id, equipment_tbl.equipment, rental.rent_start_date, rental.rent_end_date, rental.summary, rental.total, rental.status, users_acc.user_name, rental.gcash_receipt,users_acc.municipality,users_acc.barangay,users_acc.details
FROM rental
INNER JOIN equipment_tbl ON rental.equipment_id = equipment_tbl.id
INNER JOIN users_acc ON rental.user_id = users_acc.id WHERE status='Pending'";

$result = $conn->query($sql);
$i = 1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <th scope="row"><?php echo $row['id']; ?></th>
            <td><?php echo $row['equipment']; ?></td>
            <td>
                <?php 
                    // Check if rent_start_date is "0000-00-00"
                    echo ($row['rent_start_date'] == "0000-00-00") ? "PerLoad" : formatDate($row['rent_start_date']); 
                ?>
            </td>
            <td>
                <?php 
                    // Check if rent_end_date is "0000-00-00"
                    echo ($row['rent_end_date'] == "0000-00-00") ? "PerLoad" : formatDate($row['rent_end_date']); 
                ?>
            </td>
            <td><?php echo $row['summary']; ?></td>
            <td>₱<?php echo $row['total']; ?></td>
            <td><span class="" style="color:#E26A01;"><?php echo $row['status']; ?></span></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['municipality']; ?>, <?php echo $row['barangay']; ?>,  <?php echo $row['details']; ?> </td>
            <td>
                <img src="../user/gcash/<?php echo $row['gcash_receipt']; ?>" 
                     alt="Receipt Image" 
                     style="height:80px; width:60px; cursor:pointer;" 
                     onclick="showImageModal('../user/gcash/<?php echo $row['gcash_receipt']; ?>', <?php echo $row['id']; ?>, <?php echo $row['total']; ?>)">
            </td>

            <td>
                <button class="approve_button"
                onclick="showImageModal('../user/gcash/<?php echo $row['gcash_receipt']; ?>', <?php echo $row['id']; ?>, <?php echo $row['total']; ?>)"></button>

                <button class="cancel_button"
                onclick="cancelRent(<?php echo $row['id']; ?>)"></button>
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


function formatDate($dateString) {
    if ($dateString == "0000-00-00") {
        return "PerLoad";  // Return "PerLoad" if the date is "0000-00-00"
    } else {
        $date = strtotime($dateString);
        return date("M j, Y", $date);  // Format the date as "M j, Y"
    }
}
?>
</tbody>


							</tbody>
						  </table>
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
function showImageModal(imageSrc, equipmentId, total) {
    Swal.fire({
        title: 'Receipt Image',
        html: `
            <div style="text-align: center; margin-bottom: 15px;">
                <img src="${imageSrc}" alt="Receipt Image" style="width:400px; border-radius: 8px; height:450px;">
            </div>
            <input 
                type="number" 
                id="downpaymentInput" 
                class="swal2-input" 
                placeholder="Enter downpayment amount" 
                min="0" 
                max="${total}" 
                step="0.01"
            >
        `,
        showCancelButton: true,
        confirmButtonText: 'Approve',
        cancelButtonText: 'Close',
        preConfirm: () => {
            const downpaymentInput = document.getElementById('downpaymentInput');
            const downpayment = parseFloat(downpaymentInput.value);

            // Validate the input
            if (isNaN(downpayment) || downpayment <= 0 || downpayment > total) {
                Swal.showValidationMessage(
                    `Please enter a valid downpayment amount (between 0 and ${total}).`
                );
                return false;
            }

            // Return the downpayment value for further processing
            return downpayment;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const downpayment = result.value;

            // Send the data using an AJAX request
            fetch('approve_rent.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    equipment_id: equipmentId,
                    downpayment: downpayment
                }).toString()
            })
                .then(response => response.text())
                .then(data => {
                    // Handle the response from the server
                    if (data.trim() === 'success') {
                        Swal.fire('Success!', 'Rent has been approved and updated successfully.', 'success')
                            .then(() => {
                                // Optionally reload the page or refresh data
                                location.reload();
                            });
                    } else if (data.trim() === 'email_failed') {
                        Swal.fire('Error!', 'Failed to send confirmation email. Please try again later.', 'error');
                    } else {
                        Swal.fire('Error!', `Something went wrong: ${data}`, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Could not process your request. Please try again later.', 'error');
                });
        }
    });
}







  </script>


    <script>

        function confirmApproval(equipmentId) {
    // Display SweetAlert2 confirmation modal
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to Approve this rent. #' + equipmentId ,
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approved it!',
        cancelButtonText: 'Close'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, trigger cancellation process
            Approval(equipmentId);
        }
    });
}

// Function to cancel booking via AJAX
function Approval(equipmentId) {
    $.ajax({
        url: 'approve_rent.php',
        type: 'POST',
        data: {
            equipment_id: equipmentId,
           
        },
        success: function(response) {
            if (response == "success") {
                // If cancellation is successful, show success message
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
  title: "Rent #"+ equipmentId  + " has been approved"
})

                .then(() => {
                    // Reload the page or update UI as needed
                    location.reload();
                });
            } else {
                // If there's an error, show error message
                Swal.fire(
                    'Error!',
                    'Failed to cancel the booking. Please try again.',
                    'error'
                );
            }
        },
        error: function(xhr, status, error) {
            // If there's an error, show error message
            Swal.fire(
                'Error!',
                'Failed to cancel the booking. Please try again.',
                'error'
            );
        }
    });
}


    </script>


<script>

  
function cancelRent(equipmentId) {
    // Display SweetAlert2 confirmation modal
    Swal.fire({
        title: 'Are you sure?',
        text: 'You are about to Cancel this rent. #' + equipmentId ,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#4A5D68',
        confirmButtonText: 'Yes Cancel it!',
        cancelButtonText: 'Close'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, trigger cancellation process
            rentCancelled(equipmentId);
        }
    });
}


// Function to cancel booking via AJAX
function rentCancelled(equipmentId) {
    $.ajax({
        url: 'cancel_rent1.php',
        type: 'POST',
        data: {
            equipment_id: equipmentId,
           
        },
        success: function(response) {
            if (response == "success") {
                // If cancellation is successful, show success message
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
  icon: "info",
  title: "Rent #"+ equipmentId  + " has been cancelled"
})

                .then(() => {
                    
                    location.reload();
                });
            } else {
                
                Swal.fire(
                    'Error!',
                    'Failed to cancel the booking. Please try again.',
                    'error'
                );
            }
        },
        error: function(xhr, status, error) {
            
            Swal.fire(
                'Error!',
                'Failed to cancel the booking. Please try again.',
                'error'
            );
        }
    });
}

</script>

<script src="list-count.js"></script>
<script>
new DataTable('#rent_pending_table');
</script>



 </body>
</html>
