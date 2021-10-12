<?php
  $args_banner_home = array(
     'post_type' => 'banner_home',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-1',
       )
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);

    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $banner_home_mostrare_su_mobile = get_field( 'banner_home_mostrare_su_mobile' );
    if ( $banner_home_mostrare_su_mobile === 'no' ) {
      $only_mobile_class = 'only-desktop';
    }
    else {
      $only_mobile_class = 'all';
    }
    ?>
    <div class="banner-home-mobile-ww <?php echo $only_mobile_class; ?>">
      <div class="banner-img">
        <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
          <img src="<?php echo $immagine_banner['url']; ?>" />
        </a>
      </div>
    </div>

    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_banner_home = array(
     'post_type' => 'banner_home',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-2',
       )
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $banner_home_mostrare_su_mobile = get_field( 'banner_home_mostrare_su_mobile' );
    if ( $banner_home_mostrare_su_mobile === 'no' ) {
      $only_mobile_class = 'only-desktop';
    }
    else {
      $only_mobile_class = 'all';
    }
    ?>
    <div class="banner-home-mobile-ww <?php echo $only_mobile_class; ?>">
      <div class="banner-img">
        <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
          <img src="<?php echo $immagine_banner['url']; ?>" />
        </a>
      </div>
    </div>

    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_banner_home = array(
     'post_type' => 'banner_home',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-3',
       )
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $banner_home_mostrare_su_mobile = get_field( 'banner_home_mostrare_su_mobile' );
    if ( $banner_home_mostrare_su_mobile === 'no' ) {
      $only_mobile_class = 'only-desktop';
    }
    else {
      $only_mobile_class = 'all';
    }
    ?>
    <div class="banner-home-mobile-ww <?php echo $only_mobile_class; ?>">
      <div class="banner-img">
        <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
          <img src="<?php echo $immagine_banner['url']; ?>" />
        </a>
      </div>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_banner_home = array(
     'post_type' => 'banner_home',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-4',
       )
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $banner_home_mostrare_su_mobile = get_field( 'banner_home_mostrare_su_mobile' );
    if ( $banner_home_mostrare_su_mobile === 'no' ) {
      $only_mobile_class = 'only-desktop';
    }
    else {
      $only_mobile_class = 'all';
    }
    ?>
    <div class="banner-home-mobile-ww <?php echo $only_mobile_class; ?>">
      <div class="banner-img">
        <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
          <img src="<?php echo $immagine_banner['url']; ?>" />
        </a>
      </div>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>
