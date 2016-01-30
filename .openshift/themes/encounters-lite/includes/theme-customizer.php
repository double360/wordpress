<?php



/**
 * Theme Options and Settings
 *
 * @file           theme-customizer.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
 

 /**
 * Adds the Customize page to the WordPress admin area in the Appearance menu group
 */
function encounters_lite_customizer_menu() {
    add_theme_page( __( 'Customize Encounters', 'encounters-lite' ), __( 'Theme Options', 'encounters-lite' ), 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'encounters_lite_customizer_menu' );
 
/**
 * Lets create a customizable theme and begin with some pre-setup
 */ 
 
	add_action('customize_register', 'theme_customize');
	function theme_customize($wp_customize) {

// Lets remove the default background colour so we can move it with a new setting
	$wp_customize->remove_setting( 'background_color');
	$wp_customize->remove_control( 'background_color');

/**
*  Page to CHeck the Pro Version
*/
class encounters_lite_note extends WP_Customize_Control {
    public function render_content() {
        echo __( '<div style="color:red"><h4>This following features are available in the <a href="http://demo.styledthemes.com/encounters/" title="premium version" target="_blank">Premium version only.</a></h4></div>', 'celestial-lite' );
    }
}

/**
 * Lets add a logo to our Title and Tagline group
 */
// Setting group for uploading logo
    $wp_customize->add_setting('my_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
		'sanitize_callback' => 'encounters_lite_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'    => __('Your Logo', 'encounters-lite'),
        'section'  => 'title_tagline',
        'settings' => 'my_logo',
    )));	
/**
 * Lets add a section tab called BASIC SETTINGS
 */
 
	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'encounters-lite' ),
		'priority'       => 25,
	) );

/**
 * Options for the Basic Settings section
 */

// Setting for blog layout
	$wp_customize->add_setting( 'blog_sidebar', array(
		'default' => 'rightcolumn',
		'sanitize_callback' => 'encounters_lite_sanitize_bloglayout',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'blog_sidebar', array(
    'label'   => __( 'Blog Sidebar Column', 'encounters-lite' ),
    'section' => 'basic_settings',
	'priority' => 1,
    'type'    => 'radio',
        'choices' => array(
            'rightcolumn' => __( 'Right Column', 'encounters-lite' ),
            'leftcolumn' => __( 'Left Column', 'encounters-lite' ),
			'fullwidth' => __( 'Full Width', 'encounters-lite' ),
        ),
    ));

// Setting for archive layout
	$wp_customize->add_setting( 'archive_sidebar', array(
		'default' => 'rightcolumn',
		'sanitize_callback' => 'encounters_lite_sanitize_archivelayout',
	) );
// Control for archive layout	
	$wp_customize->add_control( 'archive_sidebar', array(
    'label'   => __( 'Archive Sidebar Column', 'encounters-lite' ),
    'section' => 'basic_settings',
	'priority' => 2,
    'type'    => 'radio',
        'choices' => array(
            'rightcolumn' => __( 'Right Column', 'encounters-lite' ),
            'leftcolumn' => __( 'Left Column', 'encounters-lite' ),
			'fullwidth' => __( 'Full Width', 'encounters-lite' ),
        ),
    ));

// Setting for author layout
	$wp_customize->add_setting( 'author_sidebar', array(
		'default' => 'rightcolumn',
		'sanitize_callback' => 'encounters_lite_sanitize_authorlayout',
	) );
// Control for author layout	
	$wp_customize->add_control( 'author_sidebar', array(
    'label'   => __( 'Author Sidebar Column', 'encounters-lite' ),
    'section' => 'basic_settings',
	'priority' => 3,
    'type'    => 'radio',
        'choices' => array(
            'rightcolumn' => __( 'Right Column', 'encounters-lite' ),
            'leftcolumn' => __( 'Left Column', 'encounters-lite' ),
			'fullwidth' => __( 'Full Width', 'encounters-lite' ),
        ),
    ));
	
// Setting for blog intro image
	$wp_customize->add_setting( 'intro_image', array(
		'default' => 'small',
		'sanitize_callback' => 'encounters_lite_sanitize_imagesize',
	) );
// Control for blog intro image	
	$wp_customize->add_control( 'intro_image', array(
    'label'   => __( 'Intro Image', 'encounters-lite' ),
    'section' => 'basic_settings',
	'priority' => 4,
    'type'    => 'radio',
        'choices' => array(
            'big' => __( 'Big Image', 'encounters-lite' ),
            'small' => __( 'Small Image', 'encounters-lite' ),
        ),
    ));
    
// hide featured image on single
	$wp_customize->add_setting( 'hide_featured', array(
	'sanitize_callback' => 'encounters_lite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'hide_featured', array(
        'type' => 'checkbox',
        'label'    => __( 'Show Featured Image Full Post', 'encounters-lite' ),
        'section' => 'basic_settings',
		'priority' => 5,
    ) );

// copyright
$wp_customize->add_setting('site_copyright', array(
        'default'        => 'Your Name',
		'sanitize_callback' => 'encounters_lite_sanitize_text',
 
    ));
 
    $wp_customize->add_control('site_copyright', array(
        'label'      => __('Copyright Title', 'encounters-lite'),
        'section'    => 'basic_settings',
        'settings'   => 'site_copyright',
		'priority' => 6,
    ));

	
/**
 * Options for the Colour Settings section
 */		

// Page top border
	$wp_customize->add_setting( 'background_color', array(
		'default'        => '#000000',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'   => __( 'Background Colour', 'encounters-lite' ),
		'section' => 'background_image',
		'settings'   => 'background_color',
	) ) );
	
