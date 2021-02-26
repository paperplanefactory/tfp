<?php
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
if (function_exists('call_all_area_attivita_primary_id')) {
  call_all_area_attivita_primary_id();
}
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
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $activity_id . '.png';
}
?>
<div class="def-grid-module infinite-module">
  <div class="cta-1">
    <span class="category-list">
      <?php
      if (function_exists('call_all_area_attivita_primary')) {
        call_all_area_attivita_primary();
      }
      ?>
    </span>
  </div>
  <div class="image-box">
    <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
    <a href="<?php the_permalink(); ?>">
      <img src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
    </a>
  </div>

    <div class="cta-1">
      <span class="category-list">
        <?php
        if (function_exists('call_all_percorsi')) {
          call_all_percorsi();
        }
        ?>
      </span>
    </div>

  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
  <?php if( get_field('subtitle') ) : ?>
    <h5><?php the_field('subtitle'); ?></h5>
  <?php endif; ?>
  <div class="cta-2 txt-5-color">
    <?php
    if ( get_field('tournee_dates', $post_id) ) {
      $reap_one = get_field('tournee_dates');
      $first_date = $reap_one[0]['date_from'];

      $first_date = strtotime(str_replace("/", "-", $first_date));
      $first_date = date_i18n("j F",$first_date);
      echo $first_date;

      echo ' - ';

      $reap_last = get_field('tournee_dates'); // get all the rows from and page ID
      $reap_last_date = end( $reap_last ); // get the end row
      $last_date = $reap_last_date['date_to' ]; // get the sub field value
      $last_date = strtotime(str_replace("/", "-", $last_date));
      $last_date = date_i18n("j F",$last_date);
      echo $last_date;
    }
     ?>
  </div>
  <?php if( get_field('abstract') ) : ?>
    <div class="content-styled">
      <?php the_field('abstract'); ?>
    </div>
  <?php endif; ?>
</div>
