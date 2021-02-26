<div class="modulo-sponsor">
  <div class="padder">
    <div class="cta-1">
      <?php the_sub_field('titoletto_modulo'); ?>
    </div>
    <div class="loghi">
      <?php if( have_rows('sponsor') ) : while ( have_rows('sponsor') ) : the_row();
      $logo_sponsor = get_sub_field('logo_sponsor');
        if ( $isMobile == 1 ) {
          $logo_sponsor_URL = $logo_sponsor['sizes']['grid_picture'];
        }
        if ( $isTablet == 1 ) {
          $logo_sponsor_URL = $logo_sponsor['sizes']['grid_picture'];
        }
        if ( $isDesktop == 1 ) {
          $logo_sponsor_URL = $logo_sponsor['sizes']['grid_picture'];
        }
      ?>
      <?php if( get_sub_field('url_sito_sponsor') ) : ?>
        <div class="logo">
          <a href="<?php the_sub_field('url_sito_sponsor'); ?>" target="_blank">
            <img class="lazy" data-original="<?php echo $logo_sponsor_URL; ?>" />
          </a>
          <div class="cta-2 pad-top-1">
            <?php the_sub_field('titolo_logo'); ?>
          </div>
        </div>
      <?php else : ?>
        <div class="logo">
          <img class="lazy" data-original="<?php echo $logo_sponsor_URL; ?>" />
          <div class="cta-2 pad-top-1">
            <?php the_sub_field('titolo_logo'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
