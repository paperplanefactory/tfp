<div class="modulo-frase-evidenza-piccola bg-7-color">
  <div class="padder">
    <h6><?php the_sub_field('frase_evidenza_piccola'); ?></h6>
    <?php if( get_sub_field('firma_frase_evidenza_piccola') ) : ?>
      <div class="cta-2 txt-5-color">
        <?php the_sub_field('firma_frase_evidenza_piccola'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
