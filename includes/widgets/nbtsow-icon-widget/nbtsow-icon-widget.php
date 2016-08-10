<?php

/*
Widget Name: NetBaseTeam Icon Widget
Description: Widget to choose icon
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Icon_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'nbtsow-icon-widget',
			esc_html__('NetBaseTeam Icon Widget', 'nbtsow'),
			array(
				'description' => esc_html__(' Widget to choose icon', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'nbtsow'),
                ),
				'icon_list' => array(
                    'type' => 'repeater',
                    'label' => __('Icon List', 'nbtsow'),
                    'item_name' => __('Icon', 'nbtsow'),
                    'item_label' => array(
                        'selector' => "[id*='icon_list-title']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'icon' => array(
                            'type' => 'icon',
                            'label' => __('Icon.', 'nbtsow'),
                        ),
						'icon_text' => array(
							'type' => 'text',
							'label' => esc_html__('Text for icon section', 'nbtsow'),
						),
                    )
                ),
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'title' => !empty($instance['title']) ? $instance['title'] : array(),
			'icon_list' => !empty($instance['icon_list']) ? $instance['icon_list'] : array(),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}
}

siteorigin_widget_register('nbtsow-icon-widget', __FILE__, 'NBTSOW_Icon_Widget');
