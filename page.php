<?php
/**
 * Template Name: Template generico
*/

get_header();
?>
<?php while ( have_posts() ) : the_post();
?>
<div class="wrapper pad-top-2 pad-bottom-2 border-bottom">
  <div class="wrapper-padded">
    <h1><?php the_title(); ?></h1>
  </div>
</div>
<div class="wrapper pad-top-2 pad-bottom-2">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more-content content-styled">
      <?php the_content(); ?>
    </div>
  </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
