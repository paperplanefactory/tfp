<div class="top-opener pointerize top-select txt-5-color disableable">
  <span class="text-shortener">
    <span class="top-opener-1 top-opener-1-txt-replace fake-hover text-shortened" aria-label-drop-filtro="percorsi">Percorsi</span>
  </span>
  <div class="fake-select fake-select-1 top-open">
    <?php
    $args_top = array(
      'post_type' => 'spettacolo',
      'parent' => 0,
      'orderby' => 'term_order'
    );
    $terms_top_percorsi = get_terms( 'percorsi', $args_top );
    if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ) : ?>
    <ul class="no-color-area">
      <li
       aria-label-drop-filtro="percorsi-remover"
       aria-label-term-name="Percorsi"
       aria-label-term-slug=""
       aria-label-term-id=""
       class="this-voice top-opener-1-txt-replace filter-voice">
       Percorsi
     </li>

      <?php foreach ( $terms_top_percorsi as $term ) : ?>
        <li
         aria-label-drop-filtro="percorsi"
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
