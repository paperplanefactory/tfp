<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header();

?>
<div class="wrapper pad-top-3 pad-bottom-1 border-bottom">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <h2>Notizie in: <?php single_term_title(); ?></h2>
      </div>
      <div class="fiftyfifty-grid-module-right">

      </div>
    </div>
  </div>
</div>



<div class="wrapper pad-top-2 pad-bottom-2">
  <div class="wrapper-padded">
    <?php if ( have_posts() ) : ?>
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
				<?php while ( have_posts() ) : the_post(); ?>
					<?php include( locate_template ( 'template-parts/grid-modules/def-grid-module-news.php' ) ); ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<div class="aligncenter">
			<h2>Nessun elemento corrisponde alla tua ricerca.</h2>
			</div>
		<?php endif; ?>
    <?php wp_reset_query(); ?>
		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link( '&laquo; Previous Entries' ); ?></div>
			<div class="alignright nav-next"><?php next_posts_link( 'Next Entries &raquo;', '' ); ?></div>
		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/grid-modules/infinite-message' ); ?>
<?php get_footer(); ?>
