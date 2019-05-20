<?php
error_reporting(E_ERROR | E_PARSE);
$databaseName = 'project';
$databaseUser = 'root';
$databasePassword = '';
$databaseHost = '127.0.0.1';
session_start();

$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_select_db($conn,"project");

$new = $_POST["ISBN"];
array_push($_SESSION["cart"], $new);
$size = sizeof($_SESSION["cart"]);
echo $_SESSION["cart"][$size -1 ] . " was successfully added to your cart.";
 ?>
<html>
 <br><a href="SearchPage.html">Return to Search Page</a><br><br>
  <a href="cart.php">View Cart</a><br><br>
</html>
