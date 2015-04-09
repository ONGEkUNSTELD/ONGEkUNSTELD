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
		<!--vervang met goeie cpyright datum code!-->
		&copy; <?php 
			$copyYear = 2011; 
			$curYear = date('Y'); 
			echo $copyYear . (($copyYear != $curYear) ? '–' . $curYear : '');
		?> ONGEkUNSTELD

			<a href="feed:https://www.ongekunsteld.net/feed/"><span class="rss">R</span></a>


			<a href="https://twitter.com/ongekunsteld"><span class="twitter">T</span></a>


			<a href="https://www.facebook.com/ongekunsteld.net"><span class="facebook">F</span></a>

		
		<a href="#top" id="smoothup" title="Back to top"></a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>