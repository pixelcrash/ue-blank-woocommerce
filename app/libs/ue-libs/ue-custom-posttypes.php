<?php 

function cptui_register_my_cpts_ue_module() {

	/**
	 * Post Type: UEX Blöcke.
	 */

	$labels = [
		"name" => __( "UEX Blöcke", "custom-post-type-ui" ),
		"singular_name" => __( "UEX Block", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "UEX Blöcke", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "ue_module", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "ue_module", $args );
}

add_action( 'init', 'cptui_register_my_cpts_ue_module' );
