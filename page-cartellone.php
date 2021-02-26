<?php
/**
 * Template Name: Cartellone
*/

get_header();
?>
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
  </script>
<?php else : ?>
  <script type="text/javascript">
  term_name = '';
  term_id = '';
  term_slug = '';
  filtro = '';
  </script>
<?php endif; ?>


<?php
//stabilisco la stagione corrente per filtrare gli spettacoli
$stagione_corrente = get_field("scegli_stagione_corrente", "option");
$stagione = get_term_by('id', $stagione_corrente, 'stagione');
$stagione_name = $stagione->name;
if ( $isMobile == 1 ) {
  include( locate_template ( 'template-parts/menus-and-utilities/search-box-cartellone-mobile.php' ) );
}
if ( $isTablet == 1 || $isDesktop == 1 ) {
  include( locate_template ( 'template-parts/menus-and-utilities/search-box-cartellone.php' ) );
}
?>
<div id="tax-info"></div>

<div class="wrapper pad-bottom-1">
  <?php if( get_field( 'messaggio_pagina_cartellone_e_calendario', 'option' ) ) : ?>
    <div class="wrapper-padded">
      <div class="avviso-cartellone bg-1-color txt-2-color">
        <h4><?php the_field( 'messaggio_pagina_cartellone_e_calendario', 'option' ); ?></h4>
      </div>
    </div>
  <?php endif; ?>
  <div id="loading"></div>
  <div class="wrapper-padded">
    <div class="zero-title txt-7-color fade-on-load">
      <?php the_field( 'prossimamente', 'option'); ?>
    </div>
    <div id="result" class="def-grid"></div>
  </div>
</div>


<div class="wrapper pad-bottom-1 bg-7-color past-hide">
  <div id="loading-past"></div>
  <div class="wrapper-padded">
    <div class="zero-title txt-2-color fade-on-load">
      <?php the_field( 'eventi_passati', 'option'); ?>
    </div>
    <div id="result-past" class="def-grid"></div>
  </div>
</div>


<div class="wrapper pad-bottom-1 abbonamenti-hide">
  <div class="wrapper-padded">
    <div class="zero-title txt-7-color fade-on-load">
      <?php the_field( 'gli_abbonamenti', 'option'); ?>
    </div>
    <div id="abbonamenti-list" class="def-grid-bottom"></div>
  </div>
</div>


<?php get_footer(); ?>
