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
	 * Load hook that registers CPTs and Taxonomies.
	 *
	 * @return void
	 */
	public function load_hooks() {
		add_action(
			'init',
			function () {
				$cpt_slug = $this->register_cpt( 'KJ recipe', 'KJ recipes', 'dashicons-cart' );

				$this->register_tax( 'cuisine', 'cuisines', $cpt_slug );
				$this->register_tax( 'course', 'courses', $cpt_slug );
				$this->register_tax( 'ingredient', 'ingredients', $cpt_slug );
				// $this->register_tax( 'sauce', 'sauces', $cpt_slug );
			}
		);
	}
}
