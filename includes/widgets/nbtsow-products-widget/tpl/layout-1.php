<?php
$products_args = array(
	'post_type' => 'product',
	'posts_per_page' => $quantity,
);

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
			$product = new WC_Product(get_the_ID());
			?>
			<div class="product-thumb">
				<?php if (has_post_thumbnail()){
					the_post_thumbnail('nbtsow-product-thumb-1');
				} ?>
				<p class="product-button">
					<a href="<?php the_permalink(); ?>">order now</a>
				</p>
			</div>
			<div class="product-details">
				<div class="product-meta">
					<h4 class="product-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<span class="product-price"><?php echo $product->get_price_html(); ?></span>
				</div>
				<p class="product-description">
				<?php if(!$excerpt_length) {
					the_excerpt();
				} else {
					echo wp_trim_words( get_the_excerpt(), $excerpt_length, '...' );
				}?>
				</p>
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
