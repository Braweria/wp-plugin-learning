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

  public function braweriaOptionsGroup( $input ) {
    return $input;
  }

  public function braweriaSectionGroup(  ) {
    return "Check this out!";
  }

  public function braweriaFieldGroup(  ) {
    $value = esc_attr( get_option( "braweria_name" ) );
    echo '<input type="text" class="regular-text" name="braweria_name" value="' . $value . '" placeholder="Dein Braweria Name" />' ;
  }

  public function braweriaFirstName(  ) {
    $value = esc_attr( get_option( "first_name" ) );
    echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Dein Name" />' ;
  }

 }