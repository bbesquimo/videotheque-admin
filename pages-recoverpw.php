<?php
// Initialize the session
// session_start();
 
// // Check if the user is logged in, otherwise redirect to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: sign-in.php");
//     exit;
// }
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: sign-in.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $mysqli->close();
}
?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Streamit  - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/../assets/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="../assets/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="../assets/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="../assets/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
      <section class="sign-in-page">
         <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
               <div class="col-md-6 col-sm-12 col-12 ">
                  <div class="sign-user_card ">
                     <div class="sign-in-page-data">
                        <div class="sign-in-from w-100 m-auto">
                        <h2>Reset Password</h2>
                        <p>Please fill out this form to reset your password.</p>
                           <form class="mt-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                              <div class="form-group">
                                 <label>New Password</label>
                                 <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                                 <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                              </div>
                              <div class="form-group">
                                 <label>Confirm Password</label>
                                 <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                                 <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                              </div>
                              <div class="d-inline-block w-100">
                                 <input type="submit" class="btn btn-primary" value="Submit">
                                 <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
        <!-- Sign in END -->
         
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/popper.min.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="../assets/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="../assets/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="../assets/js/waypoints.min.js"></script>
      <script src="../assets/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="../assets/js/wow.min.js"></script>
      <!-- Slick JavaScript -->
      <script src="../assets/js/slick.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="../assets/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="../assets/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="../assets/js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="../assets/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="../assets/js/custom.js"></script>
   </body>
</html>