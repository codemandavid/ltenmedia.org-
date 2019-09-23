<?php
session_start();
include("connection.php");
if (isset($_SESSION['id'])) {
  # code...
}else{
  header('Location:login.php');
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
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
               
               
               
               
               
              </ul>
            </div>
           
            
          </div>
          <!-- To do section tab ends -->
          <!--  -->
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
                  <h4 class="card-title">UPLOAD TRACKS TO ALBUMS</h4>
                  <p class="card-description">
                  </p>

                    <?php 
if (isset($_SESSION['error']) ){
    echo $_SESSION['error'];
   unset($_SESSION['error']); 
 }

else if (isset($_SESSION['success'])) {
  echo $_SESSION['success'];
unset($_SESSION['success']);
}
    ?>
                  <form  method="post" enctype="multipart/form-data" action="sermonprocessor.php">

                     <div class="form-group col-md-6 grid-margin stretch-card">
                    <label>Select Album</label>
                    <select class="js-example-basic-single w-100"  name="albums_id">

                       <?php

                $query= " SELECT * FROM album_table ORDER BY id DESC ";
                $sav=mysqli_query($conn,$query);
                    while ($bring=mysqli_fetch_array($sav)) {
                 
      
               ?>
                      <option value="<?php echo  $bring['id']?>"> <?php echo $bring['album_name']; ?> </option>

                       <?php } ?>
                      
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Sermon Name & Track No</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Sermon Title" name="title" >
                    </div>
               
                   <div class="form-group">
                     
                           <div class="row grid-margin">  
                              <div class="col-lg-12">
                                  <div class="form-group file-upload-browse btn btn-primary">
                      <label>File upload</label>
                      <input type="file" name="audio_file">
              </div> 
                              </div>

                   </div>                          </div>
                 <button type="submit" class="btn btn-primary mr-2"  name="submit">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>


          
          
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <!--  -->
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
