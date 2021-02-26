<div class="def-grid-module infinite-module">
  <div class="image-box">
    <div class="cat-stripe bg-2-id"></div>
    <a href="/archivio-spettacoli/stagione/<?php echo $child_term_slug; ?>">
      <img src="<?php echo $tax_image_URL; ?>" />
    </a>
  </div>
  <h4><a href="/archivio-spettacoli/stagione/<?php echo $child_term_slug; ?>"><?php echo $child_term_name; ?></a></h4>
  <div class="content-styled">
    <?php echo term_description( $child_term_id, 'stagione' ) ?>
  </div>
</div>
