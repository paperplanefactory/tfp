<div class="post_gallery">
<!-- "prev page" action -->
<div id="slide_left_att" class="icon-slide-left prev">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide_left_dark.svg" alt="Appuntamenti precedenti" onerror="this.onerror=null; this.src='<?php bloginfo('stylesheet_directory'); ?>/images/slide_left_dark.png'" />
</div>
<!-- "next page" action -->
<div id="slide_right_att" class="icon-slide-right next">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/slide_right_dark.svg" alt="Prossimi appuntamenti" onerror="this.onerror=null; this.src='<?php bloginfo('stylesheet_directory'); ?>/images/slide_right_dark.png'" />
</div>


<!-- wrapper for navigator elements -->
<!-- root element for scrollable -->
<div class="scrollable_attachments" id="scrollable_attachments">
<!-- root element for the items -->
<div class="items_attachments">
<?php
/** recupero la variabile per mobile detect */
global $detect;
while ( have_rows('immagini_slide') ) : the_row();
$immagine_slide = get_sub_field('immagine');
// smartphone
if( $detect->isMobile() && !$detect->isTablet() ) {
	$immagine_slideURL = $immagine_slide['sizes']['slide_mob'];
}
// tablet
elseif( $detect->isTablet() ) {
	$immagine_slideURL = $immagine_slide['sizes']['slide_tab'];
}
// desktop
else {
	$immagine_slideURL = $immagine_slide['sizes']['slide_desk'];
}
$immagine_lightboxURL = $immagine_slide['sizes']['large'];
?>
<div class="slider_attachment">
<div class="slider_image">
<a href="<?php echo $immagine_lightboxURL; ?>" rel="lightbox">
<img src="<?php echo $immagine_slideURL; ?>" title="<?php echo $caption = $immagine_slide['caption']; ?>" />
</a>
</div>
<div class="slider_caption">
<?php echo $caption = $immagine_slide['caption']; ?>
</div>
</div>

<?php endwhile; ?>
</div><!-- items_projects -->
</div><!-- .scrollable_attachments -->
</div><!-- .post_gallery -->