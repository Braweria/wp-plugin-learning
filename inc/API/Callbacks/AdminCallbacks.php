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

  public function listSection01(  ) {
    return "Check this out!";
  }

  public function chooseIcon(  ) {
    $value = esc_attr( get_option( "chosen_icon" ) );
    echo '<input type="text" class="regular-text" name="chosen_icon" value="' . $value . '" placeholder="Icon Auswahl" />' ;
  }

  public function addTitle(  ) {
    $value = esc_attr( get_option( "chosen_title" ) );
    echo '<input type="text" class="regular-text" name="chosen_title" value="' . $value . '" placeholder="Titel" />' ;
  }

  public function addDescription(  ) {
    $value = esc_attr( get_option( "chosen_description" ) );
    echo '<textarea type="text" class="regular-text" name="chosen_description" value="' . $value . '" placeholder="Beschreibung" ></textarea><p>Your Value: ' . $value . '</p>' ;
  }
 }