<?php
add_action( 'wp_footer', 'activate_slideshows');
function activate_slideshows() { ?>
<script>
$(document).ready(function() {
  docWidth = $( document ).width();
  if ( docWidth < 768 ) {
    masterWidth = $( ".modulo-slideshow" ).width();
    $( ".slide_image" ).css("width", masterWidth);
    setadaptiveHeight = true;
  }
  else {
    setadaptiveHeight = false;
  }

  var apiNum = 0;
  $( ".slideshow_number" ).each(function( index ) {
    var setSlideId = $( this ).val();
    var apiName = 'api';
    apiNum++;
    var apiSelect = apiName+apiNum;
    var apiSelect = $(setSlideId).bxSlider({
      slideWidth: 'auto',
      minSlides: 1,
      maxSlides: 1,
      slideMargin: 5,
      adaptiveHeight: setadaptiveHeight,
        touchEnabled: true,
        easing: 'swing',
        controls: true,
      pager: false,
      infiniteLoop: false,
      hideControlOnEnd: true
    });
   resetSlide = function() {
     apiSelect.reloadSlider();
     };

  });
});
</script>
<?php }
