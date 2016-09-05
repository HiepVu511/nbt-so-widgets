<?php
/*
Widget Name: NetBaseTeam Social Share
Description: Simple Social Share Widget
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Social_Share extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'nbtsow-social-share-widget',
            esc_html__('NetBaseTeam social share widget', 'nbtsow'),
            array(
                'description' => esc_html__('Display simple social share buttons', 'nbtsow'),
            ),
            array(),
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Title', 'nbtsow')
                ),
                'facebook_button' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('Facebook button', 'nbtsow'),
                    'default' => true,
                    'description' => esc_html__('Display Facebook share button?', 'nbtsow')
                ),
                'gplus_button' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('Google Plus button', 'nbtsow'),
                    'default' => true,
                    'description' => esc_html__('Display Google plus share button?', 'nbtsow')
                ),
                'twitter_button' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('Twitter button', 'nbtsow'),
                    'default' => true,
                    'description' => esc_html__('Display Tweet button?', 'nbtsow')
                ),
                'pinterest_button' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('Pinterest button', 'nbtsow'),
                    'default' => true,
                    'description' => esc_html__('Display Pinterest share button?', 'nbtsow')
                ),
                'linkedin_button' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('LinkedIn button', 'nbtsow'),
                    'default' => true,
                    'description' => esc_html__('Display LinkedIn share button?', 'nbtsow')
                ),
            )
        );
    }

    function get_template_variables($instance, $args) {
		return array(
			'title' => $instance['title'],
			'facebook_button' => $instance['facebook_button'],
			'gplus_button' => $instance['gplus_button'],
            'twitter_button' => $instance['twitter_button'],
            'pinterest_button' => $instance['pinterest_button'],
            'linkedin_button' => $instance['linkedin_button'],
		);
	}

    function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-social-share-widget', __FILE__, 'NBTSOW_Social_Share');