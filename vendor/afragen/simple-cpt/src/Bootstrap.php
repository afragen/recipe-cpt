<?php
/**
 * Simple CPT
 *
 * @package Simple_CPT
 * @author Andy Fragen
 * @license MIT
 */

namespace Fragen\Simple_CPT;

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
	private $cpt;

	/**
	 * Array of Taxonomies.
	 *
	 * @var array
	 */
	private $tax;

	/**
	 * Constructor.
	 *
	 * @param array $cpt Array of CPT elements.
	 * @param array $tax Array of taxonomies.
	 */
	public function __construct( $cpt, $tax ) {
		$this->cpt['single'] = $cpt[0];
		$this->cpt['plural'] = $cpt[1];
		$this->cpt['icon']   = $cpt[2];
		$this->tax           = $tax;
	}

	/**
	 * Load hook that registers CPTs and Taxonomies.
	 *
	 * @return void
	 */
	public function load_hooks() {
		add_action(
			'init',
			function () {
				$this->cpt['slug'] = $this->register_cpt( $this->cpt['single'], $this->cpt['plural'], $this->cpt['icon'] );

				foreach ( $this->tax as $tax ) {
					$this->register_tax( $tax[0], $tax[1], $this->cpt['slug'] );
				}
			}
		);

		// Add CPTs to main blog page.
		add_filter(
			'pre_get_posts',
			function ( $query ) {
				if ( isset( $query ) && is_home() && $query->is_main_query() ) {
					$query->set( 'post_type', [ 'post', $this->cpt['slug'] ] );
				}

				return $query;
			}
		);

		// Add CPTs to main RSS feed.
		add_filter(
			'request',
			function( $query ) {
				if ( isset( $query['feed'] ) ) {
					$query['post_type'] = get_post_types();
				}
				return $query;
			}
		);
	}
}
