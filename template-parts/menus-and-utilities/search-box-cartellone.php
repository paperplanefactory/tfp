<div class="wrapper pad-top-3 pad-bottom-1 border-bottom only-desktop">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <h2><a href="/cartellone/">Cartellone <?php echo $stagione_name; ?></a></h2>
      </div>
      <div class="fiftyfifty-grid-module-right">
        <?php include( locate_template ( 'template-parts/dropdowns/drop-api-tipo-di-evento.php' ) ); ?>
        <?php include( locate_template ( 'template-parts/dropdowns/drop-api-percorsi.php' ) ); ?>
        <?php include( locate_template ( 'template-parts/dropdowns/drop-api-abbonamenti.php' ) ); ?>
      </div>
    </div>
  </div>
</div>
