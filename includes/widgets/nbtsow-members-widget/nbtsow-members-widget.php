<?php

/*
Widget Name: NetBaseTeam Members Widget
Description: Widget to beatifully display members with some introduction
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Members_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'nbtsow-members-widget',
			esc_html__('NetBaseTeam Members', 'nbtsow'),
			array(
				'description' => esc_html__('Widget to display team members', 'nbtsow'),
			),
			array(),
			array(
				'members' => array(
					'type' => 'repeater',
					'label' => esc_html__('Members', 'nbtsow'),
					'item_name' => esc_html__('Member', 'nbtsow'),
					'item_label' => array(
			            'selector'     => "[id*='name']",
			            'update_event' => 'change',
			            'value_method' => 'val',
			        ),
					'fields' => array(
						'name' => array(
							'type' => 'text',
							'label' => esc_html__('Name', 'nbtsow'),
							'description' => esc_html__('Member\'s name', 'nbtsow')
						),
						'image' => array(
                            'type' => 'media',
                            'label' => __('Team member image.', 'nbtsow')
                        ),
						'profile' => array(
							'type' => 'textarea',
							'label' => esc_html__('Introduction', 'nbtsow'),
							'description' => esc_html__('Short description of this member')
						),
						'social' => array(
							'type' => 'section',
                            'label' => esc_html__('Social profile', 'nbtsow'),
							'fields' => array(
								'facebook' => array(
									'type' => 'text',
									'label' => esc_html__('Facebook Page', 'nbtsow'),
									'description' => esc_html__('Link to the Facebook page of this members', 'nbtsow')
								),
								'twitter' => array(
									'type' => 'text',
									'label' => esc_html__('Twitter Page', 'nbtsow'),
									'description' => esc_html__('Link to the Twitter page of this members', 'nbtsow')
								),
								'gplus' => array(
									'type' => 'text',
									'label' => esc_html__('Google Plus Page', 'nbtsow'),
									'description' => esc_html__('Link to the Google Plus page of this members', 'nbtsow')
								)
							)
						)
					)
				)
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'members' => !empty($instance['members']) ? $instance['members'] : array(),
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}
}

siteorigin_widget_register('nbtsow-members-widget', __FILE__, 'NBTSOW_Members_Widget');
