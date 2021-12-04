<?php
// imposto la versione del tema
global $theme_version;
$theme_version = 8.4;
// gestione caricamento css
include_once "functions/theme_stylesloader.php";
// gestione caricamento script
include_once "functions/theme_scriptsloader.php";
// gestione immagini
include_once "functions/theme_images.php";
// lazy load
include_once "functions/theme_lazyload.php";
// gestione trim testi
include_once "functions/theme_txts.php";
// gestione core WordPress
include_once "functions/theme_messages.php";
// slideshow a moduli
include_once "functions/theme_slides.php";
// gestione custom post type e tassonomie
// include_once "functions/theme_cpt.php";
// custom menus
include_once "functions/theme_menus.php";
// custom tax filter for post type
include_once "functions/theme_filter_term_clauses.php";
// rewrite
include_once "functions/rewrites.php";
// taxonomies declare
include_once "functions/taxonomies-declare.php";

// pre_get_posts archive
//include_once "functions/pre_get_posts_archive.php";

// p2p
//include_once "functions/theme_posttopost.php";

// gestione DetectMobile - stabilisco il device e creo le variabili globali da richiamare nei template e negli altri script del tema
require_once 'libraries/Mobile_Detect.php';
global $isMobile;
global $isTablet;
global $isDesktop;
$mobileDetect = false;
$isMobile = false;
$isTablet = false;
$isDesktop = false;
$mobileDetect = new Mobile_Detect;
$isTablet = $mobileDetect->isTablet();
$isMobile = $mobileDetect->isMobile() && !$isTablet;
$isDesktop = !$isMobile && !$isTablet;



// run AFTER ACF saves the $_POST['fields'] data
// here we run the acf/save_post AFTER the data are saved and we update the field to your $value

add_action('acf/save_post', 'my_acf_save_post', 20);

function my_acf_save_post( $post_id ){

    $value = "12345";
    $new_tax = '';
    update_field('final_date', $new_tax, $post_id);
}
