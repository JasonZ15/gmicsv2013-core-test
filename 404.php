<?php get_header();?>
<?php $page_layout 	= mytheme_option('specialty','404-layout');
  	  $page_layout 	= !empty($page_layout) ? $page_layout : "content-full-width";
	  
	  $show_sidebar = false;
	  $sidebar_class = "";
	  
	  if( $page_layout == "with-left-sidebar" ):
		$show_sidebar 	= true;
		$sidebar_class 	= "left-sidebar";
	  elseif( $page_layout == "with-right-sidebar" ):
	  	$show_sidebar = true;
	  endif;?>
        <article class="content">
        	<div class="pattern">
            
                <!-- **Container** -->
                <div class="container">
                
                	<div class="hr-invisible"> </div>
                    
                    <div class="hr-invisible"> </div>
                    
                    <!-- **Primary** -->
                    <section id="primary" class="<?php echo $page_layout;?>">
                    	<div class="errorpage-info">
							<?php echo stripcslashes(mytheme_option('specialty','404-message'));?>
                            
                            <div class="hr-invisible"> </div>
                            
                            <div class="column one-half"><?php get_Search_form();?></div>
                            <div class="column one-half last">
    	                    <a href="<?php echo home_url();?>" title="" class="button medium pink"><?php _e('Back to home',IAMD_TEXT_DOMAIN);?> </a>
                            </div>
                        </div>   
                    </section><!-- **Primary** -->

				   <?php if($show_sidebar): ?>
                    <!-- **Sidebar** -->
                    <div id="secondary">
                        <?php get_sidebar();?>
                    </div><!-- **Sidebar End** -->
                   <?php endif;?>
                    
                
                </div><!-- **Container End** -->
                
            </div><!-- **Pattern End** -->
        </article><!-- **Content End** -->
<?php get_footer();?>