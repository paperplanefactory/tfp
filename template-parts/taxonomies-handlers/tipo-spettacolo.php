<?php
// recupero la sua tag nazione
$terms_spettacolo = get_the_terms( $post->ID , 'tipo_spettacolo' );
// Loop over each item since it's an array
if ( $terms_spettacolo != null ){
foreach( $terms_spettacolo as $term_spettacolo ) {
// Print the name method from $term which is an OBJECT
$spettacolo_color = $term_spettacolo->slug;
$spettacolo_name = $term_spettacolo->name;
unset($term_spettacolo);
} }
?>
