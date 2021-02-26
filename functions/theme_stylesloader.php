<?php
if ( !is_admin() ) {
// load common css
function theme_css() {
	// versione del tema
	global $theme_version;
	// stabilisco il device
	global $isMobile;
	global $isTablet;
	global $isDesktop;

	// stili comuni
	wp_enqueue_style( 'theme-commnon', get_template_directory_uri() . '/style.min.css', '', $theme_version, 'all' );
	wp_enqueue_style( 'typekit', 'https://use.typekit.net/gdh1qsd.css', '', $theme_version, 'all' );
	if ( is_page( array( 'calendario', 'calendario-spettacoli' ) ) ) {
    wp_enqueue_style( 'theme-datepicker', get_template_directory_uri() . '/css/datepicker/datepicker.min.css', '', $theme_version, 'all' );
  }

	}
add_action( 'wp_enqueue_scripts', 'theme_css' );
}
