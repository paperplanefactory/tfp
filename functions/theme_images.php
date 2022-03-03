<?php
function add_image_insert_override($sizes){
    unset( $sizes['medium']);
    unset( $sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'add_image_insert_override' );

//custom image size for featured images
add_theme_support( 'post-thumbnails' );
add_image_size( 'full_desk', 1920, 9999);
add_image_size( 'full_tab', 1024, 9999);
add_image_size( 'content_picture', 768, 9999);
add_image_size( 'grid_picture', 400, 225, true);
add_image_size( 'grid_picture_xl', 293, 165, true);
add_image_size( 'grid_picture_xxl', 760, 227, true);
add_image_size( 'mosaic_big', 9999, 1920);
add_image_size( 'mosaic_medium_horizontal', 636, 9999);
add_image_size( 'mosaic_medium_vertical', 9999, 440);
add_image_size( 'editorial_banner', 293, 400, true);
add_image_size( 'logo_opt', 250, 9999);
add_image_size( 'logo_opt_mob', 250, 9999);
add_image_size( 'banner_300_50', 600, 100, true);
add_image_size( 'banner_300_free', 600, 9999);
add_image_size( 'banner_250_250', 500, 500, true);
add_image_size( 'overlay_tab', 320, 9999);


function wpb_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
unset( $sizes['medium']);
unset( $sizes['large']);
unset( $sizes['full']);
$addsizes = array(
"content_picture" => __( "Content picture"),
"logo_opt" => __( "Banner")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}

/**
//[gallery] - per inserire slideshow arbitrariamente nel contenuto di un post / pagina
function foobar_func( $atts ){
	 ob_start();
  	include('page-templates/post-gallery.php');
  	return ob_get_clean();

}
add_shortcode( 'slideshow', 'foobar_func' );
*/
