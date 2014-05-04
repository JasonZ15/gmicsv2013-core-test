<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<script id="allmobilize" charset="utf-8" src="http://a.yunshipei.com/70f4e05328cebbb52a19e558ac6725a2/allmobilize.min.js"></script><meta http-equiv="Cache-Control" content="no-siteapp" /><link rel="alternate" media="handheld" href="#" />
	<meta charset="utf-8">
	<?php is_moible_view(); ?>
	<title><?php mytheme_public_title();?></title>
	
	<!--<meta name="description" content="">-->
	<meta name="author" content="">
	<script type="text/javascript">
		window.qbaka || (function(a,c){a.__qbaka_eh=a.onerror;a.__qbaka_reports=[];a.onerror=function(){a.__qbaka_reports.push(arguments);if(a.__qbaka_eh)try{a.__qbaka_eh.apply(a,arguments)}catch(b){}};a.onerror.qbaka=1;a.qbaka={report:function(){a.__qbaka_reports.push([arguments, new Error()]);},customParams:{},set:function(a,b){qbaka.customParams[a]=b},exec:function(a){try{a()}catch(b){qbaka.reportException(b)}},reportException:function(){}};var b=c.createElement("script"),e=c.getElementsByTagName("script")[0],d=function(){e.parentNode.insertBefore(b,e)};b.type="text/javascript";b.async=!0;b.src="//cdn.qbaka.net/reporting.js";"[object Opera]"==a.opera?c.addEventListener("DOMContentLoaded",d):d();qbaka.key="c5b79fe685e95872747d18cee9039727"})(window,document);qbaka.options={autoStacktrace:1,trackEvents:1};
	</script>
    
	<meta property="fb:admins" content="670979947" />
    <meta property="fb:app_id" content="241568569321866" />
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
    <?php
	/* Theme Settings */
	 $mytheme_options = get_option(IAMD_THEME_SETTINGS);
	 $mytheme_general = $mytheme_options['general'];
	 $mytheme_appearance = $mytheme_options['appearance'];
	 // $mytheme_mobile = $mytheme_options['mobile'];
	 $mytheme_integration = $mytheme_options['integration'];?>

    
    <!-- **CSS - stylesheets** -->
    <link id="skin-css" href="<?php echo IAMD_BASE_URL;?>skins/<?php echo $mytheme_appearance['skin'];?>/style.css" rel="stylesheet" media="all" />
    <link id="shortcodes-css" href="<?php echo IAMD_BASE_URL;?>shortcodes.css" rel="stylesheet" type="text/css" media="all" />  
    <link id="default-css" href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" media="all" />
    <?php set_layout();?>    
    
    <!-- **Font Awesome** -->
    <!--[if IE 7]>
    <link rel="stylesheet" href="<?php echo IAMD_BASE_URL;?>css/font-awesome-ie7.min.css">
    <![endif]-->
    
    <?php if(isset($mytheme_general['enable-favicon'])):
		$url = !empty($mytheme_general['favicon-url']) ? $mytheme_general['favicon-url'] : IAMD_BASE_URL."images/favicon.ico";?>
    <!-- **Favicon** -->
    <link href="<?php echo $url;?>" rel="shortcut icon" type="image/x-icon" />
    <?php endif; ?>

<?php do_action('load_head_styles_scripts');?>
<?php #Header Code Section
	if(isset($mytheme_integration['enable-header-code'])):
		echo stripslashes($mytheme_integration['header-code']);
	endif;?>
<?php wp_head(); ?>
    <!--<script type="text/javascript" src="http://sv.thegmic.com/demo/jScrollPane/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://sv.thegmic.com/demo/jScrollPane/jScrollPane.min.js"></script>
    <script type="text/javascript" src="http://sv.thegmic.com/demo/script.js"></script>-->
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/public/amcharts.js" type="text/javascript"></script>
<link href="<?php echo get_template_directory_uri(); ?>/jcountdown/jcountdown.css" rel="stylesheet" type="text/css">
<script src="<?php echo get_template_directory_uri(); ?>/jcountdown/jquery.jcountdown.min.js"></script> 
<!-- Start of Async HubSpot Analytics Code -->
  <script type="text/javascript">
    (function(d,s,i,r) {
      if (d.getElementById(i)){return;}
      var n=d.createElement(s),e=d.getElementsByTagName(s)[0];
      n.id=i;n.src='//js.hs-analytics.net/analytics/'+(Math.ceil(new Date()/r)*r)+'/341315.js';
      e.parentNode.insertBefore(n, e);
    })(document,"script","hs-analytics",300000);
  </script>
