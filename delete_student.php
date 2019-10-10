<?php
include "check_login.php";
include "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usn = strtoupper(trim($_POST["usn"]));
    $checkusn = mysqli_query($link,"SELECT * FROM student WHERE usn ='$usn'");
    $countusn= mysqli_num_rows($checkusn);
    if($countusn==1){
        $delstudent=mysqli_query($link,"DELETE FROM student WHERE usn='$usn';");
        echo "<script>
        alert('Student Deleted!');
        window.location.href='student.php';
        </script>";
    }
    else{
      
      echo "<script>
      alert('Student does not exist!');
      window.location.href='delete_student.php';
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
    <title>Delete Student</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg'); background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>DELETE STUDENT</b></h1>
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
          <form class="" action="delete_student.php" method="post" autocomplete="off">
            <p>USN<br> <br><input type="text" name="usn" maxlength="10" placeholder="USN" required style="text-align:center;"><br><br></p>
            <br>
            <p><button type="submit" class="btn btn-default" method="post"> SUBMIT</button> <a href="student.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p>
          </form>
          <br>
      </div>
    </div>
  </body>
</html>
