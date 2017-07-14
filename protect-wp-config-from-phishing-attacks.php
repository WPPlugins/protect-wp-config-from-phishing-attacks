<?php
/*
Plugin Name: Protect wp-config.php from Phishing Attacks
Plugin URI: http://thisismyurl.com/plugins/protect-wp-config-from-phishing-attacks/
Description: Returns a blank white page if people try to load the wp-config file (or backups of it) in a web browser. 
Author: Christopher Ross
Author URI: http://thisismyurl.com/
Version: 1.1.0
*/


/**
 * Protect wp-config.php from Phishing Attacks core file
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/protect-wp-config-from-phishing-attacks/
 *
 * @package 		Protect wp-config.php from Phishing Attacks
 * @copyright		Copyright (c) 2008, Chrsitopher Ross
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Protect wp-config.php from Phishing Attacks 1.0
 */



/**
  * Checks to see if a user is trying to load a page with the word wp-config in the url, if so it dies
  */
function thisismyurl_die_on_wp_config_request() {
  
  $url = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];	
	
  if ( substr_count( $url , 'wp-config' ) > 0 && substr( $url, -1 ) != '/' && ! is_admin() )
    die();
	
}
add_action( 'init', 'thisismyurl_die_on_wp_config_request', 1 );
