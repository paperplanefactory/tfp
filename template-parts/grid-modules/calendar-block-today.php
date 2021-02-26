<?php
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
global $identify;
global $identify_old;
global $post_value;

$p_id =  $value[ID];
$compare = $value[show_date];
$cycle = get_field('type_show', $p_id);
$area_attivita_id = $value['area_attivita_id'];
$area_attivita_name = $value['area_attivita_name'];
$area_attivita_slug = $value['area_attivita_slug'];
$parent_id = wp_get_post_parent_id( $p_id );
if ( $parent_id != 0 ) {
  $my_permalink = get_post_permalink( $parent_id );
  $my_title = get_the_title( $parent_id );
}
else {
  $my_permalink = $value[guid];
  $my_title = $value[post_title];
}


$img_id = $value['post_thumbnail'];
if ( $img_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($img_id,'grid_picture', true);
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($img_id,'grid_picture', true);
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($img_id,'grid_picture', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $area_attivita_id . '-thumb.png';
}
$orario = substr($value[show_time], 0, -3);
?>
<script type="text/javascript">
$(document).ready(function() {
  if ( here === 'home' ) {
    $('.calendar-grid-module-image').addClass('no-calendar-image');
  }
  });
</script>
<div class="calendar-grid-module-today">
  <div class="top-cal">
    <div class="cta-2">
      <?php if ( $orario != '' ) : ?><span class="txt-4-color">h <?php echo substr($value[show_time], 0, -3); ?></span><br /><?php endif; ?><a href="/cartellone/<?php echo $area_attivita_slug; ?>" class="li-<?php echo $area_attivita_id; ?>-id"><?php echo $area_attivita_name; ?></a>
    </div>
  </div>
  <?php if ( $isHome != 'homed' ) : ?>
    <div class="calendar-grid-module-image">
      <div class="cat-stripe bg-<?php echo $area_attivita_id; ?>-id"></div>
      <a href="<?php echo $my_permalink; ?>">
        <?php if ( $cycle === 'cyclic' ) : ?>
          <?php if( have_rows('program_periods', $p_id) ) : while ( have_rows('program_periods', $p_id) ) : the_row(); ?>
            <?php if( have_rows('dates', $p_id) ) : while ( have_rows('dates', $p_id) ) : the_row();
            $orario_repeater = get_sub_field('time');
            $compared = get_sub_field('date');
            $compared = DateTime::createFromFormat('d/m/Y', $compared)->format('Ymd');
            if ( ( $compared == $compare ) && ( $orario === $orario_repeater ) ) : ?>
              <?php
              $immagine_thumb = get_sub_field('thumb');
                if ( $isMobile == 1 ) {
                  $immagine_thumb_URL = $immagine_thumb['sizes']['grid_picture'];
                }
                if ( $isTablet == 1 ) {
                  $immagine_thumb_URL = $immagine_thumb['sizes']['grid_picture'];
                }
                if ( $isDesktop == 1 ) {
                  $immagine_thumb_URL = $immagine_thumb['sizes']['grid_picture'];
                }
               ?>
               <img src="<?php echo $immagine_thumb_URL; ?>" alt="<?php echo $immagine_thumb['alt']; ?>" />

            <?php endif; ?>
            <?php endwhile; endif; ?>
          <?php endwhile; endif; ?>
        <?php else : ?>
          <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" />
        <?php endif; ?>
      </a>

    </div>
  <?php endif; ?>

  <h6>
    <a href="<?php echo $my_permalink; ?>">
      <?php if ( $cycle === 'cyclic' ) : $contantore_cicli++; ?>
        <?php if( have_rows('program_periods', $p_id) ) : while ( have_rows('program_periods', $p_id) ) : the_row(); ?>
          <?php if( have_rows('dates', $p_id) ) : while ( have_rows('dates', $p_id) ) : the_row();
          $orario_repeater = get_sub_field('time');
          $compared = get_sub_field('date');
          $compared = DateTime::createFromFormat('d/m/Y', $compared)->format('Ymd');
          if ( ( $compared == $compare ) && ( $orario === $orario_repeater ) ) : ?>
          <?php if ( get_sub_field('titolo_anteprima_calendario') ) : ?>
            <div class="cta-1">
              <?php if( get_field('titolo_calendario', $parent_id) ): ?>
                <?php the_field('titolo_calendario', $parent_id); ?>
              <?php else : ?>
                <?php echo $my_title; ?>
              <?php endif; ?>
            </div>
              <?php the_sub_field('titolo_anteprima_calendario'); ?>
          <?php else : ?>
            <?php if( get_field('titolo_calendario', $p_id) ): ?>
              <?php the_field('titolo_calendario', $p_id); ?>
            <?php else : ?>
              <?php echo $my_title; ?>
            <?php endif; ?>
          <?php endif; ?>

          <?php endif; ?>

          <?php endwhile; endif; ?>
        <?php endwhile; endif; ?>
      <?php else : ?>
        <?php if( get_field('titolo_calendario', $p_id) ): ?>
          <?php the_field('titolo_calendario', $p_id); ?>
        <?php else : ?>
          <?php echo $my_title; ?>
        <?php endif; ?>
      <?php endif; ?>
    </a>
  </h6>
</div>
