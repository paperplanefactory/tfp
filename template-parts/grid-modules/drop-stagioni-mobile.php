<div class="top-open">
  dd
</div>
<?php
$args_top = array(
  'post_type' => 'spettacolo_archivio',
  'parent' => 0

);
$terms_top = get_terms( 'stagione', $args_top );
 if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ){
     echo '<ul>';
     foreach ( $terms_top as $term ) {
       echo '<li>' . $term->name . '</li>';

     }
     echo '</ul>';
 }

echo '<div>----</div>';

$args = array(
    'id' => 'top-dec',
    'show_option_none' => 'Anni',
    'post_type' => 'spettacolo_archivio',
    'taxonomy'           => 'stagione',
    'hide_empty'         => 1,
    'orderby'            => 'name',
    'order'              => 'ASC',
    'show_count'         => 1,
    'use_desc_for_title' => 0,
    'title_li'           => 0,
    'hierarchical'=> 1,
    'depth'=> 1,

);
wp_dropdown_categories( $args );

$args = array(
  'taxonomy'           => 'stagione',
  'parent'   => 0
);
$categories = get_categories($args);
foreach($categories as $category) {


$args = array(
    'class' => 'sub-dec',
    'id' => $category->term_id,
    'show_option_none' => 'Stagioni',
    'post_type' => 'spettacolo_archivio',
    'taxonomy'           => 'stagione',
    'hide_empty'         => 1,
    'orderby'            => 'name',
    'order'              => 'ASC',
    'show_count'         => 1,
    'use_desc_for_title' => 0,
    'title_li'           => 0,
    'hierarchical'=> 1,
    'parent' => $category->term_id
);
wp_dropdown_categories( $args );

}

?>
<script>
$(document).ready(function() {
  $( "#top-dec" ).change(function() {
    var to_sub = this.value;
    $(".sub-dec").hide();
    $( "#"+to_sub ).show();

  });
});
</script>
