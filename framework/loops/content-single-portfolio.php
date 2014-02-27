<?php $portfolio_settings = get_post_meta($post->ID,'_portfolio_settings',TRUE);
	  $portfolio_settings = is_array($portfolio_settings) ? $portfolio_settings  : array();?>
<hgroup class="sub-title">
	<h1><?php the_title();?></h1>
<?php if(isset($portfolio_settings['sub-title']) && !empty($portfolio_settings['sub-title'])): ?>
	<h6><?php echo $portfolio_settings['sub-title'];?></h6>
<?php endif;?>
</hgroup>

<div class="portfolio-single">

	<?php if(array_key_exists("items",$portfolio_settings)): ?>
	<div class="column two-third">
    	<div class="portfolio-single-image">
	        <ul class="portfolio-slider">
            <?php $image = wp_get_attachment_image(get_post_thumbnail_id($id),'full');
				if(!empty($image)):
					echo "<li>{$image}</li>";
				endif;
				
				foreach($portfolio_settings['items'] as $item):
					echo "<li>";
						if( is_numeric($item) ):
							$image = wp_get_attachment_image($item,'full');
							echo $image;
						else:
							global $wp_embed;
							echo $wp_embed->run_shortcode("[embed height='520']".$item."[/embed]");
						endif;
					echo "</li>";
				endforeach;?>
            </ul>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="">
		<?php the_content();?>
        <?php wp_link_pages( array(	'before'=>'<div class="page-link">',	'after'=>'</div>',
                            'link_before'=>'<span>',				'link_after'=>'</span>',
                            'next_or_number'=>'number',				'pagelink' => '%',
                            'echo' => 1 ) );?>
        
        <?php edit_post_link( __( 'Edit',IAMD_TEXT_DOMAIN)); ?>
      <div class="portfolio-details" style="float:left;">
        
	         <ul>
                <?php if(array_key_exists("client",$portfolio_settings)): ?>
                <li class="author"> <i class="icon-user"> </i> <?php echo $portfolio_settings['client'];?> </li>
                <?php endif; ?>
                  
                <?php if(array_key_exists("url",$portfolio_settings)): $url = $portfolio_settings['url'];?>
                <li class="website-link"> <i class="icon-link"> </i> <a href="<?php echo $url;?>" title="" target="_blank"><?php echo $url;?> </a> </li>
                <?php endif; ?>
            </ul>
            
            
        </div>
    </div>
    
</div>