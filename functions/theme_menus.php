<?php
// editors possono modificare menu e widget
function pxlcore_give_edit_theme_options( $caps ) {

	/* check if the user has the edit_pages capability */
	if( ! empty( $caps[ 'edit_pages' ] ) ) {

		/* give the user the edit theme options capability */
		$caps[ 'edit_theme_options' ] = true;

	}

	/* return the modified capabilities */
	return $caps;

}
add_filter( 'user_has_cap', 'pxlcore_give_edit_theme_options' );

if( function_exists('acf_add_options_page') ) {
  $parent = acf_add_options_page(array(
    'page_title' 	=> 'Impostazioni sito',
		'menu_title'	=> 'Impostazioni sito',
		//'menu_slug' 	=> 'impostazioni-sito',
		//'capability'	=> 'edit_posts',
		//'redirect'		=> false
	));
  // stagioni
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Gestione stagioni',
		'menu_title' 	=> 'Stagioni',
		'parent_slug' 	=> $parent['menu_slug'],
	));
  // mosaico
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Gestione mosaico',
		'menu_title' 	=> 'Mosaico',
		'parent_slug' 	=> $parent['menu_slug'],
	));
  // loghi footer
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Loghi footer',
		'menu_title' 	=> 'Loghi footer',
		'parent_slug' 	=> $parent['menu_slug'],
	));
  // Link calendario e biglietti on-line
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Calendario e biglietti on-line',
		'menu_title' 	=> 'Calendario e biglietti on-line',
		'parent_slug' 	=> $parent['menu_slug'],
	));
	// Chiusura homepage e classifica
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Chiusura homepage e classifica',
		'menu_title' 	=> 'Chiusura homepage e classifica',
		'parent_slug' 	=> $parent['menu_slug'],
	));
	// Testi grandi di sfondo
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Testi grandi di sfondo',
		'menu_title' 	=> 'Testi grandi di sfondo',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}

function register_theme_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'header-compact-menu' => __( 'Header Compact Menu' ),
      'parenti-menu' => __( 'Parenti Menu' ),
      'produzioni-menu' => __( 'Produzioni Menu' ),
      'community-menu' => __( 'Community Menu' ),
      'programma-menu' => __( 'Programma Menu' ),
      'formazione-menu' => __( 'Formazione Menu' ),
      'salespazi-menu' => __( 'Sale e spazi Menu' ),
      'sostieni-menu' => __( 'Sostieni Menu' ),
      'infobliglietteria-menu' => __( 'Info e bliglietteria Menu' ),
      'notizie-menu' => __( 'Notizie Menu' ),
      'areapress-menu' => __( 'Area press Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
			'header-menu-mobile' => __( 'Header Menu Mobile' )
    )
  );
}
add_action( 'init', 'register_theme_menus' );

function alx_sidebars() {
    register_sidebar(
      array(
        'name' => 'Header links',
        'id' => 'header-links',
        'description' => "Sidebar per i link header",
        'before_widget' => '<div id="%1$s" class="links-area sidebar-head widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="txt-4-color">',
        'after_title' => '</h6>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Header newsletter',
        'id' => 'header-newsletter',
        'description' => "Sidebar per newsletter in header",
        'before_widget' => '<div id="%1$s" class="cta-2 sidebar-head widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="txt-4-color">',
        'after_title' => '</h6>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Sidebar spettacolo',
        'id' => 'sidebar-spettacolo',
        'description' => "Sidebar per la scheda dello spettacolo",
        'before_widget' => '<div id="%1$s" class="cta-2 sidebar-box widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="cta-1">',
        'after_title' => '</div>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Sidebar home',
        'id' => 'sidebar-home',
        'description' => "Sidebar per homepage",
        'before_widget' => '<div id="%1$s" class="cta-2 home-sidebar-box widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="cta-1">',
        'after_title' => '</div>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Sidebar spettacolo in archivio',
        'id' => 'sidebar-spettacolo-archivio',
        'description' => "Sidebar per avviso dello spettacolo in archivio",
        'before_widget' => '<div id="%1$s" class="cta-2 padder-archivio bg-7-color widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="cta-1">',
        'after_title' => '</div>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Sidebar spettacolo terminato',
        'id' => 'sidebar-spettacolo-finito',
        'description' => "Sidebar per avviso dello spettacolo terminato",
        'before_widget' => '<div id="%1$s" class="cta-2 padder-archivio bg-7-color widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="cta-1">',
        'after_title' => '</div>'
      )
    );
		register_sidebar(
      array(
        'name' => 'Sidebar spettacolo figlio terminato',
        'id' => 'sidebar-spettacolo-figlio-finito',
        'description' => "Sidebar per avviso dello spettacolo figlio terminato",
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="cta-1">',
        'after_title' => '</div>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Footer info',
        'id' => 'footer-info',
        'description' => "Blocco per testi del footer",
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
      )
    );
    register_sidebar(
      array(
        'name' => 'Info e biglietteria',
        'id' => 'sidebar-info-e-biglietteria',
        'description' => "Blocco per testi info e biglietteria",
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
      )
    );
}
add_action( 'widgets_init', 'alx_sidebars' );

add_filter( 'flamingo_map_meta_cap', 'for_editors_flamingo_map_meta_cap' );

function for_editors_flamingo_map_meta_cap( $meta_caps ) {
	$meta_caps = array_merge( $meta_caps, array(
		'flamingo_edit_contacts' => 'edit_pages',
		'flamingo_edit_inbound_messages' => 'edit_pages',
	) );

	return $meta_caps;
}
