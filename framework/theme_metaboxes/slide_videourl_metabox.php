<?php add_action("admin_init", "slide_videourl_metabox");?>
<?php function slide_videourl_metabox(){
			add_meta_box("slide-post-meta-container", __('Video Url',IAMD_TEXT_DOMAIN), "slide_videourl_settings", "slide", "side", "default");
			add_action('save_post','slide_videourl_meta_save');
	} 
	
	function slide_videourl_settings($args){ 
		global $post;?>
        <div class="custom-box">
            <label><?php _e('Video Url',IAMD_TEXT_DOMAIN);?> </label>
            <input name="_video_url" type="text" class="large"  value="<?php echo get_post_meta( $post->ID, '_video_url', true );?>" />
             <?php mytheme_adminpanel_tooltip(__('Enter the URL to the Video instead of Featured image',IAMD_TEXT_DOMAIN));?>
        </div>
<?php
		wp_reset_postdata();
    }
	
	function slide_videourl_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id; 
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		
		$video_url = !empty($_POST['_video_url']) ? $_POST['_video_url'] : NULL;
		update_post_meta($post_id, '_video_url',$video_url);
	}?>