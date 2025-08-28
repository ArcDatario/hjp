<?php 

include "user_session.php";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Rental Heavy Equipments</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="./assets/css/final.css" />

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
      rel="stylesheet"
    />

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        option{
         background: hsl(216, 38%, 95%);
         color: hsl(240, 22%, 25%);
    outline: 2px solid transparent;
    outline-offset: 5px;
    border-radius: 4px;
    transition: var(--transition);
    font-size:0.95rem;
    font-family:'Open Sans', sans-serif;
        }
        option::placeholder { color: hsl(219, 21%, 39%); }

        select{
         background: hsl(216, 38%, 95%);
         color: hsl(240, 22%, 25%);
      outline: 2px solid transparent;
       outline-offset: 5px;
       border-radius: 4px;
       transition: var(--transition);
         font-size:0.95rem;
         font-family:'Open Sans', sans-serif;
        }


        .swal2-input{
          width:80%;
        }

        .custom-modal-body{
         width:450px;
         background-color: white;
         box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
         border-radius:15px;
        
        }
        .custom-modal-body:hover{
         

        }
        .custom-confirm-button{
          background-color:#E88A1A;
        }
        
        
        .disabled {
    opacity: 0.6; 
    pointer-events: none;  
}
       

.fade-in {
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        .fade-out {
            animation: fadeOut 0.5s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

      </style>
  </head>

  <body>
    <!-- 
    - #HEADER
  -->
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


<?php
  // Check if the booking was successful
  if (isset($_SESSION['order_success']) && $_SESSION['order_success'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
              
Swal.fire({
  position: "center",
  icon: "success",
  title: "Order Success!",
  text: "Please wait to approve your order , Once it is Approved Were going to prepare it immediately, We will send you an email once it is on delivery,(Expect Call for our Confirmation) Thank you!!",
  showConfirmButton: true,
  confirmButtonText: "View ->",
  confirmButtonColor: "#FD7014",

}).then((result) => {
  if (result.isConfirmed) {
      window.location.href = "rented.php";
  } else {
      
  }
});
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['order_success']);
  }

  ?>



<?php
  // Check if the booking was successful
  if (isset($_SESSION['empty_fields']) && $_SESSION['empty_fields'] == true) {
      // Display Swal2 toast for successful booking
      echo '<script>
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Dont Leave an empty Inputs",
        text: "Please Fill out all the input Fields, Thank you!!",
        showConfirmButton: true,
        ConfirmButtonText:"Ok"
       
      });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['empty_fields']);
  }

  ?>
  
  
    <header class="d_header" data-header style="z-index:1000;">
      <div class="d_container">
        <div class="overlay" data-overlay></div>
        <a href="#" class="logo">
          <img
            src="./assets/images/newlogo.png"
            alt="Rental logo"
            height="120"
            width="120"
          />
        </a>

        <nav class="navbar" data-navbar >
          <ul class="navbar-list">
            <li>
              <a href="#home" class="navbar-link" data-nav-link>Home</a>
            </li>

            <li>
              <a href="index.php#featured-car" class="navbar-link" data-nav-link
                >Equipments</a
              >
            </li>

            <li>
              <a href="index.php#sand" class="navbar-link" data-nav-link
                >Aggregates</a
              >
            </li>

            <li>
              <a href="index.php#blog" class="navbar-link" data-nav-link>Most Rented</a>
            </li>
          
            <li>
              <a href="rented.php" class="navbar-link" data-nav-link>Rent</a>
            </li>   
            <li>
              <a href="orders.php" class="navbar-link" data-nav-link>Orders</a>
            </li>
          </ul>
        </nav>

        <div class="d_header-actions">
          <div class="d_header-contact">
            <a href="tel:88002345678" class="contact-link">63 956 632 0135</a>

            <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
          </div>

            

          <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt" z-index:1;>
            <ion-icon name="car-outline"></ion-icon>
            <span id="aria-label-txt">Explore</span>
          </a>
    

          <a href="#"  user-id="<?php echo $_SESSION['user_id'];?>" class="user-btn" aria-label="Profile">
    <img src="../user_images/<?php echo htmlspecialchars($_SESSION['image']); ?>" alt="" style="border-radius:20% !important;" height="33" width="33" title="Account">
