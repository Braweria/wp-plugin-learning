<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\Base;

 class Enqueue {
  public function register() {
    add_action( "admin_enqueue_scripts", array( $this, "enqueue" ) );
  }

  function enqueue() {
    // enqueue all our scripts
    wp_enqueue_style( "mypluginsstyle", PLUGIN_URL . "assets/mystyle.css" );
    wp_enqueue_script( "mypluginsscript", PLUGIN_URL . "assets/my-script.js" );
  }
 }