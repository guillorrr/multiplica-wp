<?php

// =============================================================================
// Enqueue Admin Styles
// =============================================================================

if (is_admin()) :

	function multiplica_backend_styles()
	{
		wp_enqueue_style('multiplica_backend_styles', get_template_directory_uri() . '/assets/css/backend-styles.css', false, multiplica_theme_version(), 'all');
	}

	// Gutenberg support.
	function my_theme_add_editor_styles() {
		add_theme_support( 'editor-styles' );
		add_editor_style( get_template_directory_uri() . '/css/backend-editor-styles.css' );
	}
	// REMOVE COMMENT TO ACTIVE
	// add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

	// REMOVE COMMENT TO ACTIVE
	// add_action('admin_enqueue_scripts', 'multiplica_backend_styles');

endif;