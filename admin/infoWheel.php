<div class="wrap">
  <h1>Info Kreis bearbeiten</h1>

  <?php settings_errors(); ?>

<?php
for ($i = 1; $i <= 10; $i++ ) {
  
  ?>
  <form method="post" action="options.php" id="iw_form_<?php echo $i?>">
    <?php
      settings_fields( "iw_" . $i );
      do_settings_sections( "info_kreis_bearbeiten_" . $i );
      submit_button( );
    ?>
    
  </form>
<?php 
} ?>
</div>