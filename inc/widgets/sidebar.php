<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function multiplica_custom_sidebars()
{

	$args = array(
		'name'          => __('Sidebar Name', 'text-domain'),
		'description'   => __('Description', 'text-domain'),
		'id'            => 'sidebar-id',
		'class'         => 'class',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	);
	register_sidebar($args);
}
add_action('widgets_init', 'multiplica_custom_sidebars');