<div class="top-opener pointerize top-select txt-5-color disableable">
  <span class="text-shortener">
    <span class="top-opener-2 top-opener-2-txt-replace fake-hover text-shortened" aria-label-drop-filtro="tipo-evento">Tipo di evento</span>
  </span>
  <div class="fake-select fake-select-2 top-open">
    <?php
    $args_top = array(
      'post_type' => 'spettacolo',
      'parent' => 0,
      'orderby' => 'term_order'
    );
    $terms_top = get_terms( 'area_attivita', $args_top );
    if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ) : ?>
    <ul class="color-area">
      <li
       aria-label-drop-filtro="tipo-evento-remover"
       aria-label-term-name="Tipo di evento"
       aria-label-term-slug=""
       aria-label-term-id=""
       class="this-voice top-opener-2-txt-replace filter-voice">
       Tipo di evento
     </li>
      <?php foreach ( $terms_top as $term ) : ?>
        <li
        aria-label-drop-filtro="tipo-evento"
        aria-label-term-name="<?php echo $term->name; ?>"
        aria-label-term-slug="<?php echo $term->slug; ?>"
        aria-label-term-id="<?php echo $term->term_id; ?>"
        id="turn-off-<?php echo $term->term_id; ?>"
        class="drop-<?php echo $term->term_id; ?>-bg this-voice fake-hover">
        <?php echo $term->name; ?>
      </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  </div>
</div>
