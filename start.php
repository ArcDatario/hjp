<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="newstyle.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Sign in & Sign up Form</title>
    <style>
   #password-strength-bar {
    height: 5px;
    width: 0; /* Start with 0 width */
    background-color: #e0e0e0; /* Default background */
    margin-top: 5px;
    transition: width 0.3s, background-color 0.3s; /* Smooth transition */
    border-radius:10px;
}

.strength-weak {
    background-color: red;
    width: 33%;
}

.strength-medium {
    background-color: orange;
    width: 66%;
}

.strength-strong {
    background-color: green;
    width: 100%;
}


.input-container {
    display: flex; /* Use flexbox to align input and button horizontally */
    gap: 10px; /* Add space between input field and button */
    align-items: center; /* Vertically align items */
}

.input-field1 {
    display: flex;
    align-items: center; /* Align icon and input vertically */
    gap: 5px; /* Add space between the icon and input */
    flex-grow: 1; /* Allow input field to grow and take available space */
}

.input-field1 i {
    font-size: 16px; /* Adjust icon size */
    color: #555; /* Adjust icon color */
}

.input-field1 input {
    flex: 1; /* Ensure input field takes the remaining horizontal space */
    padding: 5px 10px; /* Add padding for better appearance */
    font-size: 14px; /* Adjust font size */
    border: 1px solid #ccc; /* Optional: Add a border */
    border-radius: 4px; /* Optional: Add rounded corners */
    outline: none; /* Remove outline on focus */
}

.send_otp {
    padding: 5px 15px; /* Add padding for the button */
    font-size: 14px; /* Adjust font size */
    color: #fff; /* Button text color */
    background-color: #007bff; /* Button background color */
    border: none; /* Remove border */
    border-radius: 4px; /* Optional: Add rounded corners */
    cursor: pointer; /* Change cursor to pointer */
    outline: none; /* Remove outline on focus */
    transition: background-color 0.3s; /* Smooth hover effect */
}

.send_otp:hover {
    background-color: #0056b3; /* Darken the button on hover */
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



    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form class="sign-in-form" method="post" action="login.php"  id="log-in-form" >
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" id="username" name="username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="pswd" name="pswd" />
            </div>
            <input type="submit" value="Login" name="login" class="btn solid" />
            <p class="social-text">Have a Great Day! </p>
          </form>
          
          <form class="sign-up-form" method="post" action="sign_up.php" id="sign-up-form">
    <h2 class="title">Sign up</h2>
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Full Name" name="user_name" id="user_name" required />
    </div>
    <div class="input-field">
        <i class="fas fa-solid fa-phone"></i>
        <input type="text" placeholder="Phone #" name="phone" id="phone" required />
    </div>
    <div class="input-container">
    <div class="input-field1">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" name="email" id="email" required />
    </div>
    <button type="button" id="send_otp" class="send_otp">Send OTP</button>
</div>



    <input type="number" id="otp_input" style="display:none" class="input-field" placeholder="Enter OTP"  required>
   
    <div class="input-container">
    <div class="input-field2">
        <i class="fas fa-location"></i>
        <select name="municipality" id="municipality" required class="municipality" style="border:none; background:transparent">
            <option value="" selected disabled>Select Municipality</option>
            <option value="Bansud" class="Bansud">Bansud</option>
            <option value="Gloria" class="Gloria">Gloria</option>
            <option value="Pinamalayan" class="Pinamalayan">Pinamalayan</option>
        </select>
    </div>

    <div class="input-field2">
        <i class="fas fa-location"></i>
        <select name="barangay" id="barangay" class="barangay" required style="border:none; background:transparent">
        </select>
    </div>
    </div>

    <div class="input-field">
     <i class="fas fa-location"></i>
      <input type="text" class="details" id="details" name="details" placeholder="Sitio / Details" required>
    </div>


    <div class="input-field">
        <i class="fas fa-lock"></i>
         <input type="password" placeholder="Password" name="password" id="password" required />
         
    </div>
    <div id="password-strength-bar"></div> 
    <input type="submit" class="btn" value="Sign up" id="sign_up_btn" />
    <p class="social-text">Hello! Welcome! Let's get started.</p>
</form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
             Find out our Heavy Equipment Rental Services! We Offer Low cost Equipments for you Needs!
            </p>
            <button type="button"class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/construction.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lets start to build with your dreams Faster with the help of our Equipments
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/building.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>

    <script>
$(document).ready(function () {
    // Password strength bar setup
    const strengthBar = $('<div id="password-strength-bar"></div>').insertAfter('#password');
    strengthBar.css({
        height: '5px',
        width: '0%',
        marginTop: '5px',
        transition: 'width 0.3s, background-color 0.3s'
    });

    // Function to update password strength
    $('#password').on('input', function () {
        const password = $(this).val().trim();
        
        // Determine password strength
        if (password.length >= 8) {
            strengthBar.css({ width: '100%', backgroundColor: 'green' });
        } else if (password.length >= 6) {
            strengthBar.css({ width: '60%', backgroundColor: 'orange' });
        } else if (password.length > 0) {
            strengthBar.css({ width: '30%', backgroundColor: 'red' });
        } else {
            strengthBar.css({ width: '0%', backgroundColor: '#e0e0e0' });
        }
    });

    // Registration with OTP Verification
    $("#sign-up-form").submit(function (e) {
        e.preventDefault();

        const userName = $("#user_name").val().trim();
        const phone = $("#phone").val().trim();
        const email = $("#email").val().trim();
        const municipality = $("#municipality").val().trim();
        const barangay = $("#barangay").val().trim();
        const details = $("#details").val().trim();
        const password = $("#password").val().trim();
        const otp = $("#otp_input").val().trim();

        if (!userName || !phone || !email || !password || !otp || !municipality || !barangay || !details) {
            alert("Please fill out all fields and enter the OTP.");
            return;
        }

        // AJAX call for registration with OTP verification
        $.ajax({
            url: "sign_up.php",
            type: "POST",
            data: {
                action: "register",
                user_name: userName,
                phone: phone,
                email: email,
                password: password,
                otp: otp,
                municipality: municipality,
                barangay: barangay,
                details: details
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        title: "Signed In",
                        html: "Redirecting..",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true
                    }).then(() => {
                        window.location.href = 'user/index.php';
                    });
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert("Registration failed. Please try again.");
            }
        });
    });
});




    </script>




