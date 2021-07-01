<?php
global $todaystamp;
$inserire_cicli = get_sub_field('inserire_cicli');
if ( $inserire_cicli === 'si' ) : ?>
<div class="modulo-cicli">
<?php
$args = array(
	'post_parent' => get_the_ID(),
  'post_type' => array( 'spettacolo', 'spettacolo_archivio' ),
  'numberposts' => 1

);
$children = get_children( $args );
?>
<?php if ( !empty($children) ) : ?>
<?php
$count_periods = 0;
foreach($children as $post) : setup_postdata($post);
 ?>

<?php endforeach; ?>

<?php $type_show = get_field ('type_show'); ?>
<?php if ( $type_show === 'cyclic' ) : ?>
	<?php
	$count_periods = 0;
	if( have_rows('program_periods') ) : while ( have_rows('program_periods') ) : the_row();
	$count_periods ++;
	?>
	<div>
		<?php
		$count_date = 0;
		if( have_rows('dates') ) : while ( have_rows('dates') ) : the_row();
		$count_date ++;
		?>
			<?php
			$thumb = get_sub_field('thumb');
				if ( $isMobile == 1 ) {
					$thumb_URL = $thumb['sizes']['grid_picture'];
				}
				if ( $isTablet == 1 ) {
					$thumb_URL = $thumb['sizes']['grid_picture'];
				}
				if ( $isDesktop == 1 ) {
					$thumb_URL = $thumb['sizes']['grid_picture'];
				}
			$date_not_defined = get_sub_field('date_not_defined');
			$dateString = get_sub_field('date');
			$orario = get_sub_field('time');
			$orario_fine = get_sub_field('time_end');
			$timestamp = strtotime(str_replace("/", "-", $dateString));
			$timestamp = strtotime(str_replace("/", "-", $dateString));
			$a_date_string = date_i18n("l j F",$timestamp);
			//passato
			if ($todaystamp > $timestamp) : ?>
			<div class="modulo-contenuto-correlato inlist">
				<div class="magic-box bg-7-color">
					<div class="magic-box-content">
						<div class="magic-box-content-grid">
							<div class="magic-box-content-grid-left">
								<img class="lazy" data-original="<?php echo $thumb_URL; ?>" />
							</div>
							<div class="magic-box-content-grid-right">
								<div class="padder-cycle">
									<h5><?php the_sub_field('title'); ?></h5>
									<div class="cta-2 txt-5-color">
										<?php if ( $date_not_defined == 1 ) {
											echo 'Data da definire.';
										}
										else {
											echo $a_date_string;
											if ( $orario != '' ) {
												echo ' h ' . $orario;
											}
											if ( $orario_fine != '' ) {
												echo ' - ' . $orario_fine;
											}
										}
									?>
									</div>
									<?php if( get_sub_field('prezzo_listing_overlay') ) : ?>
										<div class="cta-2 txt-5-color">
											<?php the_sub_field('prezzo_listing_overlay'); ?>
										</div>
									<?php endif; ?>
									<?php if( get_sub_field('link_biglietteria_custom_overlay') ) : ?>
										<a href="<?php the_sub_field('link_biglietteria_custom_overlay'); ?>" target="_blank" class="btn-fill red cta-4 allupper last">Acquista</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php if( get_sub_field('text') ) : ?>
							<div class="approfondimento">
								<div class="cta-1">
									<a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
								</div>
								<div class="expandable-content expandable-hidden content-styled">
									<?php the_sub_field('text'); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
			//oggi
			elseif ($todaystamp == $timestamp) : ?>
			<div class="modulo-contenuto-correlato inlist">
				<div class="magic-box bg-<?php echo $activity_id; ?>-id">
					<div class="magic-box-content">
						<div class="magic-box-content-grid">
							<div class="magic-box-content-grid-left">
								<img class="lazy" data-original="<?php echo $thumb_URL; ?>" />
							</div>
							<div class="magic-box-content-grid-right">
								<div class="padder-cycle">
									<h5><?php the_sub_field('title'); ?></h5>
									<div class="cta-2 txt-5-color">
										<?php if ( $date_not_defined == 1 ) {
											echo 'Data da definire.';
										}
										else {
											echo $a_date_string;
											if ( $orario != '' ) {
												echo ' h ' . $orario;
											}
											if ( $orario_fine != '' ) {
												echo ' - ' . $orario_fine;
											}
										}
									?>
									</div>
									<?php if( get_sub_field('prezzo_listing_overlay') ) : ?>
										<div class="cta-2 txt-5-color">
											<?php the_sub_field('prezzo_listing_overlay'); ?>
										</div>
									<?php endif; ?>
									<?php if( get_sub_field('link_biglietteria_custom_overlay') ) : ?>
										<a href="<?php the_sub_field('link_biglietteria_custom_overlay'); ?>" target="_blank" class="btn-fill red cta-4 allupper last">Acquista</a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php if( get_sub_field('text') ) : ?>
							<div class="approfondimento">
								<?php if ( $count_periods == 1 ) : ?>
									<div class="cta-1">
										<a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
									</div>
									<div class="expandable-content expandable-hidden content-styled">
										<?php the_sub_field('text'); ?>
									</div>
								<?php else : ?>
									<div class="cta-1">
										<a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
									</div>
									<div class="expandable-content expandable-hidden content-styled">
										<?php the_sub_field('text'); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
			//futuro
			elseif ($todaystamp < $timestamp) : ?>
				<div class="modulo-contenuto-correlato inlist">
					<div class="magic-box bg-<?php echo $activity_id; ?>-id-60">
						<div class="magic-box-content">
							<div class="magic-box-content-grid">
								<div class="magic-box-content-grid-left">
									<img class="lazy" data-original="<?php echo $thumb_URL; ?>" />
								</div>
								<div class="magic-box-content-grid-right">
									<div class="padder-cycle">
										<h5><?php the_sub_field('title'); ?></h5>
										<div class="cta-2 txt-5-color">
											<?php if ( $date_not_defined == 1 ) {
												echo 'Data da definire.';
											}
											else {
												echo $a_date_string;
												if ( $orario != '' ) {
													echo ' h ' . $orario;
												}
												if ( $orario_fine != '' ) {
													echo ' - ' . $orario_fine;
												}
											}
										?>
										</div>
										<?php if( get_sub_field('prezzo_listing_overlay') ) : ?>
											<div class="cta-2 txt-5-color">
												<?php the_sub_field('prezzo_listing_overlay'); ?>
											</div>
                    <?php endif; ?>
										<?php if( get_sub_field('link_biglietteria_custom_overlay') ) : ?>
											<a href="<?php the_sub_field('link_biglietteria_custom_overlay'); ?>" target="_blank" class="btn-fill red cta-4 allupper last">Acquista</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php if( get_sub_field('text') ) : ?>
								<div class="approfondimento">
									<?php if ( $count_periods == 1 ) : ?>
										<div class="cta-1">
											<a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
										</div>
										<div class="expandable-content expandable-hidden content-styled">
											<?php the_sub_field('text'); ?>
										</div>
									<?php else : ?>
										<div class="cta-1">
											<a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
										</div>
										<div class="expandable-content expandable-hidden content-styled">
											<?php the_sub_field('text'); ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>



		<?php endwhile; endif; ?>
		<?php if ( $count_periods > 1 ) : ?>

		<?php endif ?>
	</div>

	<?php endwhile; endif; ?>
	<?php
	if ($count_date == 0) {
		dynamic_sidebar( 'sidebar-spettacolo-finito' );
	}
	?>

