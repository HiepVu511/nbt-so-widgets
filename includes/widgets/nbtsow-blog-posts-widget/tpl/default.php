<?php
$blog_args = array(
	'post_type' => 'post',
	'posts_per_page' => $quantity,
	'no_found_rows' => true,
);

$blog_loop = new WP_Query($blog_args);
if ( $blog_loop->have_posts() ) {
	?>
	<?php if(!empty($title)) {
		echo '<h3 class="nbtsow-title">' . $title . '</h3>';
	}?>
	<ul class="nbtsow-blog-posts clear <?php if($style !== 'custom') { echo $style;} ?>">
	<?php
	while ($blog_loop->have_posts()): $blog_loop->the_post();
	?>
		<li class="nbtsow-blog-post">
			<div class="nbtsow-blog-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php if (has_post_thumbnail()) {
						the_post_thumbnail('nbtsow-blog-thumb');
					} ?>
				</a>
			</div>
			<?php if($layout == 'with_date'):?>
			<div class="nbtsow-blog-date">
				<span><?php the_time('d'); ?></span>
				<p><?php the_time('F'); ?></p>
			</div>
			<?php endif;?>
			<div class="nbtsow-blog-details">
				<h4 class="nbtsow-blog-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
				<?php if($layout == 'with_date'):?>
				<p class="nbtsow-blog-meta">
					<span class="nbtsow-blog-author">Post by <?php echo get_the_author(); ?></span>
					<span class="nbtsow-blog-comment"><?php comments_number(); ?> Comment(s)</span>
				</p>
				<?php endif;?>
				<p class="nbtsow-blog-excerpt">
					<?php if($excerpt_length !== 0) {
						echo esc_html(wp_trim_words( get_the_excerpt(), $excerpt_length, '...' ));
					} else {
						esc_html_e(get_the_excerpt());
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
}
