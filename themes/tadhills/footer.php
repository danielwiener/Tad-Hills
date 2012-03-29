<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Tad Hills
 * @since Tad Hills 1.0
 */
?>

	<div id="footer" role="contentinfo">
		<div id="colophon">
			<a href="http://www.facebook.com/tadhills">&nbsp;</a>
			<div id="site-info"><a href="http://twitter.com/">&nbsp;</a></div> 
		</div><!-- #colophon -->
		
	</div><!-- #footer -->
       	</div><!-- #main -->
 </div><!-- #wrapper --> 
</div><!-- #bg_wrapper -->  


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>
</html>
