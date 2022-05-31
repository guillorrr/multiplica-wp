<?php
/**
 * Multiplica functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Multiplica
 */

if (!defined('_MULTIPLICA_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_MULTIPLICA_VERSION', '1.0.0');
}

// Vendors.
require_once get_template_directory() . '/functions/admin-setup.php';

// Helpers.
require_once get_template_directory() . '/functions/helpers.php';

// Menus.
require_once get_template_directory() . '/functions/menus.php';

// Theme Setup.
require_once get_template_directory() . '/functions/theme-setup.php';

// Registers.
require_once get_template_directory() . '/functions/register.php';

// Enqueue Styles & Scripts.
require_once get_template_directory() . '/functions/enqueue/frontend-styles.php';
require_once get_template_directory() . '/functions/enqueue/frontend-scripts.php';
require_once get_template_directory() . '/functions/enqueue/backend-styles.php';
require_once get_template_directory() . '/functions/enqueue/backend-scripts.php';

// WP.
require_once get_template_directory() . '/functions/wp/filters.php';
require_once get_template_directory() . '/functions/wp/archive-title.php';
require_once get_template_directory() . '/functions/wp/archive-meta.php';

// Customizer
require_once get_template_directory() . '/inc/customizer.php';

// Sidebar.
require_once get_template_directory() . '/inc/widgets/sidebar.php';

// Widgets.
require_once get_template_directory() . '/inc/widgets/widgets.php';

// WooCommerce
if (class_exists('WooCommerce')) {
	require_once get_template_directory() . '/inc/woocommerce.php';
}

// Advanced Custom Fields
// if (class_exists('ACF')) {
// 	require_once get_template_directory() . '/inc/acf.php';
// }

// Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
