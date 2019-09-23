<?php
include ("admin/connection.php");
include ("sermonpagination.php");


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
    			<h2>Sermon Series</h2>
        	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.html">Home</a></li>
            	<li class="active">Sermon series</li>
          	</ol>
        </div>
    </div>
  <?php
                            $query="SELECT * FROM album_table ORDER BY id DESC $limit";
                            $run=mysqli_query($conn,$query);
                            $fetch=mysqli_fetch_array($run);
                                $id=$fetch['id'];

                                if ($fetch) {
                                  
                                


                                ?>


    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
                <div class="row">
                    <ul class="isotope-grid">
                         <?php
                            $query="SELECT * FROM album_table ORDER BY id DESC $limit";
                            $run=mysqli_query($conn,$query);
                            while ($fetch=mysqli_fetch_array($run)) {
                                $id=$fetch['id'];
                                ?>
                        <li class="col-md-4 col-sm-6 sermon-item grid-item format-standard">
                            <div class="grid-item-inner">
                             	<a  class="media-box">
                                	<img src="admin/album/<?php echo $fetch['album_img'] ?>" width="600px" height="300px" alt="">
                                </a>
                                <div class="grid-content">
                                	   <span class="sermon-series-date"><i style="font-size:10px; ">By : Light of Truth Equipping Network</i></span>
                                    <h3><a href="sermon-details.php?rr=<?php echo $id ?>"><?php echo $fetch['album_name']; ?></a></h3>
                                   
                                    
                                   <a href="sermon-details.php?rr=<?php echo $id ?>" class="btn btn-primary">View Tracks<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                      <?php } ?>
                    </ul>
                </div>
         	</div>
        </div>
   	</div>
    <nav aria-label="Page navigation example" style="margin-left:40%;  ">
  <ul class="pagination">
      <?php echo  $paginationCtrls ; ?>
  </ul>
    </nav>
    <?php  }else{
    header("location:404.html");
   } ?>
    <!-- End Body Content -->
    
    <!-- Start site footer -->
     <?php include("footer.php") ?>

</body>
</html>