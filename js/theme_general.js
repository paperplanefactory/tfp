$(document).ready(function() {

  // Wrappo i video player in una div per dimensionarli responsive
  $('.content-styled iframe').wrap('<div class="video_frame"></div>');
  // Controllo se l'immagine ha la didascalia e se manca la wrappo per allinearla
  if (!$('img.alignnone').closest('.wp-caption').length) {
    $('img.alignnone').wrap('<div class="wp-caption alignnone"></div>');
  }
  if (!$('img.aligncenter').closest('.wp-caption').length) {
    $('img.aligncenter').wrap('<div class="wp-caption aligncenter"></div>');
  }
  if ($('img.alignleft')) {
    $('img.alignleft').wrap('<div class="wp-caption alignleft"></div>');
  }
  if ($('img.alignright')) {
    $('img.alignright').wrap('<div class="wp-caption alignright"></div>');
  }

  // sotto menu a tendina
  $('.compact-sub-show').click(function() {
    $('.compact-sub-show > .sub-menu').fadeToggle(150, "linear");

  });
  $('.expanded-sub-show').click(function() {
    $('.expanded-sub-show > .sub-menu').fadeToggle(150, "linear");
  });
  // hamburger
  $('.ham-activator').click(function() {
    $('#header-search').fadeOut(150, "linear");
    $('.nav-icon3').toggleClass('open');
    if ($('.nav-icon3').hasClass('open')) {
      $('html').css('overflowY', 'hidden');
      $('body').addClass('occupy-scrollbar');
      $('#header-overlay').focus();
    } else {
      $('html').css('overflowY', 'scroll');
      $('body').removeClass('occupy-scrollbar');
      $('#header').focus();
    }
    $('#header-overlay').fadeToggle(150, "linear");
  });
  // search
  $('.search-activator').click(function() {
    $('#header-overlay').fadeOut(150, "linear");
    $('html').css('overflowY', 'scroll');
    $('body').removeClass('occupy-scrollbar');
    $('#header-search').fadeToggle(150, "linear");
  });
  // overlay tickets close
  function closeOverlay() {
    $('#tickets-overlay').delay(300).fadeOut(150, "linear");
    $('.overlay-effect').addClass('overlay-effect-initial');
    $('.scroll-opportunity').scrollTop(0);
    $('html').css('overflowY', 'scroll');
    $('body').removeClass('occupy-scrollbar');
  }
  $('.tickets-overlaty-closer').click(function(k) {
    closeOverlay();
    k.preventDefault();
  });
  // overlay tickets open
  function openOverlay() {
    $('#tickets-overlay').fadeIn(150, "linear");
    $('.overlay-effect').delay(300).removeClass('overlay-effect-initial');
    $('html').css('overflowY', 'hidden');
    $('body').addClass('occupy-scrollbar');
  }
  $('.tickets-overlaty-opener').click(function(k) {
    openOverlay();
    k.preventDefault();
  });

  //get URL parameters
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName, i;
    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
    }
  };
  var overlay = getUrlParameter('overlay');
  if (overlay === 'open' && $('.overlay-content')[0]) {
    openOverlay();
  }

  // expandables
  $('.expandable-filters-mob').click(function() {
    if ($(this).hasClass('minus')) {
      $(this).addClass('plus');
      $(this).removeClass('minus');
      $('.expandable-content-filters-mob').slideUp(150);

    } else {
      $(this).addClass('minus');
      $(this).removeClass('plus');
      $('.expandable-content-filters-mob').slideDown(150);
    }
  });

  // expandables
  $('.expandable').click(function() {
    if ($(this).hasClass('minus')) {
      $('.sottser-txt').slideUp(300);
      $(this).addClass('plus');
      $(this).removeClass('minus');
      $(this).parent().next('.expandable-content').slideUp(150);

    } else {
      $('.sottser-txt').slideUp(300);
      $(this).addClass('minus');
      $(this).removeClass('plus');
      $(this).parent().next('.expandable-content').slideDown(150);
    }
  });
  // expandables overlay
  $('.expandable-overlay').click(function() {
    if ($(this).hasClass('minus')) {
      $('.sottser-txt').slideUp(300);
      $(this).addClass('plus');
      $(this).removeClass('minus');
      $(this).parent().next('.expandable-content-overlay').slideUp(150);

    } else {
      $('.sottser-txt').slideUp(300);
      $(this).addClass('minus');
      $(this).removeClass('plus');
      $(this).parent().next('.expandable-content-overlay').slideDown(150);
    }
  });
  // expandables dates
  $('.expandable-dates').click(function() {
    $(this).parent().parent().nextAll('.date-toofuture').slideToggle(300);
  });


  //controllo input search
  $('.search-check').each(function(i, el) {
    $(this).submit(function() {
      var fieldValue = $(this).find('.search-lenght-check').val();
      var lenght = fieldValue.length;
      // Check if empty of not
      if (lenght < 4) {
        $(this).next('.search-lenght-message').slideDown(300);
        return false;
      }
    });
  });


});


$('.ham-activator').bind('click', function() {
  hj('event', 'clicked_hamburger');
  console.log('??sdfsdf!');
});

/////////////////////////////////////////////
// slick slideshow
/////////////////////////////////////////////
if ($('.mosaic-slider-js')[0]) {
  $('.mosaic-slider-js').slick({
    dots: false,
    arrows: false,
    focusOnSelect: true,
    draggable: true,
    infinite: true,
    accessibility: true,
    slidesToScroll: 1,
    adaptiveHeight: true,
    variableWidth: true
  });
}


if (typeof $esro !== 'undefined') {
  //register the services
  $esro.attachEventHandler("basketChanged", basketHandler);
  $esro.attachEventHandler("sessionStatusChanged", handleSession);




  var currentBasket = null;

  function basketHandler(basket) {
    currentBasket = basket;
    if (basket != null) {
      var deliveries_in_basket = parseInt(basket.Deliveries.length);
      var donations_in_basket = parseInt(basket.Donations.length);
      var giftVouchers_in_basket = parseInt(basket.GiftVouchers.length);
      var memberships_in_basket = parseInt(basket.Memberships.length);
      var merchandise_in_basket = parseInt(basket.Merchandise.length);
      var subscriptions_in_basket = parseInt(basket.Subscriptions.length);
      var tickets_in_basket = parseInt(basket.Tickets.length);
      var items_in_basket = deliveries_in_basket +
        donations_in_basket +
        giftVouchers_in_basket +
        memberships_in_basket +
        merchandise_in_basket +
        subscriptions_in_basket +
        tickets_in_basket;
      console.log(items_in_basket);
      if (items_in_basket > 0) {
        //console.log('something in basket');
        $('.basket-selector').addClass('basket-active');
        $('.tickets-counter').html(items_in_basket);
      } else {
        //console.log('basket is empty');
        $('.basket-selector').removeClass('basket-active');
      }


    } else {
      $('.basket-selector').removeClass('basket-active');
    }
  }

  function handleSession(session) {
    // Do something on session change
  }
  $esro.refreshSessionState();
  $esro.getSessionState();
}