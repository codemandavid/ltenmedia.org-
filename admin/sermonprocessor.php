<?php
session_start();
include('connfile.php');

//$error="";
//$success="";
if (array_key_exists("submit",$_POST)) {



    if (!$_FILES['audio_file']['name']) {
    $_SESSION['error'].="<p class='alert alert-danger alert-dismissable'>Sermon is required</p>";
    
}
 
if (!$_POST['title']) {
   $_SESSION['error'].="<p class='alert alert-danger alert-dismissable'>Sermon Title is required</p>";
    
}
if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",
  $_POST['title'])) {
    $_SESSION['error'].="<p class='alert alert-danger alert-dismissable'>You cant Put Urls</p>";
    }
if (($_SESSION['error'] != "")) {
    $_SESSION['error']= "<p class='alert alert-danger alert-dismissable'>Incomplete Input</p>".$_SESSION['error'];
     header("location:sermonupload.php");
}else{
  $file_name = basename($_FILES['audio_file']['name']);


 //target path where u want to store file.
   // Where the file is going to be placed
  $target_dir = "tracks/";
 $target_path = $target_dir.basename($_FILES["audio_file"]["name"]);
 $audioFileType = pathinfo($target_file,PATHINFO_EXTENSION);


//check for file type
if ($_FILES['audio_file']['type'] == "audio/mp3" || $_FILES['audio_file']['type'] == "audio/wma" || $_FILES['audio_file']['type'] == "audio/MP3" || $_FILES['audio_file']['type'] == "audio/wav" ){

if(move_uploaded_file($_FILES['audio_file']['tmp_name'], $target_path)) {
   $file_name=basename( $_FILES["audio_file"]["name"]);


 
  //insert query if u want to insert file

        $title= htmlspecialchars($_POST['title']);
        $date=date('d M Y');
        $theid= htmlspecialchars($_POST['albums_id']);
         
   $sql = "INSERT INTO sermon_table (album_id,sermon_title,sermon,date)
VALUES ('$theid','$title','$file_name','$date')";
    
    if (mysqli_query($conn, $sql)) {
    $_SESSION['success']= "<p class='alert alert-success alert-dismissable'>You have successfully created Your Sermon</p> ";

 header("location:sermonupload.php");
} else {
   $_SESSION['error']="There was a Problem uploading Your FIle<br>".mysqli_error($conn);
   header("location:sermonupload.php"); 
} 
    

}

   }else{
          $_SESSION['error'].="<p class='alert alert-danger alert-dismissable'>Only MP3 Files is allowed</p>";
          
   }
 
} 

}else {
        $_SESSION['error']= "Sorry !! Please make Proper Upload .".mysqli_error($conn);
    }
    header("location:sermonupload.php");



?>