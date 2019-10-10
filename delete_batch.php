<?php
include "check_login.php";
include "config.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $bcode = strtoupper(trim($_POST["bcode"]));
    $checkBatch = mysqli_query($link,"SELECT * FROM batch WHERE batch_code ='$bcode'");
    $countBatch= mysqli_num_rows($checkBatch);
    if($countBatch==1){
        $delBatch=mysqli_query($link,"DELETE FROM batch WHERE batch_code='$bcode';");
        echo "<script>
        alert('Batch Deleted!');
        window.location.href='batch.php';
        </script>";
    }
    else{
      
      echo "<script>
      alert('Batch does not exist!');
      window.location.href='delete_batch.php';
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
    <title>Delete Batch</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg'); background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>DELETE BATCH</b></h1>
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
          <form class="" action="delete_batch.php" method="post" autocomplete="off">
            <p>BATCH CODE<br> <br><input type="text" name="bcode" maxlength="4" placeholder="Batch Code" required style="text-align:center;"><br><br></p>
            <br>
            <p><button type="submit" class="btn btn-default" method="post"> SUBMIT</button> <a href="batch.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p>
          </form>
          <br>
      </div>
    </div>
  </body>
</html>
