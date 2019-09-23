<?php

include("admin/connection.php");
include ('eventspagination.php');
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
    <div class="page-header parallax clearfix">
    	<div class="page-header-overlay" style="background-image:url(images/ph4.jpg);"></div>
        <div class="title-subtitle-holder">
        	<div class="title-subtitle-holder-inner">
    			<h2>Ministry Events</h2>
        	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li class="active">Ministry Events</li>
          	</ol>
        </div>
    </div>
    <!-- Start Body Content -->
<?php 
                $query= "SELECT *  FROM event_table  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);  
                  $id=$fetch['id'];  


                  if ($fetch) {
                                
                                          
                ?>

  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
               
                <div class="row">

                    <ul class="sort-destination" data-sort-id="events">
                        <?php 
                $query= "SELECT *  FROM event_table  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {
                  $id=$fetch['id'] ;              
                ?>
                        <li class="col-md-4 col-sm-6 event-list-item event-item event-dynamic grid-item format-standard celebrations">
                            <div class="grid-item-inner">
                             	<a  class="media-box">
                                	<img src="admin/events/<?php echo $fetch['event_img'] ?>" alt="">
                                </a>
                                <div class="grid-content">
                                	<h3><a href="event-details.php?id=<?php echo $id ?>" class="event-title"><?php  echo $fetch['event_title']; ?></a></h3>
                                    <span class="meta-data"><i class="fa fa-calendar"></i> <span class="event-date"><?php  echo $fetch['event_date']; ?></span>  <span class="event-time"></span></span>
                                    <span class="meta-data event-location-address"><i class="fa fa-map-marker"></i> <?php  echo $fetch['address']; ?></p></span>
                                </div>
                                <div class="grid-footer clearfix">
                            		<a  class="pull-right btn btn-primary btn-sm  event-register-button">Register</a>
                                    <ul class="action-buttons">
                                        <li title="Share event"><a href="" data-trigger="focus" data-placement="right" data-content="" data-toggle="popover" data-original-title="Share Event" class="event-share-link"><i class="icon-share"></i></a></li>
                                        <li title="Get directions" class="hidden-xs"><a class="cover-overlay-trigger event-direction-link"><i class="icon-compass"></i></a></li>
                                        <li title="Contact event manager"><a href="" data-toggle="modal" data-target="#Econtact" class="event-contact-link"><i class="icon-mail"></i></a></li>
                                    </ul>
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

      <?php }else {
header("location:404.html");

      } ?>
    <!-- End Body Content -->
    
    <!-- Start site footer -->
    <?php include("footer.php") ?>
</body>
</html>