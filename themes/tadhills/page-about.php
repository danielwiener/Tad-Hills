<?php
/**
 * The template for displaying the About pages. Maybe change to call it something else - pages that are not books
 * Template Name: About 
 *
 * @package WordPress
 * @subpackage Tad Hills
 * @since Tad Hills 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar('about'); ?>
<?php get_footer(); ?>
