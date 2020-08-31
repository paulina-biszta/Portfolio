<?php
ob_start();
session_start();
require_once 'dbconnect.php';

//if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
// echo $_SESSION['admin'] ;
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
    header("Location: home.php");
    exit;
}
// select logged-in users details
$review=false;
$products=false;
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html >
<head>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

<nav class="navbar m-0 navbar-expand-lg navbar-white bg-white  mb-sm-5">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" value="all" href="admin.php">All products</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" value="indoor" href="admin.php?type=indoor">Indoor Plants</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" value="cactus" href="admin.php?type=cactus">Cactus and Succulents</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" value="others" href="admin.php?type=others">Others</a>
                                      
                    </div>
                </li>
                <li class="nav-item">
                <a class="nav-link text-dark" value="reviews" href="admin.php?type=review">Reviews</a>
                </li>
        </div>
</nav>

        <div id="plantContent" class="container mt-sm-5 ">
            <div id="message" class="row">
            <?php
            if(isset($_GET["type"])){
              $selectedFilter = $_GET["type"];
            }else {
              $selectedFilter = "all";
            }

            
            switch ($selectedFilter) {
                case 'indoor':
                    $typeQ= 'SELECT * FROM `products` WHERE `category` = "indoor"';
                    $plant=mysqli_query($conn, $typeQ);
                    $products=true;
                    break;
                case 'cactus':
                    $typeQ= 'SELECT * FROM `products` WHERE `category` = "cactus"';
                    $plant=mysqli_query($conn, $typeQ);
                    $products=true;
                    break;
                case "others":
                    $typeQ= 'SELECT * FROM `products` WHERE `category` = "others"';
                    $plant=mysqli_query($conn, $typeQ);
                    $products=true;
                    break;
                case "review":
                  $typeR= 'SELECT reviews.id, reviews.content, reviews.name, reviews.rating, products.img FROM reviews INNER JOIN products ON reviews.page_id=products.product_id';
                  $rev=mysqli_query($conn, $typeR);
                  $review=true;
                    break;
                default:
                    $typeQ= 'SELECT * FROM `products`';
                    $plant=mysqli_query($conn, $typeQ);
                    $products=true;
            }
            
                      

            ?>
        </div>


<body style="background-color:rgba(207,228,164)">
<div class="container-fluid">
<div class="d-flex flex-row bd-highlight align-items-center justify-content-end"> 
    <h5 class="mr-3 mt-3 text-dark">Hi <?php echo $userRow['name' ]; ?></h5>
    <a href="logout.php?logout"><button type="button" class="btn bg-success text-white mt-3 mr-3">Log out</button>
</div>
</div>
             
  <div class="container-fluid">
    <div class="d-flex flex-row bd-highlight align-items-center justify-content-center"> 
   
      <div class="text-center bd-highlight">
	      <a href="create.php"><button type="button" class="btn bg-success text-white mb-3 mt-3 mr-3">Add new plant</button></a>
      </div>
    </div>
		 
    <div id="plantContent" class="container mt-sm-5 ">
  <div id="message" class="row">
  <?php
                // $resProd = "SELECT * FROM products";
          
                // $result = mysqli_query($conn, $resProd);
                
          // fetch the next row (as long as there are any) into $row
          if ($review==true) {
           
          
          while ($rowR = mysqli_fetch_assoc($rev)) {
            echo '

            <div class="plants text-center mx-auto card mb-3 p-1" style="width: 20rem;">
            
              <div class="card-body pb-0">
              <ul class=" p-0" style="list-style-type: none;">
               <li><strong>'.$rowR["name"].'</strong></li>
                  <br>
                <li>'.$rowR["content"].'</li>
                <br>
                <li>Rate: '.$rowR["rating"].'</li>
                <br>
                <img class="card-img-top justify-center" src="'.$rowR["img"].'"style="width:13.4rem; height:17rem;">
             </ul>
              </div>
              <form action ="actions/delete_review.php" class="w-52 m-1 text-center" method="post">
                <input type="hidden" name= "id" value="' . $rowR["id"] . '" />
                  <button type="submit" class="btn btn-outline-danger">DELETE</button>
              </form>
	
          </div>

          ';

          }
        }

        if($products==true) {
                while ($row = mysqli_fetch_assoc($plant)) {
          
          echo '
    <div class="plants text-center mx-auto card mb-3 p-1" style="width: 20rem;">
      <img class="card-img-top align-center" src="'.$row["img"].'"style="width:19.4rem; height:25rem;">
        <div class="card-body pb-0">
        <ul class=" p-0" style="list-style-type: none;">
	        <li><strong>'.$row["name"].'</strong></li>
	          <br>
          <li>'.$row["desc"].'</li>
          <br>
	        <li>Price: '.$row["price"].'</li>
          <li>Discount price: '.$row["rrp"].'</li>
          <li>Available: '.$row["availability"].'</li>
        </ul>
        </div>
        <form action ="actions/delete.php" class="w-52 m-1 text-center" method="post">
          <input type="hidden" name= "product_id" value="' . $row["product_id"] . '" />
            <button type="submit" class="btn btn-outline-danger">DELETE</button>
        </form>
      
        <form action ="update.php" class="w-52 m-1 text-center" method="post">
          <input type="hidden" name= "product_id" value="' . $row["product_id"] . '" />
            <button type="submit" class="btn btn-outline-success">UPDATE</button>
        </form>		
    </div>
    <br>
';
      }
    }
      // Free result set
      //mysqli_free_result($result);
      // Close connection
      mysqli_close($conn);
      ?>
		
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>