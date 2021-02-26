<div class="modulo-frase-evidenza">
  <div class="cat-stripe bg-1-color"></div>
  <div class="padder">
    <h4><?php the_sub_field('frase_evidenza'); ?></h4>
    <?php if( get_sub_field('firma_frase_evidenza') ) : ?>
      <div class="cta-2 txt-5-color">
        <?php the_sub_field('firma_frase_evidenza'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
