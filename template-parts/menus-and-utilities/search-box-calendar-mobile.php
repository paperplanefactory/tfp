<div class="wrapper pad-bottom-1 pad-top-1 border-bottom">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <div class="disableable one-week calendar-period cta-4 allupper current-filter">
          Una settimana
        </div>

        <div class="disableable one-month calendar-period cta-4 allupper">
          Un mese
        </div>
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
    <?php include( locate_template ( 'template-parts/dropdowns/drop-api-fascia-oraria.php' ) ); ?>
  </div>
</div>
<div class="wrapper pad-top-1 pad-bottom-1 border-bottom">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">


          <div class="disableable one-week-less week-select week-select-calendar">
            &#x2190;
          </div>
          <div class="disableable one-week-more week-select week-select-calendar">
            &#x2192;
          </div>


        <!-- richiamo il calendario per scegliere la data -->
        <input type="text" class="datepicker-from disableable" /><input type="text" class="datepicker-to calendar-dates-type disableable"  />

    </div>
  </div>
</div>
