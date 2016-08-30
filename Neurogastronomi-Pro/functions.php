<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Include Icons
include_once( get_stylesheet_directory() . '/lib/svg_icons.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Setup extended search to include ACF content
include_once( get_stylesheet_directory() . '/lib/custom-search-acf-wordpress.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'neuro', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'neuro' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Neurogastronomi Pro' );
define( 'CHILD_THEME_URL', 'https://github.com/mbernth/Neurogastronomi-Pro' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Titillium+Web:600|Ubuntu:400,400i,700,700i&subset=latin-ext', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'neuro-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'mono-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.9.1.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-fitvids-script', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-fittext', get_stylesheet_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-googlemaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-maps', get_stylesheet_directory_uri() . '/js/maps.js', array( 'jquery' ), '1.0.0', true );
	
	wp_enqueue_script( 'mono-flip-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-modernizr', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.min.js', array( 'jquery' ), '1.0.0' );
	// wp_enqueue_script( 'mono-flip', get_bloginfo( 'stylesheet_directory' ) . '/js/flip.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-flip', get_bloginfo( 'stylesheet_directory' ) . '/js/mono_flip.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'moono-timeline', get_bloginfo( 'stylesheet_directory' ) . '/js/timeline.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'countdown', get_stylesheet_directory_uri() . '/js/countdown.js', array( 'jquery' ), '1.0.0' );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

/** Conditional html element classes */
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]> <html class="ie6" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>> <!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <?php
}

//* Add custom meta tag for mobile browsers
add_action( 'genesis_meta', 'neuro_viewport_meta_tag' );
function neuro_viewport_meta_tag() {
	echo '<meta name="HandheldFriendly" content="True">';
	echo '<meta name="MobileOptimized" content="320">';
}
// Change favicon location and add touch icons
add_filter( 'genesis_pre_load_favicon', 'neuro_favicon_filter' );
function neuro_favicon_filter( $favicon ) {
	echo '<link rel="shortcut icon" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon.ico" type="image/x-icon" />';
	echo '<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-16x16.png" sizes="16x16">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-32x32.png" sizes="32x32">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-96x96.png" sizes="96x96">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/android-chrome-192x192.png" sizes="192x192">';
	echo '<meta name="msapplication-square70x70logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//smalltile.png" />';
	echo '<meta name="msapplication-square150x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//mediumtile.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//widetile.png" />';
	echo '<meta name="msapplication-square310x310logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//largetile.png" />';

}
//* Add custom meta tag for mobile browsers
add_action( 'genesis_meta', 'neuro_typhography_link_tag' );
function neuro_typhography_link_tag() {
	echo '<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7155452/782242/css/fonts.css" />';
}

//* Add svg upload
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

//* Remove the edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );	

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Position elemente
// =====================================================================================================================

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

//* Widgets
// =====================================================================================================================

//* Remove the header right widget area
unregister_sidebar( 'header-right' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'neuro' ),
	'description' => __( 'This is the before header widget area.', 'neuro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'before-header-search',
	'name'        => __( 'Above Header Search', 'neuro' ),
	'description' => __( 'This is the search widget area above header.', 'neuro' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-footer-search',
	'name'        => __( 'After Footer Search', 'neuro' ),
	'description' => __( 'This is the search widget area after footer.', 'neuro' ),
) );

