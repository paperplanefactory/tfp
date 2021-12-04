<div class="wrapper pad-bottom-1 pad-top-1 border-bottom only-mobile">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <h2><a href="/cartellone/">Cartellone <?php echo $stagione_name; ?></a></h2>
      </div>
      <div class="fiftyfifty-grid-module-right">
          <a href="javascript:void(0);" class="expandable-filters-mob plus cta-4">Filtri</a>
      </div>
    </div>
  </div>
  <div class="expandable-content expandable-content-filters-mob expandable-hidden bg-7-color pad-top-1 pad-bottom-1 border-top">
    <?php include( locate_template ( 'template-parts/dropdowns/drop-api-tipo-di-evento.php' ) ); ?>
    <?php include( locate_template ( 'template-parts/dropdowns/drop-api-percorsi.php' ) ); ?>
    <?php include( locate_template ( 'template-parts/dropdowns/drop-api-abbonamenti.php' ) ); ?>
  </div>
</div>
