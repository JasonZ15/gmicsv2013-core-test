<?php
/** mytheme_get_option()
  * Objective:
  *		To get my theme options stored in database by the thme option page at back end.
**/
function mytheme_option($key1,$key2=''){
	$options = get_option(IAMD_THEME_SETTINGS);
	$output = NULL;
	
	
	if(is_array($options)):
		
		if( array_key_exists($key1,$options) ){
			$output = $options[$key1];
			if( is_array($output) && !empty($key2)  ){
				$output = ( array_key_exists($key2,$output) && (!empty($output[$key2])) )?  $output[$key2] : NULL;
			}
		}else{
			$output = $output;
		}

		
	endif;	
	return $output;		
}
### --- ****  mytheme_option() *** --- ###

/** mytheme_default_option()
  * Objective:
  *		To return my theme default options to store in database. 
**/
function mytheme_default_option(){
	$general 		= array("logo"					=>"true",
					 		"breadcrumb-delimiter"	=>"&raquo;",
							"enable-favicon"		=>"true",
							"disable-page-comment"	=>"true",
							#"show-sociables"		=>"on",
							"show-footer"			=>"on",
					 		"footer-columns"		=>"4",
							"disable-picker"		=>"on",
							"show-copyrighttext"	=>"on",
							"show-footer-logo"		=>"on",
					 		"copyright-text"		=>__("&copy; iamdesigning | All Rights Reserved",IAMD_TEXT_DOMAIN));
	
	$nivo_slider 	= array("effects"				=>array("random"),
						 	"speed"					=>"500",
						 	"pause_time"			=>"3000",
							"box_cols"				=>"5",
						 	"box_rows"				=>"8",
						 	"slices"				=>"15",
						 	"direction_nav"			=>"direction_nav",
						 	"control_nav"			=>"control_nav");
							
	$cycle			= array("effects"				=>array("fade"),
							"easing"				=>"null",
							"easeIn"				=>"null",
							"easeOut"				=>"null",
						 	"speed"					=>"1000",
						 	"speed_in"				=>"2500",
						 	"speed_out"				=>"500",
							"delay_time"			=>"0",
						 	"direction_nav"			=>"direction_nav",
						 	"control_nav"			=>"control_nav");
							
							
	$touch_slider	= array("pagination_auto_hide"	=>"pagination_auto_hide",
							"pagination_alignment"	=>"BC",
							"pagination_type"		=>"0",
							"navigation_auto_hide"	=>"navigation_auto_hide",
							"navigation_type"		=>"2",
							"navigation_lalignment"	=>"LC",
							"navigation_ralignment"	=>"RC",
							"delay_time"			=>"2");						
							
	$integration 	= array(
							#"post-googleplus"		=>"googleplus",
							"post-googleplus-layout"=>"small",
							"post-googleplus-lang"	=>"en_GB",
							#"post-twitter"			=>"twitter",
							"post-twitter-layout"	=>"vertical",
							#"post-fb_like"			=>"fb_like",
							"post-fb_like-layout"	=>"box_count",
							"post-fb_like-color-scheme"=>"light",
							"post-digg-layout"		=>"medium",
							"post-stumbleupon-layout"=>"5",
							"post-linkedin-layout"	=>"2",
							"page-pintrest-layout"	=>"none",
							#"page-googleplus"		=>"googleplus",
							"page-googleplus-layout"=>"small",
							"page-googleplus-lang"	=> "en_GB",
							#"page-twitter"			=>"twitter",
							"page-twitter-layout"	=>"vertical",
							#"page-fb_like"			=>"fb_like",
							"page-fb_like-layout"	=>"box_count",
							"page-fb_like-color-scheme"=>"light",
							"page-digg-layout"		=>"medium",
							"page-stumbleupon-layout"=>"5",
							"page-linkedin-layout"	=>"2",
							"page-pintrest-layout"	=>"none");						
	
	
	$specialty 		= array("archives-layout"		=>"with-left-sidebar",
							"search-layout"			=>"with-left-sidebar",
							"404-layout"			=>"content-full-width",
							"404-message"			=>"<h2>404</h2><h3>".__("Sorry, the page you requested could not be found",IAMD_TEXT_DOMAIN)."</h3><h4>".__("Try looking somewhere else. You might get lucky",IAMD_TEXT_DOMAIN)."! </h4>");
	
	$appearance 	= array("H1-font"				=>"Lato",
							"H2-font"				=>"Lato",
							"H3-font"				=>"Lato",
							"H4-font"				=>"Lato",
							"H5-font"				=>"Lato",
							"H6-font"				=>"Lato",
							"menu-font"				=>"Oswald",
							"body-font"				=>"Lato",
							"skin"					=>"blue",
							"layout"				=>"wide",
							"header-bg-type"		=>"bg-none",
							"body-bg-type"			=>"bg-none",
							"footer-bg-type"		=>"bg-none",
							"bg-type"				=>"bg-none",
							#"boxed-layout-pattern"	=>"pattern-1.png",
							"boxed-layout-pattern-repeat"=>"repeat");
						
	$mobile 		= array("is-theme-responsive"	=>"true",
							"is-slider-disabled"	=>"true");
							
	$seo 			= array("title-delimiter"		=>"|",
							"post-title-format"		=> array("blog_title","post_title"),
							"page-title-format"		=> array("blog_title","post_title"),
							"archive-page-title-format" =>  array("blog_title","date"),
							"category-page-title-format" => array("blog_title","category_title"),
							"tag-page-title-format"	=> array("blog_title","tag"),
							"search-page-title-format" => array("blog_title","search"),
							"404-page-title-format"	=> array("blog_title"));
							
	$bbar 			= array("bar-bg-color" 			=> "#333333",
							"bar-shadow-color"		=> "#080707",
							"status-bbar"			=> "true");
						
	$data 			= array("general"				=>$general,
							"nivo"					=>$nivo_slider,
							"touch_slider"			=>$touch_slider,
							"cycle"					=>$cycle,
							"specialty"				=>$specialty,
							"integration"			=>$integration,
							"appearance"			=>$appearance,
							"seo"					=>$seo,
							"mobile"				=>$mobile,
							"bbar"					=>$bbar);
return $data;	
}
### --- ****  mytheme_default_option() *** --- ###

/** mytheme_get_tweet()
  * Objective:
  *		Returns tweets for the given args.
  * @args:
  *		1.count : 				How many tweet entries want to show ?
  *		2.username : 			Twitter username
  *		3.time : 				0 - Hide time of tweet | 1 - Show time of tweet 
  *		4.exclude_replies : 	0 - Include @replies  | 1 - Exclude @replies
  *		5.display_avatar : 		0 - Hide user avatar | 1 - Show user avatar	
  *
**/
function mytheme_get_tweet($count, $username, $time='1', $exclude_replies='1', $display_avatar='1'){
	
	#$response = wp_remote_get( 'http://api.twitter.com/1/statuses/user_timeline.xml?screen_name='.$username );
	#$response = fetch_feed('http://twitter.com/statuses/user_timeline.rss?screen_name='.$username); # Not Working 
	#$response = fetch_feed('http://api.twitter.com/1/statuses/user_timeline.rss?screen_name='.$username);
	$response = wp_remote_get( 'http://api.twitter.com/1/statuses/user_timeline.xml?include_rts=true&screen_name='.$username );
	
	$iterations = 0;
	$output = "";
	$filtered_message = "";
	
	if (!is_wp_error($response)) :
	
		$xml = simplexml_load_string($response['body']);
		if( empty( $xml->error ) ) :
		
			if ( isset($xml->status[0])) :
			
				 $tweets = array();
				 foreach ($xml->status as $tweet):
				 
					if($iterations == $count) break;
					
					$text = (string) $tweet->text;
					
					if($exclude_replies == '0' || ($exclude_replies == '1' && $text[0] != "@")):
						$iterations++;
						$tweets[] = array(
							'text' => 		my_tweetbox_filter($text)
							,'created' =>  	strtotime( $tweet->created_at )
							,'user' => 		array(
			    	    						'name' => 			(string)$tweet->user->name,
			    	    						'screen_name' => 	(string)$tweet->user->screen_name,
			    	    						'image' => 			(string)$tweet->user->profile_image_url,
			    	    						'utc_offset' => 	(int) $tweet->user->utc_offset[0],
			    	    						'follower' => 		(int) $tweet->user->followers_count
							));
					endif;
				 endforeach;
				 
			endif;
			
		endif;
		
	endif;
	
	if(isset($tweets)):
	foreach($tweets as $tweet):
		$output .= '<li class="tweet">';
			if($display_avatar == '1')
				$output .= '<div class="tweet-thumb"><a href="http://twitter.com/'.$username.'" title=""><img src="'.$tweet['user']['image'].'" alt="" /></a></div>';
				
	    		$output .= '<div class="tweet-text avatar_'.$display_avatar.'">'.$tweet['text'];
				
	    	if($time == '1')
				 $output .= '<div class="tweet-time">'.date_i18n( get_option('date_format'), $tweet['created'] + $tweet['user']['utc_offset']).'</div>';
				
	    $output .= '</div></li>';
	endforeach;
	endif;

	if($output != ""):
		$filtered_message = "<ul class='tweet_list'>$output</ul>";
	else:
		$filtered_message = "<ul class='tweet_list'><li>No public Tweets found</li></ul>";
	endif;	
		
return '<div class="tweets">'.$filtered_message."</div>";
}
### --- ****  mytheme_get_tweet() *** --- ###

/** my_tweetbox_filter()
  * Objective:
  *		Returns filtered tweets.
  * @args:
  *		1.text :	Tweets text to filter
  *
**/
function my_tweetbox_filter($text) {
    // Props to Allen Shaw & webmancers.com & Michael Voigt
    $text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
    $text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);    
    $text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
    $text = preg_replace("/#(\w+)/", "<a class=\"twitter-link\" href=\"http://search.twitter.com/search?q=\\1\">#\\1</a>", $text);
    $text = preg_replace("/@(\w+)/", "<a class=\"twitter-link\" href=\"http://twitter.com/\\1\">@\\1</a>", $text);
    return $text;
}
### --- ****  my_tweetbox_filter() *** --- ###