</a>
          
          <button
            class="nav-toggle-btn"
            data-nav-toggle-btn
            aria-label="Toggle Menu"
          >
            <span class="one"></span>
            <span class="two"></span>
            <span class="three"></span>
          </button>
        </div>
      </div>
    </header>

    <main>
      <article>
       
<br><br>
        <section class="section featured-car" id="featured-car">
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title"><?php echo $_SESSION['category']; ?></h2>

            </div>
            <ul class="featured-car-list" id="equipment-list">

            <?php

include "conn.php";

$category =  $_SESSION['category'];


$sql = "SELECT * FROM equipment_tbl WHERE category = '$category'  ORDER BY id DESC";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $disabled_class = ($row['equipment_qty'] <= 0 && $row['rate_category'] == 'perLoad') ? 'disabled' : '';
        $equipment_id = $row['id'];
        $equipment_qty = $row['equipment_qty'];
        $_SESSION['equipment_id'] =  $row['id'];       

        // Query to calculate average rating for the equipment
        $feedback_query = "SELECT AVG(ratings) AS avg_rating FROM feedbacks_tbl WHERE equipment_id = $equipment_id";
        $feedback_result = $conn->query($feedback_query);
        $avg_rating = null; // Initialize average rating
        
        if ($feedback_result->num_rows > 0) {
            $feedback_row = $feedback_result->fetch_assoc();
            $avg_rating = $feedback_row['avg_rating'] != null ? number_format($feedback_row['avg_rating'], 1) . " / 5" : "No ratings yet";
        } else {
            $avg_rating = "No ratings yet";
        }
?>

        <li>  
            <div class="featured-car-card <?php echo $disabled_class; ?>" data-equipment-id="<?php echo $equipment_id;?>">
                <a href="view_equipment.php?id=<?php echo  $row['id']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">
                <figure class="card-banner">
                    <img src="../admin/functions/equipment_images/<?php echo $row['image']; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300" class="w-100"/>
                </figure>
                </a>
                <div>
                    <span style="float:right; margin-right:5%; font-size:1.1rem; font-weight:500;">
                        <?php echo $avg_rating; ?>
                    </span>
                    <img src="assets/images/star_ratings.png" style="float:right; margin-right:3%;"  alt="ratings" height="25" width="25">
                </div>
              <br>
                <div class="card-content">
                    <div class="card-title-wrapper">
                        <h3 class="h3 card-title">

                        <?php if ($row['equipment_qty'] <= 0 && $row['rate_category'] == 'perLoad') { ?>
                          <a href="view_equipment.php?id=<?php echo  $equipment_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>" style="color:red;">Fully Loaded!</a>
                        <?php } else { ?>
                          <a href="view_equipment.php?id=<?php echo  $row['id']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>"><?php echo $row['equipment']; ?></a>
                        <?php } ?>

                        </h3>
                        <data class="year" value="2021"><?php echo $row['year_model']; ?></data>
                    </div>

                    <ul class="card-list">
                        <li class="card-list-item">
                            <ion-icon name="people-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['capacity']; ?></span>
                        </li>

                        <li class="card-list-item">
                            <ion-icon name="flash-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['fuel']; ?></span>
                        </li>

                        <li class="card-list-item">
                            <ion-icon name="speedometer-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['kmperliter']; ?>km / 1-litre</span>
                        </li>

                        <li class="card-list-item">
                            <ion-icon name="hardware-chip-outline"></ion-icon>
                            <span class="card-item-text"><?php echo $row['type']; ?></span>
                        </li>
                    </ul>

                    <div class="card-price-wrapper">
                        <?php 
                        if ($row['rate_category'] == 'perDay') {
                            $rate_suffix = '/ day';
                        } elseif ($row['rate_category'] == 'perHour') {
                            $rate_suffix = '/ hr';
                        } elseif ($row['rate_category'] == 'perLoad') {
                            $rate_suffix = '/ load';
                        }
                        ?>
                        <strong><p class="card-price">₱<?php echo $row['rate_per_day'].$rate_suffix; ?></strong></p>
                        
                        <button class="btn rent_now_btn"
                                rate_category="<?php echo $row['rate_category'];?>"
                                equipment_qty="<?php echo $row['equipment_qty'];?>"
                                data-user-id="<?php echo $_SESSION['user_id'];?>"
                                data-id="<?php echo $row['id']; ?>"
                                user_email="<?php echo htmlspecialchars($_SESSION['email']); ?>"
                                equipment-id="<?php echo $row['id']; ?>"
                                data-equipment-name="<?php echo $row['equipment']; ?>"
                                data-rate-per-day="<?php echo $row['rate_per_day']; ?>"
                                data-equipment-image="<?php echo $row['image']; ?>"
                                data-year-model ="<?php echo $row['year_model']; ?>"
                                data-capacity="<?php echo $row['capacity']; ?>"
                                data-fuel="<?php echo $row['fuel']; ?>"
                                data-kmperliter="<?php echo $row['kmperliter']; ?>"
                                data-type="<?php echo $row['type']; ?>"> Rent now
                        </button>
                    </div>
                </div>
            </div>
        </li>
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