<?php endif; wp_reset_query(); ?>
<?php else : ?>
	<?php $type_show = get_field ('type_show'); ?>
  <?php if ( $type_show === 'cyclic' ) : ?>
    <?php
    $count_periods = 0;
    if( have_rows('program_periods') ) : while ( have_rows('program_periods') ) : the_row();
    $count_periods ++;
    ?>
    <div>
      <?php
      $count_date = 0;
      if( have_rows('dates') ) : while ( have_rows('dates') ) : the_row();
      $count_date ++;
      ?>
        <?php
        $thumb = get_sub_field('thumb');
          if ( $isMobile == 1 ) {
            $thumb_URL = $thumb['sizes']['grid_picture'];
          }
          if ( $isTablet == 1 ) {
            $thumb_URL = $thumb['sizes']['grid_picture'];
          }
          if ( $isDesktop == 1 ) {
            $thumb_URL = $thumb['sizes']['grid_picture'];
          }
				$date_not_defined = get_sub_field('date_not_defined');
        $dateString = get_sub_field('date');
        $orario = get_sub_field('time');
				$orario_fine = get_sub_field('time_end');
        $timestamp = strtotime(str_replace("/", "-", $dateString));
        $timestamp = strtotime(str_replace("/", "-", $dateString));
        $a_date_string = date_i18n("l j F",$timestamp);
        //passato
        if ($todaystamp > $timestamp) : ?>
        <div class="modulo-contenuto-correlato inlist">
          <div class="magic-box bg-7-color">
            <div class="magic-box-content">
              <div class="magic-box-content-grid">
                <div class="magic-box-content-grid-left">
                  <img class="lazy" data-original="<?php echo $thumb_URL; ?>" />
                </div>
                <div class="magic-box-content-grid-right">
                  <div class="padder-cycle">
                    <h5><?php the_sub_field('title'); ?></h5>
                    <div class="cta-2 txt-5-color">
											<?php if ( $date_not_defined == 1 ) {
												echo 'Data da definire.';
											}
											else {
												echo $a_date_string;
												if ( $orario != '' ) {
													echo ' h ' . $orario;
												}
												if ( $orario_fine != '' ) {
													echo ' - ' . $orario_fine;
												}
											}
										?>
                    </div>
										<?php if( get_sub_field('prezzo_listing_overlay') ) : ?>
											<div class="cta-2 txt-5-color">
												<?php the_sub_field('prezzo_listing_overlay'); ?>
											</div>
                    <?php endif; ?>
                    <?php if( get_sub_field('link_biglietteria_custom_overlay') ) : ?>
                      <a href="<?php the_sub_field('link_biglietteria_custom_overlay'); ?>" target="_blank" class="btn-fill red cta-4 allupper last">Acquista</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php if( get_sub_field('text') ) : ?>
                <div class="approfondimento">
                  <div class="cta-1">
                    <a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
                  </div>
                  <div class="expandable-content expandable-hidden content-styled">
                    <?php the_sub_field('text'); ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php
        //oggi
        elseif ($todaystamp == $timestamp) : ?>
        <div class="modulo-contenuto-correlato inlist">
          <div class="magic-box bg-<?php echo $activity_id; ?>-id">
            <div class="magic-box-content">
              <div class="magic-box-content-grid">
                <div class="magic-box-content-grid-left">
                  <img class="lazy" data-original="<?php echo $thumb_URL; ?>" />
                </div>
                <div class="magic-box-content-grid-right">
                  <div class="padder-cycle">
                    <h5><?php the_sub_field('title'); ?></h5>
                    <div class="cta-2 txt-5-color">
											<?php if ( $date_not_defined == 1 ) {
												echo 'Data da definire.';
											}
											else {
												echo $a_date_string;
												if ( $orario != '' ) {
													echo ' h ' . $orario;
												}
												if ( $orario_fine != '' ) {
													echo ' - ' . $orario_fine;
												}
											}
										?>
                    </div>
										<?php if( get_sub_field('prezzo_listing_overlay') ) : ?>
											<div class="cta-2 txt-5-color">
												<?php the_sub_field('prezzo_listing_overlay'); ?>
											</div>
                    <?php endif; ?>
                    <?php if( get_sub_field('link_biglietteria_custom_overlay') ) : ?>
                      <a href="<?php the_sub_field('link_biglietteria_custom_overlay'); ?>" target="_blank" class="btn-fill red cta-4 allupper last">Acquista</a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php if( get_sub_field('text') ) : ?>
                <div class="approfondimento">
                  <?php if ( $count_periods == 1 ) : ?>
                    <div class="cta-1">
                      <a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
                    </div>
                    <div class="expandable-content expandable-hidden content-styled">
                      <?php the_sub_field('text'); ?>
                    </div>
                  <?php else : ?>
                    <div class="cta-1">
                      <a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
                    </div>
                    <div class="expandable-content expandable-hidden content-styled">
                      <?php the_sub_field('text'); ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php
        //futuro
        elseif ($todaystamp < $timestamp) : ?>
          <div class="modulo-contenuto-correlato inlist">
            <div class="magic-box bg-<?php echo $activity_id; ?>-id-60">
              <div class="magic-box-content">
                <div class="magic-box-content-grid">
                  <div class="magic-box-content-grid-left">
                    <img class="lazy" data-original="<?php echo $thumb_URL; ?>" />
                  </div>
                  <div class="magic-box-content-grid-right">
                    <div class="padder-cycle">
                      <h5><?php the_sub_field('title'); ?></h5>
                      <div class="cta-2 txt-5-color">
												<?php if ( $date_not_defined == 1 ) {
													echo 'Data da definire.';
												}
												else {
													echo $a_date_string;
													if ( $orario != '' ) {
														echo ' h ' . $orario;
													}
													if ( $orario_fine != '' ) {
														echo ' - ' . $orario_fine;
													}
												}
											?>
                      </div>
											<?php if( get_sub_field('prezzo_listing_overlay') ) : ?>
												<div class="cta-2 txt-5-color">
													<?php the_sub_field('prezzo_listing_overlay'); ?>
												</div>
	                    <?php endif; ?>
                      <?php if( get_sub_field('link_biglietteria_custom_overlay') ) : ?>
                        <a href="<?php the_sub_field('link_biglietteria_custom_overlay'); ?>" target="_blank" class="btn-fill red cta-4 allupper last">Acquista</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php if( get_sub_field('text') ) : ?>
                  <div class="approfondimento">
                    <?php if ( $count_periods == 1 ) : ?>
                      <div class="cta-1">
                        <a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
                      </div>
                      <div class="expandable-content expandable-hidden content-styled">
                        <?php the_sub_field('text'); ?>
                      </div>
                    <?php else : ?>
                      <div class="cta-1">
                        <a href="javascript:void(0);" class="expandable expandable plus">Approfondisci</a>
                      </div>
                      <div class="expandable-content expandable-hidden content-styled">
                        <?php the_sub_field('text'); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>



      <?php endwhile; endif; ?>
      <?php if ( $count_periods > 1 ) : ?>

      <?php endif ?>
    </div>

    <?php endwhile; endif; ?>
    <?php
    if ($count_date == 0) {
      dynamic_sidebar( 'sidebar-spettacolo-finito' );
    }
    ?>

  <?php endif; ?>
<?php endif; ?>
</div>
<?php endif; ?>
