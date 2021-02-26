<?php
$data_custom_selector = get_field( 'data_custom_selector' );
 if ( $data_custom_selector === 'si' ) : ?>
  <?php the_field( 'data_custom'); ?>
<?php else : ?>
  <?php
  // recupero le date di inizio e fine per ogni periodo
  $repeater_first = get_field('program_periods', $p_id);
  if ( $repeater_first != '' ) {
    $very_first_date = $repeater_first[0]['from'];
    $very_start_date = strtotime(str_replace("/", "-", $very_first_date));
    $very_start_date_month = date("m ",$very_start_date);
    $very_start_date_year = date("Y ",$very_start_date);
    $last_row = end($repeater_first);
    $very_last_date = $last_row['to'];
    $very_end_date = strtotime(str_replace("/", "-", $very_last_date));
    $very_end_date_month = date("m ",$very_end_date);
    $very_end_date_year = date("Y ",$very_end_date);
  }
  else {
    $repeater_first = get_field('tournee_dates', $p_id);
    $very_first_date = $repeater_first[0]['date_from'];
    $very_start_date = strtotime(str_replace("/", "-", $very_first_date));
    $very_start_date_month = date("m ",$very_start_date);
    $very_start_date_year = date("Y ",$very_start_date);
    $last_row = end($repeater_first);
    $very_last_date = $last_row['date_to'];
    $very_end_date = strtotime(str_replace("/", "-", $very_last_date));
    $very_end_date_month = date("m ",$very_end_date);
    $very_end_date_year = date("Y ",$very_end_date);
  }



  if ( $very_first_date == $very_last_date ) {
    echo $very_start_date = date_i18n("j F Y",$very_start_date);
  }
  else {
    if ( $very_start_date_month === $very_end_date_month ) {
      echo $very_start_date = date_i18n("j ",$very_start_date);
      if ( $very_start_date_year != $very_end_date_year ) {
        echo $very_start_date_year;
      }
    }
    else {
      echo $very_start_date = date_i18n("j F ",$very_start_date);
      if ( $very_start_date_year != $very_end_date_year ) {
        echo $very_start_date_year;
      }
    }
    if ( $very_first_date != $very_last_date ) {
      echo ' - ';
      echo $very_end_date = date_i18n("j F ",$very_end_date);
      echo $very_end_date_year;
    }
  }
  ?>
<?php endif; ?>
