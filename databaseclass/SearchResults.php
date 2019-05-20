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

$Title = $_POST["Title"];
$Author = $_POST["Author"];
$Publisher = $_POST["Publisher"];
$Genre = $_POST["Genre"];
$ISBN = $_POST["ISBN"];

if ($Title == "")
  $Title = "EMPTYEMPTY";
if ($Author == "")
  $Author = "EMPTYEMPTY";
if ($Publisher == "")
  $Publisher = "EMPTYEMPTY";
if ($Genre == "")
  $Genre = "EMPTYEMPTY";
if ($ISBN== "")
  $ISBN = "EMPTYEMPTY";

$SQL = "SELECT * FROM book WHERE Title like '%$Title%'
        UNION
        SELECT * FROM book WHERE Author like '%$Author%'
        UNION
        SELECT * FROM book WHERE Publisher like '%$Publisher%'
        UNION
        SELECT * FROM book WHERE Genre like '%$Genre%'
        UNION
        SELECT * FROM book WHERE ISBN_no like '%$ISBN%'";
$QueryResult =  @mysqli_query($conn, $SQL);
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

  array_push($lis, $Value[2]);



}

$_SESSION["ISBN"] = "12";
echo "
<form action='addtocart.php'
  method = 'post'>
  ISBN: <input type = 'text' name = 'ISBN'>
  <input type = 'submit' value = 'Add to cart'>
";



mysqli_close($connection);
?>
