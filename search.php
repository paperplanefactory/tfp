<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

<div class="wrapper pad-top-3 pad-bottom-1 border-bottom">
	<div class="wrapper-padded">
		<div class="wrapper-padded-more">
			<?php if ( have_posts() ) : ?>
				<span class="cta-2">Hai cercato: </span><span class="h2-inline"><?php printf( __( '%s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></span>
			<?php else : ?>
				<span class="cta-2">Nessun risultato per: </span><span class="h2-inline"><?php printf( __( '%s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></span>
			<?php endif; ?>
		</div>
	</div>
</div>



<div class="wrapper pad-top-3 pad-bottom-1">
	<div class="wrapper-padded">
		<div class="wrapper-padded-more">
			<div class="def-grid-six">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php include( locate_template ( 'template-parts/grid-modules/def-grid-module.php' ) ); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>






<div class="wrap">

	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<span class="cta-2">Hai cercato: </span><?php printf( __( '%s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?>
		<?php else : ?>
			<span class="cta-2">Nessun risultato per: </span><?php printf( __( '%s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile; // End of the loop.



		else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
