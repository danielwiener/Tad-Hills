<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
?>	
		 
		<h3>News &amp; Events</h3>
		 <?php  
		$args = array(
				'posts_per_page'=>-1,
				'post_type' => 'post', 
				'post_status' => 'publish',
				'category_name' => 'news-and-events',
				'orderby' => 'date',
				'order' => ASC
				);
			global $post;
			$program_pages = get_posts($args);
			foreach($program_pages as $post) :
			   setup_postdata($post);
			 ?>
			    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			 <?php endforeach; ?>
		</ul>

		</div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
