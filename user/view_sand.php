<?php 

include "user_session.php";

?>

<?php

include "conn.php";

// Check if user has completed renting the selected equipment
function isRentalCompleted($equipment_id, $user_id, $conn) {
    $sql = "SELECT * FROM orders WHERE sand_id = ? AND user_id = ? AND status = 'Completed'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $equipment_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->num_rows > 0;
}


$equipment_id = $_GET['id'];
$user_id = $_GET['user_id'];


if (!isRentalCompleted($equipment_id, $user_id, $conn)) {
    $hideFormClass = "hide-form"; 
} else {
    $hideFormClass = ""; 
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rental Heavy Equipments</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />
    <link rel="stylesheet" href="./assets/css/equipment.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    
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
       
        .featured-car-card {
    width: 800px;
    
  }

  @media only screen and (max-width: 600px) {
    /* Adjust height for mobile screens */
    .featured-car-card {
        width: 400px;
        margin-left:2.5% !important;
    }
  }


  .icon-container {
      display: flex; /* Use flexbox for layout */
      align-items: center; /* Align items vertically */
    }

    .icon-container h4 {
      margin-left: 10px; /* Add some spacing between icon and text */
    }

    .line-div{
        margin-left:-8%;
    }
    @media only screen and (max-width: 600px) {
    /* Adjust height for mobile screens */
    .line-div{
        
        margin-left:5% ;
    }
  }
  .image_banner{
   
  }
  @media only screen and (max-width: 600px) {
    /* Adjust height for mobile screens */
    .image_banner{
        margin-top:7% !important;
    }
  }

 
    



  .rating-container {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: row-reverse;
	padding: 2em 2em 2em 5em;
	gap: 10px;
	border-top-right-radius: 75px;
	border-bottom-right-radius: 75px;
	border: none;
	position: relative;
	background: #2b2b2b;
	box-shadow: 0 1px 1px hsl(0deg 0% 0%/0.075), 0 2px 2px hsl(0deg 0% 0%/0.075),
		0 4px 4px hsl(0deg 0% 0%/0.075), 0 8px 8px hsl(0deg 0% 0%/0.075),
		0 16px 16px hsl(0deg 0% 0%/0.075);
	.rating-value {
		position: absolute;
		top: -10px;
		left: -69px;
		border-radius: 50%;
		height: 138px;
		width: 138px;
		background: #ffbb00;
		box-shadow: 0 1px 1px hsl(0deg 0% 0%/0.075), 0 2px 2px hsl(0deg 0% 0%/0.075),
			0 4px 4px hsl(0deg 0% 0%/0.075), 0 8px 8px hsl(0deg 0% 0%/0.075),
			0 16px 16px hsl(0deg 0% 0%/0.075), inset 0 0 10px #f7db5e, 0 0 10px #f7db5e;
		&:before {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
			text-align: center;
			line-height: 138px;
			font-size: 2.5em;
			color: #2b2b2b;
			content: "0";
			transform-origin: "center center";
			transition: all 0.25s ease 0s;
		}
		&:after {
			content: "";
			position: absolute;
			height: 138px;
			width: 138px;
			top: -1px;
			left: -1px;
			
			// height: 170px;
			// width: 170px;
			// top: -16px;
			// left: -16px;
			
			margin: auto;
			border: 1px solid #ffbb00;
			border-radius: 50%;
			transition: all 0.4s ease-in;
		}
	}
	input {
		display: none;
	}
	label {
		height: 50px;
		width: 50px;
		transform-origin: "center center";
		svg {
			transition: transform 0.4s ease-in-out;
			opacity: 0.5;
		}
		&:hover {
			svg {
				transform: scale(1.25) rotate(10deg);
			}
		}
	}
}

input:checked ~ label svg {
	opacity: 1;
	transform: scale(1.25) rotate(10deg);
}

label:hover {
	svg,
	~ label svg {
		opacity: 1;
		transform: scale(1.25) rotate(10deg);
	}
}

input:checked {
	+ label:hover svg {
		opacity: 1;
	}

	~ label:hover {
		svg,
		~ label svg {
			opacity: 1;
		}
	}
}

label:hover ~ input:checked ~ label svg {
	opacity: 1;
}

#rate1:checked ~ .rating-value:before {
	content: "1";
	font-size: 2.75em;
}

