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

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    $this->settings->addPages( $this->pages )->withSubPage( "Einleitung" )->addSubPages( $this->subpages )->register();

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
        "page_title" => "Info Kreis bearbeiten",
        "menu_title" => "Info Kreis bearbeiten",
        "capability" => "manage_options",
        "slug" => "info_kreis_bearbeiten",
        "callback" => array( $this->callbacks, "editInfoWheel" )
      ]
    ];
  }

  public function setSettings() {
    $args = [
      [
        "option_group" => "list_options",
        "option_name" => "choose_icon",
        "callback" => array( $this->callbacks, "createList" )
      ],
      [
        "option_group" => "list_options",
        "option_name" => "set_title"
      ],
      [
        "option_group" => "list_options",
        "option_name" => "set_description"
      ]
    ];

      $this->settings->setSettings( $args );
  }

  public function setSections() {
    $args = [
      [
        "id" => "item_01",
        "title" => "Item 1",
        "callback" => array( $this->callbacks, "listSection01" ),
        "page" => "info_kreis_bearbeiten"
      ]
    ];

      $this->settings->setSections( $args );
  }

  public function setFields() {
    $args = [
      [
        "id" => "choose_icon",
        "title" => "Icon Auswahl",
        "callback" => array( $this->callbacks, "chooseIcon" ),
        "page" => "info_kreis_bearbeiten",
        "section" => "item_01",
        "args" => [ [ ] ]
      ],
      [
        "id" => "set_title",
        "title" => "Titel",
        "callback" => array( $this->callbacks, "addTitle" ),
        "page" => "info_kreis_bearbeiten",
        "section" => "item_01",
        "args" => [ [ ] ]
      ],
      [
        "id" => "set_description",
        "title" => "Beschreibung",
        "callback" => array( $this->callbacks, "addDescription" ),
        "page" => "info_kreis_bearbeiten",
        "section" => "item_01",
        "args" => [ [ ] ]
      ]
    ];

      $this->settings->setFields( $args );
  }

 }