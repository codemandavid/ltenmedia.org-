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
<link href='vendor/fullcalendar/fullcalendar.css' rel='stylesheet'>
<link href='vendor/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print'>
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
	<!--  -->
            <!-- Main Navigation -->
          <?php include("header.php");?>
            <a href="index.php" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
    	</div>
	</header>
	<!-- End Site Header -->
    <!-- Start Page Header -->
    <div class="page-header parallax clearfix">
        <div class="title-subtitle-holder">
        	<div class="title-subtitle-holder-inner">
    			<h2>Blog Details</h2>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li class="active">Blog Post</li>
          	</ol>
        </div>
    </div>
    
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
                <div class="row">
                	<div class="col-md-8">

                        <article class="single-post format-standard">
                             <?php 
                $query= "SELECT *  FROM blog WHERE id ='".$newid."'  ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);
                
                 ?>
                        	<div class="title-row">
                      			<a href="index.htm#comments" class="comments-go" title="10 comments"><i class="icon-dialogue-text"></i></a>
                        		<h2><?php  echo $fetch['blog_title']; ?></h2>
                        	</div>
                           	<div class="meta-data">
                            	<span><i class="fa fa-calendar"></i><?php  echo $fetch['blog_date']; ?> <a >
                                    Lten info</a></span>
                            	<!-- <span><i class="fa fa-archive"></i> <a href="index.htm#">General</a>, <a href="index.htm#">Uncategorized</a></span> -->
                           	</div>

                            <div class="spacer-30"></div>
                           <!--  <div class="post-media">
                                <a  class="media-box"><img src="images/slide1.jpg" alt="" class="post-thumb"></a>
                            </div> -->
                            <div class="post-content">
                                <p><?php  echo $fetch['blog_details']; ?></p>
                            </div>
                        <!-- 	<div class=""><i class="fa fa-tags"></i> <a href=""></a> <a href=""></a></div> -->
                            <div class="social-share-bar">
                                <h4><i class="fa fa-share-alt"></i> Share</h4>
                                <!-- <ul class="social-icons-colored">
                                    <li class="facebook"><a><i class="fa fa-facebook"></i></a></li>
                                    <li class="vimeo"><a > </a></li>
                                    <li class="twitter"><a></i></a></li>
                                    <li class="googleplus"><a></i></a></li>
                                </ul> -->
                            </div>
                        </article>
                            
                        <!-- Post Comments -->
                     
                    </div>
                    <div class="col-md-4">
                      
                    	<div class="widget sidebar-widget widget_categories">
                        	<h3 class="widgettitle">Other Blog News</h3>
              				<ul>
                                 <?php 
                $query1= "SELECT *  FROM blog  ORDER BY id  DESC LIMIT 8";
                $run1=mysqli_query($conn,$query1);
                 while ($fetch1= mysqli_fetch_array($run1) ) {
                    $id1=$fetch1['id'] ;
                    $title=$fetch1['blog_title']; 
                ?>
                				<li><?php echo "<a href='blog-details.php?id=$id1'> $title </a>"; ?> (<?php echo $fetch1['blog_date']; ?>)</li>

                			  <?php }?>	
              				</ul>
                        </div>
                           
                    	
                    </div>
                    
                </div>
                </div>
         	</div>
        </div>
   	    </div>
        <?php  //}else{
                // header("location:404.html");
     
                //} ?>
           </div>     
    <!-- End Body Content -->
    
    <!-- Start site footer -->
     <?php include("footer.php") ?>
</body>
</html>