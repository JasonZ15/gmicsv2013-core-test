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
                <?php if(isset($mytheme_general['show-sociables']) && !empty($mytheme_options['social'])): ?>
                        <ul class="social-icons">
                         <?php foreach($mytheme_options['social'] as $social):
                                  $link = $social['link'];
                                  $custom_image = isset($social['custom-image']) && !empty($social['custom-image']) ? "<img src='{$custom_image}' />": '';
                                  $icon = $social['icon'];
                                  echo "<li>";
                                  echo "	<a href='{$link}'>";
                                  if(!empty($custom_image)):
                                             echo $custom_image;
                                  else:
                                             echo "<img src='".IAMD_BASE_URL."/images/sociable/hover/{$icon}' alt='{$icon}' />";
                                  endif;
                                             echo "<img src='".IAMD_BASE_URL."/images/sociable/{$icon}' alt='{$icon}' />";
                                  
                                  echo "	</a>";
                                  echo "</li>"; 						 
                               endforeach;?>
                        </ul>
                <?php endif;?>
            </div>
          </footer><!-- **Footer - End** -->

</section><!-- **Main Section** -->

<?php wp_footer(); ?>
</body>
</html>