//* Hook before header widget area above header
add_action( 'genesis_before_header', 'neuro_before_header', 15 );
function neuro_before_header() {

	genesis_widget_area( 'before-header', array(
		'before' => '<div class="before-header widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}
//* Hook Search widget area above header
add_action( 'genesis_before', 'neuro_search_above', 15 );
function neuro_search_above() {

	genesis_widget_area( 'before-header-search', array(
		'before' => '<nav id="c-menu--push-top" class="c-menu c-menu--push-top widget-area"><div class="wrap"><span class="c-menu__close"><svg class="icon-cross"><use xlink:href="#icon-cross"></use></svg></span>',
		'after'  => '</div></nav><div id="c-mask" class="c-mask"></div>',
	) );

}
//* Hook Search widget area after footer
add_action( 'genesis_before_footer', 'neuro_search_after', 15 );
function neuro_search_after() {

	genesis_widget_area( 'after-footer-search', array(
		'before' => '<div class="footer_search"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

//* Push search
// =====================================================================================================================

add_filter( 'genesis_attr_site-container', 'themeprefix_site_container_id' );
function themeprefix_site_container_id( $attributes ) { 
 $attributes['id'] = 'o-wrapper';
 $attributes['class'] .= ' o-wrapper';
 return $attributes;
}

add_action( 'wp_enqueue_scripts', 'push_scripts_styles' );
function push_scripts_styles() {
		wp_enqueue_script( 'classie-script', get_bloginfo( 'stylesheet_directory' ) . '/js/menu.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'push-script', get_stylesheet_directory_uri() . '/js/menu_push.js', array( 'jquery' ), '1.0.0', true );
}


//* Costum Search form
// =====================================================================================================================

/*
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML. 
*/
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div>
	<span class="c-button_icon"><svg class="icon-search"><use xlink:href="#icon-search"></use></svg></span>
    <input class="input__field input__field--yoko" type="search" value="' . get_search_query() . '" name="s" id="s" />
	<label class="input__label input__label--yoko" for="s"><span class="input__label-content input__label-content--yoko">' . __( 'Search' ) . '</span></label>
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );


//* Flexible grids
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_flexible_grids', 15 );
function mono_flexible_grids() {
	
	if ( is_single() || is_page() ) {
	
	$loopCount = 0;
	
	
	
	if( have_rows('content_row') ):
	
		
	
		// loop through the rows of data
    	while ( have_rows('content_row') ) : the_row();
		
			$headline = 	get_sub_field('row_headline');
			$rowbutton = get_sub_field('row_button');
			$rowbuttonmanual = get_sub_field('row_button_manual_url');
			$rowtext = 	get_sub_field('row_button_text');
			$coll = get_sub_field('columns_no');

        	if( get_row_layout() == 'row_setup' ):
				
			if (get_sub_field('hide_row')){
				
				}else{
				
				echo '<article class="gridcontainer  ';
						the_sub_field('background_colour');
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				
				if ($headline){
					echo '<h1 class="row_headline">' . $headline . '</h1>';
				}
				
				
				
				echo '<div class="wrap">';
					
					
					
					$selected = get_sub_field('background_colour');
					$content = get_sub_field('content');
					
					
					while ( have_rows('column') ) : the_row();
							
							
							if (get_sub_field('content')){
							echo '<section class="coll' . $coll . ' wysiwyg">';
							
								
								
							
								the_sub_field('content');
								
								
								if (get_sub_field('button_text_content')){
									echo '<a class="button" href="';
										if (get_sub_field('botton_manual_link')){
											the_sub_field('botton_manual_link');
										}else{
											the_sub_field('button_content');
										}
									echo '"><span>';
										the_sub_field('button_text_content');
									echo '</span></a>';
								}
								
							echo '</section>';
							}
							
							if (get_sub_field('widget_content')){
							echo '<section class="coll' . $coll. '">';
								the_sub_field('widget_content');
							echo '</section>';
							}
							
							if (get_row_layout() == 'timeline'){
							echo '<section id="cd-timeline" class="coll' . $coll. ' cd-container">';
									$items = get_field( 'timeline_item', 'option' );
									
									if($items) {
										
										foreach($items as $item) {
											
											if ($item['hide_timeline_item']){
				
											}else{
											
												echo '
       												 <div class="cd-timeline-block">
													 	<div class="cd-timeline-img cd-picture"></div>
														<div class="cd-timeline-content">
															<h2>' . $item['item_headline'] .'</h2>
															' . $item['item_text'] .'
															<span class="cd-date">' . $item['item_date'] .'</span>
														</div>
													</div>';
											}
											
										}
									}
									
							echo '</section>';
							}
							
							if (get_sub_field('image_link')){
								
								if( get_sub_field('content') && $selected == 'Non'  || $selected == 'Non Black'  || $selected == 'Non Red'  || $selected == 'Non Grey') {
									
									echo '<section class="coll' . $coll. ' backimage" style="background-image: url(';
										the_sub_field('image_link');
									echo ');">';
									echo '</section>';
									
									}else{
										
									echo '<section class="coll' . $coll. '">';
										echo '<img src="';
											the_sub_field('image_link');
										echo '">';
									echo '</section>';
										
								}
								
							}
							
							if (get_sub_field('video_embeding_code')){
							echo '<section class="coll' . $coll. '">';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}
							
							if (get_sub_field('google_map')){
								
								$location = get_sub_field('google_map');
								
							echo '<section class="coll' . $coll. '">';
								echo '<div class="acf-map">
		 								<div class="marker" data-lat="'.$location['lat'].'" data-lng="'.$location['lng'].'"></div>
		 							  </div>';
							echo '</section>';
							}
							
							if (get_sub_field('case_thumbnail')){
								
								echo '<section class="coll' . $coll. ' case_preview">';
									echo '<a href="';
											the_sub_field('case_link');
									echo '">';
									echo '<div class="thumb-image">';
										echo '<img src="';
											the_sub_field('case_thumbnail');
										echo '">';
									echo '</div>';
									echo '</a>';
									echo '<div class="entry-content" itemprop="text">
											<header class="entry-header">
											<h2 class="entry-title" itemprop="headline">
												<a href="';
													the_sub_field('case_link');
												echo '" rel="bookmark">';
													the_sub_field('case_name');
												echo '</a>
											</h2> 
											</header>
											<strong>Kunde: </strong>';
												the_sub_field('case_client');
											echo '</div>';
								echo '</section>';
								
							}
					
					endwhile;
				
				echo '</div>';
				
				if ($rowtext){
					echo '<a class="button" href="';
					if (get_sub_field('row_button_manual_url')){
						echo '' . $rowbuttonmanual . '';
					}else{
						echo '' . $rowbutton . '';
					}
					echo '"><span>' . $rowtext . '</span></a>';
				}
				
				echo '</article>';
			
			}
			endif;
			$loopCount ++;
			
			if( get_row_layout() == 'full_screen_image' ):
				echo '<article class="">
					<div class="featured-section" style="background-image:url('; 
					the_sub_field('full_screen_back_image');
					echo');"><div class="image-section">';
					
						echo '<div class="slide_content">';
							the_sub_field('full_screen_content');
					
				echo '</div></div></div></archive>';
			endif;
			
			if( get_row_layout() == 'bindslev_team' ):
				$teamheadline = get_field( 'team_headline', 'option' );
				$rows = get_field( 'team', 'option' );
				$partners = get_field( 'associated_partners', 'option' );
				$partnersheadline = get_field( 'associated_partners_headline', 'option' );
				
				
				if($rows) {
					echo '<article class="gridcontainer White team">';
						
						if (	get_field( 'team_headline', 'option' )){
							echo '<h1 class="row_headline">' . $teamheadline .'</h1>';
							echo '<div class="wrap">';
						}else{
							echo '<div class="wrap">';
						}
						
						foreach($rows as $row) {	
						
						if ($row['hide_team_member']){
				
							}else{
											
						echo '<div class="coll3 column">
            					<div class="caption caption-5">
									<div class="profile">
										<div class="team-image">
											<img src="' . $row['picture'] .'" title="' . $row['name']. ', ' . $row['title']. '" alt="' . $row['name']. ', ' . $row['title']. '">
										</div>
										<div class="team-info">
											<h3>' . $row['name']. '</h3>
											<p><em>' . $row['title']. '</em></p>
										</div>
									</div>
									<div class="info">
										' . $row['profile_text']. '
										<div class="team-info">
											<a href="mailto:' . $row['email']. '" class="btn"><svg class="icon-mail"><use xlink:href="#icon-mail"></use></svg> ' . $row['email']. '</a>
											<a href="tel:' . $row['telephone']. '" class="btn"><svg class="icon-mobile"><use xlink:href="#icon-mobile"></use></svg> ' . $row['telephone']. '</a>
											<a href="' . $row['linkedin']. '" class="btn" target="_blank"><svg class="icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg> Linkedin</a>
										</div>
									</div>
            					</div>  
						</div>';
						}
						
						}
			
					echo '</div></article>';

				}
				
				if($partners) {
					echo '<article class="gridcontainer White partner team">';
					
						if (	get_field( 'associated_partners_headline', 'option' )){
							echo '<h1 class="row_headline">' . $partnersheadline .'</h1>';
							echo '<div class="wrap">';
						}else{
							echo '<div class="wrap">';
						}
			
						foreach($partners as $partner) {	
						
						echo '<div class="coll3 column">
            					<div class="caption caption-5">
									<div class="profile">
										<div class="team-image">
											<img src="' . $partner['picture'] .'" title="' . $partner['name']. ', ' . $partner['title']. '" alt="' . $partner['name']. ', ' . $partner['title']. '">
										</div>
										<div class="team-info">
											<h3>' . $partner['name']. '</h3>
											<p><em>' . $partner['title']. '</em></p>
										</div>
									</div>
									<div class="info">
										' . $partner['profile_text']. '
										<div class="team-info">
											<a href="mailto:' . $partner['email']. '" class="btn"><svg class="icon-mail"><use xlink:href="#icon-mail"></use></svg> ' . $partner['email']. '</a>
											<a href="tel:' . $partner['telephone']. '" class="btn"><svg class="icon-mobile"><use xlink:href="#icon-mobile"></use></svg> ' . $partner['telephone']. '</a>
											<a href="' . $partner['linkedin']. '" class="btn" target="_blank"><svg class="icon-linkedin"><use xlink:href="#icon-linkedin"></use></svg> Linkedin</a>
										</div>
									</div>
            					</div>  
						</div>';
						
					}
			
					echo '</div></article>';

				}
				
			endif;
			
    	endwhile;
	
	else :

    // no layouts found

	endif;
	
	}

}


//* Featured Image
// =====================================================================================================================


//* DISPLAY FULL WIDTH FEATURED IMAGE ON STATIC PAGES
add_action ( 'genesis_after_header', 'single_post_featured_image', 15 );
function single_post_featured_image() {
	if ( (is_single() || is_page()) && has_post_thumbnail() ) :
	
		$img = genesis_get_image( array( 'format' => 'src' ) );
		printf( '<div class="featured-section" style="background-image:url(%s);"><div class="image-section"></div></div>', $img );
		
		elseif( (! is_front_page()) ):
		printf( '<div class="image-section" style="background-color:#231f20;"></div>', $img );
		
		
	endif;
	
}

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_featured_image' );
function enqueue_scripts_featured_image() {
	
	if ( (is_single() || is_page()) && has_post_thumbnail() ) :
		// wp_enqueue_script( 'mono-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'mono-image-height', get_stylesheet_directory_uri() . '/js/image.height.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/parallax.js', array( 'jquery' ), '1.0.0' );
	endif;
	
}

add_filter( 'body_class', 'featured_body_class' );
function featured_body_class( $classes ) {
	
	if ( ( is_single( )  || is_page()) && has_post_thumbnail() )
		$classes[] = 'featured-image';
		return $classes;
		
}

//* Team & Timeline
// =====================================================================================================================

// Add events option page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Team',
		'menu_title'	=> 'Team'
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Timeline',
		'menu_title'	=> 'Timeline'
	));
}

//* Case widget
// =====================================================================================================================
//* Add Case widget for ACF
if ( ! class_exists( 'Case_Widget' ) ) {
	class Case_Widget extends WP_Widget
	{
		function Case_Widget() 
		{
			parent::WP_Widget(false, "Case Widget");
		}
 
		function update($new_instance, $old_instance) 
		{  
			return $new_instance;  
		}  
 
		function form($instance)
		{  
			$title = esc_attr($instance["title"]);  
			echo "<br />";
		}
 
		function widget($args, $instance) 
		{
			$widget_id = "widget_" . $args["widget_id"];
 
			// I like to put the HTML output for the actual widget in a seperate file
			include(realpath(dirname(__FILE__)) . "/case_widget.php");
		}
	}
}
register_widget("Case_Widget");

//* Register Case widget areas
genesis_register_sidebar( array(
	'id'          => 'case_widget_area',
	'name'        => __( 'Case', 'neuro' ),
	'description' => __( 'This is the Case widget area.', 'neuro' ),
) );