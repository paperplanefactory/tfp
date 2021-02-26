<div class="modulo-espansione">
  <div class="padder">
    <?php if( get_sub_field('testo_opzionale_prima_del_titolo') ) : ?>
      <div class="content-styled">
        <?php the_sub_field('testo_opzionale_prima_del_titolo'); ?>
      </div>
    <?php endif; ?>
    <div class="cta-1">
      <a href="javascript:void(0);" class="expandable expandable-oncontent plus"><?php the_sub_field('espansione_titolo'); ?></a>
    </div>
    <div class="expandable-content expandable-hidden content-styled">
      <?php the_sub_field('espansione_contenuto'); ?>
    </div>
  </div>
</div>
