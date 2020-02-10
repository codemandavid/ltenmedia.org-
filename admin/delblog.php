<?php 
session_start();
include('connfile.php');

// note that this delete function does not include images. just text .

if  (htmlspecialchars(isset($_GET['rn']))){
  $id = $_GET['rn'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM blog WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);

  // $image = $imagerow['img'];
  // $target_dir ="blog/";
  // $target_file =$target_dir.$image;
  // $remove= unlink($target_file);
  if (  $imagerow) {
   $deletearticle = mysqli_query($conn, "DELETE  FROM  blog WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> Blog was successfully deleted</p>";
  header("Location: editblog.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: editblog.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'>Blog was not Removed</p>";
header("Location: editblog.php");
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
