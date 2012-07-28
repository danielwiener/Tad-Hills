<?php
/**
 * The Sidebar for the front page. Need to create way for Tad to enter posts himself.
 *
 * @package WordPress
 * @subpackage Tad Hills
 * @since Tad Hills 1.0
 */
?>

		
			<?php
			if (  is_active_sidebar( 'front_teaser_text' ) ) : ?>
<div id="primary"role="complementary">
		<!-- <ul class="xoxo"> -->
			<?php dynamic_sidebar( 'front_teaser_text' ); ?>
		<!-- </ul> -->
</div><!-- #primary .widget-area -->
<?php endif; ?>
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>
		</div><!-- #secondary .widget-area -->

<?php endif; ?>
