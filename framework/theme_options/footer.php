<!-- #general -->
<div id="theme-footer" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-footer"><?php _e("Footer",IAMD_TEXT_DOMAIN);?></a></li>
        </ul>
        

        <!-- #my-footer-->
        <div id="my-footer" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e('Footer',IAMD_TEXT_DOMAIN);?></h3>
                </div>
                
                <div class="box-content">
                
                    <div class="bpanel-option-set">

                         <label><?php _e('Show Footer',IAMD_TEXT_DOMAIN);?></label>
                    	 <?php $switchclass = ( "on" ==  mytheme_option('general','show-footer') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-footer" class="checkbox-switch <?php echo $switchclass;?>"></div>
						 <input class="hidden" id="mytheme-show-footer" name="mytheme[general][show-footer]" type="checkbox" 
						 <?php checked(mytheme_option('general','show-footer'),'on');?>/>
                         <div class="hr_invisible"></div>
                    
                        <label><?php _e('Footer Column Layout',IAMD_TEXT_DOMAIN);?></label>
                        <ul class="bpanel-layout-set">
                        <?php $footer_layouts = array(
									1=>'one-column',							2=>'one-half-column',
									3=>'one-third-column',						4=>'one-fourth-column',
									5=>'onefourth-onefourth-onehalf-column',	6=>'onehalf-onefourth-onefourth-column',
									7=>'onefourth-threefourth-column',			8=>'threefourth-onefourth-column',
									9=>'onethird-twothird-column',				10=>'twothird-onethird-column');?>
                        <?php foreach($footer_layouts as $k => $v): $class = ( $k ==  mytheme_option('general','footer-columns')) ? " class='selected' " : "";?>
                       		<li><a href="#" rel="<?php echo $k;?>" <?php echo $class;?>><img src="<?php echo IAMD_FW_URL."theme_options/images/columns/{$v}.png";?>" /></a></li>	
                        <?php endforeach;?>
                        </ul><input id="mytheme[general][footer-columns]" name="mytheme[general][footer-columns]" type="hidden"
                        			value="<?php echo  mytheme_option('general','footer-columns');?>"/>
                        <?php mytheme_adminpanel_tooltip(__('Select which column layout you would like to display with your footer.',IAMD_TEXT_DOMAIN));?>
                    </div><!-- .bpanel-option-set -->
                    

                    
                    
                    <div class="bpanel-option-set">
                         <label><?php _e('Show Copyright Text',IAMD_TEXT_DOMAIN);?></label>
                    	 <?php $switchclass = ( "on" ==  mytheme_option('general','show-copyrighttext') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-copyrighttext" class="checkbox-switch <?php echo $switchclass;?>"></div>
						 <input class="hidden" id="mytheme-show-copyrighttext" name="mytheme[general][show-copyrighttext]" type="checkbox" 
						 <?php checked(mytheme_option('general','show-copyrighttext'),'on');?>/>
                         <div class="hr_invisible"></div>
                    
                        <label><?php _e('Copyright Text',IAMD_TEXT_DOMAIN);?></label>
                        <textarea id="mytheme-copyright-text" name="mytheme[general][copyright-text]"
                        	rows="" cols=""><?php echo htmlspecialchars (stripslashes(mytheme_option('general','copyright-text')));?></textarea>
                        <?php mytheme_adminpanel_tooltip(__('You can paste your copyright text in this box. This will be automatically added to the footer.',IAMD_TEXT_DOMAIN));?>
                    </div><!-- .bpanel-option-set -->
                    
                </div> <!-- .box-content -->
            
            </div><!-- .bpanel-box end -->
        </div><!--#my-footer end-->
        
    </div><!-- .bpanel-main-content end-->
</div><!-- #general end-->