<a href="all_equipments.php" class="featured-car-link">
                <span>View All</span>

                <ion-icon name="arrow-forward-outline"></ion-icon>
              </a>
            </ul>
          </div>
        </section>



       


        <?php include "user_account_modal.php";?>

        <?php include "perload_modal.php";?>
        <?php include "perhour_modal.php";?>
        <?php include "perday_modal.php";?>
        <?php include "rent_modal.php";?>






       

       
        
      </article>
    </main>

   

    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <div class="footer-brand">
            <a href="#" class="logo">
              <h2>Rental</h2>
            </a>

            <p class="footer-text">
            Unlocking Efficiency and Performance: Experience top-tier 
            heavy equipment rental services tailored to your project needs. 
            Trust in our expertise to deliver reliable machinery, 
            ensuring smooth operations and optimal productivity on every job site.
            </p>
          </div>

          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Company</p>
            </li>

            <li>
              <a href="#" class="footer-link">About us</a>
            </li>

            <li>
              <a href="#" class="footer-link">Pricing plans</a>
            </li>

            <li>
              <a href="#" class="footer-link">Our blog</a>
            </li>

            <li>
              <a href="#" class="footer-link">Contacts</a>
            </li>
          </ul>

          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Support</p>
            </li>

            <li>
              <a href="#" class="footer-link">Help center</a>
            </li>

            <li>
              <a href="#" class="footer-link">Ask a question</a>
            </li>

            <li>
              <a href="#" class="footer-link">Privacy policy</a>
            </li>

            <li>
              <a href="#" class="footer-link">Terms & conditions</a>
            </li>
          </ul>

          <ul class="footer-list">
            <li>
              <p class="footer-list-title">Our Location</p>
            </li>

            <li>
              <a href="#" class="footer-link">Gloria</a>
            </li>

            <li>
              <a href="#" class="footer-link">Bansud</a>
            </li>

            <li>
              <a href="#" class="footer-link">Pinamalayan</a>
            </li>

            <li>
              <a href="#" class="footer-link">Bongabong</a>
            </li>

          </ul>
        </div>

        <div class="footer-bottom">
          <ul class="social-list">
            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-skype"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="mail-outline"></ion-icon>
              </a>
            </li>
          </ul>

          <p class="copyright">
            &copy; 2024 <a href="#">BSIT</a>. All Rights Reserved
          </p>
        </div>
      </div>
    </footer>

  

    <script src="./assets/js/script.js"></script>

  
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>

 

   
    
    <script>
    


