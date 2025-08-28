<?php 

include "user_session.php";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Rent Lists</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml" />

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

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

        .receipt {
            background-color: white;
            padding: 20px;
            border: 1px solid black;
            width: 400px;
            margin: 0 auto;
        }


        @media (max-width: 768px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  
  thead {
    display: none;
  }

  tr {
    margin-bottom: 15px;
  }

  td {
    text-align: right;
    padding-left: 50%;
    position: relative;
  }

  td::before {
    content: attr(data-label);
    position: absolute;
    left: 10px;
    font-weight: bold;
  }

  td img {
    width: 100px;
    height: auto;
  }
  #receipt{
    margin-left:80% !important;
  }
  #e_image{
    margin-left: 75% !important;
  }
  .view-button{
    margin-left: 80%;
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
            <section class="section hero" id="home">
          <div class="container" style="margin-top:-6%;">
          <h2 class="section-title">Rent Lists</h2>
          <div class="table-responsive">
            
          <div class="table-responsive">
  <table class="table">
    <thead style="background-color:#E88A1A;">
      <tr>
        <th scope="col">Image</th>
        <th scope="col">Rent</th>
        <th scope="col">Equipment</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Duration</th>
        <th scope="col">Total</th>
        <th scope="col">Downpayment</th>
        <th scope="col">Balance</th>
        <th scope="col">Receipt</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "conn.php";

        // Query to fetch rental data
        $sql = "SELECT rental.approved_date, rental.paid_date, rental.completed_date, rental.id as rent_id, equipment_tbl.equipment, equipment_tbl.image, rental.rent_start_date, rental.rent_end_date, rental.summary, rental.total, rental.status, users_acc.user_name, rental.downpayment, rental.first_total, rental.gcash_receipt
        FROM rental
        INNER JOIN equipment_tbl ON rental.equipment_id = equipment_tbl.id
        INNER JOIN users_acc ON rental.user_id = users_acc.id
        WHERE rental.user_id = " . $_SESSION['user_id'] . "
        ORDER BY rental.id DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // Format dates with new logic
            $approved_date = $row['approved_date'] ? date('M j, Y - g:i a', strtotime($row['approved_date'])) : '';
            $paid_date = $row['paid_date'] ? date('M j, Y - g:i a', strtotime($row['paid_date'])) : '';
            $completed_date = $row['completed_date'] ? date('M j, Y - g:i a', strtotime($row['completed_date'])) : '';
            $downpayment_display = ($row['status'] === "Pending") ? "Processing" : $row['downpayment'];
            ?>
            <tr>
              <td data-label="Image"><img src="../admin/functions/equipment_images/<?php echo $row['image']; ?>" alt="Equipment Image" height="60" width="80" style="border-radius:15px;" id="e_image"></td>
              <td data-label="Rent"><?php echo $row['rent_id']; ?></td>
              <td data-label="Equipment"><?php echo $row['equipment']; ?></td>
              <td data-label="Start Date"><?php echo formatDate($row['rent_start_date']); ?></td>
              <td data-label="End Date"><?php echo formatDate($row['rent_end_date']); ?></td>
              <td data-label="Duration"><?php echo $row['summary']; ?></td>
              <td data-label="Total"><?php echo $row['total']; ?></td>
              <td data-label="Downpayment"><?php echo $downpayment_display; ?></td>
              <td data-label="Balance"> <?php 
       echo ($row['status'] === 'Paid' || $row['status'] === 'Completed') ? '0' : $row['first_total'];

    ?></td>
              <td data-label="Receipt">
                <img src="gcash/<?php echo $row['gcash_receipt']; ?>" alt="" id="receipt" style="height:70px; width:60px;" onclick="showImage(this.src)">
              </td>
              <td data-label="Status"><?php echo $row['status']; ?></td>
              <td data-label="Action">
                <button 
                  style="background-color:#25396f; color:white; padding:7px; border-radius:15px;" 
                  class="view-button" 
                  onclick="viewBookingDetails(
                    <?php echo $row['rent_id']; ?>, 
                    '<?php echo $row['equipment']; ?>', 
                    '<?php echo formatDate($row['rent_start_date']); ?>', 
                    '<?php echo formatDate($row['rent_end_date']); ?>', 
                    '<?php echo $row['summary']; ?>', 
                    '<?php echo $row['total']; ?>', 
                    '<?php echo $row['downpayment']; ?>',
                    '<?php echo $row['first_total']; ?>',
                    '<?php echo $row['status']; ?>',
                    '<?php echo $approved_date; ?>',
                    '<?php echo $paid_date; ?>',
                    '<?php echo $completed_date; ?>'
                  )"
                >
                  View
                </button>
                
              </td>
            </tr>
            <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="9">No data found</td>
          </tr>
          <?php
        }

        // Function to format the date or display "PerLoad"
        function formatDate($dateString) {
          if ($dateString == "0000-00-00" || empty($dateString)) {
            return "PerLoad";
          } else {
            $date = strtotime($dateString);
            if (date("H:i:s", $date) == "00:00:00") {
              return date("M j, Y", $date);
            } else {
              return date("M j, Y - h a", $date);
            }
          }
        }
      ?>
    </tbody>
  </table>
