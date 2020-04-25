<?php
/**
 * Recipe Custom Post Type
 *
 * @package Recipe_CPT
 * @author Andy Fragen
 * @license MIT
 */

/**
 * Plugin Name:       Recipe CPT
 * Plugin URI:        https://github.com/afragen/recipe-cpt/
 * Description:       Add a recipe custom post type.
 * Author:            Andy Fragen
 * Version:           0.3.0
 * Network:           true
 * Author URI:        https://food.thefragens.com/
 * Text Domain:       recipe-cpt
 * Domain Path:       /languages
 * License:           MIT
 * GitHub Plugin URI: https://github.com/afragen/recipe-cpt
 * Requires at least: 4.8
 * Requires PHP:      7.0
 */

namespace Fragen\Recipe;

use Fragen\Simple_CPT\Bootstrap;

// Exit if called directly.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/vendor/autoload.php';
$cpt = [ 'KJ Recipe', 'KJ Recipes', 'dashicons-cart' ];
$tax = [ [ 'cuisine', 'cuisines' ], [ 'course', 'courses' ], [ 'ingredient', 'ingredients' ] ];

( new Bootstrap( $cpt, $tax ) )->load_hooks();
