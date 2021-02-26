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
//if ( $come_comporre_post === 'tutto-editabile' ) :
?>
<?php
$archive_prefix = "/cartellone/";
$categoria = get_field( 'categoria_aggregato_principale' );
$activity_id = $categoria->term_id;
$activity_color = $categoria->slug;
$activity_name = $categoria->name;
$foto_aggregato_principale = get_field('foto_aggregato_principale');
    if ( $isMobile == 1 ) {
      $foto_aggregato_principale_URL = $foto_aggregato_principale['sizes']['grid_picture'];
    }
    if ( $isTablet == 1 ) {
      $foto_aggregato_principale_URL = $foto_aggregato_principale['sizes']['grid_picture'];
    }
    if ( $isDesktop == 1 ) {
      $foto_aggregato_principale_URL = $foto_aggregato_principale['sizes']['grid_picture'];
    }
 ?>
 <div class="double-editorial">
   <div class="magic-box gradient-<?php echo $activity_id; ?>-id">
     <div class="magic-box-content">
       <div class="double-editorial-grid">
         <div class="left">
           <?php if ( $isTablet == 1 || $isDesktop == 1 ) : ?>
             <div class="cta-1">
               <a href="<?php echo $archive_prefix . $activity_color ?>" class="li-<?php echo $activity_id; ?>-id"><?php the_field('label'); ?></a>
             </div>
             <div class="image-box">
               <a href="<?php the_field( 'collega_aggregato_principale' ); ?>">
                 <img class="lazy" data-original="<?php echo $foto_aggregato_principale_URL; ?>" />
               </a>
             </div>
             <h4><?php if( array_intersect( $allowed_roles, $user->roles ) ) { echo $print_status; } ?><a href="<?php the_field( 'collega_aggregato_principale' ); ?>"><?php the_field( 'titolo_aggregato_principale' ); ?></a></h4>
             <?php if( get_field('sottotitolo_aggregato_principale') ) : ?>
               <h5><?php the_field('sottotitolo_aggregato_principale'); ?><?php echo $abbonamento; ?></h5>
             <?php endif; ?>
             <?php if( get_field('date_aggregato_principale') ) : ?>
               <div class="cta-2 txt-5-color">
                 <?php the_field( 'date_aggregato_principale' ); ?>
               </div>
             <?php endif; ?>
             <?php if( get_field('abstract_aggregato_principale') ) : ?>
               <div class="content-styled">
                 <?php the_field('abstract_aggregato_principale'); ?>
               </div>
             <?php endif; ?>
           <?php else : ?>
             <div class="cta-1">
               <a href="<?php echo $archive_prefix . $activity_color ?>" class="li-<?php echo $activity_color; ?>-id"><?php the_field('label'); ?></a>
             </div>
             <h4><a href="<?php the_field( 'collega_aggregato_principale' ); ?>"><?php the_field( 'titolo_aggregato_principale' ); ?></a></h4>
           <?php endif; ?>
         </div>
         <div class="right">
           <?php if( have_rows('scegli_aggregati_secondari_blocco') ) : while ( have_rows('scegli_aggregati_secondari_blocco') ) : the_row();
           $categoria_sub = get_sub_field( 'categoria_aggregato_secondario' );
           $activity_id_sub = $categoria_sub->term_id;
           $activity_color_sub = $categoria_sub->slug;
           $activity_name_sub = $categoria_sub->name;
           $immagine_aggregato_secondario = get_sub_field('immagine_aggregato_secondario');
               if ( $isMobile == 1 ) {
                 $immagine_aggregato_secondario_URL = $immagine_aggregato_secondario['sizes']['grid_picture'];
               }
               if ( $isTablet == 1 ) {
                 $immagine_aggregato_secondario_URL = $immagine_aggregato_secondario['sizes']['grid_picture'];
               }
               if ( $isDesktop == 1 ) {
                 $immagine_aggregato_secondario_URL = $immagine_aggregato_secondario['sizes']['grid_picture'];
               }
           ?>
           <div class="inside-right">
             <div class="inside-right-left">
               <?php if ( $isTablet == 1 || $isDesktop == 1 ) : ?>
                 <div class="cta-1">
                   <a href="<?php echo $archive_prefix . $activity_color_sub ?>" class="li-<?php echo $activity_id_sub; ?>-id"><?php echo $activity_name_sub; ?></a>
                 </div>
               <?php endif; ?>
               <div class="image-box">
                 <div class="cat-stripe bg-<?php echo $activity_id_sub; ?>-id"></div>
                 <a href="<?php the_sub_field( 'link_aggregato_secondario' ); ?>">
                   <img class="lazy" data-original="<?php echo $immagine_aggregato_secondario_URL; ?>" />
                 </a>
               </div>
             </div>
             <div class="inside-right-right">
               <?php if ( $isMobile == 1 ) : ?>
                 <div class="cta-1">
                   <a href="<?php echo $archive_prefix . $activity_color_sub ?>" class="li-<?php echo $activity_id_sub; ?>-id"><?php echo $activity_name_sub; ?></a>
                 </div>
               <?php endif; ?>
               <h5><?php if( array_intersect( $allowed_roles, $user->roles ) ) { echo $print_status; } ?><a href="<?php the_sub_field( 'link_aggregato_secondario' ); ?>"><?php the_sub_field( 'titolo_aggregato_secondario' ); ?></a></h5>
               <?php if( get_sub_field('date_aggregato_secondario') ) : ?>
                 <div class="cta-2 txt-5-color">
                   <?php the_sub_field( 'date_aggregato_secondario' ); ?>
                 </div>
               <?php endif; ?>
             </div>
           </div>
           <?php endwhile; endif; ?>
         </div>
       </div>
     </div>
   </div>
 </div>
