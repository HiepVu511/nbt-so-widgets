<?php
/*
Widget Name: NetBaseTeam Image Widget
Description: NetBaseTeam simple image widget.
Author: NetBaseTeam
Author URI: https://netbaseteam.com
*/

class NBTSOW_Image_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'nbtsow-image-widget',
			esc_html__('NetBaseTeam Image Widget', 'nbtsow'),
			array(
				'description' => esc_html__('A very simple image widget.', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Widget title', 'nbtsow'),
				),
				'image' => array(
					'type' => 'media',
					'label' => esc_html__('Image file', 'nbtsow'),
					'library' => 'image',
					'fallback' => true,
				),
				'size' => array(
					'type' => 'image-size',
					'label' => esc_html__('Image size', 'nbtsow'),
				),
				'alt' => array(
					'type' => 'text',
					'label' => esc_html__('Alt text', 'nbtsow'),
				),
				'url' => array(
					'type' => 'link',
					'label' => esc_html__('Destination URL', 'nbtsow'),
				),
				'new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Open in new window', 'nbtsow'),
				),
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'title' => $instance['title'],
			'image' => $instance['image'],
			'size' => $instance['size'],
			'alt' => $instance['alt'],
			'url' => $instance['url'],
			'new_window' => $instance['new_window'],
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}
}

siteorigin_widget_register('nbtsow-image-widget', __FILE__, 'NBTSOW_Image_Widget');
