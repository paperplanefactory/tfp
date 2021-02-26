<?php
$mosiaco_size = get_field("tasselli_mosaico_homepage", "option");
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

$args_mosaic_1 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-1',
   )
 )
 );
$my_tiles_1 = get_posts( $args_mosaic_1 );

$args_mosaic_2 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-2',
   )
 )
 );
$my_tiles_2 = get_posts( $args_mosaic_2 );

$args_mosaic_3 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-3',
   )
 )
 );
$my_tiles_3 = get_posts( $args_mosaic_3 );

$args_mosaic_4 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-4',
   )
 )
 );
$my_tiles_4 = get_posts( $args_mosaic_4 );

$args_mosaic_5 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-5',
   )
 )
 );
$my_tiles_5 = get_posts( $args_mosaic_5 );

$args_mosaic_6 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-6',
   )
 )
 );
$my_tiles_6 = get_posts( $args_mosaic_6 );

$args_mosaic_7 = array(
 'post_type' => 'home_mosaico',
 'posts_per_page' => 1,
 'post_status' => $post_status,
 'tax_query' => array(
   array(
     'taxonomy' => 'home_mosaico_order',
     'field' => 'slug',
     'terms' => 'posizione-7',
   )
 )
 );
$my_tiles_7 = get_posts( $args_mosaic_7 );
?>

<div class="wrapper bg-18-color mosaic-cascade">
  <?php if ( $mosiaco_size === 'hold-home-7' ) : ?>
    <div class="flex-hold flex-hold-home-7">
      <div class="flex-hold-child">
        <div class="flex-hold-child-inner-full">
          <?php include( locate_template ( 'template-parts/homepage/home-7-1.php' ) ); ?>
        </div>
      </div>

      <div class="flex-hold-child">
        <div class="flex-hold-child-inner flex-hold-child-inner-half">
            <?php include( locate_template ( 'template-parts/homepage/home-7-2.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-half">
          <?php include( locate_template ( 'template-parts/homepage/home-7-3.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-full">
          <?php include( locate_template ( 'template-parts/homepage/home-7-4.php' ) ); ?>
        </div>
      </div>

      <div class="flex-hold-child flex-hold-child-tableted">
        <div class="flex-hold-child-inner flex-hold-child-inner-full flex-hold-child-inner-full-tableted">
          <?php include( locate_template ( 'template-parts/homepage/home-7-5.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-half flex-hold-child-inner-half-tableted">
          <?php include( locate_template ( 'template-parts/homepage/home-7-6.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-half flex-hold-child-inner-half-tableted">
            <?php include( locate_template ( 'template-parts/homepage/home-7-7.php' ) ); ?>
        </div>
      </div>
    </div>
  <?php elseif ( $mosiaco_size === 'hold-home-4' ) : ?>
    <div class="flex-hold flex-hold-home-4">
      <div class="flex-hold-child">
        <div class="flex-hold-child-inner-full">
          <?php include( locate_template ( 'template-parts/homepage/home-4-1.php' ) ); ?>
        </div>
      </div>

      <div class="flex-hold-child">
        <div class="flex-hold-child-inner flex-hold-child-inner-full">
            <?php include( locate_template ( 'template-parts/homepage/home-4-2.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-half">
          <?php include( locate_template ( 'template-parts/homepage/home-4-3.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-half">
          <?php include( locate_template ( 'template-parts/homepage/home-4-4.php' ) ); ?>
        </div>
      </div>
    </div>
  <?php elseif ( $mosiaco_size === 'hold-home-3' ) : ?>
    <div class="flex-hold flex-hold-home-3">
      <div class="flex-hold-child flex-hold-child-tableted">
        <div class="flex-hold-child-inner-full">
          <?php include( locate_template ( 'template-parts/homepage/home-3-1.php' ) ); ?>
        </div>
      </div>

      <div class="flex-hold-child flex-hold-child-tableted">
        <div class="flex-hold-child-inner flex-hold-child-inner-full flex-hold-child-inner-full-tableted">
            <?php include( locate_template ( 'template-parts/homepage/home-3-2.php' ) ); ?>
        </div>

        <div class="flex-hold-child-inner flex-hold-child-inner-full flex-hold-child-inner-full-tableted">
          <?php include( locate_template ( 'template-parts/homepage/home-3-3.php' ) ); ?>
        </div>
      </div>
    </div>
  <?php elseif ( $mosiaco_size === 'hold-home-1' ) : ?>
    <div class="flex-hold flex-hold-home-1">
      <div class="flex-hold-child">
        <div class="flex-hold-child-inner-one">
          <?php include( locate_template ( 'template-parts/homepage/home-1-1.php' ) ); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

</div>
