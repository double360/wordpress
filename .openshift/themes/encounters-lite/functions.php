<?php



/**
 * Theme Functions
 *
 * @file           functions.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */


/**
 * Set content width
 */
if ( ! isset( $content_width ) )
		$content_width = 770;

/**
 * Adjust the content width for Full Width page template.
 */
function encounters_lite_set_content_width() {
	global $content_width;

	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'blogright' ) ) 
		$content_width = 1170;
}
add_action( 'template_redirect', 'encounters_lite_set_content_width' );

if ( ! function_exists( 'encounters_lite_setup' ) ):
function encounters_lite_setup() {
	/**
	 * Encounters is now available for translations.
	 * Add your files into /languages/ directory.
	 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'encounters-lite', get_template_directory() . '/languages' );
	
	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();
    /**
	 * This feature enables title tag instead of wp_title() . 
	 * @see https://codex.wordpress.org/Title_Tag
	 */
	add_theme_support( 'title-tag' );
	/**
	 * This feature enables post and comment RSS feed links to head.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	* Enable support for Post Formats
	* @see http://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'status', 'quote' ) );
		
	/**
	 * This feature enables post-thumbnail support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

		
	/**
	 * This feature enables custom-menus support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'primary-menu'      => __('Primary Menu', 'encounters-lite'),
		'footer-menu'       => __('Footer Menu', 'encounters-lite'),
	) );
}
endif;
add_action( 'after_setup_theme', 'encounters_lite_setup' );

/**
* Setup the WordPress core custom background feature.
* @see http://codex.wordpress.org/Custom_Backgrounds 
*/

add_theme_support( 'custom-background', array(
		'default-color' => '000000',
		'default-image' => '',
	) );



/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function encounters_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'encounters-lite' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'encounters_wp_title', 10, 2 );


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function encounters_lite_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'encounters_lite_page_menu_args' );

/**
 * Sets the post excerpt length to 40 words.
 */
function encounters_lite_excerpt_length($length) {
	return 40;
}

add_filter('excerpt_length', 'encounters_lite_excerpt_length');

/**
 * This function removes .menu class from custom menus in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 */
class encounters_lite_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}
 
	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		return $settings;
	}
 
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';
 
		return $args;
	}
}
new encounters_lite_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function encounters_lite_wp_page_menu ($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass = $matches[1];
		$replace = array('<div class="'.$divclass.'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
		return $new_markup; }

add_filter('wp_page_menu', 'encounters_lite_wp_page_menu');
	
	
/**
 * This function prints post meta data 
 */
if (!function_exists('encounters_lite_post_meta_data')) :

function encounters_lite_post_meta_data() {
	printf( __( '<span class="%3$s"> Author: </span>%4$s', 'encounters-lite' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
		get_permalink(),
		esc_attr( get_the_time() ),
		get_the_date()
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'encounters-lite' ), get_the_author() ),
		get_the_author()
	    )
	);
}
endif;	

/**
 * Returns a "Read more" link for excerpts
 */
	function encounters_lite_read_more() {
		return '<div class="read-more"><a href="' . get_permalink() . '">' . __('Continue Reading...', 'encounters-lite') . '</a></div>';
	}
/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
	function encounters_lite_custom_excerpt_more($output) {
		if (has_excerpt() && !is_attachment()) {
			$output .= encounters_lite_read_more();
		}
		return $output;
	}

add_filter('get_the_excerpt', 'encounters_lite_custom_excerpt_more');

/**
 * This function removes inline styles set by WordPress gallery.
 */
	function encounters_lite_remove_gallery_css($css) {
		return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
	}

	add_filter('gallery_style', 'encounters_lite_remove_gallery_css');
		
/**
 * This function removes default styles set by WordPress recent comments widget.
 */
	function encounters_lite_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
	add_action( 'widgets_init', 'encounters_lite_remove_recent_comments_style' );
 
/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 * 
 */
	function encounters_lite_category_rel_removal ($output) {
		$output = str_replace(' rel="category tag"', '', $output);
		return $output;
	}

	add_filter('wp_list_categories', 'encounters_lite_category_rel_removal');
	add_filter('the_category', 'encounters_lite_category_rel_removal');

/**
 * Displays navigation to next/previous pages when applicable.
 */	
	if ( ! function_exists( 'encounters_lite_content_nav' ) ) :
	function encounters_lite_content_nav( $html_id ) {
		global $wp_query;

		$html_id = esc_attr( $html_id );

		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'encounters-lite' ); ?></h3>
				<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'encounters-lite' ) ); ?></div>
				<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'encounters-lite' ) ); ?></div>
			</nav><!-- #<?php echo $html_id; ?> .navigation -->
		<?php endif;
	}
	endif;	

/**
 * Move the More Link outside the default content paragraph.
 * Special thanks to http://nixgadgets.vacau.com/archives/134
 */
	function encounters_lite_new_more_link($link) {
		$link = '<p class="more-link">'.$link.'</p>';
		return $link;
	}
	add_filter('the_content_more_link', 'encounters_lite_new_more_link');	
	
/**
 * Special excerpt length per instance ie showcase column excerpts
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
	function encounters_lite_excerpt($num) {  
	  $limit = $num+1;  
	  $excerpt = str_split(get_the_excerpt()); 
	  $length = count($excerpt);
		  if ($length>=$num) {
			$excerpt = array_slice( $excerpt, 0, $num);  
			$excerpt = implode("",$excerpt)."...";  
			echo $excerpt;  
		  
		  }
	}
	
/**
 * Remove the annoying jump to position when clicking Read More
 */
