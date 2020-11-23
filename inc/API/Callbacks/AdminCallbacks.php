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
    if ( empty($input) ) {
      return;
    }
    return $input;
  }

  public function listSection01(  ) {
    echo "Check this out!";
  }

  public function chooseIcon(  ) {
    $value = esc_attr( get_option( "choose_icon" ) );
    echo '<input type="text" class="regular-text" name="choose_icon" value="' . $value . '" placeholder="Icon Code einfügen" />';
  }

  public function addTitle(  ) {
    $value = esc_attr( get_option( "set_title" ) );
    echo '<input type="text" class="regular-text" name="set_title" value="' . $value . '" placeholder="Titel" />' ;
  }

  public function addDescription(  ) {
    $value = esc_attr( get_option( "set_description" ) );
    echo '<textarea rows="6" type="text" class="regular-text" name="set_description" placeholder="Kurze Beschreibung" >' . $value . '</textarea>' ;
  }
 }