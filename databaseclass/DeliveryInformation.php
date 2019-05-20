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

$fname = $_POST['firstname2'];
$lname  = $_POST['lastname2'];
$address = $_POST['del_address'];
$state = $_POST['state2'];
$zip = $_POST['zipcode2'];
$ship = $_POST['shipping'];

if ($_POST){
mysqli_select_db($conn, "project");
$SQLstring = "INSERT INTO delivery VALUES ('$fname', '$lname', '$address','$state','$zip','$ship')";

$result = mysqli_query($conn, $SQLstring) or die(mysqli_error());

if ($result === TRUE) {
    $_SESSION["firstname2"] = $fname;
    $_SESSION["lastname2"] = $lname;
    $_SESSION["del_address"] = $address;
    $_SESSION["state2"] = $state;
    $_SESSION["zipcode2"] = $zip;
    $_SESSION["shipping"] = $ship;
    echo "New record created successfully";
} else {
    echo "Error: " . $SQLstring . "<br>" . $conn->error;
}
mysqli_close($conn);
echo "<script> location.href='http://localhost/databaseclass/ConfirmOrder.php'; </script>";
       exit;
}
?>

<html>
<title>Delivery</title>

<head>
<h1>Insert a shipping method</h1>
</head>
<script>
function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
</script>
<br>

<body>
<h3>Delivery Information</h3>
<form method="post" action="">
  First Name: &nbsp<input type="text" name="firstname2" minlength="1" maxlength="20" required>
  <br>
  <br>
  Last Name: &nbsp <input type="text" name="lastname2" minlength="1" maxlength="20" required>
  <br>
  <br>
  Delivery Address: &nbsp <input type="text" name="del_address" minlength="1" maxlength="100" required>
  <br>
  <br>
  State: &nbsp <select name="state2" required>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
  <br>
  <br>
  Zip Code: &nbsp <input type="text" name="zipcode2" onkeypress="return isNumberKey(event)" minlength="5" maxlength="5" required>
  <br>
  <br>
  Shipping type: &nbsp <select name="shipping" required>
    <option value="ground">Ground</option>
    <option value="express">Express</option>
  </select>
  <br>
  <br>
  <input type="submit" value="Next">
</form>
</body>
</html>
