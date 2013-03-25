<?php
function delete_htmltags($content,$paragraph_tag=false,$br_tag=false){	
	$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);
	$content = preg_replace('#<br \/>#', '', $content);
	if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);
	return trim($content);
}

function my_shortcode_helper($content,$paragraph_tag=false,$br_tag=false){
	 return delete_htmltags( do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag );
}

function wpex_clean_shortcodes($content){   
	$array = array ( '<p>[' => '[', ']</p>' => ']', ']<br />' => ']' );
	$content = strtr($content, $array);
	return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');

/**
 * code - to print the shortcode's source code version
 **/
add_shortcode('code','my_code');
function my_code($attrs, $content=null, $shortcodename =""){
	$array = array ('['=>'&#91;',']'=>'&#93;','/'=>'&#47;','<'=>'&#60;','>'=>'&#62;','<br />'=>'&nbsp;');
	$content = strtr($content, $array);
	$out = "<pre>{$content}</pre>";
return $out;	
}?>
<?php get_template_part('framework/theme_shortcodes/others'); ?>
<?php get_template_part('framework/theme_shortcodes/widgets'); ?>
<?php get_template_part('framework/theme_shortcodes/social'); ?>
<?php get_template_part('framework/theme_shortcodes/map'); ?>
<?php get_template_part('framework/theme_shortcodes/tabs'); ?>
<?php get_template_part('framework/theme_shortcodes/toggles'); ?>
<?php get_template_part('framework/theme_shortcodes/team'); ?>
<?php get_template_part('framework/theme_shortcodes/testimonials'); ?>
<?php get_template_part('framework/theme_shortcodes/contactform'); ?>
<?php get_template_part('framework/theme_shortcodes/theme'); ?>
<?php get_template_part('framework/theme_shortcodes/sliders'); ?>