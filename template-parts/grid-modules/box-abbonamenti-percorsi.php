<?php
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
$current_activity = get_term_by('id', $term_activity, 'percorsi');
if ( $current_activity != '' ) {
}
else {
  $current_activity = get_term_by('id', $term_activity, 'abbonamenti');
}


$slug = $current_activity->slug;
$tax_image = get_field('immagine', 'percorsi' . '_' . $term_activity , true);
if ( $isMobile == 1 ) {
  $tax_image_URL = $tax_image['sizes']['content_picture'];
}
if ( $isTablet == 1 ) {
  $tax_image_URL = $tax_image['sizes']['content_picture'];
}
if ( $isDesktop == 1 ) {
  $tax_image_URL = $tax_image['sizes']['content_picture'];
}
$video = get_field('video', 'percorsi' . '_' . $term_activity , true);
?>



<div class="wrapper pad-top-3 pad-bottom-3">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid">
      <div class="fiftyfifty-grid-module-left">
        <h1><?php echo $current_activity->name; ?></h1>
      </div>
      <div class="fiftyfifty-grid-module-right">
        <?php if ( get_field('cta_1', 'percorsi' . '_' . $term_activity , false) ) : ?>
          <a href="<?php the_field('link_cta_1', 'percorsi' . '_' . $term_activity , false); ?>" target="_blank" class="btn-fill red cta-4 allupper"><?php the_field('cta_1', 'percorsi' . '_' . $term_activity , false); ?></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="wrapper-padded-more">




      <div class="spettacolo-grid-new">
        <div class="spettacolo-grid-new-top">

        </div>
        <div class="spettacolo-grid-new-left">
          <div class="spettacolo-grid-date-cta-mobile">

          </div>
          <div class="spettacolo-grid-date-avvisi-mobile">

          </div>
          <div class="contents">
            <div class="spettacolo-grid-share-desktop">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns-box.php' ) ); ?>
            </div>
            <?php if ( $tax_image != '' ) : ?>
              <div class="post-image">
                <img class="lazy" data-original="<?php echo $tax_image_URL; ?>" />
              </div>
            <?php endif; ?>


            <div class="content-styled pad-bottom-2">

                <?php if( have_rows('banner_logos', 'percorsi' . '_' . $term_activity , false) ) : ?>
                  <div class="loghi-percorso-cartellone">
                  <?php while ( have_rows('banner_logos', 'percorsi' . '_' . $term_activity , false) ) : the_row();
                $logo_sponsor = get_sub_field('logo_sponsor');
                  if ( $isMobile == 1 ) {
                    $logo_sponsor_URL = $logo_sponsor['sizes']['content_picture'];
                  }
                  if ( $isTablet == 1 ) {
                    $logo_sponsor_URL = $logo_sponsor['sizes']['full_tab'];
                  }
                  if ( $isDesktop == 1 ) {
                    $logo_sponsor_URL = $logo_sponsor['sizes']['full_tab'];
                  }
                ?>
                <?php if( get_sub_field('url_sito_sponsor') ) : ?>
                  <div class="logo-percorso-cartellone">
                    <a href="<?php the_sub_field('url_sito_sponsor'); ?>" target="_blank">
                      <img class="lazy" data-original="<?php echo $logo_sponsor_URL; ?>" />
                    </a>
                    <?php if (get_sub_field('titolo_logo')) : ?>
                      <div class="cta-2 pad-top-1">
                        <?php the_sub_field('titolo_logo'); ?>
                      </div>
                    <?php endif; ?>

                  </div>
                <?php else : ?>
                  <div class="logo-percorso-cartellone">
                    <img class="lazy" data-original="<?php echo $logo_sponsor_URL; ?>" />
                    <?php if (get_sub_field('titolo_logo')) : ?>
                      <div class="cta-2 pad-top-1">
                        <?php the_sub_field('titolo_logo'); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              <?php endwhile; ?>
              </div>
              <?php endif; ?>

              <?php echo wpautop( $current_activity->description ); ?>
              <?php if ( $video != '' ) : ?>
                <div class="video_frame">
                  <?php echo $video; ?>
                </div>
              <?php endif; ?>
            </div>

            <?php if ( get_field('cta_2', 'percorsi' . '_' . $term_activity , false) ) : ?>
              <a href="<?php the_field('link_cta_2', 'percorsi' . '_' . $term_activity , false); ?>" target="_blank" class="btn-fill-hover grey cta-4 allupper last"><?php the_field('cta_2', 'percorsi' . '_' . $term_activity , false); ?></a>
            <?php endif; ?>
            <div class="spettacolo-grid-widget-share-mobile">

            </div>
          </div>
        </div>
        <div class="spettacolo-grid-new-right">

        </div>
      </div>
    </div>
  </div>
</div>
<div class="set-end"></div>
<br /><br />














  <div class="wrapper pad-top-2 pad-bottom-1 border-bottom">
    <div class="wrapper-padded">
      <h4>Gli spettacoli di <?php echo $current_activity->name; ?></h4>
  </div>
  </div>
