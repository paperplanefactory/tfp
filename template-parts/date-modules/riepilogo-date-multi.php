<?php
$args_arch_main = array(
 'post_type' => 'spettacolo_archivio',
 'posts_per_page' => -1,
 'orderby' => 'stagione',
 'order' => desc,
 'exclude' => $my_id,
 'tax_query' => array(
   array(
     'taxonomy' => 'gestione_spettacolo_unico',
     'field' => 'term_id',
     'terms' => $rela,
   )
 )
 );
$my_arch_main = get_posts( $args_arch_main );
foreach($my_arch_main as $post) : setup_postdata($post);
include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
echo $stagione_subname;
?>
<?php the_title(); ?>
<?php
// recupero le date di inizio e fine per ogni periodo
if( have_rows('program_periods') ) {
  while ( have_rows('program_periods') ) {
    the_row();
    $start_date_extract = get_sub_field('from');
    $start_date = strtotime(str_replace("/", "-", $start_date_extract));
    $end_date_extract = get_sub_field('to');
    $end_date = strtotime(str_replace("/", "-", $end_date_extract));
    $start_date_month = date("m ",$start_date);
    $end_date_month = date("m ",$end_date);
    if ( $start_date_month === $end_date_month ) {
      echo $start_date = date_i18n("j ",$start_date);
    }
    else {
      echo $start_date = date_i18n("j F ",$start_date);
    }
    //ultima data

    if ( $start_date_extract != $end_date_extract ) {
      echo ' - ';

      echo $end_date = date_i18n("j F ",$end_date);
    }
    echo '<br />';
  }
}
?>
<?php endforeach; ?>
