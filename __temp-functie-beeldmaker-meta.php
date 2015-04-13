<!-- Nieuwe versie. In wacht totdat beeldmakers gekoppeld zijn -->
<span class="entry-meta-functie">BEELD</span> <span class="entry-meta-naam"> 
	
	<!-- geef de URL van de beeldmaker(auteurpagina) en echo de naam. ACF functie -->
	<?php $beeldmakerart = get_field('beeldmaker'); 
		if($beeldmakerart) {
		$beeldData = array_values($beeldmakerart); ?>
		<a href="<?php echo get_author_posts_url(  $beeldData[0]  ); ?>"><?php echo $beeldData[5]; ?></a> <?php
		} ?></span>		