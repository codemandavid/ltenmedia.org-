<?php 
include("admin/connection.php");

 ?>
 <!DOCTYPE HTML>
<html class="no-js">
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Light Of Truth Equipping Network</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="vendor/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
<link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="images/ltenlogo.png">
<!-- SCRIPTS
  ================================================== -->
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
  <div class="body"> 
  <!-- Start Site Header -->
  <?php include("header.php");?>
  <!-- End Site Header -->
    <!-- Start Page Header -->
    <div class="page-header parallax clearfix" style="background-image:url(images/ph8.jpg);">
        <div class="title-subtitle-holder">
          <div class="title-subtitle-holder-inner">
          <h2>Search Results</h2>
          </div>
        </div>
    </div>
</div>


<div class="main" role="main">
      <div id="content" class="content full">
          <div class="container">
                <div class="row">
        
                    <ul class="isotope-grid">


<?php 
$error="";
if (isset($_GET['rr'])) {
  $year= $_GET['rr'];
}

 $query= "SELECT *  FROM album_table WHERE Year ='".$year."'  ";
                $run=mysqli_query($conn,$query);
                // $fetcharray= mysqli_fetch_array($run);

                
  while($fetch = mysqli_fetch_array($run)){
            ?>
                <li class="col-md-4 col-sm-6 sermon-item grid-item format-standard">
                            <div class="grid-item-inner">
                              <a  class="media-box">
                                  <img src="admin/album/<?php echo $fetch['album_img'] ?>" alt="">
                                </a>
                                <div class="grid-content">
                                  <div class="meta-data">Year Series : <a ><?php echo $fetch['year'];  ?></a></div>
                                  <h3><a href="sermon-details.php?rr=<?php echo $fetch['rr'] ?>"><?php echo $fetch['album_name']; ?></a></h3>
                                   
                                    <a href="sermon-details.php?rr=<?php echo $fetch['rr'] ?>" class="btn btn-primary">View Tracks<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                        
                
            <?php } ?>
                
            
                    </ul>
                     <?php if ($error !=""){
    echo "<h1 class='alert alert-danger alert-dismissable'>$error</h1>";
    }


    ?>
                </div>
          </div>
        </div>
    </div>

    </body>
    </html>
