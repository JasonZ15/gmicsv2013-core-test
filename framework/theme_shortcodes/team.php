<?php 
add_shortcode('team','my_team');
function my_team($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('name'=>'','image'=>'','role'=>'','twitter'=>'','skype'=>'','linkedin'=>'','facebook'=>'','flickr'=>'','googleplus'=>''), $attrs));
	
	$name  = empty($name) ? "" : "<h5>{$name}</h5>";
	$name  = empty($name) ? "" : "$name<h6>{$role}</h6>";
	$name  = empty($name) ? "" : "<hgroup class='member-name'>$name</hgroup>";
	$image = empty($image)? IAMD_BASE_URL."images/team-member.jpg" : $image;
	$image = "<span><img src='{$image}' alt='member-image' /></span>";
	
	$content = my_shortcode_helper($content);

	$shares = NULL;
	$shares .= !empty($facebook) 	? 	"<a href='$facebook' class='facebook'></a>" : 	NULL;
	$shares .= !empty($twitter)	 	?	"<a href='$twitter' class='twitter'></a>"	:	NULL;
	$shares .= !empty($linkedin)	?	"<a href='$linkedin' class='linkedin'></a>" : 	NULL;
	$shares .= !empty($skype) 		? 	"<a href='$skype' class='skype'></a>" 		: 	NULL;
	$shares .= !empty($flickr) 		? 	"<a href='$flickr' class='flickr'></a>" 	: 	NULL;
	$shares .= !empty($googleplus) 	? 	"<a href='$googleplus' class='google'></a>" : NULL;
	
	$out 	= '<div class="team-wrapper">';
	$out   .= 	$name;
	$out   .= "	<div class='rounded-image'>{$image}</div>";
	
				if(!empty($shares)):
					$out .= "<div class='social-share'>";
					$out .= $shares;
					$out .= "</div>";
				endif;
	$out   .=   $content;
	$out   .= "</div><!--**Team Wrapper - End**-->";
return $out;	
}