</script>


    

    <script>
      $(document).ready(function() {
    // Check if there's a success message in the URL (indicating successful registration)
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success');
    if (successMessage === 'true') {
        // Show SweetAlert2 toast with success message
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
        Toast.fire({
            icon: 'success',
            title: 'Registration successful'
        });
    }
});

    </script>




<script>


$(document).ready(function() {
    $(".rent_now_btn").click(function(e) {
        e.preventDefault(); 

        $('#perDayModal').on('hidden.bs.modal', function (e) {
            $('#perday_rent_start_date').val('');
            $('#perday_rent_end_date').val('');
            $('#perday_days_summary_text').text('');
            $('#perday_days_summary_input').val('');
            $('#perday_total_text').text('');
            $('#perday_total_input').val('');
        });

        $('#perHourModal').on('hidden.bs.modal', function (e) {
            $('#perhour_rent_start_date').val('');
            $('#perhour_rent_end_date').val('');
            $('#perhour_rent_start_date').val('');
            $('#perhour_rent_end_date').val('');
            $('#perhour_days_summary_text').text('');
            $('#perhour_days_summary_input').val('');
            $('#perhour_total_text').text('');
            $('#perhour_total_input').val('');
        });

        $('#perLoadModal').on('hidden.bs.modal', function (e) {
            $('#perload_input').val('');
            $('#load_summary_text').text('');
            $('#perload_load_summary_input').val('');
            $('#perload_days_summary_input').val('');
            $('#equipment_load').val('');
            $('#load_total').text('');
            $('#perload_total_input').val('');
        });

        var rateCategory = $(this).attr('rate_category');
        var equipmentId = $(this).attr('equipment-id');
        var userId = $(this).attr('data-user-id');
        var userEmail = $(this).attr('user_email');
        var equipmentName = $(this).attr('data-equipment-name');
        var rate_per_day = $(this).attr('data-rate-per-day');
        var yearModel = $(this).attr('data-year-model');
        var equipmentImage = $(this).attr('data-equipment-image');
        var imagePath = "../admin/functions/equipment_images/" + equipmentImage;


        if (rateCategory === 'perDay') {
            $("#perDayModal").modal("show");
            $("#perday_equipment_id").val(equipmentId);
            $("#perday_equipment_name").text(equipmentName);
            $("#perday_equipment_name_input").val(equipmentName);
            $("#perday_equipment_year_model").text(' - '+yearModel);
            $("#perday_equipment_rate_per_day").val(rate_per_day);
            $("#perday_rate_per_day_text").text('₱'+rate_per_day+'/ day');
            $("#perday_user_email").val(userEmail);
            $("#perday_user_id").val(userId);
            $("#perday_equipment_image").attr("src", imagePath);

        } else if (rateCategory === 'perHour') {
            $("#perHourModal").modal("show");
            $("#perhour_equipment_id").val(equipmentId);
            $("#perhour_equipment_name").text(equipmentName);
            $("#perhour_equipment_name_input").val(equipmentName);
            $("#perhour_equipment_year_model").text(' - '+yearModel);
            $("#perhour_equipment_rate_per_hour").val(rate_per_day);
            $("#perhour_rate_per_day_text").text('₱'+rate_per_day+'/ hr');
            $("#perhour_user_email").val(userEmail);
            $("#perhour_user_id").val(userId);
            $("#perhour_equipment_image").attr("src", imagePath);
        }else if (rateCategory === 'perLoad') {
            $("#perLoadModal").modal("show");
            $("#perload_equipment_id").val(equipmentId);
            $("#perload_equipment_name").text(equipmentName);
            $("#perload_equipment_name_input").val(equipmentName);
            $("#perload_equipment_year_model").text(' - '+yearModel);
            $("#perload_equipment_rate_per_load").val(rate_per_day);
            $("#perload_rate_per_load_text").text('₱'+rate_per_day+'/ load');
            $("#perload_user_email").val(userEmail);
            $("#perload_user_id").val(userId);
            $("#perload_equipment_image").attr("src", imagePath);
        }



    });
});


