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

        .input-container {
    display: flex; /* Use flexbox to align items horizontally */
    gap: 10px; /* Add space between the fields */
    align-items: center; /* Vertically align items */
}

.input-field2 {
    display: flex;
    align-items: center; /* Align icon and input vertically */
    gap: 5px; /* Add space between the icon and the select element */
}

.input-field2 i {
    font-size: 16px; /* Adjust icon size */
    color: #555; /* Adjust icon color */
}

select {
    padding: 5px 10px; /* Add padding for better appearance */
    font-size: 14px; /* Adjust font size */
    border: 1px solid #ccc; /* Optional: Add a border */
    border-radius: 4px; /* Optional: Add rounded corners */
    background-color: #f9f9f9; /* Optional: Background color */
    outline: none; /* Remove outline on focus */
}
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
      window.location.href = "orders.php";
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
              <a href="#featured-car" class="navbar-link" data-nav-link
                >Equipments</a
              >
            </li>

            <li>
              <a href="#sand" class="navbar-link" data-nav-link
                >Aggregates</a
              >
            </li>

            <li>
              <a href="#blog" class="navbar-link" data-nav-link>Most Rented</a>
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

            <span class="contact-time">Mon - Sat: 6:00 am - 3:00 pm</span>
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
        <!-- 
        - #HERO
      -->

        <section class="section hero" id="home">
          <div class="container">
            <div class="hero-content">
              <h2 class="h1 hero-title">Build Faster With Our Equipments</h2>

              <p class="hero-text">
                We offer Rental Heavy Equipments for your Needs!
              </p>
            </div>

            <div class="hero-banner"></div>

            <form action="insert_search.php" method="post" class="hero-form" id="searchForm">
  <div class="input-wrapper">
    <label for="input-1" class="input-label">Equipment Category</label>
    <select name="category" required id="input-1" class="input-field" style="width:100%; background:transparent; border:none;">
      <option disabled selected>Category</option>
      <option value="Loaders">Loaders</option>
      <option value="Backhoes">Backhoes</option>
      <option value="Bulldozers">Bulldozers</option>
      <option value="Excavators">Excavators</option>
      <option value="Trenchers">Trenchers</option>
      <option value="Compactors">Compactors</option>
      <option value="Mixers">Mixers</option>
      <option value="Dump Trucks">Dump Trucks</option>
      <option value="Forwarder">Forwarder</option>
    </select>
  </div>

  <button type="submit" class="btn">Search</button>
</form>
          </div>
        </section>

        <!-- 
        - #FEATURED CAR
      -->

        <section class="section featured-car" id="featured-car">
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title">Construction Machinery</h2>

              <a href="all_equipments.php" class="featured-car-link">
                <span>View All</span>

                <ion-icon name="arrow-forward-outline"></ion-icon>
              </a>
            </div>
            <ul class="featured-car-list" id="equipment-list">

            <?php

include "conn.php";

$sql = "SELECT * FROM equipment_tbl ORDER BY id DESC";
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
                                user_municipality="<?php echo htmlspecialchars($_SESSION['municipality']); ?>"
                                  user_barangay="<?php echo htmlspecialchars($_SESSION['barangay']); ?>"
                                   user_details="<?php echo htmlspecialchars($_SESSION['details']); ?>"
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



        <section class="section featured-car" id="sand">
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title">Aggregates</h2>

              <a href="all_sands.php" class="featured-car-link">
                <span>View All</span>

                <ion-icon name="arrow-forward-outline"></ion-icon>
              </a>
            </div>


            <ul class="featured-car-list" id="equipment-list">

            <?php
include "conn.php";

