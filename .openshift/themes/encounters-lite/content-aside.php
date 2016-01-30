<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Displays the aside post format
 *
 * @file           content-aside.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
		<div class="entry-content aside-post clearfix">
			<header class="aside-header">
				<hgroup>
					<h2 class="aside-title"><?php printf( __( 'Aside', 'encounters-lite' ) ) ; ?></h2>
				</hgroup>
			</header>
		<?php the_content(); ?>		
			<footer class="aside-entry-footer">
				<div class="aside-entry-meta">
					<span><?php printf( __( 'Published: ', 'encounters-lite' ) ) ; ?><?php echo get_the_date(); ?></span>	
					<span><a href="<?php echo get_permalink(); ?>"><?php printf( __( 'Permalink ', 'encounters-lite' ) ) ; ?></a></span>			
				</div>
			</footer>
	</div>
	<?php endif; ?>
	
</article>