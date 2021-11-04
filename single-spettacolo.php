<?php
/**
 * The Template for displaying all single cpt.
 */

get_header();
?>
<?php while ( have_posts() ) : the_post();
if (class_exists('ESROWP_Helper')) {
  $check_id = ESROWP_Helper::getShow();
  if ( $check_id != '' ) {
    $check_id = json_encode($check_id, true);
    $check_id = json_decode($check_id, true);
    $find_id = $check_id['ShowId'];
  }

}


if ( !empty($find_id) ) {
  $events = ESROWP_Helper::getEventsInfos($find_id);
  $prices = ESROWP_Util::getPricesRange($events);
}

if ( isset( $prices ) ) {
  $min_price = mb_substr($prices[0], 0, -3);
  if ( $min_price == 0 ) {
    $prices_for_btn = 'prenota';
  }
  else {
    //$prices_for_btn = 'acquista <span class="allnone">da</span> '.$min_price.' €*';
    $prices_for_btn = 'acquista';
  }

}
else {
  $prices_for_btn = 'acquista';
}

$cta_biglietti = get_field( 'cta_biglietti' );

if ( $cta_biglietti === 'nessuna' ) {
  $cta_biglietti_txt = '';
}
elseif ( $cta_biglietti === 'acquista biglietti' ) {
  $cta_biglietti_txt = 'acquista biglietti';
}
elseif ( $cta_biglietti === 'prenota' ) {
  $cta_biglietti_txt = 'prenota';
}
elseif ( $cta_biglietti === 'dona ora' ) {
  $cta_biglietti_txt = 'dona ora';
}
elseif ( $cta_biglietti === 'iscriviti' ) {
  $cta_biglietti_txt = 'iscriviti';
}
elseif ( $cta_biglietti === 'gestito da ESRO' ) {
  $cta_biglietti_txt = 'gestito da ESRO';
}
elseif ( $cta_biglietti === 'overlay_link_interni' ) {
  $cta_biglietti_txt = 'gestito da ESRO';
}


//aggiungo una classe al documento per prevenire l'apertura dell'overlay da parametro se non ci sono spettacoli in lista
if ( !empty($events) || $cta_biglietti === 'iscriviti' ) {
  $class_overlay = 'overlay-content';
}
else {
  $class_overlay = '';
}

$my_id = get_the_ID();
if (function_exists('call_all_area_attivita_primary_id')) {
  call_all_area_attivita_primary_id();
}
$thumb_id = get_post_thumbnail_id();
if ( $thumb_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'content_picture', true);
    $thumb_url_overlay = $thumb_url;
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
    $thumb_url_overlay = $thumb_url;
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
    $thumb_url_overlay = wp_get_attachment_image_src($thumb_id,'overlay_tab', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $activity_id . '.png';
  $thumb_url_overlay[0] = '/web/themes/tfp/images/placeholders/' . $activity_id . '.png';
}
//stabilisco la stagione corrente per filtrare gli spettacoli
$stagione_corrente = get_field("scegli_stagione_corrente", "option");
$stagione = get_term_by('id', $stagione_corrente, 'stagione');
$stagione_name = $stagione->name;
$mostrare_date_spettacolo_figlio = get_field( 'mostrare_date_spettacolo_figlio' );
$titolo_date_figlio = get_field('titolo_date_figlio');
if ( isset($_GET["tickets"]) ) {
  $overlay_param = $_GET["tickets"];
}
else {
  $overlay_param = '';
}

