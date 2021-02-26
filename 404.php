<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

global $wp_query;
$query_vars = $wp_query->query_vars;
if ($query_vars['post_type'] == 'prossima-stagione'):
    wp_redirect('/spettacolo/' . $query_vars['name']);
    exit;
endif;
if ($query_vars['post_type'] == 'spettacolo'):
    wp_redirect('/archivio/' . $query_vars['name']);
    exit;
endif;

get_header();
?>


<?php
$args_404avvisi = array(
  'post_type' => '404_message',
  'posts_per_page' => 1,
  'orderby' => 'rand'
);
query_posts( $args_404avvisi );
$my_404avvisi = get_posts( $args_404avvisi ); foreach($my_404avvisi as $post) : setup_postdata($post); ?>
<div class="wrapper pad-top-2 pad-bottom-2 border-bottom">
  <div class="wrapper-padded">
    <h1><a href="<?php echo home_url(); ?>"><?php the_title(); ?></a></h1>
  </div>
</div>
<div class="wrapper pad-top-2 pad-bottom-2">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more-content content-styled">

    </div>
  </div>
</div>
<?php endforeach; wp_reset_query(); ?>
<?php get_footer(); ?>
