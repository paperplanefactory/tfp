<?php
$start_date_extract = $value['show_date'];
$start_date = strtotime(str_replace("/", "-", $start_date_extract));

 ?>
<div class="calendar-grid-top">
  <span class="cta-2 txt-3-color"><?php echo $start_date = date_i18n("l j F",$start_date); ?></span>
</div>
