<?php
session_start();
include("connection.php");
if (isset($_SESSION['id'])) {
  # code...
}else{
  header('Location:login.php');
}

$error="";
if (array_key_exists("submit",$_POST)) {

 if (!$_FILES['image']['name']) {
    $error.=" Event Image required<br>";
    
}
    
if (!$_POST['title']) {
    $error.="An Event Title is required <br>";
    
}
if (!$_POST['date']) {
    $error.="Event Date is required <br>";
    
}
if (!$_POST['address']) {
    $error.="Event Address is required <br>";
    
}
if (!$_POST['details']) {
    $error.="Event details is required <br>";
    
}

if ($error !="") {
    $error = "Incomplete Input<br>".$error;
}else{

  $target_dir = "events/";
 $target_file = $target_dir . basename($_FILES["image"]["name"]); 
 $uploadOk=1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

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
     if ($_FILES["image"]["size"] > 5000000) {
    $error="Sorry, your file is too large.File should not be more than 5mb.";
      $uploadOk = 0;
  
 }
 // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" && $imageFileType != "JPG" &&  $imageFileType != "JPEG" &&  $imageFileType != "PNG") {
     $error="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;

  }

  if ($uploadOk == 0) {
    $error="Sorry, your file was not uploaded.".$error;
 // if everything is ok, try to upload file
 }  else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image=basename( $_FILES["image"]["name"]);

        $title=$_POST['title'];
        $date=$_POST['date'];
        $address=$_POST['address'];
         $details=$_POST['details'];

   $sql = "INSERT INTO event_table (event_title,address,event_date,details,event_img)
VALUES ('$title','$address','$date','$details','$image')";
    
    if (mysqli_query($conn, $sql)) {
    $success= "You have successfully created Your Event ";
} else {
    $error="There was a Problem uploading Your FIle<br>";
} 
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
  <link rel="stylesheet" href="http://www.urbanui.com/">
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
   <!--lastly added-->

 <link rel="stylesheet" href="csss/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="csss/bootstrap-wysihtml5.css" />
<!--  <link href="font-awesome/csss/font-awesome.css" rel="stylesheet" /> -->
<!--lastly added-->



</head>

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
         
            
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
             
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
                   <?php if ($error !=""){
    echo "<p class='alert alert-danger alert-dismissable'>$error</p>";
    }

if (isset($success)) {
  echo "<p class='alert alert-success alert-dismissable'>$success</p>";
}
    ?>
                  <h4 class="card-title">Upload Events</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample"  method="post" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                      <label for="exampleInputName1">Event Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Event Title" name="title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Event Date</label>
                      <input type="text" class="form-control" id="exampleInputEmail3"  placeholder="Event Date (e.g 20-23,January, 2019)" name="date" >
                    </div>



                    <div class="form-group">
                      <label for="exampleInputPassword4">Event Address</label>
                      <input type="text" class="form-control" id="exampleInputPassword4"placeholder="Event Address(e.g PO Box 16 Collins Street Benin City)" name="address" >
                    </div>
                    
                <div class=" file-upload-browse btn btn-primary">
                      <label>File upload</label>
                      <input type="file"  name="image">
              </div> 
                     
                    
                    </div>
                    <div class="form-group">
                     <div class="controls">
              <label class="control-label">Blog Details</label>
              <textarea class="textarea_editor span10" rows="6" placeholder=" Event Details ..." name="details"></textarea>
            </div>
</div>
          </div>
              
            </div>
               </div>
                <div class="row grid-margin">  
                           <div class="col-lg-4">
                 <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    </div>
                  </div>
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
  <!--lastly  added -->
 <!--  <script src="jss/jquery.min.js"></script> 
<script src="jss/jquery.ui.custom.js"></script> 
<script src="jss/bootstrap.min.js"></script> 
<script src="jss/bootstrap-colorpicker.js"></script> 
<script src="jss/bootstrap-datepicker.js"></script>  -->
<!-- <script src="jss/jquery.toggle.buttons.js"></script>  -->
<script src="jss/masked.js"></script> 
<script src="jss/jquery.uniform.js"></script> 
<script src="jss/select2.min.js"></script> 
<script src="jss/matrix.js"></script> 
<script src="jss/matrix.form_common.js"></script> 
<script src="jss/wysihtml5-0.3.0.js"></script> 
<script src="jss/jquery.peity.min.js"></script> 
<script src="jss/bootstrap-wysihtml5.js"></script> 
<script>
  $('.textarea_editor').wysihtml5();
</script>
</body>



</html>
