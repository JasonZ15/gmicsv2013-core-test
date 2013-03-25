<!-- #Buddha Bar Settings -->
<div id="bbar" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-bar"><?php _e("Bar Settings",IAMD_TEXT_DOMAIN);?></a></li>
        </ul>
        
        <!-- #my-bar-->
        <div id="my-bar" class="tab-content">
        	
            <!-- Settings -->
            <div class="bpanel-box">
		        <div class="box-title"><h3><?php _e('Bar Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                	
                    <div class="one-half-content">
	                	<div class="bpanel-option-set"><?php mytheme_switch(__("Enable Bar",IAMD_TEXT_DOMAIN),'bbar','show-bbar');?></div>
                    </div>

                    <div class="one-half-content last">
	                	<div class="bpanel-option-set"><?php mytheme_switch(__("Show Bar by default",IAMD_TEXT_DOMAIN),'bbar','status-bbar');?></div>
                    </div>

                
                    <div class="one-half-content">
                        <?php $label = 		__("Bar BG Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[bbar][bar-bg-color]";	
                          $value =  	 (mytheme_option('bbar','bar-bg-color')!= NULL) ? mytheme_option('bbar','bar-bg-color') : "#";
                          $tooltip = 	__("Pick a custom budhha bar background color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                          <div class="bpanel-option-set"><?php mytheme_switch(__("Show BG Color",IAMD_TEXT_DOMAIN),'bbar','disable-bg-color');?></div>
                    </div>
                    
                    <div class="one-half-content last">
                        <?php $label = 		__("Shadow Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[bbar][bar-shadow-color]";	
                          $value =  	 (mytheme_option('bbar','bar-shadow-color')!= NULL) ? mytheme_option('bbar','bar-shadow-color') : "#";
                          $tooltip = 	__("Pick a custom budhha shadow color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>
                          <div class="bpanel-option-set"><?php mytheme_switch(__("Show Shadow Color",IAMD_TEXT_DOMAIN),'bbar','disable-shadow-color');?></div>
                    </div>
                          
                </div>
            </div><!-- Settings End-->
            
        
        	<!-- Message Text Settings -->
        	<div class="bpanel-box">
            	<div class="box-title"><h3><?php _e('Message Settings',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                     
                     <div class="bpanel-option-set">
                         <label><?php _e('Message',IAMD_TEXT_DOMAIN);?></label>
                         <textarea id="mytheme-bbar-tmsg" name="mytheme[bbar][message]" rows="" cols=""><?php echo stripslashes(mytheme_option('bbar','message'));?></textarea>
                         <?php mytheme_adminpanel_tooltip(__("You can give custom buddha bar message.",IAMD_TEXT_DOMAIN));?>
                     </div>
                      
                    <div class="one-half-content"> 
                        <div class="bpanel-option-set">
							<?php mytheme_admin_fonts(__('Message Font',IAMD_TEXT_DOMAIN),'mytheme[bbar][message-font]',mytheme_option('bbar','message-font'));?>
                            <div class="clear"></div>
                            <?php mytheme_admin_jqueryuislider(__('Message Font Size',IAMD_TEXT_DOMAIN),"mytheme[bbar][message-font-size]",
								mytheme_option('bbar',"message-font-size"));?>
                            <?php mytheme_adminpanel_tooltip(__("Choose Message Font",IAMD_TEXT_DOMAIN));?>      
                        </div>
                        <div class="bpanel-option-set">
	                        <?php mytheme_switch(__("Disable Font Color",IAMD_TEXT_DOMAIN),'bbar','disable-message-font-color');?>
                        </div>
                        
                    </div>

                    <div class="one-half-content last">
                        <?php $label = 		__("Message Font Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[bbar][message-font-color]";	
                          $value =  	 (mytheme_option('bbar','message-font-color')!= NULL) ? mytheme_option('bbar','message-font-color') : "#";
                          $tooltip = 	__("Pick a custom color message font color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>
                    </div>

                    <div class="one-half-content"> 
                        <?php $label = 		__("Link Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[bbar][link-color]";	
                          $value =  	 (mytheme_option('bbar','link-color')!= NULL) ? mytheme_option('bbar','link-color') : "#";
                          $tooltip = 	__("Pick a custom primary color for links state in buddha bar of the theme e.g. #564912 ",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                    <div class="one-half-content last">
                        <?php $label = 		__("Link hover Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[bbar][link-hover-color]";	
                          $value =  	 (mytheme_option('bbar','link-hover-color')!= NULL) ? mytheme_option('bbar','link-hover-color') : "#";
                          $tooltip = 	__("Pick a custom secondary color for links hover state in buddha bar of the theme e.g. #564912 ",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                </div>
            </div><!-- Message Text Settings End -->
        </div><!-- #my-bar -->
    </div><!-- .bpanel-main-content end-->
</div><!-- #Buddha Bar Settings end-->