<?php
error_reporting(E_ERROR | E_PARSE);
$databaseName = 'project';
$databaseUser = 'root';
$databasePassword = '';
$databaseHost = '127.0.0.1';

$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


Session_start();
Session_destroy();
?>

<html>
<title>Home</title>

<head>
  <h1>Home</h1>
</head>

<body>
  <a href="http://localhost/databaseclass/SearchPage.html">Search</a>
  <br>
  <a href="http://localhost/databaseclass/cart.php">Cart</a>
  <br>
  <a href="http://localhost/databaseclass/Login.php">User Login</a>
  <br>
  <a href="http://localhost/databaseclass/ManagerLogin.php">Manager Login</a>
</body>
</html>
