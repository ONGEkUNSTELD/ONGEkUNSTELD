<?php
	/**
		* Template Name: Team-pagina
		*
		* @package WordPress
		* @subpackage Twenty_Fourteen
		* @since Twenty Fourteen 1.0
	*/
	
get_header(); ?>

<div id="main-content" class="main-content">
	
	<?php
		if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
			// Include the featured content template.
			get_template_part( 'featured-content' );
		}
	?>
	
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
            
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>
			
            
            
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
					
				?>
                
                <div class="entry-content">
					<div class="teamcontent">    
						
						<p>Eindredactie</p>
						<?php
							midea_list_authors('editor');
						?>
						<p>Redactie</p>
						<?php
							midea_list_authors('author');
						?>
						<p>Schrijvers</p>
						<?php
							midea_list_authors('contributor');
						?>
						<p>Beekdmakers</p>
						<?php
							midea_list_authors('beeldmaker');
						?>
						
					</div>
				</div>
			</div>
			
		</article><!-- #post-## -->
		
		<?php
			endwhile;
		?>
	</div><!-- #content -->
</div><!-- #primary -->
</div><!-- #main-content -->

<?php
	get_sidebar();
	get_footer();
	
	
		