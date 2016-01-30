<?php



/**
 * Displays the search results
 *
 * @file           search.php
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
			<div class="span12">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'encounters-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php encounters_lite_content_nav( 'nav-below' ); ?>

				<?php else : ?>

					<article id="post-0" class="post no-results not-found">
						<header class="page-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'encounters-lite' ); ?></h1>
						</header>
						<div class="entry-content">
							<p>
								<?php _e( 'Our apologies, apparently nothing matched your search request. Please try again with some different keywords.', 'encounters-lite' ); ?>
							</p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-0 -->

				<?php endif; ?>
	
			</div>		
		</div>
	</div>
</div>

<?php get_footer(); ?>