// Page top border
	$wp_customize->add_setting( 'topborder', array(
		'default'        => '#000000',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topborder', array(
		'label'   => __( 'Top Border', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'topborder',
	) ) ); 

// Header Bottom border
	$wp_customize->add_setting( 'headerborder', array(
		'default'        => '#d9dee1',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headerborder', array(
		'label'   => __( 'Header Border', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'headerborder',
	) ) );	
// Header Background
	$wp_customize->add_setting( 'headerbg', array(
		'default'        => '#131313',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headerbg', array(
		'label'   => __( 'Header Background', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'headerbg',
	) ) );
// Content background
	$wp_customize->add_setting( 'contentbg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentbg', array(
		'label'   => __( 'Content Background', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'contentbg',
	) ) );	
	
// Content bottom border
	$wp_customize->add_setting( 'contentborder', array(
		'default'        => '#bf7b7b',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentborder', array(
		'label'   => __( 'Content Bottom Border', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'contentborder',
	) ) );	
// Headings colour
	$wp_customize->add_setting( 'headings', array(
		'default'        => '#b36464',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'   => __( 'Headings &amp; Titles', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'headings',
	) ) );	
// Content text colour
	$wp_customize->add_setting( 'contenttext', array(
		'default'        => '#787b7f',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contenttext', array(
		'label'   => __( 'Content Text Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'contenttext',
	) ) );	
// Content link colour
	$wp_customize->add_setting( 'links', array(
		'default'        => '#bf7b7b',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links', array(
		'label'   => __( 'Content Link Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'links',
	) ) );
// Content link hover colour
	$wp_customize->add_setting( 'linkshover', array(
		'default'        => '#656565',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'linkshover', array(
		'label'   => __( 'Content Link Hover Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'linkshover',
	) ) );
// Bottom area background
	$wp_customize->add_setting( 'bottombg', array(
		'default'        => '#363a3d',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottombg', array(
		'label'   => __( 'Bottom Background', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottombg',
		'priority' => '23'
	) ) );	
// Bottom area border
	$wp_customize->add_setting( 'bottomborder', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomborder', array(
		'label'   => __( 'Bottom Border', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottomborder',
		'priority' => '24'
	) ) );	
// Bottom area text colour
	$wp_customize->add_setting( 'bottomtext', array(
		'default'        => '#dde0e1',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomtext', array(
		'label'   => __( 'Bottom Text Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottomtext',
		'priority' => '21'
	) ) );	
