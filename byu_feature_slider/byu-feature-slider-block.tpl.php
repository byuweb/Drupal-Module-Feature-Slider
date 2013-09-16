<?php
/**
 * @file
 * Template file for the theming of the slider. Since the slider uses it's own markup, we want to display it in the same form.
 *
 * Available custom variables:
 * - $data: Just a test variable I'm using;
 * - $nodes: An array of node objects
 *
 *
 */

$html = 
	'<div id="feature">'.
		'<ul id="slider">';
	
		foreach ($nodes as $node){
		
			//Pull the info out from the node object then set some variable names so it's easier to work with. 
			$title = ($node->{'title'});
			
			$body = field_get_items('node', $node, 'body'); 
			$body =  render(field_view_value('node', $node, 'body', $body[0])); 
			
			$color =  field_get_items('node', $node, 'byu_feature_slider_color');
			$color =  render(field_view_value('node', $node, 'byu_feature_slider_color', $color[0])); 
			
			$border_color =  field_get_items('node', $node, 'byu_feature_slider_borer_color');
			$border_color =  render(field_view_value('node', $node, 'byu_feature_slider_border_color', $border_color[0])); 
			
			$text_color = field_get_items('node', $node, 'byu_feature_slider_text_color'); 
			$text_color =  render(field_view_value('node', $node, 'byu_feature_slider_text_color', $text_color[0])); 
			
			$image = field_get_items('node', $node, 'byu_feature_slider_image');
			$alt = $image[0]['alt']; 
			$image = file_create_url($image[0]['uri']);
			
			$link = field_get_items('node', $node, 'byu_feature_slider_link'); 
			$link = render(field_view_value('node', $node, 'byu_feature_slider_link', $link[0])); 
			
			$sort_order =  render(field_view_field('node', $node, 'byu_feature_slider_sort_order', array('label'=>'hidden'))); 
				
			$html .= '<li class="feature">'.
						'<div class="feature-image"><a href="'.$link.'"><img src="'.$image.'" alt="'.$title.'"></a></div>';
			$html .=		'<div ';
			
			if ($color != '') $html .= 'data-background="'.$color.'"';
			if ($border_color != '') $html .= 'data-shadow="'.$border_color.'"';
			
			$html .= 'class="feature-description '.$text_color.'">'.
					 '<h2><a href="'.$link.'">'.$title.'</h2></a>'.
					 '<p>'.$body.'</p>'.
				'</div>'.
			'</li>';
		} //end foreach

		$html .= '</ul>'.
			'</div>';

print $html;
?>
	