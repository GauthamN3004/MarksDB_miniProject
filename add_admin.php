<?php
include "check_login.php";
include "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminname = trim($_POST["username"]);
    if(strcmp($adminname,"")==0){echo "<script>
    alert('Enter a valid username!');
    window.location.href='add_admin.php';
    </script>";}
    $checkuser = mysqli_query($link,"SELECT uname, pass FROM admin WHERE uname ='$adminname'");
    $countUser= mysqli_num_rows($checkuser);
    if($countUser==0){
      $password = trim($_POST["password"]);
      $confirm= trim($_POST["confirm"]);
      if(strcmp($password,"")==0){echo "<script>
      alert('Enter a valid password!');
      window.location.href='add_admin.php';
      </script>";}
    }
    else{
      echo "<script>
      alert('Username already exists!');
      window.location.href='add_admin.php';
      </script>";
      exit;
    }
    if(strcmp($password,$confirm)!=0){
      echo "<script>
      alert('Passwords do not match! Please re-enter.');
      window.location.href='add_admin.php';
      </script>";
      exit;
    }
    elseif(empty($username_err) && empty($password_err)){
        $sql = "insert into admin values('$adminname','$password')";
        $result = mysqli_query($link,$sql);
        if($result){
          echo "<script>
          alert('Admin Successfully Added!');
          window.location.href='welcome.php';
          </script>";
          exit;
        }
        else{
          echo '<script language="javascript">';
          echo 'alert("ERROR: Could not add Admin!")';
          echo '</script>';
        }
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
    <title>Add Admin</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg'); background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>ADD ADMINISTRATOR</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div>
    <br><br>
    <div class="">
      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;">
        <br>
          <form class="" action="add_admin.php" method="post" autocomplete="off">
            <p >USERNAME<br> <input type="text" name="username" placeholder="username"><br><br></p>
            <p>PASSWORD<br> <input type="password" name="password"  placeholder="password"><br><br></p>
            <p>CONFIRM PASSWORD<br><input type="password" name="confirm" placeholder="confirm password"><br><br></p>
            <br>
            <p><button type="submit" class="btn btn-default"> SUBMIT</button> <a href="welcome.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p>
          </form>
          <br>
      </div>
    </div>
  </body>
</html>
