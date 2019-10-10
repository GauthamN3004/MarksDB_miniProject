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
    <title>View Subjects</title>
  </head>
  <br>
  <body style="background-image: url('hello.jpg'); background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>VIEW SUBJECTS</b></h1>
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
    $sql = "SELECT subject_code,subject_name,sem,branch_code FROM subject ORDER BY branch_code,subject_code;";
    $res = mysqli_query($link,$sql);
    if(mysqli_num_rows($res)==0){
        echo "<div style='border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;' class='container'><h2>NO SUBJECTS IN THE DATABASE!</h2></div>";
    }
    else{
        echo "<div class='col-sm-1' ></div>
        <div class='col-sm-10 a' style='border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;'><br>
        <center><table class='table-stripped'>
        <tr><th height='20'>BRANCH CODE</th>
        <th height='20'>SEMESTER</th>
        <th height='20'>SUBJECT CODE</th>
        <th height='20'>SUBJECT NAME</th>
        </tr>";
        while($row=$res->fetch_assoc()){
            $bcode=$row["branch_code"];
            $scode=$row["subject_code"];
            $sname=$row["subject_name"];
            $sem=$row["sem"];
            echo "<tr>
            <td>".$bcode."</td>
            <td>".$sem."</td>
            <td>".$scode."</td>
            <td>".$sname."</td>
            </tr>";
        }
        echo '</table></center></div>';
    }
?>