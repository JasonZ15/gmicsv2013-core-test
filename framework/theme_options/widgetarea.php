<!-- #widgetarea -->
<div id="widgetarea" class="bpanel-content">
    <!-- .bpanel-main-content -->
    <div class="bpanel-main-content">
        <ul class="sub-panel">
            <li><a href="#for-pages"><?php _e("For Pages",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#for-posts"><?php _e("For Posts",IAMD_TEXT_DOMAIN);?></a></li>
            <li><a href="#for-categories"><?php _e("For Categories",IAMD_TEXT_DOMAIN);?></a></li>
        </ul>
        
        <!-- #for-pages -->
        <div id="for-pages" class="tab-content">
        	<!-- .bpanel-box-->
        	<div class="bpanel-box">
            	<div class="box-title">
	                <h3><?php _e('Add new widget areas for pages',IAMD_TEXT_DOMAIN);?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Select a PAGE that should receive a new widget area:",IAMD_TEXT_DOMAIN));?>
                </div>
                <!-- .box-content -->
                <div class="box-content">
                	<?php if(is_array(mytheme_option("widgetarea","pages"))):
							$pages = array_unique(mytheme_option("widgetarea","pages"));
							foreach($pages as $page):
							  echo "<!-- Category Drop Down Container -->";
							  echo "<div class='multidropdown'>";
							  echo  mytheme_pagelist("widgetarea,pages",$page,"multidropdown");						  
							  echo "</div><!-- Category Drop Down Container end-->";
							endforeach;
						  else:	
							  echo "<!-- Pages Drop Down Container -->";
							  echo "<div class='multidropdown'>";
							  echo  mytheme_pagelist("widgetarea,pages","","multidropdown");						  
							  echo "</div><!-- Category Drop Down Container end-->";
						  endif;?>
                </div><!-- .box-content End-->
            </div><!-- .bpanel-box -->
        </div><!-- #for-pages end-->

        <!-- #for-posts -->
        <div id="for-posts" class="tab-content">
        	<!-- .bpanel-box-->
        	<div class="bpanel-box">
            	<div class="box-title">
	                <h3><?php _e('Add new widget areas for posts',IAMD_TEXT_DOMAIN);?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Select a POST that should receive a new widget area:",IAMD_TEXT_DOMAIN));?>
                </div>
                <!-- .box-content -->
                <div class="box-content">
                	<?php if(is_array(mytheme_option("widgetarea","posts"))):
							$posts = array_unique(mytheme_option("widgetarea","posts"));
							foreach($posts as $post):
							  echo "<!-- Category Drop Down Container -->";
							  echo "<div class='multidropdown'>";
							  echo  mytheme_postlist("widgetarea,posts",$post,"multidropdown");						  
							  echo "</div><!-- Category Drop Down Container end-->";
							endforeach;
						  else:
							 echo "<!-- Post Drop Down Container -->";
							 echo "<div class='multidropdown'>";
							 echo  mytheme_postlist("widgetarea,posts","","multidropdown");						  
							 echo "</div><!-- Category Drop Down Container end-->";						  
						  endif;?>
                </div><!-- .box-content End-->
            </div><!-- .bpanel-box -->
        </div><!-- #for-posts end-->

        <!-- #for-categories -->
        <div id="for-categories" class="tab-content">
        	<!-- .bpanel-box-->
        	<div class="bpanel-box">
            	<div class="box-title">
	                <h3><?php _e('Add new widget areas for categories',IAMD_TEXT_DOMAIN);?></h3>
                    <?php mytheme_adminpanel_tooltip(__("Select a Category that should receive a new widget area:",IAMD_TEXT_DOMAIN));?>
                </div>
                <!-- .box-content -->
                <div class="box-content">
               	<?php if(is_array(mytheme_option("widgetarea","cats"))):
							$cats = array_unique(mytheme_option("widgetarea","cats"));
							foreach($cats as $category):
							  echo "<!-- Category Drop Down Container -->";
							  echo "<div class='multidropdown'>";
							  echo  mytheme_categorylist("widgetarea,cats",$category,"multidropdown");						  
							  echo "</div><!-- Category Drop Down Container end-->";
							endforeach;
					  else: 	
						  echo "<!-- Category Drop Down Container -->";
						  echo "<div class='multidropdown'>";
						  echo  mytheme_categorylist("widgetarea,cats","","multidropdown");						  
						  echo "</div><!-- Category Drop Down Container end-->";
					  endif?>
                </div><!-- .box-content End-->
            </div><!-- .bpanel-box -->
        </div><!-- #for-categories end-->
        
    </div><!-- .bpanel-main-content end-->
</div><!-- #widgetarea end -->