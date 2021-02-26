

<?php
$immagine_full = get_field('scegli_immagine_chiusura');
  if ( $isMobile == 1 ) {
    $immagine_full_URL = $immagine_full['sizes']['content_picture'];
  }
  if ( $isTablet == 1 ) {
    $immagine_full_URL = $immagine_full['sizes']['full_tab'];
  }
  if ( $isDesktop == 1 ) {
    $immagine_full_URL = $immagine_full['sizes']['full_desk'];
  }

?>

<div class="fullscreen-image-inside lazy z-index-trick" data-original="<?php echo $immagine_full_URL; ?>"></div>
