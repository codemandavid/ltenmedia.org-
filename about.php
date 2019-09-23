<?php 
include ('admin/connection.php');

$error1="";

if (array_key_exists("submit1",$_POST)) {
 
  if (!$_POST['name']) {
    $error1.="Please Tell Us Your Name <br>";
  }
  if (!$_POST['email']) {
    $error1.=" Please give us your Email <br>";
  }
  if (!$_POST['number']) {
    $error1.=" Please give us your Number <br>";
  }
  if (!$_POST['message']) {
    $error1.=" Haba !! You didnt Say Anything to us  <br>";
  }
    if ($error1 !="") {
    $error1 = "Please Look Again. Something is Missing<br>".$error1;
}else{
$name=$_POST['name'];
$email=$_POST['email'];
$num=$_POST['number'];
$msg=$_POST['message'];
  $sql = "INSERT INTO message__table (name,mail,phone,message) VALUES ('$name','$email','$num','$msg') ";
    
    if (mysqli_query($conn, $sql)) {
    $success1= "<p class='alert alert-success alert-dismissable'><b>Thank You ".$name." . We Will Respond To You Shortly</b></p>";
} else {
    $error1="There was a Problem Sending Your Message. please Try Again<br>".mysqli_error($conn);
}     
} 





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
    <div class="page-header parallax clearfix" style="background-image:url(images/slide7.jpg);">
        <div class="title-subtitle-holder">
        	<div class="title-subtitle-holder-inner">
    			<h2>About LTEN</h2>
        	</div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
    	<div class="container">
          	<ol class="breadcrumb">
            	<li><a href="index.php">Home</a></li>
            	<li class="active">About Us</li>
          	</ol>
        </div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
               	<h2>Light of Truth Equipping Network</h2>
              	<hr class="sm">
                <h4></h4>
               	<p>
  Light of Truth Equipping Network is an Apostolic ministry with the mandate to teach a people truth by revelation, equipping them to be all God wants them to be and raising up a people who do the Father's will and demonstrate the supernatural power of God and His Kingdom.
  This vision is achieved through 5 arms:
</p>
                <div class="spacer-50"></div>
                <div class="row">
                	<div class="col-md-6 col-sm-6">
                    	<div class="icon-box icon-box-style1">
                        	<div class="icon-box-head">
                            	<span class="ico"><i class="icon-happy-drop"></i></span>
                            	<h4>Truth Experience</h4>
                           	</div>
            				<p>This is a major arm of the ministry devoted fully to teaching the Truth by revelation and showing men how to walk in the Word and live the reality of the Christian Life. 
    The truth is emphasised as the person of Jesus such that people experience Him in a living and supernatural way.
We hold various conferences and camp meetings which are non-denominational and trans-denominational and available to all ages.
</p>
                       	</div>
                   	</div>
                	<div class="col-md-6 col-sm-6">
                    	<div class="icon-box icon-box-style1">
                        	<div class="icon-box-head">
                            	<span class="ico"><i class="icon-umbrella"></i></span>
                            	<h4>Christ Revolution</h4>
                           	</div>
            				<p>    This is a revolutionary arm that refires people with a supernatural push towards life by taking the Truth of the Word and showing people the practicality of it, so that they live and demonstrate the Supernatural. 
It is strategized to reach all ages; children, teenagers, youths, adults and the aged adults, enflaming them to be all God made them to be and repositioning them to bring revolution to their world by doing the mighty works of Christ. 
  
 <!--  Under this arm, we hold outreaches, conferences, camp meetings, and age group meetings. -->
</p>
                       	</div>
                   	</div>
                	<div class="col-md-6 col-sm-6">
                    	<div class="icon-box icon-box-style1">
                        	<div class="icon-box-head">
                            	<span class="ico"><i class="icon-tshirt"></i></span>
                            	<h4>Truth to the Nations</h4>
                           	</div>
            				<p>This arm is a highly Apostolic arm of the ministry devoted to bringing Jesus to every nation. This arm goes from City to city, and place to place establishing a new work for the Lord. The Truth is taught and people established in the mind and purpose of God concerning them.

  This arm holds crusades, conferences, Gospel campaigns, Fellowship centres and Apostolic missions.</p>
                       	</div>
                   	</div>
                     <div class="col-md-6 col-sm-6">
                      <div class="icon-box icon-box-style1">
                          <div class="icon-box-head">
                              <span class="ico"><i class="icon-happy-drop"></i></span>
                              <h4>Flames and Wisdom Network</h4>
                            </div>
                    <p>This arm is devoted to training people in the application of the Gospel of the Kingdom for everyday living.
                    We hold conferences as the Wellspring of Wisdom, Vision Seminar and Leadership Summit. </p>
                        </div>
                    </div>
              	</div>

                <div class="row">
                 
                  <div class="col-md-12 col-sm-12">
                      <div class="icon-box icon-box-style1">
                          <div class="icon-box-head">
                              <span class="ico"><i class="icon-umbrella"></i></span>
                              <h4>LTEN Schools and LTENS Fellowships</h4>
                            </div>
                    <p>LTEN Schools and Fellowships are devoted to the train and equip ministers in all ramifications through school programs.

Under this arm we have:
<ul> 
<li>General School of Ministry which is opened to all believers, teaching and equipping them to do ministry as it was handed down by the Apostles. The Word is taught, the supernatural is taught as well as instructions given for ministry.</li> 

<li>School of Biblical Studies which is available to all who desire to know the Bible; proper Bible interpretation is taught, the books of the Bible explained in the light of Christ and men are trained to handle the doctrine of Christ skillfully.</li>

<li>Ministry School is dedicated to those called into the office of the Apostle, Prophet, Evangelist, Pastor and Teacher.</li>
 <li>LTEN fellowships is dedicated to promoting the unity of the faith by networking with ministers and their ministries for the furtherance of the work of the Kingdom.</li>
</ul>
</p>
                        </div>
                    </div>
                 
                </div>


                   <hr class="fw">
                    <?php if ($error1 !=""){
    echo "<p class='alert alert-danger alert-dismissable'>$error1</p>";
    }

if (isset($success1)) {
  echo "<p class='alert alert-sucess '>$success1</p>";

}
    ?>



                   <h3 style="text-align: center;"><b> WANT TO LEAVE A MESSAGE ?</b> </h3>
  <div class="col-md-12 col-sm-8"> 
                        <form method="post" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                          <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="fname" name="name"  class="form-control input-lg" placeholder="Your Full name*">
                                    </div>
                                </div>
                               
                            </div>
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email"  class="form-control input-lg" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="phone" name="number" class="form-control input-lg" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                          <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea cols="6" rows="7" id="comments" name="message" class="form-control input-lg" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                          <div class="row">
                              <!--   <div class="col-md-12"> -->
                                    <button type="submit" name="submit1"  class="btn btn-primary btn-lg btn-block"> Submit</button> 

                                </div>
                              </div>
                            </div>
                    </form>
                      
                    </div>

                    <!--  -->
                <div class="spacer-20"></div>
            </div>
        </div>
   	</div>
    <!-- End Body Content -->
    
    <!-- Start site footer -->
    <?php include("footer.php") ?>
</body>
</html>