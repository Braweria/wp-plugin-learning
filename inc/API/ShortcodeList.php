<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\API;

 use Inc\Base\BaseController;

 class ShortcodeList extends BaseController {

  //  public function listLayout() {
  //   return require( $this->plugin_path . "/admin/itemList.php" );
  // }

  public function listLayout() {
    ob_start();
    require $this->plugin_path . "/admin/itemList.php";
    return ob_get_clean();
  }

  public function register() {
    add_shortcode( "ItemList", array( $this, "listLayout") );
  }
 }