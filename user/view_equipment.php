

<?php 

include "user_session.php";

?>

<?php

include "conn.php";

// Check if user has completed renting the selected equipment
function isRentalCompleted($equipment_id, $user_id, $conn) {
    $sql = "SELECT * FROM rental WHERE equipment_id = ? AND user_id = ? AND status = 'Completed'";
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
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        <nav class="navbar" data-navbar >
          <ul class="navbar-list">
            <li>
              <a href="index.php#home" class="navbar-link" data-nav-link>Home</a>
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
            <a href="tel:63 956 632 0135" class="contact-link">63 956 632 0135</a>

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
    $equipment_id = $_GET['id'];
    
    $query = "SELECT * FROM equipment_tbl WHERE id = $equipment_id";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['equipment_id'] = $row['id'];

       
        $feedback_query = "SELECT AVG(ratings) AS avg_rating FROM feedbacks_tbl WHERE equipment_id = $equipment_id";
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
            <div class="featured-car-card <?php echo $disabled_class; ?>" data-equipment-id="<?php echo $equipment_id;?>" style="margin-left:75%;">
                <figure class="card-banner">
                    <img src="../admin/functions/equipment_images/<?php echo $row['image']; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300" class="w-100"/>
                </figure>
                <div>
                <span style="float:right; margin-right:5%; font-size:1.3rem;"><?php echo $avg_rating; ?></span><img src="assets/images/star_ratings.png"style="float:right; margin-right:3%;"  alt="ratings" height="30" width="30">
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
  <?php
include "conn.php";


if (isset($_GET['id'])) {
    $equipment_id = $_GET['id'];

    // Prepare SQL query to select feedbacks for the specified equipment ID
    $sql = "SELECT feedbacks_tbl.equipment_id, feedbacks_tbl.ratings, feedbacks_tbl.comments, users_acc.user_name, users_acc.image
            FROM feedbacks_tbl 
            INNER JOIN users_acc ON feedbacks_tbl.user_id = users_acc.id 
            WHERE feedbacks_tbl.equipment_id = $equipment_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class="row">
                <div class="col-1 image_banner">
                    <img src="../user_images/<?php echo $row['image'];?>" height="60px" width="60px" style="border-radius:10px;">
                </div>
                <div class="col-1 line-div" style="border-right:1px solid grey; opacity:0.4;"></div>
                <div class="col-9" >
                    <p><?php echo $row['comments']; ?></p>
                    <i class='bx bxs-star' style="color:#E88A1A; font-size:1.2rem; float:right;"> <?php echo $row['ratings']; ?> / 5</i>
                    
                  </div><br> <br>
                  <div  class="col-12" style="border-bottom:1px solid grey; opacity:0.4;"></div>
            </div><br>

<?php
        }
    } else {
        echo "No feedbacks found for this equipment.";
    }
} else {
    echo "Equipment ID is not provided.";
}
?>

  <br>


  <div class="col-10" style="border-bottom:1px solid grey; opacity:0.4; margin-left:8%;"></div>
<br><br>
  <div class="container feedback_form">
    <div class="row">
        <div class="col">
            <form action="insert_feedback.php" method="post" class="feedback_form" id="insert_feedback_form">
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
    <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" placeholder="Your Comments and Feedbacks here" rows="4"></textarea>
  </div>

  <input type="text" id="convert_scale" name="likert-scale">

  <input type="text" id="convert_ratings" name="number_ratings">



<input type="hidden" name="equipment_id" id="equipment_id" value="<?php echo $_SESSION['equipment_id'];?> " readonly>
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
const convertInputScale = document.getElementById('convert_scale');
const convertInputRating = document.getElementById('convert_ratings');

// Map numerical ratings to Likert scale labels
const ratingToScale = {
    1: 'Very Poor',
    2: 'Poor',
    3: 'Neutral',
    4: 'Satisfied',
    5: 'Very Satisfied'
};

// Add click event listener to each radio button
radioBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Extract the rating value from the radio button id
        const ratingValue = parseInt(btn.id.replace('rate', ''));
        
        // Update the value of the convert inputs
        convertInputScale.value = ratingToScale[ratingValue];
        convertInputRating.value = ratingValue;
    });
});

</script>





<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>
