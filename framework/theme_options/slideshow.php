<!-- #slideshow -->
<div id="slideshow" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-sliders"><?php _e("Sliders",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#my-cycle"><?php _e("Cycle Slider",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#my-nivo"><?php _e("Nivo Slider",IAMD_TEXT_DOMAIN);?></a></li>
			<li><a href="#my-touch"><?php _e("Touch Slider",IAMD_TEXT_DOMAIN);?></a></li>            
        </ul>
        
        <!-- #my-sliders -->
        <div id="my-sliders">
        	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
                <div class="box-title">
                	<h3><?php _e('Sliders',IAMD_TEXT_DOMAIN);?></h3>
                    <?php mytheme_adminpanel_tooltip(__('You can select any number of silders. And you can re-arrange by drag - drop',IAMD_TEXT_DOMAIN));?>
                </div>
                <div class="box-content">
                	<!-- Used Sliders -->
                	<h3><?php _e("Used Sliders",IAMD_TEXT_DOMAIN);?></h3>
                    <p id="j-no-images-container"><?php _e('Please, add some sliders',IAMD_TEXT_DOMAIN); ?></p>
                    <ul id="j-used-sliders-containers">
                    <?php $sliders = is_array(mytheme_option('sliders')) ? mytheme_option('sliders') : array(); 
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
						echo "<input type='hidden' name='mytheme[sliders][]' value='{$p->ID}'/>";
						echo "</li>";
					endforeach;?>

                    </ul><!-- Used Sliders End -->
                    
                    <!-- Available Sliders -->
	                <h3 class="slider-info"><?php _e("Available Sliders",IAMD_TEXT_DOMAIN);?></h3>
                    <ul id="j-available-sliders">
                    <?php global $post;
                        $args = array( 'post_type' => 'slide', 'orderby' => 'id', 'order' => 'ASC', 'posts_per_page' => 6 );
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
                    
                </div><!--.box-content -->
            </div><!-- .bpanel-box -->    
        </div>	
        <!-- #my-sliders end-->

        <!-- #my-cycle -->
        <div id="my-cycle">
        	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
                <div class="box-title"><h3><?php _e('Cycle Slider Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                	<!-- Effects -->
                   	<div class="bpanel-option-set">
                    	<label><?php _e('Transition effects',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
                        <?php $cycle_transition = array("fade","scrollLeft","scrollRight","scrollUp","scrollDown","slideX","slideY","turnUp","turnDown","turnLeft","turnRight","zoom","fadeZoom","blindX","blindY","blindZ","growX","growY","curtainX","curtainY","cover","uncover","toss","wipe","shuffle","scrollHorz","scrollVert");
						 sort($cycle_transition);
						 $t = is_array(mytheme_option('cycle','effects')) ? mytheme_option('cycle','effects') : array();
						 foreach($cycle_transition as $transition): ?>
                        	<label class="one-third"><input type="checkbox" name="mytheme[cycle][effects][]" value="<?php echo($transition);?>" 
							<?php checked(in_array(esc_attr($transition),$t)); ?> />
							<?php echo(esc_html($transition));?></label>
				  <?php	 endforeach;?>
                  <?php mytheme_adminpanel_tooltip(__("You can choose Transition effects here.",IAMD_TEXT_DOMAIN));?>
                    </div>
                    <!-- Effects End -->
                    

                     <!-- Width & Height Config -->
                     <div class="bpanel-option-set">
                     	<label><?php _e('Slider Width x Height (in px)',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
                        <input type="text" class="medium" name="mytheme[cycle][width]" value="<?php echo esc_html(mytheme_option('cycle','width'));?>" />
                        <input type="text" class="medium" name="mytheme[cycle][height]" value="<?php echo(esc_html(mytheme_option('cycle','height')));?>" />
                        <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?>
                     </div><!-- Width & Height Config End-->

                    
                </div><!--.box-content -->
            </div><!-- .bpanel-box -->    
            
            <!-- Easing -->
        	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
                <div class="box-title"><h3><?php _e('Easing',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                <?php  $easings_types = array("easeInQuad","easeOutQuad","easeInOutQuad","easeInCubic","easeOutCubic","easeInOutCubic","easeInQuart","easeOutQuart","easeInOutQuart","easeInQuint","easeOutQuint","easeInOutQuint","easeInSine","easeOutSine","easeInOutSine","easeInExpo","easeOutExpo","easeInOutExpo","easeInCirc","easeOutCirc","easeInOutCirc","easeInElastic","easeOutElastic","easeInOutElastic","easeInBack","easeOutBack","easeInOutBack","easeInBounce","easeOutBounce","easeInOutBounce");
				
					$easing_options = array(array("id"=>"easing","label"=>__("Easing",IAMD_TEXT_DOMAIN),"options"=>$easings_types,
												"tooltip"=>__("Easing method for both in and out transitions",IAMD_TEXT_DOMAIN)),
											array("id"=>"easeIn","label"=>__("EaseIn",IAMD_TEXT_DOMAIN),"options"=>$easings_types,
												"tooltip"=>__("easing for 'in' transition",IAMD_TEXT_DOMAIN)),
											array("id"=>"easeOut","label"=>__("EaseOut",IAMD_TEXT_DOMAIN),"options"=>$easings_types,
												"tooltip"=>__("easing for 'out' transition",IAMD_TEXT_DOMAIN)));
												
					foreach( $easing_options as $easing_option ): ?>
                    <div class="bpanel-option-set">
                    	<label><?php echo $easing_option["label"]?></label>
                        <p><select name="mytheme[cycle][<?php echo $easing_option["id"];?>]">
                        		<option value=""> <?php _e("Select",IAMD_TEXT_DOMAIN);?></option>
                                <?php foreach($easing_option["options"] as $value ):
										$rs = selected($value,mytheme_option('cycle', $easing_option["id"]),false);
										echo "<option value='{$value}' {$rs} >{$value}</option>";
									   endforeach;?>
                            </select></p>
                        <?php mytheme_adminpanel_tooltip($easing_option["tooltip"]);?>
                    </div>
              <?php endforeach;?>
                </div>
            </div><!-- .bpanel-box-->
            <!-- Easing End -->
            
            <!-- Speed -->
            <div class="bpanel-box">
            	<div class="box-title"><h3><?php _e('Speed',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                	<?php $cycle_speed_settings = array(
							array(
								"id"=>			"speed",
								"label"=>		__("Speed",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("speed of the transition (any valid fx speed value ,eg:1000)",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"speed_in",
								"label"=>		__("Speed In",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("speed of the 'in' transition (eg:2500)",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"speed_out",
								"label"=>		__("Speed Out",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("speed of the 'out' transition (eg : 500)",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"delay_time",
								"label"=>		__("Delay Time",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("additional delay (in ms) for first transition (hint: can be negative)",IAMD_TEXT_DOMAIN)
							)
						);
					$count = 1;
					foreach($cycle_speed_settings as $cycle_speed):	?>
                        <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                            <div class="bpanel-option-set">
                                <label><?php echo $cycle_speed["label"];?></label>
                                <div class="clear"></div>
                                <input type="text" class="medium" name="mytheme[cycle][<?php echo $cycle_speed["id"];?>]"
                                 value="<?php echo mytheme_option('cycle',$cycle_speed["id"]);?>" />
                                <?php mytheme_adminpanel_tooltip($cycle_speed["tooltip"]);?>    
                            </div>
                        </div>
			<?php $count++;
				 endforeach;?>
                </div>
            </div>
            <!-- Speed end -->
            
            <!-- Others -->
            <div class="bpanel-box">
            	<div class="box-title"><h3><?php _e('Others',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                <?php $cycle_others = array(
						'pause_on_hover' =>			__('Would you like to pasue the slider on hover?',IAMD_TEXT_DOMAIN),
						'random_start'=>			__('Would you like to use random slider?',IAMD_TEXT_DOMAIN),
						'direction_nav'=>			__('Would you like to show slider navigation?',IAMD_TEXT_DOMAIN),
						'control_nav'=>				__('Would you like to show control navigation on bottom of slider?',IAMD_TEXT_DOMAIN),
						'control_nav_hover'=>		__('Would you like to pause the slider on control navigation hover?',IAMD_TEXT_DOMAIN),
						'sync'=>					__('Disable (It cause transitions should not occur simultaneously).',IAMD_TEXT_DOMAIN));

							foreach($cycle_others as $key => $value):
								$rs = checked($key,mytheme_option('cycle',$key),false);
								echo "<label class='one-half'>\r";
								echo "<input type='checkbox' name='mytheme[cycle][{$key}]' value='{$key}' {$rs} /> {$value}";
								echo "</label>\r";
							endforeach;?>
                </div>
            </div><!-- .bpanel-boxend -->
            <!-- Others End -->
            
        </div>	
        <!-- #my-cycle end-->


        <!-- #my-nivo -->
        <div id="my-nivo">
        	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
                <div class="box-title"><h3><?php _e('Nivo Slider Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                
                	 <!-- Effects -->	
                     <div class="bpanel-option-set">
                        <label><?php _e('Choose effects',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
                        <?php $effects = array("sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random","slideInRight","slideInLeft","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse");
                        sort($effects);
						$e =  is_array(mytheme_option('nivo','effects')) ? mytheme_option('nivo','effects') : array();
                        foreach( $effects as $effect):?>
                        	<label class="one-third"><input type="checkbox" name="mytheme[nivo][effects][]" value="<?php echo($effect);?>" 
							<?php checked(in_array(esc_attr($effect),$e)); ?> />
							<?php echo(esc_html($effect));?></label>
                        <?php endforeach;?>
                        <?php mytheme_adminpanel_tooltip(__("You can choose animation effects here.",IAMD_TEXT_DOMAIN));?>
                     </div><!-- .bpanel-option-set-->
                	 <!-- Effects End-->
                     
                     <!-- Width & Height Config -->
                     <div class="bpanel-option-set">
                     	<label><?php _e('Slider Width x Height (in px)',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
                        <input type="text" class="medium" name="mytheme[nivo][width]" value="<?php echo esc_html(mytheme_option('nivo','width'));?>" />
                        <input type="text" class="medium" name="mytheme[nivo][height]" value="<?php echo(esc_html(mytheme_option('nivo','height')));?>" />
                        <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?>
                     </div><!-- Width & Height Config End-->
                     
                     <?php $nivo_settings = array( 
					 		array(
								"id"=>			"speed",
								"label"=>		__("Animation Speed",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("Please enter slider transition(eg: 500) in ms",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"pause_time",
								"label"=>		__("Pause Time",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("Please enter slider pause time(eg: 3000) in ms",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"box_cols",
								"label"=>		__("Box Animation Columns",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("For box animation( boxRain, boxRainGrow, boxRainGrowReverse, boxRainReverse and boxRandom ), you can give number of columns(eg: 5)",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"box_rows",
								"label"=>		__("Box Animation Rows",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("For box animation( boxRain, boxRainGrow, boxRainGrowReverse, boxRainReverse and boxRandom ), you can give number of rows(eg: 8)",IAMD_TEXT_DOMAIN)
							),
							array(
								"id"=>			"slices",
								"label"=>		__("Slices",IAMD_TEXT_DOMAIN),
								"tooltip"=>		__("For slice animation( SliceDown, SliceDownLeft, SliceUp, SliceUpDown, sliceUpDownLeft and sliceUpLeft ), you can give number of slices here. For eg: 15",IAMD_TEXT_DOMAIN)
							)
						);
						$count = 1;
						
                        foreach($nivo_settings as $nivo_setting):?>
                            <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                                <div class="bpanel-option-set">
                                    <label><?php echo $nivo_setting["label"];?></label>
                                    <div class="clear"></div>
                                    <input type="text" class="medium" name="mytheme[nivo][<?php echo $nivo_setting["id"];?>]"
                                     value="<?php echo mytheme_option('nivo',$nivo_setting["id"]);?>" />
                                    <?php mytheme_adminpanel_tooltip($nivo_setting["tooltip"]);?>    
                               </div>
                           </div>
	             <?php $count++; 
					 	   endforeach;?>	
                     
                     <!-- Others -->
                     <div class="bpanel-option-set">
                        <label><?php _e('Others',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
                        <?php $nivo_others = array(
								'pause_on_hover' =>	__('Would you like to pasue the slider on hover?',IAMD_TEXT_DOMAIN),
								'random_start'=>	__('Would you like to use random slider?',IAMD_TEXT_DOMAIN),
								'direction_nav'=>	__('Would you like to show slider navigation?',IAMD_TEXT_DOMAIN),
								'control_nav'=>		__('Would you like to show control navigation on bottom of slider?',IAMD_TEXT_DOMAIN));
								
							foreach($nivo_others as $key => $value):
								$rs = checked($key,mytheme_option('nivo',$key),false);
								echo "<label class='one-half'>\r";
								echo "<input type='checkbox' name='mytheme[nivo][{$key}]' value='{$key}' {$rs} /> {$value}";
								echo "</label>\r";
							endforeach;?>
                     </div>
                     <!-- Others end-->
                                          
                </div><!--.box-content -->
            </div><!-- .bpanel-box -->    
        </div>	
        <!-- #my-nivo end-->

        <!-- #my-touch -->
        <div id="my-touch">
        	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
            	
                <!-- BG Settings -->
                <div class="box-title"><h3><?php _e('Background Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                	<!-- Background Settings -->
                    <div class="bpanel-option-set">
                        <label><?php _e('Background Image',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
	                      <div class="image-preview-container">	
                              <input id="mytheme[touch_slider][bg]" name="mytheme[touch_slider][bg]" type="text" class="uploadfield" readonly="readonly"
                              value="<?php echo mytheme_option('touch_slider','bg');?>" />
                              <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                              <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                              <?php mytheme_adminpanel_image_preview(mytheme_option('touch_slider','bg'));?>
                           </div>   
                              <?php mytheme_adminpanel_tooltip(__("Upload an image for slider background.",IAMD_TEXT_DOMAIN));?>
                    </div>	
                    <!-- Background Settings End -->
                    
                    <!-- BG Animation -->
                    <div class="bpanel-option-set">
                    <label>
                    	<input type="checkbox" id="mytheme[touch_slider][bg_animation]" name="mytheme[touch_slider][bg_animation]" 
                        value="bg_animation" <?php checked('bg_animation',mytheme_option('touch_slider','bg_animation'));?>  />
                        <?php _e('Enable fullscreen background animation.',IAMD_TEXT_DOMAIN);?>
                    </label>
                        
                     <?php mytheme_adminpanel_tooltip(__("Check if you want to enable the fullscreen background animation for touch slider.",IAMD_TEXT_DOMAIN));?>       
                    </div>
                    <!-- BG Animation End -->

                    <!-- BG Animation -->
                    <div class="bpanel-option-set">
                    <label>
                    	<input type="checkbox" id="mytheme[touch_slider][bg_move_animation]" name="mytheme[touch_slider][bg_move_animation]"
                        value="bg_move_animation" <?php checked('bg_move_animation',mytheme_option('touch_slider','bg_move_animation'));?>/>
                        <?php _e('Enable background move animation.',IAMD_TEXT_DOMAIN);?>
                    </label>
                     <?php mytheme_adminpanel_tooltip(__("Check if you want to enable the fullscreen background moving animation for touch slider.",IAMD_TEXT_DOMAIN));?>       
                    </div>
                    <!-- BG Animation End -->
                </div><!--.box-content -->
                <!-- BG Settings End -->
                
                <!-- Pagination Settings -->
                <div class="box-title"><h3><?php _e('Pagination Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                    <!-- Auto Hide -->
                    <div class="bpanel-option-set">
                    <label>
                    	<input id="mytheme[touch_slider][pagination_auto_hide]" name="mytheme[touch_slider][pagination_auto_hide]" type="checkbox"
                         value="pagination_auto_hide" <?php checked('pagination_auto_hide',mytheme_option('touch_slider','pagination_auto_hide'));?>/>
                        <?php _e('Auto hide.',IAMD_TEXT_DOMAIN);?>
                    </label>
                     <?php mytheme_adminpanel_tooltip(__("Check if you want to enable the auto hide option for the pagination in touch slider.",IAMD_TEXT_DOMAIN));?>       
                    </div>
                    <!-- Auto Hide End -->
                    
                    <!-- Pagination type-->
                    <div class="one-half-content">
                    	<div class="bpanel-option-set">
                            <label><?php _e("Alignment",IAMD_TEXT_DOMAIN);?></label>
                            <div class="clear"></div>
                            <?php $pagination_alignment = array(""=>	__("Select",IAMD_TEXT_DOMAIN),
																"BC"=>	__("Bottom Center",IAMD_TEXT_DOMAIN),
																"TL"=>	__("Top Left",IAMD_TEXT_DOMAIN),
																"TC"=>	__("Top Center",IAMD_TEXT_DOMAIN),
																"TR"=>	__("Top Right",IAMD_TEXT_DOMAIN),
																"BL"=>	__("Bottom Left",IAMD_TEXT_DOMAIN),
																"BR"=>	__("Bottom Right",IAMD_TEXT_DOMAIN),
																"LC"=>	__("Left Center",IAMD_TEXT_DOMAIN),
																"RC"=>	__("Right Center",IAMD_TEXT_DOMAIN),
																"C"=>	__("Center",IAMD_TEXT_DOMAIN));
																
								  echo "<select name='mytheme[touch_slider][pagination_alignment]' id='mytheme[touch_slider][pagination_alignment]'>\r"; 
									foreach($pagination_alignment as $key => $value):
										$rs = selected($key,mytheme_option('touch_slider','pagination_alignment'),false);
										echo "<option value='$key' {$rs}>{$value}</option>";
									endforeach;
								  echo "</select>";?>
                            <?php mytheme_adminpanel_tooltip(__("Choose pagination alignment for touch slider.",IAMD_TEXT_DOMAIN));?> 
                        </div>
                    </div>
                    
                    <div class="one-half-content last">
                    	<div class="bpanel-option-set">
                            <label><?php _e("Type",IAMD_TEXT_DOMAIN);?></label>
                            <div class="clear"></div>
                            <?php $pagination_type = array(""=>__("Select",IAMD_TEXT_DOMAIN),0=>__("Bullets",IAMD_TEXT_DOMAIN)
														,1=>__("Bullets with BG",IAMD_TEXT_DOMAIN),2=>__("Decimal",IAMD_TEXT_DOMAIN));
							echo "<select name='mytheme[touch_slider][pagination_type]' id='mytheme[touch_slider][pagination_type]'>\r"; 
									foreach($pagination_type as $key => $value):
										$rs = selected($key,mytheme_option('touch_slider','pagination_type'),false);
										echo "<option value='$key' {$rs} >{$value}</option>";
									endforeach;
							echo "</select>";?>                            
                            <?php mytheme_adminpanel_tooltip(__("Choose pagination type for touch slider.",IAMD_TEXT_DOMAIN));?> 
                        </div>
                    </div>
                    <!-- Pagination type end-->
                    
                </div>
                <!-- Pagination Settings End-->
                
                <!-- Navigation Settings -->
                <div class="box-title"><h3><?php _e('Navigation Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                
                    <!-- Auto Hide -->
                    <div class="one-half-content">
                    <div class="bpanel-option-set">
                    <label>
                    	<input type="checkbox" id="mytheme[touch_slider][navigation_auto_hide]" name="mytheme[touch_slider][navigation_auto_hide]"
                        	value="navigation_auto_hide" <?php checked('navigation_auto_hide',mytheme_option('touch_slider','navigation_auto_hide'));?>/>
                        <?php _e('Disable auto-hide navigation.',IAMD_TEXT_DOMAIN);?>
                    </label>
                     <?php mytheme_adminpanel_tooltip(__("Disable auto-hide navigation.",IAMD_TEXT_DOMAIN));?>       
                    </div>
                    </div>
                    <!-- Auto Hide End -->
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
                             <div class="clear"></div>
                             <select id="mytheme[touch_slider][<?php echo $touch_nav['id']?>]" name="mytheme[touch_slider][<?php echo $touch_nav['id']?>]">
                             	<?php foreach($touch_nav['options'] as $key => $value):
										 $rs = selected($key,mytheme_option('touch_slider',$touch_nav['id']),false);	
		                                 echo "<option value='$key' {$rs} >{$value}</option>";
                               		endforeach;?>
                             </select>
                             <?php mytheme_adminpanel_tooltip($touch_nav['tooltip']);?>
                            </div>
                         </div>
                    <?php $i++;
					endforeach;?>     
                    <!-- Navigation Other End -->        
                </div>
                <!-- Navigation Settings End -->
                
                <!-- Others -->
                <div class="box-title"><h3><?php _e('Others',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
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
							$rs = checked($id,mytheme_option('touch_slider',$id),false);
							
								echo "<div class='one-half-content {$last}'>";
								echo "	<div class='bpanel-option-set'>";
								echo "	<label>";
								echo "  <input id='mytheme[touch_slider][{$id}]' name='mytheme[touch_slider][{$id}]' type='checkbox' value='{$id}'  {$rs} />";
								echo 	$t_other['label']."</label>";
										mytheme_adminpanel_tooltip($t_other['tooltip']);
								echo "	</div>";
								echo "</div>";
							$i++;
							endforeach;?>
                            <div class="one-half-content">
                                <div class="bpanel-option-set">
                                    <label><?php _e("Delay Time",IAMD_TEXT_DOMAIN);?></label>
                                    <div class="clear"></div>
                                    <input type="text" class="medium" name="mytheme[touch_slider][delay_time]" value="<?php echo mytheme_option('touch_slider','delay_time');?>" />
									<?php mytheme_adminpanel_tooltip(__("Additional delay time of slideshow animation in seconds. (eg:) 2",IAMD_TEXT_DOMAIN));?>
                               </div>
                           </div>
                           
                           <div class="one-half-content last">
                             <!-- Width & Height Config -->
                             <div class="bpanel-option-set">
                                <label><?php _e('Slider Width x Height (in px)',IAMD_TEXT_DOMAIN);?></label>
                                <div class="clear"></div>
                                <input type="text" class="small" name="mytheme[touch_slider][width]" value="<?php echo esc_html(mytheme_option('touch_slider','width'));?>" />X
                                <input type="text" class="small" name="mytheme[touch_slider][height]" value="<?php echo(esc_html(mytheme_option('touch_slider','height')));?>" />
                                <?php mytheme_adminpanel_tooltip(__("For better view,<ol><li>Please re-upload all the slider images with the correct dimensions.</li><li>The slider height should be above 300px.</li></ol>",IAMD_TEXT_DOMAIN));?>
                             </div><!-- Width & Height Config End-->
                           </div>
                           
                </div>
                <!-- Other End -->
            </div><!-- .bpanel-box -->
                
        </div>
        <!-- #my-sliders end-->
     </div><!-- .bpanel-main-content end-->
</div><!-- #slideshow end -->