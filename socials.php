<?php defined('ABSPATH') or die('No script kiddies please!');
/**
Plugin Name: Social Sharing
Plugin URI: http://wordpress.org/plugins/socials/
Description: Share posts on your social media... It's easy!
Author: RapidDev | Polish technology company
Author URI: https://rapiddev.pl/
License: MIT
License URI: https://opensource.org/licenses/MIT
Version: 1.2.3
Text Domain: rd_socials
Domain Path: /languages
*/
/**
 * @package WordPress
 * @subpackage Social Sharing
 *
 * @author RapidDev | Polish technology company
 * @copyright Copyright (c) 2018, RapidDev
 * @link https://www.rapiddev.pl/en/socials
 * @license https://opensource.org/licenses/MIT
 */

/* ====================================================================
 * Constant
 * ==================================================================*/
	define('RAPIDDEV_SOCIALS_PATH', plugin_dir_path(__FILE__));
	define('RAPIDDEV_SOCIALS_URL', plugin_dir_url(__FILE__));
	define('RAPIDDEV_SOCIALS_BASENAME', plugin_basename(__FILE__));

/* ====================================================================
 * Plugin class
 * ==================================================================*/
	if (is_file(RAPIDDEV_SOCIALS_PATH.'assets/class.php')) {
		include(RAPIDDEV_SOCIALS_PATH.'assets/class.php');
		RAPIDDEV_SOCIALS::init();
	}
?>