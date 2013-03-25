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
</body>
</html>