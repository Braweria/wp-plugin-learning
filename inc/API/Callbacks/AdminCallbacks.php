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

  public function editInfoWheel() {
    return require_once( $this->plugin_path . "/admin/infoWheel.php" );
  }

 

  public function createList( $input ) {
    return $input;
  }

  public function listSection( $amount ) {
    echo "Check out number: " . $amount;
  }

  public function chooseIcon( $amount ) {
    $value = esc_attr( get_option( "iw_icon_" . $amount ) );
    echo '<input type="text" class="regular-text" name="iw_icon_' . $amount . '" value="' . $value . '" placeholder="Icon Code einfügen" />';
  }

  public function addTitle( $amount ) {
    $value = esc_attr( get_option( "iw_title_" . $amount ) );
    echo '<input type="text" class="regular-text" name="iw_title_' . $amount . '" value="' . $value . '" placeholder="Titel" />' ;
  }

  public function addDescription( $amount ) {
    $value = esc_attr( get_option( "iw_description_" . $amount ) );
    echo '<textarea rows="6" type="text" class="regular-text" name="iw_description_' . $amount . '" placeholder="Kurze Beschreibung" >' . $value . '</textarea>' ;
  }
 }