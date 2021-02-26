<?php
$args = array(
  'post_type' => 'spettacolo_archivio',
  'taxonomy' => 'area_attivita',
  'hide_empty'=> 1,
  'orderby' => 'name',
  'order' => 'ASC',
  'show_count' => 1,
  'use_desc_for_title' => 0,
  'title_li' => 0,
  'name' => 'tipo-di-evento',
  'value_field' => 'slug',
  'show_option_all' => '',
  'show_option_none' => 'Tipo di evento',
  'option_none_value' => ''
);
wp_dropdown_categories( $args );
