<?php get_header();?>
<?php $page_layout 	= mytheme_option('specialty','archives-layout');
  	  $page_layout 	= !empty($page_layout) ? $page_layout : "content-full-width";
	  
	  $show_sidebar = false;
	  $sidebar_class = "";
	  $post_class = "";
	  $last = NULL;
	  
	  if( $page_layout == "with-left-sidebar" ):
		$show_sidebar 	= true;
		$sidebar_class 	= "left-sidebar";
	  elseif( $page_layout == "with-right-sidebar" ):
	  	$show_sidebar = true;
	  endif;
	  
		$post_layout = $show_sidebar ? 'blog-two-column-withsidebar' : 'blog-two-column';
		$post_class = $show_sidebar ?  'one-half with-sidebar' : "one-half";
		$last = 2;  ?>
        <article class="content">
        	<div class="pattern">
            
                <!-- **Container** -->
                <div class="container">
                
                	<div class="hr-invisible"> </div>
                    
                    <hgroup class="sub-title">
	                    <h1><?php if ( function_exists('is_tag') && is_tag() ) :
									echo __("Tag archive for",IAMD_TEXT_DOMAIN)."&quot;".single_tag_title('',FALSE)."&quot;";
								  elseif( is_archive() ):
								  	echo __("Category archive for",IAMD_TEXT_DOMAIN)."&quot;";
									wp_title('');
									echo "&quot;";
								  endif; ?></h1>
                    </hgroup>
                    
                    <div class="hr-invisible"> </div>
                    
                    <!-- **Primary** -->
                    <section id="primary" class="<?php echo $page_layout;?>">
                    <?php if( have_posts() ): $count = 1; ?>
                    <?php 	while ( have_posts() ) : the_post();  $class = ( ($last>1) && ($count%$last == 0) ) ? ' last': '';?>
                    
                    			<div class="column <?php echo $post_class.$class;?>">
                                    <!-- **Blog Entry** -->
                                    <article class="blog-entry">
                                    	<div class="entry-thumb-meta">
                                        	<div class="entry-thumb">
	                	                     <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>">
                                             <?php if(has_post_thumbnail()): 
    	                	                 		the_post_thumbnail($post_layout);
												   else:
												   	$dummy_image = IAMD_BASE_URL."images/dummy-images/{$post_layout}.jpg";
												   	echo "<img src='$dummy_image' alt='' />";
                                             	   endif;?></a>
        		            	            </div>	
                                	
                                            <div class="entry-meta"> 
                                               <?php comments_popup_link('<i class="icon-comments"> </i> 0','<i class="icon-comments"> </i> 1'
                                                        , '<i class="icon-comments"> </i> %',"comments",'<i class="icon-comments-off"> </i>'); ?>
                                               <div class="date">
                                                   <i class="icon-calendar"> </i>
                                                   <p> <?php echo get_the_date('d');?> </p>
                                                   <span> <?php echo get_the_date('M');?> <br /> <?php echo get_the_date('Y'); ?> </span>
                                               </div>
                                            </div>
	                                      </div><!-- .entry-thumb-meta end -->
                                          
                                          <div class="entry-details">
                                          
                                          	<div class="entry-title">
                                                <h5><a href="<?php the_permalink();?>" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
                                                    <?php the_title();?></a></h5></div>

                                            <div class="entry-metadata">
                                                <span class="author"> <i class="icon-user"> </i> <?php echo get_the_author_link();?> </span>
                                                <div class='categories'><i class='icon-pushpin'> </i> <?php the_category(', ');?></div>
                                                <?php the_tags('<div class="tags"><i class="icon-tag"> </i>'.'&nbsp;',', ','</div>');?>
                                            </div>
                                            
                                            <div class="entry-body">
                                            	<?php echo mytheme_excerpt(25); ?>
                                                <a href="<?php the_permalink();?>" class="read-more" title="<?php printf(esc_attr__('%s'),the_title_attribute('echo=0'));?>">
                                                    <?php echo __("Read full story",IAMD_TEXT_DOMAIN)."&raquo;";?></a>
                                            </div>
                                            
                                          </div><!--. entry-details-->
                                        
                                    </article><!-- **Blog Entry End** -->
                                </div>
                                
                    <?php 	$count++;
							endwhile; ?>
                    <?php else:?>
                        <div class="hr_invisible"> </div>
                        <h1><?php _e( 'Nothing Found', IAMD_TEXT_DOMAIN ); ?></h1>
                        <p><?php _e( 'Apologies, but no results were found for the requested archive.', IAMD_TEXT_DOMAIN ); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                        <!-- **Pagination** -->
                        <div class="pagination">
                            <?php previous_posts_link('<span class="prev-post"></span>');?>
                            <?php echo my_pagination();?>
                            <?php next_posts_link('<span class="next-post"></span>');?>
                        </div><!-- **Pagination - End** -->
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