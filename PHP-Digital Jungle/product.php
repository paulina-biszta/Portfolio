<?php
ob_start();
session_start();
require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Show more</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="CSS/mainstyle.css" rel="stylesheet" type="text/css">
    <link href="CSS/singleproductstyle.css" rel="stylesheet" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
    textarea {
	resize: none;
}
.form-label {
	font-size: 12px;
	color: #6CB857;
	margin: 0;
	display: block;
	opacity: 1;
	-webkit-transition: .333s ease top, .333s ease opacity;
	transition: .333s ease top, .333s ease opacity;
}
.form-control {
	border-radius: 0;
	border-color: #ccc;
   	border-width: 0 0 2px 0;
   	border-style: none none solid none;
   	box-shadow: none;
}
.form-control:focus {
	box-shadow: none;
	border-color: #6CB857;
}
.js-hide-label {
	opacity: 0; 	
}
.js-unhighlight-label {
	color: #999 
}
.btn-start-order {
	background: 0 0 #ffffff;
    border: 1px solid #2f323a;
    border-radius: 3px;
    color: #2f323a;
    font-family: "Raleway", sans-serif;
    font-size: 16px;
    line-height: inherit;
    margin: 30px 0;
    padding: 10px 50px;
    text-transform: uppercase;
    transition: all 0.25s ease 0s;
}
.btn-start-order:hover,.btn-start-order:active, .btn-start-order:focus {
	border-color: #42962B;
	color: #42962B;
}
    </style>
</head>


<body>
<nav id="navbar">
        <ul class="mobilenav">
            <li onclick="mobilemenu()">
                <i class="fa fa-bars"></i>
            </li>
        </ul>

        <ul id="nav">
            <li><a href="<?php
                if( !isset($_SESSION['user' ]) ) {
                    echo("index.php");
                } else{
                    echo("home.php");
                }
            ?>">HOME</a></li>
            <li><a href="indoor.php">INDOOR PLANTS</a></li>
            <li><a href="outdoor.php">OUTDOOR PLANTS</a></li>
            <li><a href="additional.php">ADDITIONAL</a></li>
            <?php
                if( !isset($_SESSION['user' ]) ) {
                    echo("<li id=\"myBtn\"><i class='fas'>&#xf406;</i> LOGIN</li>");
                } else{
                    echo("<li><a href='logout.php?logout'><i  class='fas'>&#xf406;</i> LOGOUT</a></li>
                    <li><a href='cart.php'><i class='fas'>&#xf07a;</i> CART</a></li>");
                }
            ?>
             <li class="nohover"><i class="fa">&#xf002;</i><input type="text" id="search" placeholder="Search" /></li>
        </ul>
        <div id="display"></div>
    </nav>
    <script>
    function mobilemenu() {
        var x = document.getElementById("nav");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    </script>

    <div class="">
        <?php 
  if(isset($_GET['id'])){
    $product_id= $_GET['id'];
   }elseif(isset($_POST['product_id'])){
    $product_id= $_POST['product_id']; 
  }
  $sql = "SELECT * FROM products WHERE product_id = $product_id";
  $result = mysqli_query($conn, $sql);  
  while ($row = mysqli_fetch_assoc($result)) {
   echo '
   <div class="productcontainer">

        <div class="productcontent" >

            <div class="text">
                    <h1 class="verybig"><nobr>' . $row["name"] . '</nobr></h1>
                    <h1>' . $row["name"] . '</h1><p><span class="category">'.$row["category"].'</span></p><p>'.$row["desc"].'</p>';
                    if ($row["rrp"]>0) {
                      echo '<p><span class="discount">-';
                      echo round((100-($row["rrp"]*100)/$row["price"]));
                      echo ' %</span><b><span class="cheaper">'.$row["price"].' €</span> '.$row["rrp"].' €</b>';
                      echo '</p>';
                  } else {
                      echo '<p><b>'.$row["price"].' €</b></p>';
                  }
                  
                
                  if ($row["availability"] == "no") {
                    echo '<div><br><br><span class="notavailable"><i class="fas">&#xf187;</i> out of stock</span><br><br><br><i class="fas">&#xf06a;</i> currently not available, please check again later</div>';
                } else {
                    if( !isset($_SESSION['user' ]) ) {
                        echo('<i class="fas">&#xf06a;</i> <a href="./login.php">Login</a> to buy this Product
                        ');
                      } else{
                          echo('<form action ="actions/insert_cart.php" class="w-30" method="post">
                          <input type="hidden" name= "product_id" value="' . $row["product_id"] . '" />
                          <input type="number" name="quantity" value="1" min="1" max="' . $row["quantity"] . '">ADD ITEM</input>
                          <button type="submit" class="buybutton">ADD TO CART</button></form>');
                      }
                }
              
                  echo '</div>
                          <a class="goback" onClick="javascript:history.go(-1)">&lsaquo; GO BACK</a>
                      </div>

                        <img src="' . $row["img"] . '" class="" alt="...">
                    </div>';
  
  }
?>
<div class="reviews">
        <h1>Reviews</h1>
        <?php 
  $id = $_POST['id'];
  $sql = "SELECT * FROM reviews WHERE page_id = {$product_id}";
  $result = mysqli_query($conn, $sql);  
  while ($row = mysqli_fetch_assoc($result)) {
    $stars = "";
    for($i=0;$i<$row["rating"];$i++){
        $stars .= "★";
    }
   echo '
   <div class="container text-center">
        <div class="card col-8 m-3 mx-auto" >         
            <div class="card-body text-left">
                    <h5 class="card-title">' . $row["name"] . '</h5>
                    <p class="card-text"> ' . $row["content"] .  '</p>
                    <p class="card-text">'.$stars.'</p>
                    <p class="card-text">Date : ' . $row["submit_date"] .  '</p>
            </div>
        </div>
    </div>
      ';
  }
  ?>
        <form action="actions/insert_rev.php" method="POST">
            <div class="row">
                <div class="form-group col">
                    <label for="name">Name</label>
                    <input placeholder="Your name..." type="text" class="form-control" id="name" name="name">

                </div>
                <div class="form-group col">
                    <label for="rating">Rating</label>
                    <select name="rating" id="rating" class="form-control">
                        <option name="rating" value="1">★</option>
                        <option name="rating" value="2">★★</option>
                        <option name="rating" value="3">★★★</option>
                        <option name="rating" value="4">★★★★</option>
                        <option name="rating" value="5">★★★★★</option>
                    </select>

                </div>

            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="content">Your Opinion</label>
                    <textarea placeholder="Your review..." class="form-control" id="content" name="content" rows="5"></textarea>

                </div>
            </div>

            <div class="d-flex flex-column">
                <input type="hidden" name="page_id" value="<?php echo $product_id ?>">
                <button type="submit" value="Submit" name="submit" class="btn btn-start-order">Submit</button>
                <a href="home.php"><button class="btn btn-start-order"
                        type="button">Back</button></a>
            </div>


        </form>
</div>
        <?php
  $query = "SELECT page_id, AVG(rating) FROM reviews WHERE page_id = {$product_id}"; 
	$resultt = mysql_query($conn, $query);
  // Print out result
  while($roww = mysql_fetch_array($resultt)){
    echo  '
    <p>' .$roww['AVG(rating)'] . '</p>';
  }
  ?>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <div>
          <a href="./login.php"><button>Login</button></a>
          <a href="./register.php"><button>Register</button></a>
    </div>
    </div>
    <div class="modal-footer">
    </div>
  </div>

</div>

<script src="./script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">

 <script>
    $(document).ready(function() {
	// Test for placeholder support
    $.support.placeholder = (function(){
        var i = document.createElement('input');
        return 'placeholder' in i;
    })();

    // Hide labels by default if placeholders are supported
    if($.support.placeholder) {
        $('.form-label').each(function(){
            $(this).addClass('js-hide-label');
        });  

        // Code for adding/removing classes here
        $('.form-group').find('input, textarea').on('keyup blur focus', function(e){

            // Cache our selectors
            var $this = $(this),
                $label = $this.parent().find("label");

						switch(e.type) {
							case 'keyup': {
								 $label.toggleClass('js-hide-label', $this.val() == '');
							} break;
							case 'blur': {
								if( $this.val() == '' ) {
                    $label.addClass('js-hide-label');
                } else {
                    $label.removeClass('js-hide-label').addClass('js-unhighlight-label');
                }
							} break;
							case 'focus': {
								if( $this.val() !== '' ) {
                    $label.removeClass('js-unhighlight-label');
                }
							} break;
							default: break;
						}
    </script>

    </script>
</body>

</html>
<?php ob_end_flush(); ?>