<?php

// Database credentials (replace with your actual credentials)
$servername = "localhost";
$username = "alto";
$password = "2222";
$dbname = "profile";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
