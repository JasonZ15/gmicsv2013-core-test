<!-- #mobile -->
<div id="mobile" class="bpanel-content">
  <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-responsive"><?php _e("Responsive",IAMD_TEXT_DOMAIN);?></a></li>        
        </ul>
        
        <!-- #my-responsive start --> 
        <div id="my-responsive" class="tab-content">
        	<div class="bpanel-box">
                <!-- Responsive Layout Options start -->
                <div class="box-title"><h3><?php _e('Responsive',IAMD_TEXT_DOMAIN);?></h3></div>
                <div class="box-content">
                
	                <div class="one-half-content">
    	            	<div class="bpanel-option-set">
                          <label><?php _e("Make My Site Responsive",IAMD_TEXT_DOMAIN);?></label>
                          <?php $checked = ( "true" ==  mytheme_option('mobile','is-theme-responsive') ) ? ' checked="checked"' : ''; ?>
                          <?php $switchclass = ( "true" ==  mytheme_option('mobile','is-theme-responsive') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                          <div data-for="is-theme-responsive" class="checkbox-switch <?php echo $switchclass;?>"></div>
                          <input class="hidden" id="is-theme-responsive" name="mytheme[mobile][is-theme-responsive]" type="checkbox" value="true" <?php echo $checked;?> />
        	            </div>
                     </div>

	                <div class="one-half-content last">
    	            	<div class="bpanel-option-set">
	                      <label><?php _e('Disable Slider for Mobile Devices',IAMD_TEXT_DOMAIN);?></label>
                          <?php $checked = ( "true" ==  mytheme_option('mobile','is-slider-disabled') ) ? ' checked="checked"' : ''; ?>
                          <?php $switchclass = ( "true" ==  mytheme_option('mobile','is-slider-disabled') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                          <div data-for="is-slider-disabled" class="checkbox-switch <?php echo $switchclass;?>"></div>
                          <input class="hidden" id="is-slider-disabled" name="mytheme[mobile][is-slider-disabled]" type="checkbox" value="true" <?php echo $checked;?> />
                         <?php mytheme_adminpanel_tooltip(__('Choose what to display in the slider area of your website on mobile devices',IAMD_TEXT_DOMAIN));?>            
        	            </div>
                    </div>
                </div><!-- Responsive Layout Options end -->
            
            </div>
        </div><!-- #my-responsive end -->
        
     </div><!-- .bpanel-main-content end-->   
</div><!-- #mobile end -->