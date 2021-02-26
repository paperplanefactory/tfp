<?php
/**
 * The Template for displaying all single cpt.
 */

get_header();
?>
<?php while ( have_posts() ) : the_post();
$my_id = get_the_ID();
$thumb_id = get_post_thumbnail_id();
if ( $thumb_id != '' ) {
  if ( $isMobile == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'content_picture', true);
  }
  if ( $isTablet == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
  }
  if ( $isDesktop == 1 ) {
    $thumb_url = wp_get_attachment_image_src($thumb_id,'full_tab', true);
  }
}
else {
  $thumb_url[0] = '/web/themes/tfp/images/placeholders/0.png';
}
$rela = get_field('s_to_s');
?>


<div class="wrapper first-after-header-double">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more">
      <div class="spettacolo-grid-new">
        <div class="spettacolo-grid-new-top">
          <div class="category cta-1">
            <span class="category-list">
              <?php
              if (function_exists('call_all_catgories')) {
                call_all_catgories();
              }
              ?>
            </span>
          </div>
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="spettacolo-grid-new-left">
          <div class="post-image">
            <?php if( get_field('cover-video') ) : ?>
              <div class="video_frame">
                <?php the_field('cover-video'); ?>
              </div>
            <?php else : ?>
              <img class="lazy" data-original="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
            <?php endif; ?>
          </div>
          <div class="didascalia cta-2 txt-5-color">
            <?php echo apply_filters( 'the_post_thumbnail_caption', get_the_post_thumbnail_caption( $post ) ); ?>
          </div>
          <div class="contents first-after-header-double">
            <div class="spettacolo-grid-share-desktop">
              <?php include( locate_template ( 'template-parts/menus-and-utilities/share-btns.php' ) ); ?>
            </div>
            <div class="modulo-testo content-styled">
              <div class="padder">
                <?php the_content(); ?>
                <div class="clearer"></div>
              </div>
            </div>
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
              case 'mod-cicli' :
              include( locate_template ( 'template-parts/content-modules/modulo-cicli.php' ) );
              break;
            }
            endwhile; endif;

            ?>
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
          <?php
          dynamic_sidebar( 'sidebar-spettacolo' );

          include( locate_template ( 'template-parts/banners/modulo-banner.php' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="set-end"></div>





<?php endwhile; ?>
<div class="min-medium-height-box"</div>
  <div class="wrapper bg-7-color z-index-trick">
    <div class="wrapper-padded zero-title-padtop">
      <div class="zero-title txt-2-color">
        <?php the_field( 'le_altre_notizie', 'option'); ?>
      </div>
      <div class="def-grid">
          <?php
          $args_rel = array(
           'post_type' => 'post',
           'posts_per_page' => 4,
           'exclude' => $my_id
           );
          $my_rel = get_posts( $args_rel );
          foreach($my_rel as $post) : setup_postdata($post);
          include( locate_template ( 'template-parts/grid-modules/def-grid-module-news.php' ) );
          endforeach; ?>

      </div>
    </div>
  </div>
<?php get_footer(); ?>
