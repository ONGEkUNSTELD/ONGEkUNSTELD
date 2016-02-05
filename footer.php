<?php
	/**
		* The template for displaying the footer
		*
		* Contains footer content and the closing of the #main and #page div elements.
		*
		* @package WordPress
		* @subpackage Twenty_Fourteen
		* @since Twenty Fourteen 1.0
	*/
?>

</div><!-- #main -->

<footer id="colophon" class="site-footer" role="contentinfo">
	
	<?php get_sidebar( 'footer' ); ?>
	
	<div class="site-info">
		<a href="/algemene-voorwaarden/">&copy; 2011–<?php echo date('Y'); ?> <?php bloginfo('name'); ?></a>
		<a href="feed:https://www.ongekunsteld.net/feed/" target="_blank"><span class="rss">R</span></a>
		<a href="https://twitter.com/ongekunsteld" target="_blank"><span class="twitter">T</span></a>
		<a href="https://www.facebook.com/ongekunsteld.net" target="_blank"><span class="facebook">F</span></a>	
		
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>