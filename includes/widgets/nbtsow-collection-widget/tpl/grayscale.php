<div class="nbtsow-grayscale-collection">
	<?php if($title) {
		echo '<h3 class="nbtsow-title">' . $title . '</h3>';
	}?>
	<?php foreach($images as $image): ?>

		<?php
		echo wp_get_attachment_image($image['upload_image'],
			$image['size'],
			false,
			array(
				'class' => 'nbtsow-grayscale',
				'id'    => $image['id'],
				'alt'   => $image['alt'],
			));
		?>
		
	<?php endforeach; ?>
</div>
