<?php
    include("check_login.php");
    include("config.php");
?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>View/Delete/Update Marks</title>
    <style media="screen">
      th{font-size: 25px;width:150px;}
      td{ width:150px;font-size:20px;}
      table{width:95%;}
      tr:nth-child(even) {background-color: rgba(256,256,256,0.6);}
      tr:nth-child(odd) {background-color: rgba(180,180,180,0.6);}
      .a{padding-bottom:20px;}
    </style>
  </head>
  <br>
  <body style="background-image: url('hello.jpg');background-size: cover;">
    <div class="container" style="border-radius:10px;background-color:rgba(180,180,180,0.6)">
        <h1 style="text-align: center"><b>VIEW / DELETE / UPDATE MARKS</b></h1>
        <div style="text-align: right;">
          <h3 >Hello, <?php echo strtoupper($user); ?></h1>
            <p><a href="welcome.php"><button class="btn btn-default"><b>HOME</b></button></a>  <a href="logout.php"><button class="btn btn-default"><b>LOGOUT</b></button></a></p>
          <br>
        </div>
    </div><br>
    <?php
    if(isset($_POST["delete"])){
        $delid=$_POST["delete"];
        $delquery="DELETE FROM marks WHERE id=$delid;";
        $res=mysqli_query($link,$delquery);
        echo "<h3 style='border-radius:10px;background-color:rgba(180,180,180,0.6); text-align:center;'>1 row deleted!</h3>";
    }
    $sql = "SELECT id,usn,teacher,branch,sem,batch,subject,marks FROM marks ORDER BY branch,sem,usn;";
    $res = mysqli_query($link,$sql);
    if(mysqli_num_rows($res)==0){
        echo "<div style='border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;' class='container'><h2>NO MARKS TO DISPLAY!</h2></div>";
    }
    else{
        echo "
        <div class='a' style='border-radius:10px;background-color:rgba(180,180,180,0.6);text-align: center;'><br>
        <center><table class='table-stripped'>
        <tr>
        <th height='20'>USN</th>
        <th height='20'>TEACHER ID</th>
        <th height='20'>BRANCH</th>
        <th height='20'>SEM</th>
        <th height='20'>BATCH</th>
        <th height='20'>SUBJECT_CODE</th>
        <th height='20'>MARKS</th>
        </tr>";
        while($row=$res->fetch_assoc()){
            $id=$row["id"];
            $usn=$row["usn"];
            $tid=$row["teacher"];
            $branch=$row["branch"];
            $sem=$row["sem"];
            $batch=$row["batch"];
            $scode=$row["subject"];
            $mark=$row["marks"];
            echo "<tr><form action='viewdel_marks.php' method='POST'>
            <td>".$usn."</td>
            <td>".$tid."</td>
            <td>".$branch."</td>
            <td>".$sem."</td>
            <td>".$batch."</td>
            <td>".$scode."</td>
            <td>".$mark."</td>
            <td style='text-align:center; width:30px;'><button type='submit' class='btn btn-warning' name='delete' value='".$id."' style='width:50px; height=30px;'><span class='glyphicon glyphicon-trash'></span></button></td>
            <td style='text-align:center; width:30px;'><button type='submit' class='btn btn-success' name='update' value='".$id."' style='width:50px; height=30px;'><span class='glyphicon glyphicon-refresh'></span></button></td>
            </form></tr>";
        }
        echo '</table></center></div>';
    }
?>
        
    </div><br><br>
    <br><br>
  </body>
</html>
