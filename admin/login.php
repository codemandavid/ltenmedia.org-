<?php
session_start();

include('connfile.php');


$error="";
if (array_key_exists("submit",$_POST)) {

    if (!$_POST['username']) {
    $error.="Username required<br>";
    
}
if (!$_POST['password']) {
    $error.="a password is required <br>";
    
}

if ($error !="") {
    $error = "there was an error in your form<br>".$error;
}else{



    $query= " SELECT id FROM admin WHERE username ='".mysqli_real_escape_string($conn, $_POST['username'])."' ";

                        $result= mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                           
         
                        $row = mysqli_fetch_array($result);       
                        $hashedpassword = md5(md5($row['id']).$_POST['password']);
                        $query= "SELECT * FROM admin WHERE username = '".mysqli_real_escape_string($conn, $_POST['username'])."' AND password ='".$hashedpassword."'  ";
                        $run=mysqli_query($conn, $query);

                        if (mysqli_num_rows($run) > 0) {
                           
                           
                            $_SESSION['id']= $row['id'];
                             $_SESSION['username']=$_POST['username'];
                        ?>
                        <script>
                        window.location="index.php";    
                            
                        </script>
                            //header("Location:index.php");
<?php
                        } else{

                            $error="User not found";
                         }
                
             }else{
                 $error="Incorrect Username";
             }
}

}




?>



<!DOCTYPE html>
<html lang="en">



<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!-- Required meta tags -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LTEN Admin</title>
  <!-- plugins:css -->
  <link rel="shortcut icon" href="images/ltenlogo.png" />
  <link rel="stylesheet" href="vendors/iconfonts/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-dark/style.css">
  <!-- endinject -->
 
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/ltenlogo.png" alt="logo">
              </div>
              <h4>LTEN ADMIN</h4>
              <h6 class="font-weight-light">Official Admin Panel</h6>
              <?php if ($error !=""){
    echo "<p class='alert alert-danger alert-dismissable'>$error</p>";
    }

    ?>
              <form class="pt-3" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="username" class="form-control form-control-lg border-left-0" placeholder="Username">
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="password" id="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Remember me 
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                   <input type="submit"  class="btn btn-block btn-primary btn-lg href="" name="submit" value="Login">
                </div>
                
               
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2019  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
</body>


</html>
