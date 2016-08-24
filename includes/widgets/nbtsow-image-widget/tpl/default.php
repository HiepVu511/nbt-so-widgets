<?php
$src = wp_get_attachment_image_src($image, $size);

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
	$attr['srcset'] = wp_get_attachment_image_srcset($image, $size);
}
if( !empty($alt) ) $attr['alt'] = $alt;
?>

<div class="nbtsow-image-widget <?php if($hover_effect) echo 'nbtsow-image-widget-hover'?>">
	<?php if(!empty($title)) {
		echo '<h3 class="widget-title">' . $title .  '</h3>';
	}?>
	<?php if(!empty($url)) : ?><a href="<?php echo esc_url($url) ?>" <?php if($new_window) echo 'target="_blank"' ?>><?php endif; ?>
		<img <?php foreach($attr as $n => $v) echo $n.'="' . esc_attr($v) . '" ' ?> <?php if($full_width) echo 'class="nbtsow-image-full"';?> />
	<?php if(!empty($url)) : ?></a><?php endif; ?>
	<?php if( ! empty($description)): ?>
		<p class="image-description"><?php echo $description; ?></p>
	<?php endif; ?>
</div>
