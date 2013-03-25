jQuery.noConflict();
var mythemeAdmin = {
  init : function(){
    
    //To Show Video in Slider post
    "use strict";
    jQuery("td.slider-image").each(function(){ jQuery(this).find("iframe").attr("height","225"); });
    
    
    mythemeAdmin.adminPanelTab();
    
    mythemeAdmin.adminPanelTooltipHelp();
    
    mythemeAdmin.mediaUpload(); //upload logo ,favicon ...
    
    mythemeAdmin.layoutSelect();
    
    mythemeAdmin.menuAdd();
    
    mythemeAdmin.menuRemove();
    
    mythemeAdmin.menuCancel();
    
    mythemeAdmin.menuEdit();
    
    mythemeAdmin.adminOptionSave(); // when clicking the submit button in the options page , adminOptionSave() will be triggred and it will calls the adminOptionFormSubmit()
    
    mythemeAdmin.adminOptionFormSubmit();
    
    mythemeAdmin.resetConfirm(); //To reset the admin panel saved options
    
    mythemeAdmin.multiDropdown();
    
    mythemeAdmin.colorPicker();
    
    mythemeAdmin.skinChooser();
    
    mythemeAdmin.themeLayoutChooser();
    
    mythemeAdmin.importData();
    
    mythemeAdmin.sliderSelection();
    
    mythemeAdmin.fontSelection();
    
    mythemeAdmin.customSwitch();
    
    mythemeAdmin.customUISlider();
    
    mythemeAdmin.backgroundPicker(); // Used in appearance tab at layout section in choosing Background type combo
    
    mythemeAdmin.sliderTypePicker(); // Unsed in Every post page
    
    mythemeAdmin.pageTemplateChooser();
	
  },// init() End
  
  adminPanelTab : function(){
    "use strict";
   var  $tab = jQuery('#bpanel,#bpanel div.bpanel-content');
    if($tab.length) { $tab.tabs({ fx: { opacity: 'toggle', duration:'fast' }, selected: 0 }); }
  },//adminPanelTab 

  adminPanelTooltipHelp: function(){
    "use strict";
    var $item = jQuery("div.bpanel-option-help a");	
    $item.click(function(e){ e.preventDefault(); });
    
    $item.each(function(){
      jQuery(this).live('mouseover',function(){
        var $x1 = -4, $y1 = -138;
        if(jQuery(this).hasClass('a_image_preivew')){
          var $x1 = -25, $y1 = -150;
        }
        
        jQuery(this).tooltip({
          predelay:0,
          opacity: 0.9,
          effect:'slide',
          direction:'right',
          relative:true,
          tipClass:'bpanel-option-help-tooltip',
          delay: 500,
          offset: [$x1,$y1]
         });
        jQuery(this).tooltip().show();
      });
    });
  },//adminPanelTooltipHelp  
  
  mediaUpload: function(){
    "use strict";
    var fileInput = '',
        $this ='',
        $previewImg ='',
        header_clicked = false,
        icon_clicked = false;
    
    jQuery(".upload_image_reset").live("click",function(e){
      jQuery(this).siblings(".uploadfield").val('');
      var $img = jQuery(this).siblings("div.bpanel-option-help").find('img:last');
      $img.attr('src',$img.attr('data-default'));
      e.preventDefault();
    });
    
    jQuery(".upload_image_button").live("click",function(e){
      var $this = jQuery(this);
      fileInput = jQuery(this).siblings(".uploadfield");
      $previewImg = jQuery(this).siblings("div.bpanel-option-help").find('img:last');
      tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;mytheme_upload_button=1&amp;TB_iframe=true');
      header_clicked = true;
      e.preventDefault();
    });
    
    // Store original function
    window.original_send_to_editor = window.send_to_editor;
    window.original_tb_remove = window.tb_remove;
    
    // Override removing function (resets our boolean)
    window.tb_remove = function() {
      if(header_clicked && mysiteWpVersion>='3.3') {
        deleteUserSetting('uploader');
        jQuery('.media-upload-form').removeClass('html-uploader');
      }
      
      if(icon_clicked){
        jQuery('.icon_preset_button').attr('id', '');
      }
      
      header_clicked = false;
      icon_clicked = false;
      window.original_tb_remove();
    };
    
    // Override send_to_editor function from original script
    // Writes URL into the textbox.
    // Note: If header is not clicked, we use the original function.
    window.send_to_editor = function(html) {
      if (header_clicked) {
        var imgurl = jQuery(html).attr('src');
        fileInput.val(imgurl);
        
        //Show preview image
        if(jQuery($this).hasClass('show_preview')){
          $previewImg.attr('src',imgurl);
        }//Show preview image end
        
        if(mysiteWpVersion>='3.3') {
          deleteUserSetting('uploader');
          jQuery('.media-upload-form').removeClass('html-uploader');
        }
        tb_remove();
        
      }else{
        window.original_send_to_editor(html);
      }
    };
      
        
  },//mediaUpload

  layoutSelect : function(){
    "use strict";
    jQuery(".bpanel-layout-set").each(function(){
      jQuery(this).find("a").click(function(e){
        var $parent = jQuery(this).parents(".bpanel-layout-set"),
            $input = $parent.next(":input");
        if( jQuery(this).hasClass("selected") ) {
          jQuery(this).removeClass("selected");
          $input.val('');
        } else{
          $parent.find("a.selected").removeClass("selected");
          $input.val(jQuery(this).attr("rel"));
          jQuery(this).addClass("selected");
        }
        e.preventDefault();
      });
    });
  },//layoutSelect
  
  menuAdd : function(){
    "use strict";
    jQuery('.mytheme_add_item').click(function(e){
      var $this = jQuery(this).parent().next(),
          $appendTo = $this.find('.menu-to-edit'),
          $itemToClone = $this.find('.sample-to-edit li'),
          $item = $appendTo.find('li'),
          $itemsCount = $item.length,
          $allIds = []; //$allIds = new Array();
      
      $item.each(function(){
        if(jQuery(this).attr('id')){
          var $itemId = jQuery(this).attr('id').match(/\d+/g);
          if($itemId){
            $allIds.push(parseInt($itemId,10));
          }
        }
      }); //end each
      
      var $newID = (jQuery($appendTo).css('display') === 'none' )? $itemsCount : $itemsCount+1;
      while (jQuery.inArray($newID, $allIds) !== -1 ) {
        $newID++;
      }
      
      var $newClone = $itemToClone.clone().attr('id',"social-"+$newID);
      $newClone.find(".social-select").attr('name',"mytheme[social][social-"+$newID+"][icon]");
      $newClone.find(".upload_image_button").attr('name',"mytheme[social][social-"+$newID+"][custom-image]");
      $newClone.find(".social-link").attr('name',"mytheme[social][social-"+$newID+"][link]");
      $newClone.find(".item-title").text("Sociable "+ $newID);
      
      var $newAppend = jQuery($appendTo).append(function(index,html){
        return $newClone;
      });
      e.preventDefault();
    });
  },//menuAdd  

  menuRemove: function(){
    "use strict";
    jQuery(".remove-item").live('click',function(e){
      var $this = jQuery(this).parent().parent().parent();
      $this.addClass('deleting').animate({opacity : 0,height: 0},350,function(){ $this.remove();});
      e.preventDefault();
    });
  },//menuRemove

  menuCancel: function(){
    "use strict";
    jQuery(".cancel-item").live( 'click', function(e) {
      jQuery(this).parents('.item-content').slideToggle('fast');
      e.preventDefault();
    });
  }, //menuCancel
  
  menuEdit: function(){
    "use strict";
    jQuery(".item-edit").live( 'click', function(e) {
      jQuery(this).parents('.item-bar').next(".item-content").slideToggle('fast');
      e.preventDefault();
    });
  },//menuEdit

  menuSort: function(){
    "use strict";
    jQuery(".menu-to-edit").sortable({placeholder: 'sortable-placeholder'});
  },//menuSort
  
  adminOptionSave: function(){
    "use strict";
    jQuery('.mytheme-footer-submit').click(function(e){
      var bodyelem = "";
      if(jQuery.browser.safari){ bodyelem = jQuery('body'); } else if(jQuery.browser.chrome){ bodyelem = jQuery('body'); } else { bodyelem = jQuery('html'); }
      bodyelem.animate({scrollTop:0},'fast',function(){
        jQuery('form#mytheme_options_form').submit();
      });
      e.preventDefault();
    });
  },//adminOptionSave

  adminOptionFormSubmit: function(){
    "use strict";
    jQuery('form#mytheme_options_form').submit(function(e){
      if(jQuery('#mytheme-full-submit').val() === '1'){
        return true;
      }else{
        jQuery('#ajax-feedback').css({display:'block'});
        var formData = jQuery(this),
            optionSave = jQuery("<input>", { type: "text", name:"mytheme-option-save", val: true }),
            postData = formData.add(optionSave).serialize();
        mythemeAdmin.ajaxSubmit(postData);
      }
      e.preventDefault();
    });
  },//adminOptionFormSubmit

  ajaxSubmit: function(postData){
    "use strict";
    jQuery.ajax({
      type: 'POST',
      dataType: 'json',
      data: postData,
      beforeSend: function(x) {
        if(x && x.overrideMimeType) { x.overrideMimeType('application/json;charset=UTF-8'); }
      },
      success: function(data) {
        mythemeAdmin.processJSON(data);
      }
    });
  },//ajaxSubmit
  
  processJSON: function(data){
    "use strict";
    var bodyelem = "";
	
	if(jQuery.browser.safari){ bodyelem = jQuery('body'); } else if(jQuery.browser.chrome){ bodyelem = jQuery('body'); } else { bodyelem = jQuery('html'); }
    
    bodyelem.animate({scrollTop:0},'fast',function(){
      jQuery('#bpanel-message').empty().removeClass("warning").addClass("success");
      var el = jQuery('#bpanel-message').append(data.message),
          timer = 5000;
		  
		  jQuery('#ajax-feedback').fadeOut('fast');
		  el.fadeIn();
		  el.queue(function(){
			  setTimeout(function(){ el.dequeue(); }, timer );
		  });
		  el.fadeOut();
    }); // animation end
  }, //processJSON
  
  multiDropdown : function(){
    "use strict";
    var dropdown_container = jQuery('.multidropdown');
    
    dropdown_container.each(function(){
      
      var current_dropdown_wrapper = jQuery(this),
          combo = jQuery(this).find('.multidropdown');
      combo.each(function(){
        jQuery(this).unbind('change').bind('change',function(){
          
          if(jQuery(this).val()){
            if(!(jQuery(this).hasClass("donot_multiply"))){
              jQuery(this).parent().after(jQuery(this).parent().clone());
              jQuery(this).addClass('donot_multiply');
            }
          }else{
            jQuery(this).remove();
          }
           mythemeAdmin.multiDropdown();
        }); //change end
		
      }); //combo each
      
    });//dropdown_container
  },//multiDropdown
  
  colorPicker: function(){
    "use strict";
	if(parseFloat(mysiteWpVersion) >= parseFloat("3.5")){
		jQuery('.my-color-field').each(function(){
			jQuery(this).wpColorPicker();
		});
	}else{
		jQuery(".color_picker").each(function(){
			var $a = jQuery(this).prev('.color_picker_element');
			jQuery(this).farbtastic($a);
		});
    }
  }, //colorPicker
  
  resetConfirm : function (){
    "use strict";
    jQuery('.mytheme-reset-button').click(function(e){
      if(confirm(objectL10n.resetConfirm)){
        jQuery('#mytheme-full-submit').val(1);
        jQuery('form#mytheme_options_form').submit();
      }
      e.preventDefault();
    });
  }, //resetConfirm
 
  skinChooser: function(){
    "use strict";
    if(jQuery("ul#j-available-themes li").length > 0){
		
      var $current_theme_container = jQuery("#j-current-theme-container");
      jQuery('body').delegate("ul#j-available-themes li","click",function(){
        var $this_li = jQuery(this),
            attachment_theme = $this_li.attr('data-attachment-theme');
        //$current_theme_container.attr('dummy-content',attachment_theme+'-dummy'); //- used to select dummy content based on skin / theme
        jQuery("ul#j-available-themes li").removeClass('active');
        $this_li.addClass('active');
        var $clone_li = $this_li.clone().append('<input type="hidden" name="mytheme[appearance][skin]" value="' + attachment_theme + '" />');
        $current_theme_container.empty();
        $current_theme_container.append($clone_li);
      });
    }
  }, //skinChooser
  
  themeLayoutChooser:function(){
    "use strict";
    jQuery("li.themelayout").each(function(){
      jQuery(this).find("a").click(function(e){
        var $layout = jQuery(this).attr("rel");
        if($layout === "boxed"){
          jQuery("div#"+$layout).css({'display':'block'});
        }else{
          jQuery("div#boxed").css({'display':'none'});
        }
        e.preventDefault();
      });
    });
  },//themeLayoutChooser
  
  importData:function(){
    "use strict";
    jQuery("a.mytheme-import-button").bind('click',function(e){
     
      if(jQuery(this).hasClass('import-disabled')) {
        
        var bodyelem;
        if(jQuery.browser.safari){ bodyelem = jQuery('body'); } else if(jQuery.browser.chrome){ bodyelem = jQuery('body'); } else { bodyelem = jQuery('html'); }
        bodyelem.animate({scrollTop:0},'fast',function(){
          jQuery('#bpanel-message').empty().addClass("warning");
          var el = jQuery('#bpanel-message').append(objectL10n.disableImportMsg),
              timer = 5000;
          el.fadeIn();
          jQuery('#ajax-feedback').fadeOut('fast');
          el.queue(function(){setTimeout(function(){ el.dequeue(); }, timer ); });
          el.fadeOut();
        });
        
      } else {
        if(confirm(objectL10n.importConfirm)){
			
          var $dummy =  'core-default-dummy'; // replace this line with bellow line and enable the line no : 336
          //$dummy = jQuery("#j-current-theme-container").attr('dummy-content');
          
          jQuery.ajax({
            type:"POST",
            url:ajaxurl,
            data:{action:'my_ajax_import_data', 'dummy-data':$dummy},
            beforeSend: function(){ jQuery('#ajax-feedback').css({display:'block'}); },
            error: function() { },
            complete: function(response){
              var text = response.responseText;
              if(text.search('already exists') > -1) {
                jQuery('#bpanel-message').empty().removeAttr('class').addClass('warning');
                text = text.substring(text.lastIndexOf('already exists'),text.length-1);
                text = "All post "+text;
              }else if(text.search('XML') > -1){
                jQuery('#bpanel-message').empty().removeAttr('class').addClass('error-msg');
                text = text.substring(0,text.length-1);
              }else{
                jQuery('#bpanel-message').empty().removeAttr('class').addClass('success');
                text = text.substring(0,text.length-1);
              }
              
              var bodyelem;
              if(jQuery.browser.safari){ bodyelem = jQuery('body'); } else if(jQuery.browser.chrome){ bodyelem = jQuery('body'); } else { bodyelem = jQuery('html'); }
              bodyelem.animate({scrollTop:0},'fast',function(){
                var el = jQuery('#bpanel-message').append(text),
                    timer = 5000;
                el.fadeIn();
                jQuery('#ajax-feedback').fadeOut('fast');
                el.queue(function(){setTimeout(	function(){ el.dequeue(); }, timer );}); 
                el.fadeOut();
              });
            }
            
          });
        }
        
      }
      
      e.preventDefault();
    });
  }, //importData
  
  sliderSelection: function(){
    "use strict";
    var $no_sliders_container = jQuery('#j-no-images-container'),
        $pagination_link  = jQuery('div#j-slider-pagination a'),
        $used_sliders_container = jQuery('#j-used-sliders-containers'),
        $available_sliders_container = jQuery('#j-available-sliders');
    
    if(jQuery("ul#j-available-sliders li").length > 0){
      
      jQuery('body').delegate("ul#j-available-sliders li","click",function(){
        var $this_li = jQuery(this),
            attachment_id;
        if ( $this_li.hasClass('my_added') ) { return; }
        $this_li.addClass('my_added');
        attachment_id = $this_li.attr('data-attachment-id');
        var $clone_li = $this_li.clone().removeClass("my_added").append('<input type="hidden" name="sliders[]" value="' + attachment_id + '" />');
        $used_sliders_container.append($clone_li);
        if ( $no_sliders_container.is(':visible') ) { $no_sliders_container.hide(); }
        
      });
    }
    
    //Delete button click function
    jQuery('body').delegate('span.my_delete','click', function(){
      var $this = jQuery(this),
          attachment_id = $this.parent('li').attr('data-attachment-id');
      $available_sliders_container.find('li[data-attachment-id="'+attachment_id+'"]').removeClass('my_added');
      $this.parent('li').remove();
      if ( ! $used_sliders_container.find('li').length ) { $no_sliders_container.show(); }
    });
    
    //Sorting Sliders
    if($used_sliders_container.find('li').length){ $no_sliders_container.hide();}
    $used_sliders_container.sortable({placeholder: 'sortable-placeholder',forcePlaceholderSize: true,cancel: '.my_delete, input, textarea, label'});
    
    //Pagination
    if(jQuery('#j-slider-pagination').length > 0 ) {
      jQuery('#j-slider-pagination').each(function(){
        var container = jQuery(this),
            links = container.find("a"),
            $action  = container.hasClass('j-for-portfolio') ? 'show_media_images' : 'show_slider_page';
        
        links.bind('click',function(){
          var link = jQuery(this),
              link_value = link.text();
          if( link.hasClass("active_page")) { return false; }
          
          jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data:{action : $action,page: link_value},
            success: function(data){
              link.addClass('active_page').siblings().removeClass();
              $available_sliders_container.html(data);
              
              $available_sliders_container.find('li').each(function(){
                var $this = jQuery(this),
                    attachment_id = $this.attr('data-attachment-id');
                if ( $used_sliders_container.find('li[data-attachment-id="' + attachment_id + '"]').length ) { $this.addClass('my_added'); }
                
              });//Each End
            }
          }); //Ajax End
          
          return false;
          
        }); //links click end
       
      });//each end
      
    }//Pagination endid
    
  },//sliderSelection
  
  fontSelection : function(){
    "use strict";
    jQuery("select.mytheme-font-family-selector").change(function(){
      var $font = jQuery(this).val(),
          $sample_txt_container =  jQuery(this).parent().find("div.mytheme-font-preview");
      if($font !== ""){
        jQuery.post(ajaxurl,{action:'mytheme_font_url',font:$font},
        function(data){
          if(data){
            jQuery('head').append('<link rel="stylesheet" type="text/css" href="' + data.url + '" >');
            $sample_txt_container.css('font-family',$font);	
          }//endif
        },'json');
      }
    });// Change() End 
    jQuery("select.mytheme-font-family-selector").each(function(){  jQuery(this).triggerHandler("change"); });
  },//fontSelection

  customSwitch: function(){
    "use strict";
    jQuery("div.checkbox-switch").each(function(){
      jQuery(this).click(function(){
        var $ele = '#'+jQuery(this).attr("data-for");
        jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');
        if(jQuery(this).hasClass('checkbox-switch-on')){
          if(jQuery(this).attr("data-for") === "mytheme-global-import-disable") {  jQuery("a.mytheme-import-button").addClass("import-disabled"); }
          jQuery($ele).attr("checked","checked");
        }else{
          if(jQuery(this).attr("data-for") === "mytheme-global-import-disable") { jQuery("a.mytheme-import-button").removeClass("import-disabled"); }
          jQuery($ele).removeAttr("checked");
        }
      });//click end
    }); //switch end
  },//customSwitch

  customUISlider: function(){
    "use strict";
    jQuery("div.mytheme-slider").each(function(){
		
      var bar_id = jQuery(this).attr('id'),
          px = jQuery(this).attr('data-for'),
          min_val = 0,
          max_val = 1,
          val = 0.1;
      
      if(px === "px"){
        min_val = 0;
        max_val = 100;
        val = 1;
      }
      
      var init_val = jQuery(this).siblings('input[name="' + bar_id + '"]').attr('value');
      
      jQuery(this).slider({
        min:min_val,
        max:max_val,
        step:val,
        value: init_val,
        slide: function(event, ui){
          jQuery(this).siblings('input[name="' + bar_id + '"]').attr('value',ui.value);
          jQuery(this).siblings('.mytheme-slider-txt').html(ui.value +' '+px);
        }
      });//SLider End
      
    }); // mytheme-slider end
  }, //customUISlider
  
  backgroundPicker: function(){
    "use strict";
    jQuery("select.bg-type").change(function(){
      if(jQuery(this).val() === "bg-patterns"){
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-pattern").slideDown();
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-custom").slideUp();
      }else if(jQuery(this).val() === "bg-custom"){
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-pattern").slideUp();
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-custom").slideDown();
      }else{
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-custom").slideUp();
        jQuery(this).parents('div.bpanel-option-set').siblings(".bg-pattern").slideUp();
      }
    });//change End
  }, //backgroundPicker

  sliderTypePicker: function(){
    "use strict";
    jQuery("select.slider-type").change(function(){
      var $val  = jQuery(this).val(),
          $parent = jQuery(this).parents("div.inside").find("div#slider-conainer");
      
      switch ($val){
          case 'cycleslider':
          case 'nivoslider':
          case 'touchslider':
          jQuery($parent).find("> div:not(#"+$val+")").slideUp();
          $parent.find("#sliders").slideDown();
          $parent.find("#"+$val).slideDown();
          break;
          
          case 'layerslider':
          case 'revolutionslider':
          jQuery($parent).find("> div:not(#"+$val+")").slideUp();
          $parent.find("#"+$val).slideDown();
          break;
            
          default:
          jQuery($parent).find("> div").slideUp();
          break;
          
      }//End Switch
      
    });//Change End
  }, //sliderTypePicker

  pageTemplateChooser: function(){
    "use strict";
    var $ptemplate_select = jQuery('select#page_template'),
        $ptemplate_box = jQuery('#page-template-meta-container');
    if( $ptemplate_select.length ) {
		$ptemplate_select.live('change', function(){
			var $val = jQuery(this).val();
			$ptemplate_box.find('.j-pagetemplate-container > div').slideUp();
			
			switch($val){
				case 'tpl-blog.php':
				$ptemplate_box.find('span:first').text('Blog Options');
				$ptemplate_box.find('#tpl-blog').slideDown();
				jQuery("#page-template-slider-meta-container").slideUp();
				break;
				
				case 'tpl-portfolio.php':
				$ptemplate_box.find('span:first').text('Portfolio Options');
				$ptemplate_box.find('#tpl-portfolio').slideDown();
				jQuery("#page-template-slider-meta-container").slideUp();
				break;
				
				case 'tpl-sitemap.php':
				$ptemplate_box.find('span:first').text('Sitemap page Options');
				$ptemplate_box.find('#default-template').slideDown();
				jQuery("#page-template-slider-meta-container").slideDown();
				break;
				
				case 'tpl-feature.php':
				$ptemplate_box.find('span:first').text('Feature page Options');
				$ptemplate_box.find('#default-template').slideDown();
				jQuery("#page-template-slider-meta-container").slideDown();
				break;
				
				case 'tpl-home.php':
				$ptemplate_box.find('span:first').text('Extra Home page Options');
				$ptemplate_box.find('#default-template').slideDown();
				jQuery("#page-template-slider-meta-container").slideDown();
				break;
				
				default:
				$ptemplate_box.find('span:first').text('Default page Options');
				$ptemplate_box.find('#default-template').slideDown();
				jQuery("#page-template-slider-meta-container").slideDown();
				break;
			}//End Switch
		});//change end
		$ptemplate_select.trigger('change');
	} else {
		$ptemplate_box.find('.j-pagetemplate-container > div:not(:first)').slideUp();
	}
  } //pageTemplateChooser
}; // mythemeAdmin End

jQuery(document).ready(function($){
  "use strict";
  mythemeAdmin.init();
  
  jQuery("#add-video").click(function(){
    var url = prompt("Please enter video url","http://vimeo.com/18439821");
    if(url!== null){
      var $no_sliders_container = jQuery('#j-no-images-container'),
      $slider_container = jQuery("#j-used-sliders-containers");
      if ( $no_sliders_container.is(':visible') ) {
        $no_sliders_container.hide();
      }
      $slider_container.append($("span#clone_me").html()).append('<input type="hidden" name="sliders[]" value="' + url + '" />');
    }
  });
});