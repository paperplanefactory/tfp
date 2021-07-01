<?php
add_action( 'template_redirect', 'wpsites_attachment_redirect' );
function wpsites_attachment_redirect(){
global $post;
if ( is_attachment() && isset($post->post_parent) && is_numeric($post->post_parent) && ($post->post_parent != 0) ) :
    wp_redirect( get_permalink( $post->post_parent ), 301 );
    exit();
    wp_reset_postdata();
    endif;
}

function custom_rewrite_rule() {
  //cartellone e calendario
  add_rewrite_tag('%filtro%', '([^&]+)');
  add_rewrite_tag('%date%', '([^&]+)');
  add_rewrite_tag('%orario%', '([^&]+)');
  add_rewrite_tag('%keyword%', '([^&]+)');
  add_rewrite_rule('^risultati-ricerca/([^/]*)/?','index.php?page_id=1833&keyword=$matches[1]','top');
  add_rewrite_rule('^cartellone/([^/]*)/?','index.php?page_id=268&filtro=$matches[1]','top');
  add_rewrite_rule('^calendario-spettacoli/([^/]*)/([^/]*)/([^/]*)/?','index.php?page_id=332&date=$matches[1]&orario=$matches[2]&filtro=$matches[3]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);


add_action( 'parse_query', 'wtnerd_global_vars');

function wtnerd_global_vars() {
  global $post;
  if ( isset( $post->post_name ) ) {
    $post_name = $post->post_name;
  }
  else {
    $post_name = '';
  }

  if ( $post_name === 'cartellone' ) {
    global $wp_query;
    if ( isset ( $wp_query->query_vars['filtro'] ) ) {
    	global $filtro;
      global $term_tax;
      global $term_name;
      global $term_id;
      global $term_description;
    	$filtro = get_query_var('filtro');
      $term_slug = $filtro;
      $term_slug = $filtro;
      $taxonomies = get_taxonomies();
      foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
        if ( $term_object = get_term_by( 'slug', $term_slug , $taxonomy ) ) {
          break;
        }
      }
      $term_tax = $taxonomy;
      $term_name = $term_object->name;
      $term_id = $term_object->term_id;
      $term_description = strip_tags( $term_object->description );
    }
  }
}

add_filter( 'wpseo_title', 'sweety_page_title', 10, 1 );
function sweety_page_title($title){
  if ( is_page( 'cartellone' ) ) {
    $filtro = get_query_var('filtro');
    // We want to find the ID to this slug.
    $term_slug = $filtro;
    $taxonomies = get_taxonomies();
    foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
      if ( $term_object = get_term_by( 'slug', $term_slug , $taxonomy ) ) {
        $term_object_name = $term_object->name;
        break;
      }
    }
    if (  isset( $term_object_name ) ) {
      $title = $term_object_name . ' - Teatro Franco Parenti';
    }
    else {
      $title = 'Cartellone - Teatro Franco Parenti';
    }
    return $title;
  }
  return $title;
}

add_filter( 'wpseo_metadesc', 'my_gv_wpseo_metadesc', 10, 1 );
function my_gv_wpseo_metadesc( $desc ) {
  if ( is_page( 'cartellone' ) ) {
    $filtro = get_query_var('filtro');
    // We want to find the ID to this slug.
    $term_slug = $filtro;
    $taxonomies = get_taxonomies();
    foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
        // If term object is returned, break out of loop. (Returns false if there's no object)
        if ( $term_object = get_term_by( 'slug', $term_slug , $taxonomy ) ) {
            break;
        }
    }
    if ( isset( $term_object->description ) ) {
      $desc = strip_tags( $term_object->description );
      return $desc;
    }

  }
  return $desc;
}


add_filter( 'wpseo_canonical', 'my_gv_wpseo_canonical' );
function my_gv_wpseo_canonical( $canonical ) {
    if ( is_page( 'cartellone' ) ) {
        return add_query_arg( array() );
    }
    return $canonical;
}
