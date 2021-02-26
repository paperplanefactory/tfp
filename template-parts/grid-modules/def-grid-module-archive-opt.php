<?php
$father_url = 'buzzi';
//recupero l'immagine di copertina
$thumb_id = get_post_thumbnail_id();
call_all_area_attivita_primary_id();
if ( $thumb_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'grid_picture', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/' . $activity_id . '-thumb.png';
}

// recupero i dati per stabilire se è padre o figlio e predisporre le interazioni
$my_id = get_the_ID();
$terms_relazione = get_the_terms( $post->ID , 'padre_figlio' );
// Loop over each item since it's an array
if ( $terms_relazione != null ){
  foreach( $terms_relazione as $term_relazione ) {
    $relazione_slug = $term_relazione->slug;
    unset($term_relazione);
  }
}
else {
  $relazione_slug = 'none';
}

$terms_relazione_specifica = get_the_terms( $post->ID , 'gestione_spettacolo_unico' );
// Loop over each item since it's an array
if ( $terms_relazione_specifica != null ){
  foreach( $terms_relazione_specifica as $term_relazione_specifica ) {
    $relazione_specifica_slug = $term_relazione_specifica->slug;
    unset($term_relazione_specifica);
  }
}
else {
  $relazione_specifica_slug = 'none';
}



// nel caso in cui sia un figlio recupero i dati del padre
if ( $relazione_slug === 'spettacolo-figlio' ) {
  $args_arch_padre = array(
   'post_type' => 'spettacolo_archivio',
   'posts_per_page' => 1,
   'meta_key' => 'program_periods_wp',
   'orderby' => 'meta_value',
   'order' => 'ASC',
   'tax_query' => array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'gestione_spettacolo_unico',
        'field'    => 'slug',
        'terms'    => $relazione_specifica_slug
    ),
    array(
        'taxonomy' => 'padre_figlio',
        'field'    => 'slug',
        'terms'    => 'spettacolo-contenitore'
    ),
  ),
   );
  $my_arch_padre = get_posts( $args_arch_padre );
  foreach($my_arch_padre as $post) : setup_postdata($post);
  $father_url = get_permalink();
  endforeach;
}
if ( !isset($father_url) ) {
  $final_permalink = $father_url;
}
else {
  $final_permalink = get_permalink();
}
$def_title = get_the_title();
if( has_term( 'produzioni', 'tipo_spettacolo' ) ) {
    $produzione = '<strong>Produzione</strong><br />';
}
else {
  $produzione = '';
}
wp_reset_postdata();
?>


  <div class="def-grid-module infinite-module">
    <div class="cta-1">
      <?php
      if ( is_user_logged_in() ) {
        echo 'Visibile solo se loggati: <br />';
        $key_1_value = get_post_meta( get_the_ID(), 'program_periods_wp', true );
        // Check if the custom field has a value.
        if ( ! empty( $key_1_value ) ) {
            echo $key_1_value;
        }
      }
         ?>
      <span class="category-list">
        <?php
        if (function_exists('call_all_area_attivita_primary_archive')) {
          call_all_area_attivita_primary_archive();
        }
        ?>
      </span>
    </div>
    <div class="image-box">
      <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
      <a href="<?php echo $final_permalink; ?>">
        <img src="<?php echo $thumb_url[0]; ?>" title="<?php echo $def_title; ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
      </a>
    </div>

    <div class="cta-1">
      <span class="category-list">
        <?php
        if (function_exists('print_prod_rep')) {
          print_prod_rep();
        }
        ?>
      </span>
    </div>

    <h4><a href="<?php echo $final_permalink; ?>"><?php echo $def_title; ?></a></h4>

    <?php if( get_field('subtitle') ) : ?>
      <h5><?php the_field('subtitle'); ?></h5>
    <?php endif; ?>

    <?php if ( $relazione_slug === 'spettacolo-contenitore' || $relazione_slug === 'spettacolo-figlio' ) : ?>
      <div class="cta-2 txt-5-color">
        <?php
        echo $produzione;
        $all_years = array();
        $num_children = count($post);
        $child_counter = 0;
        $args_arch_main = array(
         'post_type' => 'spettacolo_archivio',
         'posts_per_page' => -1,
         'meta_key' => 'program_periods_wp',
         'orderby' => 'meta_value',
         'order' => 'ASC',
         'tax_query' => array(
          'relation' => 'AND',
          array(
              'taxonomy' => 'gestione_spettacolo_unico',
              'field'    => 'slug',
              'terms'    => $relazione_specifica_slug
          ),

      ),
         );
        $my_arch_main = get_posts( $args_arch_main );
        foreach($my_arch_main as $post) : setup_postdata($post);
        $taxonomy = 'stagione'; //Put your custom taxonomy term here
      	$terms = wp_get_post_terms( $post->ID, $taxonomy );
      	foreach ( $terms as $term )
              {
      	if ($term->parent == 0) // this gets the parent of the current post taxonomy
      	{$myparent = $term;}
              }
      	// Right, the parent is set, now let's get the children
      	foreach ( $terms as $term ) {
      		if ($term->parent != 0) // this ignores the parent of the current post taxonomy
      		{
      		$child_term = $term; // this gets the children of the current post taxonomy
          $all_years[] = $child_term->name;
      		}
          }
          $exclusive_year = array_unique($all_years);

        $child_counter++;
         if ( $child_counter == count( $my_arch_main )  ) {
           $string=implode("<br />",$exclusive_year);
           echo $string;
         }
        //include( locate_template ( 'template-parts/taxonomies-handlers/stagione-archive-list.php' ) );
        ?>
        <!--
        <span class="category-list">
          <?php
          if (function_exists('call_tipo_spettacolo_without_production')) {
            call_tipo_spettacolo_without_production();
          }
          ?>
        </span>
        -->
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <div class="cta-2 txt-5-color">
        <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) ); ?>
        <span class="category-list">
          <?php
          if (function_exists('call_tipo_spettacolo_without_production')) {
            call_tipo_spettacolo_without_production();
          }
          ?>
        </span>
        <br />
      </div>
    <?php endif; ?>
  </div>
