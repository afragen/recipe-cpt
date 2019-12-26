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
	 * Load hooks that register CPTs and Taxonomies.
	 *
	 * @return void
	 */
	public function load_hooks() {
		add_action(
			'init',
			function() {
				$this->register_cpt( 'recipe', 'recipes', 'dashicons-cart', [] );
			}
		);
		add_action(
			'init',
			function() {
				$this->register_tax( 'cuisine', 'cuisines', 'recipe' );
				$this->register_tax( 'meal', 'meals', 'recipe' );
				$this->register_tax( 'ingredient', 'ingredients', 'recipe' );
				// $this->register_tax( 'sauce', 'sauces', 'recipe' );
			}
		);
	}
}
