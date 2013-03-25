<!-- #appearance -->
<div id="appearance" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
			<?php $sub_menus = array(
						array("title"=>__("Menu",IAMD_TEXT_DOMAIN), "link"=>"#appearance-menu"),
						array("title"=>__("Header",IAMD_TEXT_DOMAIN), "link"=>"#appearance-header"),
						array("title"=>__("Body",IAMD_TEXT_DOMAIN), "link"=>"#appearance-body"),
						array("title"=>__("Footer",IAMD_TEXT_DOMAIN), "link"=>"#appearance-footer"),
						array("title"=>__("Typography",IAMD_TEXT_DOMAIN), "link"=>"#appearance-typography"));
						
				  foreach($sub_menus as $menu): ?>
                  	<li><a href="<?php echo $menu['link']?>"><?php echo $menu['title'];?></a></li>
			<?php endforeach?>
        </ul>
        <!-- Background Type-->
        <?php $args = array("bg-patterns"=>__("Pattern",IAMD_TEXT_DOMAIN),"bg-custom"=>__("Custom Background",IAMD_TEXT_DOMAIN),"bg-none"=>__("None",IAMD_TEXT_DOMAIN)); ?>
        
        <!-- Menu Section -->
        <div id="appearance-menu" class="tab-content">
        	<div class="bpanel-box">
            
                <div class="bpanel-option-set">
					<?php mytheme_switch(__("Disable Menu Settings",IAMD_TEXT_DOMAIN),'appearance','disable-menu-settings');?>
                    <?php mytheme_adminpanel_tooltip(__('This is disables the menu settings',IAMD_TEXT_DOMAIN));?> 
                </div>

                
                <!-- Header Font -->
                <div class="box-title"><h3><?php _e('Menu Font',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                    <div class="bpanel-option-set">
                        <?php mytheme_admin_fonts(__('Menu Font',IAMD_TEXT_DOMAIN),'mytheme[appearance][menu-font]',mytheme_option('appearance','menu-font'));?>
                        <div class="clear"></div>
                        <?php mytheme_admin_jqueryuislider(__('Menu Font Size',IAMD_TEXT_DOMAIN),"mytheme[appearance][menu-font-size]",
						mytheme_option('appearance',"menu-font-size"));?>
                        <?php mytheme_adminpanel_tooltip(__('Change the menu font',IAMD_TEXT_DOMAIN));?>
                    </div>

                    <div class="one-half-content">
                    <?php $label = 		__("Primary Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[appearance][menu-primary-color]";	
						  $value =  	(mytheme_option('appearance','menu-primary-color') != NULL) ? mytheme_option('appearance','menu-primary-color') : "#";
                          $tooltip = 	__("Pick a custom primary color for menu are of the theme e.g. #551256",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                    <div class="one-half-content last">
                    <?php $label = 		__("Secondary Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[appearance][menu-secondary-color]";	
						  $value =  	(mytheme_option('appearance','menu-secondary-color')  != NULL) ? mytheme_option('appearance','menu-secondary-color') : "#";
                          $tooltip = 	__("Pick a custom secondary color for hover state in menu are of the theme e.g. #564912",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>
                </div><!-- Header Font End-->
            </div>
        </div><!-- Menu Section (#appearance-menu) End-->
        
        <!-- Header Section -->
        <div id="appearance-header" class="tab-content">
	        <div class="bpanel-box">
            
            <!-- Header Settings -->
             <div class="box-title"><h3><?php _e('Header',IAMD_TEXT_DOMAIN);?></h3></div>
             	<div class="box-content">
	            	
                    <div class="bpanel-option-set">
                        <?php mytheme_switch(__("Disable Header Settings",IAMD_TEXT_DOMAIN),'appearance','disable-header-settings');?>
                        <?php mytheme_adminpanel_tooltip(__('This is disables the header settings',IAMD_TEXT_DOMAIN));?> 
                    </div>
                	
                    <div class="clear"></div>
                    <div class="hr-invisible"></div>
                
               		<div class="one-half-content">
	                <?php $label = 		__("Header Border Color",IAMD_TEXT_DOMAIN);
    	                  $name  =		"mytheme[appearance][header-border-color]";	
        	              $value =  	(mytheme_option('appearance','header-border-color')  != NULL) ? mytheme_option('appearance','header-border-color') : "#";
            	          $tooltip = 	__("Pick a custom color for border color of the theme's header section.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
                	      mytheme_admin_color_picker($label,$name,$value,$tooltip);?></div>

               		<div class="one-half-content last">
	                <?php $label = 		__("Header BG Color",IAMD_TEXT_DOMAIN);
    	                  $name  =		"mytheme[appearance][header-bg-color]";	
        	              $value =  	(mytheme_option('appearance','header-bg-color')  != NULL) ? mytheme_option('appearance','header-bg-color') : "#";
            	          $tooltip = 	__("Pick a custom color for background color of the theme's header section.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
                	      mytheme_admin_color_picker($label,$name,$value,$tooltip);?></div>
                          
                </div><!-- Header Settings End -->

            
            </div>
        </div><!-- Header Section End-->
        
        
        <!-- Body Section -->
        <div id="appearance-body" class="tab-content">
        	<div class="bpanel-box">

                <div class="bpanel-option-set">
					<?php mytheme_switch(__("Disable Body Settings",IAMD_TEXT_DOMAIN),'appearance','disable-boddy-settings');?>
                    <?php mytheme_adminpanel_tooltip(__('This is disables the body settings',IAMD_TEXT_DOMAIN));?> 
                </div>
            
            	
                <!-- Body Font Settings -->
                <div class="box-title"><h3><?php _e('Body Font',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                
                	<div class="one-half-content">
                    	<div class="bpanel-option-set">
                        <?php mytheme_admin_fonts(__('Body Font',IAMD_TEXT_DOMAIN),'mytheme[appearance][body-font]',
													  mytheme_option('appearance','body-font'));?>
                        <div class="clear"></div>
                        <?php mytheme_admin_jqueryuislider(__('Body Font Size',IAMD_TEXT_DOMAIN),"mytheme[appearance][body-font-size]",
                              mytheme_option('appearance',"body-font-size"));?>
                                                      
                        <?php mytheme_adminpanel_tooltip(__('Change the body font',IAMD_TEXT_DOMAIN));?>	
                        </div>
                    </div>

                	<div class="one-half-content last">
                    <?php $label = 		__("Body Font Color",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme[appearance][body-font-color]";	
						  $value =  	(mytheme_option('appearance','body-font-color') != NULL) ? mytheme_option('appearance','body-font-color') :"#";
						  $tooltip = 	__("Pick a custom color for body/content font color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
						  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                	<div class="one-half-content">
                    <?php $label = 		__("Primary Color (default color for links, buttons)",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme[appearance][body-primary-color]";	
						  $value =  	(mytheme_option('appearance','body-primary-color') != NULL) ? mytheme_option('appearance','body-primary-color') :"#";
						  $tooltip = 	__("Pick a custom primary color for links and buttons in body/content are of the theme e.g. #551256",IAMD_TEXT_DOMAIN);
						  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                	<div class="one-half-content last">
                    <?php $label = 		__("Secondary Color (hover color for links, buttons)",IAMD_TEXT_DOMAIN);
						  $name  =		"mytheme[appearance][body-secondary-color]";
						  $value =  	(mytheme_option('appearance','body-secondary-color') != NULL) ? mytheme_option('appearance','body-secondary-color') :"#";
						  $tooltip = 	__("Pick a custom secondary color for links and buttons hover state in body/content are of the theme e.g. #564912",IAMD_TEXT_DOMAIN);
						  mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>
                </div>
                <!-- Body Font Settings End-->
                 
            </div>
        </div><!-- Body Section(#appearance-body) end -->
        
        <!-- Footer Section -->
        <div id="appearance-footer" class="tab-content">
        	<div class="bpanel-box">

                <div class="bpanel-option-set">
					<?php mytheme_switch(__("Disable Footer Settings",IAMD_TEXT_DOMAIN),'appearance','disable-footer-settings');?>
                    <?php mytheme_adminpanel_tooltip(__('This is disables the footer settings',IAMD_TEXT_DOMAIN));?> 
                </div>
            
            
                <!-- Footer Font -->
                <div class="box-title"><h3><?php _e('Footer Font',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                
                    <div class="one-half-content">
                        <div class="bpanel-option-set">
							<?php mytheme_admin_fonts(__('Footer Title Font',IAMD_TEXT_DOMAIN),'mytheme[appearance][footer-title-font]',
							mytheme_option('appearance','footer-title-font'));?>
                            <div class="clear"></div>
                            <?php mytheme_admin_jqueryuislider(__('Footer Font Size',IAMD_TEXT_DOMAIN),"mytheme[appearance][footer-font-size]",
								  mytheme_option('appearance',"footer-font-size"));?>
                            
                            <?php mytheme_adminpanel_tooltip(__('Change the footer font',IAMD_TEXT_DOMAIN));?>
                        </div>
                    </div>
                    
                    <div class="one-half-content last">
                    <?php $label = 		__("Footer Title Font Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[appearance][footer-title-font-color]";
						  $value =  	(mytheme_option('appearance','footer-title-font-color') != NULL) ? mytheme_option('appearance','footer-title-font-color') :"#";
						  $tooltip = 	__("Pick a custom color for footer font color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                    <div class="one-half-content">
                    <?php $label = 		__("Primary Color (default color for links, buttons)",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[appearance][footer-primary-color]";	
						  $value =  	(mytheme_option('appearance','footer-primary-color') != NULL) ? mytheme_option('appearance','footer-primary-color') :"#";
                          $tooltip = 	__("Pick a custom primary color for links and buttons in footer are of the theme e.g. #551256",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                    <div class="one-half-content last">
                    <?php $label = 		__("Secondary Color (hover color for links, buttons)",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[appearance][footer-secondary-color]";	
						  $value =  	(mytheme_option('appearance','footer-secondary-color') != NULL) ? mytheme_option('appearance','footer-secondary-color') :"#";
                          $tooltip = 	__("Pick a custom secondary color for links and buttons hover state in footer are of the theme e.g. #564912",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>

                    <div class="one-half-content">
                        <div class="bpanel-option-set">
							<?php mytheme_admin_fonts(__('Footer Content Font',IAMD_TEXT_DOMAIN),'mytheme[appearance][footer-content-font]',
							mytheme_option('appearance','footer-content-font'));?>
                            <div class="clear"></div>
                            <?php mytheme_admin_jqueryuislider(__('Footer Content Font Size',IAMD_TEXT_DOMAIN),"mytheme[appearance][footer-content-font-size]",
								  mytheme_option('appearance',"footer-content-font-size"));?>
                            <?php mytheme_adminpanel_tooltip(__('Change the footer content font',IAMD_TEXT_DOMAIN));?>
                        </div>
                    </div>
                    
                    <div class="one-half-content last">
                    <?php $label = 		__("Footer Content Font Color",IAMD_TEXT_DOMAIN);
                          $name  =		"mytheme[appearance][footer-content-font-color]";
						  $value =  	(mytheme_option('appearance','footer-content-font-color') != NULL) ? mytheme_option('appearance','footer-content-font-color') :"#";
						  $tooltip = 	__("Pick a custom color for footer font color of the theme e.g. #a314a3",IAMD_TEXT_DOMAIN);
                          mytheme_admin_color_picker($label,$name,$value,$tooltip);?>                    
                    </div>
                    
                    <?php $label = 		__("Footer BG Color",IAMD_TEXT_DOMAIN);
    	                  $name  =		"mytheme[appearance][footer-bg-color]";	
        	              $value =  	(mytheme_option('appearance','footer-bg-color')  != NULL) ? mytheme_option('appearance','footer-bg-color') : "#";
            	          $tooltip = 	__("Pick a custom color for background color of the theme's foter section.(e.g. #a314a3)",IAMD_TEXT_DOMAIN);
                	      mytheme_admin_color_picker($label,$name,$value,$tooltip);?>
                    
                </div>
                <!-- Footer Font End-->
			
            
            </div>
        </div><!-- Footer Section (#appearance-footer) End-->
        
        
        <!-- Typography Section -->
        <div id="appearance-typography" class="tab-content">
	        <div class="bpanel-box">
            
                <div class="bpanel-option-set">
					<?php mytheme_switch(__("Disable Typography Settings",IAMD_TEXT_DOMAIN),'appearance','disable-typography-settings');?>
                    <?php mytheme_adminpanel_tooltip(__('This is disables the typography settings',IAMD_TEXT_DOMAIN));?> 
                </div>
            
            	<?php for($i=1;$i<=6;$i++): ?>
                    <div class="box-title">
                    	<h3><?php echo "H{$i} ";?><?php _e('Font and Color',IAMD_TEXT_DOMAIN);?></h3>
                        <?php mytheme_adminpanel_tooltip(__("Change Font and Color for",IAMD_TEXT_DOMAIN)." H{$i}");?>
                    </div>
                    <div class="box-content">
                         <div class="one-half-content">
                            <div class="bpanel-option-set">
                            	<?php mytheme_admin_fonts("H{$i} ".__('Font',IAMD_TEXT_DOMAIN),"mytheme[appearance][H{$i}-font]",mytheme_option('appearance',"H{$i}-font"));?>
                                <div class="clear"></div>
                                <?php mytheme_admin_jqueryuislider("H{$i} ".__('Font Size',IAMD_TEXT_DOMAIN),
									"mytheme[appearance][H{$i}-size]",mytheme_option('appearance',"H{$i}-size"));?>
                            </div>
                         </div>
                         <div class="one-half-content last">
							<?php $label = 		"H{$i} ".__("Font Color",IAMD_TEXT_DOMAIN);
                                  $name  =		"mytheme[appearance][H{$i}-font-color]";
                                  #$value =  	(mytheme_option('appearance',"H{$i}-font-color") != NULL) ? mytheme_option('appearance',"H{$i}-font-color") :"#123456";
								  #$value =  	mytheme_option('appearance',"H{$i}-font-color");
								  $value =  	(mytheme_option('appearance',"H{$i}-font-color") != NULL) ? mytheme_option('appearance',"H{$i}-font-color") :"#";
                                  mytheme_admin_color_picker($label,$name,$value);?>                    
                         </div>
                    </div>
                <?php endfor;?>
            </div><!-- .bpanel-box end -->
        </div><!-- Typography Section -->

        
    </div><!-- .bpanel-main-content end -->
</div><!-- #appearance  end-->