<?php
/**
 * @link              https://totalsheets.com
 * @since             1.0.0
 * @package           Totalsheets_For_WP
 *
 * @wordpress-plugin
 * Plugin Name:       TotalSheets For WP
 * Plugin URI:        https://totalsheets.com/wordpress-plugin
 * Description:       Simple WordPress plugin to add TotalSheets spreadsheets to your blog.
 * Version:           1.0.0
 * Author:            TotalSheets
 * Author URI:        https://totalsheets.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       totalsheets-for-wp
**/

if (!defined('ABSPATH')) exit; // Avoid direct calls to this file
	

define('TOTALSHEETS_PLUGIN_VERSION', '1.0.0');

function totalsheets_plugin_add_shortcode($atts) {
	/*
		TotalSheets For WordPress Plugin shortcode format:

			[totalsheets-for-wordpress spreadsheetid=xxx id=xxx width=xxx height=xxx autosize=true/false]

		Description:
			spreadsheetid = spreadsheet id (last 12 chars in the address to spreadsheet.  Required.
			id = a unique identifier if more than one frames to be shown on page.  Default = "totalsheets-for-wordpress".
			width = width of the frame in % or px (100% by default).
			height = height of the frame in % or px (auto by default).
			autosize = auto sizing of the frame based on the content. Default = "true".
			border = show the border on the frame.  Default = 0.
			header = show header bar with logo and 'copy spreadsheet' link (if copylink is set to "true"). Default = "true".
			headercolor = set a color for the header. Default = "#eee".
			copylink = show a 'copy spreadsheet' link. Default = "false".
	*/

	// If no parameters - return an empty string.
	if(!is_array($atts)) return '';

	// Set the link.
	$link = 'https://totalsheets.com/spreadsheet/';
	$spreadsheetid = 'empty';
	
	if( array_key_exists( 'spreadsheetid', $atts ) ) { $spreadsheetid = htmlentities(trim( $atts['spreadsheetid'] ), ENT_QUOTES ); }
	$link .= $spreadsheetid;

	// Set the attributes.
	$id = 'totalsheets-for-wordpress';
	if( array_key_exists( 'id', $atts ) ) { $id = htmlentities(trim( $atts['id'] ), ENT_QUOTES ); }

	$width = '100%';
	if( array_key_exists( 'width', $atts ) ) { $width = htmlentities(trim( $atts['width'] ), ENT_QUOTES ); }

	$height = 'auto';
	if( array_key_exists( 'height', $atts ) ) { $height = htmlentities(trim( $atts['height'] ), ENT_QUOTES ); }

	$autosize = true;
	if( array_key_exists( 'autosize', $atts ) ) { if( strtolower( $atts['autosize'] ) !== 'true' ) { $autosize = false; } ; }

	$border = '0';
	if( array_key_exists( 'border', $atts ) ) { $border = htmlentities(trim( $atts['border'] ), ENT_QUOTES ); }
	
	$header = true;
	if( array_key_exists( 'header', $atts ) ) { if( strtolower( $atts['header'] ) !== 'true' ) { $header = false; } ; }
	
	$headercolor = '#eee';
	if( array_key_exists( 'headercolor', $atts ) ) { $headercolor = htmlentities(trim( $atts['headercolor'] ), ENT_QUOTES ); }
	
	$copylink = '';
	if( array_key_exists( 'copylink', $atts ) AND $spreadsheetid !== 'empty' ) { if( strtolower( $atts['copylink'] ) === 'true' ) $copylink = '<span class="ts-copylink-span"><a href="' . $link . '/copy" target="_blank">Copy spreadsheet</a></span>'; }
	
	
	
	$html = "\n".'<!-- TotalSheets For WordPress Plugin v.'.TOTALSHEETS_PLUGIN_VERSION.' wordpress.org/plugins/totalsheets-for-wordpress/ -->'."\n";
	if ($header) {
		$html .= '<style>.ts-iframe-wrapper{background-color:' . $headercolor . ';width:' . $width . ';height:35px;margin-bottom:1px;padding:5px;}.ts-copylink-span{float:right;padding:1px 3px 1px 3px;border:1px solid #ccc;}</style>';
		$html .= '<div class="ts-iframe-wrapper"><a href="https://totalsheets.com" target="_blank"><img src="' . plugin_dir_url(__FILE__) . 'img/logo.png" style="height:15px"></a>' . $copylink . '</div>';
	}
	$html .= '<iframe id="' . $id . '" name="' . $id . '" src="' . $link . '" width="' . $width . '" height="' . $height . '" style="border:' . $border . ';"' . '></iframe>'."\n";
	
	if ($autosize) {
		wp_enqueue_script('iframeResizer.js', plugins_url( 'js/iframeResizer.min.js', __FILE__ ), array('jquery'));
		
		$html .= '<script>
							jQuery(document).ready(function($) {
								iFrameResize({checkOrigin: false, heightCalculationMethod: "lowestElement"}, "#' . $id . '");
							});
							</script>';
	}	

	return $html;
}
add_shortcode('totalsheets-for-wordpress', 'totalsheets_plugin_add_shortcode');

function totalsheets_plugin_row_meta($links, $file) {
	if ( $file == plugin_basename( __FILE__ ) ) {
		$row_meta = array(
			'support' => '<a href="http://web-profile.net/wordpress/plugins/totalsheets/" target="_blank">' . __( 'totalsheetsadmin', 'totalshe' ) . '</a>'
		);
		$links = array_merge( $links, $row_meta );
	}
	return (array) $links;
}
add_filter('plugin_row_meta', 'totalsheets_plugin_row_meta', 10, 2);