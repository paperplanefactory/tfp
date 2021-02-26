$(document).ready(function() {
	$('.mosaic').mouseenter(function() {
		$(this).find('.sidebar').addClass('onit');
		$(this).find('.positioner').addClass('onit');
		//alert('df');
  })
	.mouseleave(function() {
    $(this).find('.sidebar').removeClass('onit');
		$(this).find('.positioner').removeClass('onit');
		$(this).addClass('noonit').delay(500).queue(function(next){
    $(this).removeClass("noonit");
    next();
	});
  });

	// hover mosaico
	$('.mosaic-1, .mosaic-2').mouseover(function() {
		$(this).find('.abstract').slideDown(500);
	});
	$('.mosaic-1, .mosaic-2').mouseleave(function() {
		$(this).find('.abstract').slideUp(500);
	});

});
