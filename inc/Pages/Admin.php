<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\Pages;

 use \Inc\API\SettingsApi;
 use \Inc\Base\BaseController;
 use \Inc\API\Callbacks\AdminCallbacks;

 class Admin extends BaseController {

  public $pages = array();
  public $subpages = array();
  public $callbacks;
  public $settings;

  public function __construct() {
    
  }

  public function register() {
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();

    $this->setPages();
    $this->setSubPages();
    $this->settings->addPages( $this->pages )->withSubPage( "Dashboard" )->addSubPages( $this->subpages )->register();

  }

  public function setPages() {
    $this->pages = [
      [
        "page_title" => "Braweria Plugin",
        "menu_title" => "Braweria",
        "capability" => "manage_options",
        "slug" => "braweria_plugin",
        "callback" => array( $this->callbacks, "adminDashboard" ),
        "icon_url" => "dashicons-buddicons-activity",
        "position" => 110
      ]
    ];
  }

  public function setSubPages() {
    $this->subpages = [
      [
        "parent_slug" => "braweria_plugin",
        "page_title" => "Custom post Types",
        "menu_title" => "CPT",
        "capability" => "manage_options",
        "slug" => "braweria_cpt",
        "callback" => array( $this->callbacks, "adminCPT" )
      ],
      [
        "parent_slug" => "braweria_plugin",
        "page_title" => "Subpage",
        "menu_title" => "Sub",
        "capability" => "manage_options",
        "slug" => "braweria_sub",
        "callback" => array( $this->callbacks, "adminSub" )
      ]
    ];
  }

 }