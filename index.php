<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
include "config.php";
$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT uname, pass FROM admin WHERE uname = '$username'and pass='$password'";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);
        if($count==1){
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["id"] = $id;
          $_SESSION["username"] = $username;
          header("location: welcome.php");
        }
        else{
          echo '<script language="javascript">';
          echo 'alert("Invalid Credentials! Plese try again.")';
          echo '</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body style="background-image: url('hello.jpg');background-size: cover;"><br>
    <div  class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)"><br><br><h1 style="text-align: center">LOGIN</h1><br><br></div><br><br>
    <div class="col-lg-4"></div>
    <div class="col-lg-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;">
        <br><br>
        <center><img src="admin.jpg" alt="" height="150" width="150"></center><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p style="font-size: 20px;">USERNAME</p>
                <input type="text" name="username" value="<?php echo $username; ?>" maxlength="20" autocomplete="off" placeholder="username" style="border-radius: 5px;width: 300px; padding-left: 10px; font-size:20px;">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p style="font-size: 20px;">PASSWORD</p>
                <input type="password" name="password"  placeholder="password" maxlength="30" style="border-radius: 5px;width: 300px; padding-left: 10px; font-size:20px;">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <br><p><button type="submit" class="btn btn-default"> SUBMIT</button><br>
        </form>
    </div>
</body>
</html>
