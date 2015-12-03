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
						
						
						
						
						
						<?php
						
			
							// Zoek gebruikers op rol
							$user_query = new WP_User_Query( array( 'role' => 'contributor' ) );
							
							// Loop om alle gebruikers op rol te tonen
							if ( ! empty( $user_query->results ) ) {
								foreach ( $user_query->results as $user ) {
									echo '<p>' . $user->display_name . '</p>';
								}
								} else {
								echo 'No users found.';
							}
							
							
							
							//Echo alle rss-feeds van alle gebruikers als HTML in een lijst
							wp_list_authors('optioncount=0&orderby=name&order=ASC&hide_empty=0&html=1&show_fullname=0&style=none');

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
	
	
		