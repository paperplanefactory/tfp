

<?php if ( has_term( 'cartellone', 'tipo_spettacolo' ) ) : ?>
  <div class="cta-1">
    <a href="javascript:void(0);" class="expandable plus"><span class="category-list">
      Cartellone
    </span>
    <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) ); ?>
  </a>
  </div>
  <div class="expandable-content expandable-hidden">
    <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio-produzione-multi.php' ) ); ?>
    <?php the_field('sala_durata_contenuto'); ?>
  </div>
<?php endif; ?>

<?php if ( has_term( 'tournee', 'tipo_spettacolo' ) ) : ?>
  <div class="cta-1">
    <a href="javascript:void(0);" class="expandable plus"><span class="category-list">
      Tournée
    </span>
    <?php include( locate_template ( 'template-parts/taxonomies-handlers/stagione.php' ) );
    ?>
  </a>
  </div>
  <div class="expandable-content  expandable-hidden">
    <?php include( locate_template ( 'template-parts/date-modules/date-spettacolo-singolo-archivio-tournee-multi.php' ) ); ?>
  </div>
<?php endif; ?>
