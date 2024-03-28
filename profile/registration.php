<?php

// Include database connection details (replace with your credentials)
require('db_connect.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get form data 
  $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password securely

  // Check for empty fields
  if (empty($username) || empty($email) || empty($password)) {
    $error = "Please fill out all required fields.";
  }  else {
      // Insert user data into database
      $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
      if (mysqli_stmt_execute($stmt)) {
        $success = "Registration successful! Please login.";
      } else {
        $error = "Error: " . mysqli_error($conn);
      }
    }
    mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);
}

?>
