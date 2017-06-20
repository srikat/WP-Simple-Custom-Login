<?php
/**
 * Plugin Name: WP Simple Custom Login
 * Plugin URI: https://github.com/srikat/WP-Simple-Custom-Login
 * Description: A simple plugin to customize the WordPress login page.
 * Version: 1.0.0
 * Author: Sridhar Katakam
 * Author URI: https://sridharkatakam.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: srikat/WP-Simple-Custom-Login
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );
/**
 * Load style.css on the WordPress login page.
 */
function custom_login_stylesheet() {
	wp_enqueue_style( 'custom-login', plugin_dir_url( __FILE__ ) . '/assets/css/style.css' );
}

add_filter( 'login_headerurl', 'my_login_logo_url' );
/**
 * Change the URL of the logo in WordPress login page to home URL.
 *
 * @return URL of site's homepage.
 */
function my_login_logo_url() {
	return home_url();
}

add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/**
 * Filter the title attribute of the header logo above login form.
 *
 * @return string Site title - Site description(tagline).
 */
function my_login_logo_url_title() {
	return get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' );
}
