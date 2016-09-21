<?php
$class =  ($style == 'accordion') ? 'category-accordion' : 'category-normal';
?>
<div class="nbtsow-wc-categories-wrap <?php echo $class; ?>">
    <?php if ($title): ?>
    <h3 class="nbtsow-title">
        <?php echo esc_html($title); ?>
    </h3>
    <?php endif;
    $widget_arg = array(
      'taxonomy'     => 'product_cat',
      'hierarchical' => true,
      'title_li'     => '',
      'hide_empty'   => false,
      'show_count'   => true,
    );
    if($style == 'accordion') {
        $widget_arg['walker'] = new Walker_Accordion_Woocommerce();
    }
    ?>

    <ul class="nbtsow-wc-categories">
    <?php wp_list_categories( $widget_arg ); ?>
    </ul>

</div>