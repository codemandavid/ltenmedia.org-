<?php 
session_start();
include("connection.php");

if  (htmlspecialchars(isset($_GET['rn']))){
  $id = $_GET['rn'];

  $checkarticle =  mysqli_query($conn, "SELECT * FROM ebooks WHERE id= '".$id."' ");
  $imagerow = mysqli_fetch_array($checkarticle);
  $image = $imagerow['cover_img'];
  $book=  $imagerow['book'];
  $target_dir ="books/";
  $target_file =$target_dir.$image;
   $target_book =$target_dir.$book;
  $remove= unlink($target_file);
  $removebook= unlink($target_book);



  if ($remove && $removebook) {
   $deletearticle = mysqli_query($conn, "DELETE FROM  ebooks WHERE id = '".$id."' ");
  
if ($deletearticle) {
  $_SESSION['update'] = "<p class='alert alert-success'> Book was successfully deleted</p>";
  header("Location: viewbooks.php");
  exit();

  } else {
  $_SESSION['updatefail'] = "<p class='alert alert-warning'> Input was not deleted</p>";
  header("Location: viewbooks.php");
  exit();
  }



  }else{

$_SESSION['updatefail'] = "<p class='alert alert-warning'> Image was not Removed</p>";
header("Location: viewbooks.php");
exit();

  }
  
  // your issue on this page was that you are still yrt to delete the two images together 
  
}






?>
