<?php require_once '../dbconnect.php';
session_start();

if ($_POST) {
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user'];
   $sql1= "INSERT INTO cart (`quantity`, `fk_product_id`, `fk_user_id`) VALUES ($quantity, $product_id, $user_id)";
if ( $conn->query($sql1) === TRUE ) {
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    // Redirect
    header("Location: https://biszta.codefactory.live/cart.php");
} else  {
   echo "Error " . $sql1 . ' ' . $conn->connect_error;
}
$conn->close();
}
?>