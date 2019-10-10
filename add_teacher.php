<?php
    include("check_login.php");
    include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tid=strtoupper(trim($_POST["tid"]));
        $fname=strtoupper(trim($_POST["fname"]));
        $lname=strtoupper(trim($_POST["lname"]));
        $branch=strtoupper(trim($_POST["branch"]));
        $ph=trim($_POST["ph"]);
        $checktid = mysqli_query($link,"SELECT * FROM teacher WHERE tid='$tid';");
        $counttid= mysqli_num_rows($checktid);
        if($counttid==0){
            $checkbranch = mysqli_query($link,"SELECT * FROM branch WHERE branch_code='$branch';");
            $countbranch= mysqli_num_rows($checkbranch);
            if($countbranch==1){
                $addteacher = mysqli_query($link,"INSERT INTO teacher VALUES('$tid','$fname','$lname','$branch','$ph');");
                echo "<script> alert('Teacher has been added successfully!');
                window.location.href='teacher.php';
                </script>";
            }
            else{
                echo "<script> alert('Branch does not exist!');
                window.location.href='add_teacher.php';
                </script>";
            }
        }
        else{
            echo "<script>
            alert('Teacher ID already exists!');
            window.location.href='add_teacher.php';
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
    <title>Add Teacher</title>
    <style>
    p{font-size:20px;}
    input{border-radius: 5px;width: 300px; padding-left: 10px; text-align:center;}
    </style>
</head>
<body style="background-image: url('hello.jpg');background-size: cover;"><br>
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>ADD TEACHER</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div><br><br>
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;" ><br>
        <form action="add_teacher.php" style="text-align:center;" method="post">
            <p>TEACHER ID <br><input type="text" name="tid" autocomplete="off" maxlength="10" required></p><br>
            <p>FIRST NAME <br> <input type="text" name="fname" autocomplete="off" maxlength="20" required></p><br>
            <p>LAST NAME<br> <input type="text" name="lname" autocomplete="off" maxlength="20"></p><br>
            <p>BRANCH CODE <br> <input type="text" name="branch" autocomplete="off" maxlength="3" required></p><br>
            <p>CONTACT NO. <br> <input type="number" name="ph" autocomplete="off" maxlength="10" required></p><br>
            <p><button type="submit" class="btn btn-default"> SUBMIT</button> <a href="teacher.php"><button type="button" class="btn btn-primary">CANCEL</button></a> </p><br>
        </form>
    </div><br><br>
</body>
</html>