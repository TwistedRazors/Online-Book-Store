<?php
error_reporting(E_ERROR | E_PARSE);
$databaseName = 'project';
$databaseUser = 'root';
$databasePassword = '';
$databaseHost = '127.0.0.1';
session_start();
$i = 0;

$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_select_db($conn,"project");
echo "<table width='100%' border='1'>\n";
echo "<tr><th>Title</th><th>Author</th><th>ISBN</th>
     <th>Publisher</th><th>Year</th><th>Price</th><th>Genre</th><th>Stock</th></tr>\n";
  $_SESSION["total"] = 0;
while ($i < sizeof($_SESSION["cart"]))
{

  $curr = $_SESSION["cart"][$i];
  $SQL = "SELECT * FROM book WHERE ISBN_no = '$curr'";
  $QueryResult =  @mysqli_query($conn, $SQL);
  $Value = mysqli_fetch_row($QueryResult);
  echo "<tr><td align='center'>{$Value[0]}</td>";
  echo "<td align='center'>{$Value[1]}</td>";
  echo "<td align='center'>{$Value[2]}</td>";
  echo "<td align='center'>{$Value[3]}</td>";
  echo "<td align='center'>{$Value[4]}</td>";
  echo "<td align='center'>{$Value[5]}</td>";
  echo "<td align='center'>{$Value[7]}</td>";
  echo "<td align='center'>{$Value[6]}</td>";
  $_SESSION["total"] = $_SESSION["total"] + $Value[5];

  $i = $i + 1;
}
echo "Your total: $" . $_SESSION["total"];
 ?>
 <html>
 <a href="http://localhost/databaseclass/BillingInformation.php">Checkout</a><br><br>
 <a href="http://localhost/databaseclass/SearchPage.html">Return to Search Page</a><br><br>

 </html>
