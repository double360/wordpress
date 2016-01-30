<?php



/**
 * Displays the image post format
 *
 * @file           content-image.php
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
		
	<header>
		<hgroup>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'encounters-lite' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</hgroup>
			
		<div class="entry-meta">
			<?php encounters_lite_post_meta_data(); ?>	
				<?php if ( comments_open() ) : ?>
					<span class="comments-link">&#8226; <span><?php _e( 'Discussion: ', 'encounters-lite' ); ?></span>
						<?php comments_popup_link(__('No Comments', 'encounters-lite'), __('1 Comment', 'encounters-lite'), __('% Comments', 'encounters-lite')); ?>
					</span>
				<?php endif; ?> 
		</div>
	</header>
	
	<div class="entry-content clearfix">
	
		<?php if ( has_post_thumbnail() ) : // check to see if our post has a thumbnail	?>
			<div class="img-intro">
				<?php the_post_thumbnail(); ?>
			</div>	
		<?php endif; ?>
		<?php the_content( __( 'See More...', 'encounters-lite' ) ); ?>		
	</div>	
	<footer></footer>
</article>