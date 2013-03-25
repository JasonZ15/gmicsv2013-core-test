<?php 
add_shortcode('testimonial_item','my_testimonial_item');
function my_testimonial_item($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('name'=>'','image'=>''), $attrs));
	
	$out  = "<li>";
	$out .= '<div class="testimonial-wrapper">';
	
	$content = my_shortcode_helper($content);
	$name	 = !empty($name) ? "<span class='author-name'> - {$name}</span>" : "";
	$content = !empty($content) ? "{$content}":"";
	
	if(!empty($image)):
		$img = "<img src='{$image}' alt='Testimonial Image' />";
		$out .= "<div class='rounded-image border'><span>".$img.'</span></div>';
	endif;
	
	$out .= '<div class="testimonial-content-wrapper">';
	$out .= '	<div class="testimonial-content">';
	$out .= "	<p>$content</p>$name";
	$out .= '	</div>';
	$out .= '</div>';
	
	$out .= '</div>';
	$out .= "</li>";
	
return $out;
}

add_shortcode('testimonial','my_testimonial');
function my_testimonial($attrs, $content=null, $shortcodename =""){
	$content = my_shortcode_helper($content);
	$out  = ' <div class="testimonial-carousel-wrapper">';
	$out .= '<div class="testimonial-slider-arrows">';
	$out .= '	<a href="#" title="" class="prev"> <i class="icon-chevron-left"></i> </a>';
	$out .= '	<a href="#" title="" class="next"> <i class="icon-chevron-right"></i>  </a>';
	$out .= '</div>';
	
	$out .= '<ul class="testimonial-carousel">';
	$out .= $content;
	$out .= '</ul>';
	$out .= '</div>';
return $out;
}?>