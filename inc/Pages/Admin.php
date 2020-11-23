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

    $this->loopSettings();

    // $this->setSettings();
    // $this->setSections();
    // $this->setFields();

    

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

  public function loopSettings( ) {
    for ($i = 1; $i <= 10; $i++) {
      $this->setSettings( $i );
      $this->setSections( $i );
      $this->setFields( $i );
    }
  }

  public function setSettings( $amount ) {
    $args = [
      [
        "option_group" => "iw_" . $amount,
        "option_name" => "iw_icon_" .  $amount,
        "callback" => array( $this->callbacks, "createList" )
      ],
      [
        "option_group" => "iw_" . $amount,
        "option_name" => "iw_title_" .  $amount,
        "callback" => array( $this->callbacks, "createList" )
      ],
      [
        "option_group" => "iw_" . $amount,
        "option_name" => "iw_description_" .  $amount,
        "callback" => array( $this->callbacks, "createList" )
      ]
    ];

      $this->settings->setSettings( $args );
  }


  public $number;
  public function setSections( $amount ) {
    $this->number = $amount;

    $args = [
      [
        "id" => "iw_item_" .  $number,
        "title" => "Item " .  $number,
        // "callback" => array( $this->callbacks, "listSection" ),
        "callback" => function() use($number) { return $this->callbacks->listSection( $this->number ); },
        "page" => "info_kreis_bearbeiten_" . $number
      ]
    ];

      $this->settings->setSections( $args );
  }

  public function setFields( $amount ) {
    $this->number = $amount;

    $args = [
      [
        "id" => "iw_icon_" .  $this->number,
        "title" => "Icon Auswahl",
        // "callback" => array( $this->callbacks, "chooseIcon" ),
        "callback" => function() use($number) { return $this->callbacks->chooseIcon( $this->number ); },

        "page" => "info_kreis_bearbeiten_" . $this->number,
        "section" => "item_" .  $this->number,
        "args" => [ [ 
          "default" => "",
          "label_for" => "iw_icon_" .  $this->number
        ] ]
      ],
      [
        "id" => "iw_title_" .  $this->number,
        "title" => "Titel",
        // "callback" => array( $this->callbacks, "addTitle" ),
        "callback" => function() use($number) { return $this->callbacks->addTitle( $this->number ); },
        "page" => "info_kreis_bearbeiten_" . $this->number,
        "section" => "item_" .  $this->number,
        "args" => [ [ 
          "default" => "",
          "label_for" => "iw_title_" .  $this->number
        ] ]
      ],
      [
        "id" => "iw_description_" .  $this->number,
        "title" => "Beschreibung",
        // "callback" => array( $this->callbacks, "addDescription" ),
        "callback" => function() use($number) { return $this->callbacks->addDescription( $this->number ); },
        "page" => "info_kreis_bearbeiten_" . $this->number,
        "section" => "item_" .  $this->number,
        "args" => [ [ 
          "default" => "",
          "label_for" => "iw_description_" .  $this->number
        ] ]
      ]
    ];

      $this->settings->setFields( $args );
  }

 }