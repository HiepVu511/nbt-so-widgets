<?php
/*
Widget Name: NetBaseTeam FAQ Widget
Description: A accordion FAQ widget
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/


class NBTSOW_FAQ_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'nbtsow-faq-widget',
			esc_html__('NetBaseTeam FAQ Widget', 'nbtsow'),
			array(
				'description' => esc_html__('FAQ Accordion style', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Widget title', 'nbtsow'),
				),
				'faqs' => array(
					'type' => 'repeater',
					'label' => esc_html__('Image', 'nbtsow'),
					'hide' => false,
					'fields' => array(
						'question' => array(
							'type' => 'text',
							'label' => esc_html__('Question', 'nbtsow'),
						),
						'answer' => array(
							'type' => 'textarea',
							'label' => esc_html__('Answer', 'nbtsow'),
						),
					),
				),				
			)
		);

	}

	function get_template_variables($instance, $args) {
		return array(
			'title' => !empty($instance['title']) ? $instance['title'] : '',
			'faqs' => !empty($instance['faqs']) ? $instance['faqs'] : array(),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-faq-widget', __FILE__, 'NBTSOW_FAQ_Widget');
