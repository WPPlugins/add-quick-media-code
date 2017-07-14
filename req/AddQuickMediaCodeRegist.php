<?php
/**
 * Add Quick Media Code
 * 
 * @package    AddQuickMediaCode
 * @subpackage AddQuickMediaCodeRegist registered in the database
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

class AddQuickMediaCodeRegist {

	/* ==================================================
	 * Settings Log Settings
	 * @since	1.0
	 */
	function log_settings(){

	    $addquickmediacode_log_db_version = '1.01';
		$installed_ver = get_option( 'addquickmediacode_log_version' );

		if( $installed_ver != $addquickmediacode_log_db_version ) {
			global $wpdb;
			$log_name = $wpdb->prefix.'addquickmediacode_log';

			$sql = "CREATE TABLE " . $log_name . " (
			meta_id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			user text,
			code text,
			description text,
			UNIQUE KEY meta_id (meta_id)
			)
			CHARACTER SET 'utf8';";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
			update_option( 'addquickmediacode_log_version', $addquickmediacode_log_db_version );
		}

	}

}

?>