?>
<?php if ( $overlay_param === 'open' ) : ?>
<script type="text/javascript">
$(document).ready(function() {
  function inPageOpenOverlay() {
    $('#tickets-overlay').fadeIn(150, "linear");
    $('.overlay-effect').delay(300).removeClass('overlay-effect-initial');
    $('html').css('overflowY', 'hidden');
    $('body').addClass('occupy-scrollbar');
  }
  inPageOpenOverlay();
});
</script>
<?php endif; ?>
<!--
<div id="sub-header" class="<?php echo $class_overlay; ?>">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid">
      <div class="fiftyfifty-grid-module-left">
        <h6>
          <span class="category-list">
          <?php
          if (function_exists('call_all_area_attivita_primary')) {
            call_all_area_attivita_primary();
          }
          ?>
        </span>
        <?php the_title(); ?></h6>
      </div>
      <div class="fiftyfifty-grid-module-right">
        <?php include( locate_template ( 'template-parts/date-modules/riepilogo-date-top.php' ) ); ?>
        <?php if( ( $cta_biglietti === 'acquista biglietti' || $cta_biglietti === 'prenota' || $cta_biglietti === 'dona ora' ) && get_field('url_cta_biglietti') ) : ?>
          <a href="<?php the_field('url_cta_biglietti'); ?>" class="btn-fill red cta-4 allupper last dates-on-left hide-when-past" target="_blank" onClick="_gaq.push(['_trackEvent', 'tickets_top_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field('cta_biglietti'); ?></a>
        <?php elseif ( ( $cta_biglietti === 'iscriviti' ) && get_field('form_registrazione') ) : ?>
          <a href="#" class="btn-fill red cta-4 allupper last dates-on-left tickets-overlaty-opener hide-when-past" onClick="_gaq.push(['_trackEvent', 'tickets_top_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field('cta_biglietti'); ?></a>
        <?php elseif ( ( $cta_biglietti === 'gestito da ESRO' ) && !empty($events) ) : ?>
          <a href="#" class="btn-fill red cta-4 allupper last dates-on-left tickets-overlaty-opener hide-when-past" onClick="_gaq.push(['_trackEvent', 'tickets_top_button', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
-->




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
              <a href="/cartellone/<?php //echo $tipo_spettacolo_name; ?>"><?php echo $tipo_spettacolo_name; ?> <?php echo $stagione_name; ?></a>
            <?php elseif ( $tipo_spettacolo_slug === 'tournee' ) : ?>
              <a href="/tournee/"><?php //echo $tipo_spettacolo_name; ?>Tournée <?php echo $stagione_name; ?></a>
            <?php elseif ( $tipo_spettacolo_slug === 'distribuzione' ) : ?>
              <a href="/distribuzione/"><?php //echo $tipo_spettacolo_name; ?></a>
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
                <?php if( ( $cta_biglietti === 'acquista biglietti' || $cta_biglietti === 'prenota' || $cta_biglietti === 'dona ora' ) && get_field('url_cta_biglietti') ) : ?>
                  <a href="<?php the_field('url_cta_biglietti'); ?>" class="btn-fill red cta-4 allupper last dates-on-left hide-when-past" target="_blank" onClick="_gaq.push(['_trackEvent', 'tickets_top_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field('cta_biglietti'); ?></a>
                <?php elseif ( ( $cta_biglietti === 'iscriviti' ) && get_field('form_registrazione') ) : ?>
                  <a href="#" class="btn-fill red cta-4 allupper last dates-on-left tickets-overlaty-opener hide-when-past" onClick="_gaq.push(['_trackEvent', 'tickets_top_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field('cta_biglietti'); ?></a>
                <?php elseif ( ( $cta_biglietti === 'gestito da ESRO' ) && !empty($events) ) : ?>
                  <a href="#" class="btn-fill red cta-4 allupper last dates-on-left tickets-overlaty-opener hide-when-past" onClick="_gaq.push(['_trackEvent', 'tickets_top_button', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
                <?php elseif ( ( $cta_biglietti === 'Overlay link interni' ) ) : ?>
                  <a href="#" class="btn-fill red cta-4 allupper last hide-when-past tickets-overlaty-opener" onClick="_gaq.push(['_trackEvent', 'tickets_column_button', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
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
                <?php if ( $mostrare_date_spettacolo_figlio === 'si' ) : ?>
                  <div class="cta-1">
                    <a href="javascript:void(0);" class="expandable minus"><?php the_field('titolo_espansione_date_figlio'); ?></a>
                  </div>
                  <div class="expandable-content">
                    <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-child.php' ) ); ?>
                  </div>
                <?php endif; ?>
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
                  <?php if ( get_field( 'sidebar-info-e-biglietteria-custom' ) ) : ?>
                    <?php the_field( 'sidebar-info-e-biglietteria-custom' ); ?>
                  <?php else : ?>
                    <?php dynamic_sidebar( 'sidebar-info-e-biglietteria' ); ?>
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
        <div class="spettacolo-grid-new-right sticked-bis">
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
            <?php if( ( $cta_biglietti === 'acquista biglietti' || $cta_biglietti === 'prenota' || $cta_biglietti === 'dona ora' ) && get_field('url_cta_biglietti') ) : ?>
              <a href="<?php the_field('url_cta_biglietti'); ?>" class="btn-fill red cta-4 allupper last hide-when-past" target="_blank" onClick="_gaq.push(['_trackEvent', 'tickets_column_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field('cta_biglietti'); ?></a>
            <?php elseif ( ( $cta_biglietti === 'iscriviti' ) && get_field('form_registrazione') ) : ?>
              <a href="#" class="btn-fill red cta-4 allupper last hide-when-past tickets-overlaty-opener" onClick="_gaq.push(['_trackEvent', 'tickets_column_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field('cta_biglietti'); ?></a>
            <?php elseif ( ( $cta_biglietti === 'gestito da ESRO' ) && !empty($events) ) : ?>
              <a href="#" class="btn-fill red cta-4 allupper last hide-when-past tickets-overlaty-opener" onClick="_gaq.push(['_trackEvent', 'tickets_column_button', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
            <?php elseif ( ( $cta_biglietti === 'Overlay link interni' ) ) : ?>
              <a href="#" class="btn-fill red cta-4 allupper last hide-when-past tickets-overlaty-opener" onClick="_gaq.push(['_trackEvent', 'tickets_column_button', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
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
              <?php if ( $mostrare_date_spettacolo_figlio === 'si' ) : ?>
                <div class="cta-1">
                  <a href="javascript:void(0);" class="expandable minus"><?php echo $titolo_date_figlio; ?></a>
                </div>
                <div class="expandable-content">
                  <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-child.php' ) ); ?>
                </div>
              <?php endif; ?>
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
                <?php if ( get_field( 'sidebar-info-e-biglietteria-custom' ) ) : ?>
                  <?php the_field( 'sidebar-info-e-biglietteria-custom' ); ?>
                <?php else : ?>
                  <?php dynamic_sidebar( 'sidebar-info-e-biglietteria' ); ?>
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


