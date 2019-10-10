<?php
include("check_login.php");
?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Students</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg');background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>STUDENTS</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div>
    <br><br>
    <div class="row" >
        <div class="col-lg-1"></div>
        <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
          <a href="add_student.php"> <center><img src="add.png" height="150" width="150" ></center> </a>
          <h4 style="text-align:center; ">ADD STUDENT</h4>
        </div>
        <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
          <a href="delete_student.php"> <center><img src="trash.png" height="150" width="150"> </center></a>
          <h4 style="text-align:center; ">DELETE STUDENT</h4>
        </div>
        <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
          <a href="view_student.php"> <center><img src="student_group.png" height="150" width="150"> </center></a>
          <h4 style="text-align:center; ">VIEW STUDENT</h4>
        </div>
        <div class="col-sm-2"></div>
    </div>
  </body>
</html>