#admin
/** mytheme_adminpanel_tooltip()
  * Objective:
  *		To place tooltip content in thme option page at back end.
  * args:
  *		1. $tooltip = content which is shown as tooltip
**/
function mytheme_adminpanel_tooltip($tooltip){
	$output  = "<div class='bpanel-option-help'>\n";
	$output .= "<a href='' title=''> <img src='".IAMD_FW_URL."theme_options/images/help.png' alt='' title='' /> </a>\n";
	$output .= "\r<div class='bpanel-option-help-tooltip'>\n";
	$output .= $tooltip;
	$output .= "\r</div>\n";
	$output .= "</div>\n";
	echo $output;
}
### --- ****  mytheme_adminpanel_tooltip() *** --- ###

#admin
/** mytheme_adminpanel_image_preview()
  * Objective:
  *		To place tooltip content in thme option page at back end.
  * args:
  *		1. $src = image source
  *		2. $backend = true - to get images placed in framework  ? false - to get images stored in  theme/images folder 
**/
function mytheme_adminpanel_image_preview($src,$backend=true,$default="no-image.jpg"){
	$default = ($backend) ? IAMD_FW_URL."theme_options/images/".$default : IAMD_BASE_URL."/images/".$default;
	$src  = !empty($src) ? $src : $default; 
	$output  = "<div class='bpanel-option-help'>\n";
	$output .= "<a href='' title='' class='a_image_preivew'> <img src='".IAMD_FW_URL."theme_options/images/image-preview.png' alt='' title='' /> </a>\n";
	$output .= "\r<div class='bpanel-option-help-tooltip imagepreview'>\n";
	$output .= "\r<img src='{$src}' data-default='{$default}'/>";
	$output .= "\r</div>\n";
	$output .= "</div>\n";
	echo $output;
}
### --- ****  mytheme_adminpanel_image_preview() *** --- ###


