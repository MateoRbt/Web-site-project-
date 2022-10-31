

<!DOCTYPE html>
<html>
<head>
 <title> Πλήροφοριες Χρήστη </title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <table align="center">
</head>
<body>

<?php
include_once "dbconn.php";

session_start(); 
$conn = mysqli_connect("localhost", "aismarket", "12<34", "aismarket");
$user = $_SESSION['user'];
$password = $_SESSION['password1'];
$mail = $_SESSION['email'];

$conn->close();
?>


Όνομα Πελάτη: <b><?=$user?></b><br>
Κωδικός Πελάτη: <b><?=$password?></b><br>
e-mail Πελάτη: <b><?=$mail?></b><br>

</body>

</html>