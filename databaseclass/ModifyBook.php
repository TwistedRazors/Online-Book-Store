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

$title = $_POST['title'];
$author  = $_POST['author'];
$isbn = $_POST['isbn'];
$publisher = $_POST['publisher'];
$year = $_POST['year'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$genre = $_POST['genre'];
$description = $_POST['description'];

if ($_POST){
    mysqli_select_db($conn, "project");
    $SQLstring = "UPDATE book SET Title='$title', Author='$author', Publisher='$publisher', Year='$year', Price='$price', Stock='$stock', Genre='$genre', Description='$description' WHERE ISBN_no='$isbn'";
    $result = mysqli_query($conn, $SQLstring) or die(mysqli_error());
    $Value = @mysqli_fetch_row($result);

    if ($Value[0] == '') {
      echo "Book Updated";
    }else {
      echo "Error: " . $SQLstring . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>

<html>
<title>Modify Book</title>

<head>
  <script>
  function isNumberKey(evt) {
              var charCode = (evt.which) ? evt.which : event.keyCode
              if (charCode > 31 && (charCode < 48 || charCode > 57))
                  return false;

              return true;
          }
  </script>
</head>
<h1>Modify Book</h1>

<body>
<form method="post" action="">
  Title: &nbsp <input type="text" name="title" minlength="1" maxlength="200" required>
  <br>
  <br>
  Author: &nbsp <input type="text" name="author" minlength="1" maxlength="30" required>
  <br>
  <br>
  ISBN-13 No.: &nbsp <input type="text" name="isbn" onkeypress="return isNumberKey(event)" minlength="13" maxlength="13" required>
  <br>
  <br>
  Publisher: &nbsp<input type="text" name="publisher" minlength="1" maxlength="50" required>
  <br>
  <br>
  Year: &nbsp<input type="text" name="year" onkeypress="return isNumberKey(event)" minlength="4" maxlength="4" required>
  <br>
  <br>
  Price: &nbsp $<input type="text" name="price" pattern="[0-9]+.[0-9]{2}" required>
  <br>
  <br>
  Stock: &nbsp <input type="text" name="stock" onkeypress="return isNumberKey(event)" minlength="1" maxlength="4" required>
  <br>
  <br>
  Genre: &nbsp <input type="text" name="genre" minlength="1" maxlength="40" required>
  <br>
  <br>
  Description: &nbsp <textarea name="description" rows="10" cols="100" minlength="1" maxlength="65535" required></textarea>
  <br>
  <br>
  <input type="submit" name="add_book" value="Modify Book">
</form>
</body>

</html>
