<?php
$object_terms = wp_get_object_terms( $post->ID, 'stagione', array( 'fields' => 'all' ) );

if ( $object_terms ) {
    $res = '';
    foreach ( $object_terms as $term ) {
        /* If parent would be 0 then this 'if' would evaluate to false */
        if ( $term->parent ) {
            $res .=  $term->name . ','; /* You probably wanted ', ' here. */
        }
    }
    /* This is great. In this form the 'rtrim' is useless.
       The two "concatenations" are null and completely useless.*/
    echo rtrim($res,' ,').'' . '';
}

?>