label[for="rate1"]:hover ~ .rating-value:before {
	content: "1" !important;
	font-size: 2.75em !important;
}

#rate2:checked ~ .rating-value:before {
	content: "2";
	font-size: 3em;
}

label[for="rate2"]:hover ~ .rating-value:before {
	content: "2" !important;
	font-size: 3em !important;
}

#rate3:checked ~ .rating-value:before {
	content: "3";
	font-size: 3.25em;
}

label[for="rate3"]:hover ~ .rating-value:before {
	content: "3" !important;
	font-size: 3.25em !important;
}

#rate4:checked ~ .rating-value:before {
	content: "4";
	font-size: 3.5em;
}

label[for="rate4"]:hover ~ .rating-value:before {
	content: "4" !important;
	font-size: 3.5em !important;
}

#rate5:checked ~ .rating-value:before {
	content: "5";
	font-size: 3.75em;
}

@keyframes pulse {
	0% {
		height: 138px;
		width: 138px;
		top: -1px;
		left: -1px;
		opacity: 1;
	}
	100% {
		height: 170px;
		width: 170px;
		top: -16px;
		left: -16px;
		opacity: 0;
	}
}

#rate5:checked ~ .rating-value:after {
	animation: pulse 0.4s ease-out 1;
}

label[for="rate5"]:hover ~ .rating-value:before {
	content: "5" !important;
	font-size: 3.75em !important;
}





.button {
    font-family: inherit;
    font-size: 18px;
    background: linear-gradient(to bottom,#EFC48C  0%,#E88A1A 100%);
    color: white;
    padding: 0.8em 1.2em;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 25px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s;
    float:right;
  }
  
  .button:hover {
    transform: translateY(-3px);
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
  }
  
  .button:active {
    transform: scale(0.95);
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
  }
  
  .button span {
    display: block;
    margin-left: 0.4em;
    transition: all 0.3s;
  }
  
  .button svg {
    width: 18px;
    height: 18px;
    fill: white;
    transition: all 0.3s;
  }
  
  .button .svg-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.2);
    margin-right: 0.5em;
    transition: all 0.3s;
  }
  
  .button:hover .svg-wrapper {
    background-color: rgba(255, 255, 255, 0.5);
  }
  
  .button:hover svg {
    transform: rotate(45deg);
  }

  
  .disabled {
    opacity: 0.6; 
    pointer-events: none;  
}

.feedback_form {
            display: <?php echo isset($hideFormClass) ? ($hideFormClass === "hide-form" ? "none" : "block") : "block"; ?>;
        }
      </style>
  </head>

  <body>
    
  <?php
  // Check if the booking was successful
  if (isset($_SESSION['feedback_success']) && $_SESSION['feedback_success'] == true) {
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
                title: "Feedback Submitted!"
              });
            </script>';
      // Unset the session variable to prevent displaying the toast on page refresh
      unset($_SESSION['feedback_success']);
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

        <nav class="navbar" data-navbar>
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
              <a href="#blog" class="navbar-link" data-nav-link>Most Rented</a>
            </li>
          
            <li>
              <a href="#get-started" class="navbar-link" data-nav-link>Get Started</a>
            </li>

            <li>
              <a href="rented.php" class="navbar-link" data-nav-link>Rented</a>
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
          


          <a href="#" user-id="<?php echo $_SESSION['user_id'];?>" class=" user-btn" aria-label="Profile" >
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
<br><br><br><br><br>
       
        <ul class="featured-car-list">
        <?php

include "conn.php";