$sql = "SELECT * FROM sand_tbl ORDER BY id DESC";
$result = $conn->query($sql);
$i=1;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
?>
        <li>  
            <div class="featured-car-card">
                <a href="#">
                <figure class="card-banner">
                    <img src="../admin/functions/sand_images/<?php echo $row['image']; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300" class="w-100"/>
                </figure>
                </a>

                <div class="card-content">
                    <div class="card-title-wrapper">
                        <h3 class="h3 card-title">

                          <a href=""><?php echo $row['sand']; ?></a>
                  
                        </h3>
    
                    </div>

                    <div class="card-price-wrapper">
                        
                    <strong><p class="card-price">₱<?php echo $row['rate_per_bucket']?>/ Bucket</strong></p>
                        <button class="btn order_now_btn" id="order_now_btn"
                                user-id="<?php echo $_SESSION['user_id'];?>"
                                data-id="<?php echo $row['id']; ?>"
                                user_municipality="<?php echo htmlspecialchars($_SESSION['municipality']); ?>"
                                  user_barangay="<?php echo htmlspecialchars($_SESSION['barangay']); ?>"
                                   user_details="<?php echo htmlspecialchars($_SESSION['details']); ?>"
                                data-image="<?php echo $row['image']; ?>"
                                sand_name="<?php echo $row['sand'];?>"
                                rate_per_bucket="<?php echo $row['rate_per_bucket'];?>"
                                user-email="<?php echo htmlspecialchars($_SESSION['email']); ?>"
                               > Order Now
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
  <?php include "sand_modal.php";?>




<a href="all_sands.php" class="featured-car-link">
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






        <!-- 
        - #GET START
      -->

        <section class="section get-start" id="get-started">
          <div class="container">
            <h2 class="h2 section-title">Get started with 4 simple steps</h2>

            <ul class="get-start-list">
              <li>
                <div class="get-start-card">
                  <div class="card-icon icon-1">
                    <ion-icon name="person-add-outline"></ion-icon>
                  </div>

                  <h3 class="card-title" style="font-size:1.3rem;">Create a profile</h3>

                  <p class="card-text">
                  Begin your journey: 
                  Click 'Get Started' to start  your account setup process. 
                  <a href="#" class="card-link" >Get started</a>
                  </p>

                  
                </div>
              </li>

              <li>

                <div class="get-start-card">
                  <div class="card-icon icon-2">

                  <ion-icon name="calendar-number-outline"></ion-icon>
                  </div>

                  <h3 class="card-title" style="font-size:1.3rem;">Select an Equipment/s</h3>
  
                  <p class="card-text">
                    Just simply click on "Rent now"and select the date duration for your selected equipment/s.
                  </p>
                </div>
              </li>

              <li>
                <div class="get-start-card">
                  <div class="card-icon icon-3">
                  <ion-icon name="location-outline"></ion-icon>
                  </div>

                  <h3 class="card-title" style="font-size:1.3rem;">Go to our Location</h3>

                  <p class="card-text">
                    We are located Near Gloria Public Market Along the Highway
                    <a href="https://tinyurl.com/5yvrzcrx">https://tinyurl.com/5yvrzcrx</a>
                  </p>
                </div>
              </li>

              <li>
                <div class="get-start-card">
                  <div class="card-icon icon-4">
                    <ion-icon name="card-outline"></ion-icon>
                  </div>

                  <h3 class="card-title" style="font-size:1.3rem;">Pay Rent Cost</h3>

                  <p class="card-text">
                    Pay your Rent Cost , and get the Equipment/s youve just rented.
                    Enjoy! using our Equipments 
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </section>

        <!-- 
        - #BLOG
      -->

        <section class="section blog" id="blog">
          <div class="container">
            <h2 class="h2 section-title">Most Rented</h2>


            <ul class="blog-list has-scrollbar">


            <?php

include "conn.php";

$sql = "SELECT equipment_tbl.*, COUNT(rental.equipment_id) AS rental_count
        FROM equipment_tbl
        LEFT JOIN rental ON equipment_tbl.id = rental.equipment_id
        GROUP BY equipment_tbl.id
        ORDER BY rental_count DESC ";
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
            $avg_rating = $feedback_row['avg_rating'] != null ? number_format($feedback_row['avg_rating'], 1) . " / 5" : "No ratings";
        } else {
            $avg_rating = "No ratings";
        }
