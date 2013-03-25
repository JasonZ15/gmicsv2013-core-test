<?php
// Adding Slide Post Type 
add_action( 'init', 'create_sliders' );
function create_sliders() {
  $labels = array(
    'name' => __('Slides',IAMD_TEXT_DOMAIN),
	'all_items'=>__('All Slides',IAMD_TEXT_DOMAIN),
    'singular_name' => __('Slide',IAMD_TEXT_DOMAIN),
    'add_new' => __('Add New',IAMD_TEXT_DOMAIN),
    'add_new_item' => __('Add New Slide',IAMD_TEXT_DOMAIN),
    'edit_item' => __('Edit Slide',IAMD_TEXT_DOMAIN),
    'new_item' => __('New Slide',IAMD_TEXT_DOMAIN),
    'view_item' => __('View Slide',IAMD_TEXT_DOMAIN),
    'search_items' => __('Search Slides',IAMD_TEXT_DOMAIN),
    'not_found' =>  __('No Slides found',IAMD_TEXT_DOMAIN),
    'not_found_in_trash' => __('No Slides found in Trash',IAMD_TEXT_DOMAIN),
    'parent_item_colon' => '');

 $args = array(
		'labels' => $labels,
		'description'=>'This is cstom post type to hold Slider items',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>'slider'),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'menu_position' =>20,
		'supports' => array('title','thumbnail','editor')
		,'menu_icon' => IAMD_FW_URL.'images/icon_slider.png'
 );

  register_post_type( 'slide',$args);
}
  
add_filter("manage_edit-slide_columns", "slide_edit_columns");
add_action("manage_posts_custom_column", "slide_columns_display",10,2);

function slide_edit_columns($slide_columns){
	$slide_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"id" => "ID",
		"slider-image"=>"Image",
		"title" => "Title",
		//"author"=>"Author",
		//"tags"=>"Tags",
		//"comments"=>"<span class='vers'><img src='".home_url()."/wp-admin/images/comment-grey-bubble.png' alt='Comments'></span>",
		//"date"=>"Date"
	);

	return $slide_columns;
}
 
function slide_columns_display($slide_columns,$id){
	switch ($slide_columns):
		case "id":
			echo $id;
		break;
		
		case "slider-image":
			global $wp_embed;
			$out = "";
			$image = wp_get_attachment_image(get_post_thumbnail_id($id),'medium');
			$out = !empty($image) ? $image : $out;
			$video_url = get_post_meta($id,'_video_url',true);
			$video_url = !empty($video_url) ? $wp_embed->run_shortcode("[embed width='300']".$video_url."[/embed]") : "";
			$video_url = !empty($video_url) ? $video_url: $out;
			$out = 	!empty($video_url) ? $video_url : __("Set Featured Image or Video Url",IAMD_TEXT_DOMAIN);
			echo $out;
		break;
	endswitch;
}?>