<?php $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
	  $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
	  
	  $page_layout = isset($tpl_default_settings['layout']) ? $tpl_default_settings['layout'] : "content-full-width";
	  $show_sidebar = false;
	  
	  switch($page_layout):
		case 'content-full-width':
			$page_layout 	= 	"content-full-width";
		break;
		
		case 'with-left-sidebar':
			$page_layout 	=	"with-left-sidebar";
			$show_sidebar 	= 	true;
		break;
		
		case 'with-right-sidebar':
			$page_layout 	=	"with-right-sidebar";
			$show_sidebar 	= 	true;
		break;
		
		default:
			$page_layout 	= 	"content-full-width";
		break;
		
	endswitch;
	
	$bg = "";
	$pattern="";
	
	#Article BG Style
	$article_bg_type = "";
	$article_bg_pattern = "";

	$custom_style = 'style="';
	
	#Article BG Style
	$page_bg_type = isset( $tpl_default_settings['page-bg-type'] ) ? $tpl_default_settings['page-bg-type'] : NULL;
	
	if( $page_bg_type ):
		if( "bg-patterns" == $page_bg_type ):
		
			$page_bg_pattern = isset( $tpl_default_settings['page-bg-pattern'] ) ? $tpl_default_settings['page-bg-pattern'] : NULL;
			if( !empty($page_bg_pattern) ):
				$url = IAMD_FW_URL.'theme_options/images/pattern/bg-patterns/'.$page_bg_pattern;
				$custom_style .= 'background-image: url('.$url.');';
				$custom_style .= isset( $tpl_default_settings['page-bg-pattern-repeat'] ) ?' background-repeat:'.$tpl_default_settings['page-bg-pattern-repeat'].';' : "";
			endif;
			
			if( !array_key_exists('disable-page-bg-pattern-color',$tpl_default_settings) && array_key_exists('page-bg-pattern-color',$tpl_default_settings) ):
				$color = hex2rgb( $tpl_default_settings['page-bg-pattern-color']);
				
				$custom_style .= isset( $tpl_default_settings['page-bg-pattern-opacity'] ) ?
						 " background-color:rgba($color[0],$color[1],$color[2],".$tpl_default_settings['page-bg-pattern-opacity'].");" :
						 " background-color:".$tpl_default_settings['page-bg-pattern-color'].";";
			endif;
			
		elseif( "bg-custom" == $page_bg_type ):
			$page_bg_pattern = isset( $tpl_default_settings['page-custom-bg'] ) ? $tpl_default_settings['page-custom-bg'] : NULL;
			if( !empty($page_bg_pattern) ):
				$custom_style .= 'background-image: url('.$page_bg_pattern.');';
				$custom_style .= isset( $tpl_default_settings['page-custom-bg-repeat'] ) ?' background-repeat:'.$tpl_default_settings['page-custom-bg-repeat'].';' : "";
				$custom_style .= isset( $tpl_default_settings['page-custom-bg-position'] ) ?' background-position:'.$tpl_default_settings['page-custom-bg-position'].';' : "";
			endif;
			
			if( !array_key_exists('disable-page-custom-bg-color',$tpl_default_settings) && array_key_exists('page-custom-bg-color',$tpl_default_settings) ):
				$color = hex2rgb( $tpl_default_settings['page-custom-bg-color']);
				$custom_style .= isset( $tpl_default_settings['page-custom-bg-opacity'] ) ?
						 " background-color:rgba($color[0],$color[1],$color[2],".$tpl_default_settings['page-custom-bg-opacity'].");" :
						 " background-color:".$tpl_default_settings['page-custom-bg-color'].";";
			endif;
			
		endif;
	endif;
	#Article BG Style
	$custom_style .= '"';
	$pattern = isset( $tpl_default_settings['apply-pattern']) && isset( $tpl_default_settings['pattern'] )? $tpl_default_settings['apply-pattern'] :NULL;
	if($pattern):
		$url = IAMD_FW_URL.'theme_options/images/pattern/'.$tpl_default_settings['pattern'];
		$pattern =  'style="background-image: url('.$url.')"';
	endif;?>
