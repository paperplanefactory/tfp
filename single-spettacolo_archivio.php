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

$terms_season = get_the_terms( $post->ID , 'stagione' );
foreach($terms_season as $term_season) {
    if ($term_season->parent != 0) { // avoid parent categories
        $back_season = $term_season->slug;
    }
      unset($term_season);
}

$terms_relazione = get_the_terms( $post->ID , 'padre_figlio' );
// Loop over each item since it's an array
if ( $terms_relazione != null ){
  foreach( $terms_relazione as $term_relazione ) {
    $relazione_slug = $term_relazione->slug;
    unset($term_relazione);
  }
}

$terms_relazione_specifica = get_the_terms( $post->ID , 'gestione_spettacolo_unico' );
// Loop over each item since it's an array
if ( $terms_relazione_specifica != null ){
  foreach( $terms_relazione_specifica as $term_relazione_specifica ) {
    $relazione_specifica_slug = $term_relazione_specifica->slug;
    unset($term_relazione_specifica);
  }
}


call_prod_rep();
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
endwhile;
//date
if ( $spettacolo_color === 'cartellone' || $spettacolo_color === 'eventi-esterni' ) {

}
?>


<div class="wrapper first-after-header-double">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more">
      <div class="spettacolo-grid-new">
        <div class="spettacolo-grid-new-top">
          <div class="breadcrumbs cta-2">
            <a href="/archivio-spettacoli/stagione/<?php echo $back_season; ?>">Archivio</a>
          </div>
          <div class="category cta-1">
            <span class="category-list">
              <?php
              if (function_exists('call_all_area_attivita_archive')) {
                call_all_area_attivita_archive();
              }
              ?>
            </span>

            <span class="category-list">
              <?php
              if (function_exists('call_all_percorsi')) {
                global $theres_more;
                if ( $theres_more != null ) {
                  echo "-";
                }
                call_all_percorsi();
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
            <?php dynamic_sidebar( 'sidebar-spettacolo-archivio' ); ?>
            <br />
            <?php if ( has_term( 'spettacolo-contenitore', 'padre_figlio' ) ) : ?>
              <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio-multi.php' ) ); ?>
            <?php else : ?>
              <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio.php' ) ); ?>
            <?php endif; ?>
          </div>
          <div class="post-image">
            <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
          </div>
          <div class="didascalia cta-2 txt-5-color">
            <?php echo apply_filters( 'the_post_thumbnail_caption', get_the_post_thumbnail_caption( $post ) ); ?>
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
            <?php include( locate_template ( 'template-parts/banners/modulo-banner-loghi.php' ) ); ?>
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
          <?php dynamic_sidebar( 'sidebar-spettacolo-archivio' ); ?>
          <?php if ( has_term( 'produzioni', 'tipo_spettacolo' ) ) : ?>
            <div class="cta-1">
              <a href="javascript:void(0);" class="expandable none"><span class="category-list">
                Produzione
              </span>
              <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
              ?>
            </a>
            </div>
          <?php endif; ?>
          <?php if ( has_term( 'spettacolo-contenitore', 'padre_figlio' ) ) : ?>
            <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio-multi.php' ) ); ?>
          <?php else : ?>
            <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio.php' ) ); ?>
          <?php endif; ?>
          <?php
          dynamic_sidebar( 'sidebar-spettacolo' );

          include( locate_template ( 'template-parts/banners/modulo-banner.php' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="set-end"></div>











<div class="min-medium-height-box"></div>
<?php
$mostrare_come_contenuto_correlato = get_field('mostrare_come_contenuto_correlato');
if ( $produzione_slug != '' &&  $mostrare_come_contenuto_correlato == 'no-spettacoli' ) : ?>
<div class="wrapper bg-7-color z-index-trick">
  <div class="wrapper-padded zero-title-padtop">
    <div class="zero-title txt-2-color">
      <?php if ( $mostrare_come_contenuto_correlato != 'no-spettacoli' ) : ?>
        <?php the_field( 'la_vita_dello_spettacolo', 'option'); ?>
      <?php else : ?>
        <?php echo $produzione_name; ?>
      <?php endif; ?>
    </div>
    <div class="def-grid">
      <?php
      $callme = get_field('contenuti_correlati'); ?>
      <?php
      $args_rel = array(
       'post_type' => 'spettacolo_archivio',
       'posts_per_page' => -1,
       'tax_query' => array(
         array(
           'taxonomy' => 'prod_rep',
           'field' => 'slug',
           'terms' => $produzione_slug,
         )
       ),
       'exclude' => $my_id,
       'meta_key' => 'program_periods_wp',
       'orderby' => 'meta_value',
       'order' => 'ASC'
       );
      $my_rel = get_posts( $args_rel );
      foreach($my_rel as $post) : setup_postdata($post);
      include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
      endforeach; ?>
    </div>
  </div>
</div>
<?php elseif ( $mostrare_come_contenuto_correlato === 'ad-hoc' ) :
  $page_image = get_field('page_image');
    if ( $isMobile == 1 ) {
      $page_image_URL = $page_image['sizes']['content_picture'];
    }
    if ( $isTablet == 1 ) {
      $page_image_URL = $page_image['sizes']['content_picture'];
    }
    if ( $isDesktop == 1 ) {
      $page_image_URL = $page_image['sizes']['grid_picture_xxl'];
    }
    $video = get_field('video');
  ?>
  <div class="wrapper bg-7-color z-index-trick">
    <div class="wrapper-padded zero-title-padtop">
      <div class="zero-title txt-2-color">
        <?php the_field( 'archivio_parenti', 'option'); ?>
      </div>
      <div class="wrapper-padded-more">
        <div class="sottopagine">
          <div class="sub-page sub-page-archive">
            <div class="split">
              <?php if ( $video != '' ) : ?>
                <div class="video_frame">
                  <?php the_field('video'); ?>
                </div>
              <?php else : ?>
                <a href="<?php the_field('scegli_pagina'); ?>">
                  <img class="lazy" src="<?php echo $page_image_URL; ?>" />
                </a>
              <?php endif; ?>
            </div>
            <div class="split">
              <div class="padder_r content-styled">
                <h4><a href="<?php the_field('scegli_pagina'); ?>"><?php the_field('page_title'); ?></a></h4>
                <?php the_field('page_abstract'); ?>
                <a href="<?php the_field('scegli_pagina'); ?>" class="btn-fill-hover grey cta-4 allupper"><?php the_field('page_cta'); ?> &#9658;</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php endif; ?>


<?php get_footer(); ?>
