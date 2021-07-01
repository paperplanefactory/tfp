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
$data_custom = get_field('data_custom', $p_id);
$my_permalink = get_permalink($p_id);

set_transient( 'transient_fields', $fields, MINUTE_IN_SECONDS / 60 );
$transient_fields = get_transient( 'transient_fields' );
if ( empty( $transient_dates ) ) {
  $subtitle = $fields['subtitle'];
  $periodo = $fields['program_periods'];
  $abstract = $fields['abstract'];
  $date_rep = $fields['program_periods'];
}
else {
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
if ( $img_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($img_id,'grid_picture', true);
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($img_id,'grid_picture', true);
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($img_id,'grid_picture', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $area_attivita_id . '-thumb.png';
}

$cta_biglietti = get_field( 'cta_biglietti', $p_id  );
if( $cta_biglietti === 'acquista biglietti' ) {
  $url_cta_biglietti = get_field( 'url_cta_biglietti', $p_id  );
}

$showsdafsdf = get_post_meta($p_id, '_esrowp_showid', true );



if ( !empty($showsdafsdf) ) {
  $events = ESROWP_Helper::getEventsInfos($showsdafsdf);
  $prices = ESROWP_Util::getPricesRange($events);
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
    $prices_for_btn = 'prenota';
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
  <?php if ( $percorso_id != '' ) : ?>
    <div class="cta-1">
      <!--
      <a href="javascript:filter_posts_button(to_input = <?php echo $percorso_id; ?>); javascript:show_percorsi_tax_info(to_percorso = <?php echo $percorso_id; ?>);"><?php echo $percorso_name; ?></a>
      -->
      <a href="/cartellone/<?php echo $percorso_slug; ?>"><?php echo $percorso_name; ?></a>
    </div>
  <?php endif; ?>
  <h4><a href="<?php echo $my_permalink; ?>"><?php echo $value['post_title']; ?></a></h4>
  <?php if ( $subtitle != '' ) : ?>
    <h5><?php echo $subtitle; ?></h5>
  <?php endif; ?>
  <div class="cta-2 txt-5-color">
    <?php
    $repeater_first = get_field('program_periods', $p_id);
    $very_first_date = $repeater_first[0]['from'];
    $very_start_date = strtotime(str_replace("/", "-", $very_first_date));
    $very_start_date_month = date("m ",$very_start_date);
    $very_start_date_year = date("Y ",$very_start_date);
    $repeater_last = get_field('program_periods', $p_id);
    $last_row = end($repeater_last);
    $very_last_date = $last_row['to'];
    $very_end_date = strtotime(str_replace("/", "-", $very_last_date));
    $show_button_date = strtotime(str_replace("/", "-", $very_last_date));
    $very_end_date_month = date("m ",$very_end_date);
    $very_end_date_year = date("Y ",$very_end_date);
     ?>


    <?php if ( $data_custom != '' ) : ?>
      <?php echo $data_custom; ?>
    <?php else : ?>
      <?php

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


      echo '<br />';
      ?>
    <?php endif; ?>
  </div>
  <?php if ( $abstract != '') : ?>
    <div class="content-styled">
      <?php echo $abstract; ?>
    </div>
  <?php endif; ?>

  <?php if ($show_button_date >= $today) : ?>
    <?php if ( ( $cta_biglietti === 'gestito da ESRO' && isset( $events ) ) || ( $cta_biglietti === 'Overlay link interni' ) ) : ?>
      <a href="#" class="listing-tickets-buy-b allupper hide-when-past tickets-overlaty-opener-<?php echo $p_id; ?>"><?php echo $prices_for_btn; ?></a>
      <script type="text/javascript">
      $('.tickets-overlaty-opener-<?php echo $p_id; ?>').click(function(e) {
        $('#tickets-overlay-<?php echo $p_id; ?>').fadeIn(150, "linear");
        $('.overlay-effect').delay(300).removeClass('overlay-effect-initial');
        $('html').css('overflowY', 'hidden');
        $('body').addClass('occupy-scrollbar');
        e.preventDefault();
      });

      $('.tickets-overlaty-closer-<?php echo $p_id; ?>').click(function(e) {
        $('#tickets-overlay-<?php echo $p_id; ?>').delay(300).fadeOut(150, "linear");
        $('.overlay-effect').addClass('overlay-effect-initial');
        $('.scroll-opportunity').scrollTop(0);
        $('html').css('overflowY', 'scroll');
        $('body').removeClass('occupy-scrollbar');
        e.preventDefault();
      });
      </script>
    <?php elseif( $cta_biglietti === 'acquista biglietti' ) : ?>
      <a href="<?php echo $url_cta_biglietti; ?>" target="_blank" class="listing-tickets-buy-b allupper hide-when-past">Acquista</a>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($show_button_date >= $today) : ?>
    <?php if ( ( $cta_biglietti === 'gestito da ESRO' && isset( $events ) ) || ( $cta_biglietti === 'Overlay link interni' ) ) : ?>
      <div id="tickets-overlay-<?php echo $p_id; ?>" class="overlay-for-tickets opened bg-2-color">
      	<div class="tickets-overlay-close">
      		<a href="#" class="btn-fill-hover grey cta-4 allupper tickets-overlaty-closer-<?php echo $p_id; ?>">
      			Indietro
      		</a>
      	</div>

      	<div class="scroll-opportunity scroll-opportunity-tickets">
      		<div class="scroll-opportunity-back">
      			<?php if( get_field('avviso_spettacolo', $p_id) ) : ?>
      				<div class="wrapper bg-7-color">
      					<div class="wrapper-padded">
      						<div class="wrapper-padded-more-content">
      							<div class="overlay-message-padding cta-2 txt-5-color">
      								<?php the_field('avviso_spettacolo', $p_id); ?>
      							</div>
      						</div>
      					</div>
      				</div>
      			<?php endif; ?>

      			<div class="wrapper">
      				<div class="wrapper-padded">
      					<div class="wrapper-padded-more-spettacolo">
      						<div class="spettacolo-grid-new">
      							<div class="spettacolo-grid-new-left">
      								<div class="contents">
      									<div class="overlay-effect overlay-effect-initial">
      										<div class="wrapper">
      											<div class="wrapper-padded">
      												<div class="wrapper-padded-more-content">
      													<div class="overlay-lisiting-padding">
      														<div class="flex-hold flex-hold-2">
      															<div class="flex-hold-child">
      																<div class="post-image">
      																	<img src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
      																</div>
      															</div>
      															<div class="flex-hold-child">
      																<div class="overlay-title-padding">
      																	<h2><?php echo $value['post_title']; ?></h2>
      																	<h5><?php include( locate_template ( 'template-parts/date-modules/riepilogo-date-top.php' ) ); ?></h5>
      																</div>
      															</div>
      															<div class="tariffe-info">
      																<?php if ( $cta_biglietti === 'gestito da ESRO' && isset( $events ) ) : ?>
      																	<div class="cta-2 txt-5-color">
      																		*tariffa intera prima di riduzioni
      																	</div>
      																<?php endif; ?>
      															</div>
      														</div>

      														<div class="overlay-events-list">
      															<?php if ( $cta_biglietti === 'iscriviti' ) : ?>
      																<?php
      																if ( get_field('form_registrazione', $p_id) ) {
      																	echo do_shortcode( get_field('form_registrazione') );
      																}
      																?>
      															<?php elseif ( $cta_biglietti === 'Overlay link interni' ) : ?>
      																<?php
                                      $args = array(
      																	'post_parent' => $p_id,
      																  'post_type' => array( 'spettacolo', 'spettacolo_archivio' ),
      																  'numberposts' => 1

      																);
      																$children = get_children( $args );
      																if ( !empty($children) ) : $count_periods = 0;?>

      																	<?php foreach($children as $post) : setup_postdata($post); $child_id = $post->ID; ?>

                                          <?php if( have_rows('program_periods', $child_id) ) : while ( have_rows('program_periods', $child_id) ) : the_row();
          																if( have_rows('dates', $child_id) ) : while ( have_rows('dates', $child_id) ) : the_row();
          																$dateString = get_sub_field('date');
          													      $orario = get_sub_field('time');
          													      $orario_fine = get_sub_field('time_end');
          													      $timestamp = strtotime(str_replace("/", "-", $dateString));
          													      $a_date_string = date_i18n("l j F",$timestamp);
          																 ?>
          																	<div class="flex-hold overlay-event-details">
          																		<div class="detail">
                                                <?php if ( !empty($children) ) : ?>
                                                  <h4><?php the_title(); ?></h4>
                                                <?php else : ?>
                                                  <h4><?php the_sub_field('title'); ?></h4>
                                                <?php endif; ?>
          																			<h5><?php echo $a_date_string; ?></h5>
          																		</div>
          																		<div class="detail txt-5-color">
          																			<?php if ( $orario != '' ) : ?>
          																				<p>h <?php echo $orario; ?></p>
          																			<?php endif; ?>
          																		</div>
          																		<div class="detail">
          																			<?php if ( get_sub_field( 'link_biglietteria_custom_overlay' ) ) : ?>
          																				<a href="<?php the_sub_field( 'link_biglietteria_custom_overlay' ); ?>" class="btn-fill red cta-4 allupper" target="_blank" onClick="_gaq.push(['_trackEvent', 'tickets_overlay_button', 'click', '<?php the_title(); ?>', '0']);">
          																					<?php if ( get_sub_field( 'prezzo_listing_overlay' ) ) : ?>
          																						<?php the_sub_field( 'prezzo_listing_overlay' ); ?>
          																					<?php else : ?>
          																						Acquista
          																					<?php endif; ?>
          																				</a>
          																			<?php endif; ?>
          																		</div>
          																	</div>
          																<?php endwhile; endif; endwhile; endif; ?>
                                        <?php endforeach; ?>
      																<?php else : ?>
                                        <h1>asdf</h1>
      																<?php if( have_rows('program_periods', $p_id) ) : while ( have_rows('program_periods', $p_id) ) : the_row();
      																if( have_rows('dates', $p_id) ) : while ( have_rows('dates', $p_id) ) : the_row();
      																$dateString = get_sub_field('date');
      													      $orario = get_sub_field('time');
      													      $orario_fine = get_sub_field('time_end');
      													      $timestamp = strtotime(str_replace("/", "-", $dateString));
      													      $a_date_string = date_i18n("l j F",$timestamp);
      																 ?>
      																	<div class="flex-hold overlay-event-details">
      																		<div class="detail">
      																				<h4><?php the_title(); ?></h4>
      																				<h4><?php the_sub_field('title'); ?></h4>
      																			<h5><?php echo $a_date_string; ?></h5>
      																		</div>
      																		<div class="detail txt-5-color">
      																			<?php if ( $orario != '' ) : ?>
      																				<p>h <?php echo $orario; ?></p>
      																			<?php endif; ?>
      																		</div>
      																		<div class="detail">
      																			<?php if ( get_sub_field( 'link_biglietteria_custom_overlay' ) ) : ?>
      																				<a href="<?php the_sub_field( 'link_biglietteria_custom_overlay' ); ?>" class="btn-fill red cta-4 allupper" target="_blank" onClick="_gaq.push(['_trackEvent', 'tickets_overlay_button', 'click', '<?php the_title(); ?>', '0']);">
      																					<?php if ( get_sub_field( 'prezzo_listing_overlay' ) ) : ?>
      																						<?php the_sub_field( 'prezzo_listing_overlay' ); ?>
      																					<?php else : ?>
      																						Acquista
      																					<?php endif; ?>
      																				</a>
      																			<?php endif; ?>
      																		</div>
      																	</div>
      																<?php endwhile; endif; endwhile; endif; ?>
                                      <?php endif; ?>
      															<?php elseif ( $cta_biglietti === 'gestito da ESRO' && isset( $events ) ) : ?>
      																<?php foreach ($events as $eventId => $event) :
      																	$comparsion = strtotime($event["ActualEventDate"]);
                                        $today_sro = strtotime(date('Y-m-dH:i'));
      																	$fendere = $event["ActualEventDate"];
      																	$timestamp = strtotime(str_replace("/", "-", $fendere));
      																	$a_date_string = date_i18n("l j F Y",$timestamp);
      																	$hour_string = date_i18n("H:i",$timestamp);
      																	if ( $comparsion > $today_sro ) :
      																	?>
      																	<div class="flex-hold overlay-event-details">
      																		<div class="detail">
      																			<h5><?php echo $a_date_string ?></h5>
      																		</div>
      																		<div class="detail txt-5-color">
      																			<p>h <?php echo $hour_string; ?></p>
      																		</div>
      																		<div class="detail">
      																			<a href="<?php echo $event["DirectLink"] ?>" class="btn-fill red cta-4 allupper" target="_blank" onClick="_gaq.push(['_trackEvent', 'tickets_overlay_button', 'click', '<?php the_title(); ?>', '0']);">
      																				<?php
      																				$pricesSingleEnvet = array( $event ); // finto array con un solo evento
      																		    $pricesSingleEnvet = ESROWP_Util::getPricesRange( $pricesSingleEnvet );
      																				$pricesSingleEnvet = mb_substr($pricesSingleEnvet[0], 0, -3);
      																				if ( isset( $pricesSingleEnvet ) ) {
      																					if ( $pricesSingleEnvet == 0 ) {
      																				    echo 'prenota';
      																				  }
      																					else {
      																						echo '<span class="allnone">da</span> '.$pricesSingleEnvet.' €*';
      																					}


      																				}
      																				else {
      																					echo 'prenota';
      																				}
      																				 ?>
      																			</a>
      																		</div>
      																	</div>
      																<?php endif; endforeach; ?>
      															<?php endif; ?>


      														</div>
      													</div>
      												</div>
      											</div>
      										</div>
      									</div>
      								</div>

      							</div>
      							<div class="spettacolo-grid-new-right sticked">
      								<div class="overlay-lisiting-padding">
      									<a href="#" class="btn-fill-hover grey cta-4 allupper tickets-overlaty-closer-<?php echo $p_id; ?>">
      										Indietro
      									</a>
      								</div>
      							</div>
      						</div>
      					</div>
      				</div>
      		 	</div>
      		</div>
      	</div>
      </div>
    <?php endif; ?>
  <?php endif; ?>







</div>
