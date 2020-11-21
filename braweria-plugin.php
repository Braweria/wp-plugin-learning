<?php
/**
 * @package BraweriaPlugin
 */
/**
 * Plugin Name:       Braweria Plugin
 * Description:       Testing for Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Wiktoria Mielcarek
 * Author URI:        https://braweria.de/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       informational-wheel
 * Domain Path:       /languages
 **/

/*
Copyright (C) 2020 Wiktoria Mielcarek

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see https://www.gnu.org/licenses.
*/

/**
 * Abort if the file is called directly
 */
if (!defined("ABSPATH")) {
  die;
}
/**
 * Require once the Composer Autoload
 */
if ( file_exists( dirname( __FILE__ ) . "/vendor/autoload.php" ) ) {
  require_once dirname( __FILE__ ) . "/vendor/autoload.php";
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;
/**
 * The code that runs during plugin activation
 */
function activate_braweria_plugin() {
  Activate::activate();
}
/**
 * The code that runs during plugin deactivation
 */
function deactivate_braweria_plugin() {
  Deactivate::deactivate();
}
/**
 * Register Hooks for deactivation and activation
 */
register_activation_hook( __FILE__, "activate_braweria_plugin" );
register_deactivation_hook( __FILE__, "deactivate_braweria_plugin" );
/**
 * If class exists run it
 */
if ( class_exists( "Inc\\Init" ) ) {
  Inc\Init::register_services();
}