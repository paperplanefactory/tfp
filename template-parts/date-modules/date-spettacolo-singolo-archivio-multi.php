<?php
wp_reset_query();
wp_reset_postdata();
$args_arch_children = array(
 'post_type' => 'spettacolo_archivio',
 'numberposts' => -1,
 'meta_key' => 'program_periods_wp',
 'orderby' => 'meta_value_num',
 'order' => 'ASC',
 'tax_query' => array(
   array(
     'taxonomy' => 'gestione_spettacolo_unico',
     'field' => 'slug',
     'terms' => $relazione_specifica_slug,
   )
 )
 );
$my_arch_children = get_posts( $args_arch_children );
foreach($my_arch_children as $post) : setup_postdata($post);
$key_1_value = get_post_meta( get_the_ID(), 'program_periods_wp', true );
?>
<?php if ( has_term( 'cartellone', 'tipo_spettacolo' ) ) : ?>
  <div class="cta-1">
    <a href="javascript:void(0);" class="expandable plus"><span class="category-list">
      Cartellone
    </span>
    <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
    ?>
  </a>
  </div>
  <div class="expandable-content  expandable-hidden">
    <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio-produzione-multi.php' ) ); ?>
    <?php the_field('sala_durata_contenuto'); ?>
  </div>

<?php elseif ( has_term( 'tournee', 'tipo_spettacolo' ) ) : ?>
  <div class="cta-1">
    <a href="javascript:void(0);" class="expandable plus"><span class="category-list">
      Tournée
    </span>
    <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
    ?>
  </a>
  </div>
  <div class="expandable-content  expandable-hidden">
    <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio-tournee-multi.php' ) ); ?>
  </div>


<?php elseif ( has_term( 'produzioni', 'tipo_spettacolo' ) ) : ?>
  <div class="cta-1">
    <a href="javascript:void(0);" class="expandable none"><span class="category-list">
      Produzioni
    </span>
    <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
    ?>
  </a>
  </div>

<?php endif; ?>

<?php endforeach; wp_reset_query(); ?>
