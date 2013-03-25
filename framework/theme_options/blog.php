<!-- #blog -->
<div id="blog" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#my-blog"><?php _e("Blog",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#my-blog-single"><?php _e("Blog Single",IAMD_TEXT_DOMAIN);?></a></li>        
        </ul>
        
        <!-- #my-blog-->
        <div id="my-blog" class="tab-content">
        
        	<!-- Default Settings -->
        	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
            	<div class="box-title"><h3><?php _e('Blog',IAMD_TEXT_DOMAIN);?></h3></div>
                <!-- .box-content -->
                <div class="box-content">

                    <!-- choose Home page -->
                        <div class="bpanel-option-set">
	                         <label><?php _e('Choose Blog page',IAMD_TEXT_DOMAIN);?></label>
                             <p><?php mytheme_pagelist("blogpage,page",mytheme_option('blogpage','page'));?></p>
                             <?php mytheme_adminpanel_tooltip(__('Select which page to display as your Blog Page. If left blank no blog will be displayed',IAMD_TEXT_DOMAIN));?>
                        </div><!-- .bpanel-option-set -->
                    <!-- choose Home page end -->

                    <!-- Blogpage layout -->
                    <div class="bpanel-option-set">
                           <label><?php _e('Blogpage Layout',IAMD_TEXT_DOMAIN);?></label>
                            <ul class="bpanel-layout-set">
                                <?php $homepage_layout = array('full-width'=>'without-sidebar','left-sidebar'=>'left-sidebar','right-sidebar'=>	'right-sidebar');
		                            foreach($homepage_layout as $key => $value):
										$class = ( $key ==  mytheme_option('blogpage','layout')) ? " class='selected' " : "";
										echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
									endforeach;?>
                             </ul>
                             <input id="mytheme[blogpage][layout]" name="mytheme[blogpage][layout]" type="hidden"  value="<?php echo  mytheme_option('blogpage','layout');?>"/>
                            <?php mytheme_adminpanel_tooltip(__("You can choose between a left, right, or no sidebar layout for your blogpage.",IAMD_TEXT_DOMAIN));?>
                    </div>
                    <!-- Homepage layout end -->

                    <!-- post layout -->
                    <div class="bpanel-option-set">
                           <label><?php _e('Post Layout',IAMD_TEXT_DOMAIN);?></label>
                            <ul class="bpanel-layout-set">
                            <?php $homepage_layout = array(
										'one-column'=>	__("Single post per row.",IAMD_TEXT_DOMAIN),
										'one-half-column'=>	__("Two posts per row.",IAMD_TEXT_DOMAIN),
										'one-third-column'=>	__("Three posts per row.",IAMD_TEXT_DOMAIN));
										
                            	foreach($homepage_layout as $key => $value):
										$class = ( $key ==  mytheme_option('blogpage','post-layout')) ? " class='selected' " : "";
										echo "<li><a href='#' rel='{$key}' {$class} title='{$value}'><img src='".IAMD_FW_URL."theme_options/images/columns/{$key}.png' /></a></li>";
                             	endforeach;?>
                             </ul>
                             <input id="mytheme[blogpage][post-layout]" name="mytheme[blogpage][post-layout]" type="hidden"  
                             value="<?php echo  mytheme_option('blogpage','post-layout');?>"/>
                            <?php mytheme_adminpanel_tooltip(__("Your blog posts will use the layout you select here.",IAMD_TEXT_DOMAIN));?>
                    </div>
                    <!-- post layout end -->
                    
                    <!-- Post per page -->
                    <div class="bpanel-option-set">
                    	 <label><?php _e('Posts per page',IAMD_TEXT_DOMAIN);?></label>
                         <input id="mytheme-post-perpage" name="mytheme[blogpage][post-per-page]" type="text" class="small" 
                         value="<?php echo  mytheme_option('blogpage','post-per-page');?>" />
                         <?php mytheme_adminpanel_tooltip(__("Your blog pages show at most selected number of posts per page.",IAMD_TEXT_DOMAIN));?>
                    </div>
                    <!-- Post per page -->

                    <!-- Excerpt Length-->
                    <div class="bpanel-option-set">
                    	 <label><?php _e('Excerpt Length',IAMD_TEXT_DOMAIN);?></label>
                         <input id="mytheme-excerpt-length" name="mytheme[blogpage][excerpt-length]" type="text" class="small" 
                         value="<?php echo  mytheme_option('blogpage','excerpt-length');?>" />
                         <?php mytheme_adminpanel_tooltip(__(" This is the number of content character want to appears for each blog post( numbers only).",IAMD_TEXT_DOMAIN));?>
                    </div>
                    <!-- Excerpt Length -->
                    
                </div><!-- .box-content end-->
                
            </div><!-- .bpanel-box -->
            <!-- Default Settings End-->
            
            <!-- Post Meta Settings-->
           	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
				<div class="box-title"><h3><?php _e('Post Meta Options',IAMD_TEXT_DOMAIN);?></h3></div>
                <!-- .box-content -->
                <div class="box-content">
                	<?php global $mytheme_post_meta;
						$count = 1;
						foreach($mytheme_post_meta as $p_meta):
							$last = ($count%2 == 0)?"last":'';
							$id = 		$p_meta['id'];
							$label =	$p_meta['label'];
							$tooltip =  $p_meta['tooltip'];
							$rs =		checked($id,mytheme_option('blogpage',$id),false);
						 	$switchclass = (mytheme_option('blogpage',$id)<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
							
							echo "<div class='one-half-content {$last}'>";
							echo '<div class="bpanel-option-set">';
							echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
							echo "<input class='hidden' id='{$id}' type='checkbox' name='mytheme[blogpage][{$id}]' value='{$id}' {$rs} />";
							echo "<label>{$label}</label>";
							echo '<div class="clear"></div>';
							mytheme_adminpanel_tooltip($tooltip);
							echo '</div>';
							echo '</div>';
							
						$count++;	
						endforeach;?>
                </div><!-- .box-content end-->
            </div><!-- .bpanel-box -->
            <!-- Post Meta Settings End-->

            <!--Others Settings-->
           	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
				<div class="box-title">
                	<h3><?php _e('Exclude Categories',IAMD_TEXT_DOMAIN);?></h3>
                    <?php mytheme_adminpanel_tooltip(__("You can choose certain categories to exclude from your blog page.",IAMD_TEXT_DOMAIN));?>
                </div>
                <!-- .box-content -->
                <div class="box-content">
                <?php if(is_array(mytheme_option("blogpage","exclude_cats"))):
						 $exclude_cats = array_unique(mytheme_option("blogpage","exclude_cats"));
						 foreach($exclude_cats as $cats):
							echo "<!-- Category Drop Down Container -->
								  <div class='multidropdown'>";
							echo  mytheme_categorylist("blogpage,exclude_cats",$cats,"multidropdown");
							echo "</div><!-- Category Drop Down Container end-->";		
						 endforeach;
					  else:
						echo "<!-- Category Drop Down Container -->
			                  <div class='multidropdown'>";
						echo  mytheme_categorylist("blogpage,exclude_cats","","multidropdown");
						echo "</div><!-- Category Drop Down Container end-->";		
					endif;?>
                </div><!-- .box-content end-->
            </div><!-- .bpanel-box -->
            <!-- Others Settings End-->


        </div><!-- #my-blog -->
        
        <!-- #my-blog-single -->
        <div id="my-blog-single" class="tab-content">
        
        	<!-- Single Post layout -->
            <div class="bpanel-box">
            	<div class="box-title">
                	<h3><?php _e('Single Post Layout',IAMD_TEXT_DOMAIN);?></h3>
                    <?php mytheme_adminpanel_tooltip(__("You can choose between a left, right, or no sidebar layout for your single post.",IAMD_TEXT_DOMAIN));?>
                </div>
                <div class="box-content">
	                <ul class="bpanel-layout-set">
                    <?php $homepage_layout = array('full-width'=>'without-sidebar','left-sidebar'=>'left-sidebar','right-sidebar'=>	'right-sidebar');
					foreach($homepage_layout as $key => $value):
						$class = ( $key ==  mytheme_option('single','layout')) ? " class='selected' " : "";
						echo "<li><a href='#' rel='{$key}' {$class}><img src='".IAMD_FW_URL."theme_options/images/columns/{$value}.png' /></a></li>";
					endforeach;?>
                    </ul>
                    <input id="mytheme[single][layout]" name="mytheme[single][layout]" type="hidden"  value="<?php echo  mytheme_option('single','layout');?>"/>
                </div>
            </div><!-- Single Post layout -->

            <!-- Post Meta Settings-->
           	<!-- .bpanel-box-->
	  		<div class="bpanel-box">
				<div class="box-title"><h3><?php _e('Post Meta Options',IAMD_TEXT_DOMAIN);?></h3></div>
                <!-- .box-content -->
                <div class="box-content">
                	<?php $count = 1;
					foreach($mytheme_post_meta as $p_meta):
							$last = ($count%2 == 0)?"last":'';
							$id = 		'post-'.$p_meta['id'];
							$label =	$p_meta['label'];
							$tooltip =  $p_meta['tooltip'];
							$rs =		checked($id,mytheme_option('single',$id),false);
						 	$switchclass = (mytheme_option('single',$id)<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';
							
							echo "<div class='one-half-content {$last}'>";
							echo '<div class="bpanel-option-set">';
							echo "<div data-for='{$id}' class='checkbox-switch {$switchclass}'></div>";
							echo "<input class='hidden' id='{$id}' type='checkbox' name='mytheme[single][{$id}]' value='{$id}' {$rs} />";
							echo "<label>{$label}</label>";
							echo '<div class="clear"></div>';
							mytheme_adminpanel_tooltip($tooltip);
							echo '</div>';
							echo '</div>';
							
						$count++;	
						endforeach;?>
                </div><!-- .box-content end-->
            </div><!-- .bpanel-box -->
            <!-- Post Meta Settings End-->
        
            <!-- Socialshare Module -->
            <div class="bpanel-box">
                <div class="box-title">
                    <h3><?php _e("Social Bookmarks",IAMD_TEXT_DOMAIN); ?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Please choose appropriate social media share options and its layout to show in post.",IAMD_TEXT_DOMAIN));?>
                </div>
                <div class="box-content">
                <?php global $mytheme_social_bookmarks;
					  $count = 1;
					  foreach($mytheme_social_bookmarks as $social_bookmark):?>
                    	<div class="one-half-content <?php echo ($count%2 == 0)?"last":''; ?>">
                        
                        	 <div class="bpanel-option-set">
                             <label><?php echo $social_bookmark["label"];?></label>
								<?php $switchclass = (mytheme_option('single',"post-".$social_bookmark['id'])<>'') ? 'checkbox-switch-on' :'checkbox-switch-off';?>
                                <div data-for="<?php echo "post-".$social_bookmark['id'];?>" class="checkbox-switch <?php echo $switchclass;?>"></div>
                                
                                <input id="<?php echo "post-".$social_bookmark['id'];?>" type="checkbox" name="mytheme[single][<?php echo "post-".$social_bookmark['id'];?>]" 
                            	value="<?php echo $social_bookmark['id'];?>" <?php checked($social_bookmark['id'],mytheme_option('single',"post-".$social_bookmark['id']));?>
                                class="hidden"/>
                                <div class="hr_invisible"></div>
                                <?php if(array_key_exists("username",$social_bookmark)):?>
                                	<div class="clear"></div>
                                    <?php _e("Username",IAMD_TEXT_DOMAIN);?>
                                    <div class="clear"></div>
                                    <input type="text" class="medium" name="mytheme[single][<?php echo "post-".$social_bookmark['id']."-username";?>]"
                                    	 value="<?php echo mytheme_option('single',"post-".$social_bookmark['id']."-username");?>" />
                                    <br/><br/>
                                <?php endif;?>
                                
                                
                                
                                <?php if( array_key_exists("options",$social_bookmark)):?>
                                    <div class="clear"></div>
                                    <?php _e("Layout",IAMD_TEXT_DOMAIN);?>
                                
                               	<select name="mytheme[single][<?php echo "post-".$social_bookmark['id']."-layout";?>]">
                                	<!-- <option value=""><?php _e("Select Layout",IAMD_TEXT_DOMAIN);?></option> -->
                                <?php 	foreach($social_bookmark['options'] as $key => $value):
											$rs = selected($key,mytheme_option('single',"post-".$social_bookmark['id']."-layout"),false); ?>
                                            <option value="<?php echo $key?>" <?php echo $rs;?>><?php echo $value?></option>
                                <?php	endforeach;?>
                                </select>                                
                                <?php endif;?>
                                
                                <?php if(array_key_exists("color-scheme",$social_bookmark)): ?>
                                    <div class="clear"></div><br/>
                                    <?php _e("Color Scheme",IAMD_TEXT_DOMAIN);?>
                                  	<select name="mytheme[single][<?php echo "post-".$social_bookmark['id']."-color-scheme";?>]">
                                    	<?php foreach($social_bookmark['color-scheme'] as $options):
												$rs = selected($options,mytheme_option('single',"post-".$social_bookmark['id']."-color-scheme"),false);?>
                                       		    <option value="<?php echo $options?>" <?php echo $rs;?>><?php echo $options?></option>
                                        <?php endforeach;?>
                                    </select>
                                <?php endif;?>
                                
                                <?php if(array_key_exists('lang',$social_bookmark)):?>
                                    <div class="clear"></div><br/>
                                    <?php _e("Language",IAMD_TEXT_DOMAIN);?>
                                        <select name="mytheme[single][<?php echo "post-".$social_bookmark['id']."-lang";?>]">
                                        <?php foreach($social_bookmark['lang'] as $key => $value): 
												$rs = selected($key,mytheme_option('single',"post-".$social_bookmark['id']."-lang"),false);?>
	                                        <option value="<?php echo $key?>" <?php echo $rs;?>><?php echo $value?></option>
                                        <?php endforeach;?>
                                        </select>
                                <?php endif;?>

                                <?php if(array_key_exists("text",$social_bookmark)):?>
                                	<div class="clear"></div>
                                    <?php _e("Default Text",IAMD_TEXT_DOMAIN);?>
                                    <div class="clear"></div>
                                    <input type="text" class="medium" name="mytheme[single][<?php echo "post-".$social_bookmark['id']."-text";?>]"
                                    	 value="<?php echo mytheme_option('single',"post-".$social_bookmark['id']."-text");?>" />
                                    <br/><br/>
                                <?php endif;?>
                                
                             </div>
                        </div>
              <?php $count++;
			  	  endforeach;?>
                </div>
            </div><!-- Socialshare Module End -->

        </div><!-- #my-blog-single -->
        

    </div><!-- .bpanel-main-content end-->
</div><!-- #blog end -->