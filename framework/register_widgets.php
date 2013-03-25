<?php get_template_part('framework/theme_widgets/twitter');
	  get_template_part('framework/theme_widgets/recent_posts');
	  get_template_part('framework/theme_widgets/recent_pages');
	  get_template_part('framework/theme_widgets/portfolio_widgets');
add_action( 'widgets_init', 'my_widgets' );
function my_widgets(){
	#Twitter
	register_widget('MY_Twitter');
	
	#Recent Posts
	register_widget('MY_Recent_Posts');
	
	#Recent Pages
	register_widget('MY_Recent_Pages');

	#My Portfolio Widgets
	register_widget('MY_Portfolio_Widget');
}?>