</script>


<script src="perday.js">

</script>






<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Find the "Rent" button
    var rentButton = document.getElementById('rent_btn');
    
    // Add event listener to the "Rent" button
    rentButton.addEventListener('click', function () {
        // Disable the "Rent" button to prevent multiple submissions
       
        
        // Check if the date input is empty
        var dateInput1 = document.getElementById('perday_rent_start_date').value;
var dateInput2 = document.getElementById('perday_rent_end_date').value;

if (dateInput1.trim() === '' || dateInput2.trim() === '') {
    // If either input is empty, display an error message
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
        title: "Input Fields cant be empty!"
    });
    // Re-enable the "Rent" button       
    return; // Stop further execution
}

        
        // Gather form data
        var formData = new FormData(document.getElementById('rentalForm'));
        
        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_perday_rental.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Success message

                
                // Hide the modal
$('#perDayModal').modal('hide');

Swal.fire({
    position: "center",
    icon: "success",
    title: "Rent Success!",
    showConfirmButton: true,
    confirmButtonText: "View ->",
    confirmButtonColor: "#FD7014",

}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'rented.php';
    } else {
        location.reload(); // Reload the page if the alert is closed without clicking the button
    }
});
            } else {
                // Error message
                alert('Error: ' + xhr.statusText);
                // Re-enable the "Rent" button
                rentButton.disabled = false;
            }
        };
        xhr.onerror = function () {
            // Error message
            alert('Request failed.');
            // Re-enable the "Rent" button
            rentButton.disabled = false;
        };
        xhr.send(formData);
    });
});
</script>






<script>


document.addEventListener('DOMContentLoaded', function () {
    // Find the "Rent" button
    var rentButton = document.getElementById('perhour_btn');
    
    // Add event listener to the "Rent" button
    rentButton.addEventListener('click', function () {
        // Disable the "Rent" button to prevent multiple submissions
       
        
        // Check if the date input is empty
        var dateInput1 = document.getElementById('perhour_rent_start_date').value;
var dateInput2 = document.getElementById('perhour_rent_end_date').value;

if (dateInput1.trim() === '' || dateInput2.trim() === '') {
    // If either input is empty, display an error message
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
        title: "Input Fields cant be empty!"
    });
    // Re-enable the "Rent" button       
    return; // Stop further execution
}

        
        // Gather form data
        var formData = new FormData(document.getElementById('perhour_form'));
        
        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_perhour_rental.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Success message
                // Hide the modal
                $('#perHourModal').modal('hide');

Swal.fire({
    position: "center",
    icon: "success",
    title: "Rent Success!",
    showConfirmButton: true,
    confirmButtonText: "View ->",
    confirmButtonColor: "#FD7014",

}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'rented.php';
    } else {
        location.reload(); // Reload the page if the alert is closed without clicking the button
    }
});
            } else {
                // Error message
                alert('Error: ' + xhr.statusText);
                // Re-enable the "Rent" button
                rentButton.disabled = false;
            }
        };
        xhr.onerror = function () {
            // Error message
            alert('Request failed.');
            // Re-enable the "Rent" button
            rentButton.disabled = false;
        };
        xhr.send(formData);
    });
});
</script>




<script src="perhour.js">




</script>






<script>

