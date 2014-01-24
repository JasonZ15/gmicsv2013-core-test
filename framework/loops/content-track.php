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
	
	#Font Style Settings
	$set_font = isset( $tpl_default_settings['font-settings'] ) ? $tpl_default_settings['font-settings'] : NULL;
	$bg .= isset( $set_font ) ? " custom-font-color " : "";
	if( $set_font  && isset($tpl_default_settings['page-font-color']) ):
		$custom_style .="color:".$tpl_default_settings['page-font-color'];
	endif;
	
	$anchor_colors = "";
	if( $set_font && isset($tpl_default_settings['page-primary-color']) ):
		$anchor_colors .=  "data-for-primary-color = '".$tpl_default_settings['page-primary-color']."'";
	endif;

	if( $set_font && isset($tpl_default_settings['page-secondary-color']) ):
		$anchor_colors .=  "data-for-secondary-color = '".$tpl_default_settings['page-secondary-color']."'";
	endif;

	if( $set_font && isset($tpl_default_settings['page-title-color']) ):
		$anchor_colors .=  "data-for-title-color = '".$tpl_default_settings['page-title-color']."'";
	endif;
	#Font Style Settings End
				
				
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
				
	$bg .= isset( $tpl_default_settings['dark-bg']) ? "dark-bg": "";
	$pattern = isset( $tpl_default_settings['apply-pattern']) && isset( $tpl_default_settings['pattern'] )? $tpl_default_settings['apply-pattern'] :NULL;
	if($pattern):
		$url = IAMD_FW_URL.'theme_options/images/pattern/'.$tpl_default_settings['pattern'];
		$pattern =  'style="background-image: url('.$url.')"';
	endif;?>
<!-- .content -->      
<article id="<?php the_slug(); ?>" class="content <?php echo $bg;?>" <?php echo $custom_style.$anchor_colors;?>>
	<div class="pattern" <?php echo $pattern;?>>
    
        <!-- **Container** -->
        <div class="container">
        	<div class="hr-invisible"> </div>
			<img src="http://beijing.thegmic.com/cn/wp-content/uploads/2014/01/GGS-banner.jpg" alt="Global Mobile Game Summit" />            

            	
  
            
            <?php wp_nav_menu( array('menu' => 'track ggs' )); ?>
            <hgroup class="main-title">
            	<h1><?php the_title();?></h1>
                <?php if(isset($tpl_default_settings['sub-title']) && !empty($tpl_default_settings['sub-title'])):
					  	echo "<h6>".$tpl_default_settings['sub-title']."</h6>";
					  endif;?>
            </hgroup>
            <section id="primary" class="<?php echo $page_layout;?>">
            
				<?php the_content(); ?>
                
                <?php wp_link_pages( array('before'=>'<div class="page-link">',	'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>', 'next_or_number'=>'number',
                                           'pagelink' => '%', 'echo' => 1 ) );?>
                                           
                <div class="social-bookmark">
					<?php show_fblike('page');?>
                    <?php show_googleplus('page');?>
                    <?php show_twitter('page');?>
                    <?php show_stumbleupon('page');?>
                    <?php show_linkedin('page');?>
                    <?php show_delicious('page');?>
                    <?php show_pintrest('page');?>
                    <?php show_digg('page');?>
                </div>
                                           
				<?php mytheme_social_bookmarks('sb-page'); ?>
                
                <?php edit_post_link( __( ' Edit ',IAMD_TEXT_DOMAIN ) ); ?>

                <?php $mytheme_options = get_option(IAMD_THEME_SETTINGS);
					  $mytheme_general = $mytheme_options['general']; 
					  if( (!$mytheme_general['disable-page-comment']) && ($tpl_default_settings['comment']) ):?>
                      	<div class="hr"> </div>
                        <?php  comments_template('', true); ?>
                <?php endif;?>

            </section>

            <?php if($show_sidebar): ?>
            		<!-- **Sidebar** -->
            		<div id="secondary">
            			<?php get_sidebar();?>
            		</div><!-- **Sidebar End** -->
           <?php endif;?>
            
        </div><!-- **Container end** -->
            
    </div>
    <div class="shadow"> </div>
</article><!-- .content -->
