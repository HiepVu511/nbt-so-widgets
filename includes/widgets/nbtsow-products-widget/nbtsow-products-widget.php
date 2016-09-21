<?php
/*
Widget Name: NetBaseTeam Woocommerce Products
Description: Display Woocommerce Products
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Products_Widget extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'nbtsow-products-widget',
			esc_html__('Netbaseteam Woocommerce Products', 'nbtsow'),
			array(
				'description' => esc_html__('Simply display Woocommerce Products', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Title', 'nbtsow'),
				),
				'quantity' => array(
					'type' => 'slider',
					'label' => esc_html__('Number of products to display', 'nbtsow'),
					'default' => 8,
					'min' => 1,
					'max' => 8,
					'integer' => true
				),
				'thumbnail_size' => array(
					'type' => 'image-size',
					'label' => esc_html__('Image size', 'nbtsow'),
				),				
				'product_layout' => array(
					'type' => 'section',
					'label' => esc_html__('Choose layout', 'nbtsow'),
					'hide' => false,
					'fields' => array(
						'layout_template' => array(
							'type' => 'select',
							'label' => esc_html__('Products template', 'nbtsow'),
							'default' => 'normal',
							'options' => array(
								'normal' => esc_html__('Normal layout', 'nbtsow'),
								'carousel' => esc_html__('Carousel layout', 'nbtsow')
							),
							'state_emitter' => array(
								'callback' => 'select',
								'args' => array( 'layout_template' )
							),
						),
						'carousel_type' => array(
							'type' => 'select',
							'label' => esc_html__('Carousel type', 'nbtsow'),
							'options' => array(
								'next_one' => esc_html__( 'Next one by one product', 'nbtsow' ),
								'next_all' => esc_html__( 'Next all products', 'nbtsow' )
							),
							'state_handler' => array(
								'layout_template[carousel]' => array('show'),
								'layout_template[normal]' => array('hide'),
							)
						),
						'carousel_items' => array(
							'type' => 'slider',
							'default' => 4,
							'min' => 1,
							'max' => 6,
							'integer' => true,
							'state_handler' => array(
								'layout_template[carousel]' => array('show'),
								'layout_template[normal]' => array('hide'),
							)
						),
						'layout_button' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => esc_html__( 'Display Order button', 'nbtsow' )
						),
						'layout_price' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => esc_html__('Display price?', 'nbtsow')
						),
						'layout_excerpt' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => esc_html__('Display short description?', 'nbtsow')
						),
						'layout_readmore_link' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__('Display Read more link?', 'nbtsow')
						)
					),
				),
				'get_products' => array(
					'type' => 'select',
					'label' => esc_html__('Get products by', 'nbtsow'),					
					'default' => 'latest',
					'options' => array(
						'latest' => esc_html__( 'Latest Products', 'nbtsow' ),
						'related' => esc_html__( 'Related Products(only work on single product page)', 'nbtsow' ),
					)
				),
				'trim_excerpt' => array(
					'type' => 'radio',
					'default' => 'no',
					'options' => array(
						'yes' => 'Yes',
						'no' => 'No'
					),
					'label' => esc_html__('Trim excerpt', 'nbtsow'),
					'description' => esc_html__('Make product\'s excerpt shorter', 'nbtsow'),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'trim_excerpt' )
					),
				),
				'excerpt_length' => array(
					'type' => 'slider',
					'default' => 0,
					'min' => 1,
					'max' => 60,
					'integer' => true,
					'state_handler' => array(
						'trim_excerpt[no]' => array('hide'),
						'trim_excerpt[yes]' => array('show'),
					)
				)
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'title' => $instance['title'],
			'quantity' => $instance['quantity'],
			'excerpt_length' => $instance['excerpt_length'],
			'get_products' => $instance['get_products'],
			'thumbnail_size' => $instance['thumbnail_size'],
			'layout_button' => $instance['product_layout']['layout_button'],
			'layout_excerpt' => $instance['product_layout']['layout_excerpt'],
			'layout_price' => $instance['product_layout']['layout_price'],
			'layout_readmore_link' => $instance['product_layout']['layout_readmore_link'],
			'layout_template' => $instance['product_layout']['layout_template'],
			'carousel_type' => $instance['product_layout']['carousel_type'],
			'carousel_items' => $instance['product_layout']['carousel_items'],
		);
	}

	function get_template_name($instance) {
		$template = '';
		if( $instance['product_layout']['layout_template'] == 'carousel' && $instance['product_layout']['carousel_type'] == 'next_one' ) {
			$template = 'carousel-1';
		} elseif ( $instance['product_layout']['layout_template'] == 'carousel' && $instance['product_layout']['carousel_type'] == 'next_all' ) {
			$template = 'carousel-2';
		} else {
			$template = 'normal';
		}
		return $template;
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-products-widget', __FILE__, 'NBTSOW_Products_Widget');
