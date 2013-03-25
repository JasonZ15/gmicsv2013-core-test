<!-- #integration -->
<div id="integration" class="bpanel-content">
	<!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">   
            <li><a href="#integration-general"><?php _e("General",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#integration-post"><?php _e("Post",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#integration-page"><?php _e("Page",IAMD_TEXT_DOMAIN);?></a></li>
        </ul>
	    
        <!-- #integration-general-->    
        <div id="integration-general">
        	<?php $integration_general = array( 
					array(
						"title"=>		__('Add code to the &lt;head&gt of your blog',IAMD_TEXT_DOMAIN),
						"tooltip"=>		__('Any code you place here will appear in the head section of every page of your blog. This is useful when you need to add javascript or css to all pages.',IAMD_TEXT_DOMAIN),
						"textarea"=>	"header-code",
						"checkbox"=>	"enable-header-code",
						"label"=>		__('Enable header code',IAMD_TEXT_DOMAIN)
					),
					array(
						"title"=>		__('Add code to the  &lt;/body&gt;',IAMD_TEXT_DOMAIN),
						"tooltip"=>		__('You can paste your Google Analytics or other website tracking code in this box. This will be automatically added to the footer.',IAMD_TEXT_DOMAIN), 
						"textarea"=>	"body-code",
						"checkbox"=>	"enable-body-code",
						"label"=>		__('Enable body code',IAMD_TEXT_DOMAIN)
					)
			);
			
			foreach($integration_general as $i_general): ?>
                <!-- .bpanel-box-->
                <div class="bpanel-box">
                	<div class="box-title"><h3><?php echo $i_general['title'];?></h3><?php mytheme_adminpanel_tooltip($i_general['tooltip']);?></div>
                    <!-- .box-content -->
                	<div class="box-content">
                    	 <?php $switchclass = (mytheme_option('integration',$i_general['checkbox'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
						 <div data-for="<?php echo $i_general['checkbox'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>                         
                         <input id="<?php echo $i_general['checkbox'];?>" class="hidden" type="checkbox" name="mytheme[integration][<?php echo $i_general['checkbox'];?>]" 
                         value="<?php echo $i_general['checkbox'];?>" <?php checked($i_general['checkbox'],mytheme_option('integration',$i_general['checkbox'])); ?> />                         <label><?php echo $i_general['label'];?></label>
                         <div class="clear"></div>
	                     <div class="hr_invisible"></div>
                         <textarea id="mytheme[integration][<?php echo $i_general['textarea']?>]" 
                         	name="mytheme[integration][<?php echo $i_general['textarea']?>]"><?php echo stripslashes(mytheme_option('integration',$i_general['textarea']));?></textarea>
                    </div><!-- .box-content end-->

                </div><!-- .bpanel-box end-->
	  <?php endforeach;?>
        </div><!-- #integration-general end-->

        <!-- #integration-post-->
        <div id="integration-post">
        <?php $integration_post = array(
					array(
						"title"=>		__('Add code to the top of your posts',IAMD_TEXT_DOMAIN),
						"tooltip"=>		__('Any code you place here will be placed at the top of all single posts. This is useful if you are looking to integrating things such as social bookmarking links.',IAMD_TEXT_DOMAIN),
						"textarea"=>	"single-post-top-code", 
						"checkbox"=>	"enable-single-post-top-code",
						"label"=>		__('Enable single post top code',IAMD_TEXT_DOMAIN)
					),
					array(
						"title"=>		__('Add code to the bottom of your posts, before the comments',IAMD_TEXT_DOMAIN),
						"tooltip"=>		__('Any code you place here will be placed at the top of all single posts. This is useful if you are looking to integrating things such as social bookmarking links.',IAMD_TEXT_DOMAIN),
						"textarea"=>	"single-post-bottom-code",
						"checkbox"=>	"enable-single-post-bottom-code",
						"label"=>		__('Enable single post bottom code',IAMD_TEXT_DOMAIN)
					));
				foreach($integration_post as $i_post): ?>
                	<!-- .bpanel-box-->
                    <div class="bpanel-box">
                    	<div class="box-title"><h3><?php echo $i_post['title'];?></h3><?php mytheme_adminpanel_tooltip($i_post['tooltip']);?></div>
                        
                        <!-- .box-content -->
                        <div class="box-content">
                   	    	<?php $switchclass = (mytheme_option('integration',$i_post['checkbox'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
							<div data-for="<?php echo $i_post['checkbox'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input id="<?php echo $i_post['checkbox'];?>" class="hidden" type="checkbox" name="mytheme[integration][<?php echo $i_post['checkbox'];?>]"
                            value="<?php echo $i_post['checkbox'];?>" <?php checked($i_post['checkbox'],mytheme_option('integration',$i_post['checkbox'])); ?>/>
                            <label><?php echo $i_post['label'];?></label>
                            <div class="clear"></div>
                            <div class="hr_invisible"></div>
                    	<textarea id="mytheme[integration][<?php echo $i_post['textarea']?>]"  name="mytheme[integration][<?php echo $i_post['textarea']?>]"><?php echo stripslashes(mytheme_option('integration',$i_post['textarea']));?></textarea>
                    	</div><!-- .box-content end-->
                </div><!-- .bpanel-box end-->
        <?php	endforeach;?>
        

            <!-- Socialshare Module -->
            <!-- .bpanel-box-->
            <div class="bpanel-box">
            
                <div class="box-title">
                    <h3><?php _e("Social Shares",IAMD_TEXT_DOMAIN); ?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Please choose appropriate social media share options and its layout to show in post.",IAMD_TEXT_DOMAIN));?>
                </div>
                
                <div class="box-content">
                <?php global $mytheme_social_bookmarks;
                    $count = 1;
                    foreach($mytheme_social_bookmarks as $social_bookmark):?>
                        <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                        <div class="bpanel-option-set">
                         <label><?php echo $social_bookmark["label"];?></label>
                            <?php $switchclass = (mytheme_option('integration',"post-".$social_bookmark['id'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                            <div data-for="<?php echo "post-".$social_bookmark['id'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            
                            <input id="<?php echo "post-".$social_bookmark['id'];?>" type="checkbox" name="mytheme[integration][<?php echo "post-".$social_bookmark['id'];?>]" 
                            value="<?php echo $social_bookmark['id'];?>" <?php checked($social_bookmark['id'],mytheme_option('integration',"post-".$social_bookmark['id']));?>
                            class="hidden"/>
                            <div class="hr_invisible"></div>
                            <?php if(array_key_exists("username",$social_bookmark)):?>
                                <div class="clear"></div>
                                <?php _e("Username",IAMD_TEXT_DOMAIN);?>
                                <div class="clear"></div>
                                <input type="text" class="medium" name="mytheme[integration][<?php echo "post-".$social_bookmark['id']."-username";?>]"
                                     value="<?php echo mytheme_option('integration',"post-".$social_bookmark['id']."-username");?>" />
                                <br/><br/>
                            <?php endif;?>
                            
                            
                            <?php if( array_key_exists("options",$social_bookmark)):?>
                                <div class="clear"></div>
                                <?php _e("Layout",IAMD_TEXT_DOMAIN);?>
                                <select name="mytheme[integration][<?php echo "post-".$social_bookmark['id']."-layout";?>]">
                                <?php 	foreach($social_bookmark['options'] as $key => $value):
                                            $rs = selected($key,mytheme_option('integration',"post-".$social_bookmark['id']."-layout"),false); ?>
                                            <option value="<?php echo $key?>" <?php echo $rs;?>><?php echo $value?></option>
                                <?php	endforeach;?>
                                </select>                                
                            <?php endif;?>
    
                            <?php if(array_key_exists("color-scheme",$social_bookmark)): ?>
                                <div class="clear"></div><br/>
                                <?php _e("Color Scheme",IAMD_TEXT_DOMAIN);?>
                                <select name="mytheme[integration][<?php echo "post-".$social_bookmark['id']."-color-scheme";?>]">
                                    <?php foreach($social_bookmark['color-scheme'] as $options):
                                            $rs = selected($options,mytheme_option('integration',"post-".$social_bookmark['id']."-color-scheme"),false);?>
                                            <option value="<?php echo $options?>" <?php echo $rs;?>><?php echo $options?></option>
                                    <?php endforeach;?>
                                </select>
                            <?php endif;?>
    
                            <?php if(array_key_exists('lang',$social_bookmark)):?>
                                <div class="clear"></div><br/>
                                <?php _e("Language",IAMD_TEXT_DOMAIN);?>
                                    <select name="mytheme[integration][<?php echo "post-".$social_bookmark['id']."-lang";?>]">
                                    <?php foreach($social_bookmark['lang'] as $key => $value): 
                                            $rs = selected($key,mytheme_option('integration',"post-".$social_bookmark['id']."-lang"),false);?>
                                        <option value="<?php echo $key?>" <?php echo $rs;?>><?php echo $value?></option>
                                    <?php endforeach;?>
                                    </select>
                            <?php endif;?>
    
                            <?php if(array_key_exists("text",$social_bookmark)):?>
                                <div class="clear"></div>
                                <?php _e("Default Text",IAMD_TEXT_DOMAIN);?>
                                <div class="clear"></div>
                                <input type="text" class="medium" name="mytheme[integration][<?php echo "post-".$social_bookmark['id']."-text";?>]"
                                     value="<?php echo mytheme_option('integration',"post-".$social_bookmark['id']."-text");?>" />
                                <br/><br/>
                            <?php endif;?>
                         </div><!-- bpanel-option-set-->
                    </div><!-- .one-half-content-->
                  <?php $count++;
                      endforeach;?>
                </div><!--.box-content end-->
            </div><!-- .bpanel-box end -->    
            <!-- Socialshare Module -->
            
            <!-- Social Bookmark module -->
            <!-- .bpanel-box-->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e("Social Bookmark",IAMD_TEXT_DOMAIN); ?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Please choose appropriate social media bookmark options and its layout to show in post.",IAMD_TEXT_DOMAIN));?>
                </div>
                <div class="box-content">
                	<?php global $mytheme_social_bookmarks;
					  $count = 1;
						foreach($mytheme_social_bookmarks as $social_bookmark):?>
                        <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                            <div class="bpanel-option-set">
                             <label><?php echo $social_bookmark["label"];?></label>
                                <?php $switchclass = (mytheme_option('integration',"sb-post-".$social_bookmark['id'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                                <div data-for="<?php echo "sb-post-".$social_bookmark['id'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                                <input id="<?php echo "sb-post-".$social_bookmark['id'];?>" type="checkbox" 
                                	name="mytheme[integration][<?php echo "sb-post-".$social_bookmark['id'];?>]" value="<?php echo $social_bookmark['id'];?>" 
									<?php checked($social_bookmark['id'],mytheme_option('integration',"sb-post-".$social_bookmark['id']));?>
                                class="hidden"/>
                            </div>
                        </div>
                <?php  $count++;
						 endforeach;?>  
                </div>
            </div><!-- Social Bookmark module end-->
            
        
        </div><!-- #integration-post end-->
        


        <div id="integration-page">
        	<?php $integration_page = array( 
					array(
						"title"=>		__('Add code to the top of your pages',IAMD_TEXT_DOMAIN),
						"tooltip"=>		__('Any code you place here will be placed at the top of all single pages. This is useful if you are looking to integrating things such as social bookmarking links.',IAMD_TEXT_DOMAIN),
						"textarea"=>	"single-page-top-code",
						"checkbox"=>	"enable-single-page-top-code",
						"label"=>		__('Enable single page top code',IAMD_TEXT_DOMAIN)
					),
					array(
						"title"=>		__('Add code to the bottom of your pages, before the comments',IAMD_TEXT_DOMAIN),
						"tooltip"=>		__('Any code you place here will be placed at the top of all single pages. This is useful if you are looking to integrating things such as social bookmarking links.',IAMD_TEXT_DOMAIN),
						"textarea"=>	"single-page-bottom-code",
						"checkbox"=>	"enable-single-page-bottom-code",
						"label"=>		__('Enable single page bottom code',IAMD_TEXT_DOMAIN)
					)
				);
			foreach($integration_page as $i_page): ?>
                <!-- .bpanel-box-->
                <div class="bpanel-box">
                	<div class="box-title"><h3><?php echo $i_page['title'];?></h3><?php mytheme_adminpanel_tooltip($i_page['tooltip']);?></div>
                    
                    <!-- .box-content -->
                	<div class="box-content">
                   	    <?php $switchclass = (mytheme_option('integration',$i_page['checkbox'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
						<div data-for="<?php echo $i_page['checkbox'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                        <input id="<?php echo $i_page['checkbox'];?>" class="hidden" type="checkbox" name="mytheme[integration][<?php echo $i_page['checkbox'];?>]" 
                        value="<?php echo $i_page['checkbox'];?>" <?php checked($i_page['checkbox'],mytheme_option('integration',$i_page['checkbox'])); ?>/>
                        <label><?php echo $i_page['label'];?></label>
	                    <div class="clear"></div>
    	                <div class="hr_invisible"></div>
                    	<textarea id="mytheme[integration][<?php echo $i_page['textarea']?>]" 
                        name="mytheme[integration][<?php echo $i_page['textarea']?>]"><?php echo stripslashes(mytheme_option('integration',$i_page['textarea']));?></textarea>
                    </div><!-- .box-content end-->
                </div><!-- .bpanel-box end-->
	  <?php endforeach;?>
      
            <!-- Socialshare Module -->
            <!-- .bpanel-box-->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e("Social Shares",IAMD_TEXT_DOMAIN); ?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Please choose appropriate social media share options and its layout to show in page.",IAMD_TEXT_DOMAIN));?>
                </div>
                
                <div class="box-content">
                <?php global $mytheme_social_bookmarks;
                    $count = 1;
                    foreach($mytheme_social_bookmarks as $social_bookmark):?>
                        <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                        <div class="bpanel-option-set">
                         <label><?php echo $social_bookmark["label"];?></label>
                            <?php $switchclass = (mytheme_option('integration',"page-".$social_bookmark['id'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                            <div data-for="<?php echo "page-".$social_bookmark['id'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                            <input id="<?php echo "page-".$social_bookmark['id'];?>" type="checkbox" name="mytheme[integration][<?php echo "page-".$social_bookmark['id'];?>]" 
                            value="<?php echo $social_bookmark['id'];?>" <?php checked($social_bookmark['id'],mytheme_option('integration',"page-".$social_bookmark['id']));?>
                            class="hidden"/>
                            <div class="hr_invisible"></div>
                            
                            <?php if(array_key_exists("username",$social_bookmark)):?>
                                <div class="clear"></div>
                                <?php _e("Username",IAMD_TEXT_DOMAIN);?>
                                <div class="clear"></div>
                                <input type="text" class="medium" name="mytheme[integration][<?php echo "page-".$social_bookmark['id']."-username";?>]"
                                     value="<?php echo mytheme_option('integration',"page-".$social_bookmark['id']."-username");?>" />
                                <br/><br/>
                            <?php endif;?>
                            
                            <?php if( array_key_exists("options",$social_bookmark)):?>
                                <div class="clear"></div>
                                <?php _e("Layout",IAMD_TEXT_DOMAIN);?>
                                <select name="mytheme[integration][<?php echo "page-".$social_bookmark['id']."-layout";?>]">
                                <?php 	foreach($social_bookmark['options'] as $key => $value):
                                            $rs = selected($key,mytheme_option('integration',"page-".$social_bookmark['id']."-layout"),false); ?>
                                            <option value="<?php echo $key?>" <?php echo $rs;?>><?php echo $value?></option>
                                <?php	endforeach;?>
                                </select>                                
                            <?php endif;?>
    
                            <?php if(array_key_exists("color-scheme",$social_bookmark)): ?>
                                <div class="clear"></div><br/>
                                <?php _e("Color Scheme",IAMD_TEXT_DOMAIN);?>
                                <select name="mytheme[integration][<?php echo "page-".$social_bookmark['id']."-color-scheme";?>]">
                                    <?php foreach($social_bookmark['color-scheme'] as $options):
                                            $rs = selected($options,mytheme_option('integration',"page-".$social_bookmark['id']."-color-scheme"),false);?>
                                            <option value="<?php echo $options?>" <?php echo $rs;?>><?php echo $options?></option>
                                    <?php endforeach;?>
                                </select>
                            <?php endif;?>
    
                            <?php if(array_key_exists('lang',$social_bookmark)):?>
                                <div class="clear"></div><br/>
                                <?php _e("Language",IAMD_TEXT_DOMAIN);?>
                                    <select name="mytheme[integration][<?php echo "page-".$social_bookmark['id']."-lang";?>]">
                                    <?php foreach($social_bookmark['lang'] as $key => $value): 
                                            $rs = selected($key,mytheme_option('integration',"page-".$social_bookmark['id']."-lang"),false);?>
                                        <option value="<?php echo $key?>" <?php echo $rs;?>><?php echo $value?></option>
                                    <?php endforeach;?>
                                    </select>
                            <?php endif;?>
    
                            <?php if(array_key_exists("text",$social_bookmark)):?>
                                <div class="clear"></div>
                                <?php _e("Default Text",IAMD_TEXT_DOMAIN);?>
                                <div class="clear"></div>
                                <input type="text" class="medium" name="mytheme[integration][<?php echo "page-".$social_bookmark['id']."-text";?>]"
                                     value="<?php echo mytheme_option('integration',"page-".$social_bookmark['id']."-text");?>" />
                                <br/><br/>
                            <?php endif;?>
                            
                         </div><!-- bpanel-option-set-->
                    </div><!-- .one-half-content-->
                  <?php $count++;
                      endforeach;?>
                </div><!--.box-content end-->
            </div><!-- .bpanel-box end -->    
            <!-- Socialshare Module -->
    
            <!-- Social Bookmark module -->
            <!-- .bpanel-box-->
            <div class="bpanel-box">
               <div class="box-title">
                   <h3><?php _e("Social Bookmark",IAMD_TEXT_DOMAIN); ?></h3>
                   <?php mytheme_adminpanel_tooltip(__("Please choose appropriate social media bookmark options and its layout to show in page.",IAMD_TEXT_DOMAIN));?>
               </div>
               <div class="box-content">
               <?php global $mytheme_social_bookmarks;
                      $count = 1;
                      foreach($mytheme_social_bookmarks as $social_bookmark):?>
                        <div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                            <div class="bpanel-option-set">
                                <label><?php echo $social_bookmark["label"];?></label>
                                <?php $switchclass = (mytheme_option('integration',"sb-page-".$social_bookmark['id'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                                 <div data-for="<?php echo "sb-page-".$social_bookmark['id'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                                 <input id="<?php echo "sb-page-".$social_bookmark['id'];?>" type="checkbox"  value="<?php echo $social_bookmark['id'];?>" 
                                    name="mytheme[integration][<?php echo "sb-page-".$social_bookmark['id'];?>]" 
                                    <?php checked($social_bookmark['id'],mytheme_option('integration',"sb-page-".$social_bookmark['id']));?>
                                    class="hidden"/>
                                </div>
                            </div>
                    <?php  $count++;
                             endforeach;?>  
                </div>
            </div><!-- Social Bookmark module end-->
        </div><!-- #integration-page end-->
        
   </div><!-- .bpanel-main-content end-->
</div><!-- #integration end-->