<div class="nbtsow-wc-categories-wrap">
    <?php if ($title): ?>
    <h3 class="nbtsow-title">
        <?php echo esc_html($title); ?>
    </h3>
    <?php endif;
    $args = array(
      'taxonomy'     => 'product_cat',
      'hierarchical' => true,
      'title_li'     => '',
      'hide_empty'   => false,
      'show_count'   => true,
      'walker'       => new Walker_Accordion_Woocommerce()
    );
    ?>

    <ul class="nbtsow-wc-categories">
    <?php wp_list_categories( $args ); ?>
    </ul>

</div>