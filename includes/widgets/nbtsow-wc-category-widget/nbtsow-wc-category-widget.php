<?php
/*
Widget Name: NetBaseTeam WC Category Widget
Description: List of terms with its sub.
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_WC_Category_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'nbtsow-wc-category-widget',
            esc_html__('NetBaseTeam WC Category Widget', 'nbtsow'),
            array(
                'description' => esc_html__('Display woocommerce categories', 'nbtsow')
            ),
            array(),
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Widget title', 'nbtsow'),
                ),
                'style' => array(
                    'type' => 'select',
                    'label' => esc_html__('Style type', 'nbtsow'),
                    'default' => 'accordion',
                    'options' => array(
                        'accordion' => esc_html__( 'Accordion style', 'nbtsow' ),
                        'normal' => esc_html__( 'Normal style', 'nbtsow' )
                    ),
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            'title' => $instance['title'],
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

siteorigin_widget_register('nbtsow-wc-category-widget', __FILE__, 'NBTSOW_WC_Category_Widget');