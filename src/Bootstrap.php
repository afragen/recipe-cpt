<?php
/**
 * Recipe Custom Post Type
 *
 * @package Recipe_CPT
 * @author Andy Fragen
 * @license MIT
 */

namespace Fragen\Recipe;

/**
 * Class Bootstrap
 */
class Bootstrap {
	use CPT;
	use Taxonomy;

	/**
	 * Array of Custom Post Types.
	 *
	 * @var array
	 */
	private $cpts = [];

	/**
	 * Load hook that registers CPTs and Taxonomies.
	 *
	 * @return void
	 */
	public function load_hooks() {
		add_action(
			'init',
			function () {
				$this->cpts[] = $cpt_slug = $this->register_cpt( 'KJ recipe', 'KJ recipes', 'dashicons-cart' );

				$this->register_tax( 'cuisine', 'cuisines', $cpt_slug );
				$this->register_tax( 'course', 'courses', $cpt_slug );
				$this->register_tax( 'ingredient', 'ingredients', $cpt_slug );
				// $this->register_tax( 'sauce', 'sauces', $cpt_slug );
			}
		);

		// Add CPTs to main blog page.
		add_filter(
			'pre_get_posts',
			function( $query ) {
				if ( is_home() && $query->is_main_query() ) {
					// $query->set( 'post_type', array_merge( [ 'post' ], $this->cpts ) );
				}

				return $query;
			}
		);
	}
}
