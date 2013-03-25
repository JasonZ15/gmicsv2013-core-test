<!-- #general -->
<div id="general" class="bpanel-content">

    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel"> 
            <li><a href="#my-general"><?php _e("General",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#my-sociable"><?php _e("Sociable",IAMD_TEXT_DOMAIN);?></a></li>
        </ul>
        
        <!-- #my-general-->
        <div id="my-general" class="tab-content">
        
            <!-- .bpanel-box -->
            <div class="bpanel-box">
                    <!-- Logo -->
                    <div class="box-title"><h3><?php _e('Logo',IAMD_TEXT_DOMAIN);?></h3></div>
                    <div class="box-content">
                    
                        <div class="bpanel-option-set">
                      
                        
                        	<?php $logo = array(
									'id'=>		'logo',
									'options'=>		array(
										 				'true'	=> __('Custom Image Logo',IAMD_TEXT_DOMAIN),
														 ''=> 	__('Display Site Title <small><a href="options-general.php">(click here to edit site title)</a></small>',IAMD_TEXT_DOMAIN)
														)
									);
										 
									$output = "";
									$i = 0;
									foreach($logo['options'] as $key => $option):
										$checked = ( $key ==  mytheme_option('general',$logo['id']) ) ? ' checked="checked"' : '';
										$output .= "<label><input type='radio' name='mytheme[general][$logo[id]]' value='{$key}'  $checked />$option</label>";
										if($i == 0):
											$output .='<div class="clear"></div>';
										endif;
									$i++;
									endforeach;
									echo $output;
									mytheme_adminpanel_tooltip(__('You can choose whether you wish to display a custom logo or your site title.',IAMD_TEXT_DOMAIN));?>
                      </div><!-- .bpanel-option-set end-->
                        
                        
                        <div class="bpanel-option-set">
                        	<div class="image-preview-container">
                                <input id="mytheme-logo" name="mytheme[general][logo-url]" type="text" class="uploadfield" readonly="readonly"
                                        value="<?php echo  mytheme_option('general','logo-url');?>" />
                                <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button show_preview" />
                                <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                                <?php mytheme_adminpanel_image_preview(mytheme_option('general','logo-url'),false,'logo.png');?>
                            </div>
                            <?php mytheme_adminpanel_tooltip(__('Upload a logo for your theme, or specify the image address of your online logo.',IAMD_TEXT_DOMAIN));?>
                        </div><!-- .bpanel-option-set -->
                        
						<?php $margins = array(
								array("id"=>"mytheme[general][logo-top-margin]","label"=>__("Top",IAMD_TEXT_DOMAIN),"db-key"=>"logo-top-margin",
									"tooltip"=>__("Input number to set the top space of the logo. The minimum value is 1.",IAMD_TEXT_DOMAIN)),
								array("id"=>"mytheme[general][logo-right-margin]","label"=>__("Right",IAMD_TEXT_DOMAIN),"db-key"=>"logo-right-margin",
									"tooltip"=>__("Input number to set the right space of the logo. The minimum value is 1.",IAMD_TEXT_DOMAIN)),
								array("id"=>"mytheme[general][logo-bottom-margin]","label"=>__("Bottom",IAMD_TEXT_DOMAIN),"db-key"=>"logo-bottom-margin",
									"tooltip"=>__("Input number to set the bottom space of the logo. The minimum value is 1.",IAMD_TEXT_DOMAIN)),
								array("id"=>"mytheme[general][logo-left-margin]","label"=>__("Left",IAMD_TEXT_DOMAIN),"db-key"=>"logo-left-margin",
									"tooltip"=>__("Input number to set the left space of the logo. The minimum value is 1.",IAMD_TEXT_DOMAIN)));
							
								$count = 1;
								foreach($margins as $margin):
									$last = ($count%2 == 0)?"last":'';
									echo "<div class='one-half-content {$last}'>";
									echo '<div class="bpanel-option-set">';
									echo mytheme_admin_jqueryuislider($margin['label'],$margin['id'],mytheme_option('general',$margin['db-key']));									
									echo '<div class="clear"></div>';
									mytheme_adminpanel_tooltip($margin['tooltip']);									
									echo '</div>';
									echo '</div>';
								$count++;
								endforeach;?>
                    </div> <!-- Logo End -->

                    <!-- Favicon -->
                    <div class="box-title">
                        <h3><?php _e('Favicon',IAMD_TEXT_DOMAIN);?></h3>
                        <?php mytheme_adminpanel_tooltip(__('Upload a favicon for your theme, or specify the image address of your online.',IAMD_TEXT_DOMAIN));?>
                    </div>
                    <div class="box-content">
                        <?php $checked = ( "true" ==  mytheme_option('general','enable-favicon') ) ? ' checked="checked"' : ''; ?>
                        <?php $switchclass = ( "true" ==  mytheme_option('general','enable-favicon') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                        <div data-for="enable-favicon" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input class="hidden" id="enable-favicon" name="mytheme[general][enable-favicon]" type="checkbox" 
                        value="true" <?php echo $checked;?> />
                        <label><?php _e('Enable Favicon',IAMD_TEXT_DOMAIN);?></label>
                        <div class="clear"></div>
                    
                        <input id="mytheme-favicon" name="mytheme[general][favicon-url]" type="text" class="uploadfield" 
                        	value="<?php echo  mytheme_option('general','favicon-url');?>" />
                        <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button" />
                        <input type="button" value="<?php _e('Remove',IAMD_TEXT_DOMAIN);?>" class="upload_image_reset" />
                    </div> <!-- Favicon End -->

                    <!-- Others -->
                    <div class="box-title"><h3><?php _e('Others', IAMD_TEXT_DOMAIN);?></h3></div>
                    <div class="box-content">
                    
                        <div class="bpanel-option-set">
                        	<?php $checked = ( "true" ==  mytheme_option('general','disable-page-comment') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  mytheme_option('general','disable-page-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-page-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input class="hidden" id="mytheme-global-page-comment" name="mytheme[general][disable-page-comment]" type="checkbox" 
                            value="true" <?php echo $checked;?> />
                            <label><?php _e('Globally Disable Comments on Pages',IAMD_TEXT_DOMAIN);?></label>
                            <?php mytheme_adminpanel_tooltip(__('Check if you want to disable comments on pages.<br/> This will globally override your "Allow comments." option under your pages "Discussion" settings. ',IAMD_TEXT_DOMAIN));?>
                        </div>

                        <div class="bpanel-option-set">
                        	<?php $checked = ( "true" ==  mytheme_option('general','global-post-comment') ) ? ' checked="checked"' : ''; ?>
                            <?php $switchclass = ( "true" ==  mytheme_option('general','global-post-comment') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-post-comment" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input class="hidden" id="mytheme-global-post-comment" name="mytheme[general][global-post-comment]" type="checkbox" 
                            value="true" <?php echo $checked;?> />
                            <label><?php _e('Globally Disable Comments on Posts',IAMD_TEXT_DOMAIN);?></label>
                            <?php mytheme_adminpanel_tooltip(__('Check if you want to disable comments on posts.<br/> This will globally override your "Allow comments." option under your posts "Discussion" settings. ',IAMD_TEXT_DOMAIN));?>
                        </div>
                        
                        <!-- <div class="bpanel-option-set">
                            <?php $switchclass = ( "on" ==  mytheme_option('general','disable-breadcrumb') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-breadcrumb-disable" class="checkbox-switch <?php echo $switchclass;?>"></div>
							<input class="hidden" id="mytheme-global-breadcrumb-disable" name="mytheme[general][disable-breadcrumb]" type="checkbox" 
							<?php checked(mytheme_option('general','disable-breadcrumb'),'on');?>/>                            
                            <label><?php _e('Globally Disable Breadcrumbs',IAMD_TEXT_DOMAIN);?></label>
                            <?php mytheme_adminpanel_tooltip(__('Check if you do not want breadcrumbs to display anywhere in your site.',IAMD_TEXT_DOMAIN));?>
                        </div>
                        
                        <div class="bpanel-option-set">
                            <label><?php _e('Breadcrumb Delimiter',IAMD_TEXT_DOMAIN);?></label>
                            <input id="mytheme-breadcrumb-delimiter" name="mytheme[general][breadcrumb-delimiter]" type="text" class="small" 
                            value="<?php echo htmlspecialchars(mytheme_option('general','breadcrumb-delimiter'));?>" />
                             <?php mytheme_adminpanel_tooltip(__('This is the symbol that will appear in between your breadcrumbs.<br /><br />Some common examples would be:<br /><br /><pre>/ > - , :: >></pre>',IAMD_TEXT_DOMAIN));?>
                        </div> -->
                        
                        <div class="bpanel-option-set">
                            <?php $switchclass = ( "on" ==  mytheme_option('general','disable-picker') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-disable-picker" class="checkbox-switch <?php echo $switchclass;?>"></div>
							<input class="hidden" id="mytheme-global-disable-picker" name="mytheme[general][disable-picker]" type="checkbox" 
							<?php checked(mytheme_option('general','disable-picker'),'on');?>/>                            
                            <label><?php _e('Disable Style Picker',IAMD_TEXT_DOMAIN);?></label>
                            <?php mytheme_adminpanel_tooltip(__('Check if you do not want disable the front end style picker option',IAMD_TEXT_DOMAIN));?>
                        </div>

                        <div class="bpanel-option-set">
                            <?php $switchclass = ( "on" ==  mytheme_option('general','disable-import') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                            <div data-for="mytheme-global-import-disable" class="checkbox-switch <?php echo $switchclass;?>"></div>
							<input class="hidden" id="mytheme-global-import-disable" name="mytheme[general][disable-import]" type="checkbox" 
							<?php checked(mytheme_option('general','disable-import'),'on');?>/>                            
                            <label><?php _e('Disable import dummy content',IAMD_TEXT_DOMAIN);?></label>
                            <?php mytheme_adminpanel_tooltip(__('Check if you do not want disable the import option at the top :)',IAMD_TEXT_DOMAIN));?>
                        </div>
                        
                        
                    </div>                                            
                    
            </div><!-- .bpanel-box end-->
        </div><!--#my-general end-->
        
        

        <!-- #my-sociable-->
        <div id="my-sociable" class="tab-content">
            <!-- .bpanel-box -->
            <div class="bpanel-box">
            
                <div class="box-title">
                	<h3><?php _e('Sociable',IAMD_TEXT_DOMAIN);?></h3><?php mytheme_adminpanel_tooltip(__('You can add List of Social icons here.',IAMD_TEXT_DOMAIN));?>
                </div><!-- .box-title -->

                <div class="box-content">
                    <div class="bpanel-option-set">
                    
                         <label><?php _e('Show Sociable',IAMD_TEXT_DOMAIN);?></label>
                    	 <?php $switchclass = ( "on" ==  mytheme_option('general','show-sociables') ) ? 'checkbox-switch-on' :'checkbox-switch-off'; ?>
                         <div data-for="mytheme-show-sociables" class="checkbox-switch <?php echo $switchclass;?>"></div>
						 <input class="hidden" id="mytheme-show-sociables" name="mytheme[general][show-sociables]" type="checkbox" 
						 <?php checked(mytheme_option('general','show-sociables'),'on');?>/>
                         
                         <div class="hr_invisible"></div>
                          	
                         <!-- <label><?php _e('Sociable',IAMD_TEXT_DOMAIN);?></label> -->
                         <input type="button" value="<?php _e('Add New Sociable',IAMD_TEXT_DOMAIN);?>" class="black mytheme_add_item" />
                    </div>
                    
                    <div class="bpanel-option-set">
                        <ul class="menu-to-edit">
                        <?php $socials = mytheme_option('social');
						      if(is_array($socials)): 
							  	$keys = array_keys($socials);
								$i=0;
						 	  foreach($socials as $s):?>
                              <li id="<?php echo $keys[$i];?>">
                                <div class="item-bar">
                                    <span class="item-title"><?php $n = $s['icon']; $n = explode('.',$n); $n = ucwords($n[count($n) - 2]); echo $n;?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit',IAMD_TEXT_DOMAIN);?></a></span>
                                </div>
                                <div class="item-content" style="display: none;">
                                	<span><label><?php _e('Sociable Icon',IAMD_TEXT_DOMAIN);?></label>
										<?php echo mytheme_sociables_selection($keys[$i],$s['icon']);?></span>
                                        
                                    <span><label><?php _e('Custom Icon',IAMD_TEXT_DOMAIN);?></label>
                                    	<?php $img = ( array_key_exists('custom-image',$s)) ? $s['custom-image'] : ''; ?>
                                        <input type="text" class="uploadfield" name="mytheme[social][<?php echo $keys[$i];?>][custom-image]" value="<?php echo $img;?>"/>
                                        <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button" />
                                    </span>
                                    
                                    <span><label><?php _e('Sociable Link',IAMD_TEXT_DOMAIN);?></label>
                                    	<input type="text" class="social-link" name="mytheme[social][<?php echo $keys[$i];?>][link]" value="<?php echo $s['link']?>"/>
                                    </span>
                                    
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove',IAMD_TEXT_DOMAIN);?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel',IAMD_TEXT_DOMAIN);?></span>
                                    </div>
                                </div>
                              </li>
                        <?php $i++;endforeach; endif;?> 
                        </ul>
                        
                        <ul class="sample-to-edit" style="display:none;">
                        	<!-- Social Item -->
                            <li>
                            	<!-- .item-bar -->
                            	<div class="item-bar">
                                	<span class="item-title"><?php _e('Sociable',IAMD_TEXT_DOMAIN);?></span>
                                    <span class="item-control"><a class="item-edit"><?php _e('Edit',IAMD_TEXT_DOMAIN);?></a></span>
                                </div><!-- .item-bar -->
                                <!-- .item-content -->
                                <div class="item-content">                                
                                	<span><label><?php _e('Sociable Icon',IAMD_TEXT_DOMAIN);?></label><?php echo mytheme_sociables_selection();?></span>
                                    <span><label><?php _e('Custom Icon',IAMD_TEXT_DOMAIN);?></label><input type="text" class="uploadfield"/>
                                        <input type="button" value="<?php _e('Upload',IAMD_TEXT_DOMAIN);?>" class="upload_image_button" /></span>
                                    <span><label><?php _e('Sociable Link',IAMD_TEXT_DOMAIN);?></label><input type="text" class="social-link" /></span>
                                    <div class="remove-cancel-links">
                                        <span class="remove-item"><?php _e('Remove',IAMD_TEXT_DOMAIN);?></span>
                                        <span class="meta-sep"> | </span>
                                        <span class="cancel-item"><?php _e('Cancel',IAMD_TEXT_DOMAIN);?></span>
                                    </div>
                                </div><!-- .item-content end -->
                            </li><!-- Social Item End-->
                        </ul>
                        
                    </div>
                </div> <!-- .box-content -->    
                
                
            </div><!-- .bpanel-box end -->
        </div><!--#my-sociable end-->

    </div><!-- .bpanel-main-content end-->
</div><!-- #general end-->