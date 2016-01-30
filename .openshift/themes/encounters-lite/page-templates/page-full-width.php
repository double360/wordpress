<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
   Template Name: Full Width Page
 *
 * Description: A page template that provides a full width layout
 * without the left or right sidebar columns.
 *
 * @file           page-full-width.php
 * @package        Encounters 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release 1.7.7
 */

 get_header(); ?>

<div id="content-wrapper" style="background-color:<?php echo get_theme_mod( 'contentbg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'contenttext', '#787b7f' ); ?>; border-color:<?php echo get_theme_mod( 'contentborder', '#bf7b7b' ); ?>; font-size: <?php echo get_theme_mod( 'content_fontsize', '0.813em' ); ?>;">
	<div class="container-fluid">
			<?php get_template_part( 'sidebar', 'cta' ); ?>
			
			<?php get_template_part( 'sidebar', 'top' ); ?>	
			
			<?php get_template_part( 'sidebar', 'content-top' ); ?>
			
			<?php get_template_part( 'sidebar', 'inset-top' ); ?>

		<div class="row-fluid">
			<div class="span12">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
				<?php encounters_lite_content_nav( 'post-nav' ); ?>
			</div>
		</div>
		<?php get_template_part( 'sidebar', 'inset-bottom' ); ?>	
		
		<?php get_template_part( 'sidebar', 'content-bottom' ); ?>
		
	</div>
</div>
<?php get_footer(); ?>