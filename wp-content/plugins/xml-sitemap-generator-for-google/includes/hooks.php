<?php

// Callback for register_activation_hook()
function grim_sg_activation() {
	\GRIM_SG\Frontend::activate_plugin();
}

// Callback for register_deactivation_hook()
function grim_sg_deactivation() {
	\GRIM_SG\Frontend::deactivate_plugin();
}

function ssg_polylang_post_language( $language, $post_id ) {
	if ( function_exists('pll_get_post_language') ) {
		$language = pll_get_post_language( $post_id, 'slug' );
	}

	return $language;
}
add_filter( 'ssg_news_language', 'ssg_polylang_post_language', 10, 2 );

function ssg_wpml_post_language( $language, $post_id, $post_type = 'post' ) {
	global $sitepress;

	if ( $sitepress ) {
		$language = apply_filters( 'wpml_element_language_code', $language, array( 'element_id' => $post_id, 'element_type' => $post_type ) );
	}

	return $language;
}
add_filter( 'ssg_news_language', 'ssg_wpml_post_language', 10, 3 );
