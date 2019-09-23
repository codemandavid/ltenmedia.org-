// JavaScript Document
"use strict";
$(document).ready(function(){
$(function() {
  $('.progress_bar').each(function() {
  var progressbar = $(this),
    progressLabel = $(this).find( ".progress-label" ),
    progressvalue = $(this).attr('data-value');
console.log(progressvalue);     
      
    progressbar.progressbar({
      value: false,
      change: function() {
       
        progressLabel.text( progressbar.progressbar( "value" ) + "% " );
		 progressLabel.css("left", progressbar.progressbar( "value" ) + "% ");
      },
      complete: function() {
        progressLabel.text( "Complete!" );
      }
    });
 
    function progress() {
                
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + 1 )
        .removeClass("beginning middle end")
        .addClass(val < 40 ? "beginning" : val < 80 ? "middle" : "end");
        
 
      if ( val < progressvalue ) {
        setTimeout( progress, 0 );
      }
    }
 
    setTimeout( progress, 0 );
       });
    });
});
