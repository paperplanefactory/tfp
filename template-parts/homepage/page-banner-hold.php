<?php
if ( $isMobile == 1 ) {
  $show_news = 3;
}
if ( $isTablet == 1 ) {
  $show_news = 3;
}
if ( $isDesktop == 1 ) {
  $show_news = 4;
}

$mostrare_classifica = get_field("mostrare_classifica", "option");
if ( $mostrare_classifica === 'si' ) : ?>
  <div class="wrapper pad-bottom-1 bg-7-color">
    <div class="wrapper-padded">

        <div class="zero-title txt-2-color">
          <?php the_field( 'notizie_dal_parenti', 'option'); ?>
        </div>
        <div class="def-grid-editoriali">
          <div class="lefty">
            <div class="def-grid-editoriali-list">
              <?php
              $pages_banner = get_field('scegli_3_pagine_home', 'option');
              foreach( $pages_banner as $post) : setup_postdata($post);
              include( locate_template ( 'template-parts/grid-modules/def-grid-module-page.php' ) );
              endforeach; wp_reset_postdata();
               ?>
             </div>
          </div>
          <div class="righty">
            <?php
            $posizione = 0;
            if( have_rows('posizione', 'option') ) : ?>
              <div class="bg-2-color">
                <div class="padder">
                  <div class="classifica-head">
                    <div class="cta-1 txt-1-color">
                      <?php the_field( 'le_classifiche_del_parenti', 'option'); ?>
                    </div>
                    <h2><?php the_field( 'nome_della_classifica', 'option' ); ?></h2>
                  </div>
                  <div class="classifica-grid-around">
                    <?php while ( have_rows('posizione', 'option') ) : the_row();
                    $posizione ++;
                    $categoria = get_sub_field( 'categoria', 'option' );
                    $activity_color = $categoria->slug;
                    $activity_name = $categoria->name;
                    $activity_id = $categoria->term_id;
                    ?>
                      <div class="classifica-grid">
                        <div class="classifica-grid-number">
                          <h2 class="txt-<?php echo $activity_id; ?>-id"><?php echo $posizione; ?></h2>
                        </div>
                        <div class="classifica-grid-txt">
                          <div class="cta-1">
                            <a href="/cartellone/<?php echo $archive_prefix . $activity_color ?>" class="li-<?php echo $activity_id; ?>-id"><?php echo $activity_name; ?></a>
                          </div>
                          <h5><a href="<?php the_sub_field( 'link_posizione', 'option' ); ?>" target="<?php the_sub_field( 'finestra_link', 'option' ); ?>"><?php the_sub_field( 'titolo_posizione', 'option' ); ?></a></h5>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <div class="min-medium-height-box"></div>
  </div>
<?php else : ?>
  <div class="wrapper pad-bottom-1 bg-7-color">
    <div class="wrapper-padded">

        <div class="zero-title txt-2-color">
          <?php the_field( 'notizie_dal_parenti', 'option'); ?>
        </div>
        <div class="def-grid">
          <?php
          $pages_banner = get_field('scegli_3_pagine_home', 'option');
          foreach( $pages_banner as $post) : setup_postdata($post);
          include( locate_template ( 'template-parts/grid-modules/def-grid-module-page.php' ) );
          endforeach; wp_reset_postdata();
           ?>
           <?php
           if ( $isMobile == 1 ) {
             $immagine_banner = get_field('immagine_banner_mobile', 'option');
             $immagine_banner_URL = $immagine_banner['sizes']['grid_picture'];
           }
           if ( $isDesktop == 1 || $isTablet == 1 ) {
             $immagine_banner = get_field('immagine_banner', 'option');
             $immagine_banner_URL = $immagine_banner['sizes']['editorial_banner'];
           }
        ?>
        <div class="single-editorial">
          <div class="editorial-banner">
            <div class="filler"></div>
            <a href="<?php the_field('url_di_collegamento_banner', 'option'); ?>" target="<?php the_field('link_banner_finestra', 'option'); ?>" class="absl"></a>
            <div class="editorial-banner-content">
              <h4 class="txt-2-color"><?php the_field( 'titolo_banner', 'option' ); ?></h4>
              <?php if( get_field('cta_banner', 'option') ) : ?>
                <br />
                <a href="<?php the_field('url_di_collegamento_banner', 'option'); ?>" class="btn-fill-hover white cta-4 allupper" target="<?php the_field('link_banner_finestra', 'option'); ?>"><?php the_field('cta_banner', 'option'); ?></a>
               <?php endif; ?>
            </div>
              <img class="lazy" data-original="<?php echo $immagine_banner_URL; ?>" title="<?php the_title(); ?>" alt="<?php echo get_post_meta($thumb_id, '_wp_attachment_image_alt', true); ?>" />
          </div>
        </div>




        </div>
      </div>

    <div class="min-medium-height-box"></div>
  </div>
<?php endif; ?>
