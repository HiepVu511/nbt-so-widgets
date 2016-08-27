<div class="nbtsow-wc-categories-wrap">
    <?php if ($title): ?>
    <h3 class="nbtsow-title">
        <?php echo esc_html($title); ?>
    </h3>
    <?php endif;
    $wc_categories = get_terms('product_cat', array(
        'hide_empty' => 0
    ));
    if ( !empty($wc_categories) ):
        echo '<ul class="nbtsow-wc-categories">';
        foreach( $wc_categories as $wc_category ) {
            echo 
        }
        echo '</ul>';
    endif; ?>

</div>