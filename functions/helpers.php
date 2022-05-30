<?php

// -----------------------------------------------------------------------------
// Define Constants
// -----------------------------------------------------------------------------
define('MULTIPLICA_WOOCOMMERCE_IS_ACTIVE', 	class_exists('WooCommerce'));

// -----------------------------------------------------------------------------
// String to Slug
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_string_to_slug')) :
	function multiplica_string_to_slug($str)
	{
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '_', $str);
		$str = preg_replace('/-+/', "_", $str);
		return $str;
	}
endif;


// -----------------------------------------------------------------------------
// Theme Name
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_theme_name')) :
	function multiplica_theme_name()
	{
		$multiplica_theme = wp_get_theme();
		return $multiplica_theme->get('Name');
	}
endif;

// -----------------------------------------------------------------------------
// Parent Theme Name
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_parent_theme_name')) :
	function multiplica_parent_theme_name()
	{
		$theme = wp_get_theme();
		if ($theme->parent()) :
			$theme_name = $theme->parent()->get('Name');
		else :
			$theme_name = $theme->get('Name');
		endif;

		return $theme_name;
	}
endif;


// -----------------------------------------------------------------------------
// Theme Slug
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_theme_slug')) :
	function multiplica_theme_slug()
	{
		$multiplica_theme = wp_get_theme();
		return multiplica_string_to_slug($multiplica_theme->get('Name'));
	}
endif;


// -----------------------------------------------------------------------------
// Theme Author
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_theme_author')) :
	function multiplica_theme_author()
	{
		$multiplica_theme = wp_get_theme();
		return $multiplica_theme->get('Author');
	}
endif;


// -----------------------------------------------------------------------------
// Theme Description
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_theme_description')) :
	function multiplica_theme_description()
	{
		$multiplica_theme = wp_get_theme();
		return $multiplica_theme->get('Description');
	}
endif;


// -----------------------------------------------------------------------------
// Theme Version
// -----------------------------------------------------------------------------

if (!function_exists('multiplica_theme_version')) :
	function multiplica_theme_version()
	{
		$multiplica_theme = wp_get_theme();
		return $multiplica_theme->get('Version');
	}
endif;


// -----------------------------------------------------------------------------
// Convert hex to rgb
// -----------------------------------------------------------------------------

function multiplica_hex2rgb($hex)
{
	$hex = str_replace("#", "", $hex);

	if (strlen($hex) == 3) {
		$r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
		$g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
		$b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
	} else {
		$r = hexdec(substr($hex, 0, 2));
		$g = hexdec(substr($hex, 2, 2));
		$b = hexdec(substr($hex, 4, 2));
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb); // returns the rgb values separated by commas
	//return $rgb; // returns an array with the rgb values
}


// -----------------------------------------------------------------------------
// Page ID
// -----------------------------------------------------------------------------

function multiplica_page_id()
{
	$page_id = "";
	if (is_single() || is_page()) {
		$page_id = get_the_ID();
	} else if (MULTIPLICA_WOOCOMMERCE_IS_ACTIVE && is_shop()) {
		$page_id = wc_get_page_id('shop');
	} else {
		$page_id = get_option('page_for_posts');
	}
	return $page_id;
}

/**
 * Compress custom styles
 */
function multiplica_compress_styles($minify)
{
	$minify = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $minify); // negative look ahead
	$minify = preg_replace('/\s{2,}/', ' ', $minify);
	$minify = preg_replace('/\s*([:;{}])\s*/', '$1', $minify);
	$minify = preg_replace('/;}/', '}', $minify);

	return $minify;
}

// -----------------------------------------------------------------------------
// Return array of values from custom post meta for custom post type
// -----------------------------------------------------------------------------
function multiplica_get_all_postmeta_for_post_type($key, $post_type, array $excludes = null ){

    $args = array(
        'post_type'         => $post_type,
        'post_status'       => 'publish',
        'posts_per_page'    => -1,
        'fields'            => 'ids'
    );

    if (!empty($excludes)){
        $args['meta_query'] =
            array(
                'relation' => 'AND'
            );
        foreach ($excludes as $exclude){
            $args['meta_query'][] = array(
                'key'     => $key,
                'value'   => $exclude,
                'compare' => '!='
            );
        }
    }

    $posts = get_posts($args);
    $values = [];
    foreach($posts as $post){
        $values[] = get_post_meta($post,$key,true);
    }

    return $values;
}
