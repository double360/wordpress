<?php



/**
 * Blog content with left column
 *
 * @file           blog-left.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<aside id="left-column" class="span3">
	<?php get_sidebar(); ?>
</aside>

<div class="span9">
	<header class="page-header">
		<?php if (is_search()) : ?>
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'encounters-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="category-title"><?php printf( __( '%s', 'encounters-lite' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="category-description"><?php echo category_description(); ?></div>
			<?php endif; ?>
		<?php endif; ?>
	</header>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>
		<?php endwhile; ?>
			<?php encounters_lite_content_nav( 'post-nav' ); ?>		
		<?php else : ?>
		
	<?php endif; ?>
	
</div>