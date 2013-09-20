
(function ($, Drupal, window, document, undefined) {

Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

	
	// Open external links in a new window
	$('a[rel*=external]').click(function(){
		window.open($(this).attr('href'));
		return false; 
	});
	
    // Rewrite block titles
	$('.feed h2').each( function(){
		title = $(this).html().split(' ');
		$(this).html(title[0]+'<span class="archivo">'+title[1]+'</span>');
	});
	
	// Setup repsonsive videos
	$('.field-name-field-video div, .field-name-field-video iframe, .field-name-field-video object, .field-name-field-videoembed').attr('width','').attr('height','').attr('style','');
	$('.field-name-field-video iframe, .field-name-field-video object, .field-name-field-video embed').wrap('<div class="fluid-width-video-wrapper" />');
	
	
	
	// Check Mobile
	timerResize = function(){
        // Define if mobile
        this.checkMobile();
        // Display navigation if not mobile
        if(!window.isMobile){
            showNav();
        }
	}
	
	checkMobile = function (){
        // Define if on mobile (based on CCS media Queries : Device < 800px wide)
        if ( $("#page").css("position") === 'relative') {
			if( window.isMobile ){
                window.deviceHasChanged = false;
            }else{
               window.deviceHasChanged = true; 
               window.isMobile = true;
			   hideNav();
            }  
        }else{
            if( !window.isMobile ){
                window.deviceHasChanged = false;
            }else{
                window.deviceHasChanged = true;
                window.isMobile = false;
				showNav();
            }
        }
    }
	
	showNav = function (button, nav){
		$('#main-menu').show();
		$('#menu-toggle').hide();
		$('#menu-toggle a').attr('class', 'close');
    };
    hideNav = function (button, nav){
		$('#main-menu').hide();
		$('#menu-toggle').show();
		$('#menu-toggle a').attr('class', 'open');
    };
	
	// Define Global Mobile
	window.isMobile = false;
	window.deviceHasChanged = false;
	checkMobile;
	
	// Define if on mobile (based on CCS media Queries : Device < 800px wide)
	var resizeTimer;
	timerResize();
	$(window).resize(function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() { timerResize(); }, 100);
	});
    
	// Setup mobile menu toggle
	$('#menu-toggle a').click( function(){
		c = $(this).attr('class');
		if( c == 'open'){
			c = 'close';
		}else{
			c = 'open';
		}
		$('#main-menu').slideToggle();
		$(this).attr('class',c);
		return false;
	});
	
	
	

  }
};


})(jQuery, Drupal, this, this.document);
