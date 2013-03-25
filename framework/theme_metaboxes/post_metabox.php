<?php add_action("admin_init", "post_metabox");?>
<?php function post_metabox(){
			add_meta_box("post-template-meta-container", __('Post Options',IAMD_TEXT_DOMAIN), "post_settings", "post", "normal", "high");
			add_action('save_post','post_meta_save');
	} 
	
	function post_settings($args){ 
		global $post; 
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>

        <!-- Sub Title-->
        <div class="custom-box">
            <label class="right"><?php _e('Sub Title',IAMD_TEXT_DOMAIN);?></label>
            <?php $v = array_key_exists("sub-title",$tpl_default_settings) ?  $tpl_default_settings['sub-title'] : '';?>
            <input id="sub-title" name="sub-title" class="large" type="text" value="<?php echo $v;?>" />
            <?php mytheme_adminpanel_tooltip(__("You can add sub title",IAMD_TEXT_DOMAIN));?>
        </div><!-- Sub Title End-->
        
        <!-- Layout Start -->
        <div class="custom-box">
            <label class="right"><?php _e('Layout',IAMD_TEXT_DOMAIN);?> </label>
            <ul class="bpanel-layout-set">
	            <?php $homepage_layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>	'right-sidebar');
					$v =  array_key_exists("layout",$tpl_default_settings) ?  $tpl_default_settings['layout'] : 'content-full-width';
    		        foreach($homepage_layout as $key => $value):
            			$class = ($key == $v) ? " class='selected' " : "";
            			echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
            		endforeach;?>
            </ul>
            <?php $v = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : 'content-full-width';?>
            <input id="mytheme-post-layout" name="layout" type="hidden"  value="<?php echo $v;?>"/>
            <?php mytheme_adminpanel_tooltip(__("You can choose between a left, right, or no sidebar layout for the page.",IAMD_TEXT_DOMAIN));?>
        </div><!-- Layout End-->
        
        <!-- Comment Section Start -->
        <div class="custom-box">
            <label class="right"><?php _e('Disable Comments',IAMD_TEXT_DOMAIN);?></label>
            <?php $switchclass = array_key_exists("disable-comment",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				  $checked = array_key_exists("disable-comment",$tpl_default_settings) ? ' checked="checked"' : '';?>
			<div data-for="mytheme-post-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
            <input id="mytheme-post-comment" class="hidden" type="checkbox" name="post-comment" value="true"  <?php echo $checked;?>/>
            <?php mytheme_adminpanel_tooltip(__('Disable Comments for this particular post.',IAMD_TEXT_DOMAIN));?>
        </div><!-- Comment Section End-->

        <!-- Every Where Sidebar Start -->
        <div class="custom-box">
            <label class="right"><?php _e('Disable Every Where Sidebar',IAMD_TEXT_DOMAIN);?></label>
            <?php $switchclass = array_key_exists("disable-everywhere-sidebar",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
				  $checked = array_key_exists("disable-everywhere-sidebar",$tpl_default_settings) ? ' checked="checked"' : '';?>
			<div data-for="mytheme-disable-everywhere-sidebar" class="checkbox-switch <?php echo $switchclass;?>"></div>
            <input id="mytheme-disable-everywhere-sidebar" class="hidden" type="checkbox" name="disable-everywhere-sidebar" value="true"  <?php echo $checked;?>/>
            <?php mytheme_adminpanel_tooltip(__('Disable Every Where Sidebar for this particular post.',IAMD_TEXT_DOMAIN));?>
        </div><!-- Comment Section End-->

        <!-- Post Meta-->
        <div class="custom-box">
            <h3><?php _e('Post Meta Options',IAMD_TEXT_DOMAIN);?></h3>
            <?php $post_meta = array(array(
                    "id"=>		"disable-author-info",
                    "label"=>	__("Disable the Author info.",IAMD_TEXT_DOMAIN),
                    "tooltip"=>	__("By default the author info will display when viewing your posts.<br><br>You can choose to disable it here.",IAMD_TEXT_DOMAIN)
                ), array(
                    "id"=>		"disable-date-info",
                    "label"=>	__("Disable the date info.",IAMD_TEXT_DOMAIN),
                    "tooltip"=>	__("By default the date info will display when viewing your posts.<br><br>You can choose to disable it here.",IAMD_TEXT_DOMAIN)
                ),
                array(
                    "id"=>		"disable-comment-info",
                    "label"=>	__("Disable the comment info.",IAMD_TEXT_DOMAIN),
                    "tooltip"=>	__("By default the comment info will display when viewing your posts.<br><br>You can choose to disable it here.",IAMD_TEXT_DOMAIN)
                ),
                array(
                    "id"=>		"disable-category-info",
                    "label"=>	__("Disable the category info.",IAMD_TEXT_DOMAIN),
                    "tooltip"=>	__("By default the category info will display when viewing your posts.<br><br>You can choose to disable it here.",IAMD_TEXT_DOMAIN)
                ),
                array(
                    "id"=>		"disable-tag-info",
                    "label"=>	__("Disable the tag info.",IAMD_TEXT_DOMAIN),
                    "tooltip"=>	__("By default the tag info will display when viewing your posts.<br><br>You can choose to disable it here.",IAMD_TEXT_DOMAIN)
                ));
            $count = 1;
            foreach($post_meta as $p_meta):
                $last = ($count%3 == 0)?"last":'';
                $id = 		$p_meta['id'];
                $label =	$p_meta['label'];
                $tooltip =  $p_meta['tooltip'];
                $v =  array_key_exists($id,$tpl_default_settings) ?  $tpl_default_settings[$id] : '';
                $rs =		checked($id,$v,false);
                $switchclass = ($v<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
                
                echo "<div class='one-third-content {$last}'>";
                echo '<div class="bpanel-option-set">';
                echo "<label>{$label}</label>";							
                echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
                echo "<input class='hidden' id='{$id}' type='checkbox' name='{$id}' value='{$id}' {$rs} />";
                mytheme_adminpanel_tooltip($tooltip);
                echo '</div>';
                echo '</div>';
                
            $count++;	
            endforeach;?>
        </div><!-- Post Meta End-->


<!-- CUSTOM DESIGN -->
                <!-- Patterns -->
                <div class="custom-box">
                    <label class="right"><?php _e('Apply Pattern',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("apply-pattern",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("apply-pattern",$tpl_default_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-portfolio-apply-pattern" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-portfolio-apply-pattern" class="hidden" type="checkbox" name="mytheme[portfolio][apply-pattern]" value="true"  <?php echo $checked;?>/>
                    
                    <div class="hr_invisible"></div>
                    <div class="clear"></div>
                    
                    <label class="right"><?php _e('Available Patterns',IAMD_TEXT_DOMAIN);?></label>
                    <ul class="bpanel-layout-set">
                    <?php $pattrens  = mytheme_listImage(IAMD_FW."theme_options/images/pattern/");
                            foreach($pattrens as $key => $value):
                            $class = ( $key ==  $tpl_default_settings['pattern'] ) ? " class='selected' " : "";
                            echo "<li>";
                            echo "<a href='#' rel='{$key}' title='{$value}' {$class}>
								  <img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/$key' /></a>";
                            echo "</li>";
                            endforeach;?>
                     </ul>
                    <input id="mytheme-portfolio-pattern" name="mytheme[portfolio][pattern]" type="hidden" value="<?php echo $tpl_default_settings['pattern'];?>"/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Pattern in Single page template',IAMD_TEXT_DOMAIN));?>
                </div><!-- Patterns End-->

                <!-- BG TYPE STARTS HERE -->
                <div class="custom-box">
                
                	<div class="bpanel-option-set">
                	<label class="right"><?php _e("Background Type",IAMD_TEXT_DOMAIN);?></label>
                    <?php $args = array(""=>__("Select",IAMD_TEXT_DOMAIN),"bg-patterns"=>__("Pattern",IAMD_TEXT_DOMAIN),"bg-custom"=>__("Custom Background",IAMD_TEXT_DOMAIN)
										,"bg-none"=>__("None",IAMD_TEXT_DOMAIN));?>
                   	<select name="mytheme[portfolio][page-bg-type]" class="bg-type">
                    <?php foreach($args as $k => $v):
							$rs = selected($k,$tpl_default_settings['page-bg-type'],false);
							echo "<option value='{$k}' {$rs}>{$v}</option>";
						  endforeach;?>
                    </select>
                    </div>
                    
                    <div class='clear'></div>
                    
                   <?php $bg_pattern = ( $tpl_default_settings['page-bg-type'] == "bg-patterns" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                   <?php $bg_custom  = ( $tpl_default_settings['page-bg-type'] == "bg-custom" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                   
					<!-- In-built BG Patterns starts-->
                    <div class="bg-pattern" <?php echo $bg_pattern;?>>
                    
                    	<label class="right"><?php _e('Available BG Patterns',IAMD_TEXT_DOMAIN);?></label>
                        <ul class="bpanel-layout-set">
                        <?php $pattrens = mytheme_listImage(IAMD_FW."theme_options/images/pattern/bg-patterns/"); 	
                              foreach($pattrens as $key => $value):
                                $class = ( $key ==  $tpl_default_settings['page-bg-pattern'] ) ? " class='selected' " : "";
                                echo "<li>";
                                echo "<a href='#' rel='{$key}' title='{$value}' {$class}>
										<img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/bg-patterns/$key' /></a>";
                                echo "</li>";
                             endforeach;?>
                         </ul>
                        <input id="mytheme-bg-pattern" name="mytheme[portfolio][page-bg-pattern]" type="hidden" value="<?php echo $tpl_default_settings['page-bg-pattern'];?>"/>
                        <?php mytheme_adminpanel_tooltip(__('Choose background pattern, you can add patterns by placing images in the folder ',IAMD_TEXT_DOMAIN)
                            .'<b>framework/theme_options/images/pattern/bg-patterns/</b>');?>
                       
                        <div class="one-half-content">
                        	<div class="bpanel-option-set">
                                <!-- Pattern Repeat -->
                                <label><?php _e('BG Pattern repeat',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme[portfolio][page-bg-pattern-repeat]">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo $option;?>"
                                            <?php selected($option,$tpl_default_settings['page-bg-pattern-repeat']); ?>><?php echo $option;?></option>
                                    <?php endforeach;?>
                                </select><!-- Pattern Repeat End -->
                                
                                <!-- Opacity Slider -->
								<?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme[portfolio][page-bg-pattern-opacity]",
                                                                        $tpl_default_settings['page-bg-pattern-opacity'],"");?><!-- Opacity Slider End -->  
                                
                                <?php mytheme_adminpanel_tooltip(__("Select how you would like to repeat the pattern image",IAMD_TEXT_DOMAIN));?>                              
                            </div>
                          </div>
                          
                        <div class="one-half-content last">
                          	<div class="bpanel-option-set">
                           		<?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme[portfolio][disable-page-bg-pattern-color]',
                                                $tpl_default_settings['disable-page-bg-pattern-color'],'portfolio-disable-page-bg-pattern-color');?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme[portfolio][page-bg-pattern-color]";
								  	  $value =  	($tpl_default_settings['page-bg-pattern-color'] != NULL) ? $tpl_default_settings['page-bg-pattern-color'] :"";
								  	  $tooltip = 	__("Pick a custom color for background color of the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
									  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>
                            </div>
                        </div>
                        
                    </div><!-- In-built BG Patterns ends-->

                    <!-- Upload custom BG option Starts -->
                    <div class="bg-custom" <?php echo $bg_custom;?>>

						<div class="one-half-content">
                            <div class="bpanel-option-set">
                            	<!-- UPLOADING BG -->
                                <label><?php _e("Custom BG image",IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <div class="image-preview-container">
                                    <input id="mytheme-custom-bg" name="mytheme[portfolio][page-custom-bg]" type="text" class="uploadfield" readonly="readonly" 
                                               value="<?php echo $tpl_default_settings['page-custom-bg'];?>" />
                                    <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                                    <?php mytheme_adminpanel_image_preview($tpl_default_settings['page-custom-bg']);?>
                                </div><!-- UPLOADING BG End -->    
    
                                <div class="hr_invisible"></div>
                                <div class="clear"></div>
                                
                                <!-- Pattern Repeat -->
                                <label><?php _e('BG Pattern repeat',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme[portfolio][page-custom-bg-repeat]">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo $option;?>"
                                            <?php selected($option,$tpl_default_settings['page-custom-bg-repeat']); ?>><?php echo $option;?></option>
                                    <?php endforeach;?>
                                </select><!-- Pattern Repeat End -->
                                
                                <div class="hr_invisible"></div>
                                <div class="clear"></div>
                                
                                <!-- BG Image Position -->
                                <label><?php _e('BG Pattern Position',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme[portfolio][page-custom-bg-position]">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $arg = array("top left","top center","top right","center left","center center","center right","bottom left"
														,"bottom center","bottom right");
									foreach($arg as $option): ?>
                                    	<option value="<?php echo $option;?>"
                                        <?php selected($option,$tpl_default_settings['page-custom-bg-position']); ?>><?php echo $option;?></option>
                              <?php endforeach;?>
                                </select><!-- BG Image Position -->
                                
                            </div>
                        </div><!-- one-half-content end -->
                        
                        <div class="one-half-content last">
                        	<div class="bpanel-option-set">
                                <!-- Opacity Slider -->
                                <?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme[portfolio][page-custom-bg-opacity]",
								                         $tpl_default_settings['page-custom-bg-opacity'],"");?><!-- Opacity Slider End -->
                                <?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme[portfolio][disable-page-custom-bg-color]',
                                                    $tpl_default_settings['disable-page-custom-bg-color'],'disable-page-custom-bg-color');?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme[portfolio][page-custom-bg-color]";
								  	  $value =  	($tpl_default_settings['page-custom-bg-color'] != NULL) ? $tpl_default_settings['page-custom-bg-color'] :"";
								  	  #$tooltip = 	__("Pick a custom color for background color of the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
									  #mytheme_admin_color_picker($label,$name,$value,$tooltip);
									  mytheme_admin_color_picker($label,$name,$value);?>
                            </div><!-- .bpanel-option-set end -->
                        </div><!-- one-half-content end -->
                        
                    </div><!-- Upload custom BG option Ends-->
                    

                </div><!-- BG TYPE ENDS HERE -->                
<!-- CUSTOM DESSIGN END -->                                
        
        
<?php
		wp_reset_postdata();
    }
	
	function post_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 	return $post_id;
		
		$settings = array();
		$settings['sub-title'] = $_POST['sub-title'];
		$settings['layout'] = $_POST['layout'];
		$settings['disable-comment'] = $_POST['post-comment'];
		$settings['disable-everywhere-sidebar'] = $_POST['disable-everywhere-sidebar'];
		$settings['disable-author-info']	= $_POST['disable-author-info'];
		$settings['disable-date-info']	= $_POST['disable-date-info'];
		$settings['disable-comment-info']	= $_POST['disable-comment-info'];
		$settings['disable-category-info']	= $_POST['disable-category-info'];
		$settings['disable-tag-info']	= $_POST['disable-tag-info'];

		$settings['apply-pattern'] 	= $_POST['mytheme']['portfolio']['apply-pattern'];
		$settings['pattern'] 		= $_POST['mytheme']['portfolio']['pattern'];

		#BG Settings
		$settings['page-bg-type'] = $_POST['mytheme']['portfolio']['page-bg-type'];
		$settings['page-bg-pattern'] = $_POST['mytheme']['portfolio']['page-bg-pattern'];
		$settings['page-bg-pattern-repeat'] = $_POST['mytheme']['portfolio']['page-bg-pattern-repeat'];
		$settings['page-bg-pattern-opacity'] = $_POST['mytheme']['portfolio']['page-bg-pattern-opacity'];
		$settings['disable-page-bg-pattern-color'] = $_POST['mytheme']['portfolio']['disable-page-bg-pattern-color'];
		$settings['page-bg-pattern-color'] = $_POST['mytheme']['portfolio']['page-bg-pattern-color'];
		
		$settings['page-custom-bg'] = $_POST['mytheme']['portfolio']['page-custom-bg'];
		$settings['page-custom-bg-repeat'] = $_POST['mytheme']['portfolio']['page-custom-bg-repeat'];
		$settings['page-custom-bg-position'] = $_POST['mytheme']['portfolio']['page-custom-bg-position'];
		$settings['page-custom-bg-opacity'] = $_POST['mytheme']['portfolio']['page-custom-bg-opacity'];
		$settings['disable-page-custom-bg-color']  = $_POST['mytheme']['portfolio']['disable-page-custom-bg-color'];
		$settings['page-custom-bg-color'] = $_POST['mytheme']['portfolio']['page-custom-bg-color'];
		#BG Settings End
		
		update_post_meta($post_id, "_tpl_default_settings", array_filter($settings));
	}?>