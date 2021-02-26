<?php
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
$tax_short_description = get_field('tax_short_description', 'abbonamenti' . '_' . $term->term_id , true);
$tax_image = get_field('immagine', 'abbonamenti' . '_' . $term->term_id , true);
if ( $isMobile == 1 ) {
  $tax_image_URL = $tax_image['sizes']['content_picture'];
}
if ( $isTablet == 1 ) {
  $tax_image_URL = $tax_image['sizes']['content_picture'];
}
if ( $isDesktop == 1 ) {
  $tax_image_URL = $tax_image['sizes']['content_picture'];
}

 ?>
<div class="def-grid-module">
  <div class="cta-1 abbonamenti">
    <a href="/cartellone/<?php echo $term->slug; ?>" class="abbonamenti>">Abbonamenti</a>
  </div>
  <div class="image-box">
    <a href="/cartellone/<?php echo $term->slug; ?>">
      <img src="<?php echo $tax_image_URL; ?>" />
    </a>
  </div>
  <h4><a href="/cartellone/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></h4>
    <div class="content-styled">
      <p>
        <?php echo $tax_short_description; ?>
      </p>
    </div>
</div>
