<div class="wrap">
  <h1>Info Kreis bearbeiten</h1>

  <?php settings_errors(); ?>

  <form method="post" action="options.php">
    <?php
      settings_fields( "iw_10" );
      do_settings_sections( "info_kreis_bearbeiten" );
      submit_button( );
    ?>
  </form>


</div>