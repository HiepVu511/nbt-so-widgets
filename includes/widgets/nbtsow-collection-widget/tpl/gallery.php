<div class="nbtsow-gallery-collection">
<?php foreach($images as $image): 

    $image_src = wp_get_attachment_url( $image['upload_image'] ); ?>
    <div class="nbtsow-gallery-image">
        <a href="<?php echo $image_src; ?>" class="fancybox">
            <?php echo wp_get_attachment_image($image['upload_image'], $image['size'], false, array('class' => 'nbtsow-gallery', 'id' => $image['id'])); ?>
        </a>
    </div>
        
<?php endforeach; ?>
</div>