<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Displays the Status post type
 *
 * @file           content-status.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content row-fluid">
	<div class="span1"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'encounters_lite_status_avatar', '70' ) ); ?></div>
	<div class="span11">
	<div class="entry-header">
		<header class="status-header">
			<h1 class="entry-title-status"><?php the_title(); ?><?php edit_post_link( __( 'Edit', 'encounters-lite' ), '<span class="edit-link">&nbsp;', '</span>' ); ?></h1>
			<h2 class="status-date"><?php printf( __( 'Update By: ', 'encounters-lite' ) ) ; ?><?php the_author(); ?> <br /><?php printf( __( 'Date: ', 'encounters-lite' ) ) ; ?><?php echo get_the_date(); ?></h2>	
		</header>			
	</div><!-- .entry-header -->
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'encounters-lite' ) ); ?>
	</div>
	</div><!-- .entry-content -->
	<footer class="status-entry-meta">
		
	</footer><!-- .entry-meta -->
</article><!-- #post -->