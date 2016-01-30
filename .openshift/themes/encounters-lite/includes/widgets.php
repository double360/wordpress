<?php 



/**
 * Widget Positions
 *
 * @file           widgets.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function encounters_lite_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Blog Right Sidebar', 'encounters-lite' ),
		'id' => 'blogright',
		'description' => __( 'This is the right sidebar column that appears on the blog but not the pages.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Blog Left Sidebar', 'encounters-lite' ),
		'id' => 'blogleft',
		'description' => __( 'This is the left sidebar column that appears on the blog but not the pages.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Page Right Sidebar', 'encounters-lite' ),
		'id' => 'pageright',
		'description' => __( 'This is the right sidebar column that appears on pages, but not part of the blog', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Page Left Sidebar', 'encounters-lite' ),
		'id' => 'pageleft',
		'description' => __( 'This is the left sidebar column that appears on pages, but not part of the blog', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Showcase Header', 'encounters-lite' ),
		'id' => 'showcase',
		'description' => __( 'This is a showcase banner for images or media sliders that can display on your pages.', 'encounters-lite' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Call to Action', 'encounters-lite' ),
		'id' => 'cta',
		'description' => __( 'This is a call to action promo heading area above the main content just under the showcase header.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 1', 'encounters-lite' ),
		'id' => 'top1',
		'description' => __( 'This is the first top widget position located at the top of the page content.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 2', 'encounters-lite' ),
		'id' => 'top2',
		'description' => __( 'This is the second top widget position located at the top of the page content.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 3', 'encounters-lite' ),
		'id' => 'top3',
		'description' => __( 'This is the third top widget position located at the top of the page content.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Top 4', 'encounters-lite' ),
		'id' => 'top4',
		'description' => __( 'This is the fourth top widget position located at the top of the page content.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Bottom 1', 'encounters-lite' ),
		'id' => 'bottom1',
		'description' => __( 'This is the first bottom widget position located in a coloured background area and shows only on the Front page and full width templates.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 2', 'encounters-lite' ),
		'id' => 'bottom2',
		'description' => __( 'This is the second bottom widget position located in a coloured background area and shows only on the Front page and full width templates.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 3', 'encounters-lite' ),
		'id' => 'bottom3',
		'description' => __( 'This is the third bottom widget position located in a coloured background area and shows only on the Front page and full width templates.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 4', 'encounters-lite' ),
		'id' => 'bottom4',
		'description' => __( 'This is the fourth bottom widget position located in a coloured background area and shows only on the Front page and full width templates.', 'encounters-lite' ),
		'before_widget' => '<div id="%1$s" class="module %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	

}
add_action( 'widgets_init', 'encounters_lite_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 */

// Lets do the top group
function topgroup() {
	$count = 0;
	if ( is_active_sidebar( 'top1' ) )
		$count++;
	if ( is_active_sidebar( 'top2' ) )
		$count++;
	if ( is_active_sidebar( 'top3' ) )
		$count++;		
	if ( is_active_sidebar( 'top4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

// lets setup the bottom group 
function bottomgroup() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'span12';
			break;
		case '2':
			$class = 'span6';
			break;
		case '3':
			$class = 'span4';
			break;
		case '4':
			$class = 'span3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
