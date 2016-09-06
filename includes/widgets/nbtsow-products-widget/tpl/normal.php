<?php
$products_args = array(
	'post_type' => 'product',
	'posts_per_page' => $quantity,
);

if($get_products == 'related') {
	$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
	$cat_id_args = array();

	foreach($product_cats as $product_cat) {
		array_push($cat_id_args, $product_cat->term_id);
	}

	$products_args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field' => 'id',
			'terms' => $cat_id_args,
			'operator' => 'IN'
		)
	);

	$products_args['post__not_in'] = array(get_the_ID());
}

$products_loop = new WP_Query($products_args);
if ( $products_loop->have_posts() ) {
	?>
	<?php if(!empty($title)) {
		echo '<h3 class="nbtsow-title">'. $title .'</h3>';
	}?>
	<ul class="nbtsow-wcproducts layout-1">
	<?php
	while ($products_loop->have_posts()): $products_loop->the_post();
	?>
		<li class="product">
			<?php
			$current_product = new WC_Product(get_the_ID());
			?>
			<a href="<?php the_permalink(); ?>">
				<div class="product-thumb">
					<?php if (has_post_thumbnail()){
						the_post_thumbnail($thumbnail_size);
					} ?>
					<?php if($layout_button):?>
						<p class="product-button">
							<a href="<?php the_permalink(); ?>">order now</a>
						</p>
					<?php endif;?>
				</div>
			</a>
			<div class="product-details">
				<div class="product-meta">
					<h4 class="product-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<?php if($layout_price): ?>
						<span class="product-price"><?php echo $current_product->get_price_html(); ?></span>
					<?php endif;?>
				</div>
				<?php if($layout_excerpt): ?>
					<p class="product-description">
					<?php if(!$excerpt_length) {
						the_excerpt();
					} else {
						echo wp_trim_words( get_the_excerpt(), $excerpt_length, '...' );
					}?>
					</p>
				<?php endif;?>
			</div>
		</li>
	<?php
	endwhile;
	?>
	</ul>
	<?php
	wp_reset_postdata();
} else {
	echo esc_html__('No products found');
}
