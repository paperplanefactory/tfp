<div class="wrapper">
  <div class="wrapper-padded">
    <div class="wrapper-padded-more">
      <div class="padder bg-7-color">
        <form action="<?php echo $ricerca_url; ?>?" method="get" id="search_form">
          <div class="search-fields-archive form-hold">


              <div class="box-input">
                <input name="keyword" type="text" id="search-text" class="search_input" placeholder="Cerca ad esempio: nome dello spettacolo" />
              </div>

              <div class="search-fields-module-left">
                <span class="cta-1">Filtra: </span>
                <label><input type="checkbox" name="tipo-di-spettacolo[]" value="cartellone" />Cartellone</label>
                <label><input type="checkbox" name="tipo-di-spettacolo[]" value="tournee" />Tourneé</label>
                <label><input type="checkbox" name="tipo-di-spettacolo[]" value="produzioni" />Produzione</label>
                <?php include( locate_template ( 'template-parts/dropdowns/drop-stagioni.php' ) ); ?>
                <?php //include( locate_template ( 'template-parts/dropdowns/drop-eventi.php' ) ); ?>
              </div>

              <div class="search-fields-module-right">
                <input type="hidden" id="stagione" name="stagione" value="" />
                <input type="hidden" id="area_attivita" name="tipo-di-evento" value="" />
                <input type="submit" class="search_send" value="cerca" />
              </div>
              <?php if ( $search_parameters === 'active' ) : ?>
                <div class="box-output">
                  <?php if ( get_query_var('keyword') ) : ?>
                    <span class="cta-1">Hai cercato: </span><span class="cta-2 txt-5-color"><?php echo $keyword; ?></span>
                  <?php endif; ?>
                  <?php if ( get_query_var('tipo-di-spettacolo') ) : ?>
                  <span class="cta-1">Tipo di spettacolo: </span><span class="cta-2 comma-after txt-5-color"><?php
                     for($i = 0; $i < $arrsize_tipo_di_spettacolo;$i++) {
                      $tipo_slug = $tipo_di_spettacolo[$i];
                      $spettacolo_name = get_term_by('slug', $tipo_slug, 'tipo_spettacolo'); echo '<span>' . $spettacolo_name->name . '</span>';
                     }
                     ?></span>
                  <?php endif; ?>
                  <?php if ( get_query_var('stagione') ) : ?>
                    <span class="cta-1">Stagione: </span><span class="cta-2 txt-5-color"><?php echo $stagione_name_name; ?></span>
                  <?php endif; ?>
                  <?php if ( get_query_var('tipo-di-evento') ) : ?>
                    <span class="cta-1">Tipo di evento: </span><span class="cta-2 txt-5-color"><?php echo $tipo_di_evento_name_name; ?></span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>


          </div>
        </form>
      </div>
    </div>
  </div>
</div>
