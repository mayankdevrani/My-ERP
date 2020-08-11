<?php
session_start();

// initializing variables
$full_name = "";
$username = "";
$email    = "";
$password = "";
$password_confirm = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'my_erp');

// REGISTER USER
if (isset($_POST['reg_students'])) {
  // receive all input values from the form
  $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $password_confirm = mysqli_real_escape_string($db, $_POST['password_confirm']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($full_name)) { header('location: ../entering_details/incorrect_signin.php'); }
  if (empty($username)) { header('location: ../entering_details/incorrect_signin.php'); }
  if (empty($email)) { header('location: ../entering_details/incorrect_signin.php'); }
  if (empty($password)) { header('location: ../entering_details/incorrect_signin.php'); }
  if ($password != $password_confirm) { header('location: ../entering_details/incorrect_signin.php'); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registered_students WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      header('location: ../entering_details/incorrect_signin.php');
    }

    if ($user['email'] === $email) {
      header('location: ../entering_details/incorrect_signin.php');
    }
  }

  // Finally, register user if there are no errors in the form
  	$password = md5($password_confirm);//encrypt the password before saving in the database

  	$query = "INSERT INTO registered_students (full_name, username, email, password) 
  			  VALUES('$full_name', '$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../entering_details/correctly_registered.php');
  
}

// ... 
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    header('location: ../entering_details/incorrect_login.php');
  }
  if (empty($password)) {
    header('location: ../entering_details/incorrect_login.php');
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM registered_students WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {  
      $_SESSION['success'] = "You are now logged in";
      header('location: ../student_dashboard.php');
    }else {
      header('location: ../entering_details/incorrect_login.php');
    }
  }
}

?>