if(isset($_GET['id'])) {
    $sand_id = $_GET['id'];
    
    $query = "SELECT * FROM sand_tbl WHERE id = $sand_id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['sand_id'] = $row['id'];

       
        $feedback_query = "SELECT AVG(ratings) AS avg_rating FROM sand_feedbacks WHERE sand_id = $sand_id";
        $feedback_result = mysqli_query($conn, $feedback_query);
        $avg_rating = 0; 

        if ($feedback_result->num_rows > 0) {
            $feedback_row = $feedback_result->fetch_assoc();
            $avg_rating = $feedback_row['avg_rating'] != null ? number_format($feedback_row['avg_rating'], 1) . " / 5" : "No ratings yet";
        } else {
            $avg_rating = "No ratings yet";
        }

?>

<li>  
            <div class="featured-car-card" style="margin-left:75%;">
                <figure class="card-banner">
                    <img src="../admin/functions/sand_images/<?php echo $row['image']; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300" class="w-100"/>
                </figure>
                <div>
                <span style="float:right; margin-right:5%; font-size:1.3rem;"> <?php echo $avg_rating; ?></span><img src="assets/images/star_ratings.png"style="float:right; margin-right:3%;"  alt="ratings" height="30" width="30">
                </div>
                <br>
                <div class="card-content">
                    <div class="card-title-wrapper">
                        <h3 class="h3 card-title">

                          <a href="#"><?php echo $row['sand']; ?></a>
                  
                        </h3>
    
                    </div>

                    <div class="card-price-wrapper">
                        
                    <strong><p class="card-price">₱<?php echo $row['rate_per_bucket']?>/ Bucket</strong></p>
                        <button class="btn order_now_btn" id="order_now_btn"
                                user-id="<?php echo $_SESSION['user_id'];?>"
                                data-id="<?php echo $row['id']; ?>"
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
  } else {
      // Handle the case when no room with the provided ID is found
      echo "Error: Room not found";
  }
} else {
  // Handle the case when no room ID is provided in the URL
  echo "Error: Room ID not provided";
}
// Close database connection
mysqli_close($conn);
?>




       
</ul>
      <br>
<div class="col-10" style="border-bottom:1px solid grey; opacity:0.4; margin-left:8%;"></div>
  <br>

  <div class="container">
  <div class="row">
  <div class="col-1 image_banner">
    <img  src="assets/images/user-icon.jpg" height="60px" width="60px" style="border-radius:10px;">
    </div>
        <div class="col-1 line-div"  style="border-right:1px solid grey; opacity:0.4; "></div>
    <div class="col-9">
    
        <p>asda asd sdfgsd gsdfhg fsdgh dfgh fdg hfdgh fdgh fdgh fdgh fdgh fdgh fdg
        asda asd sdfgsd gsdfhg fsdgh dfgh fdg hfdgh fdgh fdgh fdgh fdgh fdgh fdgasdasdasdasdasd
        </p>
        
        <i class='bx bxs-star' style="color:#E88A1A; font-size:1.5rem; float:right;"></i>
    </div>
    
  </div><br>
  <div class="row">
  <div class="col-1 image_banner">
    <img  src="assets/images/user-icon.jpg" height="60px" width="60px" style="border-radius:10px;">
    </div>
        <div class="col-1 line-div"  style="border-right:1px solid grey; opacity:0.4; "></div>
    <div class="col-9">
    
        <p>asda asd sdfgsd gsdfhg fsdgh dfgh fdg hfdgh fdgh fdgh fdgh fdgh fdgh fdg
        asda asd sdfgsd gsdfhg fsdgh dfgh fdg hfdgh fdgh fdgh fdgh fdgh fdgh fdgasdasdasdasdasd
        </p>
        
        <i class='bx bxs-star' style="color:#E88A1A; font-size:1.5rem; float:right;"></i>
    </div>
    
  </div>
  </div><br>

  <div class="col-10" style="border-bottom:1px solid grey; opacity:0.4; margin-left:8%;"></div>
