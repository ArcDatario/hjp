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
    <link rel="stylesheet" href="style.css" />
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
        <input type="text" placeholder="Username" name="user_name" id="user_name" required />
    </div>
    <div class="input-field">
        <i class="fas fa-solid fa-phone"></i>
        <input type="text" placeholder="Phone #" name="phone" id="phone" required />
    </div>
    <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" name="email" id="email" required />
    </div>
    <button type="button" id="send_otp" class="send_otp">Send OTP</button>

    <input type="number" id="otp_input" style="display:none" class="input-field" placeholder="Enter OTP"  required>
   
    
    <div class="input-field">
        <i class="fas fa-lock"></i>
         <input type="password" placeholder="Password" name="password" id="password" required />
          <div id="password-strength-bar"></div> 
    </div>
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
            // Strong password
            strengthBar.css({ width: '650%', backgroundColor: 'green' });
        } else if (password.length >= 6) {
            // Medium password
            strengthBar.css({ width: '450%', backgroundColor: 'orange' });
        } else if (password.length > 0) {
            // Weak password
            strengthBar.css({ width: '300%', backgroundColor: 'red' });
        } else {
            // No password input
            strengthBar.css({ width: '0%', backgroundColor: '#e0e0e0' });
        }
    });

    // Registration with OTP Verification
    $("#sign-up-form").submit(function (e) {
        e.preventDefault();

        const userName = $("#user_name").val().trim();
        const phone = $("#phone").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val().trim();
        const otp = $("#otp_input").val().trim();

        if (!userName || !phone || !email || !password || !otp) {
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
                otp: otp
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        title: "Signed In",
                        html: "Redirecting..",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector("b");
                            timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                        },
                        willClose: () => {
                            clearInterval(timerInterval);
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log("I was closed by the timer");
                        }
                    });
                    setTimeout(function () {
                        window.location.href = 'user/index.php';
                    }, 2050);
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




  </body>
</html>
