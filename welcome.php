<?php
include("check_login.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Welcome!</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg');background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>WELCOME PAGE</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div>
    <br><br>
    <div class="row" >
        <div class="col-lg-1"></div>
        <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
          <a href="add_admin.php"><center><img src="admin_add.png" height="150" width="150"  ></center></a>
          <h4 style="text-align:center; ">ADD ADMINISTRATOR</h4>
        </div>
        <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
          <a href="student.php"><center><img src="student.png" height="150" width="150"  ></center></a>
          <h4 style="text-align:center; ">STUDENT</h4>
        </div>
        <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
          <a href="teacher.php"><center><img src="teacher.png" height="150" width="150"  ></center></a>
          <h4 style="text-align:center; ">TEACHER</h4>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
        <a href="batch.php"><center><img src="batch.png" height="150" width="150"  ></center></a>
        <h4 style="text-align:center; ">BATCH</h4>
      </div>
      <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
        <a href="subject.php"><center><img src="subjects.png" height="150" width="150"  ></center></a>
        <h4 style="text-align:center; ">SUBJECTS</h4>
      </div>
      <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
        <a href="branch.php"><center><img src="branch.png" height="150" width="150"  ></center></a>
        <h4 style="text-align:center; ">BRANCH</h4>
      </div>
    </div><br>
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-3" style="border-radius:10px;background-color:rgba(180,180,180,0.6);margin-left: 30px;">
        <a href="#"><center><img src="analyse.png" height="150" width="150"  ></center></a>
        <h4 style="text-align:center; ">MARKS ANALYSIS</h4>
      </div>
    </div>
    <br><br>

  </body>
</html>
