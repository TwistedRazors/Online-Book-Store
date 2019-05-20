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

$id_number = 0;
$track_number = 0;
echo"
<script>
function rand(){
 return Math.round(Math.random() * 1000000000);
}
</script>";
$username=$_SESSION["username"];
$id_number = rand();
$track_number = rand();


mysqli_select_db($conn, "project");
$SQLstring = "INSERT INTO purchase (User, Id_no, Track_no) VALUES ('$username', '$id_number', '$track_number')";
$result = mysqli_query($conn, $SQLstring) or die(mysqli_error());


echo "<script> location.href='http://localhost/databaseclass/OrderPlaced.html'; </script>";
       exit;

?>
<html>
<title>Confirm Order</title>

<head>
<h1>Confirm your information</h1>
</head>
<body>
<div>
<h3>Billing Information: </h3>
<br>
<?php
echo "First Name: ".$_SESSION["firstname"]."<br>";
echo "Last Name: ".$_SESSION["lastname"]."<br>";
echo "Billing Address: ".$_SESSION["billing_address"]."<br>";
echo "State: ".$_SESSION["state"]."<br>";
echo "Zip: ".$_SESSION["zipcode"]."<br>";
echo "Card Number: ".$_SESSION["card_no"]."<br>";
?>
</div>
<br>
<br>
<div>
  <h3>Shipping Information: </h3>
  <br>
  <?php
  echo "First Name: ".$_SESSION["firstname2"]."<br>";
  echo "Last Name: ".$_SESSION["lastname2"]."<br>";
  echo "Billing Address: ".$_SESSION["del_address"]."<br>";
  echo "State: ".$_SESSION["state2"]."<br>";
  echo "Zip: ".$_SESSION["zipcode2"]."<br>";
  echo "Shipping type: ".$_SESSION["shipping"]."<br>";
  ?>
  </div>
  <br>
  <br>
  <form action = "" method = "post">
   <input type = "submit" name = "Confirm Order">
 </form>
</body>
</html>
