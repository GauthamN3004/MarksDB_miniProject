<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo "<script>
  alert('Login Required!');
  window.location.href='index.php';
  </script>";
    exit;
}
else{
  $user=$_SESSION["username"];
}
?>