function encounters_lite_remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'encounters_lite_remove_more_jump_link');

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 * This theme uses this for the portfolio for any sub portfolio categories
 * 
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 * Special thanks to Michal Ochman http://blog.scur.pl/ for modifying this to use the category name instead of ID
 */

	if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
		function post_is_in_descendant_category( $cats, $_post = null ) {
			foreach ( (array) $cats as $cat ) {
				// get_term_children() accepts integer ID only
				if ( is_string( $cat ) ) {
					$cat = get_term_by( 'slug', $cat, 'category' );
					if ( ! isset( $cat, $cat->term_id ) )
						continue;
					$cat = $cat->term_id;
				}
				$descendants = get_term_children( (int) $cat, 'category' );
				if ( $descendants && in_category( $descendants, $_post ) )
					return true;
			}
			return false;
		}
	}	
	
/**
 * Enqueue scripts and styles
 */

function encounters_lite_scripts() {
	global $wp_styles;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads the theme stylesheet	
	wp_enqueue_style( 'encounters-style', get_stylesheet_uri() );	
	
	// Loads the Internet Explorer specific stylesheet if ie9.
	wp_enqueue_style( 'encounters-ie', get_template_directory_uri() . '/css/ie.css', array( 'encounters-style' ), '20130501' );
	$wp_styles->add_data( 'encounters-ie', 'conditional', 'lt IE 9' );
	
	// Loads the theme scripts
	wp_enqueue_script('encounters-modernizr', get_template_directory_uri() . '/js/encounters-modernizr.js', array('jquery'), '2.6.2', false);
    wp_enqueue_script('encounters-bootstrap', get_template_directory_uri() . '/js/encounters-bootstrap.min.js', array('jquery'), '2.2.2', true);
	wp_enqueue_script('encounters-bootstrap-st', get_template_directory_uri() . '/js/encounters-bootstrap-st.js', array('jquery'), '2.2.2', true);			
	wp_enqueue_script( 'encounters-navigation', get_template_directory_uri() . '/js/encounters-navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'encounters-placeholders', get_template_directory_uri() . '/js/encounters-placeholders.js', array(), '3.0.2', true );
}
add_action( 'wp_enqueue_scripts', 'encounters_lite_scripts' );

	
/**
 * Adds customizable styles to your <head>
 */
	function encounters_lite_customizer_css()
	{
		?>
		<style type="text/css">
			a {color: <?php echo get_theme_mod( 'links', '#bf7b7b' ); ?>;}
			a:hover,a:focus,a:active,#content-wrapper aside ul.menu-widget li.current-menu-item a {color: <?php echo get_theme_mod( 'linkshover', '#656565' ); ?>;}			
			.main-navigation a {color: <?php echo get_theme_mod( 'menulink', '#e4e6eb' ); ?>;}	
			.main-navigation li a:hover {color: <?php echo get_theme_mod( 'menulinkhover', '#bd7d78' ); ?>;}	
			.main-navigation ul li:hover > ul {background-color: <?php echo get_theme_mod( 'submenubg', '#a45f5c' ); ?>;}
			.main-navigation li ul li a:hover {background-color: <?php echo get_theme_mod( 'submenubghover', '#bd7d78' ); ?>;	color: <?php echo get_theme_mod( 'submenulinkhover', '#ffffff' ); ?>;}			
			.main-navigation .current-menu-item > a,
			.main-navigation .current-menu-ancestor > a,
			.main-navigation .current_page_item > a,
			.main-navigation .current_page_ancestor > a {color: <?php echo get_theme_mod( 'mainmenuactive', '#bd7d78' ); ?>;}
			/* make the submenus active with a background */
			.main-navigation ul.sub-menu li.current-menu-item > a,
			.main-navigation ul.sub-menu li.current-menu-ancestor > a,
			.main-navigation ul.sub-menu li.current_page_item > a,
			.main-navigation ul.sub-menu li.current_page_ancestor > a {color: <?php echo get_theme_mod( 'submenuactive', '#ffffff' ); ?>;	background:<?php echo get_theme_mod( 'submenuactivebg', '#bd7d78' ); ?>;}
			.main-navigation li.home a {color: <?php echo get_theme_mod( 'menulink', '#e4e6eb' ); ?>;}
			h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: <?php echo get_theme_mod( 'headings', '#b36464' ); ?>;}
			#bottom-group h3 {color: <?php echo get_theme_mod( 'bottomheading', '#ffffff' ); ?>;}
			#bottom-group a {color: <?php echo get_theme_mod( 'bottomlinks', '#f0a6a6' ); ?>;}
			#bottom-group a:hover {color: <?php echo get_theme_mod( 'bottomlinkshover', '#dde0e1' ); ?>;}
			#bottom-group li {border-color: <?php echo get_theme_mod( 'bottomlistborder', '#656f74' ); ?>;}
			#footer-wrapper a, #footer-menu {color: <?php echo get_theme_mod( 'footerlinks', '#bf7b7b' ); ?>;}
			#footer-wrapper a:hover {color: <?php echo get_theme_mod( 'footerlinkshover', '#656565' ); ?>;}
		</style>
		<?php
	}
	add_action( 'wp_head', 'encounters_lite_customizer_css');
	
/**
 *
 * Load additional functions and theme options
 *
 */
	require ( get_template_directory() . '/includes/theme-customizer.php' );
	require ( get_template_directory() . '/includes/custom-header.php' );
	require ( get_template_directory() . '/includes/widgets.php' );
	require ( get_template_directory() . '/includes/comment-form.php' );

/**
 * WordPress.com-specific functions and definitions
 */
	require( get_template_directory() . '/includes/wpcom.php' );

/**
* Load Jetpack compatibility file.
*/
	require( get_template_directory() . '/includes/jetpack.php' );		

