<?php

// =============================================================================
// Enqueue Styles (Front-end)
// =============================================================================

if (!function_exists('multiplica_frontend_styles')) :

	function multiplica_frontend_styles()
	{
		// REMOVE COMMENT TO ACTIVE
		// if (MULTIPLICA_WOOCOMMERCE_IS_ACTIVE) {
		// 	wp_enqueue_style('select2');
		// }

		wp_enqueue_style('multiplica_frontend_styles', get_template_directory_uri() . '/dist/theme.css', NULL, multiplica_theme_version(), 'all');

		wp_enqueue_style('multiplica_frontend_style', get_stylesheet_uri(), array(), _MULTIPLICA_VERSION);

	}

	add_action('wp_enqueue_scripts', 'multiplica_frontend_styles');

endif;