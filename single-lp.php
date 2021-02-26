<?php
/**
 * The Template for displaying all single cpt.
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
?>
<div class="landing-opening lazy" data-original="<?php echo $thumb_url[0]; ?>">
  <div class="landing-logo-stripe"></div>
  <div class="landing-logo"><a href="<?php echo home_url(); ?>" rel="bookmark" title="Teatro Franco Parenti - Homepage" class="absl"></a></div>
  <div class="landing-title txt-2-color">
    <h1><?php the_title(); ?></h1>
    <?php if( get_field('subtitle') ) : ?>
      <h2><?php the_field('subtitle'); ?></h2>
    <?php endif; ?>
  </div>
</div>




<div class="wrapper">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more-spettacolo">
      <div class="landing-grid">
        <div class="landing-grid-left order-2">
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
        <div class="landing-grid-right order-1">
          <div class="sticked-bis">
            <?php if( get_field('date') ) : ?>
              <h4><?php the_field('date'); ?></h4>
            <?php endif; ?>
            <?php if( get_field('testo_cta') ) : ?>
              <a href="<?php the_field('url_cta'); ?>" class="btn-fill red cta-4 allupper last" target="_blank" onClick="_gaq.push(['_trackEvent', 'landing_page_cta', 'click', '<?php the_title(); ?>', '0']);">
                <?php the_field('testo_cta'); ?>
              </a>
            <?php endif; ?>
            <?php if( get_field('info_cta') ) : ?>
              <div class="cta-2 padder-landing bg-7-color">
                <?php the_field('info_cta'); ?>
              </div>
            <?php endif; ?>
            <div class="cta-2 padder-landing-share">
              <strong><?php the_field('messaggio_inoltro_mail'); ?></strong><br />
              <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank" class="overlay-social social-fb"></a>
              <a href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank" class="overlay-social social-wa"></a>
              <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="overlay-social social-tg"></a>
              <a href="mailto:?subject=Teatro Franco Parenti - <?php the_title(); ?>&body=Promo Teatro Franco Parenti: <?php the_permalink(); ?>" target="_blank" class="overlay-social social-mail"></a>
              <div class="clearer"></div>
            </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="set-end"></div>





<?php endwhile; ?>
<?php get_footer(); ?>