function calculateperLoadTotal() {
    // Get the rate per load and load quantity values
    var ratePerLoad = parseFloat(document.getElementById("perload_equipment_rate_per_load").value);
    var loadQuantity = parseFloat(document.getElementById("perload_input").value);
    var rentButton = document.getElementById("perload_btn");
    var loadSummaryLabel = document.getElementById("load_summary_text");
    var totalInput = document.getElementById("perload_total_input");
    var SummaryInput = document.getElementById("perload_load_summary_input");
    var equipment_load = document.getElementById("equipment_load");


    // Check if load quantity is 0 or empty
    if (loadQuantity === 0 || isNaN(loadQuantity)) {
        // If load quantity is 0 or empty, disable the button and hide the total
        rentButton.disabled = true;
        document.getElementById("load_total").textContent = "";
        loadSummaryLabel.textContent = "";
        totalInput.value = "";
    } else {
        // If load quantity is valid, enable the button and calculate the total
        rentButton.disabled = false;
        
        // Check if both rate per load and load quantity are valid numbers
        if (!isNaN(ratePerLoad) && !isNaN(loadQuantity)) {
            // Calculate the total
            var total = ratePerLoad * loadQuantity;

            
            
            // Update the load_total element with the calculated total
            document.getElementById("load_total").textContent = "Total: ₱" + total.toFixed(0); // Assuming currency format
            
            
            
            loadSummaryLabel.textContent = loadQuantity + " Load" + (loadQuantity !== 1 ? "s" : ""); // Add "s" if loadQuantity is not 1
            equipment_load.value = loadQuantity;

            SummaryInput.value = loadQuantity + " Load" + (loadQuantity !== 1 ? "s" : "");
            // Display the total in the input
            totalInput.value = total.toFixed(0); // Assuming currency format
        } else {
            // If either rate per load or load quantity is not a valid number, display an error message or handle it accordingly
            document.getElementById("load_total").textContent = "Invalid input";
        }
    }
}

// Call the calculateTotal function when the load quantity input changes
document.getElementById("perload_input").addEventListener("input", calculateperLoadTotal);

</script>











<script>


  
document.addEventListener('DOMContentLoaded', function () {
    // Find the "Rent" button
    var rentButton = document.getElementById('perload_btn');
    
    // Add event listener to the "Rent" button
    rentButton.addEventListener('click', function () {
        // Disable the "Rent" button to prevent multiple submissions
       
        // Check if the date input is empty
        var perLoad = document.getElementById('perload_input').value;

if (perLoad.trim() === '') {
    // If either input is empty, display an error message
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
        title: "Input Fields cant be empty!"
    });
    // Re-enable the "Rent" button       
    return; // Stop further execution
}

        // Gather form data
        var formData = new FormData(document.getElementById('perload_form'));
        
        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_perload_rental.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {

$('#perLoadModal').modal('hide');

Swal.fire({
    position: "center",
    icon: "success",
    title: "Rent Success!",
    showConfirmButton: true,
    confirmButtonText: "View ->",
    confirmButtonColor: "#FD7014",

}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = 'rented.php';
    } else {
        location.reload(); // Reload the page if the alert is closed without clicking the button
    }
});



            } else {
                // Error message
                alert('Error: ' + xhr.statusText);
                // Re-enable the "Rent" button
                rentButton.disabled = false;
            }
        };
        xhr.onerror = function () {
            // Error message
            alert('Request failed.');
            // Re-enable the "Rent" button
            rentButton.disabled = false;
        };
        xhr.send(formData);
    });
});
</script>





<script>

$(document).ready(function() {
        $(".order_now_btn").click(function(e) {
            e.preventDefault();
            
            $("#sandModal").modal("show");
        });
    });


    $(document).ready(function() {
        $(".order_now_btn").click(function(e) {
            e.preventDefault();

            var data_id = $(this).attr("data-id");
            var user_id = $(this).attr("user-id");
            var user_email = $(this).attr("user-email");
            var rate_per_bucket = $(this).attr("rate_per_bucket");
            var sandImage = $(this).attr('data-image');
            var sand_name = $(this).attr("sand_name");
            var imagePath = "../admin/functions/sand_images/" + sandImage;
            var image = $(this).attr("image");
           
            $("#sand_image").attr("src", imagePath);
            $("#sand_name").text(sand_name);
            $("#rate_per_bucket").text('₱' + rate_per_bucket + '/ bucket');
            $("#rate_per_bucket_input").val(rate_per_bucket);
            $("#sand_id").val(data_id);
            $("#user_id").val(user_id);
            $("#user_email").val(user_email);

            $("#myModal").modal("show");
        });
    });

    var bansudBarangayDiv = document.getElementById('bansud_barangay');
    var pinamalayanBarangayDiv = document.getElementById('pinamalayan_barangay');
    var gloriaBarangayDiv = document.getElementById('gloria_barangay');

    $(document).ready(function() {
    $(".order_now_btn").click(function(e) {
        e.preventDefault(); 

        $('#sandModal').on('hidden.bs.modal', function (e) {
            $('#municipality').val('');
            $('#bucket_input').val('Bucket qty');
            $('#gloria').val('');
            $('#bansud').val('');
            $('#pinamalayan').val('');
            $('#text_area').val('');
            $('#order_total_display').text('');
            bansudBarangayDiv.style.display = 'none';
            pinamalayanBarangayDiv.style.display = 'none';
            gloriaBarangayDiv.style.display = 'none';
        });

      });
      });


