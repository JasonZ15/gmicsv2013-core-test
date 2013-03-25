<?php 
add_shortcode('enquiry_form', 'my_enquiry_form');
function my_enquiry_form( $attrs, $content = null ) {
	extract(shortcode_atts(array('to' => get_option('admin_email'),'title'=>__('Enquiry',IAMD_TEXT_DOMAIN)), $attrs));
	$path = IAMD_FW_URL."sendmail.php";
	$title = !empty($title) ?"<h4>$title</h4>": "";
	
	$out  = $title; 
	$out .= '<div class="message"></div>';	
	$out .= "<form class='enquiry-form' action='{$path}' method='get'>";
	$out .= "<p><input type='hidden' name='to'  value='{$to}' /></p>";
	$out .= '<p><label>'.__('Your Name',IAMD_TEXT_DOMAIN).' <span> ('.__('required',IAMD_TEXT_DOMAIN).') </span> </label><input name="name" type="text" required></p>';
	$out .= '<p><label>'.__('E-mail',IAMD_TEXT_DOMAIN).' <span> ('.__('required',IAMD_TEXT_DOMAIN).') </span> </label><input name="email" type="email"  autocomplete="off" required></p>';
	$out .= '<p><label>'.__('Message',IAMD_TEXT_DOMAIN).' <span> ('.__('required',IAMD_TEXT_DOMAIN).') </span> </label><textarea name="message" cols="5" rows="3" required></textarea></p>';
	$out .= '<p><input name="submit" type="submit" value="'.__('Send Email',IAMD_TEXT_DOMAIN).'"></p>';	
	$out .= '</form>';
return $out;
}

add_shortcode('newsletter_signup_form','my_newsletter_signup_form');
function my_newsletter_signup_form( $attrs, $content = null ) {
	extract(shortcode_atts(array('to' => get_option('admin_email')), $attrs));
	$path = IAMD_FW_URL."signup.php";
	$out  = '<div class="message"></div>';
	$out .= "<form class='newsletter-form' action='{$path}' method='get'>";
	$out .= "<p><input type='hidden' name='to'  value='{$to}' /></p>";
	$out .= '<label>'.__('Your E-mail',IAMD_TEXT_DOMAIN).'<span> ('.__('required',IAMD_TEXT_DOMAIN).') </span> </label>';
	$out .= '<input type="email" name="email" autocomplete="off" required>';
	$out .= '<input name="submit" type="submit" value="'.__('Send Email',IAMD_TEXT_DOMAIN).'">';	
	$out .= '</form>';
return $out;
}?>