<?php
/*
Widget Name: NetBaseTeam Grayscale Images Widget
Description: NetBaseTeam Images with Grayscale effect.
Author: NetBaseTeam
Author URI: https://netbaseteam.com
*/

class NBTSOW_Grayscale_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'nbtsow-grayscale-widget',
			esc_html__('NetBaseTeam Grayscale Image Widget', 'nbtsow'),
			array(
				'description' => esc_html__('Display images with Grayscale effect.', 'nbtsow'),
			),
			array(),
			array(
				'images' => array(
					'type' => 'repeater',
					'label' => esc_html__('Images Collection', 'nbtsow'),
					'item_name' => esc_html__('Images', 'nbtsow'),
					'item_label' => array(
						'selector' => "[id*='id']",
						'update_event' => 'change',
			            'value_method' => 'val',
					),
					'fields' => array(
						'id' => array(
							'type' => 'text',
							'label' => esc_html__('Id', 'nbtsow'),
							'description' => esc_html__('ID of image', 'nbtsow')
						),
						'upload_image' => array(
                            'type' => 'media',
                            'label' => __('Upload image', 'nbtsow')
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
						)
					)
				)
			)
		);
	}//end construct

	function get_template_variables($instance, $args) {
		return array(
			'images' => !empty($instance['images']) ? $instance['images'] : array(),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}
}

siteorigin_widget_register('nbtsow-grayscale-widget', __FILE__, 'NBTSOW_Grayscale_Widget');
