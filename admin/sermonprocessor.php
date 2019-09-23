<?php
session_start();
include("connection.php");

//$error="";
//$success="";
if (array_key_exists("submit",$_POST)) {



    if (!$_FILES['audio_file']['name']) {
    $_SESSION['error'].="<p class='alert alert-danger alert-dismissable'>Sermon is required</p>";
    
}
if (!$_POST['title']) {
   $_SESSION['error'].="<p class='alert alert-danger alert-dismissable'>Sermon Title is required</p>";
    
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

 
  //following function will move uploaded file to audios folder. 
if(move_uploaded_file($_FILES['audio_file']['tmp_name'], $target_path)) {
   $file_name=basename( $_FILES["audio_file"]["name"]);


 
  //insert query if u want to insert file

        $title=$_POST['title'];
        $date=date('d M Y');
        $theid= $_POST['albums_id'];
         
   $sql = "INSERT INTO sermon_table (album_id,sermon_title,sermon,date)
VALUES ('$theid','$title','$file_name','$date')";
    
    if (mysqli_query($conn, $sql)) {
    $_SESSION['success']= "<p class='alert alert-success alert-dismissable'>You have successfully created Your Sermon</p> ";

 header("location:sermonupload.php");
} else {
   $_SESSION['error']="There was a Problem uploading Your FIle<br>".mysqli_error($conn);
   header("location:sermonupload.php"); 
} 
    

} else {
        $_SESSION['error']= "Sorry, there was an error uploading your file.".mysqli_error($conn);
    }
    header("location:sermonupload.php");


}
}

?>