// Bottom area heading colour
	$wp_customize->add_setting( 'bottomheading', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomheading', array(
		'label'   => __( 'Bottom Heading Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottomheading',
		'priority' => '22'
	) ) );



// Bottom area links
	$wp_customize->add_setting( 'bottomlinks', array(
		'default'        => '#f0a6a6',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomlinks', array(
		'label'   => __( 'Bottom Link Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottomlinks',
		'priority' => '22'
	) ) );
// Bottom area link hover
	$wp_customize->add_setting( 'bottomlinkshover', array(
		'default'        => '#dde0e1',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomlinkshover', array(
		'label'   => __( 'Bottom Link Hover', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottomlinkshover',
		'priority' => '23'
	) ) );
// Bottom area list border
	$wp_customize->add_setting( 'bottomlistborder', array(
		'default'        => '#656f74',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottomlistborder', array(
		'label'   => __( 'Bottom List Border', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'bottomlistborder',
		'priority' => '25'
	) ) );



	
// Footer background colour
	$wp_customize->add_setting( 'footerbg', array(
		'default'        => '#1f2022',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerbg', array(
		'label'   => __( 'Footer Background', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'footerbg',
		'priority' => '26'
	) ) );	
	
// Footer bottom border
	$wp_customize->add_setting( 'footerborder', array(
		'default'        => '#2a2c2e',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerborder', array(
		'label'   => __( 'Footer Bottom Border', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'footerborder',
		'priority' => '27'
	) ) );	
// Footer text
	$wp_customize->add_setting( 'footertext', array(
		'default'        => '#656565',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footertext', array(
		'label'   => __( 'Footer Text', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'footertext',
		'priority' => '30'
	) ) );
// Footer Links
	$wp_customize->add_setting( 'footerlinks', array(
		'default'        => '#bf7b7b',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerlinks', array(
		'label'   => __( 'Footer Links', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'footerlinks',
		'priority' => '29'
	) ) );
// Footer Links on hover
	$wp_customize->add_setting( 'footerlinkshover', array(
		'default'        => '#656565',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footerlinkshover', array(
		'label'   => __( 'Footer Link Hover', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'footerlinkshover',
		'priority' => '28'
	) ) );	
	
// Socialbar background colour
	$wp_customize->add_setting( 'socialbg', array(
		'default'        => '#0f1011',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'socialbg', array(
		'label'   => __( 'Social Bar Background', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'socialbg',
		'priority' => '31'
	) ) );		
	
// Blog date box
	$wp_customize->add_setting( 'datebox', array(
		'default'        => '#93969f',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'datebox', array(
		'label'   => __( 'Blog Date Box', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'datebox',
		'priority' => '20'
	) ) );	
// Blog date colour
	$wp_customize->add_setting( 'datecolour', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'datecolour', array(
		'label'   => __( 'Blog Date Colour', 'encounters-lite' ),
		'section' => 'colors',
		'settings'   => 'datecolour',
		'priority' => '19'
	) ) );	
	
	
/**
 * Lets add a section tab called Social Networking
 */
 
	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking', 'encounters-lite' ),
		'priority'       => 40,
	) );

// Setting for hiding the social bar
	$wp_customize->add_setting( 'hide_social', array(
		'default' => '',
		'sanitize_callback' => 'encounters_lite_sanitize_checkbox',
	) );
// Control for hiding the social bar
	$wp_customize->add_control( 'hide_social', array(
		'settings' => 'hide_social',
		'label' => __( 'Social Bar', 'encounters-lite' ),
		'section' => 'social_networking',
		'type' => 'checkbox',
		'priority' => 1,
	) );
	
