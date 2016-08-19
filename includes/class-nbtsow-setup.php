<?php

if (!defined('ABSPATH')) {
	exit;
}



if (!class_exists( 'NBTSOW_Setup' )) {
	class NBTSOW_Setup {
		public function __construct() {
			add_filter( 'siteorigin_widgets_widget_folders', array($this, 'add_widgets') );
			add_filter( 'siteorigin_panels_widget_dialog_tabs', array($this, 'add_widget_tabs'), 20 );
			add_filter( 'siteorigin_panels_widgets', array($this, 'add_bundle_groups'), 11 );
			add_filter( 'siteorigin_panels_row_style_fields', array($this, 'row_effect_option') );
			add_filter( 'siteorigin_panels_row_style_attributes', array($this, 'row_effect_attribute'), 10, 3 );
			add_filter( 'siteorigin_widgets_default_active', array($this, 'filter_default_widgets') );
			// add_filter( 'siteorigin_panels_row_style_fields', array($this, 'row_margin_option') );
			// add_filter( 'siteorigin_panels_row_style_attributes', array($this, 'row_margin_attributes'), 10, 4 );
			// add_filter('siteorigin_panels_css_object', array($this, 'add_attributes_to_css_object'), 10, 3);
			add_action( 'init', array($this, 'add_thumb_size') );
		}

		// Get all widget
		function add_widgets($folders) {
			$folders[] = NBTSOW_PLUGIN_DIR . 'includes/widgets/';
			return $folders;
		}

		//Create 'NetBaseTeam SiteOrigin Widget' tab
		function add_widget_tabs($tabs) {
			$tabs[] = array(
				'title' => esc_html__('NetBaseTeam SiteOrigin Widgets', 'nbtsow'),
				'filter' => array(
					'groups' => array('nbtsow-widgets')
				)
			);
			return $tabs;
		}

		// Get all NetBaseTeam Widget to put to tab
		function add_bundle_groups($widgets) {
			foreach ($widgets as $class => &$widget) {
				if (preg_match('/NBTSOW_(.*)_Widget/', $class, $matches)) {
					$widget['groups'] = array('nbtsow-widgets');
				}
			}
			return $widgets;
		}

		// Default active on all widget
		function filter_default_widgets($widgets) {
			$widgets = array(
				'nbtsow-headline-widget',
				'nbtsow-cta-widget',
				'nbtsow-products-widget',
				'nbtsow-blog-posts-widget',
				'nbtsow-image-widget',
				'nbtsow-members-widget',
				'nbtsow-collection-widget',
				'nbtsow-icon-widget',
			);

			return $widgets;
		}

		// Add parallax option to row
		function row_effect_option($fields) {

			$fields['img-hover'] = array(
				'name' => esc_html__('Image Hover Effect', 'nbtsow'),
				'type' => 'checkbox',
				'group' => 'design',
				'description' => esc_html__('Hover effect for images in this row', 'nbtsow'),
				'priority' => 8,
			);

			$fields['parallax'] = array(
				'name' => esc_html__('Parallax Effect', 'nbtsow'),
				'type' => 'checkbox',
				'group' => 'design',
				'description' => esc_html__('Parallax effect for background image', 'nbtsow'),
				'priority' => 9,
			);

			return $fields;

		}		

		// Parallax attribute
		function row_effect_attribute($attributes, $args) {

			if( !empty($args['img-hover']) ) {
				array_push($attributes['class'], 'nbtsow-img-hover');
			}

			if( !empty($args['parallax']) ) {
				array_push($attributes['class'], 'nbtsow-parallax');
			}
			
			return $attributes;

		}

		// Add Margin bottom in different screen size
		// function row_margin_option($fields) {
		// 	$fields['mobile_margin'] = array(
		// 		'name' => esc_html__('Mobile Margin', 'nbtsow'),
        //         'type' => 'measurement',
        //         'group' => 'layout',
        //         'description' => esc_html__('Mobile bottom margin for the row below 768px.', 'nbtsow'),
        //         'priority' => 2,
        //         'multiple' => true
		// 	);
		//
		// 	$fields['tablet_margin'] = array(
		// 		'name' => esc_html__('Tablet margin', 'nbtsow'),
        //         'type' => 'measurement',
        //         'group' => 'layout',
        //         'description' => esc_html__('Tablet bottom margin for the rowon screen 768px to 991px.', 'nbtsow'),
        //         'priority' => 3,
        //         'multiple' => true
		// 	);
		//
		// 	$fields['laptop_margin'] = array(
		// 		'name' => esc_html__('Laptop margin', 'nbtsow'),
        //         'type' => 'measurement',
        //         'group' => 'layout',
        //         'description' => esc_html__('Bottom margin for the row on screen 992px to 1024px.', 'nbtsow'),
        //         'priority' => 4,
        //         'multiple' => true
		// 	);
		//
		// 	return $fields;
		// }
		//
		// // Margin bottom attributes
		// function row_margin_attributes($attributes, $args) {
		// 	if( !empty($args['mobile_margin']) || !empty($args['tablet_margin']) || !empty($args['laptop_margin']) ) {
		// 		array_push($attributes['class'], 'nbtsow-row');
		// 	}
		//
		// 	return $attributes;
		// }

		// Add custom attributes to css object
		// function add_attributes_to_css_object($css, $panels_data, $post_id) {
		// 	foreach( $panels_data['grids'] as $gi => $grid ) {
		// 		$grid_id = !empty($grid['style']['id']) ? (string)sanitize_html_class($grid['style']['id']) : intval($gi);
		//
		// 		$margin = (isset($grid['style']['laptop_margin']) ? $grid['style']['laptop_margin'] : null);
		// 		if($margin) {
		// 			$css->add_row_css($post_id, $grid_id, '.nbtsow-row', array('margin-bottom' => $margin), 1024);
		// 		}
		//
		// 		$margin = (isset($grid['style']['tablet_margin']) ? $grid['style']['tablet_margin'] : null);
		// 		if($margin) {
		// 			$css->add_row_css($post_id, $grid_id, '.nbtsow-row', array('margin-bottom' => $margin), 992);
		// 		}
		//
		// 		$margin = (isset($grid['style']['mobile_margin']) ? $grid['style']['mobile_margin'] : null);
		// 		if($margin) {
		// 			$css->add_row_css($post_id, $grid_id, '.nbtsow-row', array('margin-bottom' => $margin), 768);
		// 		}
		// 	}
		//
		// 	return $css;
		// }

		// Add image size for widgets
		function add_thumb_size() {
			add_image_size( 'nbtsow-blog-thumb', 737, 400, array('center', 'center') );
			add_image_size( 'nbtsow-product-thumb-1', 340, 340, array('center', 'center') );
			add_image_size( 'nbtsow-product-thumb-2', 60, 60, array('center', 'center') );
		}
	}
}

new NBTSOW_Setup();