?>

              <li>
                <div class="blog-card  <?php echo $disabled_class; ?>" data-equipment-id="<?php echo $equipment_id;?>">
                  <figure class="card-banner" >
                    <a href="view_equipment.php?id=<?php echo  $equipment_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>">
                      <img
                        src="../admin/functions/equipment_images/<?php echo $row['image']; ?>"
                        alt="Opening of new offices of the company"
                        loading="lazy"
                        class="w-100"
                      />
                    </a>

                    <button class="btn card-badge rent_now_btn"
                                rate_category="<?php echo $row['rate_category'];?>"
                                equipment_qty="<?php echo $row['equipment_qty'];?>"
                                data-user-id="<?php echo $_SESSION['user_id'];?>"
                                data-id="<?php echo $row['id']; ?>"
                                user_email="<?php echo htmlspecialchars($_SESSION['email']); ?>"
                                 user_municipality="<?php echo htmlspecialchars($_SESSION['municipality']); ?>"
                                  user_barangay="<?php echo htmlspecialchars($_SESSION['barangay']); ?>"
                                   user_details="<?php echo htmlspecialchars($_SESSION['details']); ?>"
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
                  </figure>

                  <div class="card-content">
                    <h3 class="h3 card-title">
                      <a href="view_equipment.php?id=<?php echo  $equipment_id; ?>&user_id=<?php echo $_SESSION['user_id']; ?>"><?php echo $row['equipment']; ?></a>
                    </h3>

                    <div class="card-meta">
                      <div class="publish-date">
                        <ion-icon name="time-outline"></ion-icon>
                        <?php 
                        if ($row['rate_category'] == 'perDay') {
                            $rate_suffix = '/ day';
                        } elseif ($row['rate_category'] == 'perHour') {
                            $rate_suffix = '/ hr';
                        } elseif ($row['rate_category'] == 'perLoad') {
                            $rate_suffix = '/ load';
                        }
                        ?>
                        <time datetime="2022-01-14">₱<?php echo $row['rate_per_day'].$rate_suffix; ?></time>
                      </div>

                <div style="width:40%;">
                    <span style="float:right; margin-right:15%; font-size:0.9rem; font-weight:500;">
                    <?php echo $avg_rating; ?>
                    </span>
                    <img src="assets/images/star_ratings.png" style="float:right; margin-right:3%;"  alt="ratings" height="25" width="25">
                </div>
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
           


            </ul>
          </div>
        </section>
      </article>
    </main>

    <div class="elfsight-app-0ae42fb2-bdf8-4c7d-8859-2abb651288ae" data-elfsight-app-lazy></div>
    <br> <br>

    <div class="container">
    <h2 class="h2 section-title">Our Location</h2>
      <div class="row">
        <div class="col-12 w-100">
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3887.9534999481248!2d121.47787199999998!3d12.974826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDU4JzI5LjQiTiAxMjHCsDI4JzQwLjMiRQ!5e0!3m2!1sen!2sph!4v1715090403055!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
      </div>
    </div>
<br><br> <br>

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
        var userMunicipality = $(this).attr('user_municipality');
        var userBarangay = $(this).attr('user_barangay');
        var userDetails = $(this).attr('user_details');
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
            $("#perday_user_municipality").val(userMunicipality);
            $("#perday_user_barangay").val(userBarangay);
            $("#perday_user_details").val(userDetails);
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
            $("#perload_user_municipality").val(userMunicipality);
            $("#perload_user_barangay").val(userBarangay);
            $("#perload_user_details").val(userDetails);
            $("#perload_user_id").val(userId);
            $("#perload_equipment_image").attr("src", imagePath);
        }



    });
});


</script>


<script src="new_perday1.js">

</script>






