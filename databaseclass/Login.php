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

$username = $_POST['username'];
$password = $_POST['password'];

if ($_POST){
    $SQLstring = "SELECT * FROM customer WHERE Username='$username' AND Password='$password'";
    $QueryResult = @mysqli_query($conn, $SQLstring);
    $Value = @mysqli_fetch_row($QueryResult);

    if ($Value[0] != '') {
      session_start();
      $_SESSION["username"] = $username;
      $t = [""];
      $_SESSION["total"] = 0;
      $_SESSION["cart"] = $t;
      echo "Hello " . $_SESSION["username"]. ".<br>";
      echo "Success";
    } else {
      echo "Invalid Login";
    }
    mysqli_close($conn);
    echo "<script> location.href='http://localhost/databaseclass/HomePage.html'; </script>";
           exit;
}
?>

<html>

<title>User Login</title>

<head>
<h1>Login</h1>
</head>
<br>

<body>
<form method="post" action="">
  Username: &nbsp<input type="text" name="username" minlength="1" maxlength="40" required>
  <br>
  <br>
  Password: &nbsp<input type="password" name="password" minlength="8" maxlength="20" required>
  <br>
  <br>
  <input type="submit" value="Login">
</form>
</body>
</html>