<script>
 $(document).ready(function(){
    $('#log-in-form').submit(function(e){
        e.preventDefault();
        if ($('#username').val().trim() === '' || $('#pswd').val().trim() === '') {
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
                icon: "info",
                title: "All Fields are Required"
              });
        }
        $.ajax({
            type: "POST",
            url: "login.php",
            data: $(this).serialize(),
            dataType: 'json', // Expect JSON response from server
            success: function(response){
                // If login successful, display success message and redirect
                if (response.status === 'success') {
                    Swal.fire({
                        title: "Signed In",
                        html: "Redirecting..",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    }).then(() => {
                        window.location.href = 'user/index.php';
                    });
                } else {
                    // If login failed, display error message
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
                icon: "error",
                title: "Username or password Doesn't Match"
              });
                }
            }
        });
    });
});

</script>

<script>
  $(document).ready(function () {
    $("#send_otp").click(function (e) {
        e.preventDefault();

        const email = $("#email").val();
        
        if (!email) {
            alert("Please enter your email address to receive an OTP.");
            return;
        }

        // AJAX call to send OTP
        $.ajax({
            url: "send_otp.php",
            type: "POST",
            data: { action: "sendotp", email: email },
            success: function (response) {
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
                title: "OTP Send Successfully!"
              }); 
                $("#otp_input").show(); // Display OTP input field
            },
            error: function () {
                alert("Failed to send OTP. Please try again.");
            },
        });
    });
});

</script>

<script>

