<?php
/**
 * The Template for displaying all single cpt.
 */

get_header();
?>
<?php while ( have_posts() ) : the_post();
$my_id = get_the_ID();
if (function_exists('call_all_area_attivita_primary_id')) {
  call_all_area_attivita_primary_id();
}
$thumb_id = get_post_thumbnail_id();
if ( $thumb_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'content_picture', true);
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $activity_id . '.png';
}
//stabilisco la stagione corrente per filtrare gli spettacoli
$stagione_corrente = get_field("scegli_stagione_corrente", "option");
$stagione = get_term_by('id', $stagione_corrente, 'stagione');
$stagione_name = $stagione->name;
?>





<div class="wrapper first-after-header-double">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more-spettacolo">
      <div class="spettacolo-grid-new">
        <div class="spettacolo-grid-new-top">
          <div class="breadcrumbs cta-2">
            <?php // recupero la sua tag tipo_spettacolo
            $terms_tipo_spettacolo = get_the_terms( $post->ID , 'tipo_spettacolo' );
            // Loop over each item since it's an array
            if ( $terms_tipo_spettacolo != null ) : ?>
            <?php foreach( $terms_tipo_spettacolo as $term_tipo_spettacolo ) : ?>
            <?php // Print the name method from $term which is an OBJECT
            $tipo_spettacolo_slug = $term_tipo_spettacolo->slug;
            $tipo_spettacolo_name = $term_tipo_spettacolo->name;
            if ( $tipo_spettacolo_slug === 'cartellone' ) : ?>
              <a href="/cartellone/<?php echo $tipo_spettacolo_name; ?>"><?php echo $tipo_spettacolo_name; ?> <?php echo $stagione_name; ?></a>
            <?php elseif ( $tipo_spettacolo_slug === 'tournee' ) : ?>
              <a href="/tournee/"><?php echo $tipo_spettacolo_name; ?> <?php echo $stagione_name; ?></a>
            <?php elseif ( $tipo_spettacolo_slug === 'distribuzione' ) : ?>
              <a href="/distribuzione/"><?php echo $tipo_spettacolo_name; ?></a>
            <?php endif; ?>
            <?php unset($term_tipo_spettacolo); ?>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="category cta-1">
            <span class="category-list">
              <?php
              if (function_exists('call_all_area_attivita')) {
                call_all_area_attivita();
              }
              ?>
            </span>

            <span class="category-list">
              <?php
              if (function_exists('call_all_percorsi_single')) {
                call_all_percorsi_single();
              }
              ?>
            </span>
          </div>
          <h1><?php the_title(); ?></h1>
          <?php if( get_field('subtitle') ) : ?>
            <h2><?php the_field('subtitle'); ?></h2>
          <?php endif; ?>
        </div>
        <div class="spettacolo-grid-new-left">
          <div class="spettacolo-grid-date-cta-mobile">
            <div class="fiftyfifty-grid-taxes-bottom">
              <div class="fiftyfifty-grid-module-left">
                <h5><?php include( locate_template ( 'template-parts/date-modules/riepilogo-date-top.php' ) ); ?></h5>

              </div>
              <div class="fiftyfifty-grid-module-right">

                <?php if( get_field('url_cta_biglietti') ) : ?>
                  <a href="<?php the_field('url_cta_biglietti'); ?>" class="btn-fill red cta-4 allupper last dates-on-left" target="_blank"><?php the_field('cta_biglietti'); ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="post-image">
            <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
          </div>
          <div class="didascalia cta-2 txt-5-color">
            <?php echo apply_filters( 'the_post_thumbnail_caption', get_the_post_thumbnail_caption( $post ) ); ?>
          </div>
          <div class="spettacolo-grid-date-avvisi-mobile">


            <?php if( has_term( 'distribuzione', 'tipo_spettacolo' ) ) : ?>
              <?php if( get_field('titolo') ) : ?>
                <h2><?php the_field('titolo'); ?><h2>
              <?php endif; ?>
              <?php if( get_field('informazioni') ) : ?>
                <?php the_field('informazioni'); ?>
              <?php endif; ?>

            <?php elseif ( has_term( 'cartellone', 'tipo_spettacolo' ) || has_term( 'tournee', 'tipo_spettacolo' ) || has_term( 'eventi-esterni', 'tipo_spettacolo' ) ) : ?>
              <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-schema-org.php' ) ); ?>
              <div class="clearer"></div>
              <?php if( get_field('avviso_spettacolo') ) : ?>
                <div class="cta-2 padder-archivio bg-7-color">
                  <?php the_field('avviso_spettacolo'); ?>
                </div>
              <?php endif; ?>
              <?php if ( has_term( 'cartellone', 'tipo_spettacolo' ) || has_term( 'eventi-esterni', 'tipo_spettacolo' ) ) : ?>
                <div class="cta-1">
                  <a href="javascript:void(0);" class="expandable minus">Date e orari</a>
                </div>
                <div class="expandable-content">
                  <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo.php' ) ); ?>
                </div>
                <?php if( get_field('sala_durata_titolo') ) : ?>
                  <div class="cta-1">
                    <a href="javascript:void(0);" class="expandable plus"><?php the_field('sala_durata_titolo'); ?></a>
                  </div>
                  <div class="expandable-content expandable-hidden">
                    <?php the_field('sala_durata_contenuto'); ?>
                  </div>
                <?php endif; ?>

                <?php if( get_field('prezzi_promozioni_titolo') ) : ?>
                  <div class="cta-1">
                    <a href="javascript:void(0);" class="expandable plus"><?php the_field('prezzi_promozioni_titolo'); ?></a>
                  </div>
                  <div class="expandable-content expandable-hidden">
                    <?php the_field('prezzi_promozioni_contenuto'); ?>
                  </div>
                <?php endif; ?>

                <?php if( get_field('titolo_espansione') ) : ?>
                  <div class="cta-1">
                    <a href="javascript:void(0);" class="expandable plus"><?php the_field('titolo_espansione'); ?></a>
                  </div>
                  <div class="expandable-content expandable-hidden">
                    <?php the_field('contenuto_espansione'); ?>
                  </div>
                <?php endif; ?>

                <div class="cta-1">
                  <a href="javascript:void(0);" class="expandable plus">Info e biglietteria</a>
                </div>
                <div class="expandable-content expandable-hidden">
                  <?php dynamic_sidebar( 'sidebar-info-e-biglietteria' ); ?>
                  <?php if( has_term( '', 'abbonamenti' ) ) : ?>
                    <p>
                      Questo spettacolo è inserito nell’abbonamento
                      <span class="category-list">
                        <?php
                        if (function_exists('call_all_abbonamenti')) {
                          call_all_abbonamenti();
                        }
                        ?>
                      </span>
                    </p>
                  <?php endif; ?>
                </div>
              <?php endif; ?>


              <?php if ( has_term( 'tournee', 'tipo_spettacolo' ) ) : ?>
                <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-tournee.php' ) ); ?>
              <?php endif; ?>
            <?php endif; ?>

          </div>
          <div class="contents first-after-header-double">
            <div class="spettacolo-grid-share-desktop">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
            </div>
            <?php if( get_field('informazioni_autore_cast') ) : ?>
              <div class="info-preliminari cta-2">
                <?php the_field('informazioni_autore_cast'); ?>
                <?php if( have_rows('loghi_iniziali') ) : ?>
                  <div class="info-preliminari-loghi">
                    <?php while ( have_rows('loghi_iniziali') ) : the_row();
                          $logo_iniziale = get_sub_field('logo_iniziale');
                          if ( $isMobile == 1 ) {
                            $logo_iniziale_URL = $logo_iniziale['sizes']['full_desk'];
                          }
                          if ( $isTablet == 1 ) {
                            $logo_iniziale_URL = $logo_iniziale['sizes']['full_desk'];
                          }
                          if ( $isDesktop == 1 ) {
                            $logo_iniziale_URL = $logo_iniziale['sizes']['full_desk'];
                          }
                          ?>
                    <div class="logo">
                      <?php if ( get_sub_field('url_di_destinazione') ) : ?>
                        <a href="<?php the_sub_field('url_di_destinazione'); ?>" target="_blank">
                          <img class="lazy" data-original="<?php echo $logo_iniziale_URL; ?>" />
                        </a>
                      <?php else : ?>
                        <img class="lazy" data-original="<?php echo $logo_iniziale_URL; ?>" />
                      <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
            <?php
            $module_count = 0;
            if( have_rows('moduli') ) : while ( have_rows('moduli') ) : the_row();
            $module_count ++;
            $mod_radio = get_sub_field('scegli_modulo');
            switch ( $mod_radio ) {
              case 'mod-titolo' :
              include( locate_template ( 'template-parts/content-modules/modulo-titolo.php' ) );
              break;
              case 'mod-testo' :
              include( locate_template ( 'template-parts/content-modules/modulo-testo.php' ) );
              break;
              case 'mod-incontro' :
              include( locate_template ( 'template-parts/content-modules/modulo-incontro.php' ) );
              break;
              case 'mod-frase-evidenza' :
              include( locate_template ( 'template-parts/content-modules/modulo-frase-evidenza.php' ) );
              break;
              case 'mod-frase-evidenza-piccola' :
              include( locate_template ( 'template-parts/content-modules/modulo-frase-evidenza-piccola.php' ) );
              break;
              case 'mod-slideshow' :
              include( locate_template ( 'template-parts/content-modules/modulo-slideshow.php' ) );
              break;
              case 'mod-sponsor-grande' :
              include( locate_template ( 'template-parts/content-modules/modulo-sponsor-grande.php' ) );
              break;
              case 'mod-sponsor' :
              include( locate_template ( 'template-parts/content-modules/modulo-sponsor.php' ) );
              break;
              case 'mod-recensioni' :
              include( locate_template ( 'template-parts/content-modules/modulo-recensioni.php' ) );
              break;
              case 'mod-download' :
              include( locate_template ( 'template-parts/content-modules/modulo-download.php' ) );
              break;
              case 'mod-expand' :
              include( locate_template ( 'template-parts/content-modules/modulo-espansione.php' ) );
              break;
              case 'mod-cicli' :
              include( locate_template ( 'template-parts/content-modules/modulo-cicli.php' ) );
              break;
              case 'mod-testo-cornice' :
              include( locate_template ( 'template-parts/content-modules/modulo-testo-cornice.php' ) );
              break;
            }
            endwhile; endif;

            ?>
            <div class="spettacolo-grid-widget-share-tablet">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
            </div>
            <div class="spettacolo-grid-widget-share-mobile">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
              <?php
              dynamic_sidebar( 'sidebar-spettacolo' );

              include( locate_template ( 'template-parts/banners/modulo-banner.php' ) ); ?>
            </div>
          </div>
        </div>
        <div class="spettacolo-grid-new-right">
          <?php if( has_term( 'distribuzione', 'tipo_spettacolo' ) ) : ?>
            <?php if( get_field('titolo') ) : ?>
              <h2><?php the_field('titolo'); ?><h2>
            <?php endif; ?>
            <?php if( get_field('informazioni') ) : ?>
              <?php the_field('informazioni'); ?>
            <?php endif; ?>

          <?php elseif ( has_term( 'cartellone', 'tipo_spettacolo' ) || has_term( 'tournee', 'tipo_spettacolo' ) || has_term( 'eventi-esterni', 'tipo_spettacolo' ) ) : ?>
            <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-schema-org.php' ) ); ?>
            <h4><?php include( locate_template ( 'template-parts/date-modules/riepilogo-date.php' ) ); ?></h4>
            <?php if( get_field('url_cta_biglietti') ) : ?>
              <a href="<?php the_field('url_cta_biglietti'); ?>" target="_blank" class="btn-fill red cta-4 allupper last"><?php the_field('cta_biglietti'); ?></a>
            <?php endif; ?>
            <div class="clearer"></div>
            <?php if( get_field('avviso_spettacolo') ) : ?>
              <div class="cta-2 padder-archivio bg-7-color">
                <?php the_field('avviso_spettacolo'); ?>
              </div>
            <?php endif; ?>
            <?php if ( has_term( 'cartellone', 'tipo_spettacolo' ) || has_term( 'eventi-esterni', 'tipo_spettacolo' ) ) : ?>
              <div class="cta-1">
                <a href="javascript:void(0);" class="expandable minus">Date e orari</a>
              </div>
              <div class="expandable-content">
                <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo.php' ) ); ?>
              </div>
              <?php if( get_field('sala_durata_titolo') ) : ?>
                <div class="cta-1">
                  <a href="javascript:void(0);" class="expandable minus"><?php the_field('sala_durata_titolo'); ?></a>
                </div>
                <div class="expandable-content">
                  <?php the_field('sala_durata_contenuto'); ?>
                </div>
              <?php endif; ?>

              <?php if( get_field('prezzi_promozioni_titolo') ) : ?>
                <div class="cta-1">
                  <a href="javascript:void(0);" class="expandable plus"><?php the_field('prezzi_promozioni_titolo'); ?></a>
                </div>
                <div class="expandable-content expandable-hidden">
                  <?php the_field('prezzi_promozioni_contenuto'); ?>
                </div>
              <?php endif; ?>

              <?php if( get_field('titolo_espansione') ) : ?>
                <div class="cta-1">
                  <a href="javascript:void(0);" class="expandable plus"><?php the_field('titolo_espansione'); ?></a>
                </div>
                <div class="expandable-content expandable-hidden">
                  <?php the_field('contenuto_espansione'); ?>
                </div>
              <?php endif; ?>

              <div class="cta-1">
                <a href="javascript:void(0);" class="expandable plus">Info e biglietteria</a>
              </div>
              <div class="expandable-content expandable-hidden">
                <?php dynamic_sidebar( 'sidebar-info-e-biglietteria' ); ?>
                <?php if( has_term( '', 'abbonamenti' ) ) : ?>
                  <p>
                    Questo spettacolo è inserito nell’abbonamento
                    <span class="category-list">
                      <?php
                      if (function_exists('call_all_abbonamenti')) {
                        call_all_abbonamenti();
                      }
                      ?>
                    </span>
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>


            <?php if ( has_term( 'tournee', 'tipo_spettacolo' ) ) : ?>
              <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-tournee.php' ) ); ?>
            <?php endif; ?>
          <?php endif; ?>
          <?php
          $mostrare_sidebar = get_field( 'mostrare_sidebar' );
          if ( $mostrare_sidebar === 'no' ) {
          }
          else {
            dynamic_sidebar( 'sidebar-spettacolo' );
          }


          include( locate_template ( 'template-parts/banners/modulo-banner.php' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="set-end"></div>







<?php endwhile; ?>
<div class="min-medium-height-box"></div>
<?php if ( has_term( 'distribuzione', 'tipo_spettacolo' ) ) : ?>
  <?php
  $args_rel = array(
   'post_type' => 'spettacolo',
   'posts_per_page' => 4,
   'tax_query' => array(
     array(
       'taxonomy' => 'tipo_spettacolo',
       'field' => 'slug',
       'terms' => 'distribuzione',
     )
   ),
   'exclude' => $my_id
   );
  $my_rel = get_posts( $args_rel );
  if ( $my_rel != null ) : ?>
    <div class="wrapper bg-7-color z-index-trick">
      <div class="wrapper-padded zero-title-padtop">
        <div class="zero-title txt-2-color">
          <?php the_field( 'in_distribuzione_anche', 'option'); ?>
        </div>
        <div class="def-grid">
          <?php foreach($my_rel as $post) : setup_postdata($post);
          include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
          endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php else : ?>
  <?php
  $spettacoli_correlati = get_field('spettacoli_correlati');
  if ( $spettacoli_correlati != 'no-spettacoli' ) : ?>
  <div class="wrapper bg-7-color z-index-trick">
    <div class="wrapper-padded zero-title-padtop">
      <div class="zero-title txt-2-color">
        <?php the_field( 'ti_potrebbe_interessare', 'option'); ?>
      </div>
      <div class="def-grid">
        <?php if ( $spettacoli_correlati === 'choose-spettacoli' ) : ?>
          <?php
          $callme = get_field('contenuti_correlati'); ?>
          <?php
          $args_rel = array(
           'post_type' => 'spettacolo',
           'posts_per_page' => 4,
           'include' => $callme,
           'exclude' => $my_id
           );
          $my_rel = get_posts( $args_rel );
          foreach($my_rel as $post) : setup_postdata($post);
          include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
          endforeach; ?>
        <?php elseif ( $spettacoli_correlati === 'choose-tag' ) :
          $scegli_target = get_field('scegli_target'); ?>
          <?php
          $args_buuu = array(
           'post_type' => 'spettacolo',
           'posts_per_page' => 4,
           'tax_query' => array(
             array(
               'taxonomy' => 'target',
               'field' => 'term_taxonomy_id',
               'terms' => $scegli_target,
             )
           ),
           'exclude' => $my_id
           );
          $my_buuuu = get_posts( $args_buuu );
          foreach($my_buuuu as $post) : setup_postdata($post);
          include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
          endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>
<div class="min-medium-height-box"></div>
<?php get_footer(); ?>
