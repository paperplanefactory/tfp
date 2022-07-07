<?php
function call_all_area_attivita_primary_id() {
  if (class_exists('WPSEO_Primary_Term')) {
    $cat = new WPSEO_Primary_Term('area_attivita', get_the_ID());
    $cat = $cat->get_primary_term();

    if ( $cat != '' ) {
      $tipo_di_attivita = get_term_by('id', $cat, 'area_attivita');
      global $activity_id;
      $activity_id = $tipo_di_attivita->term_id;
    }

    else {
      // recupero la sua tag nazione
      $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
      // Loop over each item since it's an array
      if ( $terms_activity != null ){
      foreach( $terms_activity as $term_activity ) {
        // Print the name method from $term which is an OBJECT
        global $activity_id;
        $activity_id = $term_activity->term_id;
        unset($term_activity);
        }
      }
    }
  }

  else {
    // recupero la sua tag nazione
  $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
  // Loop over each item since it's an array
  if ( $terms_activity != null ){
  foreach( $terms_activity as $term_activity ) {
  // Print the name method from $term which is an OBJECT
  global $activity_id;
  $activity_id = $term_activity->term_id;
  unset($term_activity);
  } }
  }
}











function call_all_area_attivita_primary() {
  $archive_prefix = '/cartellone/';
  if (class_exists('WPSEO_Primary_Term')) {
    $cat = new WPSEO_Primary_Term('area_attivita', get_the_ID());
    $cat = $cat->get_primary_term();

    if ( $cat != '' ) {
      $tipo_di_attivita = get_term_by('id', $cat, 'area_attivita');
      global $activity_id;
      global $activity_color;
      $activity_id = $tipo_di_attivita->term_id;
      $activity_color = $tipo_di_attivita->slug;
      $activity_name = $tipo_di_attivita->name;
      echo '<a href="' . $archive_prefix . $activity_color . '" class="li-' . $activity_id . '-id">' . $activity_name . '</a>';
    }

    else {
      // recupero la sua tag nazione
      $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
      // Loop over each item since it's an array
      if ( $terms_activity != null ){
      foreach( $terms_activity as $term_activity ) {
        // Print the name method from $term which is an OBJECT
        global $activity_id;
        global $activity_color;
        $activity_id = $term_activity->term_id;
        $activity_color = $term_activity->slug;
        $activity_name = $term_activity->name;
        echo '<a href="' . $archive_prefix . $activity_color . '" class="li-' . $activity_id . '-id">' . $activity_name . '</a>';
        unset($term_activity);
        }
      }
    }
  }

  else {
    // recupero la sua tag nazione
  $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
  // Loop over each item since it's an array
  if ( $terms_activity != null ){
  foreach( $terms_activity as $term_activity ) {
  // Print the name method from $term which is an OBJECT
  global $activity_id;
  global $activity_color;
  $activity_id = $term_activity->term_id;
  $activity_color = $term_activity->slug;
  $activity_name = $term_activity->name;
  echo '<a href="' . $archive_prefix . $activity_color . '" class="li-' . $activity_id . '-id">' . $activity_name . '</a>';
  unset($term_activity);
  } }
  }
}


function call_all_area_attivita() {
  global $post;
  $archive_prefix = '/cartellone/';
  $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
  // Loop over each item since it's an array
  if ( $terms_activity != null ){
  foreach( $terms_activity as $term_activity ) {
  // Print the name method from $term which is an OBJECT
  global $activity_id;
  global $activity_color;
  $activity_id = $term_activity->term_id;
  $activity_color = $term_activity->slug;
  $activity_name = $term_activity->name;
  echo '<a href="' . $archive_prefix . $activity_color . '" class="li-' . $activity_id . '-id">' . $activity_name . '</a>';
  unset($term_activity);
  } }
}

function call_all_catgories() {
  $archive_prefix = '/category/';
  $terms_activity = get_the_terms( $post->ID , 'category' );
  // Loop over each item since it's an array
  if ( $terms_activity != null ){
  foreach( $terms_activity as $term_activity ) {
  // Print the name method from $term which is an OBJECT
  $activity_color = $term_activity->slug;
  $activity_name = $term_activity->name;
  if ( $activity_color != 'senza-categoria' ) {
    echo '<a href="' . $archive_prefix . $activity_color . '" class="' . $activity_color . '">' . $activity_name . '</a>';
  }

  unset($term_activity);
  } }
}

