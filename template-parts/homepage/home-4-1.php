<?php
$my_tiles_1 = get_posts( $args_mosaic_1 ); foreach($my_tiles_1 as $post) : setup_postdata($post);
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
$ab_test = get_field( 'ab_test' );
if ( $ab_test === 'si' ) {
  $rand_ab = rand(1, 2);
  $ab_trace = '?tfp-home=' . $post->post_name . $rand_ab;
}
else {
  $rand_ab = 1;
}
$tipo_di_spettacolo = get_field( 'tipo_di_spettacolo_' . $rand_ab );
$term_slug = 'area_attivita';
$taxonomies = get_taxonomies();
foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
    // If term object is returned, break out of loop. (Returns false if there's no object)
    if ( $term_object = get_term_by( 'id', $tipo_di_spettacolo , $taxonomy ) ) {
        break;
    }
}
$main_activity_color = $term_object->slug; $main_activity_id = $term_object->term_id;
$link_di_destinazione = get_field( 'link_di_destinazione_' . $rand_ab );
$target = get_field( 'target_' . $rand_ab );
if ( $link_di_destinazione === 'interno' ) {
  $tile_url =  get_field( 'destinazione_interna_' . $rand_ab );
}
else {
  $tile_url =  get_field( 'destinazione_esterna_' . $rand_ab );
}
$immagine = get_field('immagine_' . $rand_ab);
  if ( $isMobile == 1 ) {
    $immagine_URL = $immagine['sizes']['mosaic_big'];
  }
  if ( $isTablet == 1 ) {
    $immagine_URL = $immagine['sizes']['mosaic_big'];
  }
  if ( $isDesktop == 1 ) {
    $immagine_URL = $immagine['sizes']['mosaic_big'];
  }
?>
<div class="child-content mosaic mosaic-1">
  <a href="<?php echo $tile_url; ?><?php echo $ab_trace; ?>" target="<?php echo $target; ?>" class="absl"></a>
  <div class="positioner-image" style="background-image: url(<?php echo $immagine_URL; ?>)"></div>
  <div class="sidebar bg-<?php echo $main_activity_id; ?>-id"></div>
  <div class="positioner">
    <div class="texts txt-2-color">
      <div class="padder">
        <div class="only-desktop">
          <?php if ( get_field( 'categoria_' . $rand_ab ) ) : ?>
            <div class="cta-1 txt-<?php echo $main_activity_id; ?>-id">
              <?php the_field( 'categoria_' . $rand_ab ); ?>
            </div>
          <?php endif; ?>
        </div>
        <h1><a href="<?php echo $tile_url; ?><?php echo $ab_trace; ?>" target="<?php echo $target; ?>" class="wh"><?php the_field( 'titolo_' . $rand_ab ); ?></a></h1>
        <?php if ( get_field( 'sottotitolo_' . $rand_ab ) ) : ?>
          <h5><?php if( array_intersect( $allowed_roles, $user->roles ) ) { echo $print_status; } ?><?php the_field( 'sottotitolo_' . $rand_ab ); ?></h5>
        <?php endif; ?>
        <?php if ( get_field( 'label_' . $rand_ab ) ) : ?>
          <div class="cta-2 txt-5-color">
            <?php the_field( 'label_' . $rand_ab ); ?><?php if ( get_field( 'sottotitolo_mobile_' . $rand_ab ) ) : ?><span class="only-mobile txt-2-color"> - <?php the_field( 'sottotitolo_mobile_' . $rand_ab ); ?></span><?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ( $isDesktop == 1 ) : ?>
          <div class="abstract">
          <?php if ( get_field( 'abstract_' . $rand_ab ) ) : ?>
              <?php the_field( 'abstract_' . $rand_ab ); ?>
          <?php endif; ?>
          <?php if ( get_field( 'cta_' . $rand_ab ) ) : ?>
            <a href="<?php echo $tile_url; ?><?php echo $ab_trace; ?>" target="<?php echo $target; ?>" class="btn-fill-hover button-<?php echo $main_activity_id; ?>-id cta-4 allupper"><?php the_field( 'cta_' . $rand_ab ); ?></a>
          <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; wp_reset_query(); ?>
<picture>
  <source media="(max-width: 767px)" srcset="<?php bloginfo('stylesheet_directory'); ?>/images/mosaic/img-mod-7-1.png">
    <source media="(max-width: 1024px)" srcset="<?php bloginfo('stylesheet_directory'); ?>/images/mosaic/img-mod-7-1.png">
      <source media="(min-width: 1025px)" srcset="<?php bloginfo('stylesheet_directory'); ?>/images/mosaic/img-mod-4-1.png">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/mosaic/img-mod-7-1.png" title="" alt="" />
      </picture>
