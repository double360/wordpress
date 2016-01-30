<?php



/**
 * The main page template with a right sidebar column
 *
 * @file           page.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

 get_header(); ?>

<div id="content-wrapper" style="background-color:<?php echo get_theme_mod( 'contentbg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'contenttext', '#787b7f' ); ?>; border-color:<?php echo get_theme_mod( 'contentborder', '#bf7b7b' ); ?>;">
	<div class="container-fluid">
		
		<div class="row-fluid">
			
			<div class="span8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
				<?php encounters_lite_content_nav( 'post-nav' ); ?>
			</div>
			
			<aside id="right-column" class="span4">
				<?php get_sidebar( 'page-right' ); ?>
			</aside>

		</div>		
		
	</div>
</div>

<?php get_footer(); ?>