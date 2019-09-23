<?php 
include("admin/connection.php");


if (isset($_GET['rr'])) {
  $newid= $_GET['rr'];
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
<link rel="shortcut icon" href="images/ltenlogo.png">

<!-- SCRIPTS
  ================================================== -->
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
     <?php
                            $query="SELECT * FROM album_table WHERE id ='".$newid."' ";
                            $run=mysqli_query($conn,$query);
                            $fetch=mysqli_fetch_array($run);
                                
                             if ($fetch) {
                            
                             
                                ?>

<div class="body"> 
	<!-- Start Site Header -->
	<?php include("header.php");?>
	<!-- End Site Header -->
    <!-- Start Page Header -->
    <div class="page-header parallax clearfix" style="background-image:url(images/baptism.jpg);">
        <div class="title-subtitle-holder">
        	<div class="title-subtitle-holder-inner">
    			<h2><a href="j" data-rel="prettyPhoto" data-toggle="tooltip" data-placement="bottom" ></i></a></h2>
        	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li><a href="sermons.php">Sermons Series</a></li>
            	
          	</ol>
        </div>
    </div>

        <!-- Start Body Content -->
        
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
                <div class="row">
                	<div class="col-md-9 col-sm-9">
                        <span class="label label-primary">Current Series</span>
                        <div class="sermon-series-description">
                            <?php
                            $query="SELECT * FROM album_table WHERE id ='".$newid."' ";
                            $run=mysqli_query($conn,$query);
                            $fetch=mysqli_fetch_array($run);
                                
                             
                                ?>
                    		<h2 style="text-transform:uppercase;"><?php echo $fetch['album_name'];  ?></h2>
                        	
                        </div>
                        <ul class="sermons-list">
                            <?php
                            $query="SELECT * FROM sermon_table WHERE album_id ='".$newid."' ";
                            $run=mysqli_query($conn,$query);
                        while ($fetch=mysqli_fetch_array($run)) {
                                
                            
                                ?>
                        	<li class="sermon-item format-standard">
                            	<div class="row">
                                	<div class="col-md-5">
                                    	<a href="" class="media-box"><img src="images/01.jpg" alt=""></a>
                                        <a href="admin/tracks/<?php  echo $fetch['sermon']; ?>" download="<?php  echo $fetch['sermon_title']; ?>"  class="basic-link fa fa-download" >Download</a>
                                    </div>
                                    <div class="col-md-7">
                                    	<h3><a href=""><?php echo $fetch['sermon_title'];  ?></a></h3>
                                        <span class="meta-data"><i class="fa fa-calendar"></i><?php echo $fetch['date'];?></span>
                                        
                                    </div>
                                </div>
                            </li>
                        	   <?php } ?>
                        	
                        </ul>
                    </div>
                   </div>
         	</div>
        </div>
   	</div>
    <?php  
}else{
    header("location:404.html");
   } ?>
    <!-- End Body Content -->
    
    <!-- Start site footer -->
         <?php include("footer.php") ?>
</body>
</html>