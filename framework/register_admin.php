<?php
add_action('admin_init', 'mytheme_admin_options_init', 1 );
add_action('admin_print_styles', 'my_admin_panel_styles');
add_action('admin_print_scripts', 'my_admin_panel_scripts');

##Admin panel media uploader hooks( to alter the media uploder used to upload logo , favicon ... )	
if ( isset( $_GET['mytheme_upload_button'] ) || isset( $_POST['mytheme_upload_button'] ) && (isset($_GET['page']) && $_GET['page'] == 'parent')  ):
		add_action( 'admin_init', 'mytheme_image_upload_option' );
endif;
## End hook


function my_admin_panel_styles(){
	global $wp_version;
	
	wp_enqueue_style('thickbox');
	
	if((float) $wp_version >= 3.5 ):
		wp_enqueue_script('wp-color-picker'); #New Color Picker
	else:
		wp_enqueue_script('farbtastic'); #Color picker
	endif;
	
	wp_enqueue_style('my-adminpanel', IAMD_FW_URL.'theme_options/style.css');
}

function my_admin_panel_scripts(){
	global $wp_version;

	echo "<script type=\"text/javascript\">
	//<![CDATA[
		var mysiteWpVersion = '$wp_version';
	//]]>\r</script>\r";
	
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-slider');
	
#	if((float) $wp_version >= 3.5 ):
		wp_enqueue_style('wp-color-picker'); #New Color Picker
#	else:
		wp_enqueue_style('farbtastic'); #Color Picker
#	endif;
	
	
	
	wp_enqueue_script('mytheme-tooltip',IAMD_FW_URL.'js/admin/jquery.tools.min.js');
	wp_enqueue_script('mytheme',IAMD_FW_URL.'js/admin/mytheme.admin.js');
	wp_localize_script('mytheme','objectL10n',array(
		'resetConfirm' => __( 'This will restore all of your options to default. Are you sure?', IAMD_TEXT_DOMAIN ),
		'importConfirm' =>__( 'You are going to import the dummy data provided with the theme, kindly confirm?', IAMD_TEXT_DOMAIN ),
		'disableImportMsg' => __( 'Importing is disabled.. :), Please set Disable Import to NO in Buddha Panel General Settings', IAMD_TEXT_DOMAIN )
	));
}

function mytheme_admin_options_init(){
	register_setting(IAMD_THEME_SETTINGS,IAMD_THEME_SETTINGS);
	add_option(IAMD_THEME_SETTINGS,mytheme_default_option());
	if( isset($_POST['mytheme-option-save']) ):
		mysite_ajax_option_save();
	endif;
	
	if(isset($_POST['mytheme']['reset'])):
		delete_option(IAMD_THEME_SETTINGS);
		update_option(IAMD_THEME_SETTINGS,mytheme_default_option()); # To set Default options
		wp_redirect( admin_url( 'admin.php?page=parent&reset=true' ) );
		exit;
	endif;
}

function mysite_ajax_option_save(){
	check_ajax_referer(IAMD_THEME_SETTINGS.'_wpnonce','mytheme_admin_wpnonce');
	$data = $_POST;
	unset( $data['_wp_http_referer'], $data['_wpnonce'], $data['action'] );
	unset( $data['mytheme_admin_wpnonce'], $data['mytheme-option-save'], $data['option_page'] );
	
	$msg = array( 'success' => false, 'message' => __( 'Error: Options not saved, please try again.', IAMD_TEXT_DOMAIN ) );
	
	
	$data =  array_filter($data[IAMD_THEME_SETTINGS]);
	
	if( get_option( IAMD_THEME_SETTINGS ) != $data ) {
		if( update_option( IAMD_THEME_SETTINGS, $data ) )
			$msg = array( 'success' => 'options_saved', 'message' => __( 'Options Saved.', IAMD_TEXT_DOMAIN ) );
	} else {
		$msg = array( 'success' => true, 'message' => __( 'Options Saved.', IAMD_TEXT_DOMAIN ) );
	}
	
	
	$echo = json_encode( $msg );
	@header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );
	echo $echo;
	exit;
}

