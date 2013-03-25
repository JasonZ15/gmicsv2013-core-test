<?php #COLUMNS SHORTCODE
add_shortcode('one-half',		'my_column_shortcode');
add_shortcode('one-third',		'my_column_shortcode');
add_shortcode('one-fourth',		'my_column_shortcode');
add_shortcode('one-fifth',		'my_column_shortcode');
add_shortcode('one-sixth',		'my_column_shortcode');
add_shortcode('two-sixth',		'my_column_shortcode');
add_shortcode('two-third',		'my_column_shortcode');
add_shortcode('three-fourth',	'my_column_shortcode');

add_shortcode('two-fifth', 		'my_column_shortcode');
add_shortcode('three-fifth', 	'my_column_shortcode');
add_shortcode('four-fifth', 	'my_column_shortcode');
add_shortcode('three-sixth', 	'my_column_shortcode');
add_shortcode('four-sixth', 	'my_column_shortcode');
add_shortcode('five-sixth', 	'my_column_shortcode');
/**
 * Columns
 **/
function my_column_shortcode($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array( 'id'=>'', 'class'=>''), $attrs));
	$class	= $class <> '' ? $class : '';
	$id  = $id <> '' ? " id = '{$id}'" : '';
	$last = (isset($attrs[0]) &&  trim( $attrs[0] == 'last')) ? 'last' : '';
	$content = my_shortcode_helper($content);
	$output = "<div {$id} class='column {$shortcodename} {$class} {$last}'>{$content}</div>";
return $output;	
}

/**
 * Horizontal Rule
 **/
add_shortcode('hr', 'my_hr_line');
add_shortcode('hr-invisible', 'my_hr_line');
add_shortcode('hr-invisible-small', 'my_hr_line');
add_shortcode('hr-border', 'my_hr_line');
add_shortcode('clear','my_hr_line');
function my_hr_line($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array( 'class'=>'','top'=>''), $attrs));
	if($shortcodename == 'hr' or $shortcodename == 'hr-border'){
		
		$output  = "<div class='{$shortcodename} {$class}'>";
		
		if($top=="yes"):
			$output  ="<div class='{$shortcodename} top {$class}'>";
			$output .="<a href='#top' class='scrollTop'>".__("top",IAMD_TEXT_DOMAIN)."</a>";
		endif;
			
		$output .= "</div>";	
	}else{
		$class = !empty($class) ? "-{$class}" : '';
		$output = "<div class='{$shortcodename}{$class}'></div>";
	}
return $output;
}

/**
 * Fancy Unordered List
 **/
add_shortcode('fancy-ul','my_fancy_ul');
function my_fancy_ul($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('style'=>'','variation'=>'', 'class'=>''), $attrs));
		$style = ( $style ) ? trim( $style ) : 'arrow-type1-list';
		$class = ( $class ) ? trim( $class ) : '';
		$variation = ( $variation ) ? ' ' . trim( $variation ): '';
		$content = my_shortcode_helper($content);
		$content = str_replace( '<ul>', "<ul class='fancy-list {$variation} {$class} {$style}'>", $content );
		#$content = str_replace( '<ul>', '<ul class="fancy-list {$class}">', $content );
		#$content = str_replace( '<li>', '<li class="' . $style . $variation . '">', $content );
return $content;
}

/**
 *	Fancy Ordered List
 **/
add_shortcode('fancy-ol','my_fancy_ol');
function my_fancy_ol($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('style'=>'','variation'=>'', 'class'=>''), $attrs));
		$style = ( $style ) ? trim( $style ) : 'decimal';
		$class = ( $class ) ? trim( $class ) : '';
		$variation = ( $variation ) ? ' ' . trim( $variation ): '';
		$content = my_shortcode_helper($content);
		$content = str_replace( '<ol>', "<ol class='fancy-list {$variation} {$style} {$class}'>", $content );
		$content = str_replace( '<li>', '<li><span>', $content );
		$content = str_replace( '</li>', '</span></li>', $content );
		#$content = str_replace( '<ol>', '<ul class="fancy-list {$class}">', $content );
		#$content = str_replace( '<li>', '<li class="' . $style . $variation . '">', $content );
return $content;
}

/**
 *	Button
 **/
add_shortcode('button','my_button');
function my_button($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('size'=>'','align'=>'','link'=>'#','target'=>'','variation'=>'','bgcolor'=>'','textcolor'=>''), $attrs));
		$link = esc_url($link);
		
		$size = ( $size == 'xlarge' ) ? ' xlarge' : $size;
		$size = ( $size == 'large' ) ? ' large' : $size;
		$size = ( $size == 'medium' ) ? ' medium' : $size;
		$size = ( $size == 'small' ) ? ' small' : $size;
		
		$align = ( $align ) ? ' align'.$align : '';

		$target = ( $target ) ? 'target="_blank"': '';
		
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		$content = my_shortcode_helper($content);
		
		$out = "<a href='{$link}' {$target} class='button {$size} {$align} {$variation}' {$style}>{$content}</a>";
return $out;
}

/**
 *	Highlight
 **/
add_shortcode('highlight','my_highlight');
function my_highlight($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('type'=>'','bgcolor'=>'','textcolor'=>'','variation'=>''), $attrs));
	
		$type = ($type) ? "highlight-{$type}" : "highlight";
	
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';

		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		$content = my_shortcode_helper($content);
		
		$out = "<span class='{$type} {$variation}' {$style}>{$content}</span>";
return $out;
}

/**
 *	Box
 **/
