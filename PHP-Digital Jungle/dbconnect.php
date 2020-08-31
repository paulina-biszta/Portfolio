<?php
// this will avoid mysql_connect() deprecation error.
/*error_reporting( ~E_DEPRECATED & ~E_NOTICE );
define ('DBHOST', '173.212.235.205');
define('DBUSER', 'bisztaco_user');
define('DBPASS', 'CodeFactory2020"');
define ('DBNAME', 'bisztaco_plants');
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}*/
    $serverName= "173.212.235.205";
    $userName= "bisztaco_user";
    $password= "CodeFactory2020";
    $dbName= "bisztaco_plants";
    $conn= mysqli_connect($serverName,$userName,$password,$dbName);
?>