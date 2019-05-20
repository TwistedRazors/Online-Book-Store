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

$id = $_POST['manager_id'];
$password = $_POST['password'];

if ($_POST){
    $SQLstring = "SELECT * FROM manager WHERE Manager_id='$id' AND Password='$password'";
    $QueryResult = @mysqli_query($conn, $SQLstring);
    $Value = @mysqli_fetch_row($QueryResult);

    if ($Value[0] != '') {
      session_start();
      echo "Success";
    } else {
      echo "Invalid Login";
    }
    mysqli_close($conn);
    echo "<script> location.href='http://localhost/databaseclass/ManagerMainPage.html'; </script>";
           exit;
}
?>
<html>

<title>Manager Login</title>

<head>
<h1>Manager Login</h1>
</head>
<br>

<body>
<form method="post" action="">
  Manager ID: &nbsp<input type="text" name="manager_id">
  <br>
  <br>
  Password: &nbsp <input type="password" name="password">
  <br>
  <br>
  <input type="submit" value="Login">
</form>
</body>
</html>
