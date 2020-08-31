<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);
  // strip_tags — strips HTML and PHP tags from a string
  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
  // sanitize user input to prevent sql injection
  $surname = trim($_POST['surname']);
  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $surname = strip_tags($surname);
  // strip_tags — strips HTML and PHP tags from a string
  $surname = htmlspecialchars($surname);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);
 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 $street = trim($_POST['street']);
 $street = strip_tags($street);
 $street = htmlspecialchars($street);
 $zipcode = trim($_POST['zipcode']);
 $zipcode = strip_tags($zipcode);
 $zipcode = htmlspecialchars($zipcode);
 $city = trim($_POST['city']);
 $city = strip_tags($city);
 $city = htmlspecialchars($city);
  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }
 // basic surname validation
 if (empty($surname)) {
    $error = true ;
    $surnameError = "Please enter your full surname.";
   } else if (strlen($surname) < 3) {
    $error = true;
    $surnameError = "Surname must have at least 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/",$surname)) {
    $error = true ;
    $surnameError = "Surname must contain alphabets and space.";
   }
 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }
 // password hashing for security
 $pass = hash('sha256' , $pass);

 // street validation
 if (empty($street)){
   $error = true;
   $streetError = "Please enter street.";
  } else if(strlen($street) < 3) {
   $error = true;
   $streetError = "Street must have atleast 6 characters." ;
  }
 // zipcode validation
 if (empty($zipcode)){
   $error = true;
   $zipError = "Please enter zipcode.";
  } else if(strlen($zipcode) < 3) {
   $error = true;
   $zipError = "Street must have atleast 3 characters." ;
  }
  // zipcode validation
 if (empty($city)){
   $error = true;
   $cityError = "Please enter city.";
  } else if(strlen($city) < 3) {
   $error = true;
   $cityError = "City must have atleast 3 characters." ;
  }
 
 
 // if there's no error, continue to signup
 if( !$error ) {
 
  $query = "INSERT INTO users(`name`,surname,email,`pass`,street,zipcode,city) VALUES('$name','$surname','$email','$pass','$street',$zipcode,'$city')";
  $res = mysqli_query($conn, $query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
   unset($surname);
    unset($email);
   unset($pass);
   unset($street);
   unset($zipcode);
   unset($city);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
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
<body style="background:linear-gradient(white, white, rgba(162,202,78, 0.8), white);">

<div class="bg pictureback d-none d-lg-block d-xl-block pb-0 mb-0">
  <h1 class="display-2 text-center text-white">Join our family</h1>
</div>

<div class="col d-flex text-center mt-3 mb-0 pb-0">
   <div class="row-md-6 row-10 mx-auto text-center mb-0 pb-0">
      <h2>Better deals for registered members!</h2 >
         <p>We are a big family of plant lovers. We look forward to sending you your next housemate...<br>
         To have access to discounts and shopping, please register or log in.</p>
   </div>
</div>

<div class="row-md-3 row-6 text-center mx-auto mt-0 pt-0" >
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >         
      <?php
         if ( isset($errMSG) ) {
      ?>
      <div  class="alert m-0 text-center alert-<?php echo $errTyp ?>" >
         <?php echo  $errMSG; ?>
      </div>
      <?php } ?>  
      
      <div class="row justify-content-center pb-4">
         <div class="col-6 justify-content-center mt-0 p-4 rounded" style="rgba(177, 237, 121, 0.7);">
            <h1 class="mb-4 text-center">Sign Up!</h1>
            <input type ="text"  name="name"  class ="form-control mb-2"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>"  />
               <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
            <input type ="text"  name="surname"  class ="form-control mb-2"  placeholder ="Enter Surname"  maxlength ="50"   value = "<?php echo $surname ?>"  />
               <span   class = "text-danger" > <?php   echo  $surnameError; ?> </span >
            <input   type = "email"   name = "email"   class = "form-control  mb-2"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>"  />
               <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
            <input   type = "password"   name = "pass"   class = "form-control  mb-2"   placeholder = "Enter Password"   maxlength = "25"  />  
               <span   class = "text-danger" > <?php   echo  $passError; ?> </span >
            <input type ="text"  name="street"  class ="form-control mb-2"  placeholder ="Enter Street"  maxlength ="70"   value = "<?php echo $street ?>"  />      
               <span   class = "text-danger" > <?php   echo  $streetError; ?> </span >
            <input type ="text"  name="zipcode"  class ="form-control mb-2"  placeholder ="Enter Zip Code"  maxlength ="10"   value = "<?php echo $zipcode ?>"  />
               <span   class = "text-danger" > <?php   echo  $zipcodeError; ?> </span >
            <input type ="text"  name="city"  class ="form-control mb-2"  placeholder ="Enter City"  maxlength ="30"   value = "<?php echo $city ?>"  />
               <span   class = "text-danger" > <?php   echo  $cityError; ?> </span >    
            <button   type = "submit"   class = "btn btn-block btn-success mt-2"   name = "btn-signup" >Sign Up</button >
           <br>
               <div class="text-center">
                  <a class="text-white bg-dark form-control"  href = "index.php" >Sign in Here...</a>
               </div>
   </form>  
</div>                 
     
         

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
 </body >

</html >
<?php  ob_end_flush(); ?>