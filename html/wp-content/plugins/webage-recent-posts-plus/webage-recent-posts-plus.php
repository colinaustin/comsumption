<?php
/*
Plugin Name: Webage Recent Posts Plus
Plugin URI: http://www.webage.co.uk
Description: Recent posts widget with added options
Version: 1.0
Author: Colin Austin
Author URI: http://www.webage.co.uk
License: GPL2
Text Domain: webage_recent_posts_plus
*/
defined( 'ABSPATH' ) or die( 'No.' );

/**
 * Adds Webage Recent Posts Plus widget.
 */
class webage_recent_posts_plus extends WP_Widget {

// constructor
    function __construct() {
		parent::__construct(
			'webage_recent_posts_plus', // Base ID
			__( 'Recent Posts Plus', 'webage_recent_posts_plus' ), // Name
			array( 'description' => __( 'Recent posts widget with added options', 'webage_recent_posts_plus' ), ) // Args
		);
	}
	
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo "<ul class='wrpp'>";

	// set up display option variables
	if( ! empty( $instance['post_limit'] )){
		$post_limit = $instance['post_limit'];
	}
	else $post_limit = 10;
	
	if( ! empty( $instance['show_date'] )){
		$show_date = $instance['show_date'];
	}
	else $show_date = 'yes';
	
	if( ! empty( $instance['show_author'] )){
		$show_author = $instance['show_author'];
	}
	else $show_author = 'yes';
	
	if( ! empty( $instance['show_thumbnail'] )){
		$show_thumbnail = $instance['show_thumbnail'];
	}
	else $show_thumbnail = 'no';
		if( ! empty( $instance['thumbnail_size'] )){
		$thumbnail_size = $instance['thumbnail_size'];
	}
	else $thumbnail_size = 'thumbnail';
	
	// display recent posts
	$myargs = array ( 'numberposts' => $post_limit);
	$recent_posts = wp_get_recent_posts( $myargs );
	foreach( $recent_posts as $recent ){
		$post_author_id = get_post_field('post_author', $recent["ID"]);
		echo '<li>';
		if(has_post_thumbnail($recent["ID"]) && $show_thumbnail == "yes"){
			echo '<p class="recent-post-thumbnail"><a href="' . get_permalink($recent["ID"]) . '">'.get_the_post_thumbnail( $recent["ID"], $thumbnail_size, array('class' => 'recent-post-thumbnail-image') ).'</a></p>';
		}
		echo '<h4 class="recent-post-title"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h4>';
		echo '<div class="recent-post-meta">';
		if($show_date == 'yes'){
			echo '<span class="entry-date">Posted on <strong>'. get_the_date('d/m/Y',$recent["ID"]).'</strong></span>';
		}		
		if($show_author == 'yes'){
			echo '<span class="entry-author">Posted by <strong>'. get_the_author_meta('display_name',$post_author_id) .'</strong></span>';
		}		
		echo '</div>';
		if (has_excerpt($recent["ID"])){
			echo '<div class="recent-post-excerpt excerpt">'.wp_trim_words(strip_tags(get_the_excerpt( $recent["ID"]) ) , 24).'</div><div class="recent-post-read-more"><a href="' . get_permalink($recent["ID"]) . '">Read More</a></div>';
		}
		else{
			echo '<div class="recent-post-excerpt content">'.apply_filters( 'the_content', wp_trim_words( strip_tags( $recent["post_content"] ), 24 ) ).'</div>
			<div class="recent-post-read-more"><a href="' . get_permalink($recent["ID"]) . '">Read More</a></div>';
		}
        echo '</li>';
	}
	wp_reset_query();
	echo "</ul>";
	echo $args['after_widget'];
	}
	

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'webage_recent_posts_plus' );
		$post_limit = ! empty( $instance['post_limit'] ) ? $instance['post_limit'] : __( '10', 'webage_recent_posts_plus' );
		$show_date = ! empty( $instance['show_date'] ) ? $instance['show_date'] : __( 'yes', 'webage_recent_posts_plus' );
		$show_author = ! empty( $instance['show_author'] ) ? $instance['show_author'] : __( 'yes', 'webage_recent_posts_plus' );
		$show_thumbnail = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : __( 'no', 'webage_recent_posts_plus' );
		$thumbnail_size = ! empty( $instance['thumbnail_size'] ) ? $instance['thumbnail_size'] : __( 'thumbnail', 'webage_recent_posts_plus' );
		?>

