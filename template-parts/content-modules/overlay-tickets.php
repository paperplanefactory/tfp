<div id="tickets-overlay" class="overlay-for-tickets bg-2-color">
	<div class="tickets-overlay-close">
		<a href="#" class="btn-fill-hover grey cta-4 allupper tickets-overlaty-closer">
			X Chiudi
		</a>
	</div>

	<div class="scroll-opportunity scroll-opportunity-tickets">
		<div class="scroll-opportunity-back">
			<?php if( get_field('avviso_spettacolo') || get_field('avviso_spettacolo_overlay_globale', 'option' ) ) : ?>
				<div class="wrapper bg-7-color">
					<div class="wrapper-padded">
						<div class="wrapper-padded-more-content">
							<div class="overlay-message-padding cta-2 txt-5-color">
								<?php the_field('avviso_spettacolo_overlay_globale', 'option'); ?>
								<?php the_field('avviso_spettacolo'); ?>
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
								<div class="contents overlay-contents">
									<div class="overlay-effect overlay-effect-initial">
										<div class="wrapper">
											<div class="wrapper-padded">
												<div class="wrapper-padded-more-content">
													<div class="overlay-lisiting-padding">
														<div class="flex-hold flex-hold-2">
															<div class="flex-hold-child">
																<div class="post-image">
																	<img src="<?php echo $thumb_url_overlay[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
																</div>
															</div>
															<div class="flex-hold-child">
																<div class="overlay-title-padding">
																	<h2><?php the_title(); ?></h2>
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
																if ( get_field('form_registrazione') ) {
																	echo do_shortcode( get_field('form_registrazione') );
																}
																?>
															<?php elseif ( $cta_biglietti === 'Overlay link interni' ) : ?>
																<?php
																$args = array(
																	'post_parent' => get_the_ID(),
																  'post_type' => array( 'spettacolo', 'spettacolo_archivio' ),
																  'numberposts' => 1

																);
																$children = get_children( $args );
																if ( !empty($children) ) {
																	$count_periods = 0;
																	foreach($children as $post) : setup_postdata($post);
																	endforeach;
																}
																if( have_rows('program_periods') ) : while ( have_rows('program_periods') ) : the_row();
																if( have_rows('dates') ) : while ( have_rows('dates') ) : the_row();
																$dateString = get_sub_field('date');
													      $orario = get_sub_field('time');
													      $orario_fine = get_sub_field('time_end');
													      $timestamp = strtotime(str_replace("/", "-", $dateString));
													      $a_date_string = date_i18n("l j F",$timestamp);
																if ( $todaystamp <= $timestamp ) :
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
																			 <a href="<?php the_sub_field( 'link_biglietteria_custom_overlay' ); ?>" class="btn-fill red cta-4 allupper" target="_self" onClick="_gaq.push(['_trackEvent', 'tickets_overlay_button', 'click', '<?php the_title(); ?>', '0']);">
																				 <?php if ( get_sub_field( 'prezzo_listing_overlay' ) ) : ?>
																					 <?php the_sub_field( 'prezzo_listing_overlay' ); ?>
																				 <?php else : ?>
																					 Acquista
																				 <?php endif; ?>
																			 </a>
																		 <?php endif; ?>
																	 </div>
																 </div>
															 <?php endif; ?>

																<?php endwhile; endif; endwhile; endif; ?>
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
																			<a href="<?php echo $event["DirectLink"] ?>" class="btn-fill red cta-4 allupper" target="_self" onClick="_gaq.push(['_trackEvent', 'tickets_overlay_button', 'click', '<?php the_title(); ?>', '0']);">
																				<?php
																				$pricesSingleEnvet = array( $event ); // finto array con un solo evento
																		    $pricesSingleEnvet = ESROWP_Util::getPricesRange( $pricesSingleEnvet );
																				$pricesSingleEnvet = mb_substr($pricesSingleEnvet[0], 0, -3);
																				if ( isset( $pricesSingleEnvet ) ) {
																					if ( $pricesSingleEnvet == 0 ) {
																				    echo 'prenota';
																				  }
																					else {
																						if ( $pricesSingleEnvet > 998 ) {
																							echo '<span class="allnone">ACQUISTA';
																						}
																						else {
																							echo '<span class="allnone">da</span> '.$pricesSingleEnvet.' €*';
																						}

																					}


																				}
																				else {
																					echo 'prenota';
																				}
																				 ?>
																			</a>
																		</div>
																	</div>
																<?php endif; ?> <?php endforeach; ?>
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
									<a href="#" class="btn-fill-hover grey cta-4 allupper tickets-overlaty-closer">
										X Chiudi
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
