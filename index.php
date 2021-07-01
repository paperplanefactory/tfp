<?php
/**
 * The main template file.
 */

get_header();
$opening_layout = get_field("opening_layout", "option");
// richiamo il mosaico
if ( $opening_layout === 'mosaico' ) {
  include( locate_template ( 'template-parts/homepage/mosiac-hold.php' ) );
}
elseif ( $opening_layout === 'box-singolo' ) {
  include( locate_template ( 'template-parts/homepage/single-box.php' ) );
}

?>
<?php
$home_calendar_show = get_field("home_calendar_show", "option");
if ( $home_calendar_show === 'si' ) : ?>

<?php
global $wp_query;
if ( isset ( $wp_query->query_vars['date'] ) ) {
  $date = $wp_query->query_vars['date'];
  $start_date = substr($date, 0, -8);
  $end_date = substr($date, 8, 16);
}
if ( isset ( $wp_query->query_vars['orario'] ) ) {
  $start_hour = $wp_query->query_vars['orario'];
}
if ( isset ( $wp_query->query_vars['filtro'] ) ) {
  $filtro = $wp_query->query_vars['filtro'];
  $term = term_exists( $filtro, 'area_attivita' );
  if ( $term !== 0 && $term !== null ) {
      $term_tax = 'area_attivita';
      $term = get_term_by('slug', $filtro, 'area_attivita');
      $term_id = $term->term_id;
      $term_name = $term->name;
  }

  $term = term_exists( $filtro, 'abbonamenti' );
  if ( $term !== 0 && $term !== null ) {
      $term_tax = 'abbonamenti';
      $term = get_term_by('slug', $filtro, 'abbonamenti');
      $term_id = $term->term_id;
      $term_name = $term->name;
  }

  $term = term_exists( $filtro, 'percorsi' );
  if ( $term !== 0 && $term !== null ) {
      $term_tax = 'percorsi';
      $term = get_term_by('slug', $filtro, 'percorsi');
      $term_id = $term->term_id;
      $term_name = $term->name;
  }
}
?>

<?php
if ( $isMobile == 1 ) {
  //include( locate_template ( 'template-parts/menus-and-utilities/search-box-calendar-home-mobile.php' ) );
}
if ( $isDesktop == 1 || $isTablet == 1 ) {
  include( locate_template ( 'template-parts/menus-and-utilities/search-box-calendar-home.php' ) );
}
?>




<div class="only-desktop">
  <div class="wrapper pad-bottom-1 min-small-height-box no-overflow">
    <div id="loading"></div>
    <div id="result"></div>
  </div>
</div>




<script type="text/javascript">
term_name = '';
term_id = '';
term_slug = '';
filtro = '';
here = 'home';
</script>
<?php endif; ?>

<?php
// richiamo gli editoriali
include( locate_template ( 'template-parts/homepage/editorial-hold.php' ) );
if ( $opening_layout === 'box-singolo' && get_field( 'box_half_page_text', 'option' ) ) : ?>
<!--
<div class="wrapper">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more">
      <div class="wrapper-padded-more-content">
        <div class="half-page-message">
          <?php the_field( 'box_half_page_text', 'option' ); ?>
          <?php if ( get_field( 'box_half_page_cta', 'option' ) ) : ?>
            <br />
            <a href="<?php the_field( 'box_half_page_cta_url', 'option' ); ?>" target="<?php the_field( 'box_half_page_cta_target', 'option' ); ?>" class="btn-fill red cta-4 allupper"><?php the_field( 'box_half_page_cta', 'option' ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<?php endif; ?>
<?php  ?>
<?php
// richiamo le news o le pagine
$home_news_or_pages = get_field("home_news_or_pages", "option");
if ( $home_news_or_pages === 'news' ) : ?>
<?php include( locate_template ( 'template-parts/homepage/news-hold.php' ) ); ?>

<?php elseif ( $home_news_or_pages === 'pagine-banner' ) : ?>
  <?php include( locate_template ( 'template-parts/homepage/page-banner-hold.php' ) ); ?>
<?php elseif ( $home_news_or_pages === 'pagine' ) : ?>
    <?php include( locate_template ( 'template-parts/homepage/page-hold.php' ) ); ?>
<?php endif; ?>

<?php get_footer(); ?>
