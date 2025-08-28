<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="post" action="login.php"  id="log-in-form" >
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Have a Great Day! </p>
          </form>
          <form class="sign-up-form" method="post" action="sign_up.php"  id="sign-up-form">
    <h2 class="title">Sign up</h2>
    <div class="input-field">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username" name="user_name" />
    </div>
    <div class="input-field">
        <i class="fas fa-solid fa-phone"></i>
        <input type="text" placeholder="Phone #" name="phone" />
    </div>
    <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" name="email" />
    </div>
    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="password" />
    </div>
    <input type="submit" class="btn" value="Sign up" id="sign_up_btn" />
    <p class="social-text">Hello! Welcome Let's get Started</p>
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

    <script src="sign-up.js"></script>



<script>


</script>
  </body>
</html>
