<?php

/**
 * Footer Template
 *
 * @file           footer.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 */
?>




<div id="bottom-wrapper" style="background-color: <?php echo get_theme_mod( 'bottombg', '#363a3d' ); ?>; border-color:<?php echo get_theme_mod( 'bottomborder', '#ffffff' ); ?>;">
	<div id="bottom-gradient">
		<div class="container-fluid">
			<?php get_template_part( 'sidebar', 'bottom' ); ?>
		</div>
	</div>
</div>

<div id="social-wrapper" style="background-color:<?php echo get_theme_mod( 'socialbg', '#0f1011' ); ?>;">
	<div class="container-fluid">
		<div class="row-fluid">	
			<?php if( get_theme_mod( 'hide_social' ) == '1') { ?>
				<div id="socialbar" class="span12" >
					<div id="social-icon-group">
						<?php $options = get_theme_mods();								
							echo '<ul id="social-icons">';										
							if (!empty($options['twitter_uid'])) echo '<li id="twitter-icon"><a target="_blank" title="Twitter" href="' . $options['twitter_uid'] . '">'	.'</a></li>';
							if (!empty($options['facebook_uid'])) echo '<li id="facebook-icon"><a target="_blank" title="Facebook" href="' . $options['facebook_uid'] . '">' .'</a></li>';		
							if (!empty($options['google_uid'])) echo '<li id="google-icon"><a target="_blank" title="Google+" href="' . $options['google_uid'] . '">' .'</a></li>';				
							if (!empty($options['linkedin_uid'])) echo '<li id="linkedin-icon"><a target="_blank" title="Linkedin" href="' . $options['linkedin_uid'] . '">' .'</a></li>';		
							if (!empty($options['pinterest_uid'])) echo '<li id="pinterest-icon"><a target="_blank" title="Pinterest" href="' . $options['pinterest_uid'] . '">' .'</a></li>';
							if (!empty($options['youtube_uid'])) echo '<li id="youtube-icon"><a target="_blank" title="Youtube" href="' . $options['youtube_uid'] . '">' .'</a></li>';
							if (!empty($options['flickr_uid'])) echo '<li id="flickr-icon"><a target="_blank" title="Flickr" href="' . $options['flickr_uid'] . '">' .'</a></li>';
							if (!empty($options['rss_uid'])) echo '<li id="rss-icon"><a target="_blank" title="RSS" href="' . $options['rss_uid'] . '">' .'</a></li>';						 
							echo '</ul>'
						?>	
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


<div id="footer-wrapper" style="background-color:<?php echo get_theme_mod( 'footerbg', '#1f2022' ); ?>; border-color:<?php echo get_theme_mod( 'footerborder', '#2a2c2e' ); ?>; color:<?php echo get_theme_mod( 'footertext', '#656565' ); ?>;">
	<div class="scanlines-footer">
		<div class="container-fluid">	
		
			<div class="row-fluid">
				<div class="span12">
					<div id="footer-menu">
					<?php if (has_nav_menu('footer-menu')) { ?>
						<?php wp_nav_menu(array(
						'container'       => '',
						'fallback_cb'	  =>  false,
						'menu_class'      => 'footer-menu',
						'theme_location'  => 'footer-menu')
						); 
						?>
					<?php } ?>
					</div>
					<?php esc_attr_e('Copyright &copy;', 'encounters-lite'); ?> <?php echo date_i18n( date('Y') ); ?> <?php echo get_theme_mod( 'site_copyright', 'Your Name' ); ?><?php esc_attr_e('. All rights reserved.', 'encounters-lite'); ?>           
				</div>
			</div>
		</div>
	</div>
</div>

	
</div><!-- #outer-wrapper-wide or boxed -->

<?php wp_footer(); ?>
</body>
</html>