<?php 
session_start();
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
              <a href="start.php" class="navbar-link" data-nav-link>Get Started</a>
            </li>
          </ul>
        </nav>

        <div class="d_header-actions">
          <div class="d_header-contact">
            <a href="tel:639566320135" class="contact-link">63 956 632 0135</a>

            <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
          </div>

            

          <a href="#featured-car" class="btn" aria-labelledby="aria-label-txt" z-index:1;>
            <ion-icon name="car-outline"></ion-icon>
            <span id="aria-label-txt">Explore</span>
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

            <form action="insert_search.php" method="post" class="hero-form">
              <div class="input-wrapper">
                <label for="input-1" class="input-label"
                  >Equipment Category</label
                >

                <select  name="category"
                  id="input-1"
                  class="input-field" style="width:100%; background:transparent; border:none;">
                        <option disabled selected hidden>Category</option>
                        <option  value="Loaders">Loaders</option>
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

              <div class="input-wrapper">
                <label for="input-2" class="input-label"
                  >Rate per Rent (₱)</label
                >

                <select  name="rate"
                  id="input-1"
                  class="input-field" style="width:100%; background:transparent; border:none;">
                        <option disabled selected hidden>Budget Range</option>
                        <option  value="1000">1000</option>
                        <option value="2000">2000</option>
                        <option value="3000">3000</option>
                        <option value="4000">4000</option>
                        <option value="5000">5000</option>
                        <option value="6000">6000</option>
                        <option value="7000">7000</option> 
                        <option value="8000">8000</option>                      
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
                <a href="all_equipments.php">
                <figure class="card-banner">
                    <img src="admin/functions/equipment_images/<?php echo $row['image']; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300" class="w-100"/>
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
                          <a href="all_equipments.php" style="color:red;">Fully Loaded!</a>
                        <?php } else { ?>
                          <a href="all_equipments.php"><?php echo $row['equipment']; ?></a>
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
                        
                        <a href="start.php" class="btn rent_now_btn"
                                > Rent now
                        </a>
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
                    <img src="admin/functions/sand_images/<?php echo $row['image']; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300" class="w-100"/>
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
                        <a href="start.php" class="btn order_now_btn" id="order_now_btn"
                                
                               > Order Now
                        </a>
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
 




<a href="all_sands.php" class="featured-car-link">
                <span>View All</span>

                <ion-icon name="arrow-forward-outline"></ion-icon>
              </a>
            </ul>
          </div>
        </section>


      

       






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
                  <a href="start.php" class="card-link" >Get started</a>
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
                    <a href="start.php">
                      <img
                        src="admin/functions/equipment_images/<?php echo $row['image']; ?>"
                        alt="Opening of new offices of the company"
                        loading="lazy"
                        class="w-100"
                      />
                    </a>

                    <a href="start.php"class="btn card-badge rent_now_btn"
                                > Rent now
                        </a>
                  </figure>

                  <div class="card-content">
                    <h3 class="h3 card-title">
                      <a href="start.php"><?php echo $row['equipment']; ?></a>
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