<!-- End of Async HubSpot Analytics Code -->
<link rel="stylesheet" href="http://beijing.thegmic.com/wp-content/themes/2014/css/slicknav.css">
         <link rel="stylesheet" href="http://beijing.thegmic.com/wp-content/themes/2014/css/style.css">
         <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
         <script type="text/javascript" src="http://beijing.thegmic.com/wp-content/themes/2014/framework/js/public/jquery.slicknav.min.js"></script>
     	<script type="text/javascript">
 			jQuery(document).ready(function(){
 				jQuery('#menu').slicknav();
 			});
 		</script>
</head>
<body id="gmic-beijing" <?php body_class(); ?>>
	 <div id="top-bar">
		<div class="holder">
        	<div id="twitter-ticker" class="image_carousel" style="display: block;">
  
    <div id="tweet-container">
      
    <div class="tweet">
        <div class="user"><a href="http://www.weibo.com/gmic" target="_blank">GMIC: </a></div>
        <span class="txt">G20峰会旨在汇聚中外知名企业领袖, 共同探讨一年一度全球移动互联网热点话题</span><a href="http://www.weibo.com/1656614907/AdXhH8mov?mod=weibotime" target="_blank">...</a> </div>
   
    
    <div class="tweet">
        <div class="user"><a href="http://www.weibo.com/gmic" target="_blank">GMIC: </a></div>
        <span class="txt">透过GMIC2013看趋势 230位演讲嘉宾观点大整合！</span><a href="http://www.weibo.com/1656614907/A9SBJ4boQ?mod=weibotime" target="_blank">...</a></div>
    
    </div>
  
</div>
		</div>
</div><?php if(isset($mytheme_general['show-sociables']) && !empty($mytheme_options['social'])): ?>
                        <ul class="social-icons" style="margin-bottom: 0px; position: fixed;right: 64px;z-index: 99999999999;">
                         <?php foreach($mytheme_options['social'] as $social):
                                  $link = $social['link'];
                                  $custom_image = isset($social['custom-image']) && !empty($social['custom-image']) ? "<img src='{$custom_image}' />": '';
                                  $icon = $social['icon'];
                                  echo "<li>";
                                  echo "	<a href='{$link}'>";
                                  if(!empty($custom_image)):
                                             echo $custom_image;
                                  else:
                                             echo "<img width='21px' src='".IAMD_BASE_URL."/images/sociable/hover/{$icon}' alt='{$icon}' />";
                                  endif;
                                             echo "<img width='21px' src='".IAMD_BASE_URL."/images/sociable/{$icon}' alt='{$icon}' />";
                                  
                                  echo "	</a>";
                                  echo "</li>"; 						 
                               endforeach;?>
                              <li class="chinese"><a href="http://beijing.thegmic.com/cn/"></a></li><li class="english"><a href="http://beijing.thegmic.com/"></a></li><li class="japanese"><a href="http://beijing.thegmic.com/jp/"></a></li>
                        </ul>
                <?php endif;?>
	<ul id="menu">
     <li><a href="http://www.thegmic.com" target="_blank" style="float: left;"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/gmic-logo-white-small.png" /> </a>
         <ul>
            <li style="padding:0;padding-left:3px;"><a href="http://beijing.thegmic.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/beijing.png" /></a></li>
            <li style="padding:0;"><a href="http://tokyo.thegmic.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/tokyo.png" /></a></li>
            <li style="padding:0;"><a href="http://nd.thegmic.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/nd.png" /></a></li>
            <li style="padding-left:0;"><a href="http://sv.thegmic.com/" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/sv.png" /></a></li>
       </ul>
     </li>
     <li><a href="http://www.gwc.net/network" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/member.png" /></a></li>
     <li><a href="http://blog.thegmic.com" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/blog.png" /></a></li>
     <li style="float:right;"><a href="http://www.gwc.net" target="_blank"><img src="http://beijing.thegmic.com/wp-content/themes/2014/images/gwc-logo-white-small-copy.png" /></a></li>
 </ul>