</div>

          </div>
            </div>

        </section>

        <!-- 
        - #FEATURED CAR
      -->
      <div id="imageViewer" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.8); z-index:1000; justify-content:center; align-items:center; text-align:center;">
    <!-- Close Button -->
    <button onclick="closeImage()" style="position: absolute; top: 20px; right: 20px; background-color: #E88A1A; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;">Close</button>

    <!-- Full Image Display -->
    <img id="fullImage" src="" alt="" style="max-width:90%; max-height:90%; margin-top:5%; cursor:pointer;">
</div>
<script>
function showImage(src) {
    // Set the source of the full image
    document.getElementById('fullImage').src = src;

    // Show the image viewer in the center
    document.getElementById('imageViewer').style.display = "flex";
}

function closeImage() {
    // Hide the image viewer
    document.getElementById('imageViewer').style.display = "none";
}
</script>
        

      </article>
    </main>

    <!-- 
    - #FOOTER
  -->

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

    <div class="container">
      <div class="row">
        <div class="col">

        </div>
      </div>
    </div>

  <div class="col-6">

  </div>

 
   
    <script>
        
   function viewBookingDetails(rentId, equipment, startDate, endDate, summary, total,downpayment,first_total, status, approvedDate, paidDate, completedDate) {
    
    let message = `
    <div class="row">
    <div class="col-12" >
    <h6 style="font-size:1.5rem; color:black;border-bottom:1px solid black;">Rent #:${rentId}</h6><br>
    </div>

        <div class="col-6">
            <h6 style="color:black; font-size:1.2rem;" >Equipment:</h6>
            ${startDate !== 'perLoad' ? `<h6 >Start Date:</h6>` : ''}
            ${endDate !== 'perLoad' ? `<h6 >End Date:</h6>` : ''}
            <h6 >Duration:</h6>
            <h6 >Total:</h6>
             <h6 >Downpayment:</h6>
              <h6 >Balance:</h6>
            ${approvedDate ? `<h6>Approved:</h6>` : ''}
            ${paidDate ? `<h6>Paid:</h6>` : ''}
            ${completedDate ? `<h6>Completed:</h6>` : ''}
        </div>
        <div class="col-6">
            <h6 style="color:black; font-size:1.2rem;">${equipment}</h6>
            ${startDate !== 'perLoad' ? `<h6>${startDate}</h6>` : ''}
            ${endDate !== 'perLoad' ? `<h6 >${endDate}</h6>` : ''}
            <h6>${summary}</h6>
            <h6>₱${total}</h6>
            <h6>${status === 'Pending' ? 'Processing' : `₱${downpayment}`}</h6>

          <h6>${status === 'Paid' || status === 'Completed' ? `₱${first_total}/Paid` : `₱${first_total}`}</h6>



            ${approvedDate ? `<h6>${approvedDate}</h6>` : ''}
            ${paidDate ? `<h6>${paidDate}</h6>` : ''}
            ${completedDate ? `<h6>${completedDate}</h6>` : ''}
        </div>
    </div>
    <div class="row mt-3">
        <div class="col text-center">
        ${status !== "Cancelled" ? `<button class="btn btn-primary" onclick="downloadReceipt('${rentId}','${equipment}','${status}','${startDate}','${endDate}','${summary}','${total}','${downpayment}','${first_total}','${approvedDate}','${paidDate}','${completedDate}')">Download</button>` : ''}
        </div>
    </div>
`;


    // Set the icon based on the status
    let icon;
    if (status === "Approved" || status === "Completed" || status === "Paid") {
        icon = 'success';
    } else if (status === "Cancelled") {
        icon = 'error';
    } else if (status === "Pending") {
        icon = 'info';
    }
    else {
        
        icon = 'info';
    }

    // Set the title based on the status
    let title;
    if (status === "Approved") {
        title = 'Approved';
    } else if (status === "Cancelled") {
        title = 'Cancelled';
    }else if (status === "Completed") {
        title = 'Completed';
    }
    else if (status === "Paid") {
        title = 'Paid';
    }else if (status === "Pending") {
        title = 'Pending';
    }
     else {
        title = 'Booking Details';
    }

    // Open a SweetAlert2 modal with the rental details
    Swal.fire({
        title: title,
        html: message,
        icon: icon,
        confirmButtonText: 'Close'
    });
}

    </script>



