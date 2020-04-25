<?php
/**
 * Simple CPT
 *
 * @package Simple_CPT
 * @author Andy Fragen
 * @license MIT
 */

namespace Fragen\Simple_CPT;

trait Taxonomy {
	/**
	 * Simple generic taxonomy registration.
	 *
	 * @param string $single Single name of taxonomy.
	 * @param string $plural Plural name of taxonomy.
	 * @param string $cpt    Custom post type slug.
	 *
	 * @return void
	 */
	public function register_tax( $single, $plural, $cpt ) {
		$single_tax = ucwords( $single );
		$plural_tax = ucwords( $plural );

		register_taxonomy(
			strtolower( $single ),
			strtolower( $cpt ),
			[
				'label'        => $plural_tax,
				'labels'       => [
					'name'          => $plural_tax,
					'singular_name' => "$single_tax",
					'all_items'     => "All $plural_tax",
					'edit_item'     => "Edit $single_tax",
					'view_item'     => "View $single_tax",
					'update_item'   => "Update $single_tax",
					'add_new_item'  => "Add New $single_tax",
				],

				'public'       => true,
				'hierarchical' => true,

				'show_ui'      => true,
				'show_in_rest' => true,
			]
		);
	}
}
