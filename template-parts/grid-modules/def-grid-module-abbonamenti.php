<?php
$abbonamento_id = $term_abbonamenti->term_id;
$abbonamento_nome = $term_abbonamenti->name;
$abbonamento_slug = $term_abbonamenti->slug;
$abbonamento_description = $term_abbonamenti->description;
$tax_image = get_field('immagine', 'abbonamenti' . '_' . $abbonamento_id , true);
if ( $isMobile == 1 ) {
  $tax_image_URL = $tax_image['sizes']['grid_picture'];
}
if ( $isTablet == 1 ) {
  $tax_image_URL = $tax_image['sizes']['grid_picture'];
}
if ( $isDesktop == 1 ) {
  $tax_image_URL = $tax_image['sizes']['grid_picture'];
}
?>
<div class="def-grid-module">
  <!--<div class="cta-1">
    <a href="da definire!!!" class="abbonamenti">Abbonamenti</a>
  </div>-->
  <div class="image-box">
    <a href="/abbonamenti/<?php echo $abbonamento_slug; ?>">
      <img class="lazy" data-original="<?php echo $tax_image_URL; ?>" />
    </a>
  </div>
  <h4><a href="/abbonamenti/<?php echo $abbonamento_slug; ?>"><?php echo $abbonamento_nome; ?></a></h4>
  <div class="content-styled">
    <?php echo category_description( $abbonamento_id ); //echo $abbonamento_description; ?>
  </div>
</div>
