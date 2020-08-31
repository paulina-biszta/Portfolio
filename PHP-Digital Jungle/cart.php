<?php 
require_once 'dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="CSS/mainstyle.css" rel="stylesheet" type="text/css">
    <link href="CSS/singleproductstyle.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
<h1 class="mt-4" style="color: #065446;">Cart</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col"></th>
    </tr>
  </thead>
<?php 
  $user_id = $_SESSION["user"];
  $id = $_POST['id'];
  $sql = "SELECT * FROM cart inner join products on cart.fk_product_id=products.product_id WHERE fk_user_id={$user_id}";
  $result = mysqli_query($conn, $sql);  
  while ($row = mysqli_fetch_assoc($result)) {
   
   echo '
   <tbody>
    <tr>
      <th scope="row"><img class="img-thumbnail" src="'.$row["img"].'" style="width: 5vw; height: 5vw; object-fit: cover;"></th>
      <td>' . $row["name"] . '</td>
      <td>' . $row["price"] .  '</td> 
      <td>' . $row["quantity"] .  '</td>
      <td><form action ="actions/delete_prod.php" class="w-52 m-1 text-center" method="post">
          <input type="hidden" name= "cart_id" value="' . $row["cart_id"] . '" />
            <button type="submit" class="btn btn-outline-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg></button>
        </form><td>
    </tr>';
  }
  ?>
  <?php		
    foreach ($result as $item){
        $item_price = $item["quantity"]*$item["price"];
		$total_quantity += $item["quantity"];
		$total_price += ($item["price"]*$item["quantity"]);
		}
		?>  
  <td></td>
  <td></td>
  <td><strong style="color: #065446;">Total Price: <?php echo "€ ".number_format($total_price, 2); ?></strong></td>
  <td><strong style="color: #065446;">Total quantity: <?php echo $total_quantity; ?></strong></td>
  <td class="text-center"><form action="order.php" method="POST">
                      <button type="submit" value="Submit" name="submit" style="background-color: #065446;" class="btn text-white text-center"> ORDER NOW </button> 
                      </form>
</td>
  </tbody>
</table>
        <a class="goback" href="home.php">&lsaquo; GO BACK</a>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    </body>
    </html>