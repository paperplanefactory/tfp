<?php
  $args_banner_footer = array(
     'post_type' => 'banner_header_footer',
     'posts_per_page' => 1,
     'orderby' => 'rand',
   );
    $my_banners_footer = get_posts( $args_banner_footer );
    if ( !empty ( $my_banners_footer ) ) : ?>
    <div class="modulo-banner">
    <?php
    foreach($my_banners_footer as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_home');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    ?>
    <div class="banner-img">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" class="<?php echo $logo_class; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>
