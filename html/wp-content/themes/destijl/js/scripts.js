// JavaScript Document - custom theme functions

$(document).ready(function(e) {
    //Navigation Menu Slider ref http://blog.themearmada.com/off-canvas-slide-menu-for-bootstrap/
        $('.navbar-toggle').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
			$(this).toggleClass('fixed');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
			$('.navbar-toggle').removeClass('fixed');
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
