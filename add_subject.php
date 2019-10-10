<?php
    include("check_login.php");
    include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sname=strtoupper(trim($_POST["sname"]));
        $scode=strtoupper(trim($_POST["scode"]));
        $bcode=strtoupper(trim($_POST["bcode"]));
        $sem=trim($_POST["sem"]);
        $checksub = mysqli_query($link,"SELECT * FROM subject WHERE subject_code ='$scode'");
        $countsub= mysqli_num_rows($checksub);
        if($countsub==0){
            $checkbranch = mysqli_query($link,"SELECT * FROM branch WHERE branch_code ='$bcode'");
            $countbranch= mysqli_num_rows($checkbranch);
            if($countbranch==1){
                $addsub = mysqli_query($link,"INSERT INTO subject VALUES('$scode','$sname','$bcode',$sem);");
                echo "<script>
                alert('Subject has been added successfully!');
                window.location.href='subject.php';
                </script>";
            }
            else{
                echo "<script>
                alert('Branch does not exist!');
                window.location.href='add_subject.php';
                </script>";
            exit;
            }
          }
          else{
            echo "<script>
            alert('Subject already exists!');
            window.location.href='add_subject.php';
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
    <title>Add Subject</title>
    <style>
    p{font-size:20px;}
    input{border-radius: 5px;width: 300px; padding-left: 10px; text-align:center;}
    </style>
</head>
<body style="background-image: url('hello.jpg');background-size: cover;"><br>
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>ADD SUBJECT</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div><br><br>
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;" ><br>
        <form action="add_subject.php" style="text-align:center;" method="post">
            <p>SUBJECT CODE: <br><input type="text" name="scode" autocomplete="off" maxlength="8" required></p><br>
            <p>SUBJECT NAME: <br> <input type="text" name="sname" autocomplete="off" maxlength="20" required></p><br>
            <p>BRANCH CODE: <br><input type="text" name="bcode" autocomplete="off" maxlength="3" required></p><br>
            <p>SEMESTER: <br> <input type="number" min="1" max="8" value=1 name="sem" required></p>
            <p><button type="submit" class="btn btn-default"> SUBMIT</button> <a href="batch.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p><br>
        </form>
    </div>
</body>
</html>