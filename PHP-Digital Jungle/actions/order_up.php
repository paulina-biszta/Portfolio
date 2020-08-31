<?php require_once '../dbconnect.php'; 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<?php 

if ($_POST) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $user_id = $_SESSION["user"];


$sql = "UPDATE users
SET `name`='$name', surname='$surname', `email`='$email', street='$street', `zipcode`='$zipcode', `city`='$city' WHERE user_id={$user_id}";

    $fk_user_id = $_SESSION["user"];
    $fk_cart_id = $_POST['cart_id'];
   
   $l= "INSERT INTO `order` (fk_user_id, fk_cart_id) VALUES ('$fk_user_id', '$fk_cart_id')";


   if($conn->query($sql) === TRUE && $conn->query($l)=== TRUE) {
    
    $to      = $_POST['email'];
    $subject = 'Your Order';
    $message = $message = '
    <html>
    <head>
     
    </head>
    <body> 
    <h3>Thank you for your order ' . $name . ' !</h3>
      <h5>We are taking care of your order. We will inform you when it is ready to be shipped.</h5>
      <h5>Let\'s be in touch</h5>
      <br>
      <p>Digital Jungle Team</p>
    </body>
    </html>
    ';
    
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: DIGITAL JUNGLE <shop@example.com>';

mail($to, $subject, $message, implode("\r\n", $headers));

       echo '
       <div class="container-fluid text-center p-5">
       <h1 class="p-5 m-5">Successfully ordered!!</h1>
       <a href="../home.php"><button class="btn bg-success text-white m-5 p-2 w-25" type="button">Back</button></a>
       </div>
       ' ;  
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();
}

?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>