<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
    <?php _e( esc_attr( 'Title:' ) ); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
<p>
  <label for="<?php echo esc_attr( $this->get_field_id( 'post_limit' ) ); ?>">
    <?php _e( esc_attr( 'Maximum number of posts to display:' ) ); ?>
  </label>
  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_limit' ) ); ?>" type="number" value="<?php echo esc_attr( $post_limit ); ?>">
</p>
<p>
  <label style="display:block">
    <?php _e( esc_attr( 'Show post publication date:' ) ); ?>
  </label>
  <label><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" type="radio" value="yes"<?php if ($show_date == 'yes'){echo'checked="checked"';} ?>> Yes</label>
	&nbsp; <label><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" type="radio" value="no"<?php if ($show_date != 'yes'){echo'checked="checked"';} ?>> No</label>
</p>
<p>
  <label style="display:block">
    <?php _e( esc_attr( 'Show post author\'s name:' ) ); ?>
  </label>
  <label><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_author' ) ); ?>" type="radio" value="yes"<?php if ($show_author == 'yes'){echo'checked="checked"';} ?>> Yes</label>
	&nbsp; <label><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_author' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_author' ) ); ?>" type="radio" value="no"<?php if ($show_author != 'yes'){echo'checked="checked"';} ?>> No</label>
</p>
<p>
  <label style="display:block">
    <?php _e( esc_attr( 'Show post\'s featured image:' ) ); ?>
  </label>
  <label><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>" type="radio" value="yes"<?php if ($show_thumbnail == 'yes'){echo'checked="checked"';} ?>> Yes</label>
	&nbsp; <label><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>" type="radio" value="no"<?php if ($show_thumbnail != 'yes'){echo'checked="checked"';} ?>> No</label>
</p>

<p>
  <label style="display:block">
    <?php _e( esc_attr( 'Featured image (thumbnail) size:' ) ); ?>
  </label>
  <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'thumbnail_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thumbnail_size' ) ); ?>">
<?php $image_sizes = get_intermediate_image_sizes(); ?>
<?php foreach ($image_sizes as $size_name): ?>
    <option value="<?php echo $size_name ?>"<?php if ($size_name == esc_attr( $thumbnail_size )){echo'selected="selected"';} ?>><?php echo $size_name ?></option>
  <?php endforeach; ?>
  </select>
</p>
<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_limit'] = ( ! empty( $new_instance['post_limit'] ) ) ? strip_tags( $new_instance['post_limit'] ) : '';
		$instance['show_date'] = ( ! empty( $new_instance['show_date'] ) ) ? strip_tags( $new_instance['show_date'] ) : '';
		$instance['show_author'] = ( ! empty( $new_instance['show_author'] ) ) ? strip_tags( $new_instance['show_author'] ) : '';
		$instance['show_thumbnail'] = ( ! empty( $new_instance['show_thumbnail'] ) ) ? strip_tags( $new_instance['show_thumbnail'] ) : '';
		$instance['thumbnail_size'] = ( ! empty( $new_instance['thumbnail_size'] ) ) ? strip_tags( $new_instance['thumbnail_size'] ) : '';
		return $instance;
	}
	
}

// register Webage Recent Posts Plus widget
function register_wrpp_widget() {
    register_widget( 'webage_recent_posts_plus' );
}
add_action( 'widgets_init', 'register_wrpp_widget' );

// strip ellipsis at end of excerpt
add_filter('excerpt_more','__return_false');

//add plugin stylesheet
function enqueue_wrpp_widget_style() {
	wp_enqueue_style( 'wrpp-plugin-style', '/wp-content/plugins/webage-recent-posts-plus/style.css', false ); 
}
add_action( 'wp_enqueue_scripts', 'enqueue_wrpp_widget_style' );
?>