<script>
 function downloadReceipt(rentId, equipment, status, startDate, endDate, Summary, Total, downpayment, first_total, approvedDate, paidDate, completedDate) {
    // Create a new SVG element
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.setAttribute('width', '500');
    svg.setAttribute('height', '400');
    svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
    svg.setAttribute('style', 'background-color: white;');

    let textColor;
    switch (status) {
        case 'Approved':
        case 'Paid':
        case 'Completed':
            textColor = 'green';
            break;
        case 'Pending':
            textColor = '#CE4B0D';
            break;
        case 'Cancelled':
            textColor = 'red';
            break;
        default:
            textColor = 'black';
            break;
    }

    // Utility function to conditionally create and append text elements
    function addTextElement(value, x, y, fontSize, fontWeight, color) {
        if (value) {
            const textElement = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            textElement.setAttribute('x', x);
            textElement.setAttribute('y', y);
            textElement.setAttribute('dominant-baseline', 'middle');
            textElement.setAttribute('text-anchor', 'middle');
            if (fontSize) textElement.setAttribute('font-size', fontSize);
            if (fontWeight) textElement.setAttribute('font-weight', fontWeight);
            if (color) textElement.setAttribute('fill', color);
            textElement.textContent = value;
            svg.appendChild(textElement);
        }
    }

    // Add text elements
    addTextElement('Hjp', '10', '20', '20', null, 'black');
    addTextElement(`Rent #: ${rentId}`, '50%', '15%', '2rem', '700');
    addTextElement(`${status}`, '50%', '26%', '1.1rem', null, textColor);
    addTextElement(`Equipment: ${equipment}`, '50%', '33%');
    addTextElement(`Start Date: ${startDate}`, '50%', '40%');
    addTextElement(`End Date: ${endDate}`, '50%', '47%');
    addTextElement(`Summary: ${Summary}`, '50%', '54%');
    addTextElement(`Total: ${Total}`, '50%', '61%');
    // Add downpayment text element conditionally based on status
addTextElement(status === 'Pending' ? 'Downpayment: Processing' : `Downpayment: ${downpayment}`, '50%', '68%');

   // Add text elements conditionally
addTextElement(approvedDate ? `Approved: ${approvedDate}` : null, '50%', '75%');
addTextElement(paidDate ? `Paid: ${paidDate}` : null, '50%', '82%');
addTextElement(completedDate ? `Completed: ${completedDate}` : null, '50%', '89%');

addTextElement(
  status === 'Paid' || status === 'Completed' 
    ? `Balance: ${first_total.toLocaleString()}/Paid` 
    : `Balance: ${first_total.toLocaleString()}`, 
  '50%', '96%', '1.1rem', '550'
);




    // Add lines
    function addLine(x1, y1, x2, y2, strokeColor, strokeWidth) {
        const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
        line.setAttribute('x1', x1);
        line.setAttribute('y1', y1);
        line.setAttribute('x2', x2);
        line.setAttribute('y2', y2);
        line.setAttribute('stroke', strokeColor);
        line.setAttribute('stroke-width', strokeWidth);
        svg.appendChild(line);
    }

    addLine('30%', '70', '70%', '70', 'black', 1);
    addLine('30%', '370', '70%', '370', 'black', 1);

    const svgData = new XMLSerializer().serializeToString(svg);

    const canvas = document.createElement('canvas');
    canvas.width = 500;
    canvas.height = 400;

    const img = new Image();
    const imgSrc = 'data:image/svg+xml;base64,' + btoa(svgData);
    img.src = imgSrc;

    // Draw image on canvas
    img.onload = function () {
        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);

        const dataURL = canvas.toDataURL('image/jpg');

        const link = document.createElement('a');
        link.href = dataURL;
        link.download = `receipt_${rentId}_${status}.jpg`;

        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };
}


</script>


<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-0ae42fb2-bdf8-4c7d-8859-2abb651288ae" data-elfsight-app-lazy></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <script src="./assets/js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>
