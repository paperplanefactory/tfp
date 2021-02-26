<?php if (is_home()) : ?>
    <?php
    $today = date('Y-m-d H:i:s');
    $args_popup = array(
      'post_type' => 'popup',
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
    query_posts( $args_popup );
    $my_popup = get_posts( $args_popup ); foreach($my_popup as $post) : setup_postdata($post);
    $post_slug = get_the_ID();
    $cookie_expry = get_field('scadenza_cookie');
    $thumb_id = get_post_thumbnail_id();
    if ( $isMobile == 1 ) {
      $thumb_url = wp_get_attachment_image_src($thumb_id,'full_desk', true);
    }
    if ( $isTablet == 1 ) {
      $thumb_url = wp_get_attachment_image_src($thumb_id,'full_desk', true);
    }
    if ( $isDesktop == 1 ) {
      $thumb_url = wp_get_attachment_image_src($thumb_id,'full_desk', true);
    }
     ?>
    <script>
    $(document).ready(function() {
      var myCookie<?php echo $post_slug; ?> = Cookies.get('close-forever'); // => 'value'
      if (myCookie<?php echo $post_slug; ?> == null) {
        $('#cookie_box').fadeIn(300);
      }
      $('.cookie_box_close_forever, .cookie_box_close').click(function() {
      $('#cookie_box').fadeOut(300);
      Cookies.set('close-forever', 'yes', { expires: <?php echo $cookie_expry; ?> });
    });
    $(document).click(function(e) {
      var $container = $('#cookie_box');
      // if the target of the click isn't the container nor a descendant of the container
      if ($container.is(e.target)) {
        $('#cookie_box').fadeOut(300);
        Cookies.set('close-forever', 'yes', { expires: <?php echo $cookie_expry; ?> });
      }
    });
  });
  </script>
    <div id="cookie_box" class="popup-overlay">
      <div class="popup-shape" style="background-image: url(<?php echo $thumb_url[0]; ?>)">
        <div class="popup-close cta-4 txt-2-color allupper">
          <a href="javascript:void(0);" class="cookie_box_close wh">
            chiudi x
          </a>
        </div>
        <div class="popup-contents aligncenter">
          <div class="padder">
            <h2 class="h1-inline txt-2-color shadow-wise-white"><?php the_title(); ?></h2>
            <?php if ( get_field( 'sottotitolo' ) ) : ?>
              <h2 class="txt-2-color shadow-wise-white"><?php the_field( 'sottotitolo' ); ?></h2>
            <?php endif; ?>
            <?php if ( get_field( 'cta' ) ) : ?>
              <br />
              <a href="<?php the_field( 'cta_link' ); ?>" target="<?php the_field( 'cta_target' ); ?>" class="btn-fill red cta-4 allupper"><?php the_field("cta"); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; wp_reset_query(); ?>
<?php endif; ?>