<br><br>
  <div class="container feedback_form">
    <div class="row">
        <div class="col">
            <form action="insert_sand_feedback.php" method="post" class="feedback_form" id="insert_feedback_form">
            <fieldset class="rating-container" >	
	<input type="radio" name="rating" id="rate5">
	<label for="rate5">
		<svg id="Object" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1122 1122"><defs><style>.cls-1{fill:#f7db5e;}.cls-2{fill:#f3cc30;}.cls-3{fill:#edbd31;}</style></defs><path class="cls-2" d="m570.497,252.536l93.771,190c1.543,3.126,4.525,5.292,7.974,5.794l209.678,30.468c8.687,1.262,12.156,11.938,5.87,18.065l-151.724,147.895c-2.496,2.433-3.635,5.939-3.046,9.374l35.817,208.831c1.484,8.652-7.597,15.25-15.367,11.165l-187.542-98.596c-3.085-1.622-6.771-1.622-9.857,0l-187.542,98.596c-7.77,4.085-16.851-2.513-15.367-11.165l35.817-208.831c.589-3.436-.55-6.941-3.046-9.374l-151.724-147.895c-6.286-6.127-2.817-16.803,5.87-18.065l209.678-30.468c3.45-.501,6.432-2.668,7.974-5.794l93.771-190c3.885-7.872,15.11-7.872,18.995,0Z"/><path class="cls-1" d="m561,296.423l-83.563,161.857c-4.383,8.49-12.797,14.155-22.312,15.024l-181.433,16.562,191.688,8.964c12.175.569,23.317-6.81,27.543-18.243l68.077-184.164Z"/><path class="cls-3" d="m357.284,838.933l-4.121,24.03c-1.484,8.652,7.597,15.25,15.367,11.165l187.541-98.596c3.086-1.622,6.771-1.622,9.857,0l187.541,98.596c7.77,4.085,16.851-2.513,15.367-11.165l-35.817-208.831c-.589-3.435.55-6.941,3.046-9.374l151.724-147.894c6.287-6.127,2.818-16.802-5.87-18.065l-70.23-10.205c-113.59,203.853-287.527,311.181-454.405,370.34Z"/></svg>
	</label>
	<input type="radio" name="rating" id="rate4">
	<label for="rate4">
		<svg id="Object" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1122 1122"><defs><style>.cls-1{fill:#f7db5e;}.cls-2{fill:#f3cc30;}.cls-3{fill:#edbd31;}</style></defs><path class="cls-2" d="m570.497,252.536l93.771,190c1.543,3.126,4.525,5.292,7.974,5.794l209.678,30.468c8.687,1.262,12.156,11.938,5.87,18.065l-151.724,147.895c-2.496,2.433-3.635,5.939-3.046,9.374l35.817,208.831c1.484,8.652-7.597,15.25-15.367,11.165l-187.542-98.596c-3.085-1.622-6.771-1.622-9.857,0l-187.542,98.596c-7.77,4.085-16.851-2.513-15.367-11.165l35.817-208.831c.589-3.436-.55-6.941-3.046-9.374l-151.724-147.895c-6.286-6.127-2.817-16.803,5.87-18.065l209.678-30.468c3.45-.501,6.432-2.668,7.974-5.794l93.771-190c3.885-7.872,15.11-7.872,18.995,0Z"/><path class="cls-1" d="m561,296.423l-83.563,161.857c-4.383,8.49-12.797,14.155-22.312,15.024l-181.433,16.562,191.688,8.964c12.175.569,23.317-6.81,27.543-18.243l68.077-184.164Z"/><path class="cls-3" d="m357.284,838.933l-4.121,24.03c-1.484,8.652,7.597,15.25,15.367,11.165l187.541-98.596c3.086-1.622,6.771-1.622,9.857,0l187.541,98.596c7.77,4.085,16.851-2.513,15.367-11.165l-35.817-208.831c-.589-3.435.55-6.941,3.046-9.374l151.724-147.894c6.287-6.127,2.818-16.802-5.87-18.065l-70.23-10.205c-113.59,203.853-287.527,311.181-454.405,370.34Z"/></svg>
	</label>
	<input type="radio" name="rating" id="rate3">
	<label for="rate3">
		<svg id="Object" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1122 1122"><defs><style>.cls-1{fill:#f7db5e;}.cls-2{fill:#f3cc30;}.cls-3{fill:#edbd31;}</style></defs><path class="cls-2" d="m570.497,252.536l93.771,190c1.543,3.126,4.525,5.292,7.974,5.794l209.678,30.468c8.687,1.262,12.156,11.938,5.87,18.065l-151.724,147.895c-2.496,2.433-3.635,5.939-3.046,9.374l35.817,208.831c1.484,8.652-7.597,15.25-15.367,11.165l-187.542-98.596c-3.085-1.622-6.771-1.622-9.857,0l-187.542,98.596c-7.77,4.085-16.851-2.513-15.367-11.165l35.817-208.831c.589-3.436-.55-6.941-3.046-9.374l-151.724-147.895c-6.286-6.127-2.817-16.803,5.87-18.065l209.678-30.468c3.45-.501,6.432-2.668,7.974-5.794l93.771-190c3.885-7.872,15.11-7.872,18.995,0Z"/><path class="cls-1" d="m561,296.423l-83.563,161.857c-4.383,8.49-12.797,14.155-22.312,15.024l-181.433,16.562,191.688,8.964c12.175.569,23.317-6.81,27.543-18.243l68.077-184.164Z"/><path class="cls-3" d="m357.284,838.933l-4.121,24.03c-1.484,8.652,7.597,15.25,15.367,11.165l187.541-98.596c3.086-1.622,6.771-1.622,9.857,0l187.541,98.596c7.77,4.085,16.851-2.513,15.367-11.165l-35.817-208.831c-.589-3.435.55-6.941,3.046-9.374l151.724-147.894c6.287-6.127,2.818-16.802-5.87-18.065l-70.23-10.205c-113.59,203.853-287.527,311.181-454.405,370.34Z"/></svg>
	</label>
	<input type="radio" name="rating" id="rate2">
	<label for="rate2">
		<svg id="Object" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1122 1122"><defs><style>.cls-1{fill:#f7db5e;}.cls-2{fill:#f3cc30;}.cls-3{fill:#edbd31;}</style></defs><path class="cls-2" d="m570.497,252.536l93.771,190c1.543,3.126,4.525,5.292,7.974,5.794l209.678,30.468c8.687,1.262,12.156,11.938,5.87,18.065l-151.724,147.895c-2.496,2.433-3.635,5.939-3.046,9.374l35.817,208.831c1.484,8.652-7.597,15.25-15.367,11.165l-187.542-98.596c-3.085-1.622-6.771-1.622-9.857,0l-187.542,98.596c-7.77,4.085-16.851-2.513-15.367-11.165l35.817-208.831c.589-3.436-.55-6.941-3.046-9.374l-151.724-147.895c-6.286-6.127-2.817-16.803,5.87-18.065l209.678-30.468c3.45-.501,6.432-2.668,7.974-5.794l93.771-190c3.885-7.872,15.11-7.872,18.995,0Z"/><path class="cls-1" d="m561,296.423l-83.563,161.857c-4.383,8.49-12.797,14.155-22.312,15.024l-181.433,16.562,191.688,8.964c12.175.569,23.317-6.81,27.543-18.243l68.077-184.164Z"/><path class="cls-3" d="m357.284,838.933l-4.121,24.03c-1.484,8.652,7.597,15.25,15.367,11.165l187.541-98.596c3.086-1.622,6.771-1.622,9.857,0l187.541,98.596c7.77,4.085,16.851-2.513,15.367-11.165l-35.817-208.831c-.589-3.435.55-6.941,3.046-9.374l151.724-147.894c6.287-6.127,2.818-16.802-5.87-18.065l-70.23-10.205c-113.59,203.853-287.527,311.181-454.405,370.34Z"/></svg>
	</label>
	<input type="radio" name="rating" id="rate1">
	<label for="rate1">
		<svg id="Object" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1122 1122"><defs><style>.cls-1{fill:#f7db5e;}.cls-2{fill:#f3cc30;}.cls-3{fill:#edbd31;}</style></defs><path class="cls-2" d="m570.497,252.536l93.771,190c1.543,3.126,4.525,5.292,7.974,5.794l209.678,30.468c8.687,1.262,12.156,11.938,5.87,18.065l-151.724,147.895c-2.496,2.433-3.635,5.939-3.046,9.374l35.817,208.831c1.484,8.652-7.597,15.25-15.367,11.165l-187.542-98.596c-3.085-1.622-6.771-1.622-9.857,0l-187.542,98.596c-7.77,4.085-16.851-2.513-15.367-11.165l35.817-208.831c.589-3.436-.55-6.941-3.046-9.374l-151.724-147.895c-6.286-6.127-2.817-16.803,5.87-18.065l209.678-30.468c3.45-.501,6.432-2.668,7.974-5.794l93.771-190c3.885-7.872,15.11-7.872,18.995,0Z"/><path class="cls-1" d="m561,296.423l-83.563,161.857c-4.383,8.49-12.797,14.155-22.312,15.024l-181.433,16.562,191.688,8.964c12.175.569,23.317-6.81,27.543-18.243l68.077-184.164Z"/><path class="cls-3" d="m357.284,838.933l-4.121,24.03c-1.484,8.652,7.597,15.25,15.367,11.165l187.541-98.596c3.086-1.622,6.771-1.622,9.857,0l187.541,98.596c7.77,4.085,16.851-2.513,15.367-11.165l-35.817-208.831c-.589-3.435.55-6.941,3.046-9.374l151.724-147.894c6.287-6.127,2.818-16.802-5.87-18.065l-70.23-10.205c-113.59,203.853-287.527,311.181-454.405,370.34Z"/></svg>
	</label>
	<div class="rating-value"></div>
