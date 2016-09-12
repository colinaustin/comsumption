<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @package WordPress
 * @subpackage destijl
 * @since Destijl 1.0
 */

get_header(); ?>
<div class="col-xs-12" id="main-content">
<div class="page-content">
<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
</div>
</div>
<?php
get_footer();