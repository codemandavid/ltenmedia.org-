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

<?php 
$error="";
if (isset($_GET['rr'])) {
  $newid= $_GET['rr'];
}

//this up code is the get code for the id 


$query = $_GET['query']; 
    // gets value sent over search form
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($conn,$query);
        // makes sure nobody uses SQL injection
        $lol="SELECT * FROM album_table WHERE `album_name` LIKE '%".$query."%'";
         $raw_results = mysqli_query($conn,$lol);

                     
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                $success= $results['album_name'];
                $pic=$results['album_img'];
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
             $error=" No Match Found";
        }
         
    }
    else{ // if query length is less than minimum
        $error= "Minimum length is .$min_length ";
    }
?>
<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
                <div class="row">


                   
                    <ul class="isotope-grid">
                    	<?php 

if (isset($_GET['rr'])) {
  $newid= $_GET['rr'];
}

//this up code is the get code for the id 


$query = $_GET['query']; 
    // gets value sent over search form
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($conn,$query);
        // makes sure nobody uses SQL injection
        $lol="SELECT * FROM album_table WHERE `album_name` LIKE '%".$query."%'";
         $raw_results = mysqli_query($conn,$lol);

                     
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){

                                ?>
                        <li class="col-md-4 col-sm-6 sermon-item grid-item format-standard">
                            <div class="grid-item-inner">
                             	<a  class="media-box">
                                	<img src="admin/album/<?php echo$results['album_img'] ?>" alt="">
                                </a>
                                <div class="grid-content">
                                	<span class="sermon-series-date"><i style="font-size:10px; ">By : Light of Truth Equipping Network</i></span>
                                	<h3><a href="sermon-details.php?rr=<?php echo $results['id'] ?>"><?php echo $results['album_name']; ?></a></h3>
                                   
                                    <a href="sermon-details.php?rr=<?php echo $results['id'] ?>" class="btn btn-primary">View Tracks<i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                   			 <?php  }
             
        }
        else{ // if there is no matching rows do following
             $error=" No Match Found";
        }
         
    }
    else{ // if query length is less than minimum
        $error= "Please Input a Keyword ! Minimum length is .$min_length ";
    }
?>
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