add_shortcode('box','my_box');
function my_box($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('type'=>'','title'=>'','variation'=>'','bgcolor'=>'','textcolor'=>''), $attrs));
	
		$type = (empty($type)) ? 'titled-box' :$type;

		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		
		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';';
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		
		$content = my_shortcode_helper($content);
		
		if($type == 'titled-box'):
			$title = "<h6 class='{$type}-title' {$style}>{$title}</h6>";
			
			$out   = "<div class='{$type} {$variation}'>";
			$out .= $title;
			$out .=	"<div class='{$type}-content'>{$content}</div>";
			$out .= "</div>"; 
		else:
			
			$out =	"<div class='{$type}'>{$content}</div>";
		endif;
	
	
return $out;	
}

/**
 *	Dropcap
 **/
add_shortcode('dropcap','my_dropcap');
function my_dropcap($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('type'=>'','variation'=>'','bgcolor'=>'','textcolor'=>''), $attrs));
	
		$type = (empty($type)) ? 'dropcap-default' :$type;
		$bgcolor = ( $type == 'dropcap-default') ? "" : $bgcolor;
		$variation = ( ( $variation ) && ( empty( $bgcolor ) ) ) ? ' ' . $variation : '';
		
		#$variation = ( $type == 'dropcap-default') ? "{$variation}-text" : $variation;

		$styles = array();
		if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';';
		if($textcolor) $styles[] = 'color:' . $textcolor . ';border-color:' . $textcolor . ';';;
		$style = join('', array_unique( $styles ) );
		$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
		$content = my_shortcode_helper($content);
		
		$out = "<span class='dropcap $type {$variation}' {$style}>{$content}</span>";	
return $out;		
}

/**
 *	Pullquote
 **/
add_shortcode('pullquote','my_pullquote');
function my_pullquote($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('type'=>'pullquote1','quote_icon'=>'','align'=> '','textcolor'=> '','cite'=> ''), $attrs));
	$class = array();
	if( isset($type) )												$class[] = " {$type}";
	if( trim( $quote_icon ) == 'yes' )									$class[] = ' quotes';
	if( preg_match( '/left|right|center/', trim( $align ) ) )		$class[] = ' align' . $align;
	$cite = ( $cite ) ? ' <cite>&ndash; ' . $cite .'</cite>' : '' ;
	$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
	$class = join( '', array_unique( $class ) );
	$content = my_shortcode_helper($content);
	$out = "<span class='{$class}' {$style}> {$content} {$cite}</span>";
return $out;	
}

/**
 *	Blockquote
 **/
add_shortcode('blockquote','my_blockquote');
function my_blockquote($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('align'=> '','variation'=> '','textcolor'=> '','cite'=> ''), $attrs));
	$class = array();
	if( preg_match( '/left|right|center/', trim( $align ) ) )		$class[] = ' align' . $align;
	if( $variation)					$class[] = ' ' . $variation;
	
	$cite = ( $cite ) ? ' <cite>&ndash; ' . $cite . '</cite>' : '' ;
	$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
	$class = join( '', array_unique( $class ) );
	$content = my_shortcode_helper($content);
	$out = "<blockquote class='{$class}' {$style}><span></span><p>{$content}</p> <p>{$cite}</p></blockquote>";
return $out;	
}

/**
 *	Pricing Table
 **/
/*add_shortcode('pricing-table','my_pricing_table');
function my_pricing_table($attrs, $content=null, $shortcodename =""){
	$content = my_shortcode_helper($content);
	return '<div class="pricing-table">'.$content.'</div>';
}*/

/**
 *	Address
 **/
add_shortcode('address','my_address');
function my_address($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('title'=>'','email'=>'','skype'=>'','fax'=>'','phone'=>'','web'=>''), $attrs));

	$lis = NULL;
	$content = my_shortcode_helper($content);
	$title = !empty($title) ? "<h4>{$title}</h4>":"";
	$lis .= !empty($content) ? "<li>{$content}</li>": NULL;
	$lis .= !empty($phone) ? "<li><strong>".__('Phone:',IAMD_TEXT_DOMAIN)."</strong> {$phone}</li>" : NULL;
	$lis .= !empty($fax) ? "<li><strong>".__('Fax:',IAMD_TEXT_DOMAIN)."</strong> {$fax}</li>" : NULL;
	$lis .= !empty($email) ? "<li><strong>".__('Email:',IAMD_TEXT_DOMAIN)."</strong> <a href='mailto:{$email}'>$email</a></li>" : NULL;
	$lis .= !empty($web) ? "<li><strong>".__('Web:',IAMD_TEXT_DOMAIN)."</strong> <a href='$web'>$web</a></li>" : NULL;
	
	$lis = !empty($lis) ? "<div class='contact-info'>$title<ul>{$lis}</ul></div>":"";

	return $lis;
}

/**
 *	Tooltip
 **/
add_shortcode('tooltip','my_tooltip');
function my_tooltip($attrs, $content=null, $shortcodename =""){
	extract(shortcode_atts(array('type'=>'default','tooltip'=>'Default Tooltip Content','position'=>'top','bgcolor'=>'','textcolor'=>'','link'=>"#"), $attrs));
	$class  = "class=' ";
	$class .=  ( $type == "boxed" ) ? "boxed-tooltip" : "";
	$class  .= " tooltip-$position'";
	$href = "href='{$link}'"; 
	$title = "title = '{$tooltip}'";

	$styles = array();
	if($bgcolor) $styles[] = 'background-color:' . $bgcolor . ';border-color:' . $bgcolor . ';';
	if($textcolor) $styles[] = 'color:' . $textcolor . ';';
	$style = join('', array_unique( $styles ) );
	$style = !empty( $style ) ? ' style="' . $style . '"': '' ;
	
	$style = ( $type == "boxed" ) ? $style : "";
	
	$content = my_shortcode_helper($content);
	$out = "<a {$href} {$title} {$class} {$style}>{$content}</a>";
return $out;
}?>