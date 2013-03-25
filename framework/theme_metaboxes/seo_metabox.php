<?php $status = mytheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') || mytheme_is_plugin_active('wordpress-seo/wp-seo.php');
if(!$status):	add_action("admin_init", "seo_metabox");	endif;?>
<?php function seo_metabox(){
		$posts = array("post","page");
		foreach($posts as $post):
			add_meta_box("seo-meta-container", __('SEO Options',IAMD_TEXT_DOMAIN), "seo_settings", "{$post}", "normal", "high");
			add_action('save_post','seo_meta_save');
		endforeach;
	} 
	
	function seo_settings($args){ 
		global $post;?>
        <div class="custom-box">
            <label class="right"><?php _e('Title',IAMD_TEXT_DOMAIN);?> </label>
            <input name="_seo_title" type="text" class="large"  value="<?php echo get_post_meta( $post->ID, '_seo_title', true );?>" />
             <?php mytheme_adminpanel_tooltip(__('The title display in search engines is limited to 70 chars. If the SEO title is empty the title will be generated based on your title template in your SEO settings.',IAMD_TEXT_DOMAIN));?>
        </div>
        <div class="custom-box">
            <label class="right"><?php _e('Description',IAMD_TEXT_DOMAIN);?> </label>
            <textarea class="large" id="" name="_seo_description" cols="8" rows="8"><?php echo stripslashes(get_post_meta($post->ID,'_seo_description',true));?></textarea>
             <?php mytheme_adminpanel_tooltip(__('The meta description will be limited to 140 chars. If the meta description is empty the description will be generated based on your meta description options in your SEO settings.',IAMD_TEXT_DOMAIN));?>
        </div>
        <div class="custom-box">
            <label class="right"><?php _e('Keywords',IAMD_TEXT_DOMAIN);?> </label>
            <input name="_seo_keywords" type="text" class="large" value="<?php echo get_post_meta( $post->ID, '_seo_keywords', true );?>"/>
             <?php mytheme_adminpanel_tooltip(__('Add any additional comma separated keywords here.',IAMD_TEXT_DOMAIN));?>
        </div>
<?php
		wp_reset_postdata();
    }
	
	function seo_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 	return $post_id;
		
			$title = !empty($_POST['_seo_title']) ? $_POST['_seo_title'] : NULL;
			$desc =  !empty($_POST['_seo_description']) ? $_POST['_seo_description'] : NULL;
			$keywords = !empty($_POST['_seo_keywords']) ? $_POST['_seo_keywords'] : NULL;
		update_post_meta($post_id, '_seo_title',$title);
		update_post_meta($post_id, '_seo_description',$desc);
		update_post_meta($post_id, '_seo_keywords',$keywords);
	}?>