<!-- #specialty-pages -->
<div id="specialty-pages" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
    	 <ul class="sub-panel">
         <?php $sub_menus = array(
					array("title"=>__("Archives",IAMD_TEXT_DOMAIN), "link"=>"#archives"),
					array("title"=>__("Search",IAMD_TEXT_DOMAIN), "link"=>"#search"),
					array("title"=>__("404",IAMD_TEXT_DOMAIN), "link"=>"#404"));
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo $menu['link']?>"><?php echo $menu['title'];?></a></li>
		 <?php endforeach?>
         </ul>
         
         <?php $tabs = array(
			 			array(	"id"=>"archives", 
								"layout-title"=>__("Archives Layout",IAMD_TEXT_DOMAIN),
								"layout-tooltip"=>__("You can choose between a left, right, or no sidebar layout for your Archieve page.",IAMD_TEXT_DOMAIN),								
								
								"post-layout-title" => __("Posts Layout",IAMD_TEXT_DOMAIN),
								"post-layout-tooltip"=>__("Your blog posts will use the layout you select here.",IAMD_TEXT_DOMAIN),								
								
								
								"bg-title"=>__("Archives Background",IAMD_TEXT_DOMAIN),
								"bg-label"=>__("Archives background image",IAMD_TEXT_DOMAIN),
								"bg-tooltip"=>__('Upload an image for the theme\'s Archives page background',IAMD_TEXT_DOMAIN),
								
								//bg Color
								"bg-color-label" =>__("Archives Background Color",IAMD_TEXT_DOMAIN),
								"bg-color-tooltip" =>__("Pick a custom color for background color of the theme's archives page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN)
						 ),
						array(  "id"=>"search",
								"layout-title"=>__("Search Layout",IAMD_TEXT_DOMAIN),
								"layout-tooltip"=>__("You can choose between a left, right, or no sidebar layout for your Search page.",IAMD_TEXT_DOMAIN),								

								"post-layout-title" => __("Posts Layout",IAMD_TEXT_DOMAIN),
								"post-layout-tooltip"=>__("Your blog posts will use the layout you select here.",IAMD_TEXT_DOMAIN),								
								
								"bg-title"=>__("Search Background",IAMD_TEXT_DOMAIN),
								"bg-label"=>__("Search background image",IAMD_TEXT_DOMAIN),
								"bg-tooltip"=>__('Upload an image for the theme\'s Search page background',IAMD_TEXT_DOMAIN),

								//bg Color
								"bg-color-label" =>__("Search Background Color",IAMD_TEXT_DOMAIN),
								"bg-color-tooltip" =>__("Pick a custom color for background color of the theme's search page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN)
								
						),
						array(  "id"=>"404",
								"layout-title"=>__("404 Layout",IAMD_TEXT_DOMAIN),
								"layout-tooltip"=>__("You can choose between a left, right, or no sidebar layout for your 404 page.",IAMD_TEXT_DOMAIN),
								
								"bg-title"=>__("404 Background",IAMD_TEXT_DOMAIN),
								"bg-label"=>__("404 background image",IAMD_TEXT_DOMAIN),
								"bg-tooltip"=>__('Upload an image for the theme\'s 404 page background',IAMD_TEXT_DOMAIN),

								//bg Color
								"bg-color-label" =>__("404 Background Color",IAMD_TEXT_DOMAIN),
								"bg-color-tooltip" =>__("Pick a custom color for background color of the theme's 404 page.(e.g. #a314a3)",IAMD_TEXT_DOMAIN),
								
								"content-title" => __("404 Message",IAMD_TEXT_DOMAIN),
								"content-tooltip"=>__("You can give custom 404 page message",IAMD_TEXT_DOMAIN)
						));?>
        <?php foreach($tabs as $tab): 
				$id =  $tab['id'];?>
        	<div id="<?php echo $id;?>" class="tab-content">
            	 <div class="bpanel-box">
                 
                 	<!-- Section 1 -->	
                    <div class="box-title"><h3><?php echo $tab['layout-title'];?></h3></div>
                    <div class="box-content">
                    	<div class="bpanel-option-set">
                        	<ul class="bpanel-layout-set">
                           	<?php $layout = array('content-full-width'=>'without-sidebar','with-left-sidebar'=>'left-sidebar','with-right-sidebar'=>	'right-sidebar');
							foreach($layout as $key => $value):
								$class = ( $key ==  mytheme_option('specialty',"{$id}-layout")) ? " class='selected' " : "";
								echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
							endforeach; ?>
                            </ul>
                            <input id="mytheme[specialty][<?php echo $id;?>-layout]" name="mytheme[specialty][<?php echo $id;?>-layout]" type="hidden"  
                            	value="<?php echo mytheme_option('specialty',"{$id}-layout");?>"/>
                            <?php mytheme_adminpanel_tooltip($tab['layout-tooltip']);?>    
                        </div>
                    </div><!-- Section 1 End -->
                    
                    <!-- 404 Content -->
                    <?php if($id == "404"): ?>
                        <div class="box-title">
                        	<h3><?php echo $tab['content-title'];?></h3>
                            <?php mytheme_adminpanel_tooltip($tab['content-tooltip']);?>
                        </div>
                        <div class="box-content">

                            <div class="bpanel-option-set">
                                <label><?php _e('404 Custom Message',IAMD_TEXT_DOMAIN);?></label>
                                <textarea id="mytheme-404-text" name="mytheme[specialty][404-message]" rows="" 
                                	cols=""><?php echo stripslashes(mytheme_option('specialty','404-message'));?></textarea>
                            </div>
                            
                            <div class="bpanel-option-set">
                            	<?php mytheme_switch(__("Disable Font Settings",IAMD_TEXT_DOMAIN),'specialty','disable-404-font-settings');?>
                                <?php mytheme_adminpanel_tooltip(__('This is disables the 404 Font settings',IAMD_TEXT_DOMAIN));?> 
                            </div>
                        
                        	<!-- Font Section -->
                        	<div class="one-half-content">
		                        <div class="bpanel-option-set">
									<?php mytheme_admin_fonts(__('Message Font',IAMD_TEXT_DOMAIN),'mytheme[specialty][message-font]',mytheme_option('specialty','message-font'));?>
        	                        <div class="clear"></div>
            	                	<?php mytheme_admin_jqueryuislider(__('Message Font Size',IAMD_TEXT_DOMAIN),"mytheme[specialty][message-font-size]",
									mytheme_option('specialty',"message-font-size"));?>
	                            </div>
                            </div><!-- Font Section -->
                            <!-- Font Color Section -->
                            <div class="one-half-content last">
                            <?php $label = 		__("Message Font Color",IAMD_TEXT_DOMAIN);
                                  $name  =		"mytheme[specialty][message-font-color]";	
                                  $value =  	 (mytheme_option('specialty','message-font-color')!= NULL) ? mytheme_option('specialty','message-font-color') : "#";
                                  $tooltip = 	__("Pick a custom color for 404 message font color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
                                  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                            </div><!-- Font Color Section -->
                                
                        </div>
                    <?php endif;?>
                    <!-- 404 Content End-->

                 </div><!-- .bpanel-box end -->
            </div><!-- .tab-content end -->
        <?php endforeach;?>
    </div>
</div><!-- #specialty-pages end-->