add_action( 'admin_head-toplevel_page_parent', 'mytheme_admin_print_scripts' );
function mytheme_admin_print_scripts() {
	echo "<script type=\"text/javascript\">
	//<![CDATA[
	jQuery(document).ready(function(){
		mythemeAdmin.menuSort();
	});
	//]]>\r</script>\r";
}


function custom_login_logo() {
	$logo =  mytheme_option('advance','admin-login-logo-url');
	
	if("true" ==  mytheme_option('advance','enable-admin-login-logo-url') ):
		if(!empty($logo))	echo '<style type="text/css">  div#login h1 a { background-image:url('.$logo.')} </style>';
	endif;
}
add_action('login_head', 'custom_login_logo');

function custom_logo() {
	$logo = mytheme_option('advance','admin-logo-url');
	
	if("true" ==  mytheme_option('advance','enable-admin-logo-url') ):
		if(!empty($logo)) echo '<style type="text/css"> #wp-admin-bar-wp-logo .ab-icon { background-image: url('.$logo.') !important;  background-position:0px !important;}</style>';
	endif;
	  
}
add_action('admin_head', 'custom_logo');

#Ajax Import functionality
add_action('wp_ajax_my_ajax_import_data', 'my_ajax_import_data');
function my_ajax_import_data(){
	#get_template_part('framework/importer/mytheme_importer');
	#require_once AVIA_PHP . 'inc-avia-importer.php';
	get_template_part('framework/wordpress-importer/my-importer');
}
#Ajax Import functionality end

#####	 	PAGINATION FOR SLIDER IMAGES AT BACKEND HOME PAGE OPTION	#####
add_action('wp_ajax_show_slider_page', 'show_slider_page');
function show_slider_page() {
	$page = intval($_POST['page']);
	$args = array( 'post_type' => 'slide', 'orderby' => 'id', 'order' => 'ASC', 'posts_per_page' => 10 , 'offset' => ( 10 * ( $page - 1 ) ));
	$slider_query = new WP_Query($args);
		foreach ($slider_query->posts as $slider):
			$id = $slider->ID;
			$default_attr= array('alt'=> trim(strip_tags($slider->post_title)),'title' => trim(strip_tags($slider->post_title)));
			$img = wp_get_attachment_image(get_post_thumbnail_id($id),'thumbnail',0,$default_attr);			
			$src = IAMD_FW_URL.'theme_options/images/no-image.jpg';		
			$video_url = get_post_meta($id,'_video_url',true);
			$src = !empty($video_url) ? IAMD_FW_URL.'theme_options/images/video-slider.jpg': $src;
			$img = !empty($img) ? $img : "<img width='150' height='150' src='{$src}' alt='{$slider->post_title}' title='{$slider->post_title}'/>";
			echo "<li data-attachment-id='{$id}'>{$img}<span class='my_delete'>x</span></li>";
		endforeach;
		die();
}

#####	 	PAGINATION FOR MEDIA IMAGES AT BACKEND IN INDIVIDAL PORTFOLIO ITEMS	#####
add_action('wp_ajax_show_media_images', 'show_media_images');
function show_media_images() {
	$page = intval($_POST['page']);
	$args = array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'posts_per_page' => 15 ,'offset' => ( 15 * ( $page - 1 ) ));
	$media_query = new WP_Query($args);
    foreach ($media_query->posts as $attachment):
		$id = esc_attr($attachment->ID);
		$img = wp_get_attachment_image( $id);
		echo "<li data-attachment-id='{$id}'>{$img}<span class='my_delete'>x</span></li>"; 
	endforeach;
	die();
}


######### SAMPLE FONT PREVIEW ##########
add_action('wp_ajax_mytheme_font_url','mytheme_font_url');
function mytheme_font_url(){
	$recieve_font = $_POST['font'];
	$font_url = array('url'=>'http://fonts.googleapis.com/css?family=' . str_replace(' ', '+' , $recieve_font));	
	die(json_encode($font_url));
}
?>