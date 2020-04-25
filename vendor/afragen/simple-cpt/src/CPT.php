<?php
/**
 * Simple CPT
 *
 * @package Simple_CPT
 * @author Andy Fragen
 * @license MIT
 */

namespace Fragen\Simple_CPT;

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
	 * @return string $slug
	 */
	public function register_cpt( $single, $plural, $icon, $taxes = [] ) {
		$single_cpt = ucwords( $single );
		$plural_cpt = ucwords( $plural );
		$slug       = strtolower( str_replace( ' ', '-', $single ) );

		register_post_type(
			$slug,
			[
				'label'         => $plural_cpt,
				'labels'        => [
					'name'          => $plural_cpt,
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

				// phpcs:disable Squiz.PHP.CommentedOutCode.Found
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
				// phpcs:enable
				'taxonomies'    => $taxes,
			]
		);

		return $slug;
	}
}
