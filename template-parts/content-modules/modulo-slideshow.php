<div class="modulo-slideshow modulo-slideshow<?php echo $module_count; ?>">
  <input type="hidden" class="slideshow_number" value=".bottomslider<?php echo $module_count; ?>" />
  <div class="bottomslider_dress">
    <div class="full full<?php echo $module_count; ?>"></div>
    <ul class="bottomslider bottomslider<?php echo $module_count; ?>">
      <?php
      $slide_counter = 0;
      $slide_total = 0;
      if( have_rows('slideshow') ) : while ( have_rows('slideshow') ) : the_row();
      $slide_total ++;
      endwhile;
      while ( have_rows('slideshow') ) : the_row();
      $slide_counter ++;
      $immagine_slide = get_sub_field('scegli_foto');
        if ( $isMobile == 1 ) {
          $immagine_slide_URL = $immagine_slide['sizes']['full_desk'];
        }
        if ( $isTablet == 1 ) {
          $immagine_slide_URL = $immagine_slide['sizes']['full_desk'];
        }
        if ( $isDesktop == 1 ) {
          $immagine_slide_URL = $immagine_slide['sizes']['full_desk'];
        }
      ?>
      <li class="slide_image">
        <img src="<?php echo $immagine_slide_URL; ?>" alt="<?php echo $immagine_slide['alt']; ?>" />
        <div class="didascalia-slide cta-2">
          <span class="counter"><em><?php echo $slide_counter; ?> di <?php echo $slide_total; ?>.</em></span> <?php echo $immagine_slide['caption']; ?>
        </div>
      </li>
      <?php endwhile; endif; ?>
    </ul>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.full<?php echo $module_count; ?>').click(function(){
      $(this).toggleClass('redux');
      resetSlide();
      $('.modulo-slideshow<?php echo $module_count; ?>').toggleClass('fullme');
      if ( $('.modulo-slideshow<?php echo $module_count; ?>').hasClass('fullme') ) {
        $('html').css('overflowY', 'hidden');
        $('body').addClass('occupy-scrollbar');
      }
      else {
        $('html').css('overflowY', 'scroll');
        $('body').removeClass('occupy-scrollbar');
      }
    });

  });
</script>
