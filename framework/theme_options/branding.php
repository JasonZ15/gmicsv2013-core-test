<!-- #advance starts here-->
<div id="branding" class="bpanel-content">
  	<!-- .bpanel-main-content starts here-->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-admin"><?php _e("Admin",IAMD_TEXT_DOMAIN);?></a></li>
        </ul>
        

        <!-- #my-admin starts here --> 
        <div id="my-admin" class="tab-content">
        	<div class="bpanel-box">
           
            <!-- Custom Admin Logo -->
	            <div class="box-title">
                   <h3><?php _e('Custom Admin Login Logo',IAMD_TEXT_DOMAIN);?></h3>
                   <?php mytheme_adminpanel_tooltip(__('Upload an image to replace the default wordpress admin panel login logo (274px*63px).',IAMD_TEXT_DOMAIN));?>
                </div>
                
                <div class="box-content">
					<?php $checked = ( "true" ==  mytheme_option('advance','enable-admin-login-logo-url') ) ? ' checked="checked"' : ''; ?>
                    <?php $switchclass = ( "true" ==  mytheme_option('advance','enable-admin-login-logo-url') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                    <div data-for="enable-admin-login-logo-url" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input class="hidden" id="enable-admin-login-logo-url" name="mytheme[advance][enable-admin-login-logo-url]" type="checkbox" 
                    value="true" <?php echo $checked;?> />
                    <label><?php _e('Enable Admin Login Logo',IAMD_TEXT_DOMAIN);?></label>
                    <div class="clear"></div>
                    <div class="hr_invisible"></div>
                    <div class="hr_invisible"></div>
                
                    <input id="mytheme-admin-login-logo" name="mytheme[advance][admin-login-logo-url]" type="text" class="uploadfield"
                    	value="<?php echo  mytheme_option('advance','admin-login-logo-url');?>" />
                    <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button" />
                    <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                </div><!-- Custom Admin Logo -->

            <!-- Custom Admin Logo -->
	            <div class="box-title">
                   <h3><?php _e('Custom Admin Logo',IAMD_TEXT_DOMAIN);?></h3>
                   <?php mytheme_adminpanel_tooltip(__('Upload an image to replace the default wordpress admin panel logo (20px*20px).<b><i>The image will be shown at the top left corner</i></b>. ',IAMD_TEXT_DOMAIN));?>
                </div>
                
                <div class="box-content">
					<?php $checked = ( "true" ==  mytheme_option('advance','enable-admin-logo-url') ) ? ' checked="checked"' : ''; ?>
                    <?php $switchclass = ( "true" ==  mytheme_option('advance','enable-admin-logo-url') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                    <div data-for="enable-admin-logo-url" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input class="hidden" id="enable-admin-logo-url" name="mytheme[advance][enable-admin-logo-url]" type="checkbox" value="true" <?php echo $checked;?> />
                    <label><?php _e('Enable Admin Logo',IAMD_TEXT_DOMAIN);?></label>
                    <div class="clear"></div>
                    <div class="hr_invisible"></div>
                    <div class="hr_invisible"></div>
                
                    <input id="mytheme-adminlogo" name="mytheme[advance][admin-logo-url]" type="text" class="uploadfield"
                    	value="<?php echo  mytheme_option('advance','admin-logo-url');?>" />
                    <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button" />
                    <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                </div><!-- Custom Admin Logo -->
                
                <!-- Buddha Panel logo -->
                <div class="box-title">
                   <h3><?php _e('Buddha Panel Logo',IAMD_TEXT_DOMAIN);?></h3>
                   <?php mytheme_adminpanel_tooltip(__('Upload an image to replace the default buddha panel logo.<b><i>You can set your own brnad</i></b>. ',IAMD_TEXT_DOMAIN));?>
                </div>
                
                <div class="box-content">
					<?php $checked = ( "true" ==  mytheme_option('advance','enable-buddhapanel-logo-url') ) ? ' checked="checked"' : ''; ?>
                    <?php $switchclass = ( "true" ==  mytheme_option('advance','enable-buddhapanel-logo-url') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                    <div data-for="enable-buddhapanel-logo-url" class="checkbox-switch <?php echo $switchclass;?>"></div>
                    <input class="hidden" id="enable-buddhapanel-logo-url" name="mytheme[advance][enable-buddhapanel-logo-url]" type="checkbox" value="true" 
					<?php echo $checked;?> /><label><?php _e('Enable Buddha Panel Logo',IAMD_TEXT_DOMAIN);?></label>
                    <div class="clear"></div>
                    <div class="hr_invisible"></div>
                    <div class="hr_invisible"></div>
                
                	<div class="image-preview-container">
                        <input id="mytheme-buddhapanellogo" name="mytheme[advance][buddhapanel-logo-url]" type="text" class="uploadfield" readonly="readonly"
                            value="<?php echo  mytheme_option('advance','buddhapanel-logo-url');?>" />
                        <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                        <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                        <?php mytheme_adminpanel_image_preview(mytheme_option('advance','buddhapanel-logo-url'),true,'logo.png');?>
                    </div>
                    
                </div><!-- Buddha Panel logo -->
                
                
            </div> <!-- .bpanel-box ends here -->
        </div><!-- #my-admin ends here -->
     </div><!-- .bpanel-main-content ends here-->   
</div><!-- #advance ends here -->