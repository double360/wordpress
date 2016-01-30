<?php



/**
 * Archive content with right column
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
		<header class="archive-header">
			<h1 class="archive-title">
				<?php
					if ( is_day() ) :
						printf( __( 'Articles for this day of %s', 'encounters-lite' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Articles for the Month of %s', 'encounters-lite' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'encounters-lite' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Articles for the Year %s', 'encounters-lite' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'encounters-lite' ) ) . '</span>' );
					else :
						_e( 'Articles', 'encounters-lite' );
					endif;
				?>
			</h1>
			
		</header>
	
	<?php while ( have_posts() ) : the_post();

			/* Include the post format-specific template for the content. If you want to
			 * this in a child theme then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
		endwhile;
		encounters_lite_content_nav( 'post-nav' ); ?>	
	<?php endif; ?>
	
</div>

<aside id="right-column" class="span4">
	<?php get_sidebar(); ?>
</aside>