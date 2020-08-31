<?php
//Including Database configuration file.
include 'dbconnect.php';
//Getting value of "search" variable from "script.js".
if (isset($_POST['search'])) {
//Search box value assigning to $Name variable.
   $Name = $_POST['search'];
//Search query.
   $Query = "SELECT * FROM products WHERE name like '%$Name%' or category like '%$Name%'";
//Query execution
 $ExecQuery = mysqli_query($conn, $Query);
//Creating unordered list to display result.
   echo '
<div class="searchresult">
   ';
   //Fetching result from database.
   while ($Result = mysqli_fetch_array($ExecQuery)) {
       ?>
   <div class="singlesearch">
   <img src="<?php echo $Result['img']; ?>">
   <a href="./product.php?id=<?php echo $Result['product_id']; ?>">
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
       <?php echo $Result['name']; ?>
   </a>
   </div>
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
   <?php
}}
?>
</div>