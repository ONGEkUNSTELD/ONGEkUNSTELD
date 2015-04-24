<?php
	/*Functions voor OK2*/
	/*Genereer Thumbs voor gerelateerd maten*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 96, true );
	
	
	/*---- wijzig update functies formulieren -----*/
	add_filter( 'gform_upload_root_htaccess_rules', '__return_false' );
	
	
	
	/**
		* Replace footer for Jetpack Infinite Scroll.
	*/
	function my_footer() {
	?>
	<div id="infinite-footer" class="site-footer">
		<div class="container" class="site-footer">
			<div class="blog-info">
				<a href="/algemene-voorwaarden/">&copy; 2011–<?php echo date('Y'); ?> <?php bloginfo('name'); ?></a>	
				<a href="feed:https://www.ongekunsteld.net/feed/"><span class="rss">R</span></a>
				<a href="https://twitter.com/ongekunsteld"><span class="twitter">T</span></a>
				<a href="https://www.facebook.com/ongekunsteld.net"><span class="facebook">F</span></a>		
			</div>	
			
		</div>
	</div>
	<?php
	}
	
	function my_infinite_scroll_settings( $args ) {
		if ( is_array( $args ) )
		$args['footer_callback'] = 'my_footer';
		return $args;
	}
	add_filter( 'infinite_scroll_settings', 'my_infinite_scroll_settings' );
	
	/*custom plaatsing Social Icons Jetpack*/
	function jptweak_remove_share() {
		remove_filter( 'the_content', 'sharing_display',19 );
		remove_filter( 'the_excerpt', 'sharing_display',19 );
		if ( class_exists( 'Jetpack_Likes' ) ) {
			remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
		}
	}
	
	add_action( 'loop_start', 'jptweak_remove_share' );
	
	
	/*dashboard alert media
		function addAlert() { ?>
		<script type="text/javascript">
		$j = jQuery;
		$j().ready(function(){
		$j('.wrap > h2').parent().prev().after('<div class="update-nag">Succes! Als je dit leest ben je op de nieuwe server van ongeKUNSTeld. Mooi. Als het goed is, is alles hetzelfde. Kom je problemen tegen? Stuur een mail naar <a href="mailto:dennisneumann@galmoer.nl">dennisneumann@galmoer.nl</a></div>');
		});
		</script>
		<?php } add_action('admin_head','addAlert');
	*/
	
	
	/*Verander login logo*/
	function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon.png);
		padding-bottom: 30px;
        }
	</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	
	/*Herverwijs URL van logo inlogpagina*/
	function my_login_logo_url() {
		return home_url();
	}
	add_filter( 'login_headerurl', 'my_login_logo_url' );
	
	function my_login_logo_url_title() {
		return 'ONGEkUNSTELD Columns en recensies zonder opsmuk';
	}
	add_filter( 'login_headertitle', 'my_login_logo_url_title' );
	
	// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
	function remove_dashboard_widgets(){
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
		remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
		remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
		// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
	}
	
	if (!current_user_can('manage_options')){ 
		add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
	}
	
	//Color code post status
	add_action('admin_footer','posts_status_color');
	function posts_status_color(){
	?>
	<style>
		.status-draft{background: rgba(255,174,175,0.5) !important;}
		.status-pending{background: rgba(255, 161, 98, 0.5) !important;}
		.status-publish{/* no background keep wp alternating colors */}
		.status-future{background: rgba(180, 255, 174, 0.5) !important;}
		.status-private{background:#F2D46F;}
	</style>
	<?php
	}	
	
	
	//Custom Statuses
	add_filter( 'display_post_states','custom_post_state');
	function custom_post_state( $states ) {
		global $post;
		$show_custom_state = get_post_meta( $post->ID, '_status' );
		if ( $show_custom_state ) {
			$states[] = __( '<span class="custom_state '.strtolower($show_custom_state[0]).'">'.$show_custom_state[0].'</span>' );
		}
		return $states;
	}
	add_action( 'post_submitbox_misc_actions', 'custom_status_metabox' );
	function custom_status_metabox(){
		global $post;
		$custom  = get_post_custom($post->ID);
		$status  = $custom["_status"][0];
		$i   = 0;
		/* ----------------------------------- */
		/*   Array of custom status messages            */
		/* ----------------------------------- */
		$custom_status = array(
		'Afgekeurd',
		'Terug_Beeld_Ontbreekt',
		'Terug_Beeld_Klaar',
		'Tekst_Klaar_Beeld_Ontbreekt',
		'Tekst_Klaar_Beeld_Klaar',
		);
		echo '<div class="misc-pub-section custom">';
		echo '<label>Custom status: </label><select name="status">';
		echo '<option class="default">Custom status</option>';
		echo '<option>-----------------</option>';
		for($i=0;$i<count($custom_status);$i++){
			if($status == $custom_status[$i]){
				echo '<option value="'.$custom_status[$i].'" selected="true">'.$custom_status[$i].'</option>';
				}else{
				echo '<option value="'.$custom_status[$i].'">'.$custom_status[$i].'</option>';
			}
		}
		echo '</select>';
		echo '<br /></div>';
	}
	add_action('save_post', 'save_status');
	function save_status(){
		global $post;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }
		update_post_meta($post->ID, "_status", $_POST["status"]);
	}
	add_action( 'admin_head', 'status_css' );
	function status_css() {
		echo '<style type="text/css">
		.default{font-weight:bold;}
		.custom{border-top:solid 1px #e5e5e5;}
		.custom_state{
		font-size:9px;
		color:#666;
		background:#e5e5e5;
		padding:3px 6px 3px 6px;
		-moz-border-radius:3px;
		}
		/* ----------------------------------- */
		/*   change color of messages bellow            */
		/* ----------------------------------- */
		.afgekeurd{background:#FF0000;color:#fff;}
		.terug_beeld_ontbreekt{background:#FF8D00;color:#fff;}
		.terug_beeld_klaar{background:#FF9D00;color:#000;}
		.tekst_klaar_beeld_ontbreekt{background:#FCFF00;color:#000;}
		.tekst_klaar_beeld_klaar{background:#00FF99;color:#333;}
		</style>';
	}	
	
	//Change Dashboard Label Artikel		
	function customize_post_admin_menu_labels() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Tekst';
		$submenu['edit.php'][5][0] = 'Alle Tekst';
		$submenu['edit.php'][10][0] = 'Schrijf Tekst';
		echo '';
	}
	add_action( 'admin_menu', 'customize_post_admin_menu_labels' );
	
	//Change Secondary Artikel Labels
	function customize_admin_labels() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Teksten';
		$labels->singular_name = 'Tekst';
		$labels->add_new = 'Schrijf Tekst';
		$labels->add_new_item = 'Schrijf Tekst';
		$labels->edit_item = 'Bewerk Tekst';
		$labels->new_item = 'Tekst';
		$labels->view_item = 'Bekijk teksten';
		$labels->search_items = 'Zoek teksten';
		$labels->not_found = 'Geen teksten gevonden';
		$labels->not_found_in_trash = 'Geen teksten gevonden in prullenbak';
	}
	add_action( 'init', 'customize_admin_labels' );	
	
	//Remove Private from Private Pages
	add_filter( 'private_title_format', 'yourprefix_private_title_format' );
	add_filter( 'protected_title_format', 'yourprefix_private_title_format' );
	
	function yourprefix_private_title_format( $format ) {
		return '%s';
	}	
	
	/*Voeg custom body class toe om menubalk te stijlen op single pages */
	function add_category_name($classes = '') {
		if(is_single()) {
			$category = get_the_category();
			$classes[] = 'category-'.$category[0]->slug; 
		}
		return $classes;
	}
	
	add_filter('body_class','add_category_name');
	
	/*Custom Header Dimensies -- 1280 pixels mutherfucker */
	function wpse_custom_header_setup() {
		add_theme_support( 'custom-header', apply_filters( 'wpse_header_args', array(
        'width'                  => 1280,
        'height'                 => 240,
		) ) );
	}
	add_action( 'after_setup_theme', 'wpse_custom_header_setup' );	
	
	/*Breedte van Galleires in artikelen*/
	if ( ! isset( $content_width ) )
    $content_width = 640;
	
	/*Verwijder mogelijkheid tot reageren op media*/
	function filter_media_comment_status( $open, $post_id ) {
		$post = get_post( $post_id );
		if( $post->post_type == 'attachment' ) {
			return false;
		}
		return $open;
	}
	add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
	
	/* opties voor custom aanpassingen in het thema */ 
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
		'page_title'   =>  'Header Titel',
		'menu_title'   =>  'Header Titel',
		'menu_slug'    =>  'header-title',
		'capability'   =>  'manage_categories',
		'redirect'     =>   false
		));
	}
	

			/* impporteer Schaduw JS voor header */
		function shadow_script_import() {
			wp_enqueue_script(
			'HeaderShadow',
			get_stylesheet_directory_uri() . '/js/HeaderShadow.js',
			array( 'jquery' )
			);
		}
		
		add_action( 'wp_enqueue_scripts', 'shadow_script_import' );
		

	
	
	error_reporting(E_ALL & ~E_NOTICE);
?>