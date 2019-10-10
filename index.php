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
<meta name="keywords" content="lten, supernatural,light of truth equipping Network,power,spirit,doctrin,christ,messages,sermons,spiritual,benin,uniben,edo state, eghosa alvin osunde">
<meta name="author" content="davidchijoke11@gmail.com">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
<body class="home home-style2 footer-dark">

<div class="body"> 
    <!-- Start Site Header -->
    <?php include("header.php");?>
    <!-- End Site Header -->
    <!-- Start Hero Slider -->
    <div class="hero-slider heroflex flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-speed="7000" data-pause="yes">
        <ul class="slides">
            <li class="parallax" style="background-image:url(images/lten.jpg);">
                <div class="flex-caption" data-appear-animation="fadeInRight" data-appear-animation-delay="500">
                    <strong>Lten!</strong>
                    <p>Teach a People Truth By Revelation, Equipping them to be all God wants them to be, and raising up a people that do the father's will and demonstrate the supernatural power of God and His Kingdom</p>
                </div>
            </li>
            <li class="parallax" style="background-image:url(images/lten1.jpg);">
                <div class="flex-caption" data-appear-animation="fadeInRight" data-appear-animation-delay="500">
                    <strong>who we are</strong>
                    <p>Light of Truth Equipping Network is an Apostolic ministry with the mandate to teach a people truth by revelation, equipping them to be all God wants them to be and raising up a people who do the Father's will and demonstrate the supernatural power of God and His Kingdom.</p>
                </div>
            </li>
        </ul>
        <canvas id="canvas-animation"></canvas>
    </div>

    <!-- Start Body Content -->
    <!-- <div class="main" role="main">
        <div id="content" class="content full"> -->
          
          <div class="lgray-bg padding-tb45">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Recent Teachings</h3>
                            <hr class="sm">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="very-latest-post format-standard">
                                        <div class="title-row">
                                            <a href="" class="comments-go" title="10 comments"><i class="icon-dialogue-text"></i></a>
                                            <h4>Very latest</h4>
                                        </div>
                                        <?php 
                $query= "SELECT *  FROM album_table  ORDER BY id  DESC LIMIT 1";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {
                  $id=$fetch['id'];              
                ?>
                                        <a href="" class="media-box post-thumb">
                                            <img src="admin/album/<?php echo $fetch['album_img'];  ?>" alt="" width="600px" height="300">
                                        </a>
                                        <h3 class="post-title"><a><?php  echo $fetch['album_name']; ?></a></h3>
                                        <div class="meta-data">Year Series : <a ><?php echo $fetch['year'];  ?></a></div>
                                       <!-- <p>Nulla consequat massa quis enim.Donec pede justo, fringilla vel, aliquet nec, Nulla consequat massa quis enim.Donec pede justo, fringilla vel, aliquet nec vulputate nulla consequat massa quis enim.Donec pede justo, fringilla vel, aliquet nec, Nulla consequat massa quis enim.Donec pede justo, fringilla vel, aliquet nec vulputate eget...</p>-->
                                        <p><a href="sermon-details.php?rr=<?php echo $id ?>" class="btn btn-primary">VIEW TRACKS</a></p>
                                        <?php } ?>  
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="blog-classic-listing">
                                         <?php 

                                         $sql="SELECT id FROM album_table ORDER BY id DESC LIMIT 1";
                             $runquery=mysqli_query($conn, $sql);
                            $rows= mysqli_fetch_array($runquery);
                            $idd=$rows['id'];
                $query= "SELECT *  FROM album_table WHERE id != $idd ORDER BY id  DESC LIMIT 3";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) { 
                  $id=$fetch['id'];             
                ?>
                                        <li class="format-standard">
                                             
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a  class="media-box post-thumb">
                                                        <img src="admin/album/<?php echo $fetch['album_img'];  ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <a ><strong class="post-title"><?php  echo $fetch['album_name']; ?></strong></a>
                                                     <div class="meta-data">Year Series : <a ><?php echo $fetch['year'];  ?></a></div>
                                                    
                                                    <p><a href="sermon-details.php?rr=<?php echo $id ?>" class="btn btn-primary">VIEW TRACKS</a></p>
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
            </div>

<div class="spacer-30"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">

                        <div class="widget latest_sermons_widget">
                             <?php 
                $query= "SELECT *  FROM event_table  ORDER BY id  DESC LIMIT 1";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {  
                  $id=$fetch['id'] ;              
                ?>
                            <ul>
                                <li class="most-recent-sermon clearfix">
                                    <h3>Next Event</h3>
                                    <hr class="sm">
                                    <div class="latest-sermon-video fw-video">
                                        <img src="admin/events/<?php echo $fetch['event_img'] ?>" width="500" height="281">
                                    </div>
                                    <div class="latest-sermon-content">
                                        <h4><a href="event-details.php?id=<?php echo $id ?>"><?php  echo $fetch['event_title']; ?></a></h4><br>
                                        <div class="" style="font-size:40px; font-family:cooper black; "> <a href=""><?php  echo $fetch['event_date']; ?></a></div>
                                    
                                    </div>
                                    <div class="sermon-links" style="background-color:orange;">
                                        <ul class="action-buttons">
                                            <li><a  data-toggle="tooltip" data-placement="right" data-original-title=""><i class="icon-video-cam"></i></a></li>
                                            <li><a  data-toggle="tooltip" data-placement="right" data-original-title=""><i class="icon-headphones"></i></a></li>
                                            <li><a  data-toggle="tooltip" data-placement="right" data-original-title=""><i class="icon-cloud-download"></i></a></li>
                                            <li><a  data-toggle="tooltip" data-placement="right" data-original-title=""><i class="icon-download-folder"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                                <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="element-block events-listing">
                            <div class="events-listing-header">
                                <a href="events.php" class="pull-right basic-link">All Events</a>
                                <h3 class="element-title">Upcoming Events</h3>
                                <hr class="sm">
                            </div>
                            <?php 
                             $sql="SELECT id FROM event_table ORDER BY id DESC LIMIT 1";
                             $runquery=mysqli_query($conn, $sql);
                            $rows= mysqli_fetch_array($runquery);
                            $idd=$rows['id'];
                $query= "SELECT *  FROM event_table WHERE id != $idd  ORDER BY id  DESC LIMIT 4";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) { 
                  $id=$fetch['id'] ;               
                ?>
                            <div class="events-listing-content">
                                <div class="event-list-item event-dynamic">
                                    <div class="event-list-item-date">
                                        <span class="event-date">
                                            <span class="event-day"><img src="admin/events/<?php echo $fetch['event_img'] ?>"></span>
                                            <span class="event-month"></span>
                                        </span>
                                    </div>
                                    <div class="event-list-item-info">
                                        <div class="lined-info">
                                            <h4><a href="event-details.php?id=<?php echo $id ?>" class="event-title"><?php  echo $fetch['event_title']; ?></a></h4>
                                        </div>
                                        <div class="lined-info">
                                            <span class="meta-data"><i class="fa fa-clock-o"></i> <?php  echo $fetch['event_date']; ?> <span class="event-time"></span></span>
                                        </div>
                                        <div class="lined-info event-location">
                                            <span class="meta-data"><i class="fa fa-map-marker"></i> <span class="event-location-address"><?php  echo $fetch['address']; ?></span></span>
                                        </div>
                                    </div>
                                    <div class="event-list-item-actions">
                                        <a  href="event-details.php?id=<?php echo $id ?>" class="btn btn-default btn-transparent event-register-button">See Details</a>
                                        <ul class="action-buttons">
                                            <li title="Share event"><!-- <a href="index.htm#" data-trigger="focus" data-placement="top" data-content="" data-toggle="popover" data-original-title="Share Event" class="event-share-link"> --><i class="icon-share"></i></a></li>
                                            <li title="Get directions" class="hidden-xs"><!-- <a href="index.htm#" class="cover-overlay-trigger event-direction-link"> --><i class="icon-compass"></i></a></li>
                                            <li title="Contact event manager"><!-- <a href="index.htm#" data-toggle="modal" data-target="#Econtact" class="event-contact-link"> --><i class="icon-mail"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                               
                               
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main" role="main">
        <div id="content" class="content full">

            <div class="container">
                <div class="row">
                    <div class="events-listing-header">
                                <a  class="pull-right basic-link"></a>
                                <h3 class="element-title">Blog Corner</h3>
                                <hr class="sm">
                            </div>
                    <ul class="isotope-grid">
                        <?php 
                $query= "SELECT *  FROM blog  ORDER BY id  DESC LIMIT 3";
                $run=mysqli_query($conn,$query);
                 while ($fetch= mysqli_fetch_array($run) ) {
                    $id=$fetch['id'] ;
                            
                ?>
                        <li class="col-md-4 col-sm-6 blog-item grid-item format-standard">
                            <div class="grid-item-inner">
                                <!-- <div class="post-media">
                                    <a href="blog-post.html" class="media-box"><img src="images/slide1.jpg" alt="" class="post-thumb"></a>
                                </div> -->
                                <div class="grid-content">
                                   <span class="meta-data"><i class="icon icon-calendar"></i>  
                                    <h4><?php  echo $fetch['blog_title']; ?></h4></span>

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
?>                </p>
                                    
                                </div>
                                 <div class="grid-footer clearfix">
                            <a class="btn btn-primary btn-sm"><?php  echo $fetch['blog_date']; ?></a>
                                 <span class="meta-data"><i class="fa fa-calendar"></i> by <a>Lten Info</a></span>
                                </div>
                            </div>
                        </li>
                 <?php }?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

   
        </div>
    </div>
</div>
    <!-- End Body Content -->
    <!-- Gallery updates -->
   <!--  -->
    
    <!-- Start site footer -->
    <?php include("footer.php") ?>
</body>
</html>