<?php
/**
 * @package BraweriaPlugin
 */

 namespace Inc\Pages;

 use \Inc\API\SettingsApi;
 use \Inc\Base\BaseController;
 use \Inc\API\Callbacks\AdminCallbacks;

 class Admin extends BaseController {


  public function setSettings( $amount ) {
    $args = [
      [
        "option_group" => "iw_" . $amount,
        "option_name" => "iw_icon_" .  $amount,
        "callback" => array( $this->callbacks, "createList" )
      ],
      [
        "option_group" => "info_wheel_",
        "option_name" => "iw_title_" .  $amount,
        "callback" => array( $this->callbacks, "createList" )
      ],
      [
        "option_group" => "info_wheel_",
        "option_name" => "iw_description_" .  $amount,
        "callback" => array( $this->callbacks, "createList" )
      ]
    ];

      $this->settings->setSettings( $args );
  }

  public function setSections( $amount ) {
    $args = [
      [
        "id" => "iw_item_" .  $amount,
        "title" => "Item " .  $amount,
        "callback" => array( $this->callbacks, "listSection01" ),
        "page" => "info_kreis_bearbeiten"
      ]
    ];

      $this->settings->setSections( $args );
  }

  public function setFields( $amount ) {
    $args = [
      [
        "id" => "iw_icon_" .  $amount,
        "title" => "Icon Auswahl",
        "callback" => array( $this->callbacks, "chooseIcon" ),
        "page" => "info_kreis_bearbeiten",
        "section" => "item_" .  $amount,
        "args" => [ [ 
          "default" => "",
          "label_for" => "iw_icon_" .  $amount
        ] ]
      ],
      [
        "id" => "iw_title_" .  $amount,
        "title" => "Titel",
        "callback" => array( $this->callbacks, "addTitle" ),
        "page" => "info_kreis_bearbeiten",
        "section" => "item_" .  $amount,
        "args" => [ [ 
          "default" => "",
          "label_for" => "iw_title_" .  $amount
        ] ]
      ],
      [
        "id" => "iw_description_" .  $amount,
        "title" => "Beschreibung",
        "callback" => array( $this->callbacks, "addDescription" ),
        "page" => "info_kreis_bearbeiten",
        "section" => "item_" .  $amount,
        "args" => [ [ 
          "default" => "",
          "label_for" => "iw_description_" .  $amount
        ] ]
      ]
    ];

      $this->settings->setFields( $args );
  }
 }