<?php add_action('init', 'portfolio_register');
function portfolio_register() {
		$labels = array(
		'name' => __('Portfolios',IAMD_TEXT_DOMAIN),
		'all_items'=>__('All Portfolios',IAMD_TEXT_DOMAIN),
		'singular_name' =>__('Portfolio Entry',IAMD_TEXT_DOMAIN),
		'add_new' => __('Add New',IAMD_TEXT_DOMAIN),
		'add_new_item' => __('Add New Portfolio Entry',IAMD_TEXT_DOMAIN),
		'edit_item' => __('Edit Portfolio Entry',IAMD_TEXT_DOMAIN),
		'new_item' => __('New Portfolio Entry',IAMD_TEXT_DOMAIN),
		'view_item' => __('View Portfolio Entry',IAMD_TEXT_DOMAIN),
		'search_items' => __('Search Portfolio Entries',IAMD_TEXT_DOMAIN),
		'not_found' =>  __('No Portfolio Entries found',IAMD_TEXT_DOMAIN),
		'not_found_in_trash' => __('No Portfolio Entries found in Trash',IAMD_TEXT_DOMAIN), 
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $labels,
		'description'=>'This is cstom post type to hold Portfolio items',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>'portfolio','with_front'=>true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'menu_position' => 21,
		'supports' => array('title','thumbnail','excerpt','editor','comments'),
		'menu_icon' => IAMD_FW_URL.'images/icon_portfolio.png'
	);
	
	 register_post_type( 'portfolio',$args);
	 
	 register_taxonomy("portfolio_entries", 
		array("portfolio"), 
		array(	"hierarchical" => true, 
		"label" => "Categories", 
		"singular_label" => "Category", 
		"rewrite" => true,
		"query_var" => true
	));  
}

add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
add_action("manage_posts_custom_column",  "portfolio_columns_display",10,2);
function portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"portfolio-image"=>"Image",
		"title" => "Title",
		"author"=>"Author",
		"portfolio_entries"=>"Categories",
		"tags"=>"Tags",
		"comments"=>"<span class='vers'><img src='".home_url()."/wp-admin/images/comment-grey-bubble.png' alt='Comments'></span>",
		"date"=>"Date"
	);

	return $portfolio_columns;
}
 
function portfolio_columns_display($portfolio_columns,$id){
	global $post;
	switch ($portfolio_columns):
		case "portfolio-image":
		
			  $image = wp_get_attachment_image(get_post_thumbnail_id($id),'medium');
			  if(!empty($image)):
			  	echo $image;
			  else:
			  	$data = get_post_meta( $id, '_portfolio_settings', true );
				$items = isset($data["items"]) ? $data["items"] : NULL;
				
				if(!empty($items)):
					if(is_numeric($items[0])):
						wp_get_attachment_image($items[0]);
					else:
						global $wp_embed;
						echo $wp_embed->run_shortcode("[embed width='300']".$items[0]."[/embed]");					
					endif;
				else:
				  	echo __("No Featured Image",IAMD_TEXT_DOMAIN);
				endif;	
			  endif;
		break;
		
		case "portfolio_entries":
			echo get_the_term_list($post->ID, 'portfolio_entries', '', ', ','');
		break;
	endswitch;
}?>