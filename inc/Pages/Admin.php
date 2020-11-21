<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\Pages;

 class Admin {

  public function register() {
    add_action( "admin_menu", array( $this, "add_admin_pages" ) );
  }

  public function add_admin_pages() {
    add_menu_page( "Braweria Plugin", "Braweria", "manage_options", "braweria_plugin", array( $this, "admin_index"), "dashicons-buddicons-activity", 110 );
  }

  public function admin_index() {
    require_once PLUGIN_PATH . "admin/layout.php";
  }
 }