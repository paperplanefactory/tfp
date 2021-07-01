<?php
  $specttacolo_id = get_the_ID();
  $args_banner_home = array(
     'post_type' => 'banner_interno',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'meta_query'  => array(
       array(
         'key' => 'banner_spettacolo',
         'value' => '"' . $specttacolo_id . '"',
         'compare' => 'LIKE'
       )
     ),
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-1'
       ),
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $visualizza_mobile = get_field( 'visualizza_mobile' );
    if ( $visualizza_mobile === 'no' ) {
      $hide_mobile_class = 'only-desktop';
    }
    else {
      $hide_mobile_class = '';
    }

    ?>
    <div class="banner-img <?php echo $hide_mobile_class; ?>">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_banner_home = array(
     'post_type' => 'banner_interno',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'meta_query'  => array(
       array(
         'key' => 'banner_spettacolo',
         'value' => '"' . $specttacolo_id . '"',
         'compare' => 'LIKE'
       )
     ),
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-2'
       ),
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $visualizza_mobile = get_field( 'visualizza_mobile' );
    if ( $visualizza_mobile === 'no' ) {
      $hide_mobile_class = 'only-desktop';
    }
    else {
      $hide_mobile_class = '';
    }
    ?>
    <div class="banner-img <?php echo $hide_mobile_class; ?>">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_banner_home = array(
     'post_type' => 'banner_interno',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'meta_query'  => array(
       array(
         'key' => 'banner_spettacolo',
         'value' => '"' . $specttacolo_id . '"',
         'compare' => 'LIKE'
       )
     ),
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-3'
       ),
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $visualizza_mobile = get_field( 'visualizza_mobile' );
    if ( $visualizza_mobile === 'no' ) {
      $hide_mobile_class = 'only-desktop';
    }
    else {
      $hide_mobile_class = '';
    }
    ?>
    <div class="banner-img <?php echo $hide_mobile_class; ?>">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_banner_home = array(
     'post_type' => 'banner_interno',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'meta_query'  => array(
       array(
         'key' => 'banner_spettacolo',
         'value' => '"' . $specttacolo_id . '"',
         'compare' => 'LIKE'
       )
     ),
     'tax_query' => array(
       array(
         'taxonomy' => 'home_banner_order',
         'field' => 'slug',
         'terms' => 'posizione-4'
       ),
     )
   );
    $my_banner_home = get_posts( $args_banner_home );
    if ( !empty ( $my_banner_home ) ) : ?>
    <div class="modulo-banner-home">
    <?php
    foreach($my_banner_home as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    $visualizza_mobile = get_field( 'visualizza_mobile' );
    if ( $visualizza_mobile === 'no' ) {
      $hide_mobile_class = 'only-desktop';
    }
    else {
      $hide_mobile_class = '';
    }
    ?>
    <div class="banner-img <?php echo $hide_mobile_class; ?>">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>
