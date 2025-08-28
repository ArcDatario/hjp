<?php 
include "admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>Reset Password - Atrana</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
      rel="stylesheet"
      href="assets/modules/bootstrap-5.1.3/css/bootstrap.css"
    />
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Boostrap Icon-->
    <link
      rel="stylesheet"
      href="assets/modules/bootstrap-icons/bootstrap-icons.css"
    />

    
    <style>
    .form-group input.error {
      box-shadow: 0 0 5px red;
    }

    .form-group input.success {
      box-shadow: 0 0 5px green;
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
    <div id="auth">
      <div class="row h-100">
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-left"></div>
        </div>
        <div class="col-lg-5 col-12">
          <div id="auth-right">
            <div class="auth-logo">
              <a href="index.php"
                ><img src="assets/images/logo.png" alt="Logo" /> HJP</a
              >
            </div>
            <h1 class="auth-title">Reset Password</h1>
            <p class="auth-subtitle mb-5">
              Enter a new password
            </p>

            <form action="update_password.php" method="post" id="update_password_form">
  <div class="form-group position-relative has-icon-left mb-4">
    <input
      type="hidden"
      class="form-control form-control-xl"
      placeholder="Email"
      name="user_id"
      value="<?php echo $_SESSION['user_id']; ?>"
    />
    <div class="form-control-icon">
      <i class="bi bi-envelope"></i>
    </div>
  </div>

  <div class="form-group position-relative has-icon-left mb-4">
    <input
      type="password"
      class="form-control form-control-xl"
      placeholder="New Password"
      name="pass_word"
      id="new-password"
      required
    />
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
    <label id="password-match-label" style="color: red; display: none;">Passwords do not match</label>
  </div>

  <div class="form-group position-relative has-icon-left mb-4">
    <input
      type="password"
      class="form-control form-control-xl"
      placeholder="Confirm Password"
      id="confirm-password"
      required
    />
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
  </div>

  <button type="submit" id="save_btn" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
    Save
  </button>
</form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                Remember your account?
                <a href="auth-login.php" class="font-bold">Log in</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>




<script>
 

 const newPasswordInput = document.getElementById('new-password');
  const confirmPasswordInput = document.getElementById('confirm-password');

  confirmPasswordInput.addEventListener('input', function() {
    if (newPasswordInput.value !== confirmPasswordInput.value) {
      confirmPasswordInput.classList.add('error');
      confirmPasswordInput.classList.remove('success');
    } else {
      confirmPasswordInput.classList.remove('error');
      confirmPasswordInput.classList.add('success');
    }
  });

</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- General JS Scripts -->
    <script src="assets/js/atrana.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/jquery/jquery.min.js"></script>
    <script src="assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/modules/popper/popper.min.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
