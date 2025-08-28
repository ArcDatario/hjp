<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>Login - Atrana</title>


    <link
      rel="stylesheet"
      href="assets/modules/bootstrap-5.1.3/css/bootstrap.css"
    />

 
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
      rel="stylesheet"
      href="assets/modules/bootstrap-icons/bootstrap-icons.css"
    />
  </head>
  <body>
    <div id="auth" style="">
      <div class="row h-100">
        <div class="col-lg-7 d-none d-lg-block" >
        <div style="background-image: url('images/hjp_banner.png'); background-size: cover; background-position: center; height: 100%; width: 100%;">
    <!-- Content goes here -->
</div>

        </div>
        <div class="col-lg-5 col-12">
          <div id="auth-right">
            <div class="auth-logo">
              <a href="index.php"
                ><img src="images/hjp_remove_bg.png" alt="Logo" /></a
              >
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">
              Log in with your Account 
            </p>

            <form action="admin_login.php" method="post" id="log-in-form">
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="text"
                  class="form-control form-control-xl"
                  placeholder="Username"
                  name="user_name"
                  id="username"
                />
                <div class="form-control-icon">
                  <i class="bi bi-person"></i>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left mb-4">
                <input
                  type="password"
                  class="form-control form-control-xl"
                  placeholder="Password"
                  id="pass_word"
                  name="pass_word"
                />
                <div class="form-control-icon">
                  <i class="bi bi-shield-lock"></i>
                </div>
              </div>
              <div class="form-check form-check-lg d-flex align-items-end">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label
                  class="form-check-label text-gray-600"
                  for="flexCheckDefault"
                >
                  Keep me logged in
                </label>
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                Log in
              </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">
                HJp Admin Login Workspace
                <a href="#" class="font-bold">Hjp</a>.
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>




<script>
  $(document).ready(function(){
    $('#log-in-form').submit(function(e){
        e.preventDefault();
        if ($('#username').val().trim() === '' || $('#pass_word').val().trim() === '') {
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
            url: "admin_login.php",
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
                        window.location.href = 'index.php';
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
