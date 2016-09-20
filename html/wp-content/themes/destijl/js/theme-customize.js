( function( $ ) {
	//Update site background color...
	wp.customize( 'body_backgroundcolor', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );

	//Update h1 color...
	wp.customize( 'h1_textcolor', function( value ) {
		value.bind( function( newval ) {
			$('h1').css('color', newval );
		} );
	} );
	
} )( jQuery );