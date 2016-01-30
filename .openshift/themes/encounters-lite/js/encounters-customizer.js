jQuery(document).ready(function() {

	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 20px auto 5px auto; display: block; text-align: center;" href="http://www.styledthemes.com/encounters" class="button" target="_blank">'+ encounters_lite_buttons.pro +'</a>' );
	jQuery('input[data-customize-setting-link="nav_position_scrolltop_val"] ').attr('readonly', 'readonly');
});