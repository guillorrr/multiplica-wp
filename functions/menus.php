<?php

// =============================================================================
// Register Menus
// =============================================================================

if (!function_exists('multiplica_get_theme_menus')) :
	function multiplica_get_theme_menus()
	{
		$menus = array(
			'menu-main' => esc_html__('Primary', 'multiplica'),
		);
		return $menus;
	}
endif;

if (!function_exists('multiplica_theme_menus')) :
	function multiplica_theme_menus()
	{
		register_nav_menus(multiplica_get_theme_menus());
	}
	add_action('after_setup_theme', 'multiplica_theme_menus');
endif;
