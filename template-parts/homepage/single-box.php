<?php
$single_box_layout = get_field( 'single_box_layout', 'option' );
$immagine_side = get_field( 'immagine_side', 'option' );
  if ( $isMobile == 1 ) {
    $immagine_side_URL = $immagine_side['sizes']['full_desk'];
  }
  if ( $isTablet == 1 ) {
    $immagine_side_URL = $immagine_side['sizes']['full_desk'];
  }
  if ( $isDesktop == 1 ) {
    $immagine_side_URL = $immagine_side['sizes']['full_desk'];
  }
  $immagine_full = get_field( 'immagine_full', 'option' );
  if ( $isMobile == 1 ) {
    $immagine_full_URL = $immagine_full['sizes']['full_desk'];
  }
  if ( $isTablet == 1 ) {
    $immagine_full_URL = $immagine_full['sizes']['full_desk'];
  }
  if ( $isDesktop == 1 ) {
    $immagine_full_URL = $immagine_full['sizes']['full_desk'];
  }
 ?>
 <style>
 .colorizer {
   background-color: <?php the_field( 'box_singolo_bg_color', 'option' ); ?>;
 }
  .single-opening-box-home-format {
    color: <?php the_field( 'box_singolo_foreground_color', 'option' ); ?>;
  }
  .single-opening-box-home-format a {
    color: <?php the_field( 'box_singolo_foreground_color', 'option' ); ?> !important;
  }
 </style>
 <?php if ( $single_box_layout === 'two-cols') : ?>
   <div class="wrapper colorizer">
     <div class="wrapper-padded">
       <div class="wrapper-padded-more">
         <div class="single-opening-box-home">
           <div class="lefty">
             <div class="single-opening-box-home-format">
               <?php the_field( 'box_singolo_text', 'option' ); ?>
             </div>
             <?php if ( get_field( 'box_singolo_cta', 'option' ) ) : ?>
               <br />
               <a href="<?php the_field( 'box_singolo_cta_url', 'option' ); ?>" target="<?php the_field( 'box_singolo_cta_target', 'option' ); ?>" class="btn-fill red cta-4 allupper"><?php the_field( 'box_singolo_cta', 'option' ); ?></a>
             <?php endif; ?>
           </div>
           <div class="righty">
             <?php if( get_field( 'cover_video', 'option') ) : ?>
               <div class="video_frame">
                 <?php the_field( 'cover_video', 'option'); ?>
               </div>
             <?php else : ?>
               <img class="lazy" data-original="<?php echo $immagine_side_URL; ?>" alt="<?php echo $immagine_side['alt']; ?>" />
             <?php endif; ?>
           </div>
         </div>
       </div>
     </div>
   </div>
 <?php else : ?>
   <div class="wrapper">
     <div class="img-resp">
       <img class="lazy" data-original="<?php echo $immagine_full_URL; ?>" alt="<?php echo $immagine_side['alt']; ?>" />
     </div>

   </div>
 <?php endif; ?>
