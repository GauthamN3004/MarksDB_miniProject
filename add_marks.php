<?php
include("check_login.php");
include("config.php");
if(isset($_POST["sub"])){
  $usn=strtoupper(trim($_POST["usn"]));
  $sem=$_POST["sem"];
  $checkusn = mysqli_query($link,"SELECT * FROM student WHERE usn ='$usn'");
  $count= mysqli_num_rows($checkusn);
  if($count==1){
    $_SESSION["usn"] = $usn;
    $_SESSION["sem"] = $sem;
    header("location: add_usnmark.php");
  }
  else{
    echo "<script>
    alert('Student does not exist!');

    </script>";
    // window.location.href='add_marks.php';
    exit;
  }
}
?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Add Marks</title>
    <style>
    p{font-size:20px;}
    input{border-radius: 5px;width: 300px; padding-left: 10px; text-align:center;}
    </style>
  </head>
  <br>
  <body style="background-image: url('hello.jpg');background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>ADD MARKS</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
            <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div>
    <br>
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;" ><br>
        <form action="add_marks.php" style="text-align:center;" method="post">
            <p>USN<br><input type="text" name="usn" autocomplete="off" maxlength="10" required></p><br>
            <p>SEMESTER<br><input type="number" name="sem" autocomplete="off" min="1" max="8" required></p><br>
            <p><button type="submit" class="btn btn-default" name='sub'>SUBMIT</button> <a href="marks.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p><br>
        </form>
    </div><br><br>
    <br><br>
  </body>
</html>
