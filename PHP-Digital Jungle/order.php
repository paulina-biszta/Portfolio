<?php 
require_once 'dbconnect.php';
session_start();
if ($_POST) {
   $user_id = $_SESSION["user"];

   $sql = "SELECT * FROM cart INNER JOIN users ON cart.fk_user_id=users.user_id
   WHERE fk_user_id={$user_id}";

   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $lqs = "SELECT * FROM cart INNER JOIN products ON cart.fk_product_id=products.product_id
   WHERE fk_user_id={$user_id}";

    $res = $conn->query($lqs);

    $item = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update your personal information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="CSS/mainstyle.css" rel="stylesheet" type="text/css">
    <link href="CSS/singleproductstyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
<h1 class="mt-4" style="color: #065446;">Cart</h1>
<hr>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  <?php		
    foreach ($res as $item){
        
		?> 
    <tr>
      <th scope="row"><img src="<?php echo $item['img'] ?>" style="width: 5vw; height: 5vw; object-fit: cover;"></th>
      <td><?php echo $item['name']; ?></td>
      <td><?php echo $item['price']; ?> €</td>
      <td><?php echo $item['quantity']; ?></td>
    </tr>
    <?php 
    }
   ?>

  </tbody>  
</table> 
<hr>
<?php		
    foreach ($res as $item2){
        $item_price = $item2["quantity"]*$item2["price"];
		$total_quantity += $item2["quantity"];
		$total_price += ($item2["price"]*$item2["quantity"]);
		}
		?>  
 
  <h5 class="text-right" style="color: #065446;"><strong>Total Price: <?php echo "€ ".number_format($total_price, 2); ?></strong></h5>
  <h5 class="text-right" style="color: #065446;"><strong>Total quantity: <?php echo $total_quantity; ?></strong></h5>

  <h3 class="mt-4 mb-4" style="color: #065446;">Shipping address</h3>

<form action="actions/order_up.php" method="POST">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
                          
                        </div>
                        <div class="form-group col">    
                            <label for="category">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $data['surname'] ?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="desc">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['email'] ?>">
                           
                        </div>
                        <div class="form-group col">
                            <label for="price">Street</label>
                            <input type="price" class="form-control" id="street" name="street" value="<?php echo $data['street'] ?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="img">Zip Code</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $data['zipcode'] ?>">
                        </div>
                        <div class="form-group col">
                            <label for="rrp">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $data['city'] ?>">
                            <input type="hidden" class="form-control" id="cart_id" name="cart_id" value="<?php echo $data['cart_id'] ?>">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3 mb-5">
                    <form action="actions/order_up.php" method="POST">
                      <button type="submit" value="Submit" name="submit" style="background-color: #065446;" class="btn text-white text-center"> ORDER </button> 
                      </form>
                    </div>
                </form >

                
<?php
}
?>

</div>

</body>
</html>
