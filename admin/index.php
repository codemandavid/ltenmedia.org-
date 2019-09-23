<?php 
session_start();
include 'connection.php';

//logout
if (isset($_SESSION['id'])) {
  # code...
}else{
  header('Location:login.php');
}



$error="";
if (isset($_POST['delete'])) {
  $id=$_POST["id"];
  $sql= " DELETE FROM volunteer_table WHERE id='".$id."'  ";
  $query= mysqli_query($conn,$sql);
      if ($query) {
        $error= "Member deleted successfully";
      }else{
        $error="Error Deleting Member " . mysqli_error($conn);
}
      }
  


  

 ?>



<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LTEN | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-dark/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/ltenlogo.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          
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
               
                </li> -->
              </ul>
            </div>
        
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
          
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <?php include 'nav.php';?>
      <!-- partial:partials/_sidebar.html -->
     <?php include 'sidebar.php';?>      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-5 mb-4 mb-xl-0">
                  <h4 class="font-weight-bold">Hi, Welcomeback!</h4>

                     

                  <h1 class="font-weight-normal mb-0"><?php echo $_SESSION['username'];   ?></h1>
                </div>
                <div class="col-12 col-xl-7">
                  <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div class="border-right pr-4 mb-3 mb-xl-0">
                      <p class="text-muted">UPLOADED TEACHINGS</p>
                      <h4 class="mb-0 font-weight-bold"><?php $ok ="SELECT *  FROM sermon_table ";
                    $quick= mysqli_query($conn,$ok); 
                    echo mysqli_num_rows($quick);?></h4>
                    </div>
                    <div class="border-right pr-4 mb-3 mb-xl-0">
                      <p class="text-muted">UPLOADED EVENTS</p>
                      <h4 class="mb-0 font-weight-bold"><?php $ok ="SELECT *  FROM event_table ";
                    $quick= mysqli_query($conn,$ok); 
                    echo mysqli_num_rows($quick);?></h4>
                    </div>
                    <div class="border-right pr-4 mb-3 mb-xl-0">
                      <p class="text-muted">T0TAL DOWNLOADS</p>
                      <h4 class="mb-0 font-weight-bold">NOT AVAILABLE</h4>
                    </div>
                    <!-- <div class="pr-3 mb-3 mb-xl-0">
                      <p class="text-muted">T0TAL DOWNLOADS</p>
                      <h4 class="mb-0 font-weight-bold">4006</h4>
                    </div> -->
                    <!-- <div class="mb-3 mb-xl-0">
                      <a href="logout.php"><button class="btn btn-warning rounded-0 text-white">LOG OUT</button></a>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">CHURCH EVENTS</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php $ok ="SELECT *  FROM event_table ";
                    $quick= mysqli_query($conn,$ok); 
                    echo mysqli_num_rows($quick);?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                <!--   <p class="mb-0 mt-2 text-warning">2.00% <span class="text-body ml-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">REGISTRATION PORTAL</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger">coming soon <span class="text-body ml-1"><small>(Not Available) )</small></span></p>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">AUDIO TEACHINGS</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php $ok ="SELECT *  FROM sermon_table ";
                    $quick= mysqli_query($conn,$ok); 
                    echo mysqli_num_rows($quick);?></h3>
                    <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <!-- <p class="mb-0 mt-2 text-success">10.00%<span class="text-body ml-1"><small>(30 days)</small></span></p> -->
                </div>
              </div>
            </div>
          
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card bg-primary border-0 position-relative">
                <div class="card-body">
                  <p class="card-title text-white">PLEASE TAKE NOTE</p>
                  <div id="performanceOverview" class="carousel slide performance-overview-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-4 item">
                            <div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
                              <div class="icon icon-a text-white mr-3">
                                <i class="ti-cup icon-lg ml-3"></i>
                              </div>
                              <div class="content text-white">
                                <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                  <h3 class="font-weight-light mr-2 mb-1">Password</h3>
                                  <h3 class="mb-0"></h3>
                                </div>
                                <div class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                  <h5 class="mb-0"></h5>
                                  <div class="d-flex align-items-center">
                                    <i class="ti-angle-down mr-2"></i>
                                    <h5 class="mb-0"></h5>
                                  </div>  
                                </div>
                                <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Please Keep all passwords safe and personal and have dedicated systems used for upload. leaving your password on other laptops is very dangerous</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 item">
                            <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                              <div class="icon icon-b text-white mr-3">
                                <i class="ti-bar-chart icon-lg ml-3"></i>
                              </div>
                              <div class="content text-white">
                                <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                  <h3 class="font-weight-light mr-2 mb-1">Crosscheck</h3>
                                  <h3 class="mb-0"></h3>
                                </div>
                                <div class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                  <h5 class="mb-0"></h5>
                                  <div class="d-flex align-items-center">
                                    <i class="ti-angle-down mr-2"></i>
                                    <h5 class="mb-0"></h5>
                                  </div>  
                                </div>
                                <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Carefully Crosscheck all details to  make sure that every single details that is about to go out is thoroughly checked; avoiding typos and offensive materials</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 item">
                            <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                              <div class="icon icon-c text-white mr-3">
                                <i class="ti-shopping-cart-full icon-lg ml-3"></i>
                              </div>
                              <div class="content text-white">
                                <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                  <h3 class="font-weight-light mr-2 mb-1">Cover Images</h3>
                                  <h3 class="mb-0"></h3>
                                </div>
                                <div class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                  <h5 class="mb-0"></h5>
                                  <div class="d-flex align-items-center">
                                    <i class="ti-angle-down mr-2"></i>
                                    <h5 class="mb-0"></h5>
                                  </div>  
                                </div>
                                <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Please make sure that all images for album cover should be slightly landscape annd must not exceed a height of 300px and width of 600px </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-4 item">
                            <div class="d-flex flex-column flex-xl-row mt-4 mt-md-0">
                              <div class="icon icon-a text-white mr-3">
                                <i class="ti-cup icon-lg ml-3"></i>
                              </div>
                              <div class="content text-white">
                                <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                  <h3 class="font-weight-light mr-2 mb-1">Security</h3>
                                  <h3 class="mb-0"></h3>
                                </div>
                                <div class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                  <h5 class="mb-0"></h5>
                                  <div class="d-flex align-items-center">
                                    <i class="ti-angle-down mr-2"></i>
                                    <h5 class="mb-0"></h5>
                                  </div>  
                                </div>
                                <p class="text-white font-weight-light pr-lg-2 pr-xl-5">If by any means, you notice any strange activity on the site, please contact the admin immediaately. watch out for pop ups asking you for permission to do anythin. please ignore them</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 item">
                            <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                              <div class="icon icon-b text-white mr-3">
                                <i class="ti-bar-chart icon-lg ml-3"></i>
                              </div>
                              <div class="content text-white">
                                <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                  <h3 class="font-weight-light mr-2 mb-1">Log Out</h3>
                                  <h3 class="mb-0"></h3>
                                </div>
                                <div class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                  <h5 class="mb-0"></h5>
                                  <div class="d-flex align-items-center">
                                    <i class="ti-angle-down mr-2"></i>
                                    <h5 class="mb-0"></h5>
                                  </div>  
                                </div>
                                <p class="text-white font-weight-light pr-lg-2 pr-xl-5"> Once you are Done with upload and other necessary activity, please log out and close all tabs. dont leave tabs open !! </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 item">
                            <div class="d-flex flex-column flex-xl-row mt-5 mt-md-0">
                              <div class="icon icon-c text-white mr-3">
                                <i class="ti-shopping-cart-full icon-lg ml-3"></i>
                              </div>
                              <div class="content text-white">
                                <div class="d-flex flex-wrap align-items-center mb-2 mt-3 mt-xl-1">
                                  <h3 class="font-weight-light mr-2 mb-1">Futhermore</h3>
                                  <h3 class="mb-0"></h3>
                                </div>
                                <div class="col-8 col-md-7 d-flex border-bottom border-info align-items-center justify-content-between px-0 pb-2 mb-3">
                                  <h5 class="mb-0"></h5>
                                  <div class="d-flex align-items-center">
                                    <i class="ti-angle-down mr-2"></i>
                                    <h5 class="mb-0"></h5>
                                  </div>  
                                </div>
                                <p class="text-white font-weight-light pr-lg-2 pr-xl-5">Any other informations will be communicated HERE. Thank you</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#performanceOverview" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#performanceOverview" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
          <div class="row">
         
            <div class="col-md-5 grid-margin stretch-card">
							
            </div>
          </div>
        
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">

            </div>
            <div class="col-md-4 stretch-card">
              
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
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.html"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>


</html>

