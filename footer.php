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
				
				
				jQuery(".home .work-flow a").click(function() {
			
					jQuery('html, body').animate({ scrollTop: jQuery("#rev_slider_1_1_wrapper").offset().top}, 'slow');
					jQuery(this).parent().next().children().fadeIn();
  					return false;
				});

			});
</script>
<img class="title-tab" src="<?php echo get_template_directory_uri(); ?>/images/sponsors-tab.png" />
<div id="sponsor-bar" class="image_carousel">	
	<ul id="foo3">
	  <li style="width: 111px; margin-right: 0px;"><img src="<?php echo get_template_directory_uri(); ?>/images/top-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"> </li>
     
      <li style="width: 161px; margin-right: 0px; "><a href="http://english.sina.com/index.html" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/sina.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li> <!--这是新浪改好-->
	  <li style="width: 161px; margin-right: 0px;"><a href="http://www.tencent.com/en-us/index.shtml" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/tencent.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li><!--这是腾讯改好的-->
	  <li style="width: 161px; margin-right: 0px;"><a href="http://us.91.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/91.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li><!--/*这是91改好的*/-->
    
       <li style="width: 161px; margin-right: 0px;"><a href="http://www.ucweb.com/index.html" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/ucweb.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li><!--这是ucweb改好的*/-->
       <li style="width: 161px; margin-right: 0px;"><a href="http://www.xiaomi.com" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/xiaomi.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li><!--/*这是小米改好的*/-->
       <li style="width: 161px; margin-right: 0px;"><a href="http://www.inmobi.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/inmobi.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li><!--/*这是inmobi改好的*/-->
       <li style="width: 166px; margin-right: 0px;"><a href="http://www.chukong-inc.com/en/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/chukong.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li><!--/*触控科技改好的*/-->
	   <li style="width: 166px; margin-right: 0px;"><a href="http://www.ijinshan.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/ijinshan.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li>
	   <li style="width: 166px; margin-right: 0px;"><a href="http://www.cmge.com/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/cmge.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li>
	   <li style="width: 166px; margin-right: 0px;"><a href="http://www.pwrd.com/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/pw.png" height="57" style="border: 1px solid #7b6596; padding: 0px;" /></a></li>

	   
	   <li style="width: 111px; margin-right: 0px;"><img src="<?php echo get_template_directory_uri(); ?>/images/diamond-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	   <li style="width: 161px;"><a href="http://store.wo.com.cn/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/wostore.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	   <li style="width: 161px;"><a href="http://www.o2omobi.com/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/bailing.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	   <li style="width: 161px;"><a href="http://www.ford.com/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/ford.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	   <li style="width: 161px;"><a href="http://www.autonavi.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/autonavi.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	   <li style="width: 161px;"><a href="http://www.ifc1000.org/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/ifc1000.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	   <li style="width: 161px;"><a href="http://www.huawei.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/honor.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	   
	  <li style="width: 111px; margin-right: 0px;"><img src="<?php echo get_template_directory_uri(); ?>/images/cnbc-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.cnbc.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/cnbc.png" height="57" style="border: 1px solid #e70012; padding: 0;" /></a></li>
	  
	  
	  <li style="width: 111px; margin-right: 0px;"><img src="<?php echo get_template_directory_uri(); ?>/images/platinum-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.WQMobile.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/wqmobile.png" height="57" style="border: 1px solid #547bed; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.domob.cn/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/domob2.png" height="57" style="border: 1px solid #547bed; padding: 0;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="https://www.mo9.com.cn/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/mo9.png" height="57" style="border: 1px solid #547bed; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.youmi.net/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/youmi.png" height="57" style="border: 1px solid #547bed; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://funplus.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/funplus.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.duokoo.cn/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/baidugame.png" height="57" style="border: 1px solid #547bed; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.avazu.cn/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/avazu.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.ksyun.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/ksyun.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.hdtmedia.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/hdt.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.maxthon.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/aoyou.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.ifeng.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/ifeng.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.adsage.cn/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/adsage.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://en.sky-mobi.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/sky-mobi.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.yijifen.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/yijifen.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="https://www.tenpay.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/tenpay.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.adwo.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/adwo.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.funshion.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/funshion.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.zhidian3g.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/zhidian.png" height="57" style="border: 1px solid #547bed; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.feiliu.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/flmobile.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.microsoft.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/microsoft.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.ssipcd.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/xinchuan.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.google.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/google.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.igetui.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/getui.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.yongche.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/yidao.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.idigest.com.cn/en/index.htm/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/idigest.png" height="57" style="border: 1px solid #547bed; padding: 0;" /></a></li>
	  
	  
	  <li style="width: 111px;"><img src="<?php echo get_template_directory_uri(); ?>/images/gold-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;" /></li>
	  <li style="width: 139px;"><a href="http://www.admaster.com.cn/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/admaster.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.weiboyi.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/weiboyi.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="https://www.talkingdata.net/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/talkingdata.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.sogou.com/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/sogou.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.gmbird.com/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/gmbird.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.lomark.cn/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/lomark.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.pacific-crest.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/pacific-crest.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.gametider.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/guangtao.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.mafengwo.cn/" target="_blank"><img src="http://beijing.thegmic.com/cn/wp-content/uploads/sponsors/mfw.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.xishanju.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/xishanju.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.payeco.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/payeco.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://chumenwenwen.net/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/wenwen.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.oupeng.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/oupeng.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.pivoful.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/veme.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://www.vhall.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/vhall.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>
	  <li style="width: 139px;"><a href="http://weishi.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/weishi.png" height="57" style="border: 1px solid #eba706; padding: 0;" /></a></li>

	  <li style="width: 111px; margin-right: 0px;"><img src="<?php echo get_template_directory_uri(); ?>/images/silver-sponsor-tab.jpg" width="97" height="59" style="padding:0; border: none;"></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.appsflyer.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/appsflyer.png" height="57" style="border: 1px solid #B6B6B6; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://www.mobpartner.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/mobpartner.png" height="57" style="border: 1px solid #B6B6B6; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="http://nativex.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/nativex.png" height="57" style="border: 1px solid #B6B6B6; padding: 0px;"></a></li>
	  <li style="width: 139px; margin-right: 0px;"><a href="https://www.nexmo.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/uploads/sponsors/nexmo.png" height="57" style="border: 1px solid #B6B6B6; padding: 0px;"></a></li>
	
	</ul>
	<div class="clearfix"></div>
	<div class="pagination" id="foo3_pag"></div>
</div>
<!-- BEGIN OLARK IMAGE TAB-->
<!--<style>
    div#olark_tab{
        position: fixed;
        right: 0;
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
</style>-->

<!--<div id="olark_tab">
    <a href="javascript:void(0);" onclick="olark('api.box.expand')">
        <img src="<?php echo get_template_directory_uri(); ?>/images/olark.png" />
    </a>
</div>-->
<!-- END OLARK TAB-->

<!-- begin olark code -->
<!--<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
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
olark.identify('6268-153-10-4835');/*]]>*/</script><noscript><a href="https://www.olark.com/site/6268-153-10-4835/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>-->
<!-- end olark code -->
</body>
</html>