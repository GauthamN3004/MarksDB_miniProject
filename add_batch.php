<?php
    include("check_login.php");
    include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $bname=strtoupper(trim($_POST["name"]));
        $bcode=strtoupper(trim($_POST["code"]));
        $checkbatch = mysqli_query($link,"SELECT * FROM batch WHERE batch_code ='$bcode'");
        $countBatch= mysqli_num_rows($checkbatch);
        if($countBatch==0){
            $checkbatch = mysqli_query($link,"INSERT INTO batch VALUES('$bcode','$bname');");
            echo "<script>
            alert('Batch has been added successfully!');
            window.location.href='batch.php';
            </script>";
          }
          else{
            echo "<script>
            alert('Batch already exists!');
            window.location.href='add_batch.php';
            </script>";
            exit;
          }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Add Batch</title>
    <style>
    p{font-size:20px;}
    input{border-radius: 5px;width: 300px; padding-left: 10px; text-align:center;}
    </style>
</head>
<body style="background-image: url('hello.jpg');background-size: cover;"><br>
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>ADD BATCH</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div><br><br>
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;" ><br>
        <form action="add_batch.php" style="text-align:center;" method="post">
            <p>BATCH CODE: <br><input type="text" name="code" autocomplete="off" maxlength="4" required></p><br>
            <p>BATCH NAME: <br> <input type="text" name="name" autocomplete="off" maxlength="20" required></p><br>
            <p><button type="submit" class="btn btn-default"> SUBMIT</button> <a href="batch.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p><br>
        </form>
    </div>
</body>
</html>