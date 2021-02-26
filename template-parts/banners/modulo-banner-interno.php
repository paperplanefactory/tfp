<?php
  $specttacolo_id = get_the_ID();
  $args_banner = array(
     'post_type' => 'banner_interno',
     'posts_per_page' => 1,
     'orderby' => 'rand',
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
    <div class="modulo-banner">
    <?php
    foreach($my_banners as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    ?>
    <div class="banner-img">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php
  $args_global_banner = array(
     'post_type' => 'banner_interno',
     'posts_per_page' => 1,
     'orderby' => 'rand',
     'orderby' => 'rand',
     'meta_query'    => array(
       'relation'		=> 'AND',
       array(
         'key' => 'banner_spettacolo',
         'value'     => '"' . $specttacolo_id . '"',
         'compare'   => 'LIKE',
       ),
       array(
			'key'	  	=> 'prima_posizione',
			'value'	  	=> 'si',
			'compare' 	=> 'NOT IN',
		),
     )
   );
    $my_global_banner = get_posts( $args_global_banner );
    if ( !empty ( $my_global_banner ) ) : ?>
    <div class="modulo-banner">
    <?php
    foreach($my_global_banner as $post) : setup_postdata($post);
    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner_desktop_tablet_interno');
      $immagine_banner_URL = $immagine_banner['sizes']['banner_300_free'];
    }
    ?>
    <div class="banner-img">
      <a href="<?php the_field('url_di_destinazione'); ?>" target="_blank">
        <img src="<?php echo $immagine_banner_URL; ?>" />
      </a>
    </div>
    <?php endforeach; wp_reset_query(); ?>
</div>
<?php endif; ?>
