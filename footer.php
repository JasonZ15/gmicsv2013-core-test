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
				
				//	temp twitter ticker
				jQuery("#tweet-container").carouFredSel({		
					width: '100%',
					auto : {pauseDuration   : 6000},
					scroll      : {duration : 200},	
					items   : 1,
					responsive: true,
				});
				
				jQuery('.portfolio-container').css('overflow', '');
			});
</script>
<img class="title-tab" src="<?php echo get_template_directory_uri(); ?>/images/sponsors-tab.png" />
<div id="sponsor-bar" class="image_carousel">	
	<ul id="foo3">
	  <!--<li style="width: 139px;"><a href="http://www.startmeapp.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/10/SMA.png" width="123" style="border: 1px solid #eba706; padding: 6px 0 6px 0;" /></a></li>
	   <li style="width: 111px;"><img src="http://www.gmic-sv.com/wp-content/themes/gmic-sv/images/strategic-partner-tab.jpg" width="97" height="59" style="padding:0; border: none;" /></li>
	   <li style="width: 121px;"><a href="http://www.mobileroadie.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/07/strategic-partner-mobileroadie1.jpg" width="92" style="border: 1px solid #6ba46a;" /></a></li>
	   <li style="width: 121px;"><a href="http://www.btrax.com/"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/07/btrax_h_logo-2.1.png" width="92" style="border: 1px solid #6ba46a;" /></a></li>
	   <li style="width: 121px;"><a href="http://sv.thegmic.com/2012/engage-digital"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/07/app-conference1.jpg" width="92" style="border: 1px solid #6ba46a;" /></a></li>-->
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.mobileapptracking.com/" target="_blank"><img src="/wp-content/uploads/sponsors/hasoffers.png" height="57" style="border: 1px solid #547bed; padding: 0;"></a></li>
	  <li style="width: 111px; margin-right: 0px;"><img src="http://d21tg3af7k6jjf.cloudfront.net/wp-content/themes/gmicsv2013-core-test/images/gold-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.mobpartner.com/" target="_blank"><img src="/wp-content/uploads/sponsors/mobpartner.png" height="57" style="border: 1px solid #eba706; padding: 0;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.appannie.com/" target="_blank"><img src="/wp-content/uploads/sponsors/appannie.png" height="57" style="border: 1px solid #eba706; padding: 0;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://nativex.com/" target="_blank"><img src="/wp-content/uploads/sponsors/nativex.png" height="57" style="border: 1px solid #eba706; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://appsfire.com/" target="_blank"><img src="/wp-content/uploads/sponsors/appsfire.png" height="57" style="border: 1px solid #eba706; padding: 0px;"></a></li>
	  <li style="width: 111px; margin-right: 0px;"><img src="http://d21tg3af7k6jjf.cloudfront.net/wp-content/themes/gmicsv2013-core-test/images/top-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"> 
	    <!--<li style="width: 161px;"><a target="_blank" href="http://www.tencent.com/en-us/index.shtml"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/09/tencent-logo.jpg" width="135" style="border: 1px solid #7b6596; padding: 9px 5px 10px 5px;" /></a></li>--> 
	    <!--<li style="width: 161px;"><a target="_blank" href="http://english.sina.com/index.html"><img src="http://www.gmic-sv.com/wp-content/uploads/2012/09/sina-logo.jpg" width="135" style="border: 1px solid #7b6596; padding: 9px 5px 10px 5px;" /></a></li>--> 
	  </li>
	  <li style="width: 161px; margin-right: 0px;"><a href="http://www.ucweb.com/index.html" target="_blank"><img src="/wp-content/uploads/sponsors/ucweb.png" height="57" style="border: 1px solid #7b6596; padding: 0px;"></a></li>
	  <li style="width: 111px; margin-right: 0px;"><img src="http://d21tg3af7k6jjf.cloudfront.net/wp-content/themes/gmicsv2013-core-test/images/diamond-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.maxthon.com/?lang" target="_blank"><img src="/wp-content/uploads/sponsors/maxthon.png" height="57" style="border: 1px solid #547bed; padding: 0;"></a></li>
	  <li style="width: 139px; margin-right: 16px;"><a href="http://www.chukong-inc.com/en/" target="_blank"><img src="/wp-content/uploads/sponsors/coco.png" height="57" style="border: 1px solid #547bed; padding: 0;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.inmobi.com/" target="_blank"><img src="/wp-content/uploads/sponsors/inmobi.png" height="57" style="border: 1px solid #547bed; padding: 0;"></a></li>
	  <li style="width: 111px; margin-right: 0px;"><img src="http://svstatic.thegmic.com/wp-content/themes/gmicsv2013-core-test/images/platinum-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	  <li style="width: 139px; margin-right: 16px;"><a href="http://www.ggvc.com/" target="_blank"><img src="/wp-content/uploads/sponsors/ggvcapital.png" height="57" style="border: 1px solid #547bed; padding: 0;"></a></li>
	</ul>
	<div class="clearfix"></div>
	<div class="pagination" id="foo3_pag"></div>
</div>
<!-- BEGIN OLARK IMAGE TAB-->
<style>
    div#olark_tab{
        position: fixed;
        left: 0;
        bottom:77px;
        z-index:5000;
    }
    #olark_tab a {
        display:block;
        /*Edit these to change the look of your tab*/
        border: 0px solid white;
        border-left-style: none;
        border-bottom-style: none;
        margin-top:0px;
    }
    #olark_tab a:hover{
        border-color: orange;
    }
</style>

<div id="olark_tab">
    <a href="javascript:void(0);" onclick="olark('api.box.expand')">
        <img src="http://static.olark.com/images/livehelp-tab-icon.png" />
    </a>
</div>
<!-- END OLARK TAB-->

<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('6268-153-10-4835');/*]]>*/</script><noscript><a href="https://www.olark.com/site/6268-153-10-4835/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->
</body>
</html>