<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Tad Hills
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
		if ( get_post_meta($post->ID, "_indiebound", $single = true) ) {
			$indie_bound = get_post_meta($post->ID, "_indiebound", $single = true);
			$purchase_flag = true;
		}
		
		if ( get_post_meta($post->ID, "_barnes_and_noble", $single = true) ) {
			$barnes_noble = get_post_meta($post->ID, "_barnes_and_noble", $single = true);
			$purchase_flag = true;
		}
		
		if ( get_post_meta($post->ID, "_amazon", $single = true) ) {
			$amazon = get_post_meta($post->ID, "_amazon", $single = true);
			$purchase_flag = true;
		}
		
		if ( get_post_meta($post->ID, "_rocket_ipad_app", $single = true) ) {
			$rocket_ipad_app = get_post_meta($post->ID, "_rocket_ipad_app", $single = true);
			$purchase_flag = true;
		}
?> 
	<?php if ( $purchase_flag ): ?>
	 	
<h3 class="books">Purchase</h3> 
<ul class="purchase">          
    				<?php if ( $indie_bound ): ?>
				<li><a href="<?php echo $indie_bound; ?>" target="_blank" title="Buy from a local bookseller"><img src="/!/wp-content/themes/tadhills/assets/indie_bound.png" width="99" height="86"><a/></li>
			<?php endif ?>
	        	<?php if ( $barnes_noble ): ?>
			<li><a href="<?php echo $barnes_noble; ?>" target="_blank" title="Buy from Barnes and Noble"><img src="/!/wp-content/themes/tadhills/assets/barnes_and_noble.png" width="150" height="44"><a/></li>
		<?php endif ?>
			<?php if ( $amazon ): ?>
				<li><a href="<?php echo $amazon; ?>" target="_blank" title="Buy from Amazon"><img src="/!/wp-content/themes/tadhills/assets/amazon.png" width="150" height="36"><a/></li>
			<?php endif ?>
			<?php if ( $rocket_ipad_app ): ?>
				<li><a href="<?php echo $rocket_ipad_app; ?>" target="_blank" title="Buy Rocket Ipad App"><img src="/!/wp-content/themes/tadhills/assets/rocket_ipad_app.png" width="100" height="100"><a/></li>
			<?php endif ?>
			 </ul> 
   <?php endif ?>
  <ul class="xoxo">    	
		 
<?php
   
	
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
		<?php endif; // end primary widget area ?> 
		<h3>Upcoming Events</h3>
		Something Goes Here. A bunch of text or teaser. 
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
