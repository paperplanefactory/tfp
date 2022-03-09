<?php
// setlocale
$today = date('Ymd');
$today = strtotime(str_replace("/", "-", $today));
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
$p_id =  $value['ID'];
$fields = get_fields($p_id);
$cycle = get_field('type_show', $p_id);
$data_custom_selector = get_field('data_custom_selector', $p_id);
$data_custom = get_field('data_custom', $p_id);
$my_permalink = get_permalink($p_id);
// attivare o disattivare chiamate a ESRO
$disattivare_chiamate_esro_pagina_cartellone = get_field('disattivare_chiamate_esro_pagina_cartellone', 'option');

set_transient('transient_fields', $fields, 1 * HOUR_IN_SECONDS);
$transient_fields = get_transient('transient_fields');
if (empty($transient_dates)) {
  $subtitle = $fields['subtitle'];
  $periodo = $fields['program_periods'];
  $abstract = $fields['abstract'];
  $date_rep = $fields['program_periods'];
} else {
  $subtitle = $transient_fields['subtitle'];
  $periodo = $transient_fields['program_periods'];
  $abstract = $transient_fields['abstract'];
  $date_rep = $transient_fields['program_periods'];
}
$img_id = $value['post_thumbnail'];
$area_attivita_id = $value['area_attivita_id'];
$area_attivita_name = $value['area_attivita_name'];
$area_attivita_slug = $value['area_attivita_slug'];
$percorso_id = $value['percorsi_id'];
$percorso_name = $value['percorsi_name'];
$percorso_slug = $value['percorsi_slug'];
if ($img_id != '') {
  if ($isMobile == 1) {
    $thumb_url = wp_get_attachment_image_src($img_id, 'grid_picture', true);
  }
  if ($isTablet == 1) {
    $thumb_url = wp_get_attachment_image_src($img_id, 'grid_picture', true);
  }
  if ($isDesktop == 1) {
    $thumb_url = wp_get_attachment_image_src($img_id, 'grid_picture', true);
  }
} else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $area_attivita_id . '-thumb.png';
}

$cta_biglietti = get_field('cta_biglietti', $p_id);
if ($cta_biglietti === 'acquista biglietti' || $cta_biglietti === 'prenota' || $cta_biglietti === 'acquista') {
  $url_cta_biglietti = get_field('url_cta_biglietti', $p_id);
}

