<?php



/**
 * Displays post intros from a category
 *
 * @file           category.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

get_header(); ?>

	<!-- Main Content -->			
<div id="content-wrapper" style="background-color:<?php echo get_theme_mod( 'contentbg', '#ffffff' ); ?>; color:<?php echo get_theme_mod( 'contenttext', '#787b7f' ); ?>; border-color:<?php echo get_theme_mod( 'contentborder', '#bf7b7b' ); ?>;">
	<div class="container">
		<div class="row">

				<?php $blogsidebar = get_theme_mod( 'blog_sidebar', 'rightcolumn' );
				 switch ($blogsidebar) {
					case "rightcolumn" :
						get_template_part( 'blog-right' );
					break;
					case "leftcolumn" : 
						get_template_part( 'blog-left' );
					break;
					case "fullwidth" :
						get_template_part( 'blog-full' );			 
					break;
					} 
				?>					
					
		</div>
	</div>
</div>

<?php get_footer(); ?>