<?php
/**
 * Recipe Custom Post Type
 *
 * @package Recipe_CPT
 * @author Andy Fragen
 * @license MIT
 */

namespace Fragen\Recipe;

trait CPT {
	/**
	 * Simple generic custom post type registration.
	 *
	 * @param string $single Single name of CPT.
	 * @param string $plural Plural name of CPT.
	 * @param string $icon   Menu icon for CPT.
	 * @param array  $taxes  Associated taxonomies for CPT.
	 *                       Default is empty array.
	 *
	 * @return void
	 */
	public function register_cpt( $single, $plural, $icon, $taxes = [] ) {
		$single_cpt = ucwords( $single );
		$plural_cpt = ucwords( $plural );

		register_post_type(
			strtolower( $single ),
			[
				'label'         => $plural_cpt,
				'labels'        => [
					'name'          => $plural_tax,
					'singular_name' => "$single_cpt",
					'all_items'     => "All $plural_cpt",
					'edit_item'     => "Edit $single_cpt",
					'view_item'     => "View $single_cpt",
					'update_item'   => "Update $single_cpt",
					'add_new_item'  => "Add New $single_cpt",
				],

				'menu_position' => 5,
				'menu_icon'     => $icon,

				'public'        => true,
				'hierarchical'  => true,

				'show_ui'       => true,
				'show_in_rest'  => true,

				'supports'      => [
					'title',
					'editor',
					// 'comments',
					'revisions',
					// 'trackbacks',
					'author',
					// 'excerpt',
					// 'page-attributes',
					'thumbnail',
					'custom-fields',
					'post-formats',
				],
				'taxonomies'    => $taxes,
			]
		);
	}
}
