<?php
$src = wp_get_attachment_image_src($upload_image, $size);

$attr = array();
if( !empty($src) ) {
	$attr = array(
		'src' => $src[0],
	);
	if(!empty($src[1])) $attr['width'] = $src[1];
	if(!empty($src[2])) $attr['height'] = $src[2];
}

// Backward compability with WordPress before 4.4
if( function_exists('wp_get_attachment_image_srcset') ) {
	if($upload_img_srcset = wp_get_attachment_image_srcset($upload_image, $size)) {
		$attr['srcset'] = $upload_img_srcset;
		if($img_sizes = wp_get_attachment_image_sizes($upload_image, $size)) {
			$attr['sizes'] = $img_sizes;
		}
	}
}
if( !empty($alt) ) $attr['alt'] = $alt;
?>

<div class="nbtsow-cta-wrap">
	<?php
	foreach( $order as $item ) {
		switch( $item ) {
			case 'image':
				if( !empty($src) ): ?>
					<img <?php foreach($attr as $k => $v) echo $k .'="' . esc_attr($v) . '" '?> />
				<?php endif;
				break;
			case 'headlines':
				echo '<div class="nbt-cta-details">';
					echo '<div class="nbt-cta-headlines">';
					if( !empty($headline_text) ) {
						echo '<' . $headline_tag . ' class="nbt-cta-headline">' . wp_kses_post($headline_text) . '</' . $headline_tag . '>';
					}
					if( !empty($subhead_text) ) {
						echo '<' . $subhead_tag . ' class="nbt-cta-subhead">' . wp_kses_post($subhead_text) . '</' . $subhead_tag . '>';
					}
					if( !empty($button_text) ) {
						$button_html = '<p class="nbtsow-cta-button">';
						$button_html .= '<a href="' . $href . '">';
						$button_html .= $button_text;
						$button_html .= '</a>';
						$button_html .= '</p>';
						echo $button_html;
					}
					echo '</div>';
				echo '</div>';
				break;
		}
	}
	?>
</div>
