<?php
    include('backend/server.php')   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Faculty Panel</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../Styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='faculty_enter_style.css'>
    <script src='main.js'></script> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
</head>
<body>
<div class="container main_div">
<a href="../index.html" class="btn btn-warning go_back"><i class="fa fa-arrow-left" aria-hidden="true">&nbsp&nbspGo Back</i></a>
    <div class="card text-center">
        <div class="card-header">
            <h1>Welcome to ERP</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Faculty Panel</h5>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="POST" action="backend/server.php">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="faculty_username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="faculty_password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn btn-primary" name="login_faculty">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="faculty_signin.php">Sign up</a>
  	</p>
  </form>
        </div>
</div>
</body>
</html>