
<?php
/*
Plugin Name: Colin's Custom Functions
Description: Simple customisations grouped together in a single plugin
Version: 1.0
Author: Colin Austin
*/
defined( 'ABSPATH' ) or die( 'No.' );
function ccf_spud() {
	echo "<p>spud</p>";
}

add_action("the_post","ccf_spud");