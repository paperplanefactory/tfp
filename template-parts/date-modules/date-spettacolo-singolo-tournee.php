<?php
$count_date_tournee = 0;
if( have_rows('tournee_dates') ) : while ( have_rows('tournee_dates') ) : the_row(); ?>
<?php $count_date_tournee++; ?>
<?php endwhile; ?>
<?php endif; ?>
<?php
$count_date_tournee_rep = 0;
if( have_rows('tournee_dates') ) : ?>
<div class="cta-1">
  <a href="javascript:void(0);" class="expandable minus">Tournée</a>
</div>
<div class="expandable-content counter_tour">
  <?php while ( have_rows('tournee_dates') ) : the_row();
  $count_date_tournee_rep++;
  $place = get_sub_field('place');
  $dateString = get_sub_field('date_from');
  $timestamp = strtotime(str_replace("/", "-", $dateString));
  $a_date_string = date_i18n("j F",$timestamp);

  $dateStringEnd = get_sub_field('date_to');
  $timestampEmd = strtotime(str_replace("/", "-", $dateStringEnd));
  $a_date_end_string = date_i18n("j F",$timestampEmd);
  $link = get_sub_field('link');
  ?>
  <div class="date-block-tournee">
  <div class="inside cta-2">
  <?php echo $a_date_string; ?>
  <?php if ( $dateString != $dateStringEnd ) : ?>
    - <?php echo $a_date_end_string; ?>
  <?php endif; ?><br />
  <?php if ( $link != '' ) : ?>
    <a href="<?php echo $link; ?>" target="_blank"><?php echo $place; ?></a>
  <?php else : ?>
    <?php echo $place; ?>
  <?php endif; ?>
  </div>
  </div>
  <?php $count_just_line = 0;
   if ( $count_date_tournee_rep != $count_date_tournee ) :
     $count_just_line++; if ( $count_just_line > 1 ) : ?>
     <div class="date-block-just-line"></div>
    <?php endif; ?>
  <?php endif; ?>
<?php endwhile; ?>
</div>

<?php endif; ?>
