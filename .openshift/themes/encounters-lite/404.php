<?php



/**
 * Error Page
 *
 * @file           404.php
 * @package        Encounters Lite 
 * @author         Styled Themes 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<style type="text/css">
<!--
* {
	color: #fff;
	font-size:16px;
}
strong {font-weight:normal;}
body {margin:0; padding:0;}
h1 {font:normal 34px Impact,Arial, Helvetica, sans-serif; margin:0; }
h1, .dark {color:#222f33;}
.dark {font-size:18px;}
.dark2 {color:#e1e1e1;}

#wrapper {border-top:8px solid #f7f7f6; border-bottom:12px solid #eaeaea;}
#errorbody { 	
	background-color: #c0c5c6;
	background-image: -webkit-gradient(radial, center center, 0, center center, 460, from(#8a9497), to(#c0c5c6));
	background-image: -webkit-radial-gradient(circle, #8a9497, #c0c5c6);
	background-image: -moz-radial-gradient(circle, #8a9497, #c0c5c6);
	background-image: -ms-radial-gradient(circle, #8a9497, #c0c5c6);
	background-image: -o-radial-gradient(circle, #8a9497, #c0c5c6);
	background-repeat: no-repeat;
	border-top:1px solid #fff;
	border-bottom:2px solid #fff;
	padding:30px 20px 20px;
	}
#error-bg {background: transparent url('<?php echo get_template_directory_uri() ; ?>/images/error.png') center top no-repeat; min-height:245px; padding:150px 0 0;}
#error-content {font:bold 14px Arial, Helvetica, sans-serif!important; color:#fff!important;}
#error-list {}
.btn {
	border: 1px solid #dedede;
	background: #f3f4f4;
	line-height: 1.25;
	margin:3px 0;
	padding: 5px 10px;
	font:normal 13px arial,sans-serif;
	color: #656565;
	text-decoration:none;
}
.btn:hover {
	background-color:#93969f;
	color: #fff;
	border-color: #7f7f7f;
}
-->
</style>
</head>
<body>
	
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" align="center">
	<div id="wrapper">
	<div id="errorbody">
	<div id="error-bg"><h1><?php _e( 'Error 404', 'encounters-lite' ); ?></h1>
	<div id="error-content">
	<p class="dark"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'encounters-lite' ); ?></p>
	<p class="dark2"><?php _e( 'You may not be able to visit this page because:', 'encounters-lite' ); ?></p>
	<p id="error-list">
		<?php _e( 'The Page you are looking for does not exist or an other error occurred.<br />Please go back to the Home Page or try searching for your page.', 'encounters-lite' ); ?>
	</p>								
	
</div>
<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	<?php _e( 'Home Page', 'encounters-lite' ); ?></a>
	</div>
	</div>
	</div>
	</td>
  </tr>
</table>
	
	
	
	</body>
</html>