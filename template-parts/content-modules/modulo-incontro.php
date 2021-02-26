<?php
$incontro_main_area_id = get_sub_field('area_attivita_principale');
$term_slug = 'area_attivita';
$taxonomies = get_taxonomies();
foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
    // If term object is returned, break out of loop. (Returns false if there's no object)
    if ( $term_object = get_term_by( 'id', $incontro_main_area_id , $taxonomy ) ) {
        break;
    }
}
$main_activity_color = $term_object->slug;
$main_activity_id = $term_object->term_id;
$count_modulo_incontri_correlati = 0;
if( have_rows('modulo_incontri_correlati') ) : while ( have_rows('modulo_incontri_correlati') ) : the_row();
$count_modulo_incontri_correlati++;
endwhile;
endif; ?>

<?php if ( $count_modulo_incontri_correlati === 1 ) : ?>
  <?php if( get_sub_field('titoletto_fuori_cornice') ) : ?>
    <div class="category cta-1 txt-1-color">
      <?php the_sub_field('titoletto_fuori_cornice'); ?>
    </div>
  <?php endif; ?>
<div class="magic-box-new gradient-<?php echo $main_activity_id; ?>-id">
  <div class="magic-box-new-content">
    <div class="magic-box-new-content-grid-1">
      <div class="magic-box-new-content-grid-element">

      </div>
      <?php if( have_rows('modulo_incontri_correlati') ) : while ( have_rows('modulo_incontri_correlati') ) : the_row();
      $immagine_incontro = get_sub_field('immagine_incontro');
      if ( $isMobile == 1 ) {
        $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
      }
      if ( $isTablet == 1 ) {
        $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
      }
      if ( $isDesktop == 1 ) {
        $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
      }
      $link_incontro = get_sub_field('link_incontro');
      if ( $link_incontro === 'incontro-interno' ) {
        $incontro_url = get_sub_field('url_link_incontro_interno');
        $target = '_self';
      }
      else {
        $incontro_url = get_sub_field('url_link_incontro_esterno');
        $target = '_blank';
      }
      $incontro_area_id = get_sub_field('categoria_incontro');
      $term_slug = 'area_attivita';
      $taxonomies = get_taxonomies();
      foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
          // If term object is returned, break out of loop. (Returns false if there's no object)
          if ( $term_object = get_term_by( 'id', $incontro_area_id , $taxonomy ) ) {
              break;
          }
      }
      $activity_name = $term_object->name;
      $activity_color = $term_object->slug;
      $activity_rep_id = $term_object->term_id;
      ?>
      <div class="magic-box-new-content-grid-element">
        <div class="box-image">
          <a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>">
            <img class="lazy" data-original="<?php echo $immagine_incontro_URL; ?>" />
          </a>
        </div>
        <div class="box-txt">
          <div class="category cta-1">
            <a href="/cartellone/<?php echo $activity_color; ?>" class="li-<?php echo $activity_rep_id; ?>-id"><?php echo $activity_name; ?></a>
          </div>
          <h5><a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>"><?php the_sub_field('titolo_incontro'); ?></a></h5>
          <?php if( get_sub_field('data_incontro') ) : ?>
            <div class="cta-2 txt-5-color">
              <?php the_sub_field('data_incontro'); ?>
            </div>
          <?php endif; ?>
          <?php if( get_sub_field('cta_incontro') ) : ?>
            <a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>" class="btn-fill red cta-4 allupper last"><?php the_sub_field('cta_incontro'); ?></a>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if ( $count_modulo_incontri_correlati === 2 ) : ?>
  <?php if( get_sub_field('titoletto_fuori_cornice') ) : ?>
    <div class="category cta-1 txt-1-color">
      <?php the_sub_field('titoletto_fuori_cornice'); ?>
    </div>
  <?php endif; ?>
  <div class="magic-box-new gradient-<?php echo $main_activity_id; ?>-id">
    <div class="magic-box-new-content">
      <div class="magic-box-new-content-grid-2">
        <div class="magic-box-new-content-grid-element">

        </div>
        <?php if( have_rows('modulo_incontri_correlati') ) : while ( have_rows('modulo_incontri_correlati') ) : the_row();
        $immagine_incontro = get_sub_field('immagine_incontro');
        if ( $isMobile == 1 ) {
          $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
        }
        if ( $isTablet == 1 ) {
          $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
        }
        if ( $isDesktop == 1 ) {
          $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
        }
        $link_incontro = get_sub_field('link_incontro');
        if ( $link_incontro === 'incontro-interno' ) {
          $incontro_url = get_sub_field('url_link_incontro_interno');
          $target = '_self';
        }
        else {
          $incontro_url = get_sub_field('url_link_incontro_esterno');
          $target = '_blank';
        }
        $incontro_area_id = get_sub_field('categoria_incontro');
        $term_slug = 'area_attivita';
        $taxonomies = get_taxonomies();
        foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
            // If term object is returned, break out of loop. (Returns false if there's no object)
            if ( $term_object = get_term_by( 'id', $incontro_area_id , $taxonomy ) ) {
                break;
            }
        }
        $activity_name = $term_object->name;
        $activity_color = $term_object->slug;
        $activity_rep_id = $term_object->term_id;
        ?>
        <div class="magic-box-new-content-grid-element">
          <div class="box-image">
            <a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>">
              <img class="lazy" data-original="<?php echo $immagine_incontro_URL; ?>" />
            </a>
          </div>
          <div class="box-txt">
            <div class="category cta-1">
              <a href="/cartellone/<?php echo $activity_color; ?>" class="li-<?php echo $activity_rep_id; ?>-id"><?php echo $activity_name; ?></a>
            </div>
            <h5><a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>"><?php the_sub_field('titolo_incontro'); ?></a></h5>
            <?php if( get_sub_field('data_incontro') ) : ?>
              <div class="cta-2 txt-5-color">
                <?php the_sub_field('data_incontro'); ?>
              </div>
            <?php endif; ?>
            <?php if( get_sub_field('cta_incontro') ) : ?>
              <a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>" class="btn-fill red cta-4 allupper last"><?php the_sub_field('cta_incontro'); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ( $count_modulo_incontri_correlati === 3 ) : ?>
  <?php if( get_sub_field('titoletto_fuori_cornice') ) : ?>
    <div class="category cta-1 txt-1-color">
      <?php the_sub_field('titoletto_fuori_cornice'); ?>
    </div>
  <?php endif; ?>
  <div class="magic-box-new gradient-<?php echo $main_activity_id; ?>-id">
    <div class="magic-box-new-content">
      <div class="magic-box-new-content-grid-3">
        <div class="magic-box-new-content-grid-element">

        </div>
        <?php if( have_rows('modulo_incontri_correlati') ) : while ( have_rows('modulo_incontri_correlati') ) : the_row();
        $immagine_incontro = get_sub_field('immagine_incontro');
        if ( $isMobile == 1 ) {
          $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
        }
        if ( $isTablet == 1 ) {
          $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
        }
        if ( $isDesktop == 1 ) {
          $immagine_incontro_URL = $immagine_incontro['sizes']['grid_picture'];
        }
        $link_incontro = get_sub_field('link_incontro');
        if ( $link_incontro === 'incontro-interno' ) {
          $incontro_url = get_sub_field('url_link_incontro_interno');
          $target = '_self';
        }
        else {
          $incontro_url = get_sub_field('url_link_incontro_esterno');
          $target = '_blank';
        }
        $incontro_area_id = get_sub_field('categoria_incontro');
        $term_slug = 'area_attivita';
        $taxonomies = get_taxonomies();
        foreach ( $taxonomies as $tax_type_key => $taxonomy ) {
            // If term object is returned, break out of loop. (Returns false if there's no object)
            if ( $term_object = get_term_by( 'id', $incontro_area_id , $taxonomy ) ) {
                break;
            }
        }
        $activity_name = $term_object->name;
        $activity_color = $term_object->slug;
        ?>
        <div class="magic-box-new-content-grid-element">
          <div class="box-image">
            <a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>">
              <img class="lazy" data-original="<?php echo $immagine_incontro_URL; ?>" />
            </a>
          </div>
          <div class="box-txt">
            <div class="category cta-1">
              <a href="/cartellone/<?php echo $activity_color; ?>" class="<?php echo $activity_color; ?>"><?php echo $activity_name; ?></a>
            </div>
            <h5><a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>"><?php the_sub_field('titolo_incontro'); ?></a></h5>
            <?php if( get_sub_field('data_incontro') ) : ?>
              <div class="cta-2 txt-5-color">
                <?php the_sub_field('data_incontro'); ?>
              </div>
            <?php endif; ?>
            <?php if( get_sub_field('cta_incontro') ) : ?>
              <a href="<?php echo $incontro_url; ?>" target="<?php echo $target; ?>" class="btn-fill red cta-4 allupper last"><?php the_sub_field('cta_incontro'); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
