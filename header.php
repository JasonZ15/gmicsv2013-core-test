<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<?php is_moible_view(); ?>
	<title><?php mytheme_public_title();?></title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	
    <meta property="og:title" content="<?php 
    if ( is_home() ) {
    mytheme_public_title();// This is a homepage
} else {
    the_title();// This is not a homepage
}
    
    ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php 
	if ( is_home() ) {
    echo home_url(); // This is a homepage
} else {
    the_permalink();// This is not a homepage
}
	 ?>" />
	<meta property="og:image" content="<?php $image = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post_id ), 'single-post-thumbnail' ); echo $image[0]; ?>" />
	<meta property="og:site_name" content="<?php mytheme_public_title();?>" />
	<meta property="og:description" content="<?php 
	if ( is_home() ) {
    echo get_post_meta(5, 'page-excerpt', true);// This is a homepage
} else {
    echo get_the_excerpt();// This is not a homepage
}
	 ?>" />
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
	 $mytheme_mobile = $mytheme_options['mobile'];
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
    <script type="text/javascript" src="http://sv.thegmic.com/demo/jScrollPane/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://sv.thegmic.com/demo/jScrollPane/jScrollPane.min.js"></script>
    <script type="text/javascript" src="http://sv.thegmic.com/demo/script.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/framework/js/public/amcharts.js" type="text/javascript"></script>
</head>

<body <?php body_class(); ?>>

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
	    <div id="top-bar">
		<div class="holder">
        	<div id="twitter-ticker" class="image_carousel">
	            <div id="tweet-container"><img id="loading" src="http://sv.thegmic.com/demo/img/loading.gif" width="16" height="11" alt="Loading.." /></div>
	        </div>
		<a href="http://www.thegmic.com" id="thegmic"></a>
		<a href="http://gmic.greatwallclub.com" id="gmic-beijing"></a>
		<a href="http://sv.thegmic.com" id="gmic-sv"></a>
		<?php if(isset($mytheme_general['show-sociables']) && !empty($mytheme_options['social'])): ?>
                        <ul class="social-icons" style="float: right; margin-bottom: 0px; margin-right: -44px;">
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
                        </ul>
                <?php endif;?>
		</div>
</div>
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