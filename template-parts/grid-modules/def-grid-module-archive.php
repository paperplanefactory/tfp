<?php
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

// --------------
if ( $relazione_slug === 'spettacolo-figlio' ) {
  $args_arch_padre = array(
   'post_type' => 'spettacolo_archivio',
   'posts_per_page' => 1,
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



// --------------


include( locate_template ( 'template-parts/taxonomies-handlers/tipo-spettacolo.php' ) );
$thumb_id = get_post_thumbnail_id();
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

?>
<?php if ( $relazione_slug === 'spettacolo-contenitore' ) : ?>
  <?php
  $args_arch_sub = array(
   'post_type' => 'spettacolo_archivio',
   'posts_per_page' => 1,
   'order'				=> 'ASC',
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
        'terms'    => $relazione_slug
    ),
),
   );
  $my_arch_sub = get_posts( $args_arch_sub );
  foreach($my_arch_sub as $post) : setup_postdata($post);
  $thumb_id = get_post_thumbnail_id();
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
  $terms_relazione_specifica = get_the_terms( $post->ID , 'gestione_spettacolo_unico' );
  // Loop over each item since it's an array
  if ( $terms_relazione_specifica != null ){
    foreach( $terms_relazione_specifica as $term_relazione_specifica ) {
      $relazione_specifica_slug = $term_relazione_specifica->slug;
      unset($term_relazione_specifica);
    }
  }
  ?>
  <div class="def-grid-module infinite-module" data-position="<?php include( locate_template ( 'template-parts/date-modules/riepilogo-date-archivio.php' ) ); ?>">
    <div class="cta-1">
      <span class="category-list">
        <?php
        if (function_exists('call_all_area_attivita_primary')) {
          call_all_area_attivita_primary();
        }
        ?>
      </span>
    </div>
    <div class="image-box">
      <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
      <a href="<?php the_permalink(); ?>">
        <img src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
      </a>

    </div>
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php if( get_field('subtitle') ) : ?>
      <h5><?php the_field('subtitle'); ?></h5>
    <?php endif; ?>
    <div class="cta-2 txt-5-color">
      <?php
      $args_arch_main = array(
       'post_type' => 'spettacolo_archivio',
       'posts_per_page' => -1,
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
      include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
      ?>
      <span class="category-list">
        <?php
        if (function_exists('call_tipo_spettacolo')) {
          call_tipo_spettacolo();
        }
        ?>
      </span>
      <br />

      <?php endforeach; ?>
    </div>
    <!--
    <?php if( get_field('abstract') ) : ?>
      <div class="content-styled abs-to-hide">
        <?php the_field('abstract'); ?>
      </div>
    <?php endif; ?>
    -->
  </div>
  <?php endforeach; ?>

<?php elseif ( $relazione_slug === 'spettacolo-figlio' ) : ?>
  <?php
  $args_arch_sub = array(
   'post_type' => 'spettacolo_archivio',
   'posts_per_page' => 1,
   'order'				=> 'ASC',
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
        'terms'    => 'spettacolo-figlio'
    ),
),
   );
  $my_arch_sub = get_posts( $args_arch_sub );
  foreach($my_arch_sub as $post) : setup_postdata($post);




  $thumb_id = get_post_thumbnail_id();
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
  $terms_relazione_specifica = get_the_terms( $post->ID , 'gestione_spettacolo_unico' );
  // Loop over each item since it's an array
  if ( $terms_relazione_specifica != null ){
    foreach( $terms_relazione_specifica as $term_relazione_specifica ) {
      $relazione_specifica_slug = $term_relazione_specifica->slug;
      unset($term_relazione_specifica);
    }
  }
  ?>
  <div class="def-grid-module infinite-module" data-position="<?php include( locate_template ( 'template-parts/date-modules/riepilogo-date-archivio.php' ) ); ?>">
    <div class="cta-1">
      <span class="category-list">
        <?php
        if (function_exists('call_all_area_attivita_primary')) {
          call_all_area_attivita_primary();
        }
        ?>
      </span>
    </div>
    <div class="image-box">
      <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
      <a href="<?php echo $father_url; ?>">
        <img src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
      </a>
    </div>
    <h4><a href="<?php echo $father_url; ?>"><?php the_title(); ?></a></h4>
    <?php if( get_field('subtitle') ) : ?>
      <h5><?php the_field('subtitle'); ?></h5>
    <?php endif; ?>
    <div class="cta-2 txt-5-color">
      <?php
      $args_arch_main = array(
       'post_type' => 'spettacolo_archivio',
       'posts_per_page' => -1,
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
      include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
      ?>
      <span class="category-list">
        <?php
        if (function_exists('call_tipo_spettacolo')) {
          call_tipo_spettacolo();
        }
        ?>
      </span>
      <br />

      <?php endforeach; ?>
    </div>
    <!--
    <?php if( get_field('abstract') ) : ?>
      <div class="content-styled abs-to-hide">
        <?php the_field('abstract'); ?>
      </div>
    <?php endif; ?>
    -->
  </div>
  <?php endforeach; ?>






<?php else : ?>
  <div class="def-grid-module infinite-module" data-position="<?php include( locate_template ( 'template-parts/date-modules/riepilogo-date-archivio.php' ) ); ?>">
    <div class="cta-1">
      <span class="category-list">
        <?php
        if (function_exists('call_all_area_attivita_primary')) {
          call_all_area_attivita_primary();
        }
        ?>
      </span>
    </div>
    <div class="image-box">
      <div class="cat-stripe bg-<?php echo $activity_id; ?>-id"></div>
      <a href="<?php the_permalink(); ?>">
        <?php
        $thumb_id = get_post_thumbnail_id();
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
         ?>
        <img src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
      </a>
    </div>
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    <?php if( get_field('subtitle') ) : ?>
      <h5><?php the_field('subtitle'); ?></h5>
    <?php endif; ?>
    <div class="cta-2 txt-5-color">
      <?php
      $args_arch_main = array(
       'post_type' => 'spettacolo_archivio',
       'posts_per_page' => -1,
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
      include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
      ?>
      <span class="category-list">
        <?php
        if (function_exists('call_tipo_spettacolo')) {
          call_tipo_spettacolo();
        }
        ?>
      </span>
      <br />

      <?php endforeach; ?>
    </div>
    <!--
    <?php if( get_field('abstract') ) : ?>
      <div class="content-styled abs-to-hide">
        <?php the_field('abstract'); ?>
      </div>
    <?php endif; ?>
    -->
  </div>
<?php endif; ?>
