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
$Amount = $_POST["Amount"];
mysqli_select_db($conn,"project");
$SQLstring = "SELECT * FROM book WHERE stock < '$Amount'";

$QueryResult =  @mysqli_query($conn, $SQLstring);
echo "<table width='100%' border='1'>\n";
echo "<tr><th>Title</th><th>Author</th><th>ISBN</th>
     <th>Publisher</th><th>Year</th><th>Price</th><th>Genre</th><th>Stock</th></tr>\n";

while(($Value = mysqli_fetch_row($QueryResult))!= FALSE)
{
  echo "<tr><td align='center'>{$Value[0]}</td>";
  echo "<td align='center'>{$Value[1]}</td>";
  echo "<td align='center'>{$Value[2]}</td>";
  echo "<td align='center'>{$Value[3]}</td>";
  echo "<td align='center'>{$Value[4]}</td>";
  echo "<td align='center'>{$Value[5]}</td>";
  echo "<td align='center'>{$Value[7]}</td>";
  echo "<td align='center'>{$Value[6]}</td>";





}
 ?>
