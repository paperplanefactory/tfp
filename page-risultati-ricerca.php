<?php
/**
 * Template Name: Risultati della ricerca
*/

get_header();
//$keyword = $_GET['keyword'];
global $wp_query;
if ( isset ( $wp_query->query_vars['keyword'] ) ) {
  $keyword = $wp_query->query_vars['keyword'];
}
?>
<?php if ( $keyword != '' ) : ?>
	<div class="wrapper pad-top-3 pad-bottom-1 border-bottom">
		<div class="wrapper-padded">
			<span class="cta-2">Hai cercato: </span><span class="h2-inline"><?php echo $keyword; ?></span>
      <br /><br /><span class="cta-2 allupper links-area"><a href="#" class="search-activator">Effettua un'altra ricerca</a></span>
		</div>
	</div>

	<?php
	// query per post di questa stagione
	$args_search_main = array(
    'post_type' => array('spettacolo', 'spettacolo_archivio', 'post', 'page'),
		'posts_per_page' => -1,
		's' => $keyword,
		'paged' => $page
	);
	$search_q = new WP_Query($args_search_main);
	$counter = 0;
	if( $search_q->have_posts() ) {
	    $types = array('spettacolo', 'spettacolo_archivio', 'post', 'page');
			$counter = 0;
	    foreach( $types as $type ){
				$counter ++;
				if ( $type === 'spettacolo' ) {
					$label = 'Spettacoli';
				}
				if ( $type === 'spettacolo_archivio' ) {
					$label = 'Spettacoli archiviati';
				}
				if ( $type === 'post' ) {
					$label = 'Notizie';
				}
				if ( $type === 'page' ) {
					$label = 'Pagine';
				}
				echo '<div class="wrapper pad-top-2 pad-bottom-2 nic'.$counter.'"><div class="wrapper-padded">';
				echo '<h5>'.$label.'</h5>';
				echo '<div class="def-grid-six hide-abstract pad-top-2 hic'.$counter.'">';
	        while( $search_q->have_posts() ) {
	            $search_q->the_post();
	            if( $type == get_post_type() ) {
								if ( $type === 'spettacolo' ) {
									include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) );
								}
								if ( $type === 'spettacolo_archivio' ) {
                  global $wp_query;
                  if ( $relazione_slug === 'spettacolo-contenitore' ) {
                    $already_father = 'gia_visto';
                  }
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
								}
								if ( $type === 'post' ) {
									include( locate_template ( 'template-parts/grid-modules/def-grid-module-news.php' ) );
								}
								if ( $type === 'page' ) {
									include( locate_template ( 'template-parts/grid-modules/def-grid-module-page.php' ) );
								}
	            }
	        }
	        rewind_posts();
	        echo '</div></div></div>';
					?>
					<script type="text/javascript">
					$(document).ready(function() {
						var hic<?php echo $counter; ?> = $(".hic<?php echo $counter; ?> > .def-grid-module").length;
						if ( hic<?php echo $counter; ?> == 0 ) {
							$(".nic<?php echo $counter; ?>").hide();
						}
						});
					</script>
					<?php
	    }
	}
	else {
		echo '<div class="wrapper pad-top-3 pad-bottom-1 border-bottom"><div class="wrapper-padded"><div class="wrapper-padded-more"><div class="aligncenter">';
		echo '<h2>Nessun elemento corrisponde alla tua ricerca.</h2>';
		echo '</div></div></div></div>';
	}
	?>
<?php else: ?>
	<div class="wrapper-padded bg-7-color">
		<div class="pad-top-3 pad-bottom-3">
			<div class="search-hold">
				<form action="/risultati-ricerca/" method="post" class="search-check">
					<input name="keyword" type="text" placeholder="Cerca" class="search-lenght-check" />
					<input type="submit" value="" />
				</form>
				<div class="search-lenght-message cta-4 pad-top-2 txt-1-color">
					Per favore digita una parola di almeno 4 lettere.
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php get_footer(); ?>
