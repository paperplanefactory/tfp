<p>
  <?php
  // recupero le date di inizio e fine per ogni periodo cartellone
  $repeater_first = get_field('program_periods', $p_id);
  $very_first_date = $repeater_first[0]['from'];
  $very_start_date = strtotime(str_replace("/", "-", $very_first_date));
  $very_start_date_month = date("m ",$very_start_date);
  $very_start_date_year = date("Y ",$very_start_date);
  $repeater_last = get_field('program_periods', $p_id);
  $last_row = end($repeater_last);
  $very_last_date = $last_row['to'];
  $very_end_date = strtotime(str_replace("/", "-", $very_last_date));
  $very_end_date_month = date("m ",$very_end_date);
  $very_end_date_year = date("Y ",$very_end_date);
  if ( $very_first_date === $very_last_date ) {
    echo $very_start_date = date_i18n("j F Y",$very_start_date);
  }
  else {
    if ( $very_start_date_year != $very_end_date_year ) {
      echo date_i18n("j F Y ",$very_start_date);
      echo ' - ';
      echo date_i18n("j F Y ",$very_end_date);
    }

    if ( ( $very_start_date_year === $very_end_date_year ) && ( $very_start_date_month === $very_end_date_month ) ) {
      echo date_i18n("j ",$very_start_date);
      echo ' - ';
      echo date_i18n("j F Y ",$very_end_date);
    }
    elseif ( ( $very_start_date_year === $very_end_date_year ) && ( $very_start_date_month != $very_end_date_month ) ) {
      echo date_i18n("j F ",$very_start_date);
      echo ' - ';
      echo date_i18n("j F Y ",$very_end_date);
    }
  }
  ?>
</p>
