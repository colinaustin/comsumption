// JavaScript Document - custom theme functions

/* var slideout = new Slideout({
    'panel': document.getElementById('main-wrapper'),
    'menu': document.getElementById('header-menu'),
    'padding': 256,
    'tolerance': 70,
	'side':'right'
  });
  
   // Toggle button
      document.querySelector('.navbar-toggle').addEventListener('click', function() {
        slideout.toggle();
	  });
	  
	  //Close (toggle) button on menu
document.getElementById('closemenu').addEventListener('click', function() {
  slideout.toggle();
}); */
$(document).ready(function(e) {
    //Navigation Menu Slider
        $('.navbar-toggle').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
			$(this).toggleClass('fixed');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});

      	// Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });

});
