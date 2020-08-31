<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $pass = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 echo $row['user_id'];
  if( $count == 1 && $row['pass' ]==$pass ) {
   if($row['status'] == 'user'){
    $_SESSION['user'] = $row['user_id'];
    header( "Location: home.php");
   }else if($row['status']== 'admin'){

    $_SESSION['admin'] = $row['user_id']; 
    //$_SESSION["admin"] == $row["userId"];
     header("Location: admin.php");
   }
  
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>


<div class="container  mt-sm-5">
        <div class="row d-flex justify-between mt-3 mb-3 ">
            <div class="col-md-6 col-10 mx-auto">
                <h2>We missed you</h2 >
                
                <p>Did you know that we have news since the last time you were with us? We hope you enjoy it!</p>
                <br>
            </div>
            <div class="col-md-3  col-6 text-right mx-auto" >
                <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
                    <h5 class="ml-2" >Sign In.</h5 >
                    <hr />
                        <?php
                        if ( isset($errMSG) ) {
                            echo  $errMSG;
                        ?>
                        <?php } ?>
                    <input type="email" name="email"  class="form-control m-1" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" />
                    <span class="text-danger"><?php  echo $emailError; ?></span >
                    <input  type="password" name="pass"  class="form-control m-1" placeholder ="Your Password" maxlength="15"  />
                    <span  class="text-danger"><?php  echo $passError; ?></span>
                    
                    <button class = "btn btn-block btn-secondary form-control m-1" type="submit" name= "btn-login">Sign In</button>
                    <hr />

                    <a  href="register.php" style>Sign Up Here...</a>

                </form>
            </div>
         </div>
      </div>

</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

<?php ob_end_flush(); ?>