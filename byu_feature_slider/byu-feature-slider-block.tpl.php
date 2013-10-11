<?php
/**
 * @file
 * Template file for the theming of the slider. Since the slider uses it's own markup, we want to display it in the same form.
 *
 * Available custom variables:
 * - $nodes: An array of node objects
 * - $randomize: Boolean if randomized feature is turned on(TRUE) or off(False).
 *
 */


$html = 
	'<div id="feature">'.
		'<ul id="slider">';
		
		foreach ($nodes as $node){	
			//Pull the info out from the node object then set some variable names so it's easier to work with. 
			$title = ($node->{'title'});
			
			$body = field_get_items('node', $node, 'body'); 
			$body = field_view_value('node', $node, 'body', $body[0]); 
			
			$color = field_get_items('node', $node, 'byu_feature_slider_color');
			$color = field_view_value('node', $node, 'byu_feature_slider_color', $color[0]); 
			
			$border_color = field_get_items('node', $node, 'byu_feature_slider_border_color');
			$border_color = field_view_value('node', $node, 'byu_feature_slider_border_color', $border_color[0]); 
			
			$text_color = field_get_items('node', $node, 'byu_feature_slider_text_color'); 
			$text_color = field_view_value('node', $node, 'byu_feature_slider_text_color', $text_color[0]);
			$text_color = render($text_color);
			$text_color = ($text_color == 'Light') ? "lightText" : NULL;
			
			$image = field_get_items('node', $node, 'byu_feature_slider_image');
			$alt = $image[0]['alt']; 
			$image = file_create_url($image[0]['uri']);
			
			$link = field_get_items('node', $node, 'byu_feature_slider_link'); 
			$link = field_view_value('node', $node, 'byu_feature_slider_link', $link[0]);
			//End variable declatations
			
			$html .= '<li class="feature">'.
						'<div class="feature-image">
						<a href="'.render($link).'"><img src="'.$image.'" alt="'.$alt.'"></a></div>';
			$html .=	'<div ';
			
			if (render($color) != '') $html .= 'data-background="'.$color.'" ';
			if (render($border_color) != '') $html .= 'data-shadow="'.$border_color.'" ';
			$html .= 'class="feature-description '.$text_color.'">'.
					 '<h2><a href="'.render($link).'">'.$title.'</h2></a>'.
					 '<p>'.render($body).'</p>'.
				'</div>'.
			'</li>';
			
			//end if radomize
		} //end foreach

		$html .= '</ul>'.
			'</div>';

print $html;
?>
	