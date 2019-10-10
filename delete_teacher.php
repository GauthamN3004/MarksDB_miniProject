<?php
include "check_login.php";
include "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tid = strtoupper(trim($_POST["tid"]));
    $checkteacher = mysqli_query($link,"SELECT * FROM teacher WHERE tid ='$tid'");
    $countteacher= mysqli_num_rows($checkteacher);
    if($countteacher==1){
        $delteacher=mysqli_query($link,"DELETE FROM teacher WHERE tid='$tid';");
        echo "<script>
        alert('Teacher Deleted!');
        window.location.href='teacher.php';
        </script>";
    }
    else{
      
      echo "<script>
      alert('Teacher does not exist!');
      window.location.href='delete_teacher.php';
      </script>";
      exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
      input{border-radius: 5px;width: 300px; padding-left: 10px;}
      p{font-size: 20px;}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Delete teacher</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg'); background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>DELETE teacher</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div>
    <br><br>
    <div>
      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;">
        <br>
          <form class="" action="delete_teacher.php" method="post" autocomplete="off">
            <p>TEACHER ID<br> <br><input type="text" name="tid" maxlength="10" placeholder="Teacher ID" required style="text-align:center;"><br><br></p>
            <br>
            <p><button type="submit" class="btn btn-default" method="post"> SUBMIT</button> <a href="teacher.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p>
          </form>
          <br>
      </div>
    </div>
  </body>
</html>
