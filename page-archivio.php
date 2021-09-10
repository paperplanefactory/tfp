<?php
/**
 * Template Name: Archivio
 */
get_header();
$keyword = urldecode(get_query_var('keyword'));
$tipo_di_spettacolo = '';
if (get_query_var('tipo-di-spettacolo')):
    if (!is_array(get_query_var('tipo-di-spettacolo'))):
        $tipo_di_spettacolo = explode(',', urldecode(get_query_var('tipo-di-spettacolo')));
    else:
        $tipo_di_spettacolo = get_query_var('tipo-di-spettacolo');
    endif;
endif;


$stagione = urldecode(get_query_var('stagione'));
$stagione_name = get_term_by('slug', $stagione, 'stagione');
$stagione_name_name = $stagione_name->name;

$tipo_di_evento = urldecode(get_query_var('tipo-di-evento'));
$tipo_di_evento_name = get_term_by('slug', $tipo_di_evento, 'area_attivita');
$tipo_di_evento_name_name = $tipo_di_evento_name->name;
if (!empty($tipo_di_spettacolo) || $stagione || $tipo_di_evento || $keyword) {
    $search_parameters = 'active';
} else {
    $search_parameters = 'inactive';
}

?>
<?php include( locate_template('template-parts/menus-and-utilities/search-box-spettacoli-archiviati.php') ); ?>
<?php if ($search_parameters === 'inactive') : ?>
    <div class="wrapper pad-top-2 pad-bottom-2">
        <div class="wrapper-padded">
            <?php
            $args_top = array(
                'post_type' => 'spettacolo_archivio',
                'parent' => 0,
                'orderby' => 'slug',
                'order' => 'DESC'
            );
            $terms_top = get_terms('stagione', $args_top);
            if (!empty($terms_top) && !is_wp_error($terms_top)) :

                ?>
                <div class="def-grid-six grid-infinite">
                    <?php
                    foreach ($terms_top as $term) :
                        $sugg = $term->slug;
                        $term_name = $term->name;
                        $term_slug = $term->slug;
                        $term_id = $term->term_id;

                        ?>
                        <?php
                        $args_child = array(
                            'post_type' => 'spettacolo_archivio',
                            'parent' => $term->term_id,
                            'orderby' => 'slug',
                            'order' => 'DESC'
                        );
                        $terms_child = get_terms('stagione', $args_child);
                        foreach ($terms_child as $term_child) :
                            $tax_image = get_field('immagine', 'stagione' . '_' . $term_child->term_id, true);
                            if ($isMobile == 1) {
                                $tax_image_URL = $tax_image['sizes']['grid_picture'];
                            }
                            if ($isTablet == 1) {
                                $tax_image_URL = $tax_image['sizes']['grid_picture'];
                            }
                            if ($isDesktop == 1) {
                                $tax_image_URL = $tax_image['sizes']['grid_picture'];
                            }
                            $child_term_name = $term_child->name;
                            $child_term_slug = $term_child->slug;
                            $child_term_id = $term_child->term_id;
                            include( locate_template('template-parts/grid-modules/def-grid-module-archive-stagione.php') );

                            ?>

                        <?php endforeach; ?>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>



        </div>
    </div>






<?php else : ?>

    <div class="wrapper pad-top-2 pad-bottom-2">
        <div class="wrapper-padded">
            <?php
            wp_reset_postdata();
            $tax_query = array('relation' => 'AND');
            if (!empty($stagione)) {
                $tax_query[] = array(
                    'taxonomy' => 'stagione',
                    'field' => 'slug',
                    'terms' => $stagione
                );
            }
            if (!empty($tipo_di_spettacolo)) {
                $tax_query[] = array(
                    'taxonomy' => 'tipo_spettacolo',
                    'field' => 'slug',
                    'terms' => $tipo_di_spettacolo,
                    'operator' => 'IN'
                );
            }
            if (!empty($tipo_di_evento)) {
                $tax_query[] = array(
                    'taxonomy' => 'area_attivita',
                    'field' => 'slug',
                    'terms' => $tipo_di_evento
                );
            }
            $pagina = (get_query_var('pagina')) ? get_query_var('pagina') : 1;

            $args_arch_main = array(
                'post_type' => 'spettacolo_archivio',
                'posts_per_page' => 36,
                's' => $keyword,
                'post_parent' => 0,
                'tax_query' => $tax_query,
                'paged' => $pagina,
                'meta_key' => 'program_periods_wp',
                'orderby' => 'meta_value',
                'order' => 'ASC'

            );
            query_posts($args_arch_main);
            if (have_posts()) :
                global $wp_query;
                if ( $relazione_slug === 'spettacolo-contenitore' ) {
                  $already_father = 'gia_visto';
                }
                ?>
                <script>
          $(document).ready(function() {
            $('.grid-infinite').infiniteScroll({
            // options
            path: 'a.next',
            append: '.infinite-module',
            status: '#infscr-loading',
            history: false,
          });

          $('.grid-infinite').on( 'append.infiniteScroll', function( event, response, path, items ) {
            (function($){
              $("img.lazymage, img.lazy, div.lazy, li.lazy").lazyload({
              effect : "fadeIn",
              load : function() {
                $(".lazy-placehoder").fadeOut(150);
              }
              });
            })(jQuery);
          });
          window.setInterval(function(){
             if ( $('.infinite-scroll-last').is(":visible") ) {
               $('#infscr-loading').fadeOut(300);
             }
           }, 5000);
          });

          </script>
                <div class="def-grid-six grid-infinite">
                    <?php
                    while (have_posts()) : the_post();
                        $genitore = get_field('genitore');
                        $gestione_spettacolo_con_archivio = get_field('gestione_spettacolo_con_archivio');
                        $terms_relazione_top = get_the_terms( $post->ID , 'padre_figlio' );
                        // Loop over each item since it's an array
                        if ( $terms_relazione_top != null ){
                          foreach( $terms_relazione_top as $term_relazione_top ) {
                            $relazione_top_slug = $term_relazione_top->slug;
                            unset($term_relazione_top);
                          }
                        }
                        else {
                          $relazione_top_slug = 'none';
                        }
                        if ( $relazione_top_slug === 'spettacolo-figlio' && empty($stagione) ) {
                          $already_father = 'gia_visto';
                        }
                        else {
                          $already_father = '';
                        }
                        if ( $already_father === 'gia_visto' ) {

                        }
                        else {
                          include( locate_template('template-parts/grid-modules/def-grid-module-archive-opt.php') );
                        }
                    endwhile;

                    ?>
                </div>
                <div class="navigation">
                    <!--<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries'); ?></div>
                    <div class="alignright nav-next"><?php next_posts_link('Next Entries &raquo;', ''); ?></div>-->
                    <?php
                    $base = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $baseregx = preg_replace('/(pagina\/\d+\/)/i', '', $base);
                    $args = array(
                        'total' => $wp_query->max_num_pages,
                        'base' => $baseregx . '%_%',
                        'format' => 'pagina/%#%',
                        'current' => $pagina,
                        'prev_text' => '&laquo;',
                        'next_text' => '&raquo;'
                    );

                    echo paginate_links($args);

                    ?>
                </div>

            <?php else : ?>
            </div>
            <div class="aligncenter">
                <h2>Nessun elemento corrisponde alla tua ricerca.</h2>
            </div>
        <?php endif; ?>
    </div>
    </div>
    <?php get_template_part( 'template-parts/grid-modules/infinite-message' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
