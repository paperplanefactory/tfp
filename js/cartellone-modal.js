jQuery(function($) {
  $('body').on('click', '.tickets-overlaty-opener-generic', function(e) {
    e.preventDefault();
    $('#tickets-overlay-generic').fadeIn(150, "linear");
    $('html').css('overflowY', 'hidden');
    $('body').addClass('occupy-scrollbar');

    var post_id = $(this).data('post_id');
    $.ajax({
      type: 'GET',
      url: '/app/wp-admin/admin-ajax.php?action=api&v=v2&api=cartellone_modal&post_id=' + post_id,
      data: {},
      success: function(data) {
        console.log(data);
        $('#tickets-overlay-generic .scroll-opportunity-back').html(data.html);
        //$('.overlay-effect').delay(300).removeClass('overlay-effect-initial');
        setTimeout(function() {
          $('.overlay-effect').removeClass('overlay-effect-initial');
        }, 300);
      },
      error: function(jqXHR, exception) {
        console.log(jqXHR);
        console.log(exception);
      }
    });
    e.preventDefault();
  });

  $('body').on('click', '.tickets-overlaty-closer-generic', function(e) {
    e.preventDefault();
    $('#tickets-overlay-generic').delay(300).fadeOut(150, "linear");
    $('.overlay-effect').addClass('overlay-effect-initial');
    $('.scroll-opportunity').scrollTop(0);
    $('html').css('overflowY', 'scroll');
    $('body').removeClass('occupy-scrollbar');
    $('#tickets-overlay-generic .scroll-opportunity-back').html('');
  });
});