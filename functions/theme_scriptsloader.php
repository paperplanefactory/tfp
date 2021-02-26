<?php
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;

add_action( 'wp_head', 'synth_hotjar');
function synth_hotjar() { ?>
	<!-- Hotjar Tracking Code for https://www.teatrofrancoparenti.it/ -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:779582,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
<?php }

add_action( 'wp_head', 'synth_fbpixel');
function synth_fbpixel() { ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	 fbq('init', '481592828856982');
	fbq('track', 'PageView');
	</script>
	<noscript>
	 <img height="1" width="1"
	src="https://www.facebook.com/tr?id=481592828856982&ev=PageView
	&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
<?php }


//all scripts
add_action( 'wp_enqueue_scripts', 'all_scripts' );
function all_scripts(){
  // versione del tema
	global $theme_version;
	// add DetectMobile
	global $isMobile;
	global $isTablet;
	global $isDesktop;
  // smart jquery inclusion
  if (!is_admin()) {
  	wp_deregister_script('jquery');
  	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', '', '3.2.1', true);
  	wp_enqueue_script('jquery');
  }
	// Comportamenti ricorrenti
	wp_register_script( 'theme-general', get_stylesheet_directory_uri() . '/js/theme_general.min.js', '', $theme_version, true);
	wp_enqueue_script( 'theme-general' );
  // Lazy load
  wp_register_script( 'custom-lazyload', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js', array('jquery'), '1.9.1');
  wp_enqueue_script( 'custom-lazyload' );
	// Infinite Scroll
  // documentazione: https://infinite-scroll.com/
  wp_register_script( 'custom-infinitescroll', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/3.0.3/infinite-scroll.pkgd.min.js#deferload', '', '3.0.3', false);
  wp_enqueue_script( 'custom-infinitescroll' );
	// Share Addtoany
	wp_register_script( 'custom-addtoany', '//static.addtoany.com/menu/page.js', '', 'hisown', true);
	wp_enqueue_script( 'custom-addtoany' );
  // bxslider
	wp_register_script( 'bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', '', $theme_version, true);
	wp_enqueue_script( 'bxslider' );
  // Cookies
	wp_register_script( 'custom-cookies', get_stylesheet_directory_uri() . '/js/js.cookie.min.js', '', $theme_version, true);
	wp_enqueue_script( 'custom-cookies' );


  wp_register_script( 'script-desktop-header', get_stylesheet_directory_uri() . '/js/script_dektop_header.min.js', '', $theme_version, true);
  wp_enqueue_script( 'script-desktop-header' );

  if ( is_page( 'cartellone' ) ) {
    // API controls cartellone
  	wp_register_script( 'custom-api-controls-cartellone', get_stylesheet_directory_uri() . '/js/api-controls-cartellone.min.js', '', $theme_version, true);
  	wp_enqueue_script( 'custom-api-controls-cartellone' );
  }
  if ( is_page( array( 'calendario', 'calendario-spettacoli' ) ) ) {
		// Datepicker
		wp_register_script( 'custom-datepicker', get_stylesheet_directory_uri() . '/js/datepicker.min.js', '', $theme_version, true);
		wp_enqueue_script( 'custom-datepicker' );
	  // Datepicker ita
		wp_register_script( 'custom-datepicker-ita', get_stylesheet_directory_uri() . '/js/datepicker.en.js', '', $theme_version, true);
		wp_enqueue_script( 'custom-datepicker-ita' );
    // API controls calendario
  	wp_register_script( 'custom-api-controls-calendario', get_stylesheet_directory_uri() . '/js/api-controls-calendario.min.js', '', $theme_version, true);
  	wp_enqueue_script( 'custom-api-controls-calendario' );

  }
	if ( is_home() || is_front_page() ) {
		if ( $isMobile == 1 ) {
			// API controls calendario mobile
	  	wp_register_script( 'custom-api-controls-calendario', get_stylesheet_directory_uri() . '/js/api-controls-calendario-home-mobile.min.js', '', $theme_version, true);
	  	wp_enqueue_script( 'custom-api-controls-calendario' );
		}
		else {
			// API controls calendario
	  	wp_register_script( 'custom-api-controls-calendario', get_stylesheet_directory_uri() . '/js/api-controls-calendario-home.min.js', '', $theme_version, true);
	  	wp_enqueue_script( 'custom-api-controls-calendario' );
		}

    // Effetti mosiaco
  	wp_register_script( 'custom-mosaic-effects', get_stylesheet_directory_uri() . '/js/theme_mosaic.min.js', '', $theme_version, true);
  	wp_enqueue_script( 'custom-mosaic-effects' );
  }


  /* MAVIDA */
  wp_register_script( 'scripts-archivio-spettacoli', get_stylesheet_directory_uri() . '/js/scripts-archivio-spettacoli.min.js', '', $theme_version, true);
  wp_enqueue_script( 'scripts-archivio-spettacoli' );



	}
