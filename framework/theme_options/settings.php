<?php
/** mytheme_options_page()
  * Objective:
  *		To create thme option page at back end.
**/
function mytheme_options_page(){ ?>
<?php  #$a = get_option(IAMD_THEME_SETTINGS); var_dump($a);?>
<!-- wrapper -->
<div id="wrapper">

	<!-- Result -->
    <div id="bpanel-message" style="display:none;"></div>
    <div id="ajax-feedback" style="display:none;">
    <!--<img src="<?php echo esc_url(admin_url('images/loading.gif' ))?>" alt="" />--><img src="<?php echo IAMD_FW_URL.'theme_options/images/loading.gif';?>" alt="" title=""/> 
    </div>
    <!-- Result -->


	<!-- panel-wrap -->
	<div id="panel-wrap">
    
       	<!-- bpanel-wrapper -->
        <div id="bpanel-wrapper">
        
           	<!-- bpanel -->
           	<div id="bpanel">
            
                	<!-- bpanel-left -->
                	<div id="bpanel-left">
                    	<div id="logo"> 
                        <?php $logo =  IAMD_FW_URL.'theme_options/images/logo.png';
							  $advance = mytheme_option('advance');
							  if(isset($advance['buddhapanel-logo-url']) && isset( $advance['enable-buddhapanel-logo-url'])):
							  	$logo = $advance['buddhapanel-logo-url'];
							  endif;?>
                        <img src="<?php echo $logo;?>" width="186" height="101" alt="" title="" /> </div>                        
                        <?php $status = mytheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') || mytheme_is_plugin_active('wordpress-seo/wp-seo.php');
							  $tabs = NULL;
							  if(!$status):
								$tabs = array(
									array('id'=>'general' , 'name'=>__('General',IAMD_TEXT_DOMAIN)),
									array('id'=>'appearance', 'name'=>__('Appearance',IAMD_TEXT_DOMAIN)),
									array('id'=>'skin', 'name'=>__('Skins',IAMD_TEXT_DOMAIN)),
									array('id'=>'integration', 'name'=>__('Integration',IAMD_TEXT_DOMAIN)),
									array('id'=>'seo', 'name'=>__('SEO',IAMD_TEXT_DOMAIN)),									
									array('id'=>'specialty-pages', 'name'=>__('Specialty Pages',IAMD_TEXT_DOMAIN)),
									array('id'=>'theme-footer', 'name'=>__('Footer',IAMD_TEXT_DOMAIN)),																		
									array('id'=>'widgetarea', 'name'=>__('Widget Area',IAMD_TEXT_DOMAIN)),
									array('id'=>'mobile', 'name'=>__('Responsive &amp; Mobile',IAMD_TEXT_DOMAIN)),
									array('id'=>'branding', 'name'=>__('Branding',IAMD_TEXT_DOMAIN)),
									array('id'=>'bbar', 'name'=>__('Buddha Bar',IAMD_TEXT_DOMAIN))
								);
							  else:
								$tabs = array(
									array('id'=>'general' , 'name'=>__('General',IAMD_TEXT_DOMAIN)),
									array('id'=>'appearance', 'name'=>__('Appearance',IAMD_TEXT_DOMAIN)),
									array('id'=>'skin', 'name'=>__('Skins',IAMD_TEXT_DOMAIN)),
									array('id'=>'integration', 'name'=>__('Integration',IAMD_TEXT_DOMAIN)),
									array('id'=>'specialty-pages', 'name'=>__('Specialty Pages',IAMD_TEXT_DOMAIN)),
									array('id'=>'theme-footer', 'name'=>__('Footer',IAMD_TEXT_DOMAIN)),																		
									array('id'=>'widgetarea', 'name'=>__('Widget Area',IAMD_TEXT_DOMAIN)),
									array('id'=>'mobile', 'name'=>__('Responsive &amp; Mobile',IAMD_TEXT_DOMAIN)),
									array('id'=>'branding', 'name'=>__('Branding',IAMD_TEXT_DOMAIN)),
									array('id'=>'bbar', 'name'=>__('Buddha Bar',IAMD_TEXT_DOMAIN))
								);
							  endif;
								
							  $output = "<!-- bpanel-mainmenu -->\n\t\t\t\t\t\t<ul id='bpanel-mainmenu'>\n";
									foreach($tabs as $tab ):
									$output .= "\t\t\t\t\t\t\t\t<li><a href='#{$tab['id']}' title='{$tab['name']}'><span class='{$tab['id']}'></span>{$tab['name']}</a></li>\n";
									endforeach;
							  $output .= "\t\t\t\t\t\t</ul><!-- #bpanel-mainmenu -->\n";
							  echo $output;?>
                    </div><!-- #bpanel-left  end-->
                    
                    <form id="mytheme_options_form" name="mytheme_options_form" method="post" action="options.php">
		                <?php settings_fields(IAMD_THEME_SETTINGS);?>
                        <input type="hidden" id="mytheme-full-submit" name="mytheme-full-submit" value="0" />
                        <input type="hidden" name="mytheme_admin_wpnonce" value="<?php echo wp_create_nonce(IAMD_THEME_SETTINGS.'_wpnonce');?>" />
                        <div class="top-links">
                            <?php  $import_disable = (mytheme_option('general','disable-import') == "on") ? "import-disabled" :""; ?>                        
	                        <a class="mytheme-import-button black-btn <?php echo $import_disable;?>"><?php _e('Import Dummy Data',IAMD_TEXT_DOMAIN);?></a>
                        </div>
                        
                    	<?php get_template_part('framework/theme_options/general');?>
                        <?php get_template_part('framework/theme_options/appearance');?>
                        <?php get_template_part('framework/theme_options/integration');?>
                        <?php get_template_part('framework/theme_options/specialty-pages');?>
                        <?php get_template_part('framework/theme_options/footer');?>
                        <?php get_template_part('framework/theme_options/widgetarea');?>
						<?php get_template_part('framework/theme_options/responsive');?>
                        <?php get_template_part('framework/theme_options/branding');?>
                        <?php get_template_part('framework/theme_options/skins');?>
                        <?php if(!$status):
								get_template_part('framework/theme_options/seo');
							  endif;?>
                        <?php get_template_part('framework/theme_options/bbar');?>
                        <?php get_template_part('framework/theme_options/test');?>
						<!-- #bpanel-bottom -->
                        <div id="bpanel-bottom">
                           <input type="submit" value="<?php _e('Reset All',IAMD_TEXT_DOMAIN);?>" class="save-reset mytheme-reset-button" name="mytheme[reset]" />
						   <input type="submit" value="<?php _e('Save All',IAMD_TEXT_DOMAIN);?>" name="submit"  class="save-reset mytheme-footer-submit" />
                        </div><!-- #bpanel-bottom end-->        
                    </form>

            </div><!-- #bpanel -->
            
            
            
        </div><!-- #bpanel-wrapper -->
    </div><!-- #panel-wrap end -->
</div><!-- #wrapper end-->
<?php
}
### --- ****  mytheme_options_page() *** --- ###
?>