<?php if(!isset($mytheme_general['disable-picker'])):	mytheme_color_picker();	endif;	?>

<!-- BBar -->
<?php if(mytheme_option('bbar','show-bbar')):
	   $staus =  mytheme_option('bbar','status-bbar');
	   $bbar_body = "style='display:block;'" ;
	   $bbar_open = "style='display:none;'";
	   if(isset($staus)):
	  	 $bbar_body = "style='display:none;'";
		 $bbar_open = "style='display:block;'";
	   endif;
	   
	   $bgcolor  = mytheme_option('bbar','bar-bg-color');
	   $bgcolor  = ($bgcolor!="#") && !empty($bgcolor) ? $bgcolor : NULL;
	   $bgcolor	 = mytheme_option('bbar','disable-bg-color') ? $bgcolor : NULL;
	   $bgcolor  = !empty($bgcolor) ? "background:{$bgcolor};": NULL;
	   
	   $border_shadow  = mytheme_option('bbar','bar-shadow-color');
	   $border_shadow  = ($border_shadow!="#") && !empty($border_shadow) ? $border_shadow : NULL;
	   $border_shadow  = mytheme_option('bbar','disable-shadow-color') ? $border_shadow : NULL;
	   $border_shadow  = !empty($border_shadow) ? "box-shadow:0 3px 5px {$border_shadow}; -moz-box-shadow:0 3px 5px {$border_shadow};-webkit-box-shadow:0 3px 5px {$border_shadow};": NULL;
		$inline_style  = !empty($bgcolor) ? $bgcolor : NULL;
		$inline_style .=  !empty($border_shadow) ? $border_shadow : NULL;
		$inline_style  = !empty($inline_style) ?"style='{$inline_style}'": NULL;?>
<!-- bbar-wrapper -->
<div id="bbar-wrapper" <?php echo $inline_style;?>>
	<div id="bbar-body" <?php echo $bbar_body ;?> >
    	<?php echo stripslashes(mytheme_option('bbar','message'));?>
        <div id="bbar-close"><img src="<?php echo IAMD_BASE_URL."images/bbar/close-bar.png";?>" alt="bclose" title="" /> </div>
    </div>
    <div id="bbar-open" <?php echo $bbar_open;?>><img src="<?php echo IAMD_BASE_URL."images/bbar/open-bar.png";?>" alt="bopen" /> </div>
</div><!-- bbar-wrapper end-->
<?php endif;?>
<!-- BBar End -->
<!-- **Header** -->
<header id="header" class="large">
	   
	<div class="container">
    	<!-- **Logo** -->
        <div id="logo">
		<?php if($mytheme_general['logo']):
                $url = !empty($mytheme_general['logo-url']) ? $mytheme_general['logo-url'] : IAMD_BASE_URL."/images/logo.png";?>
                <a href="<?php echo home_url();?>" title="<?php bloginfo('title');?>">
                    SILICON VALLEY'S LARGEST MOBILE CONFERENCE & EXPO
                </a>
        <?php else:?>    
            <h1><?php bloginfo('title');?></h1>
            <h2><?php bloginfo('description');?></h2>
        <?php endif;?>    
        </div><!-- **Logo - End** -->
        
        <!-- **Navigation** -->
        <nav id="main-nav">
        <?php $primaryMenu = NULL;
			if (function_exists('wp_nav_menu')) :
					$class = mytheme_option("appearance","menu-rounded");
					$class = !empty($class) ? "menu menu-rounded" : "menu";
					$primaryMenu = wp_nav_menu(array('theme_location'=>'primary-menu','menu_id'=>'','menu_class'=>$class,'fallback_cb'=>'my_default_navigation'
					,'echo'=>false,'container'=>'false','walker' => new my_menu_walker()));
			endif;
			if(!empty($primaryMenu))	echo $primaryMenu;?>
        </nav><!-- **Navigation - End** -->

    </div>
</header><!-- **Header - End** -->

<!-- **Main Section** -->
<section id="main">