document.getElementById("municipality").addEventListener("change", function () {
    const selectedMunicipality = this.value; // Get the selected municipality
    const barangaySelect = document.getElementById("barangay");

    // Hide all barangay options
    const allBarangays = barangaySelect.querySelectorAll("option");
    allBarangays.forEach(option => option.style.display = "none");

    // Show only the barangays for the selected municipality
    if (selectedMunicipality === "Bansud") {
        barangaySelect.innerHTML = `
            <option value="" disabled selected>Select Barangay</option>
            <option value="Alcadesma">Alcadesma</option>
            <option value="Bato">Bato</option>
            <option value="Conrazon">Conrazon</option>
            <option value="Malo">Malo</option>
            <option value="Manihala">Manihala</option>
            <option value="Pag-asa">Pag-asa</option>
            <option value="Poblacion">Poblacion</option>
            <option value="Proper Bansud">Proper Bansud</option>
            <option value="Proper Tiguisan">Proper Tiguisan</option>
            <option value="Rosacara">Rosacara</option>
            <option value="Salcedo">Salcedo</option>
            <option value="Sumagui">Sumagui</option>
            <option value="Villa Pag-asa">Villa Pag-asa</option>
        `;
    } else if (selectedMunicipality === "Gloria") {
        barangaySelect.innerHTML = `
            <option value="" disabled selected>Select Barangay</option>
            <option value="Agos">Agos</option>
            <option value="Agsalin">Agsalin</option>
            <option value="Alma Villa">Alma Villa</option>
            <option value="Andres Bonifacio">Andres Bonifacio</option>
            <option value="Balete">Balete</option>
            <option value="Banus">Banus</option>
            <option value="Banutan">Banutan</option>
            <option value="Bulaklakan">Bulaklakan</option>
            <option value="Buong Lupa">Buong Lupa</option>
            <option value="Gaudencio Antonino">Gaudencio Antonino</option>
            <option value="Guimbonan">Guimbonan</option>
            <option value="Kawit">Kawit</option>
            <option value="Lucio Laurel">Lucio Laurel</option>
            <option value="Macario Adriatico">Macario Adriatico</option>
            <option value="Malamig">Malamig</option>
            <option value="Malayong">Malayong</option>
            <option value="Maligaya">Maligaya</option>
            <option value="Malubay">Malubay</option>
            <option value="Manguyang">Manguyang</option>
            <option value="Maragooc">Maragooc</option>
            <option value="Mirayan">Mirayan</option>
            <option value="Narra">Narra</option>
            <option value="Papandungin">Papandungin</option>
            <option value="San Antonio">San Antonio</option>
            <option value="Santa Maria">Santa Maria</option>
            <option value="Santa Theresa">Santa Theresa</option>
            <option value="Tambong">Tambong</option>
        `;
    } else if (selectedMunicipality === "Pinamalayan") {
        barangaySelect.innerHTML = `
            <option value="" disabled selected>Select Barangay</option>
            <option value="Anoling">Anoling</option>
            <option value="Bacungan">Bacungan</option>
            <option value="Bangbang">Bangbang</option>
            <option value="Banilad">Banilad</option>
            <option value="Buli">Buli</option>
            <option value="Cacawan">Cacawan</option>
            <option value="Calingag">Calingag</option>
            <option value="Del Razon">Del Razon</option>
            <option value="Guinhawa">Guinhawa</option>
            <option value="Inclanay">Inclanay</option>
            <option value="Lumangbayan">Lumangbayan</option>
            <option value="Malaya">Malaya</option>
            <option value="Maliangcog">Maliangcog</option>
            <option value="Maningcol">Maningcol</option>
            <option value="Marayos">Marayos</option>
            <option value="Marfrancisco">Marfrancisco</option>
            <option value="Nabuslot">Nabuslot</option>
            <option value="Pagalagala">Pagalagala</option>
            <option value="Palayan">Palayan</option>
            <option value="Pambisan Malaki">Pambisan Malaki</option>
            <option value="Pambisan Munti">Pambisan Munti</option>
            <option value="Panggulayan">Panggulayan</option>
            <option value="Papandayan">Papandayan</option>
            <option value="Pili">Pili</option>
            <option value="Quinabigan">Quinabigan</option>
            <option value="Ranzo">Ranzo</option>
            <option value="Rosario">Rosario</option>
            <option value="Sabang">Sabang</option>
            <option value="Santa Isabel">Santa Isabel</option>
            <option value="Santa Maria">Santa Maria</option>
            <option value="Santa Rita">Santa Rita</option>
            <option value="Santo Niño">Santo Niño</option>
            <option value="Wawa">Wawa</option>
            <option value="Zone I">Zone I</option>
            <option value="Zone II">Zone II</option>
            <option value="Zone III">Zone III</option>
            <option value="Zone IV">Zone IV</option>
        `;
    } else {
        barangaySelect.innerHTML = `<option value="" disabled selected>Select Municipality first</option>`;
    }
});


</script>


  </body>
</html>
