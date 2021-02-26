<?php

$thumb_id = get_post_thumbnail_id();
if ( $thumb_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/0-thumb.png';
}
?>
 <div class="single-editorial">
   <div class="inside-right">
     <div class="inside-right-left">
       <div class="cta-1">
         <span class="category-list">
           <?php
           if (function_exists('call_all_categoy_primary')) {
             call_all_categoy_primary();
           }
           ?>
         </span>
       </div>
       <div class="image-box">
         <a href="<?php the_permalink(); ?>">
           <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
         </a>
       </div>
     </div>
     <div class="inside-right-right">
       <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
       <div class="cta-2 txt-5-color">
         <?php echo get_the_date('j F Y'); ?>
       </div>
     </div>
   </div>
</div>