/** mytheme_pagelist()
  * Objective:
  *		To create dropdown box with list of pages.
  * args:
  *		1. $id = page id
  *		2. $selected = ( true / false)		
**/
function mytheme_postlist($id,$selected,$class="mytheme_select") {
	global $post;
	$args = array( 'numberposts' => -1);
	
	$name = explode(",",$id);
	if(count($name) > 1 ){
		$name = "[{$name[0]}][{$name[1]}]";
	}else {
		$name = "[{$name[0]}]";
	}
	$name =  	($class=="multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";	
	$output  = 	"<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>".__('Select Post',IAMD_TEXT_DOMAIN)."</option>";
	$posts = get_posts($args);
		foreach ($posts as $post):
			$id = esc_attr($post->ID);
			$title = esc_html($post->post_title);
			$output .= "<option value='{$id}' ".selected($selected,$id,false).">{$title}</option>";
		endforeach;
	$output .= "</select>\n";
	echo $output;
}
### --- ****  mytheme_postlist() *** --- ###

/** mytheme_pagelist()
  * Objective:
  *		To create dropdown box with list of pages.
  * args:
  *		1. $id = page id
  *		2. $selected = ( true / false)		
**/
function mytheme_pagelist($id,$selected,$class="mytheme_select") {
	
	$name = explode(",",$id);
	if(count($name) > 1 ){
		$name = "[{$name[0]}][{$name[1]}]";
	}else {
		$name = "[{$name[0]}]";
	}
	#$output  = "<select id='mytheme[{$id}]' name='mytheme[{$id}]'>";
	#$output  = "<select id='mytheme{$name}' name='mytheme{$name}'>";
	$name =  	($class=="multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";	
	$output  = 	"<select name='{$name}' class='{$class}'>";
	$output .= "<option value=''>".__('Select Page',IAMD_TEXT_DOMAIN)."</option>";
	$pages   = get_pages('title_li=&orderby=name');
		foreach ($pages as $page):
			$id = esc_attr($page->ID);
			$title = esc_html($page->post_title);
			$output .= "<option value='{$id}' ".selected($selected,$id,false).">{$title}</option>";
		endforeach;
	$output .= "</select>\n";
	echo $output;
}
### --- ****  mytheme_pagelist() *** --- ###

/** mytheme_categorylist()
  * Objective:
  *		To create dropdown box with list of categories.
  * args:
  *		1. $id =  		dropdown id
  *		2. $selected = 	( true / false)
  *		3. $class = 	default class		
**/
function mytheme_categorylist($id,$selected='',$class="mytheme_select") {
	
	$name = explode(",",$id);
	if(count($name) > 1 ){
		$name = "[{$name[0]}][{$name[1]}]";
	}else {
		$name = "[{$name[0]}]";
	}
	$name =  	($class=="multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";	
	$output  = 	"<select name='{$name}' class='{$class}'>";
	$output .= 	"<option value=''>".__('Select Category',IAMD_TEXT_DOMAIN)."</option>";
	$cats   = 	get_categories( 'orderby=name&hide_empty=0' );
		foreach ($cats as $cat):
			$id = esc_attr($cat->term_id);
			$title = esc_html($cat->name);
			$slug = esc_html($cat->slug);
			$output .= "<option value='{$id}' ".selected($selected,$id,false).">{$slug}</option>";
		endforeach;
	$output .= "</select>\n";
	return $output;
}
### --- ****  mytheme_categorylist() *** --- ###

function mytheme_portfolio_categorylist($id,$selected='',$class="mytheme_select"){
	
	$name = explode(",",$id);
	if(count($name) > 1 ){
		$name = "[{$name[0]}][{$name[1]}]";
	}else {
		$name = "[{$name[0]}]";
	}
	$name =  	($class=="multidropdown") ? "mytheme{$name}[]" : "mytheme{$name}";	
	$output  = 	"<select name='{$name}' class='{$class}'>";
	$output .= 	"<option value=''>".__('Select Category',IAMD_TEXT_DOMAIN)."</option>";
	$cats   = 	get_categories('taxonomy=portfolio_entries&hide_empty=0');
		foreach ($cats as $cat):
			$id = esc_attr($cat->term_id);
			$title = esc_html($cat->name);
			$slug = esc_html($cat->slug);
			$output .= "<option value='{$id}' ".selected($selected,$id,false).">{$slug}</option>";
		endforeach;
	$output .= "</select>\n";
	return $output;
}

/** mytheme_listImage()
  * Args:
  *		1. $dir = location of the folder from which you wnat to get images
  * Objective:
  *		Returns an array that contains  icon names located at $dir.
**/
function mytheme_listImage($dir) {
	$sociables = array();
	$icon_types = array('jpg', 'jpeg', 'gif', 'png');
	
	if( is_dir($dir) ){
		$handle = opendir($dir);
		while (false !== ($dirname = readdir($handle))) {
			
			if( $dirname != "." && $dirname!=".." ){
				$parts = explode('.',$dirname);
				$ext = strtolower($parts[count($parts)-1]);
				
				if( in_array($ext, $icon_types)) {
					$option = $parts[count($parts) - 2];
					$sociables[$dirname] = str_replace( ' ','', $option );
				}
			}
		}
		closedir($handle);
	}
	
	return $sociables;
}
### --- ****  mytheme_listImage() *** --- ###

/** mytheme_sociables_selection()
  * Objective:
  *		Returns selection box.
**/
function mytheme_sociables_selection($name='',$selected="") {
	$dir = get_template_directory()."/images/sociable/";
	$sociables = mytheme_listImage($dir);
	$name  = !empty($name) ? "name='mytheme[social][{$name}][icon]'" : '';
	$out  = "<select class='social-select' {$name}>"; #name attribute will be added to this by jQuery menuAdd()
	foreach($sociables as $key => $value ):
		$s = selected($key,$selected,false);
		$v = ucwords($value);
		$out .= "<option value='{$key}' {$s} >{$v}</option>";
	endforeach;
	$out .= "</select>";
 return $out;	
}
### --- ****  mytheme_sociables_selection() *** --- ###

/** mytheme_admin_color_picker()
  * Objective:
  *		Outputs the wordpress default color picker.
  *		Args:
  *			1.Label
  *			2.Name
  *			3.Value - stored in db
  *			4.Tooltip
**/
function mytheme_admin_color_picker($label,$name,$value,$tooltip = NULL){
	global $wp_version;
	
	$output  = "<div class='bpanel-option-set'>\n";
	$output .= "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	if((float) $wp_version >= 3.5 ):
		$output .= "<input type='text' class='my-color-field medium' name='{$name}' value='{$value}' />";
	else:
		$output .= "<input type='text' class='medium color_picker_element' name='{$name}' value='{$value}' />";
		$output .= "<div class='color_picker'></div>";
	endif;
	echo $output;
	if($tooltip!= NULL):
		mytheme_adminpanel_tooltip($tooltip);
	endif;
	echo "</div>\n";
}
### --- ****  mytheme_admin_color_picker() *** --- ###

/** mytheme_admin_fonts()
  * Objective:
  *		Outputs the fonts selection box.
**/
function mytheme_admin_fonts($label,$name,$selctedFont){
	global $my_google_fonts;
	$f = IAMD_SAMPLE_FONT;
	$css = (!empty($selctedFont)) ? 'style="font-family:'.$selctedFont.';"': '';
	$output =  "<div class='mytheme-font-preview' {$css}>{$f}</div>";
	$output .= "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<select class='mytheme-font-family-selector' name='{$name}'>";
	$output .= 		"<option value=''>".__("Select",IAMD_TEXT_DOMAIN)."</option>";
			foreach($my_google_fonts as $fonts):
			$rs = selected($fonts,$selctedFont,false);
			$output .= 	"<option value='{$fonts}' {$rs}>{$fonts}</option>";
			endforeach;
	$output .= "</select>"; 
	echo $output;
}
### --- ****  mytheme_admin_fonts() *** --- ###

/** mytheme_admin_jqueryuislider()
  * Objective:
  *		Outputs the jQurey UI Slider.
**/
function mytheme_admin_jqueryuislider($label,$id='',$value='',$px="px"){
	$div_value = (!empty($value) && ($px == "px")) ? $value."px" : $value;
	$output  = "<div class='hr_invisible'></div>";
	$output .= "<label>{$label}</label>";
	$output .= "<div class='clear'></div>";
	$output .= "<div id='{$id}' class='mytheme-slider' data-for='{$px}'></div>";
	$output .= "<input type='hidden' class='' name='{$id}' value='{$value}'/>";
	$output .= "<div class='mytheme-slider-txt'>{$div_value}</div>";
echo $output;	
}
### --- ****  mytheme_admin_jqueryuislider() *** --- ###

/** getFolders()
  * Objective:
  *		
**/
function getFolders($directory, $starting_with = "", $sorting_order = 0) {
	if(!is_dir($directory)) return false;
	$dirs = array();
	$handle = opendir($directory);
	while (false !== ($dirname = readdir($handle))) {
		if ($dirname != "." && $dirname != ".." && is_dir($directory."/".$dirname)) 
		{
			if ($starting_with == "")
				$dirs[] = $dirname;
			else {
				$filter = strstr($dirname, $starting_with);
				if ($filter !== false) $dirs[] = $dirname;
			}
		}  
	}

	closedir($handle);
	
	if($sorting_order == 1) {
		rsort($dirs); 
	} else {
		sort($dirs); 
	}
	return $dirs;
}
### --- ****  getFolders() *** --- ###

/** mytheme_footer_widgetarea()
  * Objective: 
  *		1. To Generate Footer Widget Areas
  *	Args: $count = No of widget areas
**/
function mytheme_footer_widgetarea($count){
	$name = __("Footer Column",IAMD_TEXT_DOMAIN);
	if($count<=4):
		for($i=1;$i<=$count;$i++):
			register_sidebar(array('name' 			=>	$name."-{$i}",
				'id'			=>	"footer-sidebar-{$i}",
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		endfor;
	elseif($count == 5 || $count == 6 ):
		$a = array("1-4","1-4","1-2");
		$a = ($count == 5) ? $a : array_reverse($a);
		foreach($a as $k => $v):
			register_sidebar(array('name' 			=>	$name."-{$v}",
				'id'			=>	"footer-sidebar-{$k}-{$v}",
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		endforeach;
	elseif($count == 7 || $count == 8):
		$a = array("1-4","3-4");
		$a = ($count == 7) ? $a : array_reverse($a);
		foreach($a as $k => $v):
			register_sidebar(array('name' 			=>	$name."-{$v}",
				'id'			=>	"footer-sidebar-{$k}-{$v}",
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		endforeach;
	elseif($count == 9 || $count == 10):
		$a = array("1-3","2-3");
		$a = ($count == 9) ? $a : array_reverse($a);
		foreach($a as $k => $v):
			register_sidebar(array('name' 			=>	$name."-{$v}",
				'id'			=>	"footer-sidebar-{$k}-{$v}",
				'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 	'</aside>',
				'before_title' 	=> 	'<h3 class="widgettitle">',
				'after_title' 	=> 	'</h3>'));
		endforeach;
 	endif;
}
### --- ****  mytheme_footer_widgetarea() *** --- ###


/** mytheme_switch()
  * Objective:
  *		Outputs the switch control at the backend.
  * 
**/
function mytheme_switch($label,$parent,$name){
	$checked = ( "true" ==  mytheme_option($parent,$name) ) ? ' checked="checked"' : '';
	$switchclass = ( "true" == mytheme_option($parent,$name)  ) ? 'checkbox-switch-on' :'checkbox-switch-off';
	$out = "<div data-for='mytheme-{$parent}-{$name}' class='checkbox-switch {$switchclass}'></div>";
	$out .= "<input id='mytheme-{$parent}-{$name}' class='hidden' name='mytheme[{$parent}][{$name}]' type='checkbox' value='true' {$checked} />";
	$out .= "<label>{$label}</label>";
 echo $out;	
}
### --- ****  mytheme_switch() *** --- ###

/** mytheme_switch()
  * Objective:
  *		Outputs the switch control at the backend.
  * 
**/
function mytheme_switch_page($label,$name,$value,$datafor = NULL){
	
	$checked = ( "true" ==  $value ) ? ' checked="checked"' : '';
	$switchclass = ( "true" == $value ) ? 'checkbox-switch-on' :'checkbox-switch-off';
	$datafor = ( $datafor == NULL ) ? $name  : $datafor;
	$out = "<label>{$label}</label>";
	$out .= '<div class="clear"></div>';
	$out .= "<div data-for='{$datafor}' class='checkbox-switch {$switchclass}'></div>";
	$out .= "<input id='{$datafor}' class='hidden' name='{$name}' type='checkbox' value='true' {$checked} />";
	
 echo $out;	
}
### --- ****  mytheme_switch() *** --- ###


/** mytheme_bgtypes()
  * Objective:
  *		Outputs the <select></select> control at the backend.
  * 
**/
function mytheme_bgtypes($name,$parent,$child){
	$args = array("bg-patterns"=>__("Pattern",IAMD_TEXT_DOMAIN),"bg-custom"=>__("Custom Background",IAMD_TEXT_DOMAIN),"bg-none"=>__("None",IAMD_TEXT_DOMAIN));
	$out = '<div class="bpanel-option-set">';
	$out .= "<label>".__("Background Type",IAMD_TEXT_DOMAIN)."</label>";
	$out .= "<div class='clear'></div>";
	$out .= "<select class='bg-type' name='{$name}'>";
			foreach($args as $k => $v):
               $rs = selected($k,mytheme_option($parent,$child),false);
               $out .= "<option value='{$k}' {$rs}>{$v}</option>";
            endforeach;			 
	$out .= "</select>";
	$out .= '</div>';
echo $out;
}
### --- ****  mytheme_bgtypes() *** --- ###







												####################################################################################
												#############################--------------------------#############################
												############################# FRONT END UTIL FUNCTIONS #############################
												#############################--------------------------#############################
												####################################################################################

/** mytheme_public_title()
  * Objective:
  *		Outputs the value for <title></title> in front end.
  * 
**/
function mytheme_public_title(){
	global $post;
	$doctitle = '';
	$separator = mytheme_option('seo','title-delimiter');
	$split = true;
	
	if(!empty($post)):
		$author_meta 	= get_the_author_meta($post->post_author);
		$nickname		= get_the_author_meta('nickname',$post->post_author);	
		$first_name		= get_the_author_meta('first_name',$post->post_author);
		$last_name		= get_the_author_meta('last_name',$post->post_author);
		$display_name 	= get_the_author_meta('display_name',$post->post_author);
	endif;
		
	$args = array("blog_title"		=>	get_bloginfo('name'),
	 "blog_description"				=>	get_bloginfo('description'),
	 "post_title"					=> 	!empty($post) ? $post->post_title:NULL,
	 "post_author_nicename"			=>	!empty($nickname) ? ucwords($nickname):NULL,
	 "post_author_firstname"		=>	!empty($first_name) ? ucwords($first_name):NULL,
	 "post_author_lastname"			=>	!empty($last_name) ? ucwords($last_name):NULL,
	 "post_author_dsiplay"			=>	!empty($display_name) ? ucwords($display_name):NULL);
	$args = array_filter($args);
	#home			
	if(is_home() || is_front_page() ):
		$doctitle =  "";
		if( (get_option('page_on_front')!= 0) && (get_option('page_on_front') == $post->ID)) $doctitle = trim(get_post_meta($post->ID,'_seo_title',true));
		$doctitle =		!empty($doctitle) ? trim($doctitle) : $args["blog_title"].' '.$separator.' '.$args["blog_description"];
		$split = false;
		
	#page	
	elseif(is_page()):
		$doctitle = get_post_meta($post->ID,'_seo_title',true);
		if(empty($doctitle)):
			$options = mytheme_option('seo','page-title-format');
			foreach($options as $option):
				if(array_key_exists($option,$args))
					$doctitle .= $args[$option].' '.$separator.' ';
			endforeach;
		endif;
	#post	
	elseif(is_single()):
		$doctitle = get_post_meta($post->ID,'_seo_title',true);
		if(empty($doctitle)):
		 #To add categories in $args
			 $categories = get_the_category();
			 $c = '';
			 foreach($categories as $category):
		 		$c .= $category->name.' '.$separator.' ';
			 endforeach;
			 $c = substr(trim($c),"0",strlen(trim($c))-1);
			 $args["category_title"] = $c;
		 #End of adding categories in $args	
		 
		 #To add tags in $args
		 	 $posttags = get_the_tags();
			 $ptags='';
			 if($posttags):
			 	foreach($posttags as $posttag):
					$ptags .= $posttag->name.$separator;
				endforeach;
				$ptags = substr(trim($ptags),"0",strlen(trim($ptags))-1);
				$args["tag_title"] = $ptags;
			 endif;
		 #End of adding tags in $args	 
		 	 $options = mytheme_option('seo','post-title-format');
			 foreach($options as $option):
			    if(array_key_exists($option,$args)):
					$doctitle .= $args[$option].' '.$separator.' ';
				endif;	
			 endforeach;
		endif;
	#is_category()
	elseif(is_category()):
		$categories = get_the_category();
		#To add category description into $args
			$args["category_title"]		  = $categories[0]->name;	
			$args["category_desc"] = $categories[0]->description;
		#End of adding category description into $args
		
		$options = mytheme_option('seo','category-page-title-format');
		foreach($options as $option):
	    	if(array_key_exists($option,$args))
				$doctitle .= $args[$option].' '.$separator.' ';
		endforeach;
	#is_tag()
	elseif(is_tag()):
		$args["tag"] = wp_title("",false);
		$options = mytheme_option('seo','tag-page-title-format');
		foreach($options as $option):
	    	if(array_key_exists($option,$args))
				$doctitle .= $args[$option].' '.$separator.' ';
		endforeach;

	#is_archive()
	elseif(is_archive()):
		$args["date"] = wp_title("",false);
		$options = mytheme_option('seo','archive-page-title-format');
		foreach($options as $option):
	    	if(array_key_exists($option,$args))
				$doctitle .= $args[$option].' '.$separator.' ';
		endforeach;
	
	#is_date()
	elseif(is_date()):
	
	#is_search()
	elseif(is_search()):
		$args["search"] = __("Search results for",IAMD_TEXT_DOMAIN).' "'.$_REQUEST['s'].'"'; #Adding search text into the default args
		$options = mytheme_option('seo','search-page-title-format');
		foreach($options as $option):
			if(array_key_exists($option,$args))
				$doctitle .= $args[$option].' '.$separator.' ';
		endforeach;
	#is_404()
	elseif(is_404()):
		$options = mytheme_option('seo','404-page-title-format');
		foreach($options as $option):
	 		if(array_key_exists($option,$args))
				$doctitle .= $args[$option].' '.$separator.' ';
		endforeach;
			$doctitle =  $doctitle.__('Page not found',IAMD_TEXT_DOMAIN);
		$split = false;		
	endif;
	
	if($split):
		if(strrpos($doctitle,$separator)):
			$doctitle = str_split($doctitle,strrpos($doctitle,$separator));
			$doctitle = $doctitle[0];
		endif;
	endif;	
	
echo $doctitle;
}
### --- ****  mytheme_public_title() *** --- ###

/** mytheme_canonical()
  * Objective:
  *		Generate the Canonical url
  * This function called at register_public.php via mytheme_seo_meta();
**/
function mytheme_canonical(){
		$canonical = false;
	if ( is_singular() || is_single() ):
		$canonical = get_permalink( get_queried_object() );
		
		# Fix paginated pages
		if ( get_query_var('paged') > 1 ) :
			global $wp_rewrite;
			if ( !$wp_rewrite->using_permalinks() ) :
				$canonical = add_query_arg( 'paged', get_query_var('paged'), $canonical );
			else:
				$canonical = user_trailingslashit( trailingslashit( $canonical ) . 'page/' . get_query_var( 'paged' ) );
			endif;
		endif;
	else:
		if ( is_front_page() ): 
			$canonical = home_url( '/' );
  	    elseif ( is_home() && "page" == get_option('show_on_front') ):		
		 	$canonical = get_permalink( get_option( 'page_for_posts' ) );
		elseif( is_tax() || is_tag() || is_category() ):
			$term = get_queried_object();
			$canonical = get_term_link( $term, $term->taxonomy );
		elseif(function_exists('get_post_type_archive_link') && is_post_type_archive()):	
			$canonical = get_post_type_archive_link(get_post_type());
		elseif(is_author()):
			$canonical = get_author_posts_url(get_query_var('author'), get_query_var('author_name'));
		elseif(is_archive()):
			if (is_date()):
				if(is_day()):
					$canonical = get_day_link( get_query_var('year'), get_query_var('monthnum'), get_query_var('day') );
				elseif(is_month()):
					$canonical = get_month_link( get_query_var('year'), get_query_var('monthnum') );
				elseif(is_year()):	
					$canonical = get_year_link( get_query_var('year') );
				endif;	
			endif;
		endif;
		
		if ( $canonical && get_query_var('paged') > 1 ):
			global $wp_rewrite;
			if ( !$wp_rewrite->using_permalinks() )
				$canonical = add_query_arg( 'paged', get_query_var('paged'), $canonical );			
			else	
				$canonical = user_trailingslashit( trailingslashit( $canonical ) . trailingslashit( $wp_rewrite->pagination_base ) . get_query_var('paged') );
		endif;
	endif;
return $canonical;	
}
### --- ****  mytheme_canonical() *** --- ###
												
/** mytheme_speciality_page_bg()
  * Objective:
  *		Outputs the background images for the speciality pages ( 404, archives, and search).
  * This function called at register_public.php via add_action('wp_head','mytheme_speciality_page_bg');
**/
function mytheme_speciality_page_bg(){
	$out = NULL;
	
	$disable_archieve_settings = mytheme_option("specialty","disable-archives-settings");
	$disable_search_settings = mytheme_option("specialty","disable-search-settings");
	$disable_404_settings = mytheme_option("specialty","disable-404-settings");
	
	if( is_archive() && empty($disable_archieve_settings) ):
		$archives_bg = 				mytheme_option('specialty','archives-bg');
		$archives_bg_color = 		mytheme_option('specialty','archives-bg-color');		
		$archives_img_repeat = 		mytheme_option('specialty','archives-bg-img-repeat');
		$archives_img_position = 	mytheme_option('specialty','archives-bg-img-position');
		$archives_img_attachment = 	mytheme_option('specialty','archives-bg-img-attachment');
		
		$out .= ( !empty($archives_bg) ) ? "\r\tbackground-image: url('{$archives_bg}');\r": "";	
		$out .= ( !empty($archives_bg_color) && $archives_bg_color!= "#"  ) ? "\r\tbackground-color:{$archives_bg_color};\r" : "";
		$out .= ( !empty($archives_img_repeat) && !empty($archives_bg) ) ? "\r\tbackground-repeat:{$archives_img_repeat};\r" : "";
		$out .= ( !empty($archives_img_position) && !empty($archives_bg) ) ? "\r\tbackground-position:{$archives_img_position};\r" : "";
		$out .= ( !empty($archives_img_attachment) && !empty($archives_bg) ) ? "\r\tbackground-attachment:{$archives_img_attachment};\r" : "";
		
	elseif( is_search() && empty($disable_search_settings) ):
		$search_bg = 				mytheme_option('specialty','search-bg');
		$search_bg_color = 		mytheme_option('specialty','search-bg-color');		
		$search_img_repeat = 		mytheme_option('specialty','search-bg-img-repeat');
		$search_img_position = 	mytheme_option('specialty','search-bg-img-position');
		$search_img_attachment = 	mytheme_option('specialty','search-bg-img-attachment');

		$out .= ( !empty($search_bg) ) ? "\r\tbackground-image: url('{$search_bg}');\r": "";	
		$out .= ( !empty($search_bg_color) && $search_bg_color!= "#" ) ? "\r\tbackground-color:{$search_bg_color};\r" : "";
		$out .= ( !empty($search_img_repeat) && !empty($search_bg) ) ? "\r\tbackground-repeat:{$search_img_repeat};\r" :"";
		$out .= ( !empty($search_img_position) && !empty($search_bg) ) ? "\r\tbackground-position:{$search_img_position};\r" : "";
		$out .= ( !empty($search_img_attachment) && !empty($search_bg) ) ? "\r\tbackground-attachment:{$search_img_attachment};\r" : "";
	
	elseif( is_404() && empty($disable_404_settings)):

		$page_404_bg = 				mytheme_option('specialty','404-bg');
		$page_404_bg_color = 		mytheme_option('specialty','404-bg-color');		
		$top = 						mytheme_option('specialty','404-image-top-margin');
		if(!empty($top)) $top = $top."px";
		
		$right = 					mytheme_option('specialty','404-image-right-margin');
		if(!empty($right)) $right = $right."px";
		
		$bottom = 					mytheme_option('specialty','404-image-bottom-margin');
		if(!empty($bottom)) $bottom = $bottom."px";
		
		$left = 					mytheme_option('specialty','404-image-left-margin');
		if(!empty($left)) $left = $left."px";		
		
		
		$out = 'div.errorpage-info { display:block;';
		$out .= ( !empty($page_404_bg) ) ? "\r\tbackground-image: url('{$page_404_bg}');\r": "";	
		$out .= ( !empty($page_404_bg_color) && $page_404_bg_color != "#" ) ? "\r\tbackground-color:{$page_404_bg_color};\r" : "";
		$out .= "background-position:{$top} {$right} {$bottom} {$left}";
		$out .=" }";
	endif;
	
	
	if(!empty($out)):
		#$out = "\r" . '<style type="text/css">'."\r".'body{' . $out . ' }'."\r".'</style>' . "\r";
		$out = "\r" . '<style type="text/css">'."\r".$out ."\r".'</style>' . "\r";
		echo $out;
	endif;
}
### --- ****  mytheme_speciality_page_bg() *** --- ###

/** show_fblike()
  * Objective:
  *		Outputs the facebook like button in post and page.
**/
function show_fblike($arg='post'){
	$fb = mytheme_option('integration',"{$arg}-fb_like");
	$output = "";
	if(!empty($fb)):
		$layout = mytheme_option('integration',"{$arg}-fb_like-layout");
		$scheme = mytheme_option('integration',"{$arg}-fb_like-color-scheme");
		$output.= do_shortcode("[fblike layout='{$layout}' colorscheme='{$scheme}' /]");
		echo $output;
	endif;
}
### --- ****  show_googleplus() *** --- ###
/** show_googleplus()
  * Objective:
  *		Outputs the facebook like button in post and page.
**/
function show_googleplus($arg='post'){
	$googleplus = mytheme_option('integration',"{$arg}-googleplus");
	$output = "";
	if(!empty($googleplus)):
		$layout = mytheme_option('integration',"{$arg}-googleplus-layout");
		$lang = mytheme_option('integration',"{$arg}-googleplus-lang");
		$output.= do_shortcode("[googleplusone size='{$layout}' lang='{$lang}' /]");
		echo $output;
	endif;
}
### --- ****  show_googleplus() *** --- ###

### --- ****  show_twitter() *** --- ###
/** show_twitter()
  * Objective:
  *		Outputs the Twitter like button in post and page.
**/
function show_twitter($arg='post'){
	$twitter = mytheme_option('integration',"{$arg}-twitter");
	$output = "";
	if(!empty($twitter)):
		$layout = mytheme_option('integration',"{$arg}-twitter-layout");
		$lang = mytheme_option('integration',"{$arg}-twitter-lang");
		$username = mytheme_option('integration',"{$arg}-twitter-username");
		$output.= do_shortcode("[twitter layout='{$layout}' lang='{$lang}' username='{$username}' /]");
		echo $output;
	endif;
}
### --- ****  show_twitter() *** --- ###

### --- ****  show_stumbleupon() *** --- ###
/** show_stumbleupon()
  * Objective:
  *		Outputs the Stumbleupon like button in post and page.
**/
function show_stumbleupon($arg='post'){
	$stumbleupon = mytheme_option('integration',"{$arg}-stumbleupon");
	$output = "";
	if(!empty($stumbleupon)):
		$layout = mytheme_option('integration',"{$arg}-stumbleupon-layout");
		$output.= do_shortcode("[stumbleupon layout='{$layout}' /]");
		echo $output;
	endif;
}
### --- ****  show_stumbleupon() *** --- ###

### --- ****  show_linkedin() *** --- ###
/** show_linkedin()
  * Objective:
  *		Outputs the LinkedIn like button in post and page.
**/
function show_linkedin($arg='post'){
	$linkedin =  mytheme_option('integration',"{$arg}-linkedin");
	$output = "";
	if(!empty($linkedin)):
		$layout = mytheme_option('integration',"{$arg}-linkedin-layout");
		$output.= do_shortcode("[linkedin layout='{$layout}' /]");
		echo $output;
	endif;
}
### --- ****  show_linkedin() *** --- ###

### --- ****  show_delicious() *** --- ###
/** show_delicious()
  * Objective:
  *		Outputs the Delicious like button in post and page.
**/
function show_delicious($arg='post'){
	$delicious =  mytheme_option('integration',"{$arg}-delicious");
	$output = "";
	if(!empty($delicious)):
		$text = mytheme_option('integration',"{$arg}-delicious-text");
		$output .= do_shortcode("[delicious text='{$text}' /]");
		echo $output;
	endif;
}
### --- ****  show_delicious() *** --- ###

### --- ****  show_pintrest() *** --- ###
/** show_pintrest()
  * Objective:
  *		Outputs the Pintrest like button in post and page.
**/
function show_pintrest($arg='post'){
	$delicious =  mytheme_option('integration',"{$arg}-pintrest");
	$output = "";
	if(!empty($delicious)):
		$layout = mytheme_option('integration',"{$arg}-pintrest-layout");
		$output .= do_shortcode("[pintrest layout='{$layout}' prompt='true' /]");
		echo $output;
	endif;
}
### --- ****  show_pintrest() *** --- ###

### --- ****  show_digg() *** --- ###
/** show_digg()
  * Objective:
  *		Outputs the Digg like button in post and page.
**/
function show_digg($arg='post'){
	$digg = mytheme_option('integration',"{$arg}-digg");
	$output = "";
	if(!empty($digg)):
		$layout = mytheme_option('integration',"{$arg}-digg-layout");
		$output .= do_shortcode("[digg layout='{$layout}' /]");
	echo $output;
	endif;
}
### --- ****  show_digg() *** --- ###

### --- ****  show_footer_widgetarea() *** --- ###
/** show_footer_widgetarea()
  * Objective:
  *		Outputs the Footer section widget area.
**/
function show_footer_widgetarea($count){
	$classes = array("1"=>"one","one-half","one-third","one-fourth","1-2"=>"one-half","1-3"=>"one-third","1-4"=>"one-fourth","3-4"=>"three-fourth","2-3"=>"two-third");
	if($count<=4):
		for($i=1;$i<=$count;$i++):
			$class = $classes[$count];
			$last  = ($i == $count) ? "last":"";
			echo "<div class='column {$class} {$last}'>";
				if (function_exists('dynamic_sidebar') && dynamic_sidebar("footer-sidebar-{$i}") ): endif;
			echo "</div>";	
		endfor;
	elseif($count == 5 || $count == 6 ):
		$a = array("1-4","1-4","1-2");
		$a = ($count == 5) ? $a : array_reverse($a);
		foreach($a as $k => $v):
			$class  = $classes[$v];
			$last   = (end($a) == $v) ? "last" : "";
			echo "<div class='column {$class} {$last}'>";
				if (function_exists('dynamic_sidebar') && dynamic_sidebar("footer-sidebar-{$k}-{$v}") ): endif;
			echo "</div>";	
		endforeach;
				
	elseif($count == 7 || $count == 8):
		$a = array("1-4","3-4");
		$a = ($count == 7) ? $a : array_reverse($a);
		foreach($a as $k => $v):
			$class  = $classes[$v];
			$last   = (end($a) == $v) ? "last" : "";
			echo "<div class='column {$class} {$last}'>";
				if (function_exists('dynamic_sidebar') && dynamic_sidebar("footer-sidebar-{$k}-{$v}") ): endif;
			echo "</div>";	
		endforeach;
	elseif($count == 9 || $count == 10):
		$a = array("1-3","2-3");
		$a = ($count == 9) ? $a : array_reverse($a);
		foreach($a as $k => $v):
			$class  = $classes[$v];
			$last   = (end($a) == $v) ? "last" : "";
			echo "<div class='column {$class} {$last}'>";
				if (function_exists('dynamic_sidebar') && dynamic_sidebar("footer-sidebar-{$k}-{$v}") ): endif;
			echo "</div>";	
		endforeach;
	endif;
}
### --- ****  show_footer_widgetarea() *** --- ###

### --- ****  mytheme_is_plugin_active() *** --- ###
/** mytheme_is_plugin_active()
  * Objective:
  *		Check the plugin is activated
**/
function mytheme_is_plugin_active( $plugin ) {
    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}
### --- ****  mytheme_is_plugin_active() *** --- ###

### --- ****  check_slider_revolution_responsive_wordpress_plugin() *** --- ###
/** check_slider_revolution_responsive_wordpress_plugin()
  * Objective:
  *		Check the "Revolution Responsive WordPress Plugin" is activated
**/
function check_slider_revolution_responsive_wordpress_plugin(){
	$sliders = false;
	if(mytheme_is_plugin_active('revslider/revslider.php')):
		global $wpdb;
		$table_name = $wpdb->prefix."revslider_sliders";
		if(	$wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name):
			$resultset = $wpdb->get_results("SELECT title,alias FROM $table_name");
			foreach($resultset as $rs):
				$sliders[$rs->alias] = $rs->title;
			endforeach;
			return $sliders;
		else:
			return $sliders;
		endif;	
	else:
		return $sliders;	
	endif;
}
### --- ****  mytheme_is_plugin_active() *** --- ###

### --- ****  mytheme_social_bookmarks() *** --- ###
/** mytheme_social_bookmarks()
  * Objective:
  *		To show social shares
**/
function mytheme_social_bookmarks($arg='sb-post'){
	global $post;

	$title = $post->post_title;
	$url = get_permalink($post->ID);
	$excerpt = $post->post_excerpt;
	$data = "";
	$path = IAMD_BASE_URL."/images/sociable/";
	
	$fb = mytheme_option('integration',"{$arg}-fb_like");
	$data .= !empty($fb) ? "<a href='http://www.facebook.com/sharer.php?u=$url&amp;t=$title'><img src='{$path}facebook.png' /></a>" : "";
	
	$delicious = mytheme_option('integration',"{$arg}-delicious");
	$data .= !empty($delicious)? "<a href='http://del.icio.us/post?url=$url&amp;title=$title'><img src='{$path}delicious.png' /></a>":"";

	$digg = mytheme_option('integration',"{$arg}-digg");
	$data .= !empty($digg)? "<a href='http://digg.com/submit?phase=2&amp;url=$url&amp;title=$title'><img src='{$path}digg.png' /></a>":"";

	$stumbleupon = mytheme_option('integration',"{$arg}-stumbleupon");
	$data .= !empty($stumbleupon)? "<a href='http://www.stumbleupon.com/submit?url=$url&amp;title=$title'><img src='{$path}stumbleupon.png' /></a>":"";

	$twitter = mytheme_option('integration',"{$arg}-twitter");
	$t_url = !empty($twitter) ? get_tiny_url($url) : '';
	$data .= !empty($twitter)? "<a href='http://twitter.com/home/?status=$title:$t_url'><img src='{$path}twitter.png' /></a>":"";
	
	$googleplus = mytheme_option('integration',"{$arg}-googleplus");
	$data .= !empty($googleplus) ? "<a href='https://plus.google.com/share?url=$url' onclick='javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><img src='{$path}google.png' /></a>" :'';
  
  	$linkedin = mytheme_option('integration',"{$arg}-linkedin");
	$data .= !empty($linkedin) ? "<a href='http://www.linkedin.com/shareArticle?mini=true&amp;title=$title&amp;url=$url' title='Share on LinkedIn'><img src='{$path}linkedin.png' /></a>":"";

	$pintrest = mytheme_option('integration',"{$arg}-pintrest");
	$media = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
	$data .= !empty($pintrest) ? "<a href='http://pinterest.com/pin/create/button/?url=$url&amp;media=$media'><img src='{$path}pinterest.png' /></a>":"";
	
	$data = !empty($data) ? "<div class='social-share'><h5>".__("Share",IAMD_TEXT_DOMAIN)."</h5>{$data}</div>" : "";
	echo $data;
}
### --- ****  mytheme_social_bookmarks() *** --- ###

function get_tiny_url($url) {
 
 if (function_exists('curl_init')):
   $url = 'http://tinyurl.com/api-create.php?url=' . $url;
 
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   $tinyurl = curl_exec($ch);
   curl_close($ch);
 
   return $tinyurl;
 else:
   # cURL disabled on server; Can't shorten URL
   # Return long URL instead.
   return $url;
 endif;
}

### --- ****  is_moible_view() *** --- ###
/** is_moible_view()
  * Objective:
  *		If you eanble responsive mode in theme , this will add view port at the head
**/
function is_moible_view(){
	$mytheme_options = get_option(IAMD_THEME_SETTINGS);
	$mytheme_mobile = $mytheme_options['mobile'];
	if(isset($mytheme_mobile['is-theme-responsive']))
		echo "<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />\r";
		
    /*if(isset($mytheme_mobile['is-slider-disabled'])):
		$out =	'<style type="text/css">';
		$out .=	'@media only screen and (max-width:320px), (max-width: 479px), (min-width: 480px) and (max-width: 767px), (min-width: 768px) and (max-width: 959px),
		 (max-width:1200px) { div#home-slider { display:none !important; } 	}';
		$out .=	'</style>';
		echo $out;
	endif;*/	
}
### --- ****  add_viewport() *** --- ###

### --- ****  set_layout *** --- ###
function set_layout(){
	/*if(mytheme_option("appearance","layout") == "boxed") {
		
		echo "<link id='boxed-css' href='".IAMD_BASE_URL."boxed.css' rel='stylesheet' type='text/css' media='all' />\n";
		
		if(mytheme_option("mobile","is-theme-responsive")) {
			echo "<link id='boxed-responsive-css' href='".IAMD_BASE_URL."boxed-responsive.css' rel='stylesheet' type='text/css' media='all' />";
		}
		
	}else{*/
		
		if(mytheme_option("mobile","is-theme-responsive")) {
			echo "<link id='responsive-css' href='".IAMD_BASE_URL."responsive.css' rel='stylesheet' type='text/css' media='all' />";
		}
	#}
}
### --- ****  set_layout *** --- ###

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) :
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   else:
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   endif;
   $rgb = array($r, $g, $b);
 return $rgb;
}


#### BLOG COMMENT STYLE
####################################
function my_customComments($comment,$args,$depth){
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	   case 'pingback' :
  	   case 'trackback' :
	   		   echo '<li class="post pingback">';
			   echo "<p>";
				   _e( 'Pingback:',IAMD_TEXT_DOMAIN);
				   comment_author_link();
				   edit_comment_link( __('Edit',IAMD_TEXT_DOMAIN), ' ' ,'');
			   echo "</p>";
	   break;
	  
	   default :                                        
	   case '' :
				echo "<li ";
					#comment_class();
				echo ' id="li-comment-';
					comment_ID();
				echo '">';
					echo '<article class="comment" id="comment-';
							comment_ID();
					echo '">';
	
						echo '<header class="comment-author">';
						echo 	get_avatar( $comment, 88 );
						echo  '</header>';
						
						echo '<section class="comment-details">';
						echo '	<div class="author-name">';
						echo 		ucfirst(get_comment_author_link());
						echo '	</div>';
						echo '	<div class="commentmetadata">'.get_comment_date('D M d, Y').'</div>';
						echo '  <div class="comment-body">';
						echo '		<div class="comment-content">';
									comment_text();
									if ( $comment->comment_approved == '0' ) :
										_e( 'Your comment is awaiting moderation.',IAMD_TEXT_DOMAIN); 
									endif;
									edit_comment_link( __('Edit',IAMD_TEXT_DOMAIN) );
						echo '		</div>';
						echo '	</div>';
						echo '	<div class="reply">';
						echo 	comment_reply_link( array_merge( $args, array('reply_text'=>__('Reply',IAMD_TEXT_DOMAIN).'&raquo;',
															'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
						
						echo '	</div>';
						echo '</section>';
					echo '</article><!-- .comment-ID -->';
	   break;
	endswitch;
}

############################################
# PAGINATION
############################################
function my_pagination($class='',$pages = ''){
	$out = NULL;
	global $paged;
	if(empty($paged))$paged = 1;
	$prev = $paged - 1;							
	$next = $paged + 1;	
	$range = 10; // only edit this if you want to show more page-links
	$showitems = ($range * 2)+1;
	if($pages == '') {	
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)	{
			$pages = 1;
		}
	}
	if(1 != $pages){
	$out .= "<ul class='$class'>";
	$out .= ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<li> <a href='".get_pagenum_link(1)."'>&laquo;</a></li>":"";
	$out .=  ($paged > 1 && $showitems < $pages)? "<li> <a href='".get_pagenum_link($prev)."'>&lsaquo;</a></li>":"";

	for ($i=1; $i <= $pages; $i++){
		if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
			if( $class == "ajax-load"):
				$c =  ($paged == $i) ? "active-page" : "";
				$out .= "<li><a href='".get_pagenum_link($i)."' class='".$c."'>".$i."</a></li>";
			else:
				$out .=  ($paged == $i)? "<li class='active-page'>".$i."</li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>"; 
			endif;
		}
	}
	
	$out .=  ($paged < $pages && $showitems < $pages) ? "<li> <a href='".get_pagenum_link($next)."'>&rsaquo;</a> </li>" :"";
	$out .=  ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<li> <a href='".get_pagenum_link($pages)."'>&raquo;</a></li>":"";
	$out .=  "</ul>";
	}
return $out;	
}

function my_gravatar($avatar_defaults){
	$my_avatar = IAMD_BASE_URL.'images/avatar.jpg';
	$avatar_defaults[$my_avatar] = IAMD_THEME_NAME.__(' Avatar',IAMD_TEXT_DOMAIN);
return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'my_gravatar' );

#add_filter( 'get_avatar', 'get_my_avatar', 10, 5 );
function get_my_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $whitelist = array( 'localhost', '127.0.0.1' );

    if( !in_array( $_SERVER['SERVER_ADDR'] , $whitelist ) ) {
	}else{
		$doc = new DOMDocument;
		$doc->loadHTML( $avatar );
		$imgs = $doc->getElementsByTagName('img');
		if ( $imgs->length > 0 ) 
		{
			$url = urldecode( $imgs->item(0)->getAttribute('src') );
			$url2 = explode( 'd=', $url );
			$url3 = explode( '&', $url2[1] );
			$avatar= "<img src='{$url3[0]}' alt='' class='avatar avatar-90 photo' height='90' width='90' />";
		}
	}
	
	return $avatar;
}

#Used in content-page.php to get the current page slug
function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

############################################
# GET PORTFOLIO PAGE CONTENT 
#	- USED IN SINGLE PAGE TEMPLATE
############################################
function get_portfolio_page_content($post_id){
	$tpl_portfolio_settings = get_post_meta($post_id,'_tpl_portfolio_settings',TRUE);
	$tpl_portfolio_settings = is_array($tpl_portfolio_settings) ? $tpl_portfolio_settings  : array();

	echo '<hgroup class="main-title">';
	echo '<h2>'.get_the_title().'</h2>';
	if(isset($tpl_portfolio_settings['sub-title']) && !empty($tpl_portfolio_settings['sub-title'])):
	echo '<h6>'.$tpl_portfolio_settings['sub-title'].'</h6>';
	endif;
	echo '</hgroup>';
	
	wp_link_pages( array('before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>',
						 'next_or_number'=>'number', 'pagelink' => '%', 'echo' => 1 ) );
						 
	edit_post_link( __( ' Edit ',IAMD_TEXT_DOMAIN ) );
	
	#Portfolio Content begins here
	$post_layout	= "";
	$categories		= "";
	$image_type		= "portfolio-four-column";
	$dummy_image	= IAMD_BASE_URL."images/dummy-images/{$image_type}.jpg";

	$categories = isset($tpl_portfolio_settings['cats']) ? array_filter($tpl_portfolio_settings['cats']) : $categories;
	if(empty($categories)):
		$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
	else:
		$args = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
		$categories = get_categories($args);
	endif;

	if( array_key_exists("filter",$tpl_portfolio_settings) && (!empty($categories)) ):
		echo '<!-- **Sorting Container** -->';
		echo '<div id="sorting-container">';
		echo '	<a href="#" class="active-sort" title="" data-filter=".all-sort">'.__('All',IAMD_TEXT_DOMAIN).'</a>';
			 foreach( $categories as $category ):
			 echo "<a href='#' data-filter='.{$category->category_nicename}-sort'>{$category->cat_name}</a>";	
			 endforeach;
		echo '</div><!-- **Sorting Container** -->';
	endif;
$portfolio_page_content = get_post_field('post_content', $post_id);
	echo $portfolio_page_content;	
	echo '<!-- **Portfolio Container** -->';
	echo '<div class="portfolio-container gallery">';
	
			$args = array();
			$categories = array_filter($tpl_portfolio_settings['cats']);
		
			if(is_array($categories) && !empty($categories)):
				$terms = $categories;
				$args = array(	'orderby' 			=> 'title'
								,'order' 			=> 'ASC'
								,'paged' 			=> get_query_var( 'paged' )
								,'posts_per_page' 	=> $tpl_portfolio_settings['post-per-page']
								,'tax_query'		=> array( array( 'taxonomy'=>'portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$terms  ) ) );
			else:	
				$args = array(	'orderby' => 'title' ,'order' => 'ASC' ,'paged' => get_query_var( 'paged' ) ,'posts_per_page' => $tpl_portfolio_settings['post-per-page'] ,'post_type' => 'portfolio');
			endif;

			query_posts($args);
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					$the_id = get_the_ID();
					$the_title = get_the_title();
					$permalink = get_permalink();
					
					#Find sort class by using the portfolio_entries
					$sort = "";
					$item_categories = get_the_terms( $the_id, 'portfolio_entries' );
					if(is_object($item_categories) || is_array($item_categories)):
						foreach ($item_categories as $category):
							$sort .= $category->slug.'-sort ';
						endforeach;
					endif;
					
					echo "<div class='portfolio four-column all-sort $sort $the_title'>";
					echo '	<div class="portfolio-image">';
				$full = wp_get_attachment_image_src(get_post_thumbnail_id($the_id), 'full', false);
									$portfolio_settings = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();
									$url = $portfolio_settings["url"];
									
					echo "		<a href='$permalink' title='$the_title'>";
								if(has_post_thumbnail()):
									the_post_thumbnail($image_type);
								else:
									echo "<img src='$dummy_image' alt='dummy image' />";
								endif;
					echo '		</a>';
									
					echo '		<div class="image-overlay">';
									echo $portfolio_settings['sub-title'];
									
										
									
									
					echo '		</div>';
			
					echo '	</div>';
					echo '	<div class="portfolio-title">';
					echo "		<a href='$permalink' title='$the_title'>$the_title</a><h5>";
						$portfolio_settings = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();
									if(array_key_exists("client",$portfolio_settings)):
										echo $portfolio_settings['client'];
								endif;
					echo '	</h5></div>';
					echo '</div>';
				endwhile;
			endif;	

	echo '<div class="hr-invisible">';
	echo '</div>';									
	echo '</div><!-- **Portfolio Container** --> ';
	
				$additional_page_content = get_post_meta($post_id, 'additional_page_content', true);
	echo $additional_page_content;	
	echo "<!-- **Pagination** -->";
	echo "<div class='pagination' data-page-id='$post_id' >";
			echo my_pagination('ajax-load');
	echo '</div><!-- **Pagination - End** -->';
	#Portfolio Content ends here
	 }

# GET PORTFOLIO PAGE CONTENT END
############################################

############################################
# GET VOTING PORTFOLIO PAGE CONTENT 
#	- USED IN SINGLE PAGE TEMPLATE
############################################
function get_voting_portfolio_page_content($post_id){
	$tpl_portfolio_settings = get_post_meta($post_id,'_tpl_portfolio_settings',TRUE);
	$portfolio_page_content = get_post_field('post_content', $post_id);
	$tpl_portfolio_settings = is_array($tpl_portfolio_settings) ? $tpl_portfolio_settings  : array();
	echo '<div class="hr-invisible"> </div>';
	echo '<hgroup class="main-title">';
	echo '<h2>'.get_the_title().'</h2>';
	if(isset($tpl_portfolio_settings['sub-title']) && !empty($tpl_portfolio_settings['sub-title'])):
	echo '<h6>'.$tpl_portfolio_settings['sub-title'].'</h6>';
	endif;
	echo '</hgroup>';
	echo '<div style="text-align:center;padding-bottom:8px;"><a href="http://sv.thegmic.com/compete-gmic/voting/" class="button  small   mauve">Vote for All</a><a href="http://sv.thegmic.com/appattack/voting/" class="button  small   blue">Vote for appAttack</a><a href="http://sv.thegmic.com/gstartup/voting/" class="button  small   green">Vote for G-Startup</a><a href="http://sv.thegmic.com/global-game-stars/voting/" class="button  small   orange">Vote for Global Game Stars</a></div>';
	echo $portfolio_page_content;

	wp_link_pages( array('before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>',
						 'next_or_number'=>'number', 'pagelink' => '%', 'echo' => 1 ) );

	edit_post_link( __( ' Edit ',IAMD_TEXT_DOMAIN ) );

	#Portfolio Content begins here facebook voting
	$post_layout	= "";
	$categories		= "";
	$image_type		= "portfolio-four-column";
	$dummy_image	= IAMD_BASE_URL."images/dummy-images/{$image_type}.jpg";

	$categories = isset($tpl_portfolio_settings['cats']) ? array_filter($tpl_portfolio_settings['cats']) : $categories;
	if(empty($categories)):
		$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
	else:
		$args = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
		$categories = get_categories($args);
	endif;

	if( array_key_exists("filter",$tpl_portfolio_settings) && (!empty($categories)) ):
		echo '<!-- **Sorting Container** -->';
		echo '<div id="sorting-container">';
		echo '	<a href="#" class="active-sort" title="" data-filter=".all-sort">'.__('All',IAMD_TEXT_DOMAIN).'</a>';
			 foreach( $categories as $category ):
			 echo "<a href='#' data-filter='.{$category->category_nicename}-sort'>{$category->cat_name}</a>";	
			 endforeach;
		echo '</div><!-- **Sorting Container** -->';
	endif;

	echo '<!-- **Portfolio Container** -->';
	echo '<div class="portfolio-container gallery">';
			$args = array();
			$categories = array_filter($tpl_portfolio_settings['cats']);

			if(is_array($categories) && !empty($categories)):
				$terms = $categories;
				$args = array(	'orderby' 			=> 'ID'
								,'order' 			=> 'ASC'
								,'paged' 			=> get_query_var( 'paged' )
								,'posts_per_page' 	=> $tpl_portfolio_settings['post-per-page']
								,'tax_query'		=> array( array( 'taxonomy'=>'portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$terms  ) ) );
			else:	
				$args = array(	'paged' => get_query_var( 'paged' ) ,'posts_per_page' => $tpl_portfolio_settings['post-per-page'] ,'post_type' => 'portfolio');
			endif;

			query_posts($args);
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					$the_id = get_the_ID();
					$the_title = get_the_title();
					$permalink = get_permalink();

					#Find sort class by using the portfolio_entries
					$sort = "";
					$item_categories = get_the_terms( $the_id, 'portfolio_entries' );
					if(is_object($item_categories) || is_array($item_categories)):
						foreach ($item_categories as $category):
							$sort .= $category->slug.'-sort ';
							$i = $i-1;
						endforeach;
					endif;
			
					echo "<div style='z-index:";
					echo $i+2000;
					echo "' class='portfolio four-column all-sort $sort'>";
					echo '	<div class="portfolio-image">';
					echo "		<a href='$permalink' target='_blank' title='$the_title'>";
								if(has_post_thumbnail()):
									the_post_thumbnail($image_type);
								else:
									echo "<img src='$dummy_image' alt='dummy image' />";
								endif;
					echo '		</a>';

					echo '		<div class="image-overlay">';
									$full = wp_get_attachment_image_src(get_post_thumbnail_id($the_id), 'full', false);
									$portfolio_settings = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();
					


									if(array_key_exists("video_url",$portfolio_settings)):
										$url = $portfolio_settings['video_url'];
										echo "<a href='$url' target='_blank' data-gal='prettyPhoto[gallery]' class='zoom'><i class='icon-video'></i></a>";
									elseif($full):
										$url = $full[0];
										echo "<a href='$permalink' class='zoom'><i class='icon-plus'></i></a>";
									else:
										echo "<a href='$permalink' class='zoom'><i class='icon-plus'></i></a>";
									endif;

									if(array_key_exists("url",$portfolio_settings)):
										$url = $portfolio_settings["url"];
										echo "<a href='$permalink' class='link' target='_blank'> <i class='icon-link'> </i> </a>";
									else:
										echo "<a href='$permalink' class='link' target='_blank'> <i class='icon-link'> </i> </a>";
									endif;

					echo '		</div>';

					echo '	</div>';
					echo '	<div class="portfolio-title">';
					echo "		<a href='$permalink' title='$the_title'>$the_title</a><h5>";
					$portfolio_settings = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();
									if(array_key_exists("client",$portfolio_settings)):
										echo $portfolio_settings['client'];
								endif;
					echo "</h5>";
					echo "		<h5><div class='fb-like' data-href='";
						the_permalink(); 
					echo "' data-send='false' data-layout='button_count' data-width='240' data-show-faces='false'></div></h5></div>";
					echo '</div>';
				endwhile;
			endif;											
	echo '</div><!-- **Portfolio Container** --> ';

	echo "<!-- **Pagination** -->";
	echo "<div class='pagination' data-page-id='$post_id' >";
			echo my_pagination('ajax-load');
	echo '</div><!-- **Pagination - End** -->';
	#Portfolio Content ends here for Facebook Voting
	 }

# GET VOTING PORTFOLIO PAGE CONTENT END
############################################

############################################
# GET PARTNER PORTFOLIO PAGE CONTENT 
#	- USED IN SINGLE PAGE TEMPLATE
############################################
function get_partner_portfolio_page_content($post_id){
	$tpl_portfolio_settings = get_post_meta($post_id,'_tpl_portfolio_settings',TRUE);
	$portfolio_page_content = get_post_field('post_content', $post_id);
	$tpl_portfolio_settings = is_array($tpl_portfolio_settings) ? $tpl_portfolio_settings  : array();
	echo '<div class="hr-invisible"> </div>';
	echo '<hgroup class="main-title">';
	echo '<h2>'.get_the_title().'</h2>';
	if(isset($tpl_portfolio_settings['sub-title']) && !empty($tpl_portfolio_settings['sub-title'])):
	echo '<h6>'.$tpl_portfolio_settings['sub-title'].'</h6>';
	endif;
	echo '</hgroup>';
	
	echo $portfolio_page_content;

	wp_link_pages( array('before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>',
						 'next_or_number'=>'number', 'pagelink' => '%', 'echo' => 1 ) );

	edit_post_link( __( ' Edit ',IAMD_TEXT_DOMAIN ) );

	#Portfolio Content begins here facebook voting
	$post_layout	= "";
	$categories		= "";
	$image_type		= "portfolio-four-column";
	$dummy_image	= IAMD_BASE_URL."images/dummy-images/{$image_type}.jpg";

	$categories = isset($tpl_portfolio_settings['cats']) ? array_filter($tpl_portfolio_settings['cats']) : $categories;
	if(empty($categories)):
		$categories = get_categories('taxonomy=portfolio_entries&hide_empty=1');
	else:
		$args = array('taxonomy'=>'portfolio_entries','hide_empty'=>1,'include'=>$categories);
		$categories = get_categories($args);
	endif;

	if( array_key_exists("filter",$tpl_portfolio_settings) && (!empty($categories)) ):
		echo '<!-- **Sorting Container** -->';
		echo '<div id="sorting-container">';
		echo '	<a href="#" class="active-sort" title="" data-filter=".all-sort">'.__('All',IAMD_TEXT_DOMAIN).'</a>';
			 foreach( $categories as $category ):
			 echo "<a href='#' data-filter='.{$category->category_nicename}-sort'>{$category->cat_name}</a>";	
			 endforeach;
		echo '</div><!-- **Sorting Container** -->';
	endif;

	echo '<!-- **Portfolio Container** -->';
	echo '<div class="portfolio-container gallery">';
			$args = array();
			$categories = array_filter($tpl_portfolio_settings['cats']);

			if(is_array($categories) && !empty($categories)):
				$terms = $categories;
				$args = array(	'orderby' 			=> 'date'
								,'order' 			=> 'ASC'
								,'paged' 			=> get_query_var( 'paged' )
								,'posts_per_page' 	=> $tpl_portfolio_settings['post-per-page']
								,'tax_query'		=> array( array( 'taxonomy'=>'portfolio_entries', 'field'=>'id', 'operator'=>'IN', 'terms'=>$terms  ) ) );
			else:	
				$args = array(	'orderby' => 'date' ,'order' => 'ASC' ,'paged' => get_query_var( 'paged' ) ,'posts_per_page' => $tpl_portfolio_settings['post-per-page'] ,'post_type' => 'portfolio');
			endif;

			query_posts($args);
			if( have_posts() ):
				while( have_posts() ):
					the_post();
					$the_id = get_the_ID();
					$the_title = get_the_title();
					$permalink = get_permalink();

					#Find sort class by using the portfolio_entries
					$sort = "";
					$item_categories = get_the_terms( $the_id, 'portfolio_entries' );
					if(is_object($item_categories) || is_array($item_categories)):
						foreach ($item_categories as $category):
							$sort .= $category->slug.'-sort ';
							$i = $i-1;
						endforeach;
					endif;
			
					echo "<div style='z-index:";
					echo $i+2000;
					echo "' class='portfolio four-column all-sort $sort'>";
					echo '	<div class="portfolio-image">';
					echo "		<a href='#' target='_blank' title='$the_title' onclick='return false;' style='cursor:default;'>";
								if(has_post_thumbnail()):
									the_post_thumbnail($image_type);
								else:
									echo "<img src='$dummy_image' alt='dummy image' />";
								endif;
					echo '		</a>';

					echo '		<div class="image-overlay">';
									$full = wp_get_attachment_image_src(get_post_thumbnail_id($the_id), 'full', false);
									$portfolio_settings = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();
					


									if(array_key_exists("video_url",$portfolio_settings)):
										$url = $portfolio_settings['video_url'];
										echo "<a href='$url' target='_blank' data-gal='prettyPhoto[gallery]' class='zoom'><i class='icon-video'></i></a>";
									elseif($full):
										$url = $full[0];
										echo "<a href='$permalink' class='zoom'><i class='icon-plus'></i></a>";
									else:
										echo "<a href='$permalink' class='zoom'><i class='icon-plus'></i></a>";
									endif;

									if(array_key_exists("url",$portfolio_settings)):
										$url = $portfolio_settings["url"];
										echo "<a href='$url' class='link' target='_blank'> <i class='icon-link'> </i> </a>";
									else:
										echo "<a href='$url' class='link' target='_blank'> <i class='icon-link'> </i> </a>";
									endif;

					echo '		</div>';

					echo '	</div>';
					echo '	<div class="portfolio-title">';
					echo "		<a href='$url' target='_blank' title='$the_title'>$the_title</a><h5>";
					$portfolio_settings = get_post_meta($the_id,'_portfolio_settings',TRUE);
									$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();
									if(array_key_exists("client",$portfolio_settings)):
										echo $portfolio_settings['client'];
								endif;
					echo "</h5>";
					echo "</div>";
					echo '</div>';
				endwhile;
			endif;											
	echo '</div><!-- **Portfolio Container** --> ';

	echo "<!-- **Pagination** -->";
	echo "<div class='pagination' data-page-id='$post_id' >";
			echo my_pagination('ajax-load');
	echo '</div><!-- **Pagination - End** -->';
	#Portfolio Content ends here for Facebook Voting
	 }

# GET PARNTER PORTFOLIO PAGE CONTENT END
############################################


############################################
# GET BLOG PAGE CONTENT 
#	- BY DEFAULT USED IN SINGLE PAGE THEME( $page_type = true)
#	- $page_type = false : You can use this template in individual page
############################################
function get_blog_page_content($post_id, $page_type = true){

	$tpl_blog_settings = get_post_meta($post_id,'_tpl_blog_settings',TRUE);
	$tpl_blog_settings = is_array($tpl_blog_settings) ? $tpl_blog_settings  : array();
	

	$page_layout 	= "";
	$show_sidebar 	= false;
	$sidebar_class 	= "";
	
	$post_layout	= "";
	$post_class 	= "";
	$last 			= NULL;
	
	$categories 	= isset($tpl_blog_settings['exclude-cats']) ? array_filter($tpl_blog_settings['exclude-cats']) : NULL;
	$post_per_page 	= $tpl_blog_settings['post-per-page'];


	echo '<hgroup class="main-title">';
	echo '<h2>'.get_the_title().'</h2>';
	if(isset($tpl_blog_settings['sub-title']) && !empty($tpl_blog_settings['sub-title'])):
	echo '<h6>'.$tpl_blog_settings['sub-title'].'</h6>';
	endif;
	echo '</hgroup>';
	echo '<div class="hr-invisible"> </div>';
	
	the_content();
	
	wp_link_pages( array('before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>',
						 'next_or_number'=>'number', 'pagelink' => '%', 'echo' => 1 ) );
						 
	edit_post_link( __( ' Edit ',IAMD_TEXT_DOMAIN ) );
	
	#To Show posts in Single page Theme
	if( $page_type ):
		echo '<div class="hr-invisible"> </div>';
		echo '<div class="blog-carousel-wrapper">';
		echo '	<!--- Start loop to show blog posts -->';

				if(empty($categories)):
					$args = array('paged'=>get_query_var('paged'),'posts_per_page'=>$post_per_page,'post_type'=> 'post');
				else:
					$exclude_cats = array_unique($categories);
					$args = array('paged'=>get_query_var('paged'),'posts_per_page'=>$post_per_page,'category__not_in'=>$exclude_cats,'post_type'=>'post');
				endif;
				
				
				$image_type		= "blog-two-column";
				$dummy_image	= IAMD_BASE_URL."images/dummy-images/{$image_type}.jpg";

				
				query_posts($args);
				
				if( have_posts() ):
					echo '<ul class="blog-carousel">';
					$count = 1;
					
					while( have_posts() ):

						the_post();
						$the_id = get_the_ID();
						$the_title = get_the_title();
						$permalink = get_permalink();

						$class = ( ($last>1) && ($count%$last == 0) ) ? ' last': '';
						
						echo "<li>";
						
						echo '<!-- **Blog Entry** -->';
						echo '<article class="blog-entry">';
						
						echo ' <div class="entry-thumb-meta">';
						echo ' <div class="entry-thumb">';
						echo "  <a href='$permalink' title='$the_title'>";
								if( has_post_thumbnail() ):
									the_post_thumbnail($image_type);
								else:
									echo "<img src='$dummy_image' alt='$the_title' />";
								endif;
						echo '  </a>';
						echo ' </div>';
						
						$class = (isset($tpl_blog_settings['disable-comment-info']) && isset($tpl_blog_settings['disable-date-info'])) ? "hidden" : '';
						echo "  <div class='entry-meta $class'>";
								if(!isset($tpl_blog_settings['disable-comment-info'])):
                                	comments_popup_link('<i class="icon-comments"> </i> 0','<i class="icon-comments"> </i> 1', '<i class="icon-comments"> </i> %',"comments",'<i class="icon-comments-off"> </i>');
                                 endif;
								 
								 if(!isset($tpl_blog_settings['disable-date-info'])):
								 	echo '<div class="date">';
									echo "<i class='icon-calendar'></i>\n";
									echo '<p>'.get_the_date('d').'</p>';
									echo '<span>'.get_the_date('M').'<br /> '.get_the_date('Y').'</span>';
									echo '</div>';
								 endif;
								 						
						echo '	</div>';
						echo ' </div>';
						
						echo ' <div class="entry-details">';
						echo " 	<h5><a href='$permalink' title='$the_title'>$the_title</a></h5>";
						$class = (isset($tpl_blog_settings['disable-author-info']) && isset($tpl_blog_settings['disable-category-info']) && isset($tpl_blog_settings['disable-tag-info']) ) ? "hidden" : '';
						echo " 	<div class='entry-metadata $class'>";
									if(!isset($tpl_blog_settings['disable-author-info'])):
										echo "<span class='author'> <i class='icon-user'> </i>\t".get_the_author_link().'</span>';
									endif;

									if(!isset($tpl_blog_settings['disable-category-info'])):
										echo "<div class='categories'><i class='icon-pushpin'> </i>\t";
										the_category(', ');
										echo "</div>";
									endif;

									if(!isset($tpl_blog_settings['disable-tag-info'])):
										the_tags('<div class="tags"><i class="icon-tag"> </i>'.'&nbsp;',', ','</div>');
									endif;
								
						echo '	</div>';
						echo ' </div>';
						
						echo ' <div class="entry-body">';
						echo mytheme_excerpt($tpl_blog_settings['excerpt-length']);
						echo "	<a href='$permalink' title='$the_title'>".__('Read full story',IAMD_TEXT_DOMAIN)." &raquo;</a>";
						echo ' </div>';
						
						
						echo '</article><!-- **Blog Entry - End** -->';
						echo "</li>";
										
					endwhile;
					
					echo '</ul><!-- **Blog Carousel End** -->';

                    echo '<!-- **Slider Controls** -->';
					echo '<div class="slider-controls">';
					echo '	<a href="#" class="prev-posts"> <i class="icon-chevron-left"> </i> </a>';
					echo '  <div id="pager"> </div>';
					echo '  <a href="#" class="next-posts"> <i class="icon-chevron-right"></i></a>';
					echo '</div><!-- **Slider Controls - End** -->';
					
				endif; # have_posts()
				
		echo '  <!--- End loop to show blog posts -->';
		echo '</div><!-- **Blog Carousel Wrapper End** --> ';
	
	#Else part is to show blog in template page	
	else:
	endif;
	
}
# GET BLOG PAGE CONTENT END
############################################?>