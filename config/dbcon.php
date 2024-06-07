<?php 

define('DB_SERVER', "localhost"); // Define the database connection constants here
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "product_info");

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>