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
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>



				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
                              							<div id="image_grid">
								<ul>		
					<?php 
					$this_post_id = $post->ID;
						$recent_args = array(
							'posts_per_page' => -1,
							'post_type' => 'page',
							'post_status' => 'publish',
							'post_parent' => $post->ID,
							'orderby' => 'menu_order', 
							'order' => 'ASC' 
							); 
						query_posts($recent_args);
						if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

										 <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></li>
 

					<?php endwhile; ?>
					</ul>
					</div> <!-- #image_grid -->
					<?php if ( $this_post_id == 28 ): ?> 
						<hr />
						     <h2 class="entry-title">Board Books</h2> 
								<div id="image_grid">
		<ul>
							<?php
                             $boardbooks_args = array(
                              	'posts_per_page' => -1,
								'post_type' => 'page',
								'post_status' => 'publish',
								'post_parent' => 36   
                             );
							// The Query
							$boardbooks_query = new WP_Query( $boardbooks_args );

							// The Loop
							while ( $boardbooks_query->have_posts() ) : $boardbooks_query->the_post(); ?>
							 <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></li>
							<?php endwhile; ?>
                                 </ul> 
</div>
							<?php // Reset Post Data
							wp_reset_postdata();

							?> 
					<?php endif ?>
					<div class="entry-content">
						<?php // the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

