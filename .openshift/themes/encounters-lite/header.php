<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Header Template
 *
 * @file           header.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="<?php bloginfo( 'charset' ); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="outer-wrapper-wide" style="border-color:<?php echo get_theme_mod( 'topborder', '#000000' ); ?>;">
	<div id="header" style="background-color: <?php echo get_theme_mod( 'headerbg', '#131313' ); ?>;border-color:<?php echo get_theme_mod( 'headerborder', '#d9dee1' ); ?>;">
		<div id="header-gradient">
			<div class="scanlines-header">
				<div class="container-fluid">
					<div class="row-fluid">
										
						<?php if ( get_option('my_logo') ) : ?>
							<div class="span4">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<img src="<?php echo get_option( 'my_logo' ); ?> "/>
								</a>
							</div>					
						<?php else : ?>		
							<div id="site-hgroup" class="span4">
								<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
								<h2 class="site-description"><?php bloginfo('description'); ?></h2>
							</div>
						<?php endif; ?>			
							
						<div class="span8">
							<nav id="site-navigation" class="main-navigation" role="navigation" style="margin-top:<?php echo get_theme_mod( 'menumargin', '20px' ); ?>">
								<h3 class="menu-toggle"><?php _e( 'Menu', 'encounters-lite' ); ?></h3>
								<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
							</nav><!-- #site-navigation -->
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php if ( is_active_sidebar( 'showcase' ) ) : ?>
<div id="showcase-wrapper" class="clearfix" style="background-color:<?php echo get_theme_mod( 'showcasebg1', '#bf7b7b' ); ?>; ">	
	<div id="showcase" style="padding: <?php echo get_theme_mod( 'showcasepad', '15px 70px' ); ?>; background-color:<?php echo get_theme_mod( 'showcasebg2', '#8a4f4b' ); ?>;" role="complementary">
		<?php dynamic_sidebar( 'showcase' ); ?>
	</div>	
</div>
<?php elseif ( is_front_page() ): ?>
	<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
<div id="showcase-wrapper" class="clearfix" style="background-color:<?php echo get_theme_mod( 'showcasebg1', '#bf7b7b' ); ?>; ">	
	<div id="showcase" style="padding: <?php echo get_theme_mod( 'showcasepad', '15px 70px' ); ?>; background-color:<?php echo get_theme_mod( 'showcasebg2', '#8a4f4b' ); ?>;" role="complementary">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>" /></a>
		</div>	
	</div>	
	<?php endif; ?>

<?php endif; ?>


<div id="breadcrumbs-wrapper" style="background-color:<?php echo get_theme_mod( 'contentbg', '#ffffff' ); ?>;">
	<div class="container-fluid">
		<div class="row-fluid">
			<div id="breadcrumbs" class="span12">
				<?php if ( !is_front_page() ) : ?>
					<?php if(function_exists('bcn_display')) {
						bcn_display();	} ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
