<?php
/**
 * Template Name: Pagina con moduli xxx
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
            <div class="spettacolo-grid-share-desktop set-start">
              <div class="fixedElementSocial">
                <div class="social-hold cta-1">
                  Restiamo in contatto
                  <div class="">
                    <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
                    <div class="clearer"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="no-first">
              <?php
              $module_count = 0;
              if( have_rows('moduli') ) : while ( have_rows('moduli') ) : the_row();
              $module_count ++;
              $mod_radio = get_sub_field('scegli_modulo');
              switch ( $mod_radio ) {
                case 'mod-titolo' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-titolo.php' ) );
                echo '</div>';
                break;
                case 'mod-testo' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-testo.php' ) );
                echo '</div>';
                break;
                case 'mod-fullimage' :
                //include( locate_template ( 'template-parts/content-modules/modulo-fullimage.php' ) );
                break;
                case 'mod-incontro' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-incontro.php' ) );
                echo '</div>';
                break;
                case 'mod-frase-evidenza' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-frase-evidenza.php' ) );
                echo '</div>';
                break;
                case 'mod-frase-evidenza-piccola' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-frase-evidenza-piccola.php' ) );
                echo '</div>';
                break;
                case 'mod-slideshow' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-slideshow.php' ) );
                echo '</div>';
                break;
                case 'mod-sponsor-grande' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-sponsor-grande.php' ) );
                echo '</div>';
                break;
                case 'mod-sponsor' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-sponsor.php' ) );
                echo '</div>';
                break;
                case 'mod-recensioni' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-recensioni.php' ) );
                echo '</div>';
                break;
                case 'mod-download' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-download.php' ) );
                echo '</div>';
                break;
                case 'mod-expand' :
                include( locate_template ( 'template-parts/content-modules/modulo-espansione.php' ) );
                echo '</div>';
                break;
                case 'mod-testo-cornice' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-testo-cornice.php' ) );
                echo '</div>';
                break;
                case 'mod-subpages' :
                echo '<div class="prevent-overflow">';
                include( locate_template ( 'template-parts/content-modules/modulo-subpages.php' ) );
                echo '</div>';
                break;
              }
              endwhile; endif;

              ?>
            </div>

            <div class="spettacolo-grid-widget-share-tablet">
              <div class="cta-1">
                Restiamo in contatto
                <div class="bg-2-color">
                  <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
                  <div class="clearer"></div>
                </div>
              </div>
            </div>
            <div class="spettacolo-grid-widget-share-mobile">
              <div class="cta-1">
                Restiamo in contatto
                <div class="bg-2-color">
                  <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
                  <div class="clearer"></div>
                </div>
              </div>
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
          <div class="info-preliminari cta-2">
            <?php
            if ( 0 == $post->post_parent ) : ?>
                <div class="cta-1 sub-pages-parent">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
            <?php else :
              $parents = get_post_ancestors( $post->ID );
              $id_parent = ($parents) ? $parents[count($parents)-1]: $post->ID;
              $parent_title = apply_filters( "the_title", get_the_title( end ( $parents ) ) );
              $parent_permalink = apply_filters( "the_permalink", get_the_permalink( end ( $parents ) ) );
              ?>
              <div class="cta-1 sub-pages-parent">
                <a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a>
              </div>
            <?php endif; ?>
            <?php
            if ( 0 == $post->post_parent ) : ?>
            <ul class="sub-pages-side">
              <?php
              $children = array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $exclude_me,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
              );
              $list_children = get_posts( $children );
              foreach($list_children as $post) : setup_postdata($post); ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php else : ?>
              <ul class="sub-pages-side">
                <?php
                $children = array(
                  'post_type'      => 'page',
                  'posts_per_page' => -1,
                  'post_parent'    => $id_parent,
                  'order'          => 'ASC',
                  'orderby'        => 'menu_order'
                );
                $list_children = get_posts( $children );
                foreach($list_children as $post) : setup_postdata($post); ?>
                <li>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                <?php endforeach; ?>
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