if ($disattivare_chiamate_esro_pagina_cartellone == 1) {
  if (($posts = get_transient("esro_show_id" . $p_id)) === false) {
    $posts = get_post_meta($p_id, '_esrowp_showid', true);
    set_transient("esro_show_id" . $p_id, $posts, 1 * HOUR_IN_SECONDS);
  }
  $show_id_from_wp = $posts;
  //$transient_esro_show_id = get_post_meta($p_id, '_esrowp_showid', true );

  //$show_id_from_wp = get_post_meta($p_id, '_esrowp_showid', true );
  if (!empty($show_id_from_wp)) {
    if (($events_esro = get_transient("esro_show_events" . $p_id)) === false) {
      $events_esro = ESROWP_Helper::getEventsInfos($show_id_from_wp);
      set_transient("esro_show_events" . $p_id, $events_esro, 1 * HOUR_IN_SECONDS);
    }
    $events = $events_esro;

    if (($events_prices_esro = get_transient("esro_show_events_prices" . $p_id)) === false) {
      $events_prices_esro = ESROWP_Util::getPricesRange($events);
      set_transient("esro_show_events_prices" . $p_id, $events_prices_esro, 1 * HOUR_IN_SECONDS);
    }
    $prices = $events_prices_esro;

    if (($min_price = get_transient("esro_show_events_min_price" . $p_id)) === false) {
      $min_price = mb_substr($prices[0], 0, -3);
      set_transient("esro_show_events_min_price" . $p_id, $min_price, 1 * HOUR_IN_SECONDS);
    }
    $min_price = $min_price;


    //$events = ESROWP_Helper::getEventsInfos($show_id_from_wp);
    //$prices = ESROWP_Util::getPricesRange($events);
    if (isset($prices)) {
      if ($min_price == 0) {
        $prices_for_btn = 'prenota';
      } else {
        //$prices_for_btn = 'acquista <span class="allnone">da</span> '.$min_price.' €*';
        $prices_for_btn = 'acquista';
      }
    } else {
      $prices_for_btn = 'prenota';
    }
  }
}
?>
<div class="def-grid-module">
  <div class="cta-1">
    <a href="/cartellone/<?php echo $area_attivita_slug; ?>" class="li-<?php echo $area_attivita_id; ?>-id"><?php echo $area_attivita_name; ?></a>
  </div>
  <div class="image-box">
    <div class="cat-stripe bg-<?php echo $area_attivita_id; ?>-id"></div>
    <a href="<?php echo $my_permalink; ?>">
      <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" />
    </a>
  </div>
  <?php if ($percorso_id != '') : ?>
    <div class="cta-1">
      <!--
      <a href="javascript:filter_posts_button(to_input = <?php echo $percorso_id; ?>); javascript:show_percorsi_tax_info(to_percorso = <?php echo $percorso_id; ?>);"><?php echo $percorso_name; ?></a>
      -->
      <a href="/cartellone/<?php echo $percorso_slug; ?>"><?php echo $percorso_name; ?></a>
    </div>
  <?php endif; ?>
  <h4><a href="<?php echo $my_permalink; ?>"><?php echo $value['post_title']; ?></a></h4>
  <?php if ($subtitle != '') : ?>
    <h5><?php echo $subtitle; ?></h5>
  <?php endif; ?>
  <div class="cta-2 txt-5-color">
    <?php
    $repeater_first = get_field('program_periods', $p_id);
    $very_first_date = $repeater_first[0]['from'];
    $very_start_date = strtotime(str_replace("/", "-", $very_first_date));
    $very_start_date_month = date("m ", $very_start_date);
    $very_start_date_year = date("Y ", $very_start_date);
    $repeater_last = get_field('program_periods', $p_id);
    $last_row = end($repeater_last);
    $very_last_date = $last_row['to'];
    $very_end_date = strtotime(str_replace("/", "-", $very_last_date));
    $show_button_date = strtotime(str_replace("/", "-", $very_last_date));
    $very_end_date_month = date("m ", $very_end_date);
    $very_end_date_year = date("Y ", $very_end_date);
    ?>


    <?php if ($data_custom_selector === 'si' && $data_custom != '') : ?>
      <?php echo $data_custom; ?>
    <?php else : ?>
      <?php

      if ($very_first_date == $very_last_date) {
        echo $very_start_date = date_i18n("j F Y", $very_start_date);
      } else {
        if ($very_start_date_month === $very_end_date_month) {
          echo $very_start_date = date_i18n("j ", $very_start_date);
          if ($very_start_date_year != $very_end_date_year) {
            echo $very_start_date_year;
          }
        } else {
          echo $very_start_date = date_i18n("j F ", $very_start_date);
          if ($very_start_date_year != $very_end_date_year) {
            echo $very_start_date_year;
          }
        }
        if ($very_first_date != $very_last_date) {
          echo ' - ';
          echo $very_end_date = date_i18n("j F ", $very_end_date);
          echo $very_end_date_year;
        }
      }


      echo '<br />';
      ?>
    <?php endif; ?>
  </div>
  <?php if ($abstract != '') : ?>
    <div class="content-styled">
      <?php echo $abstract; ?>
    </div>
  <?php endif; ?>
  <br />
  <?php
  $filtered = array_filter($events);
 ?>
  <a href="<?php echo $my_permalink; ?>" class="btn-fill-hover grey cta-4 allupper last">Scopri di più</a>
  <?php if ($disattivare_chiamate_esro_pagina_cartellone == 1) : ?>
    <?php if ($show_button_date >= $today) : ?>
      <?php if ($cta_biglietti === 'acquista biglietti' || $cta_biglietti === 'acquista') : ?>
        <a href="<?php echo $url_cta_biglietti; ?>" target="_blank" class="btn-fill red cta-4 allupper last dates-on-left hide-when-past" onClick="_gaq.push(['_trackEvent', 'tickets_cartellone_listing_button_acquista', 'click', '<?php the_title(); ?>', '0']);">Acquista</a>
      <?php elseif ($cta_biglietti === 'prenota') : ?>
        <a href="<?php echo $url_cta_biglietti; ?>" class="btn-fill red cta-4 allupper last dates-on-left hide-when-past" data-post_id="<?php echo $p_id; ?>" onClick="_gaq.push(['_trackEvent', 'tickets_cartellone_listing_button_prenota', 'click', '<?php the_title(); ?>', '0']);">prenota</a>
      <?php elseif (($cta_biglietti === 'iscriviti')) : ?>
        <a href="#" class="btn-fill red cta-4 allupper last dates-on-left tickets-overlaty-opener-generic hide-when-past" data-post_id="<?php echo $p_id; ?>" onClick="_gaq.push(['_trackEvent', 'tickets_cartellone_listing_button_form_registrazione', 'click', '<?php the_title(); ?>', '0']);"><?php echo $cta_biglietti; ?></a>
      <?php elseif (($cta_biglietti === 'gestito da ESRO') && !empty($filtered)) : ?>
        <a href="#" class="btn-fill red cta-4 allupper last dates-on-left tickets-overlaty-opener-generic hide-when-past" data-post_id="<?php echo $p_id; ?>" onClick="_gaq.push(['_trackEvent', 'tickets_cartellone_listing_button_biglietteria_esro', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
      <?php elseif (($cta_biglietti === 'Overlay link interni')) : ?>
        <a href="#" class="btn-fill red cta-4 allupper dates-on-left last hide-when-past tickets-overlaty-opener-generic" data-post_id="<?php echo $p_id; ?>" onClick="_gaq.push(['_trackEvent', 'tickets_cartellone_listing_button_overlay_link_interni', 'click', '<?php the_title(); ?>', '0']);"><?php echo $prices_for_btn; ?></a>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>


  <?php /*if ( $disattivare_chiamate_esro_pagina_cartellone == 1 ) : ?>
    <?php if ($show_button_date >= $today) : ?>
      <?php if ( ( $cta_biglietti === 'gestito da ESRO' && isset( $events ) ) || ( $cta_biglietti === 'Overlay link interni' ) ) : ?>

      <?php endif; ?>
    <?php endif; ?>
  <?php endif;*/ ?>
</div>
