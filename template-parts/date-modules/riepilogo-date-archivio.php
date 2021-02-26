<?php
// recupero le date di inizio e fine per ogni periodo cartellone
$repeater_last = get_field('program_periods');
if ( $repeater_last != '' ) {
  $last_row = end($repeater_last);
  $very_last_date = $last_row['from'];
  $date = str_replace('/', '-', $very_last_date);
  echo date('Ymd', strtotime($date));
}
else {
  $repeater_last = get_field('tournee_dates');
  $last_row = end($repeater_last);
  $very_last_date = $last_row['date_from'];
  $date = str_replace('/', '-', $very_last_date);
  echo date('Ymd', strtotime($date));
}