<script>
 document.addEventListener('DOMContentLoaded', function () {
    // Find the "Rent" button
    var rentButton = document.getElementById('rent_btn');
    
    // Add event listener to the "Rent" button
    rentButton.addEventListener('click', function () {
        // Disable the "Rent" button to prevent multiple submissions
        rentButton.disabled = true;
        
        // Check if the date input is empty
        var dateInput1 = document.getElementById('perday_rent_start_date').value;
        var dateInput2 = document.getElementById('perday_rent_end_date').value;
        var receipt = document.getElementById('perday_receipt').files.length; // Check if a file is selected
        const tac = document.getElementById("tac").checked; // Check if the checkbox is checked

        // Check if any required field is empty
        if (dateInput1.trim() === '' || dateInput2.trim() === '' || receipt === 0 || !tac) {
            // If any input is empty or checkbox not checked, show an error message
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
                title: "Please fill all fields and accept the terms!"
            });
            
            // Re-enable the "Rent" button
            rentButton.disabled = false;
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
        rentButton.disabled = true;

       
        var receiptInput = document.getElementById('receipt');
        var receipt = receiptInput.files.length === 0; 

        // Check if the checkbox is checked
        const tac = document.getElementById("tacperload").checked;

        // Check if the perload input is empty
        var perLoad = document.getElementById('perload_input').value;

        // Display error messages if any field is missing
        if (perLoad.trim() === '' || receipt || !tac) {
            // If any required field is empty or invalid, show an error message
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
                title: "Please complete all required fields!"
            });

            // Re-enable the "Rent" button       
            rentButton.disabled = false;
            return; // Stop further execution
        }

        // Gather form data
        var formData = new FormData(document.getElementById('perload_form'));
        
        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'insert_perload_rental.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Hide the modal
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
    // Open the modal on button click
    $(".order_now_btn").click(function(e) {
        e.preventDefault();
        
        var data_id = $(this).attr("data-id");
        var user_id = $(this).attr("user-id");
        var user_email = $(this).attr("user-email");
        var rate_per_bucket = $(this).attr("rate_per_bucket");
        var sandImage = $(this).attr('data-image');
        var sand_name = $(this).attr("sand_name");
        var imagePath = "../admin/functions/sand_images/" + sandImage;
        
        $("#sand_image").attr("src", imagePath);
        $("#sand_name").text(sand_name);
        $("#rate_per_bucket").text('₱' + rate_per_bucket + '/ bucket');
        $("#rate_per_bucket_input").val(rate_per_bucket);
        $("#sand_id").val(data_id);
        $("#user_id").val(user_id);
        $("#user_email").val(user_email);

        $("#sand_name_input").val(sand_name);

        
        $("#sandModal").modal("show");
    });

    // Reset form on modal close
    $('#sandModal').on('hidden.bs.modal', function () {
        $('#municipality').val('');
        $('#bucket_input').val('');
        $('#text_area').val('');
        $('#order_total_display').text('');
        $("#sand_image").attr("src", '');
        $("#sand_name").text('');
        $("#rate_per_bucket").text('');
        $("#rate_per_bucket_input").val('');
        $("#sand_id").val('');
        $("#user_id").val('');
        $("#user_email").val('');

        $('#bansud_barangay').hide();
        $('#pinamalayan_barangay').hide();
        $('#gloria_barangay').hide();
    });

   
    $('#municipality').change(function() {
        var selectedMunicipality = $(this).val();
        if (selectedMunicipality === 'Bansud') {
            $('#bansud_barangay').show();
            $('#pinamalayan_barangay').hide();
            $('#gloria_barangay').hide();
        } else if (selectedMunicipality === 'Pinamalayan') {
            $('#bansud_barangay').hide();
            $('#pinamalayan_barangay').show();
            $('#gloria_barangay').hide();
        } else if (selectedMunicipality === 'Gloria') {
            $('#bansud_barangay').hide();
            $('#pinamalayan_barangay').hide();
            $('#gloria_barangay').show();
        } else {
            $('#bansud_barangay').hide();
            $('#pinamalayan_barangay').hide();
            $('#gloria_barangay').hide();
        }
    });
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
