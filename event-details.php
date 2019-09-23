<?php
include("admin/connection.php");

if (isset($_GET['id'])) {
  $newid= $_GET['id'];
}
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
<!-- SCRIPTS
  ================================================== -->
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body class="single-event">

<div class="body"> 
	<!-- Start Site Header -->
	<?php include("header.php");?>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li><a href="events.php">Events</a></li>
            	<li class="active"></li>
          	</ol>
        </div>
    </div>
    <!-- Start Body Content -->



  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="single-event-content event-list-item event-dynamic">
                <div class="container">
                    <div class="row">

                         <?php 
                $query= "SELECT *  FROM event_table WHERE id ='".$newid."'  ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);
                
                if ($fetch) {
                
               

                ?>
                        <div class="col-md-3 col-sm-4">
                        	<h2 class="event-title"><?php  echo $fetch['event_title']; ?></h2>
                            <span class="event-date hidden">06 feb, 2015</span>
      						<span class="hidden">From <span class="event-time">11 AM</span> to 4 PM</span>
                            <span class="meta-data event-location-address"><i class="fa fa-map-marker"></i> <?php  echo $fetch['address']; ?></span>
                            <hr class="sm">
                            <a  class="event-title hidden"></a>
                            <ul class="list-group">
                              	<li class="list-group-item"> <span class="badge">0816 - 879 - 7332 </span> Call </li>
                              	<li class="list-group-item">
                            <ul class="action-buttons">
                                <li title="Share event"><a href="" data-trigger="focus" data-placement="top" data-content="" data-toggle="popover" data-original-title="Share Event" class="event-share-link"><i class="icon-share"></i></a></li>
                               	<li title="Get directions" class="hidden-xs"><a  class="cover-overlay-trigger"><i class="icon-compass"></i></a></li>
                                <li title="Contact event manager"><a href="" data-toggle="modal" data-target="" class="event-contact-link"><i class="icon-mail"></i></a></li>
                                <li title="Contact event manager"><a href=""><i class="icon-printer"></i></a></li>
                            </ul></li>
                            </ul>
                            <a href="" class="btn btn-primary btn-block btn-lg event-register-button">Book Tickets</a>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<div class="event-details">
                            	<div class="event-details-left">
                           			<img src="admin/events/<?php echo $fetch['event_img'] ?>" alt="" class="temp-thumbnail">
                                    <div class="clearfix"></div>
                                    <div class="col-md-12">
                                    	<p><strong><?php  echo $fetch['details']; ?></strong></p>
                                    </div>
                               	</div>
                                <div class="event-details-right">
                           			<h3 class="heading-wbg">The Schedule</h3>
                                    <div class="event-schedule">
                                    	<div class="timeline"></div>
                                        <div class="event-prog">
                                        	<span class="timeline-stone"></span>
                                            <div class="event-prog-content">
                                            	<div class="event-pro-tag label-warning" data-appear-animation="fadeInRight"><i class="icon icon-coffee"></i></div>
                                    			<strong><i class="fa fa-clock-o"></i></strong>
                                                <span>All schedules will be communicated shortly</span>
                                            </div>
                                       	</div>
                                        <div class="event-prog">
                                        	<span class="timeline-stone"></span>
                                            <div class="event-prog-content">
                                    			<strong><i class="fa fa-clock-o"></i> </strong>
                                                <span></span>
                                            </div>
                                       	</div>
                                        <div class="event-prog">
                                        	<span class="timeline-stone"></span>
                                            <div class="event-prog-content">
                                    			<strong><i class="fa fa-clock-o"></i> </strong>
                                                <span></span>
                                            </div>
                                       	</div>
                                        <div class="event-prog">
                                        	<span class="timeline-stone"></span>
                                            <div class="event-prog-content">
                                    			<strong><i class="fa fa-clock-o"></i> </strong>
                                                <span></span>
                                            </div>
                                       	</div>
                                        <div class="event-prog">
                                        	<span class="timeline-stone"></span>
                                            <div class="event-prog-content">
                                            	<div class="event-pro-tag label-info" data-appear-animation="fadeInRight"><i class="icon icon-dish-fork"></i></div>
                                    			<strong><i class="fa fa-clock-o"></i> </strong>
                                                <span></span>
                                            </div>
                                       	</div>
                                        <div class="event-prog">
                                        	<span class="timeline-stone"></span>
                                            <div class="event-prog-content">
                                    			<strong><i class="fa fa-clock-o"></i> </strong>
                                                <span></span>
                                            </div>
                                       	</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
           	</div>
        </div>
   	</div>

   <?php  }else{
    header("location:404.html");
   } ?>
    <!-- End Body Content -->
    
    <!-- Start site footer -->
     <?php include("footer.php") ?>
</body>
</html>