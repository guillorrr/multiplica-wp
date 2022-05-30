<?php

// =============================================================================
// Enqueue Scripts
// =============================================================================

if (!function_exists('multiplica_frontend_scripts')) :

	function multiplica_frontend_scripts()
	{

		// REMOVE COMMENT TO ACTIVE
		// if (MULTIPLICA_WOOCOMMERCE_IS_ACTIVE) {
		// 	wp_enqueue_script('select2');
		// }

		wp_enqueue_script('multiplica_navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

		// REMOVE COMMENT TO ACTIVE
        // if (is_page('example-slug')){
        //     wp_enqueue_script('multiplica_example', get_template_directory_uri() . '/js/example.js', array(), _S_VERSION, true);
        //     $wp_js_vars = array(
        //         'ajax_url' => admin_url('admin-ajax.php'),
        //     );
        //     wp_localize_script('multiplica_example', 'wp_js_var', $wp_js_vars);
        // }

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
	add_action('wp_enqueue_scripts', 'multiplica_frontend_scripts');
endif;
