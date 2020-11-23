<?php

$title = get_option( "set_title" );
$icon = get_option( "choose_icon" );
$desc = get_option( "set_description" );

?>

<ul>
<li><?php echo $icon; ?></li>
</ul>

<div>
  <div>
    <span>
    <?php echo $icon; ?>
    </span>
    <span>
    <?php echo $title; ?>
    </span>
  </div>
  <div>
    <p>
    <?php echo $desc; ?>
    </p>
  </div>
</div>