<?php



/**
 * Call to Action sidebar
 *
 * @file           sidebar-cta.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

if (   ! is_active_sidebar( 'cta'  )			
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<div class="row-fluid">
	<?php if ( is_active_sidebar( 'cta' ) ) : ?>
		<aside id="cta" class="span12">
			<?php dynamic_sidebar( 'cta' ); ?>
		</aside>
	<?php endif; ?>
</div>