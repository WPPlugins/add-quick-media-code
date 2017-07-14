<?php
/*
Plugin Name: Add Quick Media Code
Plugin URI: https://wordpress.org/plugins/add-quick-media-code/
Version: 1.05
Description: This plugin makes it easy to add Media Code to the html-editor.
Author: Katsushi Kawamori
Author URI: http://riverforest-wp.info/
Text Domain: add-quick-media-code
Domain Path: /languages
*/

/*  Copyright (c) 2016- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 2 of the License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

	define("ADDQUICKMEDIACODE_PLUGIN_BASE_FILE", plugin_basename(__FILE__));
	define("ADDQUICKMEDIACODE_PLUGIN_BASE_DIR", dirname(__FILE__));
	define("ADDQUICKMEDIACODE_PLUGIN_URL", plugins_url($path='add-quick-media-code',$scheme=null));

	load_plugin_textdomain('add-quick-media-code');
//	load_plugin_textdomain('add-quick-media-code', false, basename( ADDQUICKMEDIACODE_PLUGIN_BASE_DIR ) . '/languages' );

	require_once( ADDQUICKMEDIACODE_PLUGIN_BASE_DIR.'/req/AddQuickMediaCodeRegist.php' );
	$addquickmediacoderegist = new AddQuickMediaCodeRegist();
	register_activation_hook( __FILE__, array($addquickmediacoderegist, 'log_settings') );
	add_action( 'plugins_loaded', array($addquickmediacoderegist, 'log_settings') );
	unset($addquickmediacoderegist);

	require_once( ADDQUICKMEDIACODE_PLUGIN_BASE_DIR.'/req/AddQuickMediaCodeAdmin.php' );
	$addquickmediacodeadmin = new AddQuickMediaCodeAdmin();
	add_filter( 'plugin_action_links', array($addquickmediacodeadmin, 'settings_link'), 10, 2 );
	add_action( 'admin_menu', array($addquickmediacodeadmin, 'plugin_menu') );
	add_action( 'admin_enqueue_scripts', array($addquickmediacodeadmin, 'load_custom_wp_admin_style') );
	unset($addquickmediacodeadmin);

	require_once( ADDQUICKMEDIACODE_PLUGIN_BASE_DIR . '/req/AddQuickMediaCode.php' );
	$addquickmediacode = new AddQuickMediaCode();
	add_action('media_buttons', array($addquickmediacode, 'add_quickcode_select'));
	add_action('admin_print_footer_scripts', array($addquickmediacode, 'add_quickcode_button_js'));
	unset($addquickmediacode);

?>