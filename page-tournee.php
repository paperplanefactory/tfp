<?php
/**
 * Template Name: Tournee
*/

get_header();
//stabilisco la stagione corrente per filtrare gli spettacoli
$stagione_corrente = get_field("scegli_stagione_corrente", "option");
$stagione = get_term_by('id', $stagione_corrente, 'stagione');
$stagione_name = $stagione->name;
$stagione_name_slug = $stagione->slug;
?>

<div class="wrapper pad-top-3 pad-bottom-1 border-bottom">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <h2>Tournée <?php echo $stagione_name; ?></h2>
      </div>
      <div class="fiftyfifty-grid-module-right">

      </div>
    </div>
  </div>
</div>

<div class="wrapper pad-top-2 pad-bottom-2">
  <div class="wrapper-padded">
    <?php
    $tax_query = array('relation' => 'AND');
    $tax_query[] =  array(
      'taxonomy' => 'stagione',
      'field' => 'slug',
      'terms' => $stagione_name_slug
    );
    $tax_query[] =  array(
      'taxonomy' => 'tipo_spettacolo',
      'field' => 'slug',
      'terms' => 'tournee',
      );
      $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args_arch_main = array(
        'post_type' => 'spettacolo',
        'posts_per_page' => 24,
        'tax_query' => $tax_query,
        'paged' => $page,
        'meta_key' => 'ordinamento_tournee',
        'orderby' => 'meta_value',
        'order' => 'ASC'
      );
      query_posts( $args_arch_main );
      if ( have_posts() ) : ?>
      <script>
$(document).ready(function() {
  $('.grid-infinite').infiniteScroll({
  // options
  path: '.nav-next a',
  append: '.infinite-module',
  status: '#infscr-loading',
  history: false,
});

$('.grid-infinite').on( 'append.infiniteScroll', function( event, response, path, items ) {
  (function($){
    $("img.lazymage, img.lazy, div.lazy, li.lazy").lazyload({
    effect : "fadeIn",
    load : function() {
      $(".lazy-placehoder").fadeOut(150);
    }
    });
  })(jQuery);
});
window.setInterval(function(){
   if ( $('.infinite-scroll-last').is(":visible") ) {
     $('#infscr-loading').fadeOut(300);
   }
 }, 5000);
});

</script>
      <div class="def-grid grid-infinite">
        <?php while ( have_posts() ) : the_post();
        $genitore = get_field('genitore');
        $gestione_spettacolo_con_archivio = get_field('gestione_spettacolo_con_archivio');
        include( locate_template ( 'template-parts/grid-modules/def-grid-module-tournee.php' ) );
      endwhile; ?>
    </div>
  <?php else : ?>
  </div>
  <div class="aligncenter">
    <h2>Non sono ancora presenti elementi in questa sezione.</h2>
  </div>
<?php endif; ?>




<div class="navigation">
<div class="alignleft"><?php previous_posts_link( '&laquo; Previous Entries' ); ?></div>
<div class="alignright nav-next"><?php next_posts_link( 'Next Entries &raquo;', '' ); ?></div>
</div>
</div>
</div>

<?php get_template_part( 'template-parts/grid-modules/infinite-message' ); ?>

<?php get_footer(); ?>
