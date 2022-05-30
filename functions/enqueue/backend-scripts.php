<?php

if (is_admin()) :

	// =============================================================================
	// Enqueue Admin Scripts
	// =============================================================================

	function multiplica_backend_scripts()
	{
		wp_enqueue_script('multiplica_backend_scripts', get_template_directory_uri() . '/js/backend-scripts.js', array('jquery'), multiplica_theme_version(), true);
	}

	//add_action('admin_enqueue_scripts', 'multiplica_backend_scripts');

endif;