</fieldset>
<br>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Comments Here</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" placeholder="Your Comments and Feedbacks here" rows="4" required></textarea>
  </div>

  <input type="hidden" id="convert_ratings" name="number_ratings" >

<input type="hidden" name="sand_id" id="sand_id" value="<?php echo $_SESSION['sand_id'];?> " readonly>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'];?> " readonly>
  <button class="button" id="insert_feedback_btn">
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
      </svg>
    </div>
  </div>
  <span>Submit</span>
</button>

 </form>
        </div>
    </div>
  </div>
<br><br>
        <?php include "sand_modal1.php";?>

        <?php include "perload_modal.php";?>
        <?php include "perhour_modal.php";?>
        <?php include "perday_modal.php";?>

        <?php include "rent_modal.php";?>





       

        

    </main>
  <br><br>
  

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
        location.reload(); 
    }
});

            } else {
                
                alert('Error: ' + xhr.statusText);
               
                rentButton.disabled = false;
            }
        };
        xhr.onerror = function () {
            
            alert('Request failed.');
           
            rentButton.disabled = false;
        };
        xhr.send(formData);
    });
});
</script>


<script>
    const radioBtns = document.querySelectorAll('input[name="rating"]');
    const convertInput = document.getElementById('convert_ratings');

    
    radioBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            
            const ratingValue = parseInt(btn.id.replace('rate', ''));
           
            convertInput.value = ratingValue;
        });
    });
</script>

<script>

$(document).ready(function() {
        $(".order_now_btn").click(function(e) {
            e.preventDefault();
            
            $("#sandModal1").modal("show");
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

        $('#sandModal1').on('hidden.bs.modal', function (e) {
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

            // Perform the computation
            const total = rate * bucketQty;

            // Display the result
            totalDisplay.textContent = `Total: ₱${total.toFixed(0)}`; // Adjust formatting as needed
            orderTotalInput.value = total.toFixed(0); // Set the value of order_total input

            orderSummaryText.textContent = bucketQty === 1 ? '1 Bucket' : `${bucketQty} Buckets`;
            orderSummaryInput.value = bucketQty === 1 ? '1 Bucket' : `${bucketQty} Buckets`;
        }

        // Listen for changes in inputs
        rateInput.addEventListener('input', updateTotal);
        bucketInput.addEventListener('input', updateTotal);
    });
</script>



<script>




</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
