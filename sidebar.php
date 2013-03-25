<?php wp_reset_query();
	  global $post;
	  
	  if(function_exists('dynamic_sidebar') && dynamic_sidebar(('display-everywhere-sidebar')) ): endif;
	  
	  if(is_page()):
		if(function_exists('dynamic_sidebar') && dynamic_sidebar(('page-'.get_the_ID().'-sidebar')) ):  endif;
	  
	  elseif(is_single() and 'post' == get_post_type()):
	  	if(function_exists('dynamic_sidebar') && dynamic_sidebar(('post-'.get_the_ID().'-sidebar')) ):  endif;
	  
	  elseif(is_category()):
	  	if(function_exists('dynamic_sidebar') && dynamic_sidebar(('category-'.get_query_var('cat').'-sidebar')) ):  endif;
		
	  endif;?>