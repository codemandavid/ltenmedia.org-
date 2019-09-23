<?php

include("admin/connection.php");
include ('blogpagination.php');
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
	<?php include("header.php");?>
	<!-- End Site Header -->
    <!-- Start Page Header -->
    <div class="page-header parallax clearfix">
    	<div class="page-header-overlay" style="background-image:url(images/ph4.jpg);"></div>
        <div class="title-subtitle-holder">
        	<div class="title-subtitle-holder-inner">
    			<h2>LTEN Blog</h2>
        	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li class="active">Blog</li>
          	</ol>
        </div>
    </div>
    <!-- Start Body Content -->

    <?php 
                $query= "SELECT *  FROM blog  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                $fetch= mysqli_fetch_array($run);  
                  $id=$fetch['id'];  


                  if ($fetch) {
                                
                                          
                ?>

  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
                <div class="row">
                    <ul class="isotope-grid">

                             <?php 
                $query= "SELECT *  FROM blog  ORDER BY id  DESC $limit ";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {
                  $id=$fetch['id'] ;              
                ?>
                        <li class="col-md-4 col-sm-6 blog-item grid-item format-standard">
                            <div class="grid-item-inner">
                            	<div class="post-media">
                               		<!-- <a href="blog-post.html" class="media-box"><img src="images/slide1.jpg" alt="" class="post-thumb"></a> -->
                                </div>
                                <div class="grid-content">
                                	<h3 class="post-title btn btn-primary btn-lg"><a href="blog-details.php?id=<?php echo $id ?>"><?php  echo $fetch['blog_title']; ?></a></h3>
                              		<p><?php  $string= $fetch['blog_details']; 
               
                                      //strip tag to avoid breaking any html
                                    $stringstrip=strip_tags($string);
                                    if (strlen($stringstrip) > 100) {
                                     //truncate string
                                     $stringcut= substr($stringstrip, 0, 100);
                                       $endpoint=strrpos($stringcut, ' ');
                                     //if string doesn't contain any space then it will cut without word basis
                                    $stringview= $endpoint? substr($stringcut, 0, $endpoint):substr($stringcut, 0);

                                      echo $stringview. "...<a href='blog-details.php?id= $id '>Read More</a>";
        
                                        }else{
                                          echo $string;
                                                } 
                                    ?>  </p>
                               		<span class="meta-data"><i class="fa fa-calendar"></i><?php  echo $fetch['blog_date']; ?><a href=""> by lten info</a></span>
                                </div>
                                <div class="grid-footer clearfix">
                            <a class="btn btn-primary"><?php  echo $fetch['blog_date']; ?></a>
                                 <span class="meta-data"><i class="fa fa-calendar"></i> by <a>Lten Info</a></span>
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
    <?php include ('footer.php');?>
</body>
</html>