function call_all_percorsi() {
  global $post;
  $archive_prefix = '/cartellone/';
  $terms_percorsi = get_the_terms( $post->ID , 'percorsi' );
  // Loop over each item since it's an array
  if ( $terms_percorsi != null ) {
  foreach( $terms_percorsi as $term_percorsi ) {
  // Print the name method from $term which is an OBJECT
  $term_percorsi_slug = $term_percorsi->slug;
  $term_percorsi_name = $term_percorsi->name;
  echo '<a href="' . $archive_prefix . $term_percorsi_slug . '" class="">' . $term_percorsi_name . '</a>';
  unset($term_percorsi);
  } }
}

function call_all_percorsi_single() {
  global $post;
  $archive_prefix = '/cartellone/';
  $terms_percorsi = get_the_terms( $post->ID , 'percorsi' );
  // Loop over each item since it's an array
  if ( $terms_percorsi != null ) {
  echo ' - ';
  foreach( $terms_percorsi as $term_percorsi ) {
  // Print the name method from $term which is an OBJECT
  $term_percorsi_slug = $term_percorsi->slug;
  $term_percorsi_name = $term_percorsi->name;
  echo '<a href="' . $archive_prefix . $term_percorsi_slug . '" class="">' . $term_percorsi_name . '</a>';
  unset($term_percorsi);
  } }
}

function call_all_abbonamenti() {
  $archive_prefix = '/cartellone/';
  $terms_abbonamenti = get_the_terms( $post->ID , 'abbonamenti' );
  // Loop over each item since it's an array
  if ( $terms_abbonamenti != null ) {
  foreach( $terms_abbonamenti as $term_abbonamenti ) {
  // Print the name method from $term which is an OBJECT
  $term_abbonamenti_slug = $term_abbonamenti->slug;
  $term_abbonamenti_name = $term_abbonamenti->name;
  echo '<a href="' . $archive_prefix . $term_abbonamenti_slug . '" class="">' . $term_abbonamenti_name . '</a>';
  unset($term_abbonamenti);
  } }
}

function call_all_categoy_primary() {
  $archive_prefix = '/category/';
  if (class_exists('WPSEO_Primary_Term')) {
    $cat = new WPSEO_Primary_Term('category', get_the_ID());
    $cat = $cat->get_primary_term();

    if ( $cat != '' ) {
      $categoria = get_term_by('id', $cat, 'category');
      $categoria_slug = $categoria->slug;
      $categoria_name = $categoria->name;
      if ( $categoria_slug != 'senza-categoria' ) {
        echo '<a href="' . $archive_prefix . $categoria_slug . '" class="' . $categoria_slug . '">' . $categoria_name . '</a>';
      }

    }

    else {
      // recupero la sua tag nazione
      $terms_cat = get_the_terms( $post->ID , 'category' );
      // Loop over each item since it's an array
      if ( $terms_cat != null ){
      foreach( $terms_cat as $term_cat ) {
        // Print the name method from $term which is an OBJECT
        $categoria_slug = $term_cat->slug;
        $categoria_name = $term_cat->name;
        if ( $categoria_slug != 'senza-categoria' ) {
          echo '<a href="' . $archive_prefix . $categoria_slug . '" class="' . $categoria_slug . '">' . $categoria_name . '</a>';
        }

        unset($term_cat);
        }
      }
    }
  }

  else {
    // recupero la sua tag nazione
  $terms_cat = get_the_terms( $post->ID , 'category' );
  // Loop over each item since it's an array
  if ( $terms_cat != null ){
  foreach( $terms_cat as $term_cat ) {
  // Print the name method from $term which is an OBJECT
  $categoria_slug = $term_cat->slug;
  $categoria_name = $term_cat->name;
  if ( $categoria_slug != 'senza-categoria' ) {
    echo '<a href="' . $archive_prefix . $categoria_slug . '" class="' . $categoria_slug . '">' . $categoria_name . '</a>';
  }

  unset($term_cat);
  } }
  }
}

function call_prod_rep() {
  // recupero la sua tag nazione
  $terms_produzione = get_the_terms( $post->ID , 'prod_rep' );
  // Loop over each item since it's an array
  if ( $terms_produzione != null ){
  foreach( $terms_produzione as $term_produzione ) {
  // Print the name method from $term which is an OBJECT
  global $produzione_slug;
  global $produzione_name;
  $produzione_slug = $term_produzione->slug;
  $produzione_name = $term_produzione->name;
  unset($term_produzione);
  } }
}

