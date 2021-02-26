<?php
$status = get_post_status();
switch ( $status ) {
  case 'publish' :
  $print_status = '[P]';
  break;
  case 'future' :
  $print_status = '[F]';
  break;
  case 'draft' :
  $print_status = '[B]';
  break;
}

    if ( $isMobile == 1 ) {
      $immagine_banner = get_field('immagine_banner_mobile');
      $immagine_banner_URL = $immagine_banner['sizes']['grid_picture'];
    }
    if ( $isDesktop == 1 || $isTablet == 1 ) {
      $immagine_banner = get_field('immagine_banner');
      $immagine_banner_URL = $immagine_banner['sizes']['editorial_banner'];
    }
 ?>
 <div class="single-editorial">
   <div class="editorial-banner">
     <div class="filler"></div>
     <a href="<?php the_field('url_di_collegamento_banner'); ?>" target="<?php the_field('link_banner_finestra'); ?>" class="absl"></a>
     <div class="editorial-banner-content">
       <h4 class="txt-2-color"><?php if( array_intersect( $allowed_roles, $user->roles ) ) { echo $print_status; } ?><?php the_field( 'titolo_banner' ); ?></h4>
       <?php if( get_field('cta_banner') ) : ?>
         <br />
         <a href="<?php the_field('url_di_collegamento_banner'); ?>" class="btn-fill-hover white cta-4 allupper" target="<?php the_field('link_banner_finestra'); ?>"><?php the_field('cta_banner'); ?></a>
        <?php endif; ?>
     </div>
       <img class="lazy" data-original="<?php echo $immagine_banner_URL; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
   </div>
 </div>
