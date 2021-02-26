<?php
$comporre_link = get_sub_field('comporre_link');
?>
<div class="modulo-recensioni">
  <div class="padder">
    <div class="fiftyfifty-grid-taxes-bottom">
      <div class="fiftyfifty-grid-module-left">
        <div class="cta-1">
          <?php the_sub_field('titoletto_modulo'); ?>
        </div>
      </div>
      <div class="fiftyfifty-grid-module-right">
        <?php if( get_sub_field('recensioni_pagina_archivio') ) :
          $my_tag_id = get_sub_field('recensioni_pagina_archivio');
           endif; ?>
      </div>
    </div>
    <div class="recensioni">
      <?php if ( $comporre_link === 'in-auto' ) :
        $news_terms = get_sub_field('recensioni_pagina_archivio'); ?>
        <?php $args_recensione = array(
         'post_type' => 'post',
         'posts_per_page' => 4,
         'tag_id' => $my_tag_id,
         'tax_query' => array(
              array(
                  'taxonomy' => 'evidenza',
                  'field'    => 'slug',
                  'terms'    => 'si',
              ),
          ),
         );
        $my_recensione = get_posts( $args_recensione );
        foreach($my_recensione as $post) : setup_postdata($post);
        ?>
        <div class="recensione">
          <div class="padder">
            <div class="cta-1 txt-5-color">
              <?php the_sub_field('tipo_link'); ?>
            </div>
            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
          </div>
        </div>
        <?php endforeach; wp_reset_query(); ?>
      <?php else : ?>
          <?php if( have_rows('recensioni') ) : while ( have_rows('recensioni') ) : the_row();
          $recensione_inserire = get_sub_field('recensione_inserire');
           if ( $recensione_inserire === 'rec-recupera' ) :
             $callme = get_sub_field('scegli_tra_contenuti');
             ?>
              <?php $args_recensione = array(
               'post_type' => 'post',
               'posts_per_page' => 1,
               'include' => $callme
               );
              $my_recensione = get_posts( $args_recensione );
              foreach($my_recensione as $post) : setup_postdata($post);
              ?>
              <div class="recensione">
                <div class="padder">
                  <div class="cta-1 txt-5-color">
                    <?php the_sub_field('tipo_link'); ?>
                  </div>
                  <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                </div>
              </div>
              <?php endforeach; wp_reset_query(); ?>
            <?php else : ?>
              <div class="recensione">
                <div class="padder">
                  <div class="cta-1 txt-5-color">
                    <?php the_sub_field('tipo_link'); ?>
                  </div>
                  <h6><a href="<?php the_sub_field('url_link'); ?>" target="_blank"><?php the_sub_field('titolo_link'); ?></a></h6>
                </div>
              </div>
            <?php endif; ?>
          <?php endwhile; endif; ?>
        <?php endif; ?>
    </div>
    <div class="fiftyfifty-grid-taxes-bottom">
      <div class="fiftyfifty-grid-module-left">
        <?php if( get_sub_field('recensioni_pagina_archivio') ) :
          $my_tag_id = get_sub_field('recensioni_pagina_archivio');
           ?>
          <div class="cta-4 allupper">
            <a href="<?php echo get_tag_link($my_tag_id); ?>" class="li-2-id more-all">Tutte</a>
          </div>
        <?php endif; ?>
      </div>
      <div class="fiftyfifty-grid-module-right">

      </div>
    </div>
  </div>
</div>
