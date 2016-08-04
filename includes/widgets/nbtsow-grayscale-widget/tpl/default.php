<div class="nbtsow-collection">
	<?php foreach($images as $image):
		// $src = wp_get_attachment_image_src($image['upload_image'], $image['size']);
		//
		// $attr = array();
		// if( !empty($src) ) {
		// 	$attr = array(
		// 		'src' => $src[0],
		// 	);
		// 	if(!empty($src[1])) $attr['width'] = $src[1];
		// 	if(!empty($src[2])) $attr['height'] = $src[2];
		// }
		//
		// // Backward compability with WordPress before 4.4
		// if( function_exists('wp_get_attachment_image_srcset') ) {
		// 	$attr['srcset'] = wp_get_attachment_image_srcset($image['upload_image'], $image['size']);
		// }
		// if( !empty($alt) ) $attr['alt'] = $alt;
	?>
	<?php if(!empty($image['url'])) : ?><a href="<?php echo esc_url($url) ?>" <?php if($new_window) echo 'target="_blank"' ?>><?php endif; ?>
	<?php echo wp_get_attachment_image($image['upload_image'], $image['size']); ?>
	<?php if(!empty($image['url'])) : ?></a><?php endif; ?>
	<?php endforeach; ?>
</div>
