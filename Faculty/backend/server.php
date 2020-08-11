<?php
session_start();

#connect to database
$db = mysqli_connect('localhost', 'root', '', 'my_erp');

#register user
if(isset($_POST['reg_faculty'])){
    $faculty_name = $_POST['faculty_name'];
    $faculty_username = $_POST['faculty_username'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_password = $_POST['faculty_password'];
    $faculty_password2 = $_POST['faculty_password2'];

    #blank fields
    if (empty($faculty_name)) { header('location: ../entering_details/incorrect_signin.php'); }
    if (empty($faculty_username)) { header('location: ../entering_details/incorrect_signin.php'); }
    if (empty($faculty_email)) { header('location: ../entering_details/incorrect_signin.php'); }
    if (empty($faculty_password)) { header('location: ../entering_details/incorrect_signin.php'); }

    #confirm password
    if ($faculty_password != $faculty_password2) { header('location: ../entering_details/incorrect_signin.php'); }

    #encrypt password
    $faculty_password = md5($faculty_password2);

    $query = "INSERT INTO registered_faculties (faculty_name, faculty_username, faculty_email, faculty_password) 
                VALUES('$faculty_name', '$faculty_username', '$faculty_email', '$faculty_password')";
                
  	mysqli_query($db, $query);
      header('location: ../entering_details/correctly_registered.php');

}

#login user
if(isset($_POST['login_faculty'])){
    $faculty_username = $_POST['faculty_username'];
    $faculty_password = $_POST['faculty_password'];

    #blank fields
    if (empty($faculty_username)) { header('location: ../entering_details/incorrect_login.php'); }
    if (empty($faculty_password)) { header('location: ../entering_details/incorrect_login.php'); }

    $faculty_password = md5($faculty_password);

    $query = "SELECT * FROM registered_faculties 
              WHERE faculty_username='$faculty_username' AND faculty_password='$faculty_password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['faculty_username'] = $faculty_username;
      header('location: ../faculty_dashboard.php');    
    }
    else {
      header('location: ../entering_details/incorrect_login.php');
    }

}

?>