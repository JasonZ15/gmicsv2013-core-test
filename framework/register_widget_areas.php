<?php 
	#Display Everywhere
	register_sidebar(array(
		'name' 			=>	'Display Everywhere',
		'id'			=>	'display-everywhere-sidebar',
		'before_widget' => 	'<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> 	'</div>',
		'before_title' 	=> 	'<h3 class="widgettitle">',
		'after_title' 	=> 	'</h3>'));

	#Footer Columnns		
	$footer_columns =  mytheme_option('general','footer-columns');
	mytheme_footer_widgetarea($footer_columns);
	
	#Custom sidebars for Pages
	$page = mytheme_option("widgetarea","pages");	
	$page = !empty($page) ? $page : array();
	$widget_areas_for_pages = array_filter(array_unique($page));
	foreach($widget_areas_for_pages as $page_id):
		$title = get_the_title($page_id);	
		register_sidebar(array(
			'name' 			=>	"Page: {$title}",
			'id'			=>	"page-{$page_id}-sidebar",
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'</h3>'
		));
	endforeach;
	
	#Custom sidebars for Posts
	$posts = mytheme_option("widgetarea","posts");
	$posts = !empty($posts) ? $posts : array();
	$widget_areas_for_posts = array_filter(array_unique($posts));
	foreach($widget_areas_for_posts as $post_id):
		$title = get_the_title($post_id);	
		register_sidebar(array(
			'name' 			=>	"Post: {$title}",
			'id'			=>	"post-{$post_id}-sidebar",
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'</h3>'
		));
	endforeach;
	#Custom sidebars for categories 
	$cats = mytheme_option("widgetarea","cats");
	$cats = !empty($cats) ? $cats : array();
	$widget_areas_for_cats = array_filter(array_unique($cats));
	foreach($widget_areas_for_cats as $cat_id):
		$title = get_the_category_by_ID($cat_id);
		register_sidebar(array(
			'name' 			=>	"Category: {$title}",
			'id'			=>	"category-{$cat_id}-sidebar",
			'before_widget' => 	'<aside id="%1$s" class="widget %2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title' 	=> 	'<h3 class="widgettitle">',
			'after_title' 	=> 	'</h3>'
		));
	endforeach;?>