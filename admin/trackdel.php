<?php 
session_start();
include("connection.php");

if  (htmlspecialchars(isset($_GET['rn']))){
  $id = $_GET['rn'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM sermon_table WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);
  $image = $imagerow['sermon'];
  $target_dir ="tracks/";
  $target_file =$target_dir.$image;
  $remove= unlink($target_file);
  if ($remove) {
   $deletearticle = mysqli_query($conn, "DELETE FROM  sermon_table WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> Sermon was successfully deleted</p>";
  header("Location: trackview.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: trackview.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'> Audio was not Removed</p>";
header("Location: trackview.php");
exit();

  }
  
  
  
}
