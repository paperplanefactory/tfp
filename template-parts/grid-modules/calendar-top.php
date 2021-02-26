<?php
$start_date_extract = $value[show_date];
$start_date_extract = strtotime(str_replace("/", "-", $start_date_extract));
$start_date_extract = date_i18n("l j F",$start_date_extract);
 ?>
<div class="calendar-grid-top">
  <span class="cta-2 txt-3-color"><?php echo $start_date_extract; ?></span>
</div>
