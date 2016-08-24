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
				'layout' => array(
					'type' => 'select',
					'label' => esc_html__('Select a layout', 'nbtsow'),
					'default' => 'layout_1',
					'options' => array(
						'layout_1' => esc_html__( 'Products with price', 'nbtsow' ),
						'layout_2' => esc_html__( 'Products without price', 'nbtsow' ),
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
			'excerpt_length' => $instance['excerpt_length']
		);
	}

	function get_template_name($instance) {
		$template = '';
		if( $instance['layout'] == 'layout_1' ) {
			$template = 'layout-1';
		} else {
			$template = 'layout-2';
		}
		return $template;
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-products-widget', __FILE__, 'NBTSOW_Products_Widget');
