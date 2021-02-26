<div class="wrapper pad-top-3 pad-bottom-1 border-bottom">
  <div class="wrapper-padded">
    <div class="fiftyfifty-grid-taxes just-verticalize">
      <div class="fiftyfifty-grid-module-left">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="fiftyfifty-grid-module-right">

      </div>
    </div>
  </div>
</div>


<div class="wrapper bg-7-color">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more">
      <div class="pad-top-2 pad-bottom-2">
        <?php if ( get_field( 'search_instructions' ) ) : ?>
          <div class="content-styled">
            <?php the_field( 'search_instructions' ); ?>
          </div>
        <?php endif; ?>

        <form action="<?php the_permalink(); ?>" method="get" id="search_form" class="spettacoli-archiviati-search">
          <div class="search-fields-archive form-hold">


              <div class="box-input">
                <input name="keyword" type="text" id="search-text" class="search_input" placeholder="Cerca ad esempio: nome dello spettacolo" />
              </div>

              <div class="search-fields-module-left">
                <span class="cta-1">Filtra: </span>
                <label><input type="checkbox" name="tipo-di-spettacolo[]" value="cartellone" />Cartellone</label>
                <label><input type="checkbox" name="tipo-di-spettacolo[]" value="tournee" />Tournée</label>
                <label><input type="checkbox" name="tipo-di-spettacolo[]" value="produzioni" />Produzione</label>
                <?php include( locate_template ( 'template-parts/dropdowns/drop-stagioni.php' ) ); ?>
                <?php //include( locate_template ( 'template-parts/dropdowns/drop-eventi.php' ) ); ?>
              </div>

              <div class="search-fields-module-right">
                <input type="hidden" id="stagione" name="stagione" value="" />
                <input type="hidden" id="tipo_spettacolo" name="tipo-di-spettacolo" value="" />
                <input type="hidden" id="area_attivita" name="tipo-di-evento" value="" />
                <input type="submit" class="search_send" value="cerca" />
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php if ( $search_parameters === 'active' ) : ?>
  <div class="wrapper">
    <div class="wrapper-padded">
      <div class="pad-top-3 pad-bottom-2">
        <div class="box-output">
          <h5>
          <?php if ( $keyword ) : ?>
            <span class="">Hai cercato: </span><span class="txt-5-color"><?php echo $keyword; ?></span>
          <?php endif; ?>
          <?php if ( $tipo_di_spettacolo ) : ?>
          <span class="">Tipo di spettacolo: </span><span class="comma-after txt-5-color"><?php
             for($i = 0; $i < $arrsize_tipo_di_spettacolo;$i++) {
              $tipo_slug = $tipo_di_spettacolo[$i];
              $spettacolo_name = get_term_by('slug', $tipo_slug, 'tipo_spettacolo'); echo '<span>' . $spettacolo_name->name . '</span>';
             }
             ?></span>
          <?php endif; ?>
          <?php if ( $stagione ) : ?>
            <span class="">Stagione: </span><span class="txt-5-color"><?php echo $stagione_name_name; ?></span>
          <?php endif; ?>
          <?php if ( $tipo_di_evento ) : ?>
            <span class="">Tipo di evento: </span><span class="txt-5-color"><?php echo $tipo_di_evento_name_name; ?></span>
          <?php endif; ?>
          </h5>
        </div>
      </div>
    </div>
  </div>



<?php endif; ?>
