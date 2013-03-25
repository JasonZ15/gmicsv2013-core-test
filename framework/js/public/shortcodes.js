jQuery.noConflict();
jQuery(document).ready(function() {
  
  // Tabs Shortcodes
  "use strict";
  if(jQuery('ul.tabs').length > 0) {
    jQuery('ul.tabs').tabs('> .tabs_content');
  }
  
  if(jQuery('ul.tabs-frame').length > 0){
    jQuery('ul.tabs-frame').tabs('> .tabs-frame-content');
  }
  
  if(jQuery('.tabs-vertical-frame').length > 0){
    
    jQuery('.tabs-vertical-frame').tabs('> .tabs-vertical-frame-content');
    
    jQuery('.tabs-vertical-frame').each(function(){
      jQuery(this).find("li:first").addClass('first').addClass('current');
      jQuery(this).find("li:last").addClass('last');
    });
    
    jQuery('.tabs-vertical-frame li').click(function(){
      jQuery(this).parent().children().removeClass('current');
      jQuery(this).addClass('current');
    });
    
  }/*Tabs Shortcode Ends*/
  
  /*Toggle shortcode*/
  jQuery('.toggle').toggle(function(){ jQuery(this).addClass('active'); },function(){ jQuery(this).removeClass('active'); });
  jQuery('.toggle').click(function(){ jQuery(this).next('.toggle-content').slideToggle(); });
  jQuery('.toggle-frame-set').each(function(){
    var $this = jQuery(this),
        $toggle = $this.find('.toggle-accordion');
    
    $toggle.click(function(){
      if( jQuery(this).next().is(':hidden') ) {
        $this.find('.toggle-accordion').removeClass('active').next().slideUp();
        jQuery(this).toggleClass('active').next().slideDown();
      }
      return false;
    });
    
    //Activate First Item always
    $this.find('.toggle-accordion:first').addClass("active");
    $this.find('.toggle-accordion:first').next().slideDown();
  });/* Toggle Shortcode end*/
  
  /*Tooltip*/
  if(jQuery(".tooltip-bottom").length){
    jQuery(".tooltip-bottom").each(function(){	jQuery(this).tipTip({maxWidth: "auto"}); });
  }
  
  if(jQuery(".tooltip-top").length){
    jQuery(".tooltip-top").each(function(){ jQuery(this).tipTip({maxWidth: "auto",defaultPosition: "top"}); });
  }
  
  if(jQuery(".tooltip-left").length){
    jQuery(".tooltip-left").each(function(){ jQuery(this).tipTip({maxWidth: "auto",defaultPosition: "left"}); });
  }
  
  if(jQuery(".tooltip-right").length){
    jQuery(".tooltip-right").each(function(){ jQuery(this).tipTip({maxWidth: "auto",defaultPosition: "right"}); });
  }
  /*Tooltip End*/
  
  //Scroll to top
  jQuery("a.scrollTop").each(function(){
	  jQuery(this).click(function(e){
		  jQuery("html, body").animate({ scrollTop: 0 }, 600);
		  e.preventDefault();
	  });
  });//Scroll to top end
     
});