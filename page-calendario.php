<?php
/**
 * Template Name: Calendario
*/

get_header();
global $wp_query;
if ( isset ( $wp_query->query_vars['date'] ) ) {
  $date = $wp_query->query_vars['date'];
  $start_date = substr($date, 0, -8);
  $end_date = substr($date, 8, 16);
}
if ( isset ( $wp_query->query_vars['orario'] ) ) {
  $start_hour = $wp_query->query_vars['orario'];
}
if ( isset ( $wp_query->query_vars['filtro'] ) ) {
  $filtro = $wp_query->query_vars['filtro'];
  $term = term_exists( $filtro, 'area_attivita' );
  if ( $term !== 0 && $term !== null ) {
      $term_tax = 'area_attivita';
      $term = get_term_by('slug', $filtro, 'area_attivita');
      $term_id = $term->term_id;
      $term_name = $term->name;
  }

  $term = term_exists( $filtro, 'abbonamenti' );
  if ( $term !== 0 && $term !== null ) {
      $term_tax = 'abbonamenti';
      $term = get_term_by('slug', $filtro, 'abbonamenti');
      $term_id = $term->term_id;
      $term_name = $term->name;
  }

  $term = term_exists( $filtro, 'percorsi' );
  if ( $term !== 0 && $term !== null ) {
      $term_tax = 'percorsi';
      $term = get_term_by('slug', $filtro, 'percorsi');
      $term_id = $term->term_id;
      $term_name = $term->name;
  }
}
?>

<?php
if ( $isMobile == 1 || $isTablet == 1 ) {
  include( locate_template ( 'template-parts/menus-and-utilities/search-box-calendar-mobile.php' ) );
}
if ( $isDesktop == 1 ) {
  include( locate_template ( 'template-parts/menus-and-utilities/search-box-calendar.php' ) );
}
?>







<div class="wrapper pad-bottom-1 min-height-box">
  <?php if( get_field( 'messaggio_pagina_cartellone_e_calendario', 'option' ) ) : ?>
    <div class="wrapper-padded">
      <div class="avviso-cartellone bg-1-color txt-2-color">
        <h4><?php the_field( 'messaggio_pagina_cartellone_e_calendario', 'option' ); ?></h4>
      </div>
    </div>
  <?php endif; ?>
  <div id="loading"></div>
  <div id="result"></div>
</div>











<?php if ( isset ( $wp_query->query_vars['date'] ) )  : ?>
  <script type="text/javascript">
  startDateToApi = '<?php echo $start_date; ?>';
  endDateToApi = '<?php echo $end_date; ?>';
  </script>
<?php endif; ?>



<?php if ( isset ( $wp_query->query_vars['hour'] ) )  : ?>
  <script type="text/javascript">
  hourToApi = '<?php echo $start_hour; ?>';
  hourToUrl = '<?php echo $start_hour; ?>';

  </script>
<?php endif; ?>

<?php if ( isset ( $term_tax ) && $term_tax === 'area_attivita'  ) : ?>
  <script type="text/javascript">
  term_name = '<?php echo $term_name; ?>';
  if( term_name.length > 15 ) {
    term_name_trim = term_name.substring( 0,15 ) + "...";
  }
  else {
    term_name_trim = term_name;
  }
  term_id = '<?php echo $term_id; ?>';
  term_slug = '<?php echo $filtro; ?>';
  filtro = 'tipo-evento';
  here = 'calendar';
  </script>
<?php elseif ( isset ( $term_tax ) && $term_tax === 'abbonamenti'  ) : ?>
  <script type="text/javascript">
  term_name = '<?php echo $term_name; ?>';
  if( term_name.length > 15 ) {
    term_name_trim = term_name.substring( 0,15 ) + "...";
  }
  else {
    term_name_trim = term_name;
  }
  term_id = '<?php echo $term_id; ?>';
  term_slug = '<?php echo $filtro; ?>';
  filtro = 'abbonamenti';
  here = 'calendar';
  </script>
<?php elseif ( isset ( $term_tax ) && $term_tax === 'percorsi'  ) : ?>
  <script type="text/javascript">
  term_name = '<?php echo $term_name; ?>';
  if( term_name.length > 15 ) {
    term_name_trim = term_name.substring( 0,15 ) + "...";
  }
  else {
    term_name_trim = term_name;
  }
  term_id = '<?php echo $term_id; ?>';
  term_slug = '<?php echo $filtro; ?>';
  filtro = 'percorsi';
  here = 'calendar';
  </script>
<?php else : ?>
  <script type="text/javascript">
  term_name = '';
  term_id = '';
  term_slug = '';
  filtro = 'fascia-oraria';
  if ( hourToUrl === 'pomeriggio' ) {
    fascia_name = 'Mattino e pomeriggio';
  }
  if ( hourToUrl === 'sera' ) {
    fascia_name = 'Sera';
  }
  if ( hourToUrl === 'giornata' ) {
    fascia_name = 'Fascia oraria';
  }

  here = 'calendar';
  </script>
<?php endif; ?>





<?php get_footer(); ?>
