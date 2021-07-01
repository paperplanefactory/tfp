<div class="only-mobile">
  <?php if ( get_field( 'home_mobile_url_cartellone', 'option' ) ) : ?>
    <?php
    $home_mobile_immagine_cartellone = get_field( 'home_mobile_immagine_cartellone', 'option' );
    $home_mobile_immagine_cartellone_URL = $home_mobile_immagine_cartellone['sizes']['content_picture'];
     ?>
    <div class="home-cartellone-mobile" style="background-image: url(<?php echo $home_mobile_immagine_cartellone_URL; ?>)">
      <a href="<?php the_field( 'home_mobile_url_cartellone', 'option' ); ?>" class="absl"></a>
      <div class="layer"></div>
      <div class="wrapper">
        <div class="wrapper-padded">
          <h1 class="txt-2-color"><?php the_field( 'home_mobile_testo_cta_cartellone', 'option' ); ?></h1>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if( have_rows( 'home_mobile_gestione_elenco_categorie', 'option' ) ) : ?>
    <div class="wrapper">
      <div class="wrapper-padded">
        <div class="mobile-cats-blocks-hold">
          <?php while( have_rows('home_mobile_gestione_elenco_categorie', 'option' ) ) : the_row();
          $home_mobile_gestione_elenco_categorie_immagine = get_sub_field( 'home_mobile_gestione_elenco_categorie_immagine' );
          $home_mobile_gestione_elenco_categorie_immagine_URL = $home_mobile_gestione_elenco_categorie_immagine['sizes']['content_picture'];
          $cattt_id = get_sub_field( 'home_mobile_gestione_elenco_categorie_scegli_categoria' );
          $term_object = get_term_by( 'id', $cattt_id , 'area_attivita' );
          $main_activity_color = $term_object->slug;
          $main_activity_id = $term_object->term_id;
          $main_activity_name = $term_object->name;
          ?>
            <div class="mobile-cats-block" style="background-image: url(<?php echo $home_mobile_gestione_elenco_categorie_immagine_URL; ?>)">
              <a href="/cartellone/<?php echo $main_activity_color; ?>" class="absl"></a>
              <div class="layer"></div>
              <div class="sidebar bg-<?php echo $main_activity_id; ?>-id"></div>
              <div class="texter">
                <h2 class="txt-2-color"><?php echo $main_activity_name; ?></h2>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>


</div>
