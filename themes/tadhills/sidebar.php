<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Tad Hill
 * @since Tad Hills 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
		   

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
?> 
<h3>Buy This Book</h3> 
<ul>          
    				<?php if ( get_post_meta($post->ID, "Indie Bound", $single = true) ): ?>
				<li><a href="<?php echo get_post_meta($post->ID, "Indie Bound", $single = true); ?>" target="_blank" title="Buy from a local bookseller"><img src="/!/wp-content/themes/tadhills/assets/indie_bound.png" width="99" height="86"><a/></li>
			<?php endif ?>
	        	<?php if ( get_post_meta($post->ID, "Barnes and Noble", $single = true) ): ?>
			<li><a href="<?php echo get_post_meta($post->ID, "Barnes and Noble", $single = true); ?>" target="_blank" title="Buy from Barnes and Noble"><img src="/!/wp-content/themes/tadhills/assets/barnes_and_noble.png" width="150" height="44"><a/></li>
		<?php endif ?>
			<?php if ( get_post_meta($post->ID, "Amazon", $single = true) ): ?>
				<li><a href="<?php echo get_post_meta($post->ID, "Amazon", $single = true); ?>" target="_blank" title="Buy from Amazon"><img src="/!/wp-content/themes/tadhills/assets/amazon.png" width="150" height="36"><a/></li>
			<?php endif ?>
			 </ul>
  <ul class="xoxo">    	
		 
<?php
   
	
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
		<?php endif; // end primary widget area ?>
		</ul></div><!-- #primary .widget-area -->

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
