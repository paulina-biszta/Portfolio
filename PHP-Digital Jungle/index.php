<?php require_once 'dbconnect.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>DIGITAL JUNGLE</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<!-- <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=z2xyMKGdQrnnLod3rw79gMdSYqL8hr0s2SkGKkeyahFddBDZhTpg8BxH13OqWUT-DQdP2evzZWbZff90nXnRxw" charset="UTF-8"></script> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <link rel="stylesheet" href="CSS/mainstyle.css">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap&libraries=&v=weekly" defer></script>
  <script type="text/javascript" src="ajax.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

 <script>
    function initMap() {

        // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        var styledMapType = new google.maps.StyledMapType(
            [{
                    elementType: 'geometry',
                    stylers: [{
                        color: '#ebe3cd'
                    }]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#523735'
                    }]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#f5f1e6'
                    }]
                },
                {
                    featureType: 'administrative',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#c9b2a6'
                    }]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#dcd2be'
                    }]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#ae9e90'
                    }]
                },
                {
                    featureType: 'landscape.natural',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#dfd2ae'
                    }]
                },
                {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#dfd2ae'
                    }]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#93817c'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry.fill',
                    stylers: [{
                        color: '#a5b076'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#447530'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#f5f1e6'
                    }]
                },
                {
                    featureType: 'road.arterial',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#fdfcf8'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#f8c967'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#e9bc62'
                    }]
                },
                {
                    featureType: 'road.highway.controlled_access',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#e98d58'
                    }]
                },
                {
                    featureType: 'road.highway.controlled_access',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#db8555'
                    }]
                },
                {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#806b63'
                    }]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#dfd2ae'
                    }]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#8f7d77'
                    }]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#ebe3cd'
                    }]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#dfd2ae'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry.fill',
                    stylers: [{
                        color: '#b9d3c2'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#92998d'
                    }]
                }
            ], {
                name: 'Styled Map'
            });

        // Create a map object, and include the MapTypeId to add
        // to the map type control.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 48.210033,
                lng: 16.363449
            },
            zoom: 11,
            mapTypeControlOptions: {
                mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                    'styled_map'
                ]
            }
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
        var iconBase =
            './images/';

        var icons = {
            plant: {
                icon: iconBase + 'mapsicon.png'
            }
        };

        var features = [
          {
            position: new google.maps.LatLng(48.210033, 16.361549),
            type: 'plant'
        },{
            position: new google.maps.LatLng(48.200099, 16.311599),
            type: 'plant'
        },{
            position: new google.maps.LatLng(48.310033, 16.483149),
            type: 'plant'
        },{
            position: new google.maps.LatLng(48.210033, 16.761449),
            type: 'plant'
        },{
            position: new google.maps.LatLng(48.310033, 16.113489),
            type: 'plant'
        },{
            position: new google.maps.LatLng(48.219033, 16.163249),
            type: 'plant'
        }
        ];

        // Create markers.
        for (var i = 0; i < features.length; i++) {
            var marker = new google.maps.Marker({
                position: features[i].position,
                icon: icons[features[i].type].icon,
                map: map
            });
        };
    }
    </script>

</head>

<body>

  <header>
      <img class="heroplant1" src="./images/heroplant.png">
      <img class="heroplant2" src="./images/heroplant2.png">
      <div class="heading">
        <h1 class="back">DIGITAL</h1>
        <h1 class="front">JUNGLE</h1>
      </div>
    </header>


    <nav id="navbar">
        <ul class="mobilenav">
            <li onclick="mobilemenu()">
                <i class="fa fa-bars"></i>
            </li>
        </ul>

        <ul id="nav">
            <li><a href="index.php">HOME</a></li>
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

  <div class="grid-container">

            <div class="item1 item">
                <div id="map"></div>
                <h1>OUR STORES IN VIENNA</h1>
            </div>

            <div class="item2 item">
                <img src="./images/cactus.jpeg">
                <h1><a href="./outdoor.php">SUCCULENTS AND CACTUS</a></h1>
            </div>

            <div class="item3 item">
                <img src="./images/care.jpeg">
                <h1><a href="./additional.php">KEEP THE PLANTS HAPPY!</a></h1>
            </div>

            <div class="item4 item">
                <img
                    src="https://images.unsplash.com/photo-1559239115-ce3eb7cb87ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2179&q=80">
                <h1><a href="./contact.html">CONTACT US</a></h1>
            </div>

            <div class="item5 item">
                <div class="item">
                    <h1><button id="myBtn2"><span>JOIN</span></button>OUR FAMILY</h1>
                </div>
            </div>

            <div class="item6 item">
                <img src="./images/room.jpeg">
                <h1><a href="./indoor.php">INDOOR PLANTS</a></h1>
            </div>

        </div>



  <h1 class="title">SHOP</h1>
  <img class="plant2" src="./images/plant2.png">

  <div class="product-container">
  <?php
      $resProd = "SELECT * FROM products";

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


  <h1 class="title">ABOUT <b>DIGITAL JUNGLE</b></h1>



  <div class="about">
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
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