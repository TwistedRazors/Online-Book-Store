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
$user = $_SESSION["username"];
$SQLstring = "SELECT * FROM customer, purchase WHERE Username = user AND Username = '$user'";

$QueryResult =  @mysqli_query($connection, $SQLstring);
echo "<table width='100%' border='1'>\n";
echo "<tr><th>Id Number</th><th>Tracking Number</th><th>Expected Arrival Date</th></tr>\n";

while(($Value = mysqli_fetch_row($QueryResult))!= FALSE)
{
  echo "<tr><td align='center'>{$Value[0]}</td>";
  echo "<td align='center'>{$Value[1]}</td>";
  echo "<td align='center'>{$Value[2]}</td>";

}

?>
