<?php
/**
 * Template Name: Pagina con moduli
*/

get_header();
?>
<?php while ( have_posts() ) : the_post();
$exclude_me = get_the_ID();
$thumb_id = get_post_thumbnail_id();
if ( $isMobile == 1 ) {
  $thumb_url = wp_get_attachment_image_src($thumb_id,'content_picture', true);
}
if ( $isTablet == 1 ) {
  $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
}
if ( $isDesktop == 1 ) {
  $thumb_url = wp_get_attachment_image_src($thumb_id,'full_desk', true);
}
$usare_immagine = get_field('usare_immagine');
if ( $usare_immagine === 'si' ) :
?>
<div class="fullscreen-image lazy" data-original="<?php echo $thumb_url[0]; ?>">

</div>
<?php else : ?>
<div class="pad-top-2">

</div>
<?php endif; ?>





<div class="wrapper first-after-header">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more-spettacolo">
      <div class="spettacolo-grid-new">
        <div class="spettacolo-grid-new-top">
          <div class="breadcrumbs breadcrumbs-hide cta-2" typeof="BreadcrumbList" vocab="http://schema.org/">
              <?php if(function_exists('bcn_display'))
              {
                  bcn_display();
              }?>
          </div>
          <div class="">
            <h1><?php the_title(); ?></h1>
            <?php if( get_field('subtitle') ) : ?>
              <h2><?php the_field('subtitle'); ?></h2>
            <?php endif; ?>
          </div>
        </div>
        <div class="spettacolo-grid-new-left">
          <div class="spettacolo-grid-date-avvisi-mobile">
          </div>

          <div class="contents">
            <div class="spettacolo-grid-share-desktop">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
            </div>
            <div class="no-first">
              <?php include( locate_template ( 'template-parts/banners/modulo-banner-loghi.php' ) ); ?>
              <?php
              $module_count = 0;
              if( have_rows('moduli') ) : while ( have_rows('moduli') ) : the_row();
              $module_count ++;
              $mod_radio = get_sub_field('scegli_modulo');
              switch ( $mod_radio ) {
                case 'mod-titolo' :
                include( locate_template ( 'template-parts/content-modules/modulo-titolo.php' ) );
                break;
                case 'mod-testo' :
                include( locate_template ( 'template-parts/content-modules/modulo-testo.php' ) );
                break;
                case 'mod-incontro' :
                include( locate_template ( 'template-parts/content-modules/modulo-incontro.php' ) );
                break;
                case 'mod-frase-evidenza' :
                include( locate_template ( 'template-parts/content-modules/modulo-frase-evidenza.php' ) );
                break;
                case 'mod-frase-evidenza-piccola' :
                include( locate_template ( 'template-parts/content-modules/modulo-frase-evidenza-piccola.php' ) );
                break;
                case 'mod-slideshow' :
                include( locate_template ( 'template-parts/content-modules/modulo-slideshow.php' ) );
                break;
                case 'mod-sponsor-grande' :
                include( locate_template ( 'template-parts/content-modules/modulo-sponsor-grande.php' ) );
                break;
                case 'mod-sponsor' :
                include( locate_template ( 'template-parts/content-modules/modulo-sponsor.php' ) );
                break;
                case 'mod-recensioni' :
                include( locate_template ( 'template-parts/content-modules/modulo-recensioni.php' ) );
                break;
                case 'mod-download' :
                include( locate_template ( 'template-parts/content-modules/modulo-download.php' ) );
                break;
                case 'mod-expand' :
                include( locate_template ( 'template-parts/content-modules/modulo-espansione.php' ) );
                break;
                case 'mod-testo-cornice' :
                include( locate_template ( 'template-parts/content-modules/modulo-testo-cornice.php' ) );
                break;
                case 'mod-subpages' :
                include( locate_template ( 'template-parts/content-modules/modulo-subpages.php' ) );
                break;
              }
              endwhile; endif;

              ?>
            </div>

            <div class="spettacolo-grid-widget-share-tablet">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
            </div>
            <div class="spettacolo-grid-widget-share-mobile">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
              <?php
              dynamic_sidebar( 'sidebar-spettacolo' );

              include( locate_template ( 'template-parts/banners/modulo-banner.php' ) ); ?>
            </div>
          </div>
        </div>
        <div class="spettacolo-grid-new-right">
          <?php if( get_field('titolo_lato') ) : ?>
            <h4><?php the_field('titolo_lato'); ?></h4>
          <?php endif; ?>
          <?php if( get_field('contenuto_lato') ) : ?>
            <?php the_field('contenuto_lato'); ?>
          <?php endif; ?>
          <?php $side_navi = get_field( 'show-sub-pages-sidebar' );
          if ( $side_navi === 'si' ) : ?>
          <br />
          <div class="info-preliminari cta-2">
            <div class="cta-1 sub-pages-parent">
              <?php the_field( 'titolo_cappello' ); ?>
            </div>
            <?php if( have_rows('aggiungi_pagine_sidebar') ) : ?>
              <ul class="sub-pages-side">
                <?php while ( have_rows('aggiungi_pagine_sidebar') ) : the_row();
                $link = get_sub_field('scegli_pagina_sidebar'); ?>
                  <li>
                    <a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php
          $mostrare_sidebar = get_field( 'mostrare_sidebar' );
          if ( $mostrare_sidebar === 'si' ) {
            dynamic_sidebar( 'sidebar-spettacolo' );
          }

          include( locate_template ( 'template-parts/banners/modulo-banner.php' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="set-end"></div>


<?php
$full_closure = get_field( 'immagine_chiusura' );
if ( $full_closure === 'si' ) {
  include( locate_template ( 'template-parts/content-modules/modulo-fullimage.php' ) );
}
 ?>












<?php
$show_sub_pages = get_field('show-sub-pages');
if ( $show_sub_pages === 'si' ) : ?>
  <div class="wrapper bg-7-color z-index-trick">
    <div class="wrapper-padded zero-title-padtop">
      <div class="zero-title txt-2-color pad-bottom-2">
        Scopri anche
      </div>
      <div class="def-grid-bottom">
        <?php $my_parent = wp_get_post_parent_id( $exclude_me );
        $args_sub_pages = array(
         'post_parent' => $my_parent,
         'post_type' => 'page',
         'posts_per_page' => -1,
         'orderby' => 'menu_order',
         'order' => 'ASC',
         'exclude' => $exclude_me
         );
        $my_sub_pages = get_children( $args_sub_pages );
        foreach($my_sub_pages as $post) : setup_postdata($post); ?>
        <?php include( locate_template ( 'template-parts/grid-modules/def-grid-module-page.php' ) );
        endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>






<div class="min-medium-height-box"></div>
<?php endwhile; ?>
<?php get_footer(); ?>
