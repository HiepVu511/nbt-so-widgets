<?php
/*
Widget Name: NetBaseTeam Collection Images Widget
Description: NetBaseTeam Images Gallery effect.
Author: NetBaseTeam
Author URI: https://netbaseteam.com
*/

class NBTSOW_Collection_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'nbtsow-collection-widget',
			esc_html__('NetBaseTeam Collection Image Widget', 'nbtsow'),
			array(
				'description' => esc_html__('Display Collection of image.', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Widget title', 'nbtsow'),
				),
				'collections_type' => array(
					'type' => 'radio',
					'label' => esc_html__('Collection Type', 'nbtsow'),
					'default' => 'gallery',
					'options' => array(
						'gallery' => esc_html__('Gallery Images', 'nbtsow'),
						'grayscale' => esc_html__('Grayscale Collection', 'nbtsow')
					)
				),
				'images' => array(
					'type' => 'repeater',
					'label' => esc_html__('Images Collection', 'nbtsow'),
					'item_name' => esc_html__('Images', 'nbtsow'),
					'item_label' => array(
						'selector' => "[id*='collection-id']",
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
						'full_width' => array(
							'type' => 'checkbox',
							'default' => true,
							'label' => esc_html__('Full width', 'nbtsow'),
							'description' => esc_html__('Make image fit its container', 'nbtsow'),
						),
					)
				)
			)
		);
	}//end construct

	function get_template_variables($instance, $args) {
		return array(
			'title' => $instance['title'],
			'collections_type' => $instance['collections_type'],
			'images' => !empty($instance['images']) ? $instance['images'] : array(),
		);
	}

	function get_template_name($instance) {
		$template = '';
		if( $instance['collections_type'] == 'gallery' ) {
			$template = 'gallery';
		} else {
			$template = 'grayscale';
		}
		return $template;
	}

	function get_style_name($instance) {
		return '';
	}
}

siteorigin_widget_register('nbtsow-collection-widget', __FILE__, 'NBTSOW_Collection_Widget');
