<?php
$args_side_dates = array(
	'post_parent' => $my_id,
  'post_type' => array( 'spettacolo', 'spettacolo_archivio' ),
  'numberposts' => 1

);
$children_side_dates = get_children( $args_side_dates );
foreach($children_side_dates as $post) : setup_postdata($post);
 ?>

  <?php
  $count_total_date_cart = 0;
  if( have_rows('program_periods') ) : while ( have_rows('program_periods') ) : the_row(); ?>
  <?php $count_total_date_cart++; ?>
  <?php endwhile; ?>
  <?php endif; ?>


  <?php
  $count_periods = 0;
  if( have_rows('program_periods') ) : while ( have_rows('program_periods') ) : the_row();
  $count_periods ++;
  ?>
  <div>
    <?php
    $count_date = 0;
    $total_dates = 0;
    if( have_rows('dates') ) :
      while ( have_rows('dates') ) : the_row();
        $total_dates ++;
        endwhile; ?>
    <?php
      while ( have_rows('dates') ) : the_row(); ?>
      <?php
			if ( get_sub_field( 'titolo_anteprima_calendario' ) ) {
				$title = get_sub_field('titolo_anteprima_calendario');
			}
			else {
				$title = get_the_title();
			}
      $dateString = get_sub_field('date');
      $orario = get_sub_field('time');
      $orario_fine = get_sub_field('time_end');
      $timestamp = strtotime(str_replace("/", "-", $dateString));
      $a_date_string = date_i18n("l j F",$timestamp);
      if ( $todaystamp > $timestamp ) {
        echo '<div class="date-block date-display-none">';
        echo '<div class="inside cta-2">';
				echo '<strong>'.$title.'</strong> ';
        if ( $orario != '' ) {
          echo $a_date_string .' h ' . $orario;
          if ( $orario_fine != '' ) {
            echo ' - ' . $orario_fine;
          }
        }
        else {
          echo $a_date_string;
        }
        echo '</div>';
        echo '</div>';
      }
      if ( $todaystamp == $timestamp ) {
        $count_date ++;
        echo '<div class="date-block date-current">';
        echo '<div class="inside cta-2">';
				echo '<strong>'.$title.'</strong> ';
        if ( $orario != '' ) {
          echo $a_date_string .' h ' . $orario;
          if ( $orario_fine != '' ) {
            echo ' - ' . $orario_fine;
          }
        }
        else {
          echo $a_date_string;
        }
        echo '</div>';
        echo '</div>';
      }
      if ( $todaystamp < $timestamp ) {
        $count_date ++;
        if ( $count_date > 6 ) {
          echo '<div class="date-toofuture">';
          echo '<div class="date-block date-otherday">';
          echo '<div class="inside cta-2">';
					echo '<strong>'.$title.'</strong> ';
          if ( $orario != '' ) {
            echo $a_date_string .' h ' . $orario;
            if ( $orario_fine != '' ) {
              echo ' - ' . $orario_fine;
            }
          }
          else {
            echo $a_date_string;
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        else {
          echo '<div class="date-block date-otherday">';
          echo '<div class="inside cta-2">';
					echo '<strong>'.$title.'</strong> ';
          if ( $orario != '' ) {
            echo $a_date_string .' h ' . $orario;
            if ( $orario_fine != '' ) {
              echo ' - ' . $orario_fine;
            }
          }
          else {
            echo $a_date_string;
          }
          echo '</div>';
          echo '</div>';
        }


      }
      if ( $count_date == 6 && $total_dates > 6 ) {
        echo '<div class="date-block date-otherday">';
        echo '<div class="inside cta-1 allupper">';
        echo '<a href="javascript:void(0);" class="expandable-dates">repliche successive</a>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    <?php endwhile; endif; ?>
    <?php $count_just_line = 0;
      if ( $count_periods != $count_total_date_cart ) :
         $count_just_line++; if ( $count_just_line > 1 ) : ?>
          <div class="date-block-just-line">
          </div>
        <?php endif ?>
    <?php endif ?>
  </div>

  <?php endwhile; endif; ?>
  <?php
  if ( $count_date == 0 ) {
    dynamic_sidebar( 'sidebar-spettacolo-figlio-finito' );
  }
  ?>
<?php endforeach; wp_reset_postdata(); ?>
