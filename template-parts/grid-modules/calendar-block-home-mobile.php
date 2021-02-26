<?php
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
$p_id =  $value[ID];
$compare = $value[show_date];
$cycle = get_field('type_show', $p_id);
$area_attivita_id = $value['area_attivita_id'];
$area_attivita_name = $value['area_attivita_name'];
$area_attivita_slug = $value['area_attivita_slug'];
$orario = substr($value[show_time], 0, -3);
?>
<div class="calendar-grid-module calendar-grid-module-home">
  <div class="top-cal">
    <div class="cta-2">
      <?php if ( $orario != '' ) : ?><span class="txt-4-color">h <?php echo substr($value[show_time], 0, -3); ?></span><br /><?php endif; ?><a href="/cartellone/<?php echo $area_attivita_slug; ?>" class="li-<?php echo $area_attivita_id; ?>-id"><?php echo $area_attivita_name; ?></a>
    </div>
  </div>
  <h6>
    <a href="<?php echo $value[guid]; ?>">
      <?php if ( $cycle === 'cyclic' ) : ?>
        <?php if( have_rows('program_periods', $p_id) ) : while ( have_rows('program_periods', $p_id) ) : the_row(); ?>
          <?php if( have_rows('dates', $p_id) ) : while ( have_rows('dates', $p_id) ) : the_row();
          $compared = get_sub_field('date');
          $compared = DateTime::createFromFormat('d/m/Y', $compared)->format('Ymd');
          if ( ( $compared == $compare ) ) : ?>
          <?php if( get_field('titolo_calendario', $p_id) ): ?>
            <?php the_field('titolo_calendario', $p_id); ?>
          <?php else : ?>
            <?php echo $value[post_title]; ?>
          <?php endif; ?>
             - <?php the_sub_field('title'); ?>
          <?php endif; ?>
          <?php endwhile; endif; ?>
        <?php endwhile; endif; ?>
      <?php else : ?>
        <?php if( get_field('titolo_calendario', $p_id) ): ?>
          <?php the_field('titolo_calendario', $p_id); ?>
        <?php else : ?>
          <?php echo $value[post_title]; ?>
        <?php endif; ?>
      <?php endif; ?>
    </a>
  </h6>
</div>
