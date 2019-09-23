$(document).ready(function() {	
		"use strict";
		
  $(".gallery-slider").owlCarousel({
	stagePadding: 0,
	margin:0,
	rewindNav:false,
	pagination : false,
	autoplay:true, //Set AutoPlay to 3 seconds
	autoplaySpeed : 1000,
	stopOnHover : true,
	responsiveClass:true,
	dots: false,
	loop:true,
    responsive:{
        0:{
            items:1,
        },
        700:{
            items:2,
        },
		960:{
            items:3,
			
        },
        1024:{
            items:3,
			
        },
		1025:{
            items:3,
			
        },
		1281:{
            items:3,
			
        }
    }

  });
  $(".testimonial").owlCarousel({
	stagePadding: 0,
	margin:30,
	rewindNav:false,
	pagination : false,
	autoplay:false, //Set AutoPlay to 3 seconds
	autoplaySpeed : 1000,
	stopOnHover : true,
	responsiveClass:true,
	dots: false,
	loop:true,
    responsive:{
        0:{
            items:1,
        },
        700:{
            items:1,
        },
		960:{
            items:1,
			
        },
        1024:{
            items:1,
			
        },
		1025:{
            items:1,
			
        },
		1281:{
            items:1,
			
        }
    }

  });
  
  $(".social-slider").owlCarousel({
	stagePadding: 0,
	margin:0,
	rewindNav:false,
	pagination : false,
	autoplay:true, //Set AutoPlay to 3 seconds
	autoplaySpeed : 1000,
	stopOnHover : true,
	responsiveClass:true,
	dots: false,
	loop:true,
    responsive:{
        0:{
            items:1,
        },
        700:{
            items:3,
        },
		960:{
            items:4,
			
        },
        1024:{
            items:4,
			
        },
		1025:{
            items:5,
			
        },
		1281:{
            items:6,
			
        }
    }

  });

  //

   $(".causes-related-slider").owlCarousel({
    stagePadding: 0,
    margin:30,
    nav:true,
    navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    rewindNav:false,
    pagination : true,
    autoplay:true, //Set AutoPlay to 3 seconds
    autoplaySpeed : 1000,
    stopOnHover : true,
    responsiveClass:true,
    dots: false,
    loop:true,
    responsive:{
        0:{
            items:1,
        },
        700:{
            items:2,
        },
        960:{
            items:3,
            
        },
        1024:{
            items:3,
            
        },
        1025:{
            items:3,
            
        },
        1281:{
            items:2,
            
        }
    }

  });

  
//document ready end

 }); 