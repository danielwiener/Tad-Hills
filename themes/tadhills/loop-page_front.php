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

  global $query_string;
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'page',
		'post_status' => 'publish',
	'meta_key' => '_include_slide_show',
	'meta_value' => 1
	);
	query_posts($args);
	$slidetabs = ''; ?>
	 <div class="images">		
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
	        
	<div><?php if(has_post_thumbnail()): ?> 
			<a href="<?php the_permalink(); ?>" class="slide_container"><?php the_post_thumbnail('book_cover'); ?></a>
					<?php endif; ?>
					<span class="front-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" > <?php the_title(); ?></a> </span>
					<?php the_excerpt(); ?></div><!-- div no class -->
		<?php $slidetabs .= '<a href="#"></a>'; ?>
			<?php endwhile; // End the loop. // wp_reset_query();?> </div><!-- images -->  

<!-- <a class="backward">prev</a><a class="forward">next</a>   -->    
<div class="slidetabs">
	<?php echo $slidetabs; ?>
	</div>

<!-- <div class="buttons">
	<button onClick='$(".slidetabs").data("slideshow").play();'>Play</button>
	<button onClick='$(".slidetabs").data("slideshow").stop();'>Stop</button>
</div>    -->
<script language="JavaScript">
// What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
// jQuery.noConflict();
jQuery(document).ready(function($){ 

$(".slidetabs").tabs(".images > div", {

	// enable "cross-fading" effect
	effect: 'fade',
	fadeOutSpeed: "slow",

	// start from the beginning after the last tab
	rotate: true

// use the slideshow plugin. It accepts its own configuration
}).slideshow( {
	autoplay: true,
	interval: 5000
	} );
} );
</script>