<div class="bg-2-color">
  <div class="wrapper pad-top-3 pad-bottom-1 border-bottom">
    <div class="wrapper-padded">
      <div class="fiftyfifty-grid-taxes just-verticalize">
        <div class="fiftyfifty-grid-module-left">
          <div class="disableable one-week calendar-period current-filter cta-4 allupper">
            Una settimana
          </div>

          <div class="disableable one-month calendar-period cta-4 allupper">
            Un mese
          </div>
        </div>
        <div class="fiftyfifty-grid-module-right">
          <?php include( locate_template ( 'template-parts/dropdowns/drop-api-tipo-di-evento.php' ) ); ?>
          <?php include( locate_template ( 'template-parts/dropdowns/drop-api-percorsi.php' ) ); ?>
          <?php include( locate_template ( 'template-parts/dropdowns/drop-api-abbonamenti.php' ) ); ?>
          <?php include( locate_template ( 'template-parts/dropdowns/drop-api-fascia-oraria.php' ) ); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="wrapper pad-top-1 pad-bottom-1 border-bottom">
    <div class="wrapper-padded">
      <div class="fiftyfifty-grid-taxes just-verticalize">

          <div class="weeks">
            <div class="disableable one-week-less week-select week-select-calendar">
              &#x2190;
            </div>
            <div class="disableable one-week-more week-select week-select-calendar">
              &#x2192;
            </div>
          </div>

          <!-- richiamo il calendario per scegliere la data -->
          <input readonly="readonly" type="text" class="datepicker-from disableable" /><input type="text" class="datepicker-to calendar-dates-type disableable"  />

      </div>
    </div>
  </div>
</div>
