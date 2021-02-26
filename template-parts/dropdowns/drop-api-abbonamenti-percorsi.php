<div class="top-opener pointerize top-select txt-5-color disableable">
  <span class="top-opener-1 top-opener-1-txt-replace fake-hover">Abbonamenti e percorsi</span>
  <div class="fake-select fake-select-1 top-open">
    <?php
    $args_top = array(
      'post_type' => 'spettacolo',
      'parent' => 0,
      'orderby' => 'term_order'
    );
    $terms_top = get_terms( 'abbonamenti', $args_top );
    $terms_top_percorsi = get_terms( 'percorsi', $args_top );
    if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ) : ?>
    <ul class="no-color-area">
      <li id="Abbonamenti e percorsi" slug="" percorso="false" class="second-voice this-voice fake-hover bg-7-color no-click" value=""><strong>Gli abbonamenti:</strong></li>
      <?php foreach ( $terms_top as $term ) : ?>
        <li id="<?php echo $term->name; ?>" slug="<?php echo $term->slug; ?>" percorso="true" class="drop-<?php echo $term->term_id; ?>-bg this-voice this-voice-abbonamenti fake-hover" value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></li>
      <?php endforeach; ?>
      <li id="Abbonamenti e percorsi" slug="" percorso="false" class="second-voice this-voice fake-hover bg-7-color no-click " value=""><strong>I percorsi:</strong></li>
      <?php foreach ( $terms_top_percorsi as $term ) : ?>
        <li id="<?php echo $term->name; ?>" slug="<?php echo $term->slug; ?>" percorso="true" class="drop-<?php echo $term->term_id; ?>-bg this-voice this-voice-percorsi fake-hover" value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  </div>
</div>
