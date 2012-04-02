<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Tad Hills
 * @since Tad Hills 1.0
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<hr />
						<?php if ( get_post_meta($post->ID, "_praise", $single = true) ): ?> 
							<h2 class="interim-title">Praise</h2>
							     <?php meta('_praise'); ?>
						<?php endif ?>
						<?php if ( get_post_meta($post->ID, "_awards", $single = true) ): ?>
							<?php if ( get_post_meta($post->ID, "_praise", $single = true) ): ?>
								<hr /> 
							<?php endif ?>
							<h2 class="interim-title">Awards</h2>
							     <?php meta('_awards'); ?>
						<?php endif ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>