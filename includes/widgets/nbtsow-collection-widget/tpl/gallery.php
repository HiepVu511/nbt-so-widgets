<div class="nbtsow-gallery-collection">
    <?php if($title) {
    echo '<h3 class="nbtsow-title">' . $title . '</h3>';
    }?>
    <div class="nbtsow-gallery-image-wrap">
    <?php foreach($images as $image): 

        $image_src = wp_get_attachment_url( $image['upload_image'] );
        $class_array = array('nbtsow-gallery'); 
        if($image['full_width']) {
            array_push($class_array, 'nbtsow-image-full');
            $class = implode(" ", $class_array);
        } ?>
        <div class="nbtsow-gallery-image">
            <a href="<?php echo $image_src; ?>" class="nbtsow-mp">
                <?php echo wp_get_attachment_image($image['upload_image'], $image['size'], false, array('class' => $class, 'id' => $image['id'])); ?>
            </a>
        </div>
            
    <?php endforeach; ?>
    </div>
</div>