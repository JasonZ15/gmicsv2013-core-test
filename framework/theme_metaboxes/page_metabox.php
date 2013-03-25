<?php add_action("admin_init", "page_metabox");?>
<?php function page_metabox(){
			add_meta_box("page-template-meta-container", __('Default page Options',IAMD_TEXT_DOMAIN), "page_settings", "page", "normal", "high");
			#add_meta_box("page-template-slider-meta-container", __('Slider Options',IAMD_TEXT_DOMAIN), "page_sllider_settings", "page", "normal", "high");
			add_action('save_post','page_meta_save');
	} 
	
	function page_settings($args){ 
		global $post; 
		
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
		
		$tpl_blog_settings = get_post_meta($post->ID,'_tpl_blog_settings',TRUE);
		$tpl_blog_settings = is_array($tpl_blog_settings) ? $tpl_blog_settings  : array();

		$tpl_portfolio_settings = get_post_meta($post->ID,'_tpl_portfolio_settings',TRUE);
		$tpl_portfolio_settings = is_array($tpl_portfolio_settings) ? $tpl_portfolio_settings  : array();?>
        <div class="j-pagetemplate-container"> 
               
        	<!-- Default Template Settings -->
        	<div id="default-template">
            
                <!-- Sub Title-->
                <div class="custom-box">
                    <label class="right"><?php _e('Sub Title',IAMD_TEXT_DOMAIN);?></label>
                    <?php $v = array_key_exists("sub-title",$tpl_default_settings) ?  $tpl_default_settings['sub-title'] : '';?>
                    <input id="sub-title" name="sub-title" class="large" type="text" value="<?php echo $v;?>" />
                    <?php mytheme_adminpanel_tooltip(__("You can add sbu title",IAMD_TEXT_DOMAIN));?>
                </div><!-- Sub Title End-->

            
                <div class="custom-box">
                    <label class="right"><?php _e('Layout',IAMD_TEXT_DOMAIN);?> </label>
                    <ul class="bpanel-layout-set">
                        <?php $homepage_layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
                            $v =  array_key_exists("layout",$tpl_default_settings) ?  $tpl_default_settings['layout'] : 'content-full-width';
                            foreach($homepage_layout as $key => $value):
                                $class = ($key == $v) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                            endforeach;?>
                    </ul>
                    <?php $v = array_key_exists("layout",$tpl_default_settings) ? $tpl_default_settings['layout'] : 'content-full-width';?>
                    <input id="mytheme-page-layout" name="layout" type="hidden"  value="<?php echo $v;?>"/>
                    <?php mytheme_adminpanel_tooltip(__("You can choose between a left, right, or no sidebar layout for the page.",IAMD_TEXT_DOMAIN));?>
                </div>
                
                <div class="custom-box">
                    <label class="right"><?php _e('Allow Comments',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("comment",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("comment",$tpl_default_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-page-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-page-comment" class="hidden" type="checkbox" name="mytheme-page-comment" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Allow Comments for this particular page.',IAMD_TEXT_DOMAIN));?>
                </div>

                <div class="custom-box">
                    <label class="right"><?php _e('Apply Dark Background',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("dark-bg",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("dark-bg",$tpl_default_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-page-dark-bg" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-page-dark-bg" class="hidden" type="checkbox" name="mytheme-page-dark-bg" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Dark Background in Single page template',IAMD_TEXT_DOMAIN));?>
                </div>

                <div class="custom-box">
                    <label class="right"><?php _e('Apply Pattern',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("apply-pattern",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("apply-pattern",$tpl_default_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-page-apply-pattern" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-page-apply-pattern" class="hidden" type="checkbox" name="mytheme-page-apply-pattern" value="true"  <?php echo $checked;?>/>
                    
                    <div class="hr_invisible"></div>
                    <div class="clear"></div>
                    
                    <label class="right"><?php _e('Available Patterns',IAMD_TEXT_DOMAIN);?></label>
                    <ul class="bpanel-layout-set">
                    <?php $pattrens  = mytheme_listImage(IAMD_FW."theme_options/images/pattern/");
                            foreach($pattrens as $key => $value):
                            $class = ( $key ==  $tpl_default_settings['pattern'] ) ? " class='selected' " : "";
                            echo "<li>";
                            echo "<a href='#' rel='{$key}' {$class} title='{$value}'><img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/$key'/></a>";
                            echo "</li>";
                            endforeach;?>
                     </ul>
                    <input id="mytheme-pattern" name="mytheme-pattern" type="hidden" value="<?php echo $tpl_default_settings['pattern'];?>"/>
                    
                    <?php mytheme_adminpanel_tooltip(__('Apply Pattern in Single page template',IAMD_TEXT_DOMAIN));?>
                </div>
                

                <div class="custom-box">
                    <label class="right"><?php _e('Apply Bottom shadow',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("bottm-shadow",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("bottm-shadow",$tpl_default_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-page-bottm-shadow" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-page-bottm-shadow" class="hidden" type="checkbox" name="mytheme-page-bottm-shadow" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Bottom shadow in Single page template',IAMD_TEXT_DOMAIN));?>
                </div>
                
                <!-- Font Settings-->
                <div class="custom-box">
	                <label class="right"><?php _e('Apply Font Settings',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("font-settings",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("font-settings",$tpl_default_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-page-font-settings" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-page-font-settings" class="hidden" type="checkbox" name="mytheme-page-font-settings" value="true"  <?php echo $checked;?>/>
                    
                    <div class="hr_invisible"></div>
                    <div class="clear"></div>

                    <div class="one-half-content">
                    <?php $label = 		__("Title Font Color",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme-page-title-color";
						  $value =  	($tpl_default_settings['page-title-color'] != NULL) ? $tpl_default_settings['page-title-color'] :"";
						  $tooltip = 	__("Pick a custom font color for title tag for the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
						 mytheme_admin_color_picker($label,$name,$value,$tooltip);?>
                    </div>
                    
                    <div class="one-half-content last">
                    <?php $label = 		__("Body Font Color",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme-page-font-color";
						  $value =  	($tpl_default_settings['page-font-color'] != NULL) ? $tpl_default_settings['page-font-color'] :"";
						  $tooltip = 	__("Pick a custom font color for the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
						 mytheme_admin_color_picker($label,$name,$value,$tooltip);?>
                    </div>

                    <div class="hr_invisible"></div>
                    <div class="clear"></div>
                    
                    <div class="one-half-content">
                    <?php $label = 		__("Primary Color",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme-page-primary-color";	
						  $value =  	($tpl_default_settings['page-primary-color'] != NULL) ? $tpl_default_settings['page-primary-color'] :"";						  
						  $tooltip = 	__("Pick a custom primary color for links and buttons in body/content are of the theme e.g. #551256",IAMD_TEXT_DOMAIN);
						  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                    <div class="one-half-content last">
                    <?php $label = 		__("Secondary Color",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme-page-secondary-color";	
						  $value =  	($tpl_default_settings['page-secondary-color'] != NULL) ? $tpl_default_settings['page-secondary-color'] :"";						  
						  $tooltip = 	__("Pick a custom secondary color for links and buttons hover state in body/content are of the theme e.g. #564912",IAMD_TEXT_DOMAIN);
						  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>
                    
                </div><!-- Font Settings End-->
                
                <!-- BG TYPE STARTS HERE -->
                <div class="custom-box">
                
                	<div class="bpanel-option-set">
                	<label class="right"><?php _e("Background Type",IAMD_TEXT_DOMAIN);?></label>
                    <?php $args = array("bg-patterns"=>__("Pattern",IAMD_TEXT_DOMAIN),"bg-custom"=>__("Custom Background",IAMD_TEXT_DOMAIN)
										,"bg-none"=>__("None",IAMD_TEXT_DOMAIN));?>
                   	<select name="page-bg-type" class="bg-type">
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
                        <input id="mytheme-bg-pattern" name="mytheme-bg-pattern" type="hidden" value="<?php echo $tpl_default_settings['page-bg-pattern'];?>"/>
                        <?php mytheme_adminpanel_tooltip(__('Choose background pattern, you can add patterns by placing images in the folder ',IAMD_TEXT_DOMAIN)
                            .'<b>framework/theme_options/images/pattern/bg-patterns/</b>');?>
                       
                        <div class="one-half-content">
                        	<div class="bpanel-option-set">
                                <!-- Pattern Repeat -->
                                <label><?php _e('BG Pattern repeat',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme-page-bg-pattern-repeat">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo $option;?>"
                                            <?php selected($option,$tpl_default_settings['page-bg-pattern-repeat']); ?>><?php echo $option;?></option>
                                    <?php endforeach;?>
                                </select><!-- Pattern Repeat End -->
                                
                                <!-- Opacity Slider -->
								<?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme-page-bg-pattern-opacity",
                                                                        $tpl_default_settings['page-bg-pattern-opacity'],"");?><!-- Opacity Slider End -->  
                                
                                <?php mytheme_adminpanel_tooltip(__("Select how you would like to repeat the pattern image",IAMD_TEXT_DOMAIN));?>                              
                            </div>
                          </div>
                          
                          <div class="one-half-content last">
                          	<div class="bpanel-option-set">
                           		<?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme-disable-page-bg-pattern-color',
                                                $tpl_default_settings['disable-page-bg-pattern-color']);?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme-page-bg-pattern-color";
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
                                    <input id="mytheme-custom-bg" name="mytheme-page-custom-bg" type="text" class="uploadfield" readonly="readonly" 
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
                                <select name="mytheme-page-custom-bg-repeat">
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
                                <select name="mytheme-page-custom-bg-position">
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
                                <?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme-page-custom-bg-opacity",
                                                                    $tpl_default_settings['page-custom-bg-opacity'],"");?><!-- Opacity Slider End -->
                                <?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme-disable-page-custom-bg-color',
                                                    $tpl_default_settings['disable-page-custom-bg-color']);?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme-page-custom-bg-color";
								  	  $value =  	($tpl_default_settings['page-custom-bg-color'] != NULL) ? $tpl_default_settings['page-custom-bg-color'] :"";
								  	  #$tooltip = 	__("Pick a custom color for background color of the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
									  #mytheme_admin_color_picker($label,$name,$value,$tooltip);
									  mytheme_admin_color_picker($label,$name,$value);?>
                            </div><!-- .bpanel-option-set end -->
                        </div><!-- one-half-content end -->
                        
                        
                        
                    
                    </div><!-- Upload custom BG option Ends-->
                    

                </div> <!-- BG TYPE ENDS HERE -->
                
            </div><!-- Default Template Settings End-->
            
            <!-- Blog Template Settings-->
            <div id="tpl-blog">

                <!-- Sub Title-->
                <div class="custom-box">
                    <label class="right"><?php _e('Sub Title',IAMD_TEXT_DOMAIN);?></label>
                    <?php $v = array_key_exists("sub-title",$tpl_blog_settings) ?  $tpl_blog_settings['sub-title'] : '';?>
                    <input id="mytheme-sub-title" class="large" name="mytheme[blog][sub-title]" type="text" value="<?php echo $v;?>" />
                    <?php mytheme_adminpanel_tooltip(__("You can add sbu title",IAMD_TEXT_DOMAIN));?>
                </div><!-- Sub Title End-->
            
            	<!-- Layout -->
<?php /* ?>                
                <div class="custom-box">
                    <label class="right"><?php _e('Layout',IAMD_TEXT_DOMAIN);?> </label>
                    <ul class="bpanel-layout-set">
                        <?php $homepage_layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
                            $v =  array_key_exists("page-layout",$tpl_blog_settings) ?  $tpl_blog_settings['page-layout'] : 'content-full-width';
                            foreach($homepage_layout as $key => $value):
                                $class = ($key == $v) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                            endforeach;?>
                    </ul>
                    <input id="mytheme-page-layout" name="mytheme[blog][page-layout]" type="hidden"  value="<?php echo $v;?>"/>
                    <?php mytheme_adminpanel_tooltip(__("You can choose between a left, right, or no sidebar layout for your blogpage.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Layout End-->
                
                <!-- Posts Layout-->
                <div class="custom-box">
	                <label class="right"><?php _e('Posts Layout',IAMD_TEXT_DOMAIN);?> </label>
                    <ul class="bpanel-layout-set">
                    <?php $posts_layout = array('one-column'=>	__("Single post per row.",IAMD_TEXT_DOMAIN),
										'one-half-column'=>	__("Two posts per row.",IAMD_TEXT_DOMAIN)
										,'one-third-column'=>	__("Three posts per row.",IAMD_TEXT_DOMAIN));
							$v = array_key_exists("post-layout",$tpl_blog_settings) ?  $tpl_blog_settings['post-layout'] : 'one-column';
                          	foreach($posts_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                           	endforeach;?>
                    </ul>
                    <input id="mytheme-post-layout" name="mytheme[blog][post-layout]" type="hidden" value="<?php echo $v;?>"/>
                    <?php mytheme_adminpanel_tooltip(__("Your blog posts will use the layout you select here.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Posts Layout End-->
<?php */ ?>				
                
                <div class="custom-box">
                    <label class="right"><?php _e('Apply Dark Background',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("dark-bg",$tpl_blog_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("dark-bg",$tpl_blog_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-blog-dark-bg" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-blog-dark-bg" class="hidden" type="checkbox" name="mytheme[blog][dark-bg]" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Dark Background in Single page template',IAMD_TEXT_DOMAIN));?>
                </div>

                <div class="custom-box">
                    <label class="right"><?php _e('Apply Pattern',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("apply-pattern",$tpl_blog_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("apply-pattern",$tpl_blog_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-blog-apply-pattern" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-blog-apply-pattern" class="hidden" type="checkbox" name="mytheme[blog][apply-pattern]" value="true"  <?php echo $checked;?>/>
                    
                    <div class="hr_invisible"></div>
                    <div class="clear"></div>
                    
                    <label class="right"><?php _e('Available Patterns',IAMD_TEXT_DOMAIN);?></label>
                    <ul class="bpanel-layout-set">
                    <?php $pattrens  = mytheme_listImage(IAMD_FW."theme_options/images/pattern/");
                            foreach($pattrens as $key => $value):
                            $class = ( $key ==  $tpl_blog_settings['pattern'] ) ? " class='selected' " : "";
                            echo "<li>";
                            echo "<a href='#' rel='{$key}' title='{$value}' {$class}>
								  <img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/$key' /></a>";
                            echo "</li>";
                            endforeach;?>
                     </ul>
                    <input id="mytheme-blog-pattern" name="mytheme[blog][pattern]" type="hidden" value="<?php echo $tpl_blog_settings['pattern'];?>"/>
                    
                    <?php mytheme_adminpanel_tooltip(__('Apply Pattern in Single page template',IAMD_TEXT_DOMAIN));?>
                </div>
                

                <div class="custom-box">
                    <label class="right"><?php _e('Apply Bottom shadow',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("bottm-shadow",$tpl_blog_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("bottm-shadow",$tpl_blog_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-blog-bottm-shadow" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-blog-bottm-shadow" class="hidden" type="checkbox" name="mytheme[blog][bottm-shadow]" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Bottom shadow in Single page template',IAMD_TEXT_DOMAIN));?>
                </div>

                <!-- BG TYPE STARTS HERE -->
                <div class="custom-box">
                
                	<div class="bpanel-option-set">
                	<label class="right"><?php _e("Background Type",IAMD_TEXT_DOMAIN);?></label>
                    <?php $args = array(""=>__("Select",IAMD_TEXT_DOMAIN),"bg-patterns"=>__("Pattern",IAMD_TEXT_DOMAIN),"bg-custom"=>__("Custom Background",IAMD_TEXT_DOMAIN)
										,"bg-none"=>__("None",IAMD_TEXT_DOMAIN));?>
                   	<select name="mytheme[blog][page-bg-type]" class="bg-type">
                    <?php foreach($args as $k => $v):
							$rs = selected($k,$tpl_blog_settings['page-bg-type'],false);
							echo "<option value='{$k}' {$rs}>{$v}</option>";
						  endforeach;?>
                    </select>
                    </div>
                    
                    <div class='clear'></div>
                    
                   <?php $bg_pattern = ( $tpl_blog_settings['page-bg-type'] == "bg-patterns" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                   <?php $bg_custom  = ( $tpl_blog_settings['page-bg-type'] == "bg-custom" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                   
					<!-- In-built BG Patterns starts-->
                    <div class="bg-pattern" <?php echo $bg_pattern;?>>
                    	<label class="right"><?php _e('Available BG Patterns',IAMD_TEXT_DOMAIN);?></label>
                        <ul class="bpanel-layout-set">
                        <?php $pattrens = mytheme_listImage(IAMD_FW."theme_options/images/pattern/bg-patterns/"); 	
                              foreach($pattrens as $key => $value):
                                $class = ( $key ==  $tpl_blog_settings['page-bg-pattern'] ) ? " class='selected' " : "";
                                echo "<li>";
                                echo "<a href='#' rel='{$key}' title='{$value}' {$class}>
										<img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/bg-patterns/$key' /></a>";
                                echo "</li>";
                             endforeach;?>
                         </ul>
                        <input id="mytheme-bg-pattern" name="mytheme[blog][page-bg-pattern]" type="hidden" value="<?php echo $tpl_blog_settings['page-bg-pattern'];?>"/>
                        <?php mytheme_adminpanel_tooltip(__('Choose background pattern, you can add patterns by placing images in the folder ',IAMD_TEXT_DOMAIN)
                            .'<b>framework/theme_options/images/pattern/bg-patterns/</b>');?>
                       
                        <div class="one-half-content">
                        	<div class="bpanel-option-set">
                                <!-- Pattern Repeat -->
                                <label><?php _e('BG Pattern repeat',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme[blog][page-bg-pattern-repeat]">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo $option;?>"
                                            <?php selected($option,$tpl_blog_settings['page-bg-pattern-repeat']); ?>><?php echo $option;?></option>
                                    <?php endforeach;?>
                                </select><!-- Pattern Repeat End -->
                                
                                <!-- Opacity Slider -->
								<?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme[blog][page-bg-pattern-opacity]",
                                                                        $tpl_blog_settings['page-bg-pattern-opacity'],"");?><!-- Opacity Slider End -->  
                                
                                <?php mytheme_adminpanel_tooltip(__("Select how you would like to repeat the pattern image",IAMD_TEXT_DOMAIN));?>                              
                            </div>
                          </div>
                          
                          <div class="one-half-content last">
                          	<div class="bpanel-option-set">
                           		<?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme[blog][disable-page-bg-pattern-color]',
                                                $tpl_blog_settings['disable-page-bg-pattern-color'],'blog-disable-page-bg-pattern-color');?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme[blog][page-bg-pattern-color]";
								  	  $value =  	($tpl_blog_settings['page-bg-pattern-color'] != NULL) ? $tpl_blog_settings['page-bg-pattern-color'] :"";
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
                                    <input id="mytheme-custom-bg" name="mytheme[blog][page-custom-bg]" type="text" class="uploadfield" readonly="readonly" 
                                               value="<?php echo $tpl_blog_settings['page-custom-bg'];?>" />
                                    <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                                    <?php mytheme_adminpanel_image_preview($tpl_blog_settings['page-custom-bg']);?>
                                </div><!-- UPLOADING BG End -->    
    
                                <div class="hr_invisible"></div>
                                <div class="clear"></div>
                                
                                <!-- Pattern Repeat -->
                                <label><?php _e('BG Pattern repeat',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme[blog][page-custom-bg-repeat]">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $options = array("repeat","repeat-x","repeat-y","no-repeat");
										foreach($options as $option):?>
                                        <option value="<?php echo $option;?>"
                                            <?php selected($option,$tpl_blog_settings['page-custom-bg-repeat']); ?>><?php echo $option;?></option>
                                    <?php endforeach;?>
                                </select><!-- Pattern Repeat End -->
                                
                                <div class="hr_invisible"></div>
                                <div class="clear"></div>
                                
                                <!-- BG Image Position -->
                                <label><?php _e('BG Pattern Position',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <select name="mytheme[blog][page-custom-bg-position]">
                                    <option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                    <?php $arg = array("top left","top center","top right","center left","center center","center right","bottom left"
														,"bottom center","bottom right");
									foreach($arg as $option): ?>
                                    	<option value="<?php echo $option;?>"
                                        <?php selected($option,$tpl_blog_settings['page-custom-bg-position']); ?>><?php echo $option;?></option>
                              <?php endforeach;?>
                                </select><!-- BG Image Position -->
                                
                            </div>
                        </div><!-- one-half-content end -->
                        
                        <div class="one-half-content last">
                        	<div class="bpanel-option-set">
                                <!-- Opacity Slider -->
                                <?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme[blog][page-custom-bg-opacity]",
								                         $tpl_blog_settings['page-custom-bg-opacity'],"");?><!-- Opacity Slider End -->
                                <?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme[blog][disable-page-custom-bg-color]',
                                                    $tpl_blog_settings['disable-page-custom-bg-color'],'disable-page-custom-bg-color');?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme[blog][page-custom-bg-color]";
								  	  $value =  	($tpl_blog_settings['page-custom-bg-color'] != NULL) ? $tpl_blog_settings['page-custom-bg-color'] :"";
								  	  #$tooltip = 	__("Pick a custom color for background color of the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
									  #mytheme_admin_color_picker($label,$name,$value,$tooltip);
									  mytheme_admin_color_picker($label,$name,$value);?>
                            </div><!-- .bpanel-option-set end -->
                        </div><!-- one-half-content end -->
                        
                    </div><!-- Upload custom BG option Ends-->
                    

                </div> <!-- BG TYPE ENDS HERE -->

                
                
                <!-- Post Count-->
                <div class="custom-box">
                    <label class="right"><?php _e('Post per page',IAMD_TEXT_DOMAIN);?></label>
                    <select name="mytheme[blog][post-per-page]">
                        <option value="-1"><?php _e("All",IAMD_TEXT_DOMAIN);?></option>
                        <?php $selected = 	array_key_exists("post-per-page",$tpl_blog_settings) ?  $tpl_blog_settings['post-per-page'] : ''; ?>
                        <?php for($i=1;$i<=30;$i++):
                            echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                            endfor;?>
                    </select>
                    <?php mytheme_adminpanel_tooltip(__("Your blog pages show at most selected number of posts per page.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Post Count End-->
                
                <!-- Excerpt Length-->
                <div class="custom-box">
                    <label class="right"><?php _e('Excerpt Length',IAMD_TEXT_DOMAIN);?></label>
                    <?php $v = array_key_exists("excerpt-length",$tpl_blog_settings) ?  $tpl_blog_settings['excerpt-length'] : '45';?>
                    <input id="mytheme-excerpt-length" name="mytheme[blog][excerpt-length]" type="text" value="<?php echo $v;?>" />
                    <?php mytheme_adminpanel_tooltip(__(" This is the number of content character want to appears for each blog post( numbers only).",IAMD_TEXT_DOMAIN));?>
                </div><!-- Excerpt Length End-->
                
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
							$v =  array_key_exists($id,$tpl_blog_settings) ?  $tpl_blog_settings[$id] : '';
							$rs =		checked($id,$v,false);
						 	$switchclass = ($v<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
							
							echo "<div class='one-third-content {$last}'>";
							echo '<div class="bpanel-option-set">';
							echo "<label>{$label}</label>";							
							echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
							echo "<input class='hidden' id='{$id}' type='checkbox' name='mytheme[blog][{$id}]' value='{$id}' {$rs} />";
							mytheme_adminpanel_tooltip($tooltip);
							echo '</div>';
							echo '</div>';
							
						$count++;	
						endforeach;?>
                </div><!-- Post Meta End-->
                
                <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Exclude Categories',IAMD_TEXT_DOMAIN);?></h3>
                    <?php if(array_key_exists("exclude-cats",$tpl_blog_settings)):
							 $exclude_cats = array_unique($tpl_blog_settings["exclude-cats"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
								echo  mytheme_categorylist("blog,exclude_cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
							echo  mytheme_categorylist("blog,exclude_cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <?php mytheme_adminpanel_tooltip(__("You can choose certain categories to exclude from your blog page.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Categories End-->
                
            </div><!-- Blog Template Settings End-->

            <!-- Portfolio Template Settings-->
            <div id="tpl-portfolio">
            
                <!-- Sub Title-->
                <div class="custom-box">
                    <label class="right"><?php _e('Sub Title',IAMD_TEXT_DOMAIN);?></label>
                    <?php $v = array_key_exists("sub-title",$tpl_portfolio_settings) ?  $tpl_portfolio_settings['sub-title'] : '';?>
                    <input class="large" id="portfolio-sub-title" name="mytheme[portfolio][sub-title]" type="text" value="<?php echo $v;?>" />
                    <?php mytheme_adminpanel_tooltip(__("You can add sbu title",IAMD_TEXT_DOMAIN));?>
                </div><!-- Sub Title End-->
                
                <!-- Page Layout-->
<?php /*                
                <div class="custom-box">
                    <label class="right"><?php _e('Layout',IAMD_TEXT_DOMAIN);?> </label>
                    <ul class="bpanel-layout-set">
                        <?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>'right-sidebar');
                            $v =  array_key_exists("page-layout",$tpl_portfolio_settings) ?  $tpl_portfolio_settings['page-layout'] : 'content-full-width';
                            foreach($layout as $key => $value):
                                $class = ($key == $v) ? " class='selected' " : "";
                                echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
                            endforeach;?>
                    </ul>
                    <?php $v = array_key_exists("page-layout",$tpl_portfolio_settings) ? $tpl_portfolio_settings['page-layout'] : 'content-full-width';?>
                    <input id="mytheme-portfolio-page-layout" name="mytheme[portfolio][page-layout]" type="hidden"  value="<?php echo $v;?>"/>
                    <?php mytheme_adminpanel_tooltip(__("You can choose between a left, right, or no sidebar layout for the page.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Page Layout-->
                
                <!-- Posts Layout-->
                <div class="custom-box">
	                <label class="right"><?php _e('Posts Layout',IAMD_TEXT_DOMAIN);?> </label>
                    <ul class="bpanel-layout-set">
                    <?php $posts_layout = array('one-column'=>	__("Single post per row.",IAMD_TEXT_DOMAIN),'one-half-column'=>	__("Two posts per row.",IAMD_TEXT_DOMAIN),
												'one-third-column'=>	__("Three posts per row.",IAMD_TEXT_DOMAIN), 'one-fourth-column'=>	__("Four posts per row.",IAMD_TEXT_DOMAIN));
							$v = array_key_exists("post-layout",$tpl_portfolio_settings) ?  $tpl_portfolio_settings['post-layout'] : 'one-column';
                          	foreach($posts_layout as $key => $value):
								$class = ($key == $v) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                           	endforeach;?>
                    </ul>
                    <input id="mytheme-portfolio-post-layout" name="mytheme[portfolio][post-layout]" type="hidden" value="<?php echo $v;?>"/>
                    <?php mytheme_adminpanel_tooltip(__("Your blog posts will use the layout you select here.",IAMD_TEXT_DOMAIN));?>
                </div>
<?php */ ?>				
                <input id="mytheme-portfolio-post-layout" name="mytheme[portfolio][post-layout]" type="hidden" value="one-fourth-column"/>
                <!-- Posts Layout End-->
                
                <!-- Allow Filter -->
                <div class="custom-box">
                    <label class="right"><?php _e('Allow Filters',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("filter",$tpl_portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("filter",$tpl_portfolio_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-portfolio-filter" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-portfolio-filter" class="hidden" type="checkbox" name="mytheme-portfolio-filter" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Allow portfolio items filter options',IAMD_TEXT_DOMAIN));?>
                </div><!-- Allow Filter End-->
                

                <!-- <div class="custom-box">
                    <label class="right"><?php _e('Show Excerpt',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("excerpt",$tpl_portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("excerpt",$tpl_portfolio_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-portfolio-excerpt" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-portfolio-excerpt" class="hidden" type="checkbox" name="mytheme-portfolio-excerpt" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Show portfolio items excerpt',IAMD_TEXT_DOMAIN));?>
                </div> -->

                <!-- Excerpt Length-->
                <!-- <div class="custom-box">
                    <label class="right"><?php _e('Excerpt Length',IAMD_TEXT_DOMAIN);?></label>
                    <?php $v = array_key_exists("excerpt-length",$tpl_portfolio_settings) ?  $tpl_portfolio_settings['excerpt-length'] : '45';?>
                    <input id="mytheme-excerpt-length" name="mytheme[portfolio][excerpt-length]" type="text" value="<?php echo $v;?>" />
                    <?php mytheme_adminpanel_tooltip(__(" This is the number of content character want to appears for each portfolio post( numbers only).",IAMD_TEXT_DOMAIN));?>
                </div> --> <!-- Excerpt Length End-->
                
                
                <!-- Post Count-->
                <div class="custom-box">
                    <label class="right"><?php _e('Post per page',IAMD_TEXT_DOMAIN);?></label>
                    <select name="mytheme[portfolio][post-per-page]">
                        <option value="-1"><?php _e("All",IAMD_TEXT_DOMAIN);?></option>
                        <?php $selected = 	array_key_exists("post-per-page",$tpl_portfolio_settings) ?  $tpl_portfolio_settings['post-per-page'] : ''; ?>
                        <?php for($i=1;$i<=30;$i++):
                            echo "<option value='{$i}'".selected($selected,$i,false).">{$i}</option>";
                            endfor;?>
                    </select>
                    <?php mytheme_adminpanel_tooltip(__("Your blog pages show at most selected number of posts per page.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Post Count End-->
                
                 <!-- Categories -->
                <div class="custom-box">
                	<h3><?php _e('Choose Categories',IAMD_TEXT_DOMAIN);?></h3>
                    <?php if(array_key_exists("cats",$tpl_portfolio_settings)):
							 $exclude_cats = array_unique($tpl_portfolio_settings["cats"]);
							 foreach($exclude_cats as $cats):
								echo "<!-- Category Drop Down Container -->
									  <div class='multidropdown'>";
								echo  mytheme_portfolio_categorylist("portfolio,cats",$cats,"multidropdown");
								echo "</div><!-- Category Drop Down Container end-->";		
							 endforeach;
						  else:
							echo "<!-- Category Drop Down Container -->";
							echo "<div class='multidropdown'>";
							echo  mytheme_portfolio_categorylist("portfolio,cats","","multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";
						   endif;?>
                    <?php mytheme_adminpanel_tooltip(__("You can choose certain categories to exclude from your blog page.",IAMD_TEXT_DOMAIN));?>
                </div><!-- Categories End-->
                
<!-- CUSTOM DESIGN -->
				<!-- Apply Bark BG -->
                <div class="custom-box">
                    <label class="right"><?php _e('Apply Dark Background',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("dark-bg",$tpl_portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("dark-bg",$tpl_portfolio_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-portfolio-dark-bg" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-portfolio-dark-bg" class="hidden" type="checkbox" name="mytheme[portfolio][dark-bg]" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Dark Background in Single page template',IAMD_TEXT_DOMAIN));?>
                </div><!-- Apply Bark BG End-->
                
                <!-- Patterns -->
                <div class="custom-box">
                    <label class="right"><?php _e('Apply Pattern',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("apply-pattern",$tpl_portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("apply-pattern",$tpl_portfolio_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-portfolio-apply-pattern" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-portfolio-apply-pattern" class="hidden" type="checkbox" name="mytheme[portfolio][apply-pattern]" value="true"  <?php echo $checked;?>/>
                    
                    <div class="hr_invisible"></div>
                    <div class="clear"></div>
                    
                    <label class="right"><?php _e('Available Patterns',IAMD_TEXT_DOMAIN);?></label>
                    <ul class="bpanel-layout-set">
                    <?php $pattrens  = mytheme_listImage(IAMD_FW."theme_options/images/pattern/");
                            foreach($pattrens as $key => $value):
                            $class = ( $key ==  $tpl_portfolio_settings['pattern'] ) ? " class='selected' " : "";
                            echo "<li>";
                            echo "<a href='#' rel='{$key}' title='{$value}' {$class}>
								  <img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/$key' /></a>";
                            echo "</li>";
                            endforeach;?>
                     </ul>
                    <input id="mytheme-portfolio-pattern" name="mytheme[portfolio][pattern]" type="hidden" value="<?php echo $tpl_portfolio_settings['pattern'];?>"/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Pattern in Single page template',IAMD_TEXT_DOMAIN));?>
                </div><!-- Patterns End-->
                
                <!-- Bottm Shadow -->
                <div class="custom-box">
                    <label class="right"><?php _e('Apply Bottom shadow',IAMD_TEXT_DOMAIN);?></label>
                    <?php $switchclass = array_key_exists("bottm-shadow",$tpl_portfolio_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                          $checked = array_key_exists("bottm-shadow",$tpl_portfolio_settings) ? ' checked="checked"' : '';?>
                    <div data-for="mytheme-portfolio-bottm-shadow" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input id="mytheme-portfolio-bottm-shadow" class="hidden" type="checkbox" name="mytheme[portfolio][bottm-shadow]" value="true"  <?php echo $checked;?>/>
                    <?php mytheme_adminpanel_tooltip(__('Apply Bottom shadow in Single page template',IAMD_TEXT_DOMAIN));?>
                </div><!-- Bottm Shadow End-->


                <!-- BG TYPE STARTS HERE -->
                <div class="custom-box">
                
                	<div class="bpanel-option-set">
                	<label class="right"><?php _e("Background Type",IAMD_TEXT_DOMAIN);?></label>
                    <?php $args = array(""=>__("Select",IAMD_TEXT_DOMAIN),"bg-patterns"=>__("Pattern",IAMD_TEXT_DOMAIN),"bg-custom"=>__("Custom Background",IAMD_TEXT_DOMAIN)
										,"bg-none"=>__("None",IAMD_TEXT_DOMAIN));?>
                   	<select name="mytheme[portfolio][page-bg-type]" class="bg-type">
                    <?php foreach($args as $k => $v):
							$rs = selected($k,$tpl_portfolio_settings['page-bg-type'],false);
							echo "<option value='{$k}' {$rs}>{$v}</option>";
						  endforeach;?>
                    </select>
                    </div>
                    
                    <div class='clear'></div>
                    
                   <?php $bg_pattern = ( $tpl_portfolio_settings['page-bg-type'] == "bg-patterns" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                   <?php $bg_custom  = ( $tpl_portfolio_settings['page-bg-type'] == "bg-custom" ) ? 'style="display:block"' : 'style="display:none"'; ?>
                   
					<!-- In-built BG Patterns starts-->
                    <div class="bg-pattern" <?php echo $bg_pattern;?>>
                    
                    	<label class="right"><?php _e('Available BG Patterns',IAMD_TEXT_DOMAIN);?></label>
                        <ul class="bpanel-layout-set">
                        <?php $pattrens = mytheme_listImage(IAMD_FW."theme_options/images/pattern/bg-patterns/"); 	
                              foreach($pattrens as $key => $value):
                                $class = ( $key ==  $tpl_portfolio_settings['page-bg-pattern'] ) ? " class='selected' " : "";
                                echo "<li>";
                                echo "<a href='#' rel='{$key}' title='{$value}' {$class}>
										<img width='80px' height='80px' src='".IAMD_FW_URL."theme_options/images/pattern/bg-patterns/$key' /></a>";
                                echo "</li>";
                             endforeach;?>
                         </ul>
                        <input id="mytheme-bg-pattern" name="mytheme[portfolio][page-bg-pattern]" type="hidden" value="<?php echo $tpl_portfolio_settings['page-bg-pattern'];?>"/>
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
                                            <?php selected($option,$tpl_portfolio_settings['page-bg-pattern-repeat']); ?>><?php echo $option;?></option>
                                    <?php endforeach;?>
                                </select><!-- Pattern Repeat End -->
                                
                                <!-- Opacity Slider -->
								<?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme[portfolio][page-bg-pattern-opacity]",
                                                                        $tpl_portfolio_settings['page-bg-pattern-opacity'],"");?><!-- Opacity Slider End -->  
                                
                                <?php mytheme_adminpanel_tooltip(__("Select how you would like to repeat the pattern image",IAMD_TEXT_DOMAIN));?>                              
                            </div>
                          </div>
                          
                        <div class="one-half-content last">
                          	<div class="bpanel-option-set">
                           		<?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme[portfolio][disable-page-bg-pattern-color]',
                                                $tpl_portfolio_settings['disable-page-bg-pattern-color'],'portfolio-disable-page-bg-pattern-color');?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme[portfolio][page-bg-pattern-color]";
								  	  $value =  	($tpl_portfolio_settings['page-bg-pattern-color'] != NULL) ? $tpl_portfolio_settings['page-bg-pattern-color'] :"";
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
                                               value="<?php echo $tpl_portfolio_settings['page-custom-bg'];?>" />
                                    <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                                    <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                                    <?php mytheme_adminpanel_image_preview($tpl_portfolio_settings['page-custom-bg']);?>
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
                                            <?php selected($option,$tpl_portfolio_settings['page-custom-bg-repeat']); ?>><?php echo $option;?></option>
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
                                        <?php selected($option,$tpl_portfolio_settings['page-custom-bg-position']); ?>><?php echo $option;?></option>
                              <?php endforeach;?>
                                </select><!-- BG Image Position -->
                                
                            </div>
                        </div><!-- one-half-content end -->
                        
                        <div class="one-half-content last">
                        	<div class="bpanel-option-set">
                                <!-- Opacity Slider -->
                                <?php echo mytheme_admin_jqueryuislider( __("BG opacity",IAMD_TEXT_DOMAIN),	"mytheme[portfolio][page-custom-bg-opacity]",
								                         $tpl_portfolio_settings['page-custom-bg-opacity'],"");?><!-- Opacity Slider End -->
                                <?php mytheme_switch_page(__("Disable BG Color",IAMD_TEXT_DOMAIN),'mytheme[portfolio][disable-page-custom-bg-color]',
                                                    $tpl_portfolio_settings['disable-page-custom-bg-color'],'disable-page-custom-bg-color');?>
                                <div class="hr_invisible"></div>
                                <?php $label = 		__("BG Color",IAMD_TEXT_DOMAIN);
									  $name  =		"mytheme[portfolio][page-custom-bg-color]";
								  	  $value =  	($tpl_portfolio_settings['page-custom-bg-color'] != NULL) ? $tpl_portfolio_settings['page-custom-bg-color'] :"";
								  	  #$tooltip = 	__("Pick a custom color for background color of the page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
									  #mytheme_admin_color_picker($label,$name,$value,$tooltip);
									  mytheme_admin_color_picker($label,$name,$value);?>
                            </div><!-- .bpanel-option-set end -->
                        </div><!-- one-half-content end -->
                        
                    </div><!-- Upload custom BG option Ends-->
                    

                </div><!-- BG TYPE ENDS HERE -->                
<!-- CUSTOM DESSIGN END -->                                
                
            	
            </div><!-- Portfolio Template Settings End-->
            
        </div>    
<?php  wp_reset_postdata();
    } ?>
<?php /*function page_sllider_settings($args){
		global $post;
		$tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
		$tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();?>
		<!-- Show Slider -->        
        <div class="custom-box">
            <label class="right"><?php _e('Show Slider',IAMD_TEXT_DOMAIN);?> </label>
            <?php $switchclass = array_key_exists("show_slider",$tpl_default_settings) ? 'checkbox-switch-on' :'checkbox-switch-off';
                  $checked = array_key_exists("show_slider",$tpl_default_settings) ? ' checked="checked"' : '';?>
            <div data-for="mytheme-show-slider" class="checkbox-switch <?php echo $switchclass;?>"></div>
            <input id="mytheme-show-slider" class="hidden" type="checkbox" name="mytheme-show-slider" value="true"  <?php echo $checked;?>/>
            <?php mytheme_adminpanel_tooltip(__('Enable Slider for this page',IAMD_TEXT_DOMAIN));?>
        </div><!-- Show Slider End-->
        
        <!-- Slider Types -->
        <div class="custom-box">
	        <label class="right"><?php _e('Choose Slider',IAMD_TEXT_DOMAIN);?></label>

	            <?php $slider_types = array(''=>__("Select",IAMD_TEXT_DOMAIN),'cycleslider'=>__("Cycle Slider",IAMD_TEXT_DOMAIN),'layerslider'=>__("Layer Slider",IAMD_TEXT_DOMAIN),
						 'nivoslider'=>__("Nivo Slider",IAMD_TEXT_DOMAIN),'touchslider'=>__("Touch Slider",IAMD_TEXT_DOMAIN),
						 'revolutionslider'=>__("Revolution Responsive",IAMD_TEXT_DOMAIN));
	 				  	  $v =  array_key_exists("slider_type",$tpl_default_settings) ?  $tpl_default_settings['slider_type'] : '';
						  
						  echo "<select class='slider-type' name='mytheme-slider-type'>";
						  foreach($slider_types as $key => $value):
						  	$rs = selected($key,$v,false);
							echo "<option value='{$key}' {$rs}>{$value}</option>";
						  endforeach;
	 					 echo "</select>";?>
            <?php mytheme_adminpanel_tooltip(__("You can choose slider for the page.",IAMD_TEXT_DOMAIN));?>
        </div><!-- Slider Types End-->
        
        <!-- slier-container starts-->
    	<div id="slider-conainer">
        	<?php $sliders = $cycleslider = $nivoslider = $touchslider = $layerslider = $revolutionslider = 'style="display:none"';
				  if(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "cycleslider"):
					  $cycleslider = 'style="display:block"';
					  $sliders = 'style="inline-block"';
				  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "nivoslider"):
					  $nivoslider = 'style="display:block"';
					  $sliders = 'style="inline-block"';
				  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "touchslider"):
					  $touchslider = 'style="display:block"';
					  $sliders = 'style="inline-block"';
				  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "layerslider"):
					  $layerslider = 'style="display:block"';
				  elseif(isset($tpl_default_settings['slider_type'])&& $tpl_default_settings['slider_type'] == "revolutionslider"):
					  $revolutionslider = 'style="display:block"';
				  endif;?>
            <!-- Sliders Start -->
            <div id="sliders" class="custom-box" <?php echo $sliders;?>>
            
                <!-- Used Sliders -->
                <h3><?php _e("Used Sliders",IAMD_TEXT_DOMAIN);?></h3>
                <p id="j-no-images-container"><?php _e('Please, add some sliders',IAMD_TEXT_DOMAIN); ?></p>
                <ul id="j-used-sliders-containers">
                <?php $sliders = array_key_exists('sliders',$tpl_default_settings) ? $tpl_default_settings['sliders'] : array();
					  foreach($sliders as $slider):
						$src = IAMD_FW_URL.'theme_options/images/no-image.jpg';
						$p = get_post($slider);
						$video_url = get_post_meta($p->ID,'_video_url',true);
						$src = !empty($video_url) ? IAMD_FW_URL.'theme_options/images/video-slider.jpg': $src;
						
						$default_attr= array('alt'=> trim(strip_tags($p->post_title)),'title' => trim(strip_tags($p->post_title)));
						$img = wp_get_attachment_image(get_post_thumbnail_id($p->ID),'thumbnail',0,$default_attr);
						
						$img = !empty($img) ? $img : "<img width='150' height='150' src='{$src}' title='{$p->post_title}'/>";
						echo "<li data-attachment-id='{$p->ID}'>";
						echo $img;
						echo "<span class='my_delete'>x</span>";
						echo "<input type='hidden' name='sliders[]' value='{$p->ID}'/>";
						echo "</li>";
					  endforeach;?>
                </ul><!-- Used Sliders -->
            	
            
	            <!-- Available Sliders -->
	            <h3 class="slider-info"><?php _e("Available Sliders",IAMD_TEXT_DOMAIN);?></h3>
                <ul id="j-available-sliders">
                <?php global $post;
                      $args = array( 'post_type' => 'slide', 'orderby' => 'id', 'order' => 'ASC', 'posts_per_page' => 10 );
                      $slider_query = new WP_Query($args);
                      foreach ($slider_query->posts as $slider):
						$src = IAMD_FW_URL.'theme_options/images/no-image.jpg';
						
							$default_attr= array('alt'=> trim(strip_tags($slider->post_title)),'title' => trim(strip_tags($slider->post_title)));													
							$img = wp_get_attachment_image(get_post_thumbnail_id($slider->ID),'thumbnail',0,$default_attr);
							
							$video_url = get_post_meta($slider->ID,'_video_url',true);
							$src = !empty($video_url) ? IAMD_FW_URL.'theme_options/images/video-slider.jpg': $src;
							$img = !empty($img) ? $img : "<img width='150' height='150' src='{$src}' alt='{$slider->post_title}' title='{$slider->post_title}'/>";
                            $added_class = @(  in_array( $slider->ID, $sliders ,false ) ) ? ' class="my_added"' : ''; 
                            echo "<li {$added_class} data-attachment-id='{$slider->ID}'>";
                            echo  $img;
                            echo "<span class='my_delete'>x</span>";
                            echo "</li>";
                       endforeach;?>
                  </ul><!-- #j-available-sliders container -->
                  <!-- Available Sliders End-->
                    
                    <!-- Pagination -->
                    <?php if ( $slider_query->max_num_pages > 1 ): ?>
                    <div id="j-slider-pagination" class="admin-pagination">
                      <?php  for ( $i=1; $i <= $slider_query->max_num_pages; $i++ ): ?>
                        <a href="#" <?php echo( 1 == $i ? ' class="active_page"' : '' ) ?>><?php echo($i);?></a>
                      <?php endfor;?>
                    </div>
                    <?php endif;?><!-- Pagination End -->
            
            </div><!-- Sliders End -->
            
            
            <!-- Cycle Slider -->
            <div id="cycleslider" class="custom-box" <?php echo $cycleslider;?>>
            	<?php $cycle = isset($tpl_default_settings['cycle']) ? $tpl_default_settings['cycle'] : array();?>
                <h3><?php _e('Cycle Sliders Settings',IAMD_TEXT_DOMAIN);?></h3>
                
                 <h4><?php _e('Transition effects',IAMD_TEXT_DOMAIN);?></h4>
                <?php $cycle_transition = array("fade","scrollLeft","scrollRight","scrollUp","scrollDown","slideX","slideY","turnUp","turnDown","turnLeft","turnRight","zoom","fadeZoom","blindX","blindY","blindZ","growX","growY","curtainX","curtainY","cover","uncover","toss","wipe","shuffle","scrollHorz","scrollVert");
						 sort($cycle_transition);
						 $t = isset($cycle['effects']) ? $cycle['effects'] : array();	
						 foreach($cycle_transition as $transition): ?>
                            <label class="one-third"><input type="checkbox" name="cycle[effects][]" value="<?php echo($transition);?>" 
                            <?php checked(in_array(esc_attr($transition),$t)); ?> />
                            <?php echo(esc_html($transition));?></label>
                   <?php endforeach;?>
                   
                 <h4><?php _e('Easing',IAMD_TEXT_DOMAIN);?></h4>
                 <?php  $easings_types = array("easeInQuad","easeOutQuad","easeInOutQuad","easeInCubic","easeOutCubic","easeInOutCubic","easeInQuart","easeOutQuart","easeInOutQuart","easeInQuint","easeOutQuint","easeInOutQuint","easeInSine","easeOutSine","easeInOutSine","easeInExpo","easeOutExpo","easeInOutExpo","easeInCirc","easeOutCirc","easeInOutCirc","easeInElastic","easeOutElastic","easeInOutElastic","easeInBack","easeOutBack","easeInOutBack","easeInBounce","easeOutBounce","easeInOutBounce");
				  
				  $easing_options = array(array("id"=>"easing","label"=>__("Easing",IAMD_TEXT_DOMAIN),"options"=>$easings_types,
												"tooltip"=>__("Easing method for both in and out transitions",IAMD_TEXT_DOMAIN)),
											array("id"=>"easeIn","label"=>__("EaseIn",IAMD_TEXT_DOMAIN),"options"=>$easings_types,
												"tooltip"=>__("easing for 'in' transition",IAMD_TEXT_DOMAIN)),
											array("id"=>"easeOut","label"=>__("EaseOut",IAMD_TEXT_DOMAIN),"options"=>$easings_types,
												"tooltip"=>__("easing for 'out' transition",IAMD_TEXT_DOMAIN)));
					foreach( $easing_options as $easing_option ):?>
                    
                    <div class="one-half-content ">
                    	<div class="bpanel-option-set">
                    	<label><?php echo $easing_option["label"]?></label>
                        <select name="cycle[<?php echo $easing_option["id"];?>]">
                        		<option value=""><?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                <?php foreach($easing_option["options"] as $value ):
										$v = isset($cycle[$easing_option["id"]]) ? $cycle[$easing_option["id"]] : '';
										$rs = selected($value,$v,false);
										echo "<option value='{$value}' {$rs} >{$value}</option>";
									   endforeach;?>
                            </select> <?php mytheme_adminpanel_tooltip($easing_option["tooltip"]);?>    
                        </div>             
					</div>                   
              <?php endforeach;?>
              
	             <h4><?php _e('Speed',IAMD_TEXT_DOMAIN);?></h4>
                 <?php $cycle_speed_settings = array(
							array("id"=>			"speed","label"=>		__("Speed",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("speed of the transition (any valid fx speed value ,eg:1000)",IAMD_TEXT_DOMAIN)),
								
							array("id"=>			"speed_in","label"=>		__("Speed In",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("speed of the 'in' transition (eg:2500)",IAMD_TEXT_DOMAIN)),
								
							array("id"=>			"speed_out","label"=>		__("Speed Out",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("speed of the 'out' transition (eg : 500)",IAMD_TEXT_DOMAIN)),
							array("id"=>			"delay_time","label"=>		__("Delay Time",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("additional delay (in ms) for first transition (hint: can be negative)",IAMD_TEXT_DOMAIN)));
							$count = 1;
							foreach($cycle_speed_settings as $cycle_speed):	
								$v = isset($cycle[$cycle_speed["id"]]) ? $cycle[$cycle_speed["id"]] : '';?>
                            	<div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                            		<div class="bpanel-option-set">
                                		<label><?php echo $cycle_speed["label"];?></label>
                                		<input type="text" class="medium" name="cycle[<?php echo $cycle_speed["id"];?>]" 
                                        value="<?php echo $v;?>" />
                                		<?php mytheme_adminpanel_tooltip($cycle_speed["tooltip"]);?>    
                            		</div>
                        		</div>                            
                  	<?php 		$count++;
				 			endforeach;?>
                            
                 <h4><?php _e('Others',IAMD_TEXT_DOMAIN);?></h4>
                 <?php $cycle_others = array('pause_on_hover' =>			__('Would you like to pasue the slider on hover?',IAMD_TEXT_DOMAIN),
						'random_start'=>			__('Would you like to use random slider?',IAMD_TEXT_DOMAIN),
						//'direction_nav'=>			__('Would you like to show slider navigation?',IAMD_TEXT_DOMAIN),
						'control_nav'=>				__('Would you like to show control navigation on bottom of slider?',IAMD_TEXT_DOMAIN),
						'control_nav_hover'=>		__('Would you like to pause the slider on control navigation hover?',IAMD_TEXT_DOMAIN),
						'sync'=>					__('Disable (It cause transitions should not occur simultaneously).',IAMD_TEXT_DOMAIN));
						
						foreach($cycle_others as $key => $value):
							$v = isset($cycle[$key]) ? $cycle[$key] : ''; 
							$rs = checked($key,$v,false);
							echo "<label class='one-half'>\r";
							echo "<input type='checkbox' name='cycle[{$key}]' value='{$key}' {$rs} /> {$value}";
							echo "</label>\r";
						endforeach;?>
                 <div class="clear"></div>           
                 <h4><?php _e('Dimensions',IAMD_TEXT_DOMAIN);?></h4>
                        <div class="one-half-content">
                        	<div class="bpanel-option-set">
                                <label><?php _e('Width (in px)',IAMD_TEXT_DOMAIN);?></label>
                                <?php $v = isset($cycle["width"]) ? $cycle["width"] : ''; ?>
								<input type="text" class="medium" name="cycle[width]" value="<?php echo esc_html($v);?>" />
                                <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?>                                 
                             </div>
                        </div>
                        
                        <div class="one-half-content last">
                        	<div class="bpanel-option-set">
                                <label><?php _e('Height (in px)',IAMD_TEXT_DOMAIN);?></label>
                                <?php $v = isset($cycle["height"]) ? $cycle["height"] : ''; ?>
                                <input type="text" class="medium" name="cycle[height]" value="<?php echo(esc_html($v));?>" />
                                <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?> 
							</div>
                        </div>
                        
            </div><!-- Cycle Slider End-->
    
            <!-- Nivo Slider -->
            <div id="nivoslider" class="custom-box" <?php echo $nivoslider;?>>
            	<?php $nivo_settings = isset($tpl_default_settings['nivo']) ? $tpl_default_settings['nivo'] : array();?>
                <h3><?php _e('Nivo Slider Settings',IAMD_TEXT_DOMAIN);?></h3>
                
                <!-- Effects -->
                <h4><?php _e('Choose effects',IAMD_TEXT_DOMAIN);?></h4>
                <?php $nivo_effects = array("sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random","slideInRight","slideInLeft","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse");
                      sort($nivo_effects);
					  $t = isset($nivo_settings['effects']) ? $nivo_settings['effects'] : array();
					  foreach($nivo_effects as $effect):?>
                        <label class="one-third"><input type="checkbox" name="nivo[effects][]" value="<?php echo($effect);?>" 
                        <?php checked(in_array(esc_attr($effect),$t)); ?> />
                        <?php echo(esc_html($effect));?></label>
                <?php endforeach;?>
                <!-- Effects End -->
                
                <!-- Animation Settings -->
                <h4><?php _e('Animation Settings',IAMD_TEXT_DOMAIN);?></h4>
                <?php $nivo_animation_settings = array( 
					 		array("id"=>"speed","label"=>__("Animation Speed",IAMD_TEXT_DOMAIN),"tooltip"=>__("Please enter slider transition(eg: 500) in ms",IAMD_TEXT_DOMAIN)),
							array("id"=>"pause_time","label"=>__("Pause Time",IAMD_TEXT_DOMAIN),"tooltip"=>__("Please enter slider pause time(eg: 3000) in ms",IAMD_TEXT_DOMAIN)),
							array("id"=>"box_cols","label"=>__("Box Animation Columns",IAMD_TEXT_DOMAIN),"tooltip"=>__("For box animation( boxRain, boxRainGrow, boxRainGrowReverse, boxRainReverse and boxRandom ), you can give number of columns(eg: 8)",IAMD_TEXT_DOMAIN)),
							array("id"=>"box_rows","label"=>__("Box Animation Rows",IAMD_TEXT_DOMAIN),"tooltip"=>__("For box animation( boxRain, boxRainGrow, boxRainGrowReverse, boxRainReverse and boxRandom ), you can give number of rows(eg: 5)",IAMD_TEXT_DOMAIN)),
							array("id"=>"slices","label"=>__("Slices",IAMD_TEXT_DOMAIN),"tooltip"=>		__("For slice animation( SliceDown, SliceDownLeft, SliceUp, SliceUpDown, sliceUpDownLeft and sliceUpLeft ), you can give number of slices here. For eg: 15",IAMD_TEXT_DOMAIN)));
							
						 $count = 1;
                        foreach($nivo_animation_settings as $nivo_animation_setting):?>
                        <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                            <div class="bpanel-option-set">
                                <label><?php echo $nivo_animation_setting["label"];?></label>
                                <?php $v = isset($nivo_settings[$nivo_animation_setting["id"]]) ? $nivo_settings[$nivo_animation_setting["id"]] : ''; ?>
                                <input type="text" class="medium" name="nivo[<?php echo $nivo_animation_setting["id"];?>]"value="<?php echo $v;?>" />
                                <?php mytheme_adminpanel_tooltip($nivo_animation_setting["tooltip"]);?>    
                            </div>
                        </div>
                  <?php  $count++; 
					    endforeach;?>                        
                <!-- Animation Settings End-->
                
                <!-- Others Settings -->
                <h4><?php _e('Others',IAMD_TEXT_DOMAIN);?></h4>
                <?php $nivo_others = array(
								'pause_on_hover' =>	__('Would you like to pasue the slider on hover?',IAMD_TEXT_DOMAIN),
								'random_start'=>	__('Would you like to use random slider?',IAMD_TEXT_DOMAIN),
								'direction_nav'=>	__('Would you like to show slider navigation?',IAMD_TEXT_DOMAIN),
								'control_nav'=>		__('Would you like to show control navigation on bottom of slider?',IAMD_TEXT_DOMAIN));
					  foreach($nivo_others as $key => $value):
						$v = isset($nivo_settings[$key]) ? $nivo_settings[$key] : ''; 
						$rs = checked($key,$v,false);
						echo "<label class='one-half'>\r";
						echo "<input type='checkbox' name='nivo[{$key}]' value='{$key}' {$rs} /> {$value}";
						echo "</label>\r";
					  endforeach;?>    
                <!-- Others Settings End -->
                
                <!-- Dimensions Settings -->
                <h4><?php _e('Dimensions',IAMD_TEXT_DOMAIN);?></h4>
                    <div class="one-half-content">
                        <div class="bpanel-option-set">
                            <label><?php _e('Width (in px)',IAMD_TEXT_DOMAIN);?></label>
                            <?php $v = isset($nivo_settings["width"]) ? $nivo_settings["width"] : ''; ?>
                            <input type="text" class="medium" name="nivo[width]" value="<?php echo esc_html($v);?>" />
                            <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?>                                 
                         </div>
                    </div>
                        
                    <div class="one-half-content last">
                        <div class="bpanel-option-set">
                            <label><?php _e('Height (in px)',IAMD_TEXT_DOMAIN);?></label>
                            <?php $v = isset($nivo_settings["height"]) ? $nivo_settings["height"] : ''; ?>
                            <input type="text" class="medium" name="nivo[height]" value="<?php echo(esc_html($v));?>" />
                            <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?> 
                        </div>
                    </div>
                <!-- Dimensions Settings End-->
            </div><!-- Nivo Slider End-->
            
            <!-- Touch Slider -->
            <div id="touchslider" class="custom-box" <?php echo $touchslider;?>>
				<?php $touch = isset($tpl_default_settings['touch']) ? $tpl_default_settings['touch'] : array();?>
                <h3><?php _e('Touch Slider Settings',IAMD_TEXT_DOMAIN);?></h3>
                
                <!-- BG Settings start-->
                <h4><?php _e('Background Settings',IAMD_TEXT_DOMAIN);?></h4>
                	
                    <div class="one-half-content">
                        <div class="bpanel-option-set">
                        
                            <div class="image-preview-tooltip">
                            <label><?php _e('Background Image',IAMD_TEXT_DOMAIN);?></label>
                            <div class="image-preview-container">
                               <?php $i = isset($touch['bg']) ? $touch['bg'] : ""; ?>
                               <input id="touch[bg]" name="touch[bg]" type="text" class="uploadfield" readonly="readonly"  value="<?php echo $i;?>" />
                               <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                               <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                               <?php mytheme_adminpanel_image_preview($i);?>
                            </div>   
                            <?php mytheme_adminpanel_tooltip(__("Upload an image for slider background.",IAMD_TEXT_DOMAIN));?>
                        </div>
                    </div>
                    
                    </div>                  
                    

                <!-- BG Animation -->
                <div class="one-half-content">
                    <div class="bpanel-option-set">
                        <?php $bg_animation = isset($touch['bg_animation']) ? $touch['bg_animation'] : ""; ?>
                        <label class="chk-label"><input type="checkbox" id="touch[bg_animation]" name="touch[bg_animation]" value="bg_animation" 
                            <?php checked('bg_animation',$bg_animation);?>  />
                            <?php _e('Enable fullscreen background animation.',IAMD_TEXT_DOMAIN);?>
                        </label>
                        
                        <?php mytheme_adminpanel_tooltip(__("Check if you want to enable the fullscreen background animation for touch slider.",IAMD_TEXT_DOMAIN));?>       
                    </div>
                </div>
                 <!-- BG Animation End -->                
                

                 <!-- BG Animation -->
                 <div class="one-half-content">
                     <div class="bpanel-option-set">
                        <?php $bg_move_animation = isset($touch['bg_move_animation']) ? $touch['bg_move_animation'] : ""; ?>
                        <label class="chk-label"><input type="checkbox" id="touch[bg_move_animation]" name="touch[bg_move_animation]" value="bg_move_animation"
                            <?php checked('bg_move_animation',$bg_move_animation);?>/>
                            <?php _e('Enable background move animation.',IAMD_TEXT_DOMAIN);?></label>
                         
                         <?php mytheme_adminpanel_tooltip(__("Check if you want to enable the fullscreen background moving animation for touch slider.",IAMD_TEXT_DOMAIN));?>
                    </div>
                </div>
                 <!-- BG Animation End -->
                <!-- BG Settings end-->
                
                <!-- Pagination Settings Start-->
                <h4><?php _e('Pagination Settings',IAMD_TEXT_DOMAIN);?></h4>
                    <!-- Auto Hide -->
                    <div class="one-half-content ">
                    	<div class="bpanel-option-set">
                    	<?php $pagination_auto_hide = isset($touch['pagination_auto_hide']) ? $touch['pagination_auto_hide'] : ""; ?>
                        	<label><input id="touch[pagination_auto_hide]" name="touch[pagination_auto_hide]" type="checkbox" value="pagination_auto_hide" 
							<?php checked('pagination_auto_hide',$pagination_auto_hide);?>/> <?php _e('Auto hide.',IAMD_TEXT_DOMAIN);?></label>
                        <?php mytheme_adminpanel_tooltip(__("Check if you want to enable the auto hide option for the pagination in touch slider.",IAMD_TEXT_DOMAIN));?>     
                        </div>
                    </div>  
                   <!-- Auto Hide End -->
                    
                    <!-- Pagination type-->
                    <div class="one-half-content ">
                    	<div class="bpanel-option-set">
                    	<label><?php _e("Alignment",IAMD_TEXT_DOMAIN);?></label>
                            <?php $pagination_alignment = array(""  =>	__("Select",IAMD_TEXT_DOMAIN), 			"BC"=>	__("Bottom Center",IAMD_TEXT_DOMAIN),
																"TL"=>	__("Top Left",IAMD_TEXT_DOMAIN), 		"TC"=>	__("Top Center",IAMD_TEXT_DOMAIN),
																"TR"=>	__("Top Right",IAMD_TEXT_DOMAIN),		"BL"=>	__("Bottom Left",IAMD_TEXT_DOMAIN),
																"BR"=>	__("Bottom Right",IAMD_TEXT_DOMAIN),	"LC"=>	__("Left Center",IAMD_TEXT_DOMAIN),
																"RC"=>	__("Right Center",IAMD_TEXT_DOMAIN),	"C"=>	__("Center",IAMD_TEXT_DOMAIN));
																
								  $s_pagination_alignment = isset($touch['pagination_alignment']) ? $touch['pagination_alignment'] : ""; 
								  
								  echo "<select name='touch[pagination_alignment]' id='touch[pagination_alignment]'>"; 
									foreach($pagination_alignment as $key => $value):
										$rs = selected($key,$s_pagination_alignment,false);
										echo "<option value='$key' {$rs}>{$value}</option>";
									endforeach;
								  echo "</select>";?>
                            <?php mytheme_adminpanel_tooltip(__("Choose pagination alignment for touch slider.",IAMD_TEXT_DOMAIN));?> 
                   		</div>
                    </div>
                    
                    <div class="one-half-content ">
                    	<div class="bpanel-option-set">

                            <label><?php _e("Type",IAMD_TEXT_DOMAIN);?></label>
                            <?php $pagination_type = array(""=>__("Select",IAMD_TEXT_DOMAIN),0=>__("Bullets",IAMD_TEXT_DOMAIN)
														,1=>__("Bullets with BG",IAMD_TEXT_DOMAIN),2=>__("Decimal",IAMD_TEXT_DOMAIN));
														
								  $s_pagination_type = isset($touch['pagination_type']) ? $touch['pagination_type'] : "";	
								  
							echo "<select name='touch[pagination_type]' id='touch[pagination_type]'>\r"; 
									foreach($pagination_type as $key => $value):
										$rs = selected($key,$s_pagination_type,false);
										echo "<option value='$key' {$rs} >{$value}</option>";
									endforeach;
							echo "</select>";?>                            
                            <?php mytheme_adminpanel_tooltip(__("Choose pagination type for touch slider.",IAMD_TEXT_DOMAIN));?> 
                    	</div>        
                    </div>
                <!-- Pagination Settings End-->
                
                <!-- Navigation Settings -->
                <h4><?php _e('Navigation Settings',IAMD_TEXT_DOMAIN);?></h4>
                    <!-- Auto Hide -->
                    <div class="one-half-content">
                    	<div class="bpanel-option-set">
                        <?php $navigation_auto_hide = isset($touch['navigation_auto_hide']) ? $touch['navigation_auto_hide'] : ""; ?>
                        <label class="chk-label"><input type="checkbox" id="touch[navigation_auto_hide]" name="touch[navigation_auto_hide]" value="navigation_auto_hide" 
							<?php checked('navigation_auto_hide',$navigation_auto_hide);?>/><?php _e('Disable auto-hide navigation.',IAMD_TEXT_DOMAIN);?></label>
                            <?php mytheme_adminpanel_tooltip(__("Disable auto-hide navigation.",IAMD_TEXT_DOMAIN));?>       
                         </div>
                    </div><!-- Auto Hide End -->
                    
                    <!-- Navigation Other -->
                    <?php $touch_nav_settings = array(
								array(
									"id"=>		"navigation_type",
									"label"=>	__("Type",IAMD_TEXT_DOMAIN), 
									"tooltip"=>	__("Choose previous, next navigation type.",IAMD_TEXT_DOMAIN),
									"options"=>	array(
													""=>	__("Select",IAMD_TEXT_DOMAIN),
													0=>		__("Arrow",IAMD_TEXT_DOMAIN),
													1=>		__("Circle Arrow",IAMD_TEXT_DOMAIN),
													2=>		__("Square Arrow",IAMD_TEXT_DOMAIN))
								),
								array(
									"id"=>		"navigation_lalignment",
									"label"=>	__("Left Alignment",IAMD_TEXT_DOMAIN),
									"options"=>	$pagination_alignment,
									"tooltip"=>	__("Choose the alignment / position for the 'left' navigation icon",IAMD_TEXT_DOMAIN)
								),
								array(
									"id"=>		"navigation_ralignment",
									"label"=>	__("Right Alignment",IAMD_TEXT_DOMAIN),
									"options"=> $pagination_alignment,
									"tooltip"=>	__("Choose the alignment / position for the 'right' navigation icon",IAMD_TEXT_DOMAIN))
						);
						  $i = 0;
					foreach($touch_nav_settings as $touch_nav):?>
                    <div class="one-half-content <?php echo ($i%2 == 0) ? 'last' : '';?>">
	                    <div class="bpanel-option-set">
                    	   <label><?php echo $touch_nav['label']?></label>
                           <select id="touch[<?php echo $touch_nav['id']?>]" name="touch[<?php echo $touch_nav['id']?>]">
                           	<?php foreach($touch_nav['options'] as $key => $value):
									 $id = isset($touch[$touch_nav['id']]) ? $touch[$touch_nav['id']] : ""; 	
									 $rs = selected($key,$id,false);	
		                             echo "<option value='$key' {$rs} >{$value}</option>";
                            	endforeach;?>
                            </select>
                            <?php mytheme_adminpanel_tooltip($touch_nav['tooltip']);?>
                     	</div>
                     </div>
                    <?php $i++;
					endforeach;?>     
                <!-- Navigation Settings End-->
                
                <!-- Others Start-->
                <h4><?php _e('Others',IAMD_TEXT_DOMAIN);?></h4>
                <?php $touch_others = array( 
							array(
								"id"=>		"touch_drag",
								"label"=>	__("Disable desktop drag",IAMD_TEXT_DOMAIN),
								"tooltip"=>	__("Disable desktop drag","IAMD_TEXT_DOMAIN")
							), 
							array(
								"id"=>		"touch_slideshow",
								"label"=>	__("Disable slideshow animation.",IAMD_TEXT_DOMAIN),
								"tooltip"=>	__("Disable slideshow animation.","IAMD_TEXT_DOMAIN")
							)  
						);
					  $i = 1;
					  foreach($touch_others as $t_other):
						$last = ( $i%2 == 0) ? "last":'';
						$id  =  $t_other['id'];
						$v = isset($touch[$t_other['id']]) ? $touch[$t_other['id']] : "";
						$rs = checked($id,$v,false);
							
							echo "<div class='one-half-content {$last}'>";
							echo '	<div class="bpanel-option-set">'; 
							echo "		<label class='chk-label'>";
							echo "  	<input id='touch[{$id}]' name='touch[{$id}]' type='checkbox' value='{$id}'  {$rs} />";
							echo 		$t_other['label']."</label>";
										mytheme_adminpanel_tooltip($t_other['tooltip']);
							echo "	</div>";			
							echo "</div>";
						$i++;
					endforeach;?>
                    
                <div class="one-half-content">
                	<div class="bpanel-option-set">
                            <label><?php _e("Delay Time",IAMD_TEXT_DOMAIN);?></label>
                            <?php $delay_time = isset($touch['delay_time']) ? $touch['delay_time'] : ""; ?>
                            <input type="text" class="medium" name="touch[delay_time]" value="<?php echo $delay_time;?>" />
                            <?php mytheme_adminpanel_tooltip(__("Additional delay time of slideshow animation in seconds. (eg:) 2",IAMD_TEXT_DOMAIN));?>
                	</div>
                </div>
                           
                     

                <!-- Dimensions Settings -->
                <h4><?php _e('Dimensions',IAMD_TEXT_DOMAIN);?></h4>
                    <div class="one-half-content">
                        <div class="bpanel-option-set">
                            <label><?php _e('Width (in px)',IAMD_TEXT_DOMAIN);?></label>
                            <?php $v = isset($touch["width"]) ? $touch["width"] : ''; ?>
                            <input type="text" class="medium" name="touch[width]" value="<?php echo esc_html($v);?>" />
                            <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?>                                 
                         </div>
                    </div>
                        
                    <div class="one-half-content last">
                        <div class="bpanel-option-set">
                            <label><?php _e('Height (in px)',IAMD_TEXT_DOMAIN);?></label>
                            <?php $v = isset($touch["height"]) ? $touch["height"] : ''; ?>
                            <input type="text" class="medium" name="touch[height]" value="<?php echo(esc_html($v));?>" />
                            <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?> 
                        </div>
                    </div>
                <!-- Dimensions Settings End-->
                     
                <!-- Others End-->
            </div><!-- Touch Slider End-->
    
            <!-- Layered Slider -->
            <div id="layerslider" class="custom-box" <?php echo $layerslider;?>>
                <h3><?php _e('Layer Slider',IAMD_TEXT_DOMAIN);?></h3>
                <?php if(mytheme_is_plugin_active('LayerSlider/layerslider.php')):?>
                <?php // Get WPDB Object
					  global $wpdb;
					  
					  // Table name
					  $table_name = $wpdb->prefix . "layerslider";
					  
					  // Get sliders
					  $sliders = $wpdb->get_results( "SELECT * FROM $table_name WHERE flag_hidden = '0' AND flag_deleted = '0'  ORDER BY date_c ASC LIMIT 100" );
					  
					  if($sliders != null && !empty($sliders)):
		 	                echo '<div class="one-half-content">';
							echo '	<div class="bpanel-option-set">';
                            echo '	<label>'.__('Select LayerSlider',IAMD_TEXT_DOMAIN).'</label>';
                            echo '	<select name="layerslider_id">';
                            echo '		<option value="0">'.__("Select Slider",IAMD_TEXT_DOMAIN).'</option>';
									  	foreach($sliders as $item) :
											$name = empty($item->name) ? 'Unnamed' : $item->name;
											$id = $item->id;
											$rs = isset($tpl_default_settings['layerslider_id']) ? $tpl_default_settings['layerslider_id']:'';
											$rs = selected($id,$rs,false);
											echo "	<option value='{$id}' {$rs}>{$name}</option>";
										endforeach;
                            echo '	</select>';
                            mytheme_adminpanel_tooltip("Choose Which LayerSlider you would like to use..",IAMD_TEXT_DOMAIN);
							echo '	</div>';
                            echo '</div>';
					  else:
					     echo '<p id="j-no-images-container">'.__('Please add atleat one layer slider',IAMD_TEXT_DOMAIN).'</p>';
					  endif;?>

				
					<?php $layersliders = get_option('layerslider-slides');
                        if($layersliders):
                            $layersliders = is_array($layersliders) ? $layersliders : unserialize($layersliders);	
                            foreach($layersliders as $key => $val):
                                $layersliders_array[$key+1] = 'LayerSlider #'.($key+1);
                            endforeach;
                            echo '<div class="one-half-content">';
							echo '	<div class="bpanel-option-set">';
                            echo '	<label>'.__('Select LayerSlider',IAMD_TEXT_DOMAIN).'</label>';
                            echo '	<select name="layerslider_id">';
                            echo '		<option value="0">'.__("Select Slider",IAMD_TEXT_DOMAIN).'</option>';
                            foreach($layersliders_array as $key => $value):
                                $rs = isset($tpl_default_settings['layerslider_id']) ? $tpl_default_settings['layerslider_id']:'';
                                $rs = selected($key,$rs,false);
                                echo "	<option value='{$key}' {$rs}>{$value}</option>";
                            endforeach;
                            echo '	</select>';
                            mytheme_adminpanel_tooltip("Choose Which LayerSlider you would like to use..",IAMD_TEXT_DOMAIN);
							echo '	</div>';
                            echo '</div>';
                        endif;
					  else:?>
                      <p id="j-no-images-container"><?php _e('Please activate Layered Slider',IAMD_TEXT_DOMAIN); ?></p>
               <?php endif;?>         
            </div><!-- Layered Slider End-->
    
            <!-- Revolution Slider -->
            <div id="revolutionslider" class="custom-box" <?php echo $revolutionslider;?>>
                <h3><?php _e('Revolution Slider',IAMD_TEXT_DOMAIN);?></h3>
                <?php $return = check_slider_revolution_responsive_wordpress_plugin();
					  if($return):
                        echo '<div class="one-half-content">';
						echo '	<div class="bpanel-option-set">';
						echo '	<label>'.__('Select Slider',IAMD_TEXT_DOMAIN).'</label>';
						echo '	<select name="revolutionslider_id">';
						echo '		<option value="0">'.__("Select Slider",IAMD_TEXT_DOMAIN).'</option>';
						foreach($return as $key => $value):
							$rs = isset($tpl_default_settings['revolutionslider_id']) ? $tpl_default_settings['revolutionslider_id']:'';
							$rs = selected($key,$rs,false);
							echo "	<option value='{$key}' {$rs}>{$value}</option>";
						endforeach;
						echo '</select>';
						mytheme_adminpanel_tooltip("Choose Which Revolution Slider you would like to use..",IAMD_TEXT_DOMAIN);
						echo '	</div>';
						echo '</div>';
                	  else: ?>
	                	<p id="j-no-images-container"><?php _e('Please activate Revolution Slider , and add alest one slider.',IAMD_TEXT_DOMAIN); ?></p>
                <?php endif;?>
            </div><!-- Revolution Slider End-->
        </div><!-- Slier-container end-->
<?php	wp_reset_postdata();
	} */?>
<?php
	function page_meta_save($post_id){
		global $pagenow;
		if ( 'post.php' != $pagenow ) return $post_id;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 	return $post_id;
		
		if(isset($_POST["page_template"]) && ( 'default' == $_POST["page_template"]  || 'tpl-sitemap.php' == $_POST["page_template"] 
			|| 'tpl-home.php' == $_POST["page_template"] || 'tpl-feature.php' ==  $_POST["page_template"]  )):
			$settings = array();
			$settings['sub-title'] = $_POST['sub-title'];					
			$settings['layout'] = $_POST['layout'];
			$settings['comment'] = $_POST['mytheme-page-comment'];
			
			$settings['dark-bg'] = $_POST['mytheme-page-dark-bg'];
			$settings['bottm-shadow'] = $_POST['mytheme-page-bottm-shadow'];
			$settings['apply-pattern'] = $_POST['mytheme-page-apply-pattern'];
			$settings['pattern'] = $_POST['mytheme-pattern'];
			
			#Font Settings
			$settings['font-settings'] = $_POST['mytheme-page-font-settings'];
			$settings['page-font-color'] = $_POST['mytheme-page-font-color'];
			$settings['page-primary-color'] = $_POST['mytheme-page-primary-color'];
			$settings['page-secondary-color'] = $_POST['mytheme-page-secondary-color'];
			$settings['page-title-color'] = $_POST['mytheme-page-title-color'];
			
			#BG Settings
			$settings['page-bg-type'] = $_POST['page-bg-type'];
			$settings['page-bg-pattern'] = $_POST['mytheme-bg-pattern'];
			$settings['page-bg-pattern-repeat'] = $_POST['mytheme-page-bg-pattern-repeat'];
			$settings['page-bg-pattern-opacity'] = $_POST['mytheme-page-bg-pattern-opacity'];
			$settings['disable-page-bg-pattern-color'] = $_POST['mytheme-disable-page-bg-pattern-color'];
			$settings['page-bg-pattern-color'] = $_POST['mytheme-page-bg-pattern-color'];
			
			$settings['page-custom-bg'] = $_POST['mytheme-page-custom-bg'];
			$settings['page-custom-bg-repeat'] = $_POST['mytheme-page-custom-bg-repeat'];
			$settings['page-custom-bg-position'] = $_POST['mytheme-page-custom-bg-position'];
			$settings['page-custom-bg-opacity'] = $_POST['mytheme-page-custom-bg-opacity'];
			$settings['disable-page-custom-bg-color']  = $_POST['mytheme-disable-page-custom-bg-color'];
			$settings['page-custom-bg-color'] = $_POST['mytheme-page-custom-bg-color'];
			#BG Settings End
			
			$settings['show_slider'] =  $_POST['mytheme-show-slider'];
			$settings['slider_type'] = $_POST['mytheme-slider-type'];
			$settings['sliders']	= array_filter($_POST['sliders']);
			$settings['cycle'] = array_filter($_POST['cycle']);
			$settings['nivo'] = array_filter($_POST['nivo']);
			$settings['touch'] = array_filter($_POST['touch']);
			$settings['layerslider_id'] = $_POST['layerslider_id'];
			$settings['revolutionslider_id'] = $_POST['revolutionslider_id'];
			
			update_post_meta($post_id, "_tpl_default_settings", array_filter($settings));
			delete_post_meta($post_id, '_tpl_blog_settings');
			delete_post_meta($post_id, '_tpl_portfolio_settings');
			
		elseif( isset($_POST["page_template"]) && 'tpl-blog.php' == $_POST["page_template"] ):
			
			
			$settings = array();
			$settings['sub-title']	=	$_POST['mytheme']['blog']['sub-title'];
			$settings['page-layout']  = $_POST['mytheme']['blog']['page-layout'];
			$settings['post-layout']  = $_POST['mytheme']['blog']['post-layout'];
			$settings['post-per-page']  = $_POST['mytheme']['blog']['post-per-page'];
			$settings['exclude-cats']  = $_POST['mytheme']['blog']['exclude_cats'];
			$settings['excerpt-length'] = $_POST['mytheme']['blog']['excerpt-length'];
			
			$settings['dark-bg'] 		= $_POST['mytheme']['blog']['dark-bg'];
			$settings['bottm-shadow'] 	= $_POST['mytheme']['blog']['bottm-shadow'];
			$settings['apply-pattern'] 	= $_POST['mytheme']['blog']['apply-pattern'];
			$settings['pattern'] 		= $_POST['mytheme']['blog']['pattern'];

			#BG Settings
			$settings['page-bg-type'] = $_POST['mytheme']['blog']['page-bg-type'];
			$settings['page-bg-pattern'] = $_POST['mytheme']['blog']['page-bg-pattern'];
			$settings['page-bg-pattern-repeat'] = $_POST['mytheme']['blog']['page-bg-pattern-repeat'];
			$settings['page-bg-pattern-opacity'] = $_POST['mytheme']['blog']['page-bg-pattern-opacity'];
			$settings['disable-page-bg-pattern-color'] = $_POST['mytheme']['blog']['disable-page-bg-pattern-color'];
			$settings['page-bg-pattern-color'] = $_POST['mytheme']['blog']['page-bg-pattern-color'];
			
			$settings['page-custom-bg'] = $_POST['mytheme']['blog']['page-custom-bg'];
			$settings['page-custom-bg-repeat'] = $_POST['mytheme']['blog']['page-custom-bg-repeat'];
			$settings['page-custom-bg-position'] = $_POST['mytheme']['blog']['page-custom-bg-position'];
			$settings['page-custom-bg-opacity'] = $_POST['mytheme']['blog']['page-custom-bg-opacity'];
			$settings['disable-page-custom-bg-color']  = $_POST['mytheme']['blog']['disable-page-custom-bg-color'];
			$settings['page-custom-bg-color'] = $_POST['mytheme']['blog']['page-custom-bg-color'];
			#BG Settings End
			
			$settings['disable-author-info'] = $_POST['mytheme']['blog']['disable-author-info'];
			$settings['disable-date-info'] = $_POST['mytheme']['blog']['disable-date-info'];
			$settings['disable-comment-info'] = $_POST['mytheme']['blog']['disable-comment-info'];
			$settings['disable-category-info'] = $_POST['mytheme']['blog']['disable-category-info'];
			$settings['disable-tag-info'] = $_POST['mytheme']['blog']['disable-tag-info'];
			
			update_post_meta($post_id, "_tpl_blog_settings", array_filter($settings));
			delete_post_meta($post_id, "_tpl_default_settings");
			delete_post_meta($post_id, '_tpl_portfolio_settings');
			
		elseif(isset($_POST["page_template"]) && 'tpl-portfolio.php' == $_POST["page_template"]):
			$settings = array();
			$settings['sub-title']		= $_POST['mytheme']['portfolio']['sub-title'];
			$settings['page-layout']  	= $_POST['mytheme']['portfolio']['page-layout'];
			$settings['post-layout']  	= $_POST['mytheme']['portfolio']['post-layout'];
			$settings['post-per-page']  = $_POST['mytheme']['portfolio']['post-per-page'];
			$settings['cats']  			= $_POST['mytheme']['portfolio']['cats'];
			$settings['filter'] 		= $_POST['mytheme-portfolio-filter'];
			#$settings['excerpt'] 		= $_POST['mytheme-portfolio-excerpt'];
			#$settings['excerpt-length'] = $_POST['mytheme']['portfolio']['excerpt-length'];

			$settings['dark-bg'] 		= $_POST['mytheme']['portfolio']['dark-bg'];
			$settings['bottm-shadow'] 	= $_POST['mytheme']['portfolio']['bottm-shadow'];
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
			
			update_post_meta($post_id, "_tpl_portfolio_settings", array_filter($settings));
			delete_post_meta($post_id, "_tpl_default_settings");
			delete_post_meta($post_id, '_tpl_blog_settings');
		endif;
	}?>