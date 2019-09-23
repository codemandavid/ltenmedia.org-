<?php 
session_start();
include("sermonviewpage.php");
include("connection.php");

if (isset($_SESSION['id'])) {
  # code...
}else{
  header('Location:login.php');
}
 ?>




<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LTEN Admin</title>
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
           
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <?php include 'sidebar.php';?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
                <?php 
              
                
               if (isset( $_SESSION['update'])){
              echo $_SESSION['update'];
               unset( $_SESSION['update']);
              }
             

              if (isset( $_SESSION['updatefail'])){
              echo  $_SESSION['updatefail'];
               unset( $_SESSION['updatefail']);
              
              }
             
    ?>
            <div class="card-body">
              <h4 class="card-title">Uploaded Teachings</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Album Name</th>
                            <th>Album Image</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                $query= "SELECT *  FROM album_table $limit";
                $run=mysqli_query($conn,$query);
                $counter = 1; 
                
                while ($fetch= mysqli_fetch_array($run) ) {              
                ?>
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td><?php  echo $fetch['album_name']; ?></td>
                            <td><?php  echo $fetch['album_img']; ?></td>
                          
                            <td>
                               <?php
                    $id=$fetch['id'];
                    echo "<a href='albumdelete.php?rn=$id' class='btn btn-outline-danger'>Delete</a>";
                    ?>
                            </td>
                        </tr>
                         <?php $counter++; ?>
               
               
                <?php } ?> 
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

                  
          </div>
            <nav >
                    <ul class="pagination flex-wrap pagination-rounded-flat pagination-success ">
                      <?php echo  $paginationCtrls ; ?>
                    </ul>
                  </nav>
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
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.html"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
