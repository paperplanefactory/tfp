<div class="modulo-recensioni">
  <div class="padder">
    <div class="cta-1">
      Download
    </div>
    <div class="recensioni">
      <?php if( have_rows('download') ) : while ( have_rows('download') ) : the_row(); ?>
        <div class="recensione">
          <div class="padder">
            <h6><a href="<?php the_sub_field('url_download'); ?>" class="download" target="_blank"><?php the_sub_field('titolo_download'); ?></a></h6>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
