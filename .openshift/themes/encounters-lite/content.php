<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog content
 *
 * @file           content.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-date-box" style="background-color:<?php echo get_theme_mod( 'datebox', '#93969f' ); ?>; color:<?php echo get_theme_mod( 'datecolour', '#ffffff' ); ?>;">
		<span class="entry-month"><?php echo get_the_time(__('M', 'encounters-lite')); ?></span>
		<span class="entry-date"><?php echo get_the_time('d'); ?></span> 
		<span class="entry-year"><?php echo get_the_time('Y'); ?></span>
	</div>
	
	<h1 class="entry-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'encounters-lite'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?>	
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<sup class="featured-post">
			<?php _e( 'Featured Article', 'encounters-lite' ); ?>
		</sup>
	<?php endif; ?></a>
	</h1>
	
	<div class="entry-meta">
		<?php encounters_lite_post_meta_data(); ?>	
			<?php if ( comments_open() ) : ?>
				<span class="comments-link">&#8226; <span><?php _e( 'Discussion: ', 'encounters-lite' ); ?></span>
				<?php comments_popup_link(__('No Comments', 'encounters-lite'), __('1 Comment', 'encounters-lite'), __('% Comments', 'encounters-lite')); ?>
			</span>
			<?php endif; ?> 
	</div>
	
	<div class="entry-content clearfix">
	
	<?php if (is_single()) : ?>
    
    	<?php if( get_theme_mod( 'hide_featured' ) == '') { ?>
			<?php if ( has_post_thumbnail()) :
                $introimage = get_theme_mod( 'intro_image', 'big' );
                switch ($introimage) {
                    case "big" :
                        the_post_thumbnail('', array('class' => 'alignnone'));
                    break;
                    case "small" : 
                        the_post_thumbnail('', array('class' => 'alignleft'));
                    break;
                } 
            endif; ?>	
		<?php } ?>
    
	<?php else : ?>
	
		<?php if ( has_post_thumbnail()) :
			$introimage = get_theme_mod( 'intro_image', 'big' );
			switch ($introimage) {
				case "big" :
					the_post_thumbnail('', array('class' => 'alignnone'));
				break;
				case "small" : 
					the_post_thumbnail('', array('class' => 'alignleft'));
				break;
			} 
		endif; ?>
	
	<?php endif; ?>
		
		<?php the_content(__('Continue Reading...', 'encounters-lite')); ?>
		<?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'encounters-lite'), 'after' => '</div>')); ?>
	</div><!-- end of .post-entry -->
	<?php if (is_single()) : ?>
		<div class="entry-footer-meta">
			<?php the_tags(__('<span class="meta-tagged">Tagged with:</span>', 'encounters-lite') . ' ', ', ', '<br />'); ?> 
			<?php printf(__('<span class="meta-posted">Posted in: %s</span>', 'encounters-lite'), get_the_category_list(', ')); ?> <br />
			<?php edit_post_link(__('Edit', 'encounters-lite')); ?>
		</div> 

		<nav class="nav-single">
			<h5 class="assistive-text"><?php _e( 'Post navigation', 'encounters-lite' ); ?></h5>
				<?php previous_post_link(_x('Previous Post: %link','Previous Post Navigation', 'encounters-lite'),' %title'); ?><br />
				<?php next_post_link(_x('Next Post: %link','Next Post Navigation','encounters-lite'),' %title'); ?>
		</nav><!-- .nav-single -->

		
	<?php endif; ?>
              
</article><!-- end of #post-<?php the_ID(); ?> -->