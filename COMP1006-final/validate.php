<?php

  // Connect to the database
  require('connect.php');
  $conn = dbo();
  
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $email = strtolower($email);
  $password = filter_input(INPUT_POST, 'password');
  // Create our SQL with an email placeholder
  $sql = "SELECT * FROM users WHERE email = :email";
  // Prepare the SQL
  $stmt = $conn->prepare($sql);
  // Bind the value to the placeholder (incidently this will also sanitize the value)
  $stmt->bindParam('email', $email, PDO::PARAM_STR);
  // Execute
  $stmt->execute();
 
  // Check if we have a user and their password is correct
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $auth = false; //flag variable 

  if($user) $auth = password_verify($password, $user['password']);

  session_start();
  if(!$auth) {
    // Add a session variable to keep track of the user
    $_SESSION['errors'][] = "You email/password could not be verified";
    $_SESSION['form_values'] = $_POST;

    // Redirect back to the form
    header("Location: login.php");
    exit;
  }

  unset($user['password']);
  $_SESSION['user'] = $user;
  $_SESSION['successes'][] = "You have been logged in.";
  header("location: view.php");
  exit;  
 
?>
  