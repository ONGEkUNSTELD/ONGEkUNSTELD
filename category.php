<?php
	/**
		* The template for displaying Category pages
		*
		* @link http://codex.wordpress.org/Template_Hierarchy
		*
		* @package WordPress
		* @subpackage Twenty_Fourteen
		* @since Twenty Fourteen 1.0
	*/
	
get_header(); ?>

<section id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		
		<?php if ( have_posts() ) : ?>
		
		<header class="archive-header">
			<h1 class="archive-title"><?php single_cat_title(); ?></h1>	
			<!-- Echo Redactie Tekst -->
			<div id="redactie-tekst" class="entry-summary">
			<?php 
				if(is_category( 'beeldend' )){
					the_field('beeldendtekst', 'option'); 
					$redacteurcat = get_field('redacteur-beeldend', 'option');
					$redacteur_naam = array_values($redacteurcat); ?>
				<div id="redactie-tekst" class="entry-meta" >
					<a href="<?php echo get_author_posts_url ( $redacteur_naam[0] ); ?>">
					<span class="entry-meta-functie entry-meta-naam"> <?php echo $redacteur_naam[5]; ?> </a> </span> 
					<span class="entry-meta-functie entry-meta-naam" >&mdash; Eindredacteur Beeldend</span>
					</div><?php
				}
				if(is_category( 'literatuur' )){ the_field('literatuurtekst', 'option');}
				if(is_category( 'muziek' )){ the_field('muziektekst', 'option');}
				if(is_category( 'theater' )){ the_field('theatertekst', 'option');}
				if(is_category( 'columns' )){ the_field('columnstekst', 'option');}
				if(is_category( 'film' )){ the_field('filmtekst', 'option');}
			?>	
			</div>
		</header><!-- .archive-header -->
		
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
			
			/*
				* Include the post format-specific template for the content. If you want to
				* use this in a child theme, then include a file called called content-___.php
				* (where ___ is the post format) and that will be used instead.
			*/
			get_template_part( 'content', get_post_format() );
			
			endwhile;
			// Previous/next page navigation.
			twentyfourteen_paging_nav();
			
			else :
			// If no content, include the "No posts found" template.
			get_template_part( 'content', 'none' );
			
			endif;
		?>
	</div><!-- #content -->
</section><!-- #primary -->

<?php
	/*get_sidebar( 'content' );*/
	/*get_sidebar();*/
	get_footer();
