$(document).ready(function() {
  function getSiteWidth() {
    windowWidth = $(window).width();
  }
  getSiteWidth();
  $( window ).resize(function() {
    getSiteWidth();
    if ( windowWidth >= 1025) {
      // Movimento header
      moveHeader();
    }
    else {
      $('.hide-my-head').fadeIn(150);
    }
  });

  function stickyMe() {
    stickyHeaderHeight = $('#header').height();
    stickySubHeaderHeight = $('#sub-header').height();
    if ( typeof stickySubHeaderHeight === 'undefined' || stickySubHeaderHeight === null || stickySubHeaderHeight === '' ) {
      stickySubHeaderHeight = 0;
    }
    allHeadersHeight = stickyHeaderHeight + stickySubHeaderHeight;
    allHeadersHeightForShareBTNS = stickyHeaderHeight + stickySubHeaderHeight + 30;
		var subMenuHeight = $('#sticker').height();
    FindfarFromLeft = $('#sticky-check').offset();
    if ( typeof FindfarFromLeft === 'undefined' || FindfarFromLeft === null || FindfarFromLeft === '' ) {
      FindfarFromLeft = 0;
    }
    var farFromLeft = FindfarFromLeft.left;
    var headerCalculation = $('#just-check-head-height').height();
    //alert(allHeadersHeight);
		//alert(subMenuHeight);
		var scrollTop = $(this).scrollTop();
		$('#sticky-check').each(function() {
			var topDistance = $(this).offset().top;
			if ( (topDistance-72) < scrollTop ) {
				$(this).css({ 'height': subMenuHeight + "px" });
				$(this).addClass('sticky-checked');
				$('#sticker').addClass('sticky-menu');
        $('#sticker' ).css({'top': allHeadersHeight});
        $('#stickershare').addClass('sticky-menu-social');
        $('#stickershare' ).css({'top': allHeadersHeightForShareBTNS});
        $('#stickershare').css({'left': farFromLeft + "px"});
			}
			else {
				$(this).removeClass('sticky-checked');
				$(this).css({ 'height': "1px" });
				$('#sticker').removeClass('sticky-menu');
        $('#sticker').css({'top': 0});
        $('#sticker').css({'left': farFromLeft + "px"});
        $('#stickershare').removeClass('sticky-menu-social');
        $('#stickershare').css({'top': 0});
        $('#stickershare').css({'left': 0});
			}
    });
	}

  //movimento header
  var currentScrollTop, temporalScroll = 0;
  currentScrollTop = $(this).scrollTop();
  function moveHeader() {
    headerHeight = $('#header').height();
    if ( typeof headerHeight === 'undefined' || headerHeight === null || headerHeight === '' ) {
      headerHeight = 0;
    }
    headerExpandedHeight = $('#header-expanded').height();
    if ( typeof headerExpandedHeight === 'undefined' || headerExpandedHeight === null || headerExpandedHeight === '' ) {
      headerExpandedHeight = 0;
    }
    subHeaderHeight = $('#sub-header').height();
    if ( typeof subHeaderHeight === 'undefined' || subHeaderHeight === null || subHeaderHeight === '' ) {
      subHeaderHeight = 0;
    }

    totalHeadersHeightForSearch = ( headerExpandedHeight + subHeaderHeight );
    partialHeadersHeightForSearch = ( headerHeight + subHeaderHeight );

    currentScrollTop = $(this).scrollTop();

    if (currentScrollTop >= totalHeadersHeightForSearch) {
      $('.hide-my-head').fadeIn(50);
      $('#sub-header').fadeIn(50);
      $( '#header-search' ).css({'position': 'fixed', 'top': partialHeadersHeightForSearch});
    }
    else {
      $('.hide-my-head').fadeOut(50);
      $('#sub-header').fadeOut(50);
      $( '#header-search' ).css({'position': 'fixed', 'top': totalHeadersHeightForSearch});
    }


  }
  if ( windowWidth >= 1025) {
    // Movimento header
    moveHeader();
  }
  else {
    $('.hide-my-head').fadeIn(150);
  }

  $(window).scroll(function(){
    if ( windowWidth >= 1025) {
      // Movimento header
      moveHeader();
      stickyMe();
    }
    else {
      $('.hide-my-head').fadeIn(150);
    }
  });


  getSiteWidth();
});