<!-- **Blog Single Content** -->
<?php $p_classes = array("content"); ?>
<article id="post-<?php the_ID(); ?>"  <?php post_class( $p_classes ); ?>  <?php echo $custom_style;?>>

	<!-- **Pattern** -->
	<div class="pattern" <?php echo $pattern;?>>
    
        <!-- **Container** -->
        <div class="container">
        	
            <div class="hr-invisible"> </div>
            
            <hgroup class="sub-title">
            	<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s'), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h1>
                <?php if(isset($tpl_default_settings['sub-title']) && !empty($tpl_default_settings['sub-title'])):
					  	echo "<h6>".$tpl_default_settings['sub-title']."</h6>";
					  endif;?>
            </hgroup>
            
            <section id="primary" class="<?php echo $page_layout;?>">
                <!-- **Blog Single Entry** -->
                <article class="blog-single-entry">
                
                	<!-- **Single Entry** -->
                	<div class="single-entry">
					<?php if(has_post_thumbnail()): ?>
                    	<div class="entry-thumb">
                        	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('%s'), the_title_attribute('echo=0'));?>"> <?php the_post_thumbnail('blog-single');?></a>
                        </div>
                    <?php endif;?>
                    
                    	<div class="entry-metadata">
                        <?php if(!array_key_exists('disable-date-info',$tpl_default_settings)): ?>
                                <div class="date">
                                    <i class="icon-calendar"> </i>
                                    <p><?php echo get_the_date('d');?></p>
                                    <span> <?php echo get_the_date('M');?> <br /> <?php echo get_the_date('Y');?> </span>
                                </div>
                                <div class="splitter"> </div>
                        <?php endif;?>
                            
                        <?php if(!array_key_exists('disable-comment-info',$tpl_default_settings)):
								comments_popup_link('<i class="icon-comments"> </i> 0','<i class="icon-comments"> </i> 1', '<i class="icon-comments"> </i> %',"comments",
								'<i class="icon-comments-off"> </i>');?>
                                <div class="splitter"> </div>
                        <?php endif;?>
                        
                        <?php if(!array_key_exists('disable-author-info',$tpl_default_settings)): ?>
                                <span class="author"> <i class="icon-user"> </i><?php echo get_the_author_link();?></span>
                                <div class="splitter"> </div>
                        <?php endif;?>

                        <?php if(!array_key_exists('disable-category-info',$tpl_default_settings)): ?>
                                <div class="categories"><i class="icon-pushpin"> </i><?php the_category(', ');?></div>
                                <div class="splitter"> </div>
                        <?php endif;?>

                        <?php if(!array_key_exists('disable-tag-info',$tpl_default_settings)): ?>
                        <?php 	the_tags('<div class="tags"><i class="icon-tag"> </i>'.'&nbsp;',', ','</div>'); ?>
                        <?php endif;?>
                        
                        <?php mytheme_social_bookmarks(); ?>
                        </div>
                        
                    </div><!-- **Single Entry** -->
                    
                    <div class="post-content">
                        <?php echo the_content();?>
                        <?php wp_link_pages( array(	'before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>', 
                                                    'next_or_number'=>'number',	'pagelink' => '%', 'echo' => 1 ) );?>

                        <div class="social-bookmark">
							<?php show_fblike();?>
                            <?php show_googleplus();?>
                            <?php show_twitter();?>
                            <?php show_stumbleupon();?>
                            <?php show_linkedin();?>
                            <?php show_delicious();?>
                            <?php show_pintrest();?>
                            <?php show_digg();?>
                        </div>
        
                    </div>
                    
                <?php $mytheme_options = get_option(IAMD_THEME_SETTINGS);
					  $mytheme_general = $mytheme_options['general'];
					  $post_comment  = isset($mytheme_general['global-post-comment']) ? $mytheme_general['global-post-comment'] : NULL;
					  $disable_comment = isset($tpl_default_settings['disable-comment']) ? $tpl_default_settings['disable-comment'] : NULL;
					  if( (!$post_comment) && (!$disable_comment) ):?>
                      	<div class="hr"> </div>
                        <?php  comments_template('', true); ?>
                <?php endif;?>
                    
                </article><!-- **Blog Single Entry End** -->
            </section>
            
            <?php if($show_sidebar): ?>
            		<!-- **Sidebar** -->
            		<div id="secondary">
            			<?php get_sidebar();?>
            		</div><!-- **Sidebar End** -->
           <?php endif;?>
            
            
        </div><!-- **Container End** -->
        
    </div><!-- **Pattern End** -->
    
</article><!-- **Blog Single Content - End** -->