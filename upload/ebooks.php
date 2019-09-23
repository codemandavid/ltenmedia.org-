<?php

include("admin/connection.php");
include("bookpage.php");

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
<link href='vendor/fullcalendar/fullcalendar.css' rel='stylesheet'>
<link href='vendor/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print'>
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<link href="css/custom.css" rel="stylesheet" type="text/css"><!-- CUSTOM STYLESHEET FOR STYLING -->
<!-- Color Style -->
<link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
<link href="style-switcher/css/style-switc.css" rel="stylesheet" type="text/css">

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
    <div class="page-header parallax clearfix">
        <div class="title-subtitle-holder">
        	<div class="title-subtitle-holder-inner">
    			<h2>E-Books</h2>
        	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li class="active">Ebooks</li>
          	</ol>
        </div>
    </div>
    <!-- Start Body Content -->

<?php 
                $query= "SELECT *  FROM ebooks  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);  
                  


                  if ($fetch) {
                                
                                          
                ?>




  	<div class="main" role="main">
    	<div id="content" class="content full">
      		<div class="container">
                <div class="row">
                  	<ul class="sort-destination isotope-grid" data-sort-id="gallery">
                    <?php 
                $query= "SELECT *  FROM ebooks  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {
                             
                ?>
                    	<li class="col-md-4 col-sm-4 grid-item format-image">
                      		<div class="grid-item-inner"> <a href="admin/books/<?php  echo $fetch['book']; ?>" download="<?php  echo $fetch['name']; ?>"class="media-box "> <img src="admin/books/<?php echo $fetch['cover_img'] ?>" alt=""> </a> </div>
                    	</li>
                    	  <?php } ?>
                    	
                    	
                  	</ul>
           		</div>
                <!-- Pagination -->
              <ul class="pagination">
                     <?php echo  $paginationCtrls ; ?>
                </ul>
         	</div>
        </div>
   	</div>
    <!-- End Body Content -->
    <?php }else {
header("location:404.html");

      } ?>
    
    <!-- Start site footer -->
    <?php include("footer.php") ?>
</body>
</html>