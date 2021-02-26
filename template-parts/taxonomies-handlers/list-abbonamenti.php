<?php
// your taxonomy name
$tax = 'abbonamenti';
$args_top = array(
  'post_type' => 'spettacolo',
  'parent' => 0,
  'orderby' => 'term_order',
  'hide_empty' => true,
  'exclude' => $term_id
);
// get the terms of taxonomy
$terms_top = get_terms( 'abbonamenti', $args_top );

// loop through all terms
foreach ( $terms_top as $term ) {
  include( locate_template ( 'template-parts/grid-modules/def-grid-module-api-abbonamenti.php' ) );
}
?>
