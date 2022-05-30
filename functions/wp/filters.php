<?php

//==============================================================================
// Adds custom classes to the array of body classes.
//==============================================================================

if (!function_exists('multiplica_body_classes')) :
	function multiplica_body_classes($classes)
	{
		// Adds a class of hfeed to non-singular pages.
		if (!is_singular()) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if (!is_active_sidebar('sidebar-1')) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
	add_filter('body_class', 'multiplica_body_classes');
endif;

//==============================================================================
// Excerpt Lenght
//==============================================================================

if (!function_exists('multiplica_excerpt_length')) :
	function multiplica_excerpt_length($length)
	{
		return 20;
	}
	add_filter('excerpt_length', 'multiplica_excerpt_length', 999);
endif;


//==============================================================================
// Archives Excerpt More
//==============================================================================

if (!function_exists('multiplica_excerpt_more')) :
	function multiplica_excerpt_more($more)
	{
		global $post;
		return '…';
	}
	add_filter('excerpt_more', 'multiplica_excerpt_more');
endif;


//==============================================================================
// Archives Count Filter
//==============================================================================

if (!function_exists('multiplica_archive_count_filter')) :
	function multiplica_archive_count_filter($links)
	{
		$links = str_replace('</a>&nbsp;(', '</a><span class="count">', $links);
		$links = str_replace(')', '</span>', $links);
		return $links;
	}
	add_filter('get_archives_link', 'multiplica_archive_count_filter');
endif;


//==============================================================================
// Categories Count Filter
//==============================================================================

if (!function_exists('multiplica_categories_postcount_filter')) :
	function multiplica_categories_postcount_filter($links)
	{
		$links = str_replace('</a> (', '</a> <span class="count">', $links);
		$links = str_replace(')', '</span>', $links);
		return $links;
	}
	add_filter('wp_list_categories', 'multiplica_categories_postcount_filter');
endif;