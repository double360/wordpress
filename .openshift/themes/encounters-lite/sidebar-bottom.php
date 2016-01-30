<?php



/**
 * Bottom sidebar group
 *
 * @file           sidebar-bottom.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

 
if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )
	&& ! is_active_sidebar( 'bottom4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>
<div class="row-fluid">
	<aside id="bottom-group" style="color:<?php echo get_theme_mod( 'bottomtext', '#dde0e1' ); ?>;" >
		<?php if ( is_active_sidebar( 'bottom1' ) ) : ?>
			<div id="bottom1" <?php bottomgroup(); ?> role="complementary">
				<?php dynamic_sidebar( 'bottom1' ); ?>
			</div><!-- #top1 -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'bottom2' ) ) : ?>
			<div id="bottom2" <?php bottomgroup(); ?> role="complementary">
				<?php dynamic_sidebar( 'bottom2' ); ?>
			</div><!-- #top2 -->
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'bottom3' ) ) : ?>
			<div id="bottom3" <?php bottomgroup(); ?> role="complementary">
				<?php dynamic_sidebar( 'bottom3' ); ?>
			</div><!-- #top3 -->
		<?php endif; ?>
			
		<?php if ( is_active_sidebar( 'bottom4' ) ) : ?>
			<div id="bottom4" <?php bottomgroup(); ?> role="complementary">
				<?php dynamic_sidebar( 'bottom4' ); ?>
			</div><!-- #top4 -->
		<?php endif; ?>
	</aside> 
</div>