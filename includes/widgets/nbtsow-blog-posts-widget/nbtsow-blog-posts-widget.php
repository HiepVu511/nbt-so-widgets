<?php
/*
Widget Name: Netbaseteam Blog Posts Widget
Description: Display Elegan Blog Post(s)
Author: Netbaseteam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Blog_Posts_Widget extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'nbtsow-blog-posts-widget',
			esc_html__('NetBaseTeam Blog Posts', 'nbtsow'),
			array(
				'description' => esc_html__('Display Elegan Blog Post(s)', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Widget Title', 'nbtsow'),
				),
				'quantity' => array(
					'type' => 'slider',
					'label' => esc_html__('Number of posts to display', 'nbtsow'),
					'default' => 2,
					'min' => 1,
					'max' => 6,
					'integer' => true
				),
				'layout' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose a layout', 'nbtsow' ),
					'default' => 'with_date',
					'options' => array(
						'with_date' =>esc_html__( 'Blogs with date and author', 'nbtsow' ),
						'without_date' =>esc_html__( 'Blogs without date and author', 'nbtsow' ),
					),
				),
				'style' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose style for widget', 'nbtsow' ),
					'default' => 'custom',
					'options' => array(
						'custom'  => esc_html__( 'Custom style', 'nbtsow' ),
						'style_1' => esc_html__( 'Style 1', 'nbtsow' ),
					),
				),
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'title' => !empty($instance['title']) ? $instance['title'] : '',
			'quantity' => $instance['quantity'],
			'layout' => $instance['layout'],
			'style' => $instance['style'],
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-blog-posts-widget', __FILE__, 'NBTSOW_Blog_Posts_Widget');