<?php include( locate_template ( 'template-parts/content-modules/overlay-tickets.php' ) ); ?>
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
  if ( $spettacoli_correlati === 'choose-spettacoli' ) :
  $callme = get_field('contenuti_correlati');
  $args_choosen = array(
   'post_type' => 'spettacolo',
   'posts_per_page' => 4,
   'include' => $callme,
   'exclude' => $my_id
   );
  $my_choosen = get_posts( $args_choosen );
  if ( $my_choosen != null ) : ?>
  <div class="wrapper bg-7-color z-index-trick">
    <div class="wrapper-padded zero-title-padtop">
      <div class="zero-title txt-2-color">
        <?php the_field( 'ti_potrebbe_interessare', 'option'); ?>
      </div>
      <div class="def-grid">
          <?php
          foreach($my_choosen as $post) : setup_postdata($post);
          include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
          endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php elseif ( $spettacoli_correlati === 'choose-tag' ) :
    $scegli_target = get_field('scegli_target');
    $meta_query = array(
      array(
        'key' => 'program_final_periods_wp',
        'value' => date('Ymd'),
        'type' => 'DATE',
        'compare' => '>='
      )
    );
    $target_args = array(
     'post_type' => 'spettacolo',
     'posts_per_page' => 4,
     'tax_query' => array(
       array(
         'taxonomy' => 'target',
         'field' => 'term_taxonomy_id',
         'terms' => $scegli_target,
       )
     ),
     'exclude' => $my_id,
     'meta_key' => 'program_periods_wp',
     'orderby' => 'meta_value',
     'order' => 'ASC',
     'meta_query' => $meta_query
     );
    $my_target = get_posts( $target_args );
    if ( $my_target != null ) : ?>
      <div class="wrapper bg-7-color z-index-trick">
        <div class="wrapper-padded zero-title-padtop">
          <div class="zero-title txt-2-color">
            <?php the_field( 'ti_potrebbe_interessare', 'option'); ?>
          </div>
          <div class="def-grid">
            <?php
            foreach($my_target as $post) : setup_postdata($post);
            include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
          endforeach;
          ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>


<?php get_footer(); ?>