</script>





<script>

document.getElementById('municipality').addEventListener('change', function() {
    var selectedMunicipality = this.value;
    var bansudBarangayDiv = document.getElementById('bansud_barangay');
    var pinamalayanBarangayDiv = document.getElementById('pinamalayan_barangay');
    var gloriaBarangayDiv = document.getElementById('gloria_barangay');

    if (selectedMunicipality === 'Bansud') {
        bansudBarangayDiv.style.display = 'block';
        pinamalayanBarangayDiv.style.display = 'none';
        gloriaBarangayDiv.style.display = 'none';
        $('#gloria').val('');
        $('#pinamalayan').val('');
    } else if (selectedMunicipality === 'Pinamalayan') {
        bansudBarangayDiv.style.display = 'none';
        pinamalayanBarangayDiv.style.display = 'block';
        gloriaBarangayDiv.style.display = 'none';
        $('#gloria').val('');
        $('#bansud').val('');
    } else if (selectedMunicipality === 'Gloria') {
        bansudBarangayDiv.style.display = 'none';
        pinamalayanBarangayDiv.style.display = 'none';
        gloriaBarangayDiv.style.display = 'block';
        $('#bansud').val('');
        $('#pinamalayan').val('');
    } else {
        bansudBarangayDiv.style.display = 'none';
        pinamalayanBarangayDiv.style.display = 'none';
        gloriaBarangayDiv.style.display = 'none';
        $('#bansud').val('');
        $('#pinamalayan').val('');
        $('#gloria').val('');
       
    }
});

</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the necessary elements
        const rateInput = document.getElementById('rate_per_bucket_input');
        const bucketInput = document.getElementById('bucket_input');
        const totalDisplay = document.getElementById('order_total_display');
        const orderTotalInput = document.getElementById('order_total');
        const orderSummaryInput = document.getElementById('order_summary');
        const orderSummaryText = document.getElementById('order_summary_text');
        // Function to update total display and summary
        function updateTotal() {
            // Get the values of rate and bucket input
            const rate = parseFloat(rateInput.value);
            const bucketQty = parseInt(bucketInput.value);

            // Check if either input is empty or 0
            if (!rate || !bucketQty || bucketQty === 0) {
                totalDisplay.textContent = "";
                orderSummaryText.textContent = "";
                orderTotalInput.value = ""; // Set order_total input to empty if computation is not possible
                orderSummaryInput.value = ""; // Set order_summary input to empty if computation is not possible
                return;
            }

            
            const total = rate * bucketQty;

            
            totalDisplay.textContent = `Total: ₱${total.toFixed(0)}`; 
            orderTotalInput.value = total.toFixed(0); 

            orderSummaryText.textContent = bucketQty === 1 ? '1 Bucket' : `${bucketQty} Buckets`;
            orderSummaryInput.value = bucketQty === 1 ? '1 Bucket' : `${bucketQty} Buckets`;
        }

        
        rateInput.addEventListener('input', updateTotal);
        bucketInput.addEventListener('input', updateTotal);
    });
</script>





<script>
  
  $(document).ready(function() {
        $(".user-btn").click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Show the modal
            $("#userModal").modal("show");
        });
    });


</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
