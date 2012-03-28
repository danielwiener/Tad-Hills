<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays a page which will show table of contents for all the children pages of a parent page
 *
 * @package WordPress
 * @subpackage Tad Hills
 * @since Tad Hills 1.0
 */

get_header(); ?>

		<div id="container"  class="front-page">
			<div id="content" role="main">
     
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page_front' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar('front_teaser'); ?>
<?php get_footer(); ?>
