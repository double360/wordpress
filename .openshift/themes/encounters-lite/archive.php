<?php



/**
 * Main Archive template
 *
 * @file           archive.php
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
		
			<?php $archivesidebar = get_theme_mod( 'archive_sidebar', 'rightcolumn' );
			 switch ($archivesidebar) {
				case "rightcolumn" :
					get_template_part( 'archive-right' );
				break;
				case "leftcolumn" : 
					get_template_part( 'archive-left' );
				break;
				case "fullwidth" :
					get_template_part( 'archive-full' );			 
				break;
				} 
			?>
			
		</div>
	</div>
</div>

<?php get_footer(); ?>