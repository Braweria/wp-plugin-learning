<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\API\Callbacks;

use Inc\Base\BaseController;

 class AdminCallbacks extends BaseController {
  public function adminDashboard() {
    return require_once( $this->plugin_path . "/admin/layout.php" );
  }

  public function adminCPT() {
    return require_once( $this->plugin_path . "/admin/cpt.php" );
  }

  public function adminSub() {
    return require_once( $this->plugin_path . "/admin/sub.php" );
  }
 }