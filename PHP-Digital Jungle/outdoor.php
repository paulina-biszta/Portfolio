<?php
ob_start();
session_start();
require_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>DIGITAL JUNGLE</title>
<!-- <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=z2xyMKGdQrnnLod3rw79gMdSYqL8hr0s2SkGKkeyahFddBDZhTpg8BxH13OqWUT-DQdP2evzZWbZff90nXnRxw" charset="UTF-8"></script><script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="CSS/mainstyle.css">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap&libraries=&v=weekly" defer></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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

<section>



  <h1 class="title">ALL OUTDOOR PLANTS</h1>

  <div class="product-container">
  <?php
     $resProd = "SELECT * FROM products WHERE category='cactus'";

     $result = mysqli_query($conn, $resProd);
     // fetch the next row (as long as there are any) into $row
     while ($row = mysqli_fetch_assoc($result)) {

        echo '
        
        <div id="' . $row["product_id"] . '" class="product">
            <img src="'.$row["img"].'">
            <h1><a href="./product.php?id=' . $row["product_id"] . '">'.$row["name"].'</a></h1>';
            
            
  if ($row["rrp"]>0) {
      echo '<p><span class="category">'.$row["category"].'</span><br><br><b><span class="cheaper">'.$row["price"].' €</span> '.$row["rrp"].' €</b><span class="discount">-';
      echo round((100-($row["rrp"]*100)/$row["price"]));
      echo ' %</span></p>';
  } else {
      echo '<p><span class="category">'.$row["category"].'</span><br><br><b>'.$row["price"].' €</b></p>';
  }

  if ($row["availability"] == "no") {
      echo '<span class="notavailable"><i class="fas">&#xf187;</i> out of stock</span>';
  }              
  echo '</div>';
     }
   ?>
      
  </div>


  <footer>

<h1>&copy; COPYRIGHT <b>TEAM 8</b><br>
content & images copied from www.thesill.com</h1>
<img class="plant" src="./images/plant.png">

</footer>


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

</section>
<script src="./script/script.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>