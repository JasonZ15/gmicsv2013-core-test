	      <!-- **Footer** -->
   		  <footer id="footer">
          	<div class="container">
				<?php /* Theme Settings */
                      $mytheme_options = get_option(IAMD_THEME_SETTINGS);
                      $mytheme_general = $mytheme_options['general'];
                      
                      if(!empty($mytheme_general['show-footer'])):
                        show_footer_widgetarea($mytheme_general['footer-columns']);
                        echo '<div class="clear"> </div>';
                        echo '<div class="hr"> </div>';
                      endif;
                      
                      if(!empty($mytheme_general['show-copyrighttext'])):?>
                        <div class="copyright"><?php echo stripslashes($mytheme_general['copyright-text']);?></div>
                <?php endif;?>
                
            </div>
          </footer><!-- **Footer - End** -->

</section><!-- **Main Section** -->

<?php wp_footer(); ?>
<script type="text/javascript" language="javascript">
			jQuery(document).ready(function() {

				//	Fuild layout example 2, centering the items
				jQuery("#foo3").carouFredSel({
					auto		:  {
						play: true,
						delay: 2000,
					},
					height: 70,
					width: '100%',
					scroll: 2,
				});
			});
</script>
<img class="title-tab" src="<?php echo get_template_directory_uri(); ?>/images/sponsors-tab.png" />
<div id="sponsor-bar" class="image_carousel">	
	<ul id="foo3">
	  <li style="width: 111px;"><img src="http://www.gmic-sv.com/wp-content/themes/gmic-sv/images/top-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;" />
	  <li style="width: 161px;"><a target="_blank" href="http://www.tencent.com/en-us/index.shtml"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/09/tencent-logo.jpg" width="135" style="border: 1px solid #7b6596; padding: 9px 5px 10px 5px;" /></a></li>
	  <li style="width: 161px;"><a target="_blank" href="http://english.sina.com/index.html"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/09/sina-logo.jpg" width="135" style="border: 1px solid #7b6596; padding: 9px 5px 10px 5px;" /></a></li>
	  <li style="width: 161px;"><a href="http://sv.thegmic.com/2012/uc-web/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/08/ucweb.png" width="135" style="border: 1px solid #7b6596; padding: 9px 5px 10px 5px;" /></a></li>
	  <li style="width: 111px;"><img src="http://www.gmic-sv.com/wp-content/themes/gmic-sv/images/platinum-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;" /></li>
	  <li style="width: 139px;"><a href="http://sv.thegmic.com/2012/tapjoy/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/08/tapjoy_logo_small.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li> 
	  <li style="width: 139px;"><a href="#"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/08/wondershare.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li> 
	  <li style="width: 139px;"><a href="http://www.google.com/ads/admob/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/08/AdMob-Logo.png" width="113" style="border: 1px solid #547bed; padding: 0;" /></a></li> 
	  <li style="width: 111px;"><img src="http://www.gmic-sv.com/wp-content/themes/gmic-sv/images/gold-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;" /></li>
	  <li style="width: 139px;"><a href="http://sv.thegmic.com/2012/northern-light-venture-capital/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/09/northernlight.jpg" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://sv.thegmic.com/2012/domob/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/09/domob2.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.yolu.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/10/yolu1.jpg" width="123" style="border: 1px solid #eba706; padding: 2px 0 2px 0;" /></a></li>	  
	  <li style="width: 139px;"><a href="http://thebitcellar.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/10/bitcellas.jpg" width="123" style="border: 1px solid #eba706; padding: 6px 0 8px 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.startmeapp.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/10/SMA.png" width="123" style="border: 1px solid #eba706; padding: 6px 0 6px 0;" /></a></li>
	  <li style="width: 111px;"><img src="http://www.gmic-sv.com/wp-content/themes/gmic-sv/images/strategic-partner-tab.jpg" width="97" height="59" style="padding:0; border: none;" /></li>
	  <li style="width: 121px;"><a href="http://www.mobileroadie.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/07/strategic-partner-mobileroadie1.jpg" width="92" style="border: 1px solid #6ba46a;" /></a></li>
	  <li style="width: 121px;"><a href="http://www.btrax.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/07/btrax_h_logo-2.1.png" width="92" style="border: 1px solid #6ba46a;" /></a></li>
	  <li style="width: 121px;"><a href="http://sv.thegmic.com/2012/engage-digital"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/07/app-conference1.jpg" width="92" style="border: 1px solid #6ba46a;" /></a></li>
	</ul>
	<div class="clearfix"></div>
	<div class="pagination" id="foo3_pag"></div>
</div>

</body>
</html>