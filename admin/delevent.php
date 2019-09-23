<?php 
session_start();
include("connection.php");

if  (htmlspecialchars(isset($_GET['rn']))){
  $id = $_GET['rn'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM event_table WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);
  $image = $imagerow['event_img'];
  $target_dir ="events/";
  $target_file =$target_dir.$image;
  $remove= unlink($target_file);
  if ($remove) {
   $deletearticle = mysqli_query($conn, "DELETE FROM  event_table WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> Event was successfully deleted</p>";
  header("Location: viewevents.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: viewevents.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'> Image was not Removed</p>";
header("Location: viewevents.php");
exit();

  }
  
  
  
}

// this section is for deleting images

/*if (htmlspecialchars(isset($_GET['im']))) {
  $id = $_GET['im'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM event_images WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);
  $image = $imagerow['image'];
  $target_dir ="gallery/";
  $target_file =$target_dir.$image;
  $remove= unlink($target_file);
  if ($remove) {
   $deletearticle = mysqli_query($conn, "DELETE FROM  event_images WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> Image was successfully deleted</p>";
  header("Location: gallery.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: gallery.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'> Image was not Removed</p>";
header("Location: gallery.php");
exit();

  }
  
  
  
}*/
?>
