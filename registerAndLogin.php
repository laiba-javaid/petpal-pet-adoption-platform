<?php
// Check if the 'status' parameter is set in the URL query string
if (isset($_GET['status']) && $_GET['status'] == 'logged_out') {
    echo '<div class="alert alert-success" role="alert">
            You have been logged out successfully.
          </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | PetPal</title>
    <link rel="stylesheet" href="/PetPal/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>



  </head>
  <body>
    <section id="register-section">
      <div class="register-container" id="register-container">
        <div class="form-container sign-up">
          <form id="signupForm" action="process_signup.php" method="post">
            <h2>Create Account</h2>
            <div class="social-icons">
              <a href="#" class="icon"
                ><i class="fa-brands fa-google-plus-g"></i
              ></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
            </div>
            <span>or use your email for registeration</span>
            <div class="input-field"><i class="fa fa-user" aria-hidden="true"></i><input type="text" name="username" placeholder="Name" /></div>
            
            <div class="input-field"><i class="fa fa-envelope" aria-hidden="true"></i>
              <input type="email" name="email" placeholder="Email" /></div>
            <div class="input-field"><i class="fa fa-lock" aria-hidden="true"></i><input type="password" name="password" placeholder="Password" /></div>
            <button>Sign Up</button>
          </form>
        </div>
        <div class="form-container sign-in">
          <form id="loginForm" action="process_login.php"  method="post">
            <h2>Sign In</h2>
            <div class="social-icons">
              <a href="#" class="icon"
                ><i class="fa-brands fa-google-plus-g"></i
              ></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-facebook-f"></i
              ></a>
              <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
              <a href="#" class="icon"
                ><i class="fa-brands fa-linkedin-in"></i
              ></a>
            </div>
            <span>or use your email password</span>
            <div class="input-field"><i class="fa fa-envelope" aria-hidden="true"></i>
              <input type="email" name="email" placeholder="Email" /></div>           
            <div class="input-field"><i class="fa fa-lock" aria-hidden="true"></i><input type="password" name="password" placeholder="Password" /></div>
            <a href="#">Forget Your Password?</a>
            <button>Sign In</button>
          </form>
        </div>
        <div class="toggle-container">
          <div class="toggle">
            <div class="toggle-panel toggle-left">
              <h2>Welcome Back!</h2>
              <p>Enter your personal details to use all of site features</p>
              <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
              <h2>Hello, Friend!</h2>
              <p>
                Register with your personal details to use all of site features
              </p>
              <button class="hidden" id="register">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </section>
   


    
    <script src="/PetPal/assets/js/App.js"></script>
   
  </body>
</html>