// Setting group for Twitter
	$wp_customize->add_setting( 'twitter_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'twitter_uid', array(
		'settings' => 'twitter_uid',
		'label'    => __( 'Twitter', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Facebook
	$wp_customize->add_setting( 'facebook_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'facebook_uid', array(
		'settings' => 'facebook_uid',
		'label'    => __( 'Facebook', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Google+
	$wp_customize->add_setting( 'google_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'google_uid', array(
		'settings' => 'google_uid',
		'label'    => __( 'Google+', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Linkedin
	$wp_customize->add_setting( 'linkedin_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'linkedin_uid', array(
		'settings' => 'linkedin_uid',
		'label'    => __( 'Linkedin', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	
	
// Setting group for Pinterest
	$wp_customize->add_setting( 'pinterest_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'pinterest_uid', array(
		'settings' => 'pinterest_uid',
		'label'    => __( 'Pinterest', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );	


// Setting group for Youtube
	$wp_customize->add_setting( 'youtube_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'youtube_uid', array(
		'settings' => 'youtube_uid',
		'label'    => __( 'Youtube', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );

// Setting group for Flickr
	$wp_customize->add_setting( 'flickr_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'flickr_uid', array(
		'settings' => 'flickr_uid',
		'label'    => __( 'Flickr', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );
	
// Setting group for RSS
	$wp_customize->add_setting( 'rss_uid', array(
		'default'        => '',
		'sanitize_callback' => 'encounters_lite_sanitize_url',
	) );

	$wp_customize->add_control( 'rss_uid', array(
		'settings' => 'rss_uid',
		'label'    => __( 'RSS', 'encounters-lite' ),
		'section'  => 'social_networking',
		'type'     => 'text',
	) );
/*
=================================================
STICKY MENU
=================================================
*/

    $wp_customize->add_section( 'choose_sticky_style', array(
        'title'          => __( 'Sticky Menu', 'encounters-lite' ),
        'description'    => __(' ', 'encounters-lite'),  
        'priority'       => 41,
        
    ) );
  

    $wp_customize->add_setting( 'nav_position_scrolltop', array(
        'default' => '',
        'sanitize_callback' => 'encounters_lite_sanitize_checkbox',
    ) );
    
    $wp_customize->add_control( 'nav_position_scrolltop', array(
        'label'   => __( 'Sticky Menu', 'encounters-lite' ),
        'section' => 'choose_sticky_style',
        'settings' => 'nav_position_scrolltop',
        'type'    => 'checkbox',
        'choices' => array(
            '1' => __( 'Sticky Menu', 'encounters-lite' ),
        ),
       'priority'       => 20,  
    ));
    $wp_customize->add_setting( 'nav_position_scrolltop_val_pro', array(
        'default' => 'This features is available in the Premium version only.',
        'sanitize_callback' => 'encounters_lite_sanitize_number',
    ) );

    $wp_customize->add_setting( 'nav_position_scrolltop_val', array(
        'default' => '180',
        'sanitize_callback' => 'encounters_lite_sanitize_number',
    ) );
    $wp_customize->add_control( new encounters_lite_note ( $wp_customize,'nav_position_scrolltop_val_pro', array(
        'section'  => 'choose_sticky_style',
        'priority' => 21,
    ) ) );
    
    $wp_customize->add_control( 'nav_position_scrolltop_val', array(
        'label'   => __( 'Sticky Menu Offset', 'encounters-lite' ),
        'section' => 'choose_sticky_style',
        'settings' => 'nav_position_scrolltop_val',
        'type' => 'text',
        'priority'       => 22,  
    ));	
	
/**
 * Lets add more to our HEADER IMAGE tab
 */	
 
// Showcase outer container background
	$wp_customize->add_setting( 'showcasebg1', array(
		'default'        => '#bf7b7b',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',		
	) );	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'showcasebg1', array(
		'label'   => __( 'Showcase Outer Background', 'encounters-lite' ),
		'section' => 'header_image',
		'settings'   => 'showcasebg1',
		'priority' => 20,
	) ) );

// Showcase inner container background
	$wp_customize->add_setting( 'showcasebg2', array(
		'default'        => '#8a4f4b',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'showcasebg2', array(
		'label'   => __( 'Showcase Inner Background', 'encounters-lite' ),
		'section' => 'header_image',
		'settings'   => 'showcasebg2',
		'priority' => 21,
	) ) );

// Showcase Padding
	$wp_customize->add_setting( 'showcasepad', array(
		'default'        => '15px 70px',
		'sanitize_callback' => 'encounters_lite_sanitize_text',
	) );

	$wp_customize->add_control( 'showcasepad', array(
		'settings' => 'showcasepad',
		'label'    => __( 'Showcase Padding', 'encounters-lite' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 25,
	) );	

/**
 * Lets add more to our Navigation tab
 */	

// Setting group for menu top margin
	$wp_customize->add_setting( 'menumargin', array(
		'default'        => '20px',
		'sanitize_callback' => 'encounters_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'menumargin', array(
		'settings' => 'menumargin',
		'label'    => __( 'Main Menu Top Margin', 'encounters-lite' ),
		'section'  => 'nav',
		'type'     => 'text',
	) );
// Menu links
	$wp_customize->add_setting( 'menulink', array(
		'default'        => '#e4e6eb',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menulink', array(
		'label'   => __( 'Main Menu Link', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'menulink',
		'priority' => 30,
	) ) );
// Menu link hover and active
	$wp_customize->add_setting( 'menulinkhover', array(
		'default'        => '#bd7d78',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menulinkhover', array(
		'label'   => __( 'Main Menu Link Hover', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'menulinkhover',
		'priority' => 32,		
	) ) );
// SubMenu background
	$wp_customize->add_setting( 'submenubg', array(
		'default'        => '#a45f5c',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenubg', array(
		'label'   => __( 'Submenu Background', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'submenubg',
		'priority' => 33,		
	) ) );		
// SubMenu background on hover
	$wp_customize->add_setting( 'submenubghover', array(
		'default'        => '#bf7b7b',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenubghover', array(
		'label'   => __( 'Submenu Background Hover', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'submenubghover',
		'priority' => 34,		
	) ) );
// SubMenu links on hover
	$wp_customize->add_setting( 'submenulinkhover', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenulinkhover', array(
		'label'   => __( 'Submenu Link Hover', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'submenulinkhover',
		'priority' => 36,		
	) ) );
// Main menu active state from submenu
	$wp_customize->add_setting( 'mainmenuactive', array(
		'default'        => '#bd7d78',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mainmenuactive', array(
		'label'   => __( 'Main Menu Submenu Active', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'mainmenuactive',
		'priority' => 38,		
	) ) );
// Active submenu link
	$wp_customize->add_setting( 'submenuactive', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenuactive', array(
		'label'   => __( 'Submenu Active Link', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'submenuactive',
		'priority' => 40,		
	) ) );
// Active submenu background
	$wp_customize->add_setting( 'submenuactivebg', array(
		'default'        => '#bd7d78',
		'sanitize_callback' => 'encounters_lite_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenuactivebg', array(
		'label'   => __( 'Submenu Active Background', 'encounters-lite' ),
		'section' => 'nav',
		'settings'   => 'submenuactivebg',
		'priority' => 41,		
	) ) );



}



/**
 * adds sanitization callback function : colors
 * @package Encounters Lite 
*/
	function encounters_lite_sanitize_hex_color( $color ) {
	if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
		return '#' . $unhashed;

	return $color;
}

/**
 * adds sanitization callback function : text
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * adds sanitization callback function : url
 * @package Encounters Lite 
*/
	function encounters_lite_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

/**
 * adds sanitization callback function : checkbox
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	



/**
 * adds sanitization callback function for the blog layout : radio
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_bloglayout( $input ) {
    $valid = array(
            'rightcolumn' => __( 'Right Column', 'encounters-lite' ),
            'leftcolumn' => __( 'Left Column', 'encounters-lite' ),
			'fullwidth' => __( 'Full Width', 'encounters-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * adds sanitization callback function for the archive layout : radio
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_archivelayout( $input ) {
    $valid = array(
		'rightcolumn' => __( 'Right Column', 'encounters-lite' ),
        'leftcolumn' => __( 'Left Column', 'encounters-lite' ),
		'fullwidth' => __( 'Full Width', 'encounters-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the author layout : radio
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_authorlayout( $input ) {
    $valid = array(
		'rightcolumn' => __( 'Right Column', 'encounters-lite' ),
            'leftcolumn' => __( 'Left Column', 'encounters-lite' ),
			'fullwidth' => __( 'Full Width', 'encounters-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the layout : radio
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_blogstyle( $input ) {
    $valid = array(
		'blogright' => __( 'Blog with Right Sidebar', 'encounters-lite' ),
		'blogleft' => __( 'Blog with Left Sidebar', 'encounters-lite' ),
		'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'encounters-lite' ),
		'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'encounters-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the featured image size : radio
 * @package Encounters Lite 
*/
function encounters_lite_sanitize_imagesize( $input ) {
    $valid = array(
            'big' => __( 'Big Image', 'encounters-lite' ),
            'small' => __( 'Small Image', 'encounters-lite' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for numeric data : number
 * @package Encounters Lite 
*/

function encounters_lite_sanitize_number( $value ) {
    $value = (int) $value; // Force the value into integer type.
    return ( 0 < $value ) ? $value : null;
}


/**
 * adds sanitization callback function for uploading : uploader
 * @package Encounters Lite * Special thanks to: https://github.com/chrisakelley
 */
add_filter( 'encounters_lite_sanitize_image', 'encounters_lite_sanitize_upload' );
add_filter( 'encounters_lite_sanitize_file', 'encounters_lite_sanitize_upload' );
function encounters_lite_sanitize_upload( $input ) {
        
        $output = '';
        
        $filetype = wp_check_filetype($input);
        
        if ( $filetype["ext"] ) {
        
                $output = $input;
        
        }
        
        return $output;

}

/**
 *  Registers
 */
function encounters_lite_registers() {
    wp_register_script( 'encounters_lite_customizer_script', get_template_directory_uri() . '/js/encounters-customizer.js', array("jquery"), '20120206', true  );
    wp_enqueue_script( 'encounters_lite_customizer_script' );
    wp_localize_script( 'encounters_lite_customizer_script', 'encounters_lite_buttons', array(
        'pro'       => __( 'View Pro Version', 'encounters-lite' )
    ) );
}
add_action( 'customize_controls_enqueue_scripts', 'encounters_lite_registers' );


/**
*adds css in load of page
*@package encounter-lite
*@Description: It hooks the following css on page load
*/
add_action( 'customize_controls_print_styles', 'encounters_lite_customize_css');   
    function encounters_lite_customize_css()   {    ?>
        <style type="text/css">
            input[data-customize-setting-link="nav_position_scrolltop_val"] {
                 font-weight: bold;
            }
            li#customize-control-nav_position_scrolltop_val label span.customize-control-title {
                font-weight: bold;
            }
            li#customize-control-nav_position_scrolltop {
                margin-bottom: 20px !important;
            }
            li#customize-control-nav_position_scrolltop_val {
                margin-top: -22px !important;
            }
            input[data-customize-setting-link="nav_position_scrolltop_val"] {
                background: none !important;
                   
            }
        </style>
            
        <?php
    }

/**
*adds sticky menu on header
*@package celestial-lite
*@Description: It hooks the following js to head section
*/
add_action('wp_head', 'encounters_lite_add_customizer_js');
function encounters_lite_add_customizer_js () { ?>
    <script type="text/javascript">
    (function ( $ ) {
        $(document).ready(function() {
            var active = <?php  if( get_theme_mod('nav_position_scrolltop')) { echo "1"; } else { echo "0"; } ?>;
            if (active == 1 ) {
                $(window).scroll(function() {
                    if ($(window).scrollTop() > 180) {
                        $("#header").css ({
                        	"position":"fixed",	
                            "background-color": "#131313",
                            "border-color":"#d9dee1",
    						"z-index":"9999",
    						"width":"100%",
    						"top":"0",
                        });
                        $("#st-content-wrapper").css ({
                            "min-height":"30rem"
                        });

                    } else {
                        $( "#header " ).removeAttr("style");
                    }

                });
            }
        });
    })(jQuery);;        

    </script> 
<?php } 