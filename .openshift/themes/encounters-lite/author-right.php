<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Author content with right column
 *
 * @file           archive-right.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<div class="span8">

	<?php if ( have_posts() ) : ?>

		<?php
			/* Queue the first post, that way we know
			 * what author we're dealing with (if that is the case).
			 *
			 * We reset this later so we can run the loop
			 * properly with a call to rewind_posts().
			 */
			the_post();
		?>

		<header class="archive-header">
			<h1 class="archive-title"><?php printf( __( 'Articles By %s', 'encounters-lite' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
		</header><!-- .archive-header -->

		<?php
			/* Since we called the_post() above, we need to
			 * rewind the loop back to the beginning that way
			 * we can run the loop properly, in full.
			 */
			rewind_posts();
		?>

		<?php encounters_lite_content_nav( 'nav-above' ); ?>

		<?php
		// If a user has filled out their description, show a bio on their entries.
		if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="author-info row-fluid">
			<div class="author-avatar span1">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'encounters_lite_author_bio_avatar_size', 60 ) ); ?>
			</div><!-- .author-avatar -->
			<div class="author-description span11">
				<h2><?php printf( __( 'About %s', 'encounters-lite' ), get_the_author() ); ?></h2>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div><!-- .author-description	-->
		</div><!-- .author-info -->
		<?php endif; ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php encounters_lite_content_nav( 'nav-below' ); ?>

	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
</div>

<aside id="right-column" class="span4">
	<?php get_sidebar(); ?>
</aside>
