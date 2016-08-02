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
				'quantity' => array(
					'type' => 'slider',
					'label' => esc_html__('Number of posts to display', 'nbtsow'),
					'default' => 2,
					'min' => 1,
					'max' => 6,
					'integer' => true
				),
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'quantity' => $instance['quantity'],
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
