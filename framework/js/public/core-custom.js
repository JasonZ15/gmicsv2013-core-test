audiojs.events.ready(function() {
  "use strict";
  audiojs.createAll();
});
jQuery(document).on("scroll",function($){
			if(jQuery(document).scrollTop()>50){ 
				jQuery("header").removeClass("large").addClass("small");
				}
			else{
				jQuery("header").removeClass("small").addClass("large");
				}
			});
jQuery(document).ready(function($){
  
  "use strict";
  function scrollTo(target){
    var myArray = target.split('#');
    var targetPosition = jQuery('#' + myArray[1]).offset().top;
    jQuery('html,body').animate({ scrollTop: targetPosition}, 'slow');
  }

  /*Applying Font color for single page template*/
  $(".custom-font-color").each(function(){
    var $id = $(this).attr("id"),
        $primary_color = $(this).attr("data-for-primary-color"),
        $secondary_color = $(this).attr("data-for-secondary-color"),
        $title_color = $(this).attr("data-for-title-color");
    
    if( $primary_color !== "undefined") {
      $("article#"+$id+" a").css("color",$primary_color);
    }
    
    if( $title_color !== "undefined") {
      $("article#"+$id+" h1").css("color",$title_color);
      $("article#"+$id+" h2").css("color",$title_color);
      $("article#"+$id+" h3").css("color",$title_color);
      $("article#"+$id+" h4").css("color",$title_color);
      $("article#"+$id+" h5").css("color",$title_color);
      $("article#"+$id+" h6").css("color",$title_color);
    }
    
    if( $secondary_color !== "undefined") {
      $("article#"+$id+" a").hover(function(){
        $(this).css("color",$secondary_color);
      },function(){
        if( $primary_color !== "undefined") {
          $(this).css("color",$primary_color);
        }
      });
    }
    
  });
  /*Applying Font color for single page template end*/

  /*Menu Functionality*/
  jQuery("#main-nav ul li:has(ul)").each(function(){
    jQuery(this).addClass("hasSubmenu");
    jQuery(this).find("ul.sub-menu a").addClass("external");
  });
  
  var $location = window.location.href,
      $index = $location.indexOf("#"),
      $link = jQuery("#main-nav > ul.menu").find("a[href='"+$location+"']"),
      $not_external  = jQuery("#main-nav > ul.menu > li > a:not('.external')");
  
  if( jQuery("#main-nav > ul.menu > li.current_page_item").hasClass('external') || jQuery("#main-nav > ul.menu > li").hasClass('current-page-ancestor')  ){
  
  }else if( $link.length === 0 && $index === -1 && $location !== (mytheme_urls.url+"/") ){

  }else{
    
    if($index > -1){
      var $l = $location.substring($location.length,$index);
      jQuery("#main-nav > ul.menu").find("a[href='"+$l+"']").parent("li").addClass('current_page_item');
    }else{
    }
    
    jQuery('.home #main-nav ul').onePageNav({
      currentClass: 'current_page_item',
      filter: ':not(.external)'
    });
  }
  
  if(jQuery.browser.safari || jQuery.browser.msie) {
    jQuery("#main-nav ul ul").css('display','none');
    jQuery("#main-nav li.hasSubmenu").hover(function(){
      jQuery(this).children("ul.sub-menu").css('display','block');
    },function(){
      jQuery(this).children("ul.sub-menu").css('display','none');
    });
  }

  $('#main-nav ul.menu').mobileMenu({
    defaultText: 'Navigate to...',
    className: 'mobile-menu',
    subMenuDash: '&ndash;'
  });
  /*Menu Functionality End*/

  /*Portfolio isotope*/
  var $container = $('.portfolio-container');
  
  var $containerHomeSpeakerSection = $('#speakers .portfolio-container');
  var $containerSpeakerPage = $('.page-id-10787 .portfolio-container');
  var $containerSpeakersPage = $('.page-id-28 .portfolio-container');
  
  if($container.length){
    $container.isotope({
      filter: '*',
      animationOptions: { duration: 750, easing: 'linear', queue: false  }
    });
  }
  
  if($("div#sorting-container").length){
  	var selectorHomeSpeakerSection = '.confirmed-speakers-sort';
  	$containerHomeSpeakerSection.isotope({ filter: selectorHomeSpeakerSection, animationOptions: { duration: 750, easing: 'linear',  queue: false }});
  	
  	var selectorSpeakerPage = '.confirmed-speakers-sort';
  	$containerSpeakerPage.isotope({ filter: selectorSpeakerPage, animationOptions: { duration: 750, easing: 'linear',  queue: false }});    

  	var selectorSpeakersPage = '.thought-leader-sort';
  	$containerSpeakersPage.isotope({ filter: selectorSpeakersPage, animationOptions: { duration: 750, easing: 'linear',  queue: false }});    

    $("div#sorting-container a").click(function(){
      $("div#sorting-container a").removeClass("active-sort");
      var selector = $(this).attr('data-filter');
      $(this).addClass("active-sort");
      $container.isotope({ filter: selector, animationOptions: { duration: 750, easing: 'linear',  queue: false }});
      return false;
    });
  }
  /*Portfolio isotope end*/

  /* Contact Send mail*/
  $(".enquiry-form").submit(function(e){
    var $form   = $(this),
        $msg    = $(this).prev('div.message'),
        $action = $form.attr('action');
    $.post($action,$form.serialize(),function(data){
      $form.fadeOut("fast", function(){
        $($msg).hide().html(data);
        $($msg).show('fast');
      });
    });
    e.preventDefault();
  });
  /*Contact Form Send Mail End*/

  /*Newsletter Signup Form*/
  $(".newsletter-form").submit(function(e){
    var $form = $(this),
        $msg = $(this).prev('div.message'),
        $action = $form.attr('action');
    
    $.post($action,$form.serialize(),function(data){
      $form.fadeOut("fast",function(){
        $($msg).hide().html(data);
        $($msg).show('fast');
      });
    });
    
    e.preventDefault();
  });  
  /*Newsletter Signup Form End*/

  /*Testimonal Carousel*/
  if( $('.testimonial-carousel').length ) {
    $('.testimonial-carousel').each(function(){
      $(this).carouFredSel({
        responsive:true,
        auto:false,
        width:'100%',
        prev:$(this).prev("div.testimonial-slider-arrows").find("a.prev"),
        next:$(this).prev("div.testimonial-slider-arrows").find("a.next"),
        height:'auto',
        scroll:1,
        items:{
          width: 460,
          visible: {min: 1,max: 2}
        }
      });
    });
  }
  /*Testimonal Carousel End*/

  /*Blog Carousel*/
  if( $('.blog-carousel').length ) {
    $('.blog-carousel').each(function(){
      $(this).carouFredSel({
        responsive:true,
        auto:false,
        width:'100%',
        prev:$(this).parents(".blog-carousel-wrapper").find("a.prev-posts"),
        next:$(this).parents(".blog-carousel-wrapper").find("a.next-posts"),
		pagination: $(this).parents(".blog-carousel-wrapper").find("#pager"),
        height:'auto',
        scroll:1,
        items:{
          width: 460,
          visible: {min: 1,max: 2}
        }
      });
    });
  }
  /*Blog Carousel End*/

  if( $(".gallery a[data-gal^='prettyPhoto']").length ){
    $(".gallery a[data-gal^='prettyPhoto']").prettyPhoto({
      animation_speed:'normal',
      theme:'light_square',
      slideshow:3000,
      autoplay_slideshow: false,
      social_tools: false,
      deeplinking:false
    });
  }  
  /*Show Portfolio Items*/
  if(jQuery('ul.ajax-load').length > 0 ) {
    var $portfolio_container = jQuery("div.portfolio-container");
    jQuery('ul.ajax-load').each(function(){
       var container = jQuery(this),
           links = container.find("a"),
           $page_id = container.parent("div.pagination").attr('data-page-id'),
           $action = 'show_portfolio_items';
      
      links.bind('click',function(){
        var link = jQuery(this),
            link_value = link.text();
        
        if( link.hasClass("active-page")) { 
          return false;
        }
        
        jQuery.ajax({
          type: "POST",
          url: mytheme_urls.ajaxurl,
          data:{action : $action,page: link_value, page_id:$page_id},
          complete: function(){
            $portfolio_container.isotope({
              filter: '*',
              animationOptions: { duration: 750, easing: 'linear', queue: false  }
            });
          },
          success: function(data){
            links.removeClass();
            link.addClass('active-page');
            $portfolio_container.html(data);
          }
        });//Ajax call end
        
        return false;
      });//links Click end
    });//each end
  }
  /*Show Portfolio Items*/
  
  /*Portfolio Single BX Slider*/
  if($('.portfolio-slider').length){
    $('.portfolio-slider').bxSlider({
      auto: true,
      mode: 'fade',
      pager: ''
    });
  }
  /*Portfolio Single BX Slider End*/

  /*Buddha Bar*/
  jQuery("div#bbar-open").click(function(e){
    jQuery(this).hide();
    jQuery("div#bbar-body").slideDown('slow',function(){jQuery("div#bbar-close").show();});
    e.preventDefault();
  });
  
  jQuery("div#bbar-close").click(function(e){
    jQuery("div#bbar-close").hide();
    jQuery("div#bbar-body").slideUp('slow');
    jQuery("div#bbar-open").slideDown();
    e.preventDefault();
  });
  /*Buddha Bar End*/
 
  jQuery('#sched-iframe').css( "clear", "both" );
   
});