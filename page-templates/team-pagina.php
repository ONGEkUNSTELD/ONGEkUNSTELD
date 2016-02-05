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
				        <div class="teamcolumn">
						  <p>Eindredactie</p>
						  <?php
							 midea_list_authors('editor');
						  ?>
						  <p>Redactie</p>
						  <?php
							 midea_list_authors('author');
						  ?>
                          <p>Webdevelopment</p>
                            
                            <a href="https://www.ongekunsteld.net" target="_blank">Dennis Neumann</a>
                            <br>
                            <a href="https://www.nikostenhoedt.nl" target="_blank">Nikos ten Hoedt</a>
                            <br>
                            <a href="https://www.http://studiowaterenbrood.nl" target="_blank">Marco van Zomeren</a>
                            
                            <p>Grafisch ontwerp</p>
                            <a href="http://www.fennaschaap.nl" target="_blank">Fenna Schaap</a>
                            <br>
                            <a href="https://www.nikostenhoedt.nl" target="_blank">Nikos ten Hoedt</a>
                            
                            </div>
                        <div class="teamcolumn">
						  <p>Schrijvers</p>
						  <?php
							 midea_list_authors('contributor');
						  ?>
                            </div> 
                        <div class="teamcolumn">
						  <p>Beeldmakers</p>
						  <?php
							 midea_list_authors('beeldmaker');
						  ?>
                            </div>
						
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
	
	
		