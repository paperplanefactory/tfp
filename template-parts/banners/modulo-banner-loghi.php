<?php
  $specttacolo_id = get_the_ID();
  $args_banner = array(
     'post_type' => 'banner_loghi',
     'posts_per_page' => 1,
     'meta_query'    => array(
       array(
         'key' => 'banner_spettacolo',
         'value'     => '"' . $specttacolo_id . '"',
         'compare'   => 'LIKE',
       ),
     )
   );
    $my_banners = get_posts( $args_banner );
    if ( !empty ( $my_banners ) ) : ?>
    <?php
    foreach($my_banners as $post) : setup_postdata($post);
    ?>
    <div class="modulo-sponsor">
      <div class="padder">
        <?php if ( get_field( 'banner_logos_titoletto_modulo' ) ) : ?>
          <div class="cta-2">
            <p>
              <?php the_field('banner_logos_titoletto_modulo'); ?>
            </p>
          </div>
        <?php endif; ?>

        <div class="loghi">
          <?php if( have_rows('banner_logos') ) : while ( have_rows('banner_logos') ) : the_row();
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
            <div class="logo-grande">
              <a href="<?php the_sub_field('url_sito_sponsor'); ?>" target="_blank">
                <img class="lazy" data-original="<?php echo $logo_sponsor_URL; ?>" />
              </a>
              <?php if( get_sub_field('titolo_logo') ) : ?>
                <div class="cta-2 pad-top-1">
                  <?php the_sub_field('titolo_logo'); ?>
                </div>
              <?php endif; ?>
            </div>
          <?php else : ?>
            <div class="logo-grande">
              <img class="lazy" data-original="<?php echo $logo_sponsor_URL; ?>" />
              <?php if( get_sub_field('titolo_logo') ) : ?>
                <div class="cta-2 pad-top-1">
                  <?php the_sub_field('titolo_logo'); ?>
                </div>
              <?php endif; ?>

            </div>
          <?php endif; ?>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; wp_reset_query(); ?>
<?php endif; ?>
