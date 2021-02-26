
<?php
$today = date('Y-m-d H:i:s');
$args_avvisi = array(
  'post_type' => 'avviso_importante',
  'posts_per_page' => 1,
  'meta_key' => 'data_ora_scadenza',
  'meta_query' => array(
    array(
      'key' => 'data_ora_scadenza',
      'value' => $today,
      'compare' => '>='
    )
  ),
);
query_posts( $args_avvisi );
$my_avvisi = get_posts( $args_avvisi ); foreach($my_avvisi as $post) : setup_postdata($post); ?>
<script>
$(document).ready(function() {
  var myCookie = Cookies.get('close-forever'); // => 'value'
  if (myCookie == null) {
    $('#cookie_box').show();
  }
  $('.cookie_box_close').click(function() {
  $('#cookie_box').hide();
  var in30Minutes = 1/48;
  Cookies.set('close-forever', 'yes', { expires: in30Minutes });
  //Cookies.set('close-forever', 'yes');
});

// sposto il pannello di ricerca se sono presenti avvisi
var moveSearch = $('#cookie_box').delay( 800 ).height();
$('#header-search').css('top', moveSearch);

$(window).scroll(function(){
  // sposto il pannello di ricerca se sono presenti avvisi
  var moveSearch = $('#cookie_box').delay( 800 ).height();
  $('#header-search').css('top', moveSearch);
});
});
</script>
<div id="cookie_box" class="avvisi-importanti bg-1-color txt-2-color">
  <div class="wrapper-padded">
    <a href="javascript:void(0);" class="avviso-importante-close cookie_box_close">
      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon-avviso-close.png" alt="Chiudi" />
    </a>
    <?php the_content(); ?>
  </div>
</div>
<?php endforeach; wp_reset_query(); ?>
