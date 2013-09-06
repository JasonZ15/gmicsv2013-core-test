<?php /*Template Name: Partner Template*/?>
<?php get_header();?>
<?php $bg = "";
	  $pattern="";
	  
	  #Article BG Style
	  $article_bg_type = "";
	  $article_bg_pattern = "";
	  
	  $general_settings = get_post_meta($post->ID,'_tpl_portfolio_settings',TRUE);
	  $general_settings = is_array($general_settings) ? $general_settings  : array();
	  
	  $custom_style = 'style="';
	  #Font Style Settings
	  $set_font = isset( $general_settings['font-settings'] ) ? $general_settings['font-settings'] : NULL;
	  $bg .= isset( $set_font ) ? " custom-font-color " : "";
	  
	  if( $set_font  && isset($general_settings['page-font-color']) ):
		$custom_style .="color:".$general_settings['page-font-color'];
	  endif;
		
	  $anchor_colors = "";
	  if( $set_font && isset($general_settings['page-primary-color']) ):
		$anchor_colors .=  "data-for-primary-color = '".$general_settings['page-primary-color']."'";
	  endif;
		
	  if( $set_font && isset($general_settings['page-secondary-color']) ):
		$anchor_colors .=  "data-for-secondary-color = '".$general_settings['page-secondary-color']."'";
	  endif;
		
	  if( $set_font && isset($general_settings['page-title-color']) ):
		$anchor_colors .=  "data-for-title-color = '".$general_settings['page-title-color']."'";
	  endif;
	  #Font Style Settings End
	  
	  #Article BG Style
	  $page_bg_type = isset( $general_settings['page-bg-type'] ) ? $general_settings['page-bg-type'] : NULL;
		if( $page_bg_type ):
			if( "bg-patterns" == $page_bg_type ):
			
				$page_bg_pattern = isset( $general_settings['page-bg-pattern'] ) ? $general_settings['page-bg-pattern'] : NULL;
				if( !empty($page_bg_pattern) ):
					$url = IAMD_FW_URL.'theme_options/images/pattern/bg-patterns/'.$page_bg_pattern;
					$custom_style .= 'background-image: url('.$url.');';
					$custom_style .= isset( $general_settings['page-bg-pattern-repeat'] ) ?' background-repeat:'.$general_settings['page-bg-pattern-repeat'].';' : "";
				endif;
				
				if( !array_key_exists('disable-page-bg-pattern-color',$general_settings) && array_key_exists('page-bg-pattern-color',$general_settings) ):
					$color = hex2rgb( $general_settings['page-bg-pattern-color']);
					
					$custom_style .= isset( $general_settings['page-bg-pattern-opacity'] ) ?
							 " background-color:rgba($color[0],$color[1],$color[2],".$general_settings['page-bg-pattern-opacity'].");" :
							 " background-color:".$general_settings['page-bg-pattern-color'].";";
				endif;
				
			elseif( "bg-custom" == $page_bg_type ):
				$page_bg_pattern = isset( $general_settings['page-custom-bg'] ) ? $general_settings['page-custom-bg'] : NULL;
				if( !empty($page_bg_pattern) ):
					$custom_style .= 'background-image: url('.$page_bg_pattern.');';
					$custom_style .= isset( $general_settings['page-custom-bg-repeat'] ) ?' background-repeat:'.$general_settings['page-custom-bg-repeat'].';' : "";
					$custom_style .= isset( $general_settings['page-custom-bg-position'] ) ?' background-position:'.$general_settings['page-custom-bg-position'].';' : "";
				endif;
				
				if( !array_key_exists('disable-page-custom-bg-color',$general_settings) && array_key_exists('page-custom-bg-color',$general_settings) ):
					$color = hex2rgb( $general_settings['page-custom-bg-color']);
					$custom_style .= isset( $general_settings['page-custom-bg-opacity'] ) ?
							 " background-color:rgba($color[0],$color[1],$color[2],".$general_settings['page-custom-bg-opacity'].");" :
							 " background-color:".$general_settings['page-custom-bg-color'].";";
				endif;
				
			endif;
		endif;
		#Article BG Style
		
		$custom_style .= '"';
		
		#Style Settings
		$mytheme_shadow = isset($general_settings['bottm-shadow']) ? true : false;
		$bg .= isset( $general_settings['dark-bg']) ? "dark-bg": "";
		$pattern = isset( $general_settings['apply-pattern']) && isset( $general_settings['pattern'] )? $general_settings['apply-pattern'] :NULL;
		if($pattern):
			$url = IAMD_FW_URL.'theme_options/images/pattern/'.$general_settings['pattern'];
			$pattern =  'style="background-image: url('.$url.')"';
		endif;?>
        
        <article id="portfolio" class="content <?php echo $bg;?> competition-page" <?php echo $custom_style.$anchor_colors;?>>
    		<div class="pattern" <?php echo $pattern;?>>
        		<div class="container">
            		<?php get_partner_portfolio_page_content($post->ID,false);?>
            	</div>
        	</div>
            <div class="shadow"> </div>
        </article>
<?php get_footer();?>