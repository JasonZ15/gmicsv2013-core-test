<?php
/**
 *	Work Flow
 **/
add_shortcode('work_flow','my_work_flow'); 
function my_work_flow($attrs, $content=null, $shortcodename =""){
	return  '<div class="work-flow">'.my_shortcode_helper( $content ).'</div>';
}
 
 
/**
 * Rounder Icon Shortcode
 *	icon = write, clock, pen, mail 
 **/
 /*
add_shortcode('rounded_icon','my_rounded_icon'); 
function my_rounded_icon($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array( 'icon'=>'write'), $attrs));
	$output = "<div class='rounded-icon'><span class='$icon-icon'> </span> </div>";
return $output;	
}*/

/**
 *  Icon Shortcode
 *  type = rounded , nothing 
 *	icon = write, clock, pen, mail, help, strategy, chemical
 **/
add_shortcode('icon','my_icon'); 
function my_icon($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array( 'type'=>'', 'icon'=>'write'), $attrs));
	$type   =  !empty($type) ? "$type-icon" : "icon";
	$output = "<div class='$type'><span class='$icon-icon'> </span> </div>";
return $output;	
}


/**
 * Intor Text Shortcode
 *	h5 - Intro Title
 *  h6 - Intro Text(Content) will be shown 
 **/
add_shortcode('intro_text','my_intro_text');
function my_intro_text($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array( 'title'=>''), $attrs));
	$title   = !empty($title) ? "<h5>$title</h5>" : "";
	$content = my_shortcode_helper( $content );
	$content = !empty($content) ? "<h6>$content</h6>" : "";
	$output  = '<hgroup class="intro-text">';
	$output .= $title;
	$output .= $content;
	$output .= '</hgroup>';
return $output;
}

/**
 * Bordered Box
 * 
 **/
add_shortcode('bordered_box','my_bordered_box');
function my_bordered_box($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array( 'title'=>'' , 'icon'=>''), $attrs));
	$title   = !empty($title) ? "<h5>$title</h5>" : "";
	$icon    = !empty($icon) ? "<div class='icon'> <span class='$icon-icon'> </span> </div>":"";
	
	$output  = '<div class="bordered-box-content">';
	$output .= '<div class="box-container">';
	$output .=  $icon.$title.my_shortcode_helper( $content );
	$output .= '</div>';
	$output .= '<span class="border"> </span>';
	$output .= '</div>';
return $output;	
}

/**
 *	Bark Box
 **/
add_shortcode('dark_box','my_dark_box'); 
function my_dark_box($attrs, $content=null, $shortcodename =""){
	return  '<div class="dark-box">'.my_shortcode_helper( $content ).'</div>';
}


/*About us */
add_shortcode('aligncenter','my_aligncenter');
function my_aligncenter($attrs, $content=null, $shortcodename =""){
	return '<div class="aligncenter">'.my_shortcode_helper( $content ).'</div>';
}

add_shortcode('social_share','my_social_share');
function my_social_share($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('class'=>'','facebook'=>'','youtube'=>'','googleplus'=>'','twitter'=>'','rss'=>'','dribble'=>'','digg'=>'','vimeo'=>'','deviantart'=>'','picasa'=>'',
								 'skype'=>'','linkedin'=>'','delicious'=>'','email'=>''), $attrs));
	$class = !empty($class) ? $class : "";
	$shares = NULL;
	$shares .= !empty($facebook) 	? 	"<a href='$facebook' class='facebook'></a>" : 	NULL;
	$shares .= !empty($youtube) 	? 	"<a href='$youtube' class='youtube'></a>" : 	NULL;
	$shares .= !empty($googleplus) 	? 	"<a href='$googleplus' class='google'></a>" : NULL;
	$shares .= !empty($twitter)	 	?	"<a href='$twitter' class='twitter'></a>"	:	NULL;
	$shares .= !empty($rss) 		?	"<a href='$rss' class='rss'></a>"		: 	NULL;
	$shares .= !empty($dribble) 	?	"<a href='$dribble' class='dribble'></a>"	: 	NULL;	
	$shares .= !empty($digg) 		?	"<a href='$digg' class='digg'></a>"		: 	NULL;
	$shares .= !empty($vimeo) 		?	"<a href='$vimeo' class='vimeo'></a>"		: 	NULL;
	$shares .= !empty($deviantart) 	?	"<a href='$deviantart' class='deviantart'></a>"		: 	NULL;
	$shares .= !empty($picasa) 		?	"<a href='$picasa' class='picasa'></a>"		: 	NULL;
	$shares .= !empty($skype) 		? 	"<a href='$skype' class='skype'></a>" 		: 	NULL;		
	$shares .= !empty($linkedin)	?	"<a href='$linkedin' class='linkedin'></a>" : 	NULL;
	$shares .= !empty($email) 		?	"<a href='mailto:{$email}' class='email'></a>": NULL;
	$shares .= !empty($delicious) 	? 	"<a href='$delicious' class='delicious'></a>" : NULL;
	return "<div class='social-share $class'>$shares</div>";
}

add_shortcode('rounded_image','my_rounded_image');
function my_rounded_image($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('class'=>''),$attrs));
	$class = !empty($class) ? $class : "";
	return "<div class='rounded-image $class'>".my_shortcode_helper( $content )."</div>";
}

/**
 * Blog carousel
 **/
add_shortcode('blog_carousel','my_blog_carousel');
function my_blog_carousel($attrs, $content=null, $shortcodename =""){

}?>