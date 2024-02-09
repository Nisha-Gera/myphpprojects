<?php
$servername = "localhost";
$username = "ngera";
$password = "ngera!123";
$database = "ngera_blog";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error());
}


?>
