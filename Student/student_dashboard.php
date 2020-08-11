<?php

session_start();
$db = mysqli_connect('localhost', 'root', '', 'my_erp');
$username = $_SESSION['username'];
$query = "SELECT * FROM registered_students WHERE username = '$username' ";
$results = mysqli_query($db, $query);
$data = mysqli_fetch_array($results);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Student Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='student_dashboard_style.css'>
    <script src='main.js'></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron container student_header">
        <h1>Student Dashboard</h1>
    </div>
    <div class="row row_both">
        <div class="col-6 col-md-4 row_left">
            <h3 class="profile_header">Profile</h3>
            <table class="table_details">
                <tr class="color_first">
                    <th class="table_text_left">Name :</th>
                    <td>&nbsp <?php echo $data['full_name'];?></td>
                </tr>
                <tr class="color_second">
                    <th class="table_text_left">Username :</th>
                    <td>&nbsp <?php echo $data['username'];?></td>
                </tr>
                <tr class="color_first">
                    <th class="table_text_left">Email :</th>
                    <td>&nbsp <?php echo $data['email'];?></td>
                </tr>
                <tr class="color_second">
                    <th class="table_text_left">Course :</th>
                    <td>&nbsp <?php echo $data['course'];?></td>
                </tr>
                <tr class="color_first">
                    <th class="table_text_left">Roll No. :</th>
                    <td>&nbsp <?php echo $data['roll_no.'];?></td>
                </tr>
                <tr class="color_second">
                    <th class="table_text_left">Year :</th>
                    <td>&nbsp <?php echo $data['year'];?></td>
                </tr>
                <tr class="color_first">
                    <th class="table_text_left">Phone No. :</th>
                    <td>&nbsp <?php echo $data['phone_no.'];?></td>
                </tr>
                <tr class="color_second">
                    <th class="table_text_left">DOB :</th>
                    <td>&nbsp </td>
                </tr>
            </table>
        </div>

        <div class="vl"></div>

        <div class="col-12 col-md-4 row_middle">
            <hr>
            <a href="./components/attendance.php">
                <div class="col-md-8 info_middle"><i class="fa fa-bar-chart" aria-hidden="true">&nbsp</i>
                Attendance</div><hr></a>
            <a href="./components/timetable.php">
                <div class="col-md-8 info_middle"><i class="fa fa-calendar" aria-hidden="true">&nbsp</i>
                Time Table</div><hr></a>
            <a href="./components/exams.php">
                <div class="col-md-8 info_middle"><i class="fa fa-book" aria-hidden="true">&nbsp</i>
                Exams</div><hr></a>
            <a href="./components/result.php">
                <div class="col-md-8 info_middle"><i class="fa fa-file-text-o" aria-hidden="true">&nbsp</i>
                Result</div><hr></a>
            <a href="./components/noticecircular.php">
                <div class="col-md-8 info_middle"><i class="fa fa-envelope-o" aria-hidden="true">&nbsp</i>
                Notice/Circular</div><hr></a>
                <a href="#">
                <div class="col-md-8 info_middle"><i class="fa fa-commenting-o" aria-hidden="true">&nbsp</i>
                Feedback</div><hr></a>
        </div>

        <div class="vl"></div>

        <div class="col-12 col-md-3 row_right">

            <div class="col-12 col-md-12 row_right_one row_right_common"><a href="./components/editpage.php"><button type="button"
                    class="btn btn-link">Edit Profile</button></a></div>

            <div class="col-12 col-md-12 row_right_two row_right_common">
                <div class="card" style="height:100%;width:90% ;">
                    <img class="card-img-top avatar_image"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrv-vVHmbnayBuvroHvqh_WyIFynh_93HC3YYygbG8PvixKtCY"
                        alt="Avatar image" style="width:100%">
                    
                        <h4 class="card-title" style="margin-top:2%;"> <?php echo $data['full_name']; ?> </h4>
                    
                </div>
            </div>

            <div class="col-12 col-md-12 row_right_three row_right_common"><a href="../index.html"><button type="button"
                    class="btn btn-warning">Logout</button></a></div>
        </div>
    </div>

</body>
</html>