function print_prod_rep() {
  // recupero la sua tag nazione
  $terms_produzione = get_the_terms( $post->ID , 'prod_rep' );
  // Loop over each item since it's an array
  if ( $terms_produzione != null ){
  foreach( $terms_produzione as $term_produzione ) {
  // Print the name method from $term which is an OBJECT
  global $produzione_slug;
  global $produzione_name;
  $produzione_slug = $term_produzione->slug;
  $produzione_name = $term_produzione->name;
  echo '<span>'.$produzione_name.'</span>';
  unset($term_produzione);
  } }
}


function call_tipo_spettacolo() {
  // recupero la sua tag nazione
  $terms_spettacolo = get_the_terms( $post->ID , 'tipo_spettacolo' );
  // Loop over each item since it's an array
  if ( $terms_spettacolo != null ){
  foreach( $terms_spettacolo as $term_spettacolo ) {
  // Print the name method from $term which is an OBJECT
  global $spettacolo_slug;
  $spettacolo_slug = $term_spettacolo->slug;
  echo '<span>' . $spettacolo_name = $term_spettacolo->name . '</span>';
  unset($term_spettacolo);
  } }
}

function call_tipo_spettacolo_without_production() {
  // recupero la sua tag nazione
  $terms_spettacolo = get_the_terms( $post->ID , 'tipo_spettacolo' );
  // Loop over each item since it's an array
  if ( $terms_spettacolo != null ){
  foreach( $terms_spettacolo as $term_spettacolo ) {
  // Print the name method from $term which is an OBJECT
  global $spettacolo_slug;
  $spettacolo_slug = $term_spettacolo->slug;
  if( $spettacolo_slug != 'produzioni' ){
    echo '<span>' . $spettacolo_name = $term_spettacolo->name . '</span>';
  }
  unset($term_spettacolo);
  } }
}



function call_all_area_attivita_primary_archive() {
  $archive_prefix = '/cartellone/';
  if (class_exists('WPSEO_Primary_Term')) {
    $cat = new WPSEO_Primary_Term('area_attivita', get_the_ID());
    $cat = $cat->get_primary_term();

    if ( $cat != '' ) {
      $tipo_di_attivita = get_term_by('id', $cat, 'area_attivita');
      global $activity_id;
      global $activity_color;
      $activity_id = $tipo_di_attivita->term_id;
      $activity_color = $tipo_di_attivita->slug;
      $activity_name = $tipo_di_attivita->name;
      echo '<span class="txt-' . $activity_id . '-id">' . $activity_name . '</span>';
    }

    else {
      // recupero la sua tag nazione
      $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
      // Loop over each item since it's an array
      if ( $terms_activity != null ){
      foreach( $terms_activity as $term_activity ) {
        // Print the name method from $term which is an OBJECT
        global $activity_id;
        global $activity_color;
        $activity_id = $term_activity->term_id;
        $activity_color = $term_activity->slug;
        $activity_name = $term_activity->name;
        echo '<span class="txt-' . $activity_id . '-id">' . $activity_name . '</span>';
        unset($term_activity);
        }
      }
    }
  }

  else {
    // recupero la sua tag nazione
  $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
  // Loop over each item since it's an array
  if ( $terms_activity != null ){
  foreach( $terms_activity as $term_activity ) {
  // Print the name method from $term which is an OBJECT
  global $activity_id;
  global $activity_color;
  $activity_id = $term_activity->term_id;
  $activity_color = $term_activity->slug;
  $activity_name = $term_activity->name;
  echo '<span class="txt-' . $activity_id . '-id">' . $activity_name . '</span>';
  unset($term_activity);
  } }
  }
}


function call_all_area_attivita_archive() {
  $archive_prefix = '/cartellone/';
  $terms_activity = get_the_terms( $post->ID , 'area_attivita' );
  // Loop over each item since it's an array
  if ( $terms_activity != null ){
  foreach( $terms_activity as $term_activity ) {
  // Print the name method from $term which is an OBJECT
  global $activity_id;
  global $activity_color;
  $activity_id = $term_activity->term_id;
  $activity_color = $term_activity->slug;
  $activity_name = $term_activity->name;
  echo '<span class="txt-' . $activity_id . '-id">' . $activity_name . '</span>';
  unset($term_activity);
  } }
}
