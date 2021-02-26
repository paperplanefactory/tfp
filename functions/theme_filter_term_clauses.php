<?php


/**
 * Filter the term clauses using the arguments, specifically for the wp_dropdown_categories.
 *
 * @see http://wordpress.stackexchange.com/questions/207655/restrict-taxonomy-dropdown-to-post-type
 * @see https://www.dfactory.eu/get_terms-post-type/
 *
 * @param array $clauses
 * @param string $taxonomy
 * @param array $args
 *
 * @return array
 */
add_filter( 'terms_clauses', 'jdn_post_type_terms_clauses', 10, 3 );
function jdn_post_type_terms_clauses( $clauses, $taxonomy, $args ) {
 // Make sure we have a post_type argument to run with.
 if( !isset( $args['post_type'] ) || empty( $args['post_type'] ) )
 return $clauses;

 global $wpdb;
 // Setup the post types in an array
 $post_types = array();

 // If the argument is an array, check each one and cycle through the post types
 if( is_array( $args['post_type'] ) ) {

 // All possible, public post types
 $possible_post_types = get_post_types( array( 'public' => true ) );

 // Cycle through the post types, add them to our array if they are public
 foreach( $args['post_type'] as $post_type ) {
 if( in_array( $post_type, $possible_post_types ) )
 $post_types[] = "'" . esc_attr( $post_type ) . "\'";
 }

 // If the post type argument is a string, not an array
 } elseif( is_string( $args['post_type'] ) ) {
 $post_types[] = "'" . esc_attr( $args['post_type'] ) . "'";
 }
 // If we have valid post types, build the new sql
 if( !empty( $post_types ) ) {
 $post_types_string = implode( ',', $post_types );
 $fields = str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] );

 $clauses['fields'] = 'DISTINCT ' . esc_sql( $fields ) . ', COUNT(t.term_id) AS count';
 $clauses['join'] .= ' INNER JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
 $clauses['where'] .= ' AND p.post_type IN (' . $post_types_string . ')';
 $clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
 }
 return $clauses;
}










add_filter('save_post', 'set_intial_date', 20);
function set_intial_date($post_id) {
  delete_post_meta($post_id, 'program_periods_wp');
  if ( get_field('program_periods', $post_id) ) {
    $reap_one = get_field('program_periods', $post_id);
    $first_date = $reap_one[0]['from'];
    $first_date = str_replace('/', '-', $first_date);
    $first_date = date('Ymd', strtotime($first_date));
    add_post_meta($post_id, 'program_periods_wp', $first_date, true);
  }

  if ( get_field('tournee_dates', $post_id) ) {
    $reap_one = get_field('tournee_dates', $post_id);
    $first_date = $reap_one[0]['date_from'];
    $first_date = str_replace('/', '-', $first_date);
    $first_date = date('Ymd', strtotime($first_date));
    add_post_meta($post_id, 'program_periods_wp', $first_date, true);
  }


}



add_filter('save_post', 'set_final_date', 20);
function set_final_date($post_id) {
  delete_post_meta($post_id, 'program_final_periods_wp');
  if ( get_field('program_periods', $post_id) ) {
    $reap_one = get_field('program_periods', $post_id);
    $reap_one = end($reap_one);
    $last_date = $reap_one['to'];
    $last_date = str_replace('/', '-', $last_date);
    $last_date = date('Ymd', strtotime($last_date));
    add_post_meta($post_id, 'program_final_periods_wp', $last_date, true);
  }

  if ( get_field('tournee_dates', $post_id) ) {
    $reap_one = get_field('tournee_dates', $post_id);
    $reap_one = end($reap_one);
    $last_date = $reap_one['date_to'];
    $last_date = str_replace('/', '-', $last_date);
    $last_date = date('Ymd', strtotime($last_date));
    add_post_meta($post_id, 'program_final_periods_wp', $last_date, true);
  }


}
