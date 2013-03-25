jQuery.noConflict();
jQuery(document).ready(function() {
  "use strict";
  var $picker_container = jQuery("div.ultimate-style-picker-wrapper");
  var $theme_url = mytheme_urls.theme_base_url;
  var $fw_url = mytheme_urls.framework_base_url;
  var $patterns_url = $fw_url+"theme_options/images/pattern/";
  
  //Check Cookies in diffent pages and do the following things
  //Applying all the things based on cookies
  if(jQuery.cookie("mytheme_skin")!== null){
    var $href = jQuery("link[id='skin-css']").attr("href");
    $href = $href.substr(0,$href.lastIndexOf("skins/"));
    $href = $href+"skins/"+jQuery.cookie("mytheme_skin")+"/style.css";
    jQuery("link[id='skin-css']").attr("href",$href);
    jQuery("ul.color-picker a[id='"+jQuery.cookie("mytheme_skin")+"']").addClass("selected");
  }else{
    jQuery("ul.color-picker a:first").addClass("selected");
  }
  
  if( jQuery.cookie('control-open') === '1' ){ 
    $picker_container.animate( { left: -230 } );
    jQuery('a.style-picker-ico').addClass('control-open');
  }
  
  //1. Applying patterns
  var $i = (jQuery.cookie("mytheme_pattern")) ? jQuery.cookie("mytheme_pattern")  : 'pattern1';
  var $img = $patterns_url+$i+".png";
  jQuery('.content .pattern').css('background-image', 'url('+$img+')');
  jQuery("ul.pattern-picker a[id="+$i+"]").addClass('selected');
  //End of Applying things based on Cookies
  
  //Picker On/Off
  jQuery("a.style-picker-ico").click(function(e){
    var $this = jQuery(this);
    if($this.hasClass('control-open')){
      $picker_container.animate({left: 0},function(){$this.removeClass('control-open');});
      jQuery.cookie('control-open', 0);
    }else{
      $picker_container.animate({left: -230},function(){$this.addClass('control-open');});
      jQuery.cookie('control-open', 1);
    }
    e.preventDefault();
  });//Picker On/Off End
  
  
  //Pattern Picker
  jQuery("ul.pattern-picker a").click(function(e){
      var $this = jQuery(this);
      jQuery("ul.pattern-picker a").removeAttr("class");
      $this.addClass("selected");
      jQuery.cookie("mytheme_pattern", $this.attr("id"), { path: '/' });
      var $img = $patterns_url+jQuery.cookie("mytheme_pattern")+".png";
      jQuery('.content .pattern').css('background-image', 'url('+$img+')');
	  
	  if(jQuery('#main-nav ul li:first').hasClass('current_page_item')) {
		  var $href = jQuery('#main-nav ul li:eq(1) > a').attr("href"),
		  targetPosition = jQuery($href).offset().top;
		  jQuery('html,body').animate({ scrollTop: targetPosition}, 'slow');
	  }
  e.preventDefault();
  });//Pattern Picker End
  
  //Color Picker
  jQuery("ul.color-picker a").click(function(e){
    var $this = jQuery(this);
    jQuery("ul.color-picker a").removeAttr("class");
    $this.addClass("selected");
    jQuery.cookie("mytheme_skin", $this.attr("id"), { path: '/' });
    var $href = jQuery("link[id='skin-css']").attr("href");
    $href = $href.substr(0,$href.lastIndexOf("skins/"));
    $href = $href+"skins/"+$this.attr("id")+"/style.css";
    jQuery("link[id='skin-css']").attr("href",$href);
    e.preventDefault();
  });//Color Picker End
  
});