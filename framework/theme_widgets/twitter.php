<?php 
/** My Twitter Widget
  * Objective:
  *		1.To list out the latest tweets
**/
class MY_Twitter extends WP_Widget {
	#1.constructor
	function MY_Twitter() {
		$widget_options = array("classname"=>'tweetbox', 'description'=>'To Show latest twitter tweets');
		$this->WP_Widget(false,IAMD_THEME_NAME.__(' Twitter Widget',IAMD_TEXT_DOMAIN),$widget_options);
	}

	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance,array( 'title' => __('Latest Tweets',IAMD_TEXT_DOMAIN), 'count' => '3', 'username' => mytheme_option('twitter'),
						'exclude_replies'=>'1' , 'time'=>'1', 'display_avatar'=>'1') );
						
		$title = 			empty($instance['title']) ?	'' : strip_tags($instance['title']);
		$count = 			empty($instance['count']) ? '' : strip_tags($instance['count']);
		$username = 		empty($instance['username']) ? '' : strip_tags($instance['username']);
		$exclude_replies = 	empty($instance['exclude_replies']) ? 0 : 1;
		$time = 			empty($instance['time']) ? 0 : 1;
		$display_avatar = 	empty($instance['display_avatar']) ? 0 : 1;?>
        
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:',IAMD_TEXT_DOMAIN);?> 
		   <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
            type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
           
        <p><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Enter your twitter username:',IAMD_TEXT_DOMAIN);?>
           <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>"
            type="text" value="<?php echo esc_attr($username); ?>" /></label></p>
            
        <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('How many entries do you want to show:',IAMD_TEXT_DOMAIN);?>
        	<select class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
            <?php for($i = 1; $i <= 20; $i++):	
					$selected = ($count == $i ) ? "selected='selected'" : "";?>
	              <option <?php echo($selected);?> value="<?php echo($i);?>"><?php echo($i);?></option>
            <?php endfor;?>
            </select></label></p>
            
        <p><input type="checkbox"  id="<?php echo $this->get_field_id('exclude_replies');?>" name="<?php echo $this->get_field_name('exclude_replies');?>" 
			<?php checked($exclude_replies); ?> /> <label for="<?php echo $this->get_field_id('exclude_replies'); ?>"><?php _e('Exclude @replies',IAMD_TEXT_DOMAIN);?></label></p>
            
        <p><input type="checkbox"  id="<?php echo $this->get_field_id('time');?>" name="<?php echo $this->get_field_name('time');?>" 
			<?php checked($time); ?> /> <label for="<?php echo $this->get_field_id('time'); ?>"><?php _e('Show time of tweet',IAMD_TEXT_DOMAIN);?></label></p>
            
        <p><input type="checkbox"  id="<?php echo $this->get_field_id('time');?>" name="<?php echo $this->get_field_name('display_avatar');?>" 
				<?php checked($display_avatar); ?> /> <label for="<?php echo $this->get_field_id('display_avatar'); ?>"><?php _e('Show user avatar',IAMD_TEXT_DOMAIN);?></label></p>		
<?php
	}
	
	#3.processes & saves the twitter widget option
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['exclude_replies'] = empty($new_instance['exclude_replies']) ? 0 : 1;
		$instance['time'] = empty($new_instance['time']) ? 0 : 1;
		$instance['display_avatar'] = empty($new_instance['display_avatar']) ? 0 : 1;
		return $instance;
	}
	
	#4.output in front-end
	function widget($args, $instance) {
		extract($args);
		echo $before_widget;
			$title = 			empty($instance['title']) ?	'' : strip_tags($instance['title']);
			$count = 			empty($instance['count']) ? '' : strip_tags($instance['count']);
			$username = 		empty($instance['username']) ? '' : strip_tags($instance['username']);
			$exclude_replies = 	empty($instance['exclude_replies']) ? 0 : 1;
			$time = 			empty($instance['time']) ? 0 : 1;
			$display_avatar = 	empty($instance['display_avatar']) ? 0 : 1;
			
			if ( !empty( $title ) ) { echo $before_title . "<a href='http://twitter.com/$username/' title='".strip_tags($title)."'>".$title ."</a>". $after_title; };
			
			$messages = mytheme_get_tweet($count, $username, $time, $exclude_replies, $display_avatar);
			echo $messages;
			
		echo $after_widget;
	}
}?>