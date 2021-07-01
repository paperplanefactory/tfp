<?php
global $user;
global $allowed_roles;
$user = wp_get_current_user();
$allowed_roles = array('editor', 'administrator');
if( array_intersect( $allowed_roles, $user->roles ) ) {
  $post_status = array('publish', 'draft', 'future');
}
else {
  $post_status = array('publish');
}

$args_editorial_1 = array(
 'post_type' => 'home_scheda',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_schede_order',
     'field' => 'slug',
     'terms' => 'posizione-1',
   )
 )
 );
$my_editorial_1 = get_posts( $args_editorial_1 );

$args_editorial_2 = array(
 'post_type' => 'home_scheda',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_schede_order',
     'field' => 'slug',
     'terms' => 'posizione-2',
   )
 )
 );
$my_editorial_2 = get_posts( $args_editorial_2 );

$args_editorial_3 = array(
 'post_type' => 'home_scheda',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_schede_order',
     'field' => 'slug',
     'terms' => 'posizione-3',
   )
 )
 );
$my_editorial_3 = get_posts( $args_editorial_3 );

$args_editorial_4 = array(
 'post_type' => 'home_scheda',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_schede_order',
     'field' => 'slug',
     'terms' => 'posizione-4',
   )
 )
 );
$my_editorial_4 = get_posts( $args_editorial_4 );

$args_editorial_5 = array(
 'post_type' => 'home_scheda',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_schede_order',
     'field' => 'slug',
     'terms' => 'posizione-5',
   )
 )
 );
$my_editorial_5 = get_posts( $args_editorial_5 );

$args_editorial_6 = array(
 'post_type' => 'home_scheda',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_schede_order',
     'field' => 'slug',
     'terms' => 'posizione-6',
   )
 )
 );
$my_editorial_6 = get_posts( $args_editorial_6 );
 ?>
<div class="wrapper pad-top-1 pad-bottom-1">
  <div class="wrapper-padded">
    <div class="zero-title txt-7-color">
      <?php the_field( 'altro_ancora_al_parenti', 'option'); ?>
    </div>
      <div class="def-grid-editoriali">
        <div class="lefty">
          <div class="def-grid-editoriali-list">
            <?php
            foreach($my_editorial_1 as $post) : setup_postdata($post);
            $content_type = get_field( 'content_type' );
            switch ( $content_type ) {
              case 'post' :
              include( locate_template ( 'template-parts/homepage/editorial-single.php' ) );
              break;
              case 'banner' :
              include( locate_template ( 'template-parts/homepage/editorial-banner.php' ) );
              break;
              case 'aggregato' :
              include( locate_template ( 'template-parts/homepage/editorial-double.php' ) );
              break;
            }
          endforeach;

          foreach($my_editorial_2 as $post) : setup_postdata($post);
          $content_type = get_field( 'content_type' );
          switch ( $content_type ) {
            case 'post' :
            include( locate_template ( 'template-parts/homepage/editorial-single.php' ) );
            break;
            case 'banner' :
            include( locate_template ( 'template-parts/homepage/editorial-banner.php' ) );
            break;
            case 'aggregato' :
            include( locate_template ( 'template-parts/homepage/editorial-double.php' ) );
            break;
          }
        endforeach;

          foreach($my_editorial_3 as $post) : setup_postdata($post);
          $content_type = get_field( 'content_type' );
          switch ( $content_type ) {
            case 'post' :
            include( locate_template ( 'template-parts/homepage/editorial-single.php' ) );
            break;
            case 'banner' :
            include( locate_template ( 'template-parts/homepage/editorial-banner.php' ) );
            break;
            case 'aggregato' :
            include( locate_template ( 'template-parts/homepage/editorial-double.php' ) );
            break;
          }
        endforeach;

        foreach($my_editorial_4 as $post) : setup_postdata($post);
        $content_type = get_field( 'content_type' );
        switch ( $content_type ) {
          case 'post' :
          include( locate_template ( 'template-parts/homepage/editorial-single.php' ) );
          break;
          case 'banner' :
          include( locate_template ( 'template-parts/homepage/editorial-banner.php' ) );
          break;
          case 'aggregato' :
          include( locate_template ( 'template-parts/homepage/editorial-double.php' ) );
          break;
        }
      endforeach;

      foreach($my_editorial_5 as $post) : setup_postdata($post);
      $content_type = get_field( 'content_type' );
      switch ( $content_type ) {
        case 'post' :
        include( locate_template ( 'template-parts/homepage/editorial-single.php' ) );
        break;
        case 'banner' :
        include( locate_template ( 'template-parts/homepage/editorial-banner.php' ) );
        break;
        case 'aggregato' :
        include( locate_template ( 'template-parts/homepage/editorial-double.php' ) );
        break;
      }
    endforeach;

    foreach($my_editorial_6 as $post) : setup_postdata($post);
    $content_type = get_field( 'content_type' );
    switch ( $content_type ) {
      case 'post' :
      include( locate_template ( 'template-parts/homepage/editorial-single.php' ) );
      break;
      case 'banner' :
      include( locate_template ( 'template-parts/homepage/editorial-banner.php' ) );
      break;
      case 'aggregato' :
      include( locate_template ( 'template-parts/homepage/editorial-double.php' ) );
      break;
    }
  endforeach;

        ?>
          </div>
        </div>
        <div class="righty">
          <div class="def-grid-righty">
            <div class="righty-item">
              <div class="only-desktop">
                <?php dynamic_sidebar( 'sidebar-home' ); ?>
              </div>

            </div>

            <div class="righty-item">
              <?php include( locate_template ( 'template-parts/homepage/cartellone-cats-mobile.php' ) ); ?>
              <?php include( locate_template ( 'template-parts/banners/modulo-banner-home.php' ) ); ?>
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
