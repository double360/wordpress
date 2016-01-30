<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Displays the quote post format
 *
 * @file           content-quote.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<blockquote>
		<h2 class="quote-title"><?php the_title(); ?></h2>
	<?php the_content( __( 'Read More...', 'encounters-lite' ) ); ?></blockquote>
	</div><!-- .entry-content -->
	<footer class="quote-entry-meta">		
		<?php edit_post_link( __( 'Edit', 'encounters-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->