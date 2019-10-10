<?php
include "check_login.php";
include "config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
      th{font-size: 25px;width:150px;}
      td{ width:150px;font-size:20px;}
      table{width:100%;}
      tr:nth-child(even) {background-color: rgba(256,256,256,0.6);}
      tr:nth-child(odd) {background-color: rgba(180,180,180,0.6);}
      .a{padding-bottom:20px;}
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>View Teacher</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg'); background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>VIEW TEACHER</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
          <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div>
    <br><br>
  </body>
</html>
<?php
    $sql = "SELECT tid,fname,lname,branch_code,phno FROM teacher ORDER BY tid;";
    $res = mysqli_query($link,$sql);
    if(mysqli_num_rows($res)==0){
        echo "<div style='border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;' class='container'><h2>NO TEACHER IN THE DATABASE!</h2></div>";
    }
    else{
        echo "<div class='col-sm-1' ></div>
        <div class='col-sm-10 a' style='border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;'><br>
        <center><table class='table-stripped'>
        <tr>
        <th height='20'>TID</th>
        <th height='20'>FIRST NAME</th>
        <th height='20'>LAST NAME</th>
        <th height='20'>BRANCH</th>
        <th height='20'>CONTACT NO.</th>
        </tr>";
        while($row=$res->fetch_assoc()){
            $tid=$row["tid"];
            $fname=$row["fname"];
            $lname=$row["lname"];
            $branch=$row["branch_code"];
            $phno=$row["phno"];
            echo "<tr>
            <td>".$tid."</td>
            <td>".$fname."</td>
            <td>".$lname."</td>
            <td>".$branch."</td>
            <td>".$phno."</td>
            </tr>";
        }
        echo '</table></center></div>';
    }
?>