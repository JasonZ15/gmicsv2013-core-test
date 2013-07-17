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
    
    <div class="column one-third last">
		<?php the_content();?>
        <?php wp_link_pages( array(	'before'=>'<div class="page-link">',	'after'=>'</div>',
                            'link_before'=>'<span>',				'link_after'=>'</span>',
                            'next_or_number'=>'number',				'pagelink' => '%',
                            'echo' => 1 ) );?>
        
        <?php edit_post_link( __( 'Edit',IAMD_TEXT_DOMAIN)); ?>
    
    	<div class="hr-invisible"> </div>
        <div class="portfolio-details">
        <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="240" data-show-faces="false"></div>
	        <h5><?php _e('Project Details',IAMD_TEXT_DOMAIN);?></h5>
            <ul>
            	<li class="date">
                	<i class="icon-calendar"> </i>
                    <p><?php echo get_the_date('d');?></p>
                    <span> <?php echo get_the_date('M');?> <br /> <?php echo get_the_date('Y');?> </span>
                </li>
                
                <?php if(array_key_exists("client",$portfolio_settings)): ?>
                <li class="author"> <i class="icon-user"> </i> <?php echo $portfolio_settings['client'];?> </li>
                <?php endif; ?>
                
                <li class="tags"> <i class="icon-tag"> </i><?php echo get_the_term_list($post->ID, 'portfolio_entries', '', ', ','');?></li>
                
                <?php if(array_key_exists("url",$portfolio_settings)): $url = $portfolio_settings['url'];?>
                <li class="website-link"> <i class="icon-link"> </i> <a href="<?php echo $url;?>" title="" target="_blank"><?php echo $url;?> </a> </li>
                <?php endif; ?>
            </ul>
            <?php if(array_key_exists("show-social-share",$portfolio_settings)): ?>
                    <div class="social-share">
                    <?php 	$title = $post->post_title;
                            $url = get_permalink($post->ID);
                            $excerpt = $post->post_excerpt;
                            $data = "<h5>".__('Share',IAMD_TEXT_DOMAIN)."</h5>";
                            $data .= "<a href='http://www.facebook.com/sharer.php?u=$url&amp;t=$title' class='facebook'></a>";
                            $data .= "<a href='http://del.icio.us/post?url=$url&amp;title=$title' class='delicious'>";
                            $data .= "<a href='http://digg.com/submit?phase=2&amp;url=$url&amp;title=$title' class='digg'>";
                            #$data .= "<a href='http://www.stumbleupon.com/submit?url=$url&amp;title=$title' class='stumbleupon'>";
                            $data .= "<a href='http://twitter.com/home/?status=$title:$title' class='twitter'>";
                            $data .= "<a href='https://plus.google.com/share?url=$url' onclick='javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;' class='google'></a>";
                            $data .= "<a href='http://www.linkedin.com/shareArticle?mini=true&amp;title=$title&amp;url=$url' title='Share on LinkedIn' class='linkedin'></a>";
                            #$data .= "<a href='http://pinterest.com/pin/create/button/?url=$url&amp;media=$media' class='pinterest'></a>";
                            echo $data;?>
                    </div>
           <?php endif;?>
            
        </div>
    </div>
    
</div>