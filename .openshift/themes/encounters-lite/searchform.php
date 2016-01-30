<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Search Form template
 *
 * @file           searchform.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
 
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" name="s" id="s" placeholder="<?php esc_attr_e('search here &hellip;', 'encounters-lite'); ?>" /><input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'encounters-lite'); ?>"  />
	</form>