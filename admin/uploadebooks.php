<?php
session_start();
include("connection.php");
if (isset($_SESSION['id'])) {
  # code...
}else{
  header('Location:login.php');
}

$error1="";

if (array_key_exists("submit1",$_POST)) {
  if (!$_POST['title1']) {
    $error1.="A Book Title is required <br>";
    
}

    if (!$_FILES['image1']['name']) {
    $error1.=" Book Cover required<br>";
    
}
    if (!$_FILES['book']['name']) {
    $error1.="Please Upload The Book<br>";
    
}

 
if ($error1 !="") {
    $error1 = "Incomplete Input<br>".$error1;
}else{

$target_dir = "books/";
 $target_file = $target_dir . basename($_FILES["image1"]["name"]); 
 $uploadOk=1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

 $target_dir1 = "books/";
 $target_file1 = $target_dir1 . basename($_FILES["book"]["name"]); 
 $uploadOk=1;
 $bookFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
   /* $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;   
    } else {
        $error= "File is not an image.";
          $uploadOk = 0;
    }*/
    //check file size
     if ($_FILES["image1"]["size"] > 3000000) {
    $error1="Sorry, your cover is too large.File should not be more than 3mb.";
      $uploadOk = 0;
  
 }

  if ($_FILES["book"]["size"] > 12000000) {
    $error1="Sorry, your Book is too large.File should not be more than 12mb.";
      $uploadOk = 0;
  
 }
   //Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "JPG" &&  $imageFileType != "JPEG"  &&  $imageFileType != "PNG") {
     $error1="Sorry, only JPG, JPEG, PNG  files are allowed for covers images.";
     $uploadOk = 0;

  }
  
  //Allow certain file formats for pdf
   if ($_FILES['book']['type'] == "application/pdf"){

   }else{
          $error1= "Sorry, only PDF files are allowed.";
          $uploadOk = 0;
   }


  if ($uploadOk == 0) {
    $error1="Sorry, your file was not uploaded.".$error1;
 // if everything is ok, try to upload file
 }  else {
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {

          if (move_uploaded_file($_FILES["book"]["tmp_name"], $target_file1)) {

             $image1=basename( $_FILES["image1"]["name"]);
            $book=basename($_FILES["book"]["name"]);

        $title1=$_POST['title1'];


       
   $sql = "INSERT INTO ebooks (name,cover_img,book) VALUES ('$title1','$image1','$book') ";
    
    if (mysqli_query($conn, $sql)) {
    $success1= "<p class='alert alert-success alert-dismissable'>You have successfully Uploaded Your Book</p>";
} else {
    $error1="There was a Problem uploading Your FIle<br>".mysqli_error($conn);
}
            
          }

            
} else {
        $error1= "Sorry, there was an error uploading your file.".mysqli_error($conn);
    }
 }
 
}
}




 ?>


<!DOCTYPE html>
<html lang="zxx">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LTEN Admin</title>
  <!--form links -->
 <!--  -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-dark/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- plugins:css -->
   <link rel="stylesheet" href="vendors/iconfonts/ti-icons/css/themify-icons.css">
   <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
   <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
   <!-- endinject -->
   <!-- plugin css for this page -->
   <link rel="stylesheet" href="vendors/summernote/dist/summernote-bs4.css">
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="css/vertical-layout-dark/style.css">
   <!-- endinject -->
  <link rel="shortcut icon" href="images/ltenlogo.png" />

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php include 'nav.php';?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                
                
              </ul>
            </div>
           
           
           
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
     
           
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include 'sidebar.php';?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row grid-margin">


 <div class="col-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                   <?php if ($error1 !=""){
    echo "<p class='alert alert-danger alert-dismissable'>$error1</p>";
    }

if (isset($success1)) {
  echo $success1;

}
    ?>
                  <h4 class="card-title">Upload E-Books</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data"  action="">
                    <div class="form-group">
                      <!-- <b>PLEASE NOTE THAT ALL IMAGES MUST BE LANDSCAPE AND MUST NOT EXCEED 600*300</b><br><br> -->
                      <label for="exampleInputName1">Book Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Book Title" name="title1">
                    </div>
                    
                    
                  <div class="form-group">
                      <label>Cover Picture</label><br>
                      <input type="file" name="image1"  class="file-upload-browse btn btn-primary">
                      
                    </div>
                    <div class="form-group">
                      <label>Upload Book</label><br>
                      <input type="file" name="book"  class="file-upload-browse btn btn-primary">
                      
                    </div>
                   <div class="form-group">
                     
                           <div class="row grid-margin">  
                              <div class="col-lg-12">
             
            </div>
               </div>
                 <button type="submit"  name="submit1" class="btn btn-primary mr-2">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>


          
          
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/tinymce/tinymce.min.js"></script>
  <script src="vendors/tinymce/themes/modern/theme.js"></script>
  <script src="vendors/summernote/dist/summernote-bs4.min.js"></script>
  <!-- plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.html"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/editorDemo.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
