<div class="wrap">
  <h2>Mein Braweria Pugin</h2>
  <?php settings_errors(); ?>

  <form method="post" action="options.php">
    <?php
      settings_fields( "braweria_options_group" );
      do_settings_sections( "braweria_plugin" );
      submit_button( );
    ?>
  </form>




</div>