<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\Pages;

 use \Inc\Base\BaseController;
 use \Inc\API\SettingsApi;

 class Admin extends BaseController {

  public $settings;

  public function __construct() {
    $this->settings = new SettingsApi();
  }

  public function register() {
    // add_action( "admin_menu", array( $this, "add_admin_pages" ) );

    $pages = [
      [
        "page_title" => "Braweria Plugin",
        "menu_title" => "Braweria",
        "capability" => "manage_options",
        "slug" => "braweria_plugin",
        "callback" => function() { echo '<h1>Braweria Plugin!</h1>'; },
        "icon_url" => "dashicons-buddicons-activity",
        "position" => 110
      ]
    ];

    

    $this->settings->addPages( $pages )->register();
  }
 }