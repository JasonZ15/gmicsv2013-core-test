<?php add_action("admin_init", "portfolio_videourl_metabox");?>
<?php function portfolio_videourl_metabox(){
			add_meta_box("portfolio-default-container", __('Default Options',IAMD_TEXT_DOMAIN), "portfolio_default_settings", "portfolio", "normal", "default");
			add_meta_box("portfolio-meta-container", __('Meta Options',IAMD_TEXT_DOMAIN), "portfolio_meta_settings", "portfolio", "side", "default");
			add_meta_box("portfolio-featured-video-meta-container", __('Featured Video',IAMD_TEXT_DOMAIN), "portfolio_featured_video_settings", "portfolio", "normal", "default");
			add_meta_box("portfolio-media-container",__('Media Settings',IAMD_TEXT_DOMAIN),"portfolio_media_container","portfolio","normal","default");
			add_action('save_post','portfolio_meta_save');
	} 
	
	function portfolio_default_settings($args){
		global $post;
		$portfolio_settings = get_post_meta($post->ID,'_portfolio_settings',TRUE);
		$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();?>	

            <!-- Sub Title-->
            <div class="custom-box">
                <label class="right"><?php _e('Sub Title',IAMD_TEXT_DOMAIN);?></label>
                <?php $v = array_key_exists("sub-title",$portfolio_settings) ?  $portfolio_settings['sub-title'] : '';?>
                <input id="sub-title" name="_sub-title" type="text" class="large" value="<?php echo $v;?>" />
                <?php mytheme_adminpanel_tooltip(__("You can add sbu title",IAMD_TEXT_DOMAIN));?>
            </div><!-- Sub Title End-->
            
            <div class="custom-box">
                <label class="right"><?php _e('Show Social Share',IAMD_TEXT_DOMAIN);?></label>
                <?php $switchclass = array_key_exists("show-social-share",$portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                      $checked = array_key_exists("show-social-share",$portfolio_settings) ? ' checked="checked"' : '';?>
                <div data-for="mytheme-social-share" class="checkbox-switch <?php echo $switchclass;?>"></div>
                <input id="mytheme-social-share" class="hidden" type="checkbox" name="mytheme-social-share" value="true"  <?php echo $checked;?>/>
                <?php mytheme_adminpanel_tooltip(__('Would you like to show the social share at the bottom',IAMD_TEXT_DOMAIN));?>
            </div>
        	
<?php        
	}
	
	function portfolio_meta_settings($args){
		global $post;
		$portfolio_settings = get_post_meta($post->ID,'_portfolio_settings',TRUE);
		$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();?>
        
        <div class="custom-box">
        	<label class="right"><?php _e('Client Name',IAMD_TEXT_DOMAIN);?></label>
            <?php $v = array_key_exists("client",$portfolio_settings) ?  $portfolio_settings['client'] : '';?>
            <input id="client" name="_client" class="large" type="text" value="<?php echo $v;?>" />
            <?php mytheme_adminpanel_tooltip(__("You can given your client name",IAMD_TEXT_DOMAIN));?>
        </div>

        <div class="custom-box">
        	<label class="right"><?php _e('Project Url',IAMD_TEXT_DOMAIN);?></label>
            <?php $v = array_key_exists("url",$portfolio_settings) ?  $portfolio_settings['url'] : '';?>
            <input id="url" name="_url" class="large" type="text" value="<?php echo $v;?>" />
            <?php mytheme_adminpanel_tooltip(__("You can given your client's project url",IAMD_TEXT_DOMAIN));?>
        </div>
<?php
		wp_reset_postdata();
 	}
	
	function portfolio_featured_video_settings($args){ 
		global $post;
		$portfolio_settings = get_post_meta($post->ID,'_portfolio_settings',TRUE);
		$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();?>
        
        <div class="custom-box">
            <label><?php _e('Video Url',IAMD_TEXT_DOMAIN);?> </label>
            <?php $v = array_key_exists("video_url",$portfolio_settings) ?  $portfolio_settings['video_url'] : '';?>
            <input name="_video_url" type="text" class="large"  value="<?php echo $v;?>" />
            <br/>
            <p><strong><?php _e('Working examples:',IAMD_TEXT_DOMAIN);?></strong></p>
            <p>http://vimeo.com/18439821</p>
			<p>http://www.youtube.com/watch?v=G0k3kHtyoqc</p>
            <?php mytheme_adminpanel_tooltip(__('Enter the URL to the Video url',IAMD_TEXT_DOMAIN));?>
        </div>
<?php
		wp_reset_postdata();
    }
	
	function portfolio_media_container($args){ 
		global $post;
		$portfolio_settings = get_post_meta($post->ID,'_portfolio_settings',TRUE);
		$portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array(); 
		
		$args = array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'posts_per_page' => 15 );
		$media_query = new WP_Query($args);?>
    	<div class="custom-box">

            <!-- Used Image -->
            <h3><?php _e("Used Images / Videos",IAMD_TEXT_DOMAIN);?></h3>
            
            <span id="clone_me" class="hidden">
               <li><img src="<?php echo IAMD_FW_URL.'theme_options/images/video-slider.jpg';?>" /> <span class="my_delete">x</span></li>
               
            </span>	
            <p id="j-no-images-container"><?php _e('Please, add some image',IAMD_TEXT_DOMAIN); ?></p>
            <ul id="j-used-sliders-containers">
            <?php if(array_key_exists("items",$portfolio_settings)): 
				 	foreach($portfolio_settings['items'] as $item): 
						 if( is_numeric($item) ):
						 	 $image = wp_get_attachment_image($item);?>
                             	<li data-attachment-id="<?php echo(esc_attr($item));?>">
                            		<?php echo($image); ?>
	                               	<span class="my_delete">x</span>
    	                           	<input type="hidden" value="<?php echo(esc_attr($item));?>" name="sliders[]" />
	    	                    </li>                              
				   <?php else:
				   				$img = "<img width='150' height='150' src='".IAMD_FW_URL."theme_options/images/video-slider.jpg' title='{$item}' />";
								echo "<li>";
								echo  $img;
								echo "<span class='my_delete'>x</span>";
								echo "<input type='hidden' value='{$item}' name='sliders[]' />";
								echo "</li>";
						 endif;
                	endforeach;
                endif;?>
            </ul><!-- Used Sliders End -->
        
            <!-- Available Images -->
            <span id="add-video" data-post-id="<?php echo $post->ID;?>"><?php _e('Add Videos',IAMD_TEXT_DOMAIN);?></span>
            <div class="clear"> </div>
            <h3 class="slider-info"><?php _e("Available Images",IAMD_TEXT_DOMAIN);?></h3>
            <ul id="j-available-sliders">
            <?php foreach ($media_query->posts as $attachment):
                    @$added_class = (  in_array( $attachment->ID, $portfolio_settings['items'] ,false ) ) ? ' class="my_added"' : ''; ?>
                        <li <?php echo($added_class);?> data-attachment-id="<?php echo(esc_attr($attachment->ID));?>">
                            <?php echo(wp_get_attachment_image( $attachment->ID));?>
                            <span class="my_delete">x</span>
                        </li>                    
            <?php endforeach;?>	
            </ul><!-- Available Images  End-->

            <!-- Pagination -->
            <?php if ( $media_query->max_num_pages > 1 ): ?>
                    <div id="j-slider-pagination" class="admin-pagination j-for-portfolio">
                      <?php  for ( $i=1; $i <= $media_query->max_num_pages; $i++ ): ?>
                        <a href="#" <?php echo( 1 == $i ? ' class="active_page"' : '' ) ?>><?php echo($i);?></a>
                      <?php endfor;?>
                    </div>
            <?php endif; ?>	
            
        </div>
<?php
		wp_reset_postdata();    
	}
	
	function portfolio_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id; 
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
		
		$settings = array();
		$settings['video_url']		=	$_POST['_video_url'];
		$settings['url']  			= 	$_POST['_url'];
		$settings['client']  		= 	$_POST['_client'];
		$settings['sub-title'] 		= 	$_POST['_sub-title'];
		$settings['items']  		= 	$_POST['sliders'];
		$settings['show-social-share'] = $_POST['mytheme-social-share'];
		
		update_post_meta($post_id, "_portfolio_settings", array_filter($settings));
	}?>