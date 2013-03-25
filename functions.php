<?php if( ! defined('IAMD_BASE_URL' ) ){	define( 'IAMD_BASE_URL',  get_template_directory_uri().'/'); }
define('IAMD_FW_URL', IAMD_BASE_URL . 'framework/' );
define('IAMD_FW',TEMPLATEPATH.'/framework/');
define('IAMD_IMPORTER_URL',IAMD_FW.'wordpress-importer/');
define('IAMD_TEXT_DOMAIN','ultimate');
define('IAMD_THEME_SETTINGS', 'mytheme');
define('IAMD_SAMPLE_FONT',__('Sample Font',IAMD_TEXT_DOMAIN));

/* Define IAMD_THEME_NAME
 * Objective:	
 *		Used to show theme name where ever needed( eg: in widgets title ar the back-end).
 */
// get themedata version wp 3.4+
if(function_exists('wp_get_theme')):
	$theme_data = wp_get_theme();
	define('IAMD_THEME_NAME',$theme_data->get('Name'));
	define('IAMD_THEME_FOLDER_NAME',$theme_data->template);
	define('IAMD_THEME_VERSION',(float) $theme_data->get('Version'));
endif;

#ALL BACKEND DETAILS WILL BE IN include.php
get_template_part('framework/include');
if ( ! isset( $content_width ) ) $content_width = 675;

add_shortcode('pricing-table','my_pricing_table');
function my_pricing_table($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('type'=>''), $attrs));	
	$content = my_shortcode_helper($content);
	return "<div class='pricing-table $type'>".$content.'</div>';
}
add_shortcode('pricing-table-item','my_pricing_table_item');
function my_pricing_table_item($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('variation'=>'yellow','heading'=> __("Heading",IAMD_TEXT_DOMAIN),'subheading'=>'',
			"button_link"=>"#","button_text"=>__("Buy Now",IAMD_TEXT_DOMAIN),"button_size"=>"small"), $attrs));
	
	$selected = (isset($attrs[0]) &&  trim( $attrs[0] == 'selected')) ? 'selected' : '';
	$subheading = isset($subheading) ? "<h6>$subheading</h6>" : "";
	$content = my_shortcode_helper($content);
	$content = str_replace( '<ul>', '<ul class="tb-content">', $content );
	$content = str_replace( '<ol>', '<ul class="tb-content">', $content );
	$content = str_replace( '</ol>', '</ul>', $content );
	$out  = "<div class='pr-tb-col $variation $selected'>";
	$out .= '	<div class="tb-header">';
	$out .= '		<hgroup class="tb-title">';
	$out .=	"			<h5>$heading</h5>$subheading";
	$out .= '		</hgroup>';
	$out .= '	</div>';
	$out .= $content;
	$out .= '<div class="buy-now">';
	$out .= do_shortcode("[button size='$button_size' link='$button_link']".$button_text."[/button]");
	$out .= '</div>';
	$out .= '<span> </span>';
	$out .= '</div>';
	return $out;
}

?>