
<div class="wrapper pad-top-2 pad-bottom-1 border-bottom">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <div class="weeks">
          <div class="disableable one-week-less week-select week-select-home">
            &#x2190;
          </div>
          <div class="disableable one-week-more week-select week-select-home">
            &#x2192;
          </div>
        </div>
        <!-- richiamo il calendario per scegliere la data -->
        <input type="text" class="datepicker-to calendar-dates-type-home disableable" />
      </div>
      <div class="fiftyfifty-grid-module-right">
        <div class="cta-4 allupper links-area">
          <a href="<?php the_field("url_calendario", "option"); ?>" class="pointo"><?php the_field("cta_calendario", "option"); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
