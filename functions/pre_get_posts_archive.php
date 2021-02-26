<?php
add_action('pre_get_posts', 'query_post_type');
function query_post_type($query) {
   //Limit to main query, tag queries and frontend
   if($query->is_main_query() && !is_admin() && $query->is_tax ) {

        $query->set( 'post_type', 'spettacolo' );
        $stagione_corrente = get_field("scegli_stagione_corrente", "option");
        $taxquery = array(
        array(
            'taxonomy' => 'stagione',
            'field' => 'term_id',
            'terms' => array( $stagione_corrente )
        )
    );

    $query->set( 'tax_query', $taxquery );

   }

}
