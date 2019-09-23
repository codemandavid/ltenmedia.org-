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


if (!$_POST['password']) {
    $error.="An Admin Password is required <br>";
    
}
if (!$_POST['password2']) {
    $error.=" Please Enter Your New Password <br>";
    
}
if (!$_POST['password3']) {
    $error.=" Please Confirm Your Password <br>";
    
}

 if (  ($_POST["password3"]) != ($_POST["password2"]) ) {
        $error= "password mismatch ! Please Type It Again";
      }
 
if ($error !="") {
    $error = "Incomplete Input<br>".$error;
} else {

$oldpassword=$fetch['password'];
      $id=$_SESSION['id'];
      $hashednewpassword=md5(md5($id).$_POST['password2']);
       //check if content and heading already exist
  
      $sql="SELECT password FROM admin WHERE id = '".$_SESSION ['id']."' ";
      $movequery= mysqli_query($conn, $sql);
      $fetch=mysqli_fetch_array($movequery);
      

      
          

              if ($oldpassword == $hashednewpassword) {
                 $update="UPDATE admin SET password = '".$hashednewpassword."'  " ;
          if ( mysqli_query($conn,$update)) {

             $success = " Your Password Has been Changed Successfully";
            
           }else{

            $error= " Something went Wrong . please Try Again ";
                
              }


       
  } else{

            $error= " Your Password Does not match. please Try Again ";
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
                   <?php if ($error !=""){
    echo "<p class='alert alert-danger alert-dismissable'>$error</p>";
    }

if (isset($success)) {
  echo "<p class='alert alert-success alert-dismissable'>$success</p>";

}
    ?>
                  <h4 class="card-title"> CHANGE YOUR PASSWORD </h4>
                  <p class="card-description">
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data" >
                    
                    
                    
                 <div class="form-group">
                      
                      <label for="exampleInputName1">Your Previous Password</label>
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Choose your Password " name="password">
                    </div>
    
                 <div class="form-group">
                      
                      <label for="exampleInputName1">Your New Password</label>
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Confirm your Password " name="password2">
                    </div>
                   <div class="form-group">
                      
                      <label for="exampleInputName1">Confirm Password</label>
                      <input type="password" class="form-control" id="exampleInputName1" placeholder="Confirm your Password " name="password3">
                    </div>
    
                   <div class="form-group">
                     
                           <div class="row grid-margin">  
                              <div class="col-lg-12">  </div>
             
          
          </div>
               </div>
                 <button type="submit"  name="submit" class="btn btn-primary mr-2">Submit</button>
                    
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
