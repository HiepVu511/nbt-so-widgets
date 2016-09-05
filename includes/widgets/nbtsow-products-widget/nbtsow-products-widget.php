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
				// 'layout' => array(
				// 	'type' => 'select',
				// 	'label' => esc_html__('Select a layout', 'nbtsow'),
				// 	'default' => 'layout_1',
				// 	'options' => array(
				// 		'layout_1' => esc_html__( 'Products with price', 'nbtsow' ),
				// 		'layout_2' => esc_html__( 'Products without price', 'nbtsow' ),
				// 		'layout_2' => esc_html__( 'Products without order button', 'nbtsow' ),
				// 	)
				// ),
				'layout' => array(
					'type' => 'section',
					'label' => esc_html__('Choose layout', 'nbtsow'),
					'fields' => array(
						'layout_button' => array(
							'type' => 'text',
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
			'layout' => $instance['layout'],
			'excerpt_length' => $instance['excerpt_length'],
			'get_products' => $instance['get_products'],
			'thumbnail_size' => $instance['thumbnail_size'],
			'product_price' => $instance['layout']['product_price'],
			'product_excerpt' => $instance['layout']['product_excerpt'],
			'product_button' => $instance['layout']['product_button']
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-products-widget', __FILE__, 'NBTSOW_Products_Widget');
