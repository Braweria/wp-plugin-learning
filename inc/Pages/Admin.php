<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\Pages;

 use \Inc\Base\BaseController;
 use \Inc\API\SettingsApi;

 class Admin extends BaseController {

  public $pages = array();
  public $subpages = array();

  public $settings;

  public function __construct() {
    $this->settings = new SettingsApi();

    $this->pages = [
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

    $this->subpages = [
      [
        "parent_slug" => "braweria_plugin",
        "page_title" => "Custom post Types",
        "menu_title" => "CPT",
        "capability" => "manage_options",
        "slug" => "braweria_cpt",
        "callback" => function() { echo '<h1>Custom Post Type Manager</h1>'; }
      ],
      [
        "parent_slug" => "braweria_plugin",
        "page_title" => "Subpage",
        "menu_title" => "Sub",
        "capability" => "manage_options",
        "slug" => "braweria_sub",
        "callback" => function() { echo '<h1>Another Subpage</h1>'; }
      ]
    ];
  }

  public function register() {
    // add_action( "admin_menu", array( $this, "add_admin_pages" ) );
    $this->settings->addPages( $pages )->withSubPage( "Dashboard" )->addSubPages( $this->subpages )->register();
  }
 }