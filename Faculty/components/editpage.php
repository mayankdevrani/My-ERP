<?php

session_start();
$db = mysqli_connect('localhost', 'root', '', 'my_erp');
$faculty_username = $_SESSION['faculty_username'];
$query = "SELECT * FROM registered_faculties WHERE faculty_username = '$faculty_username' ";
$results = mysqli_query($db, $query);
$data = mysqli_fetch_array($results);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Faculty Edit Profile</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../faculty_dashboard_style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../faculty_enter_style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='Styles/editpage.css'>
    <script src='main.js'></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class=" container main_div">
    <a href="../faculty_dashboard.php" class="btn btn-warning go_back"><i class="fa fa-arrow-left" aria-hidden="true">&nbsp&nbspGo Back</i>
</a>
    <div class="jumbotron container student_header">
        <h1>Faculty Dashboard --> Edit Profile</h1>
    </div>
    <div class="container">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-4">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Personal info</h3>
        <hr>
        
        <form class="form-horizontal" role="form" method="POST" action="../backend/server.php?user=<?php echo $data['username'] ?>">
          <div class="form-group">
            <label class="col-lg-3 control-label">Full Name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="faculty_name" type="text" value=" <?php echo $data['faculty_name'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value=" <?php echo $data['faculty_username'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=" <?php echo $data['faculty_email'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Date of Birth:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" value=" <?php echo $data['dob'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=" <?php echo $data['faculty_phone_no'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="faculty_password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-6 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div> 
        </form>

      </div>
  </div>
</div>
<hr>
</div>
</body>
</html>