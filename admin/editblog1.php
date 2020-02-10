<?php
 session_start();

include('connfile.php');

if (isset($_SESSION['id'])) {
  # code...
}else{
  header('Location:login.php');
}


$error="";
if (htmlspecialchars(isset($_GET['po'])))  {
  $id= $_GET['po'];
}

if (array_key_exists("submit",$_POST)) {

$id= $_GET['po'];
   
if (!$_POST['title']) {
    $error.="A Blog Title is required <br>";
    
}


if (!$_POST['details']) {
    $error.="Blog details is required <br>";
    
}

if ($error !="") {
    $error = "Incomplete Input<br>".$error;
}else{

        $title=$_POST['title'];
        $details=$_POST['details'];
        

    $sql = "UPDATE blog SET blog_title ='$title', blog_details='$details' WHERE id = '".$id."'  ";

    if (mysqli_query($conn, $sql)) {
      $_SESSION['update'] = "<p class='alert alert-success'>You have successfully edited Your Blog</p>";
  header("Location:editblog.php");
  exit();
  
} else {
   $_SESSION['updatefail'] = "<p class='alert alert-danger'>There was a Problem editing your Blogpost. Try Again</p>".mysqli_error($conn);
  header("Location: editblog.php");
  exit();
    //$error="<br>".mysqli_error($conn);
}     
}
 }
    
 ?>





<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.urbanui.com/justdo/template/demo/vertical-default-dark/pages/forms/text_editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Feb 2019 12:34:58 GMT -->
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
   <style type="text/css">
  .active-pink-textarea.md-form label.active {
  color: #f48fb1;
}
.pink-textarea textarea.md-textarea:focus:not([readonly]) {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.pink-textarea.md-form .prefix.active {
  color: #f48fb1;
}
.active-pink-textarea.md-form textarea.md-textarea:focus:not([readonly])+label {
  color: #f48fb1;
}

</style>s
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
                  <h4 class="card-title">Edit Blog</h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample"  method="post"  action="">

                      <?php  
       $query="SELECT * FROM blog WHERE id = '".$id."' ";
       $run =mysqli_query($conn,$query);
       $fetch= mysqli_fetch_array($run);
        ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Blog Title</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Event Title" name="title" value=" <?php echo $fetch['blog_title'];  ?> " />
                    </div>
                     
                    </div>
                   <div class="form-group">
                     
                           <div class="row grid-margin">  
                              <div class="col-lg-12">
            
                 
                    <div class="form-group">
                     <label for="form23">Blog Details</label>
<div class="md-form mb-4 pink-textarea active-pink-textarea-2">
  <i class="fas fa-angle-double-right prefix"></i>
  <textarea id="form23" class="md-textarea form-control" rows="3" name="details">
    <?php echo $fetch['blog_details'];  ?>

  </textarea>
 
</div>
</div>
</div>
              
            </div>
               </div>
                 <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    
                  </form>
                </div>
              </div>
            </div>


          
          
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
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


<!-- Mirrored from www.urbanui.com/justdo/template/demo/vertical-default-dark/pages/forms/text_editor.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Feb 2019 12:34:58 GMT -->
</html>
