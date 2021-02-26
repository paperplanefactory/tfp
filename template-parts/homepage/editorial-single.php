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
$come_comporre_post = get_field( 'come_comporre_post' );
if ( $come_comporre_post === 'tutto-editabile' ) :
?>
<?php
$archive_prefix = "/cartellone/";
$fake_category = get_field( 'fake_category' );
$categoria = get_field( 'categoria' );
$activity_id = $categoria->term_id;
$activity_color = $categoria->slug;
$activity_name = $categoria->name;
if ( $fake_category != '' ) {
  $activity_id = 2;
}
$foto = get_field('foto');
    if ( $isMobile == 1 ) {
      $foto_URL = $foto['sizes']['grid_picture'];
    }
    if ( $isTablet == 1 ) {
      $foto_URL = $foto['sizes']['grid_picture'];
    }
    if ( $isDesktop == 1 ) {
      $foto_URL = $foto['sizes']['grid_picture'];
    }
 ?>
 <div class="single-editorial">
   <div class="cta-1">
     <?php if ( $fake_category != '' ) : ?>
       <span class="txt-1-color"><?php echo $fake_category; ?></span>
     <?php else : ?>
       <a href="<?php echo $archive_prefix . $activity_color ?>" class="li-<?php echo $activity_id; ?>-id"><?php echo $activity_name; ?></a>
     <?php endif; ?>

   </div>
   <?php if ( get_field('foto') ) : ?>
     <div class="image-box">
       <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
       <a href="<?php the_field( 'collega_scheda_spettacolo' ); ?>">
         <img class="lazy" data-original="<?php echo $foto_URL; ?>" />
       </a>
     </div>
  <?php endif; ?>
   <h4><?php if( array_intersect( $allowed_roles, $user->roles ) ) { echo $print_status; } ?><a href="<?php the_field( 'collega_scheda_spettacolo' ); ?>"><?php the_field( 'titolo' ); ?></a></h4>
   <?php if( get_field('sottotitolo') ) : ?>
     <h5><?php the_field('sottotitolo'); ?></h5>
   <?php endif; ?>
   <?php if( get_field('date') ) : ?>
     <div class="cta-2 txt-5-color">
       <?php the_field( 'date' ); ?>
     </div>
   <?php endif; ?>
   <?php if( get_field('abstract') ) : ?>
     <div class="content-styled">
       <?php the_field('abstract'); ?>
     </div>
   <?php endif; ?>
   <?php if( get_field('cta') ) : ?>
     <br />
     <a href="<?php the_field( 'collega_scheda_spettacolo' ); ?>" class="btn-fill-hover button-<?php echo $activity_id; ?>-id cta-4 allupper"><?php the_field('cta'); ?></a>
    <?php endif; ?>
 </div>

 <?php else :
   $scegli_spettacolo_compilazione_automatica = get_field( 'scegli_spettacolo_compilazione_automatica' );
   $abstract_auto = get_field('abstract_auto');
   $args_auto = array(
    'post_type' => 'spettacolo',
    'posts_per_page' => 1,
    'include' => $scegli_spettacolo_compilazione_automatica
    );
   $my_auto = get_posts( $args_auto );
   foreach( $my_auto as $post ) : setup_postdata( $post ); ?>
   <?php
   $thumb_id = get_post_thumbnail_id();
   if ( $isMobile == 1 ) {
     $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
   }
   if ( $isTablet == 1 ) {
     $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
   }
   if ( $isDesktop == 1 ) {
     $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
   }
   ?>
    <div class="single-editorial">
     <div class="cta-1">
       <span class="category-list">
         <?php
         if (function_exists('call_all_area_attivita_primary')) {
           call_all_area_attivita_primary();
         }
         ?>
       </span>
     </div>
     <?php if ( get_field('foto') ) : ?>
       <div class="image-box">
         <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
         <a href="<?php the_permalink(); ?>">
           <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" />
         </a>
       </div>
     <?php endif; ?>
       <div class="cta-1">
         <span class="category-list">
           <?php
           if (function_exists('call_all_percorsi')) {
             call_all_percorsi();
           }
           ?>
         </span>
       </div>
     <h4><?php if( array_intersect( $allowed_roles, $user->roles ) ) { echo $print_status; } ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
     <?php if( get_field('subtitle') ) : ?>
       <h5><?php the_field('subtitle'); ?></h5>
     <?php endif; ?>
     <div class="cta-2 txt-5-color">
       <?php include( locate_template ( 'template-parts/date-modules/riepilogo-date.php' ) ); ?>
     </div>
     <?php if( $abstract_auto != '' ) : ?>
       <div class="content-styled">
         <?php echo $abstract_auto; ?>
       </div>
     <?php else : ?>
       <?php if( get_field('abstract') ) : ?>
         <div class="content-styled">
           <?php the_field('abstract'); ?>
         </div>
       <?php endif; ?>
     <?php endif; ?>
   </div>
   <?php endforeach; ?>
 <?php endif; ?>
 <?php wp_reset_postdata(); ?>
