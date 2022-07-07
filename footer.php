<?php
/**
 * The template for displaying the footer.
 */

wp_reset_query();
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
$mostrare_player = get_field('mostrare_player', 'option');
if( $mostrare_player == 1 ) {
  $footer_class = 'with-player';
}
else {
  $footer_class = '';
}
?>
<?php if( !is_singular( 'lp' ) ) : ?>
  <div id="footer" class="z-index-trick <?php echo $footer_class; ?>">
    <div class="wrapper bg-4-color txt-2-color pad-top-2 pad-bottom-2">
      <div class="wrapper-padded">
        <div class="flex-hold flex-hold-2-bis cta-1">
          <div class="flex-hold-child flex-hold-child-l">
            Teatro di Rilevante Interesse Culturale fondato e diretto dal 1972 da Andrée Ruth Shammah
          </div>
          <div class="flex-hold-child flex-hold-child-r alignright">
            <!--<h5 class="txt-2-color"><a href="https://fondazionepierlombardo.com/" target="_blank" class="wh blocky">Fondazione Pier Lombardo</a> &nbsp; &nbsp; &nbsp;--><a href="/associazione-pier-lombardo/" class="wh blocky">Associazione Pier Lombardo</a></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="wrapper bg-1-color txt-2-color pad-top-2 pad-bottom-2">
      <div class="wrapper-padded">
        <div class="fiftyfifty-grid cta-1">
          <div class="fiftyfifty-grid-module-left">
            <a href="https://www.facebook.com/teatrofrancoparenti" target="_blank" class="overlay-social-white social-fb"></a>
            <a href="https://twitter.com/teatrofparenti" target="_blank" class="overlay-social-white social-tw"></a>
            <a href="https://www.youtube.com/user/teatrofrancoparenti" target="_blank" class="overlay-social-white social-yt"></a>
            <a href="https://www.instagram.com/teatrofrancoparenti/" target="_blank" class="overlay-social-white social-in"></a>
            <a href="https://www.yelp.it/biz/teatro-franco-parenti-milano" target="_blank" class="overlay-social-white social-ye"></a>
            <a href="https://www.tripadvisor.it/Attraction_Review-g187849-d2079944-Reviews-Teatro_Franco_Parenti-Milan_Lombardy.html" target="_blank" class="overlay-social-white social-tr"></a>
          </div>
          <div class="fiftyfifty-grid-module-right cta-1">
            Restiamo in contatto &nbsp; &nbsp; &nbsp;<a href="<?php the_field("link_newsletter", "option"); ?>" target="_blank" class="btn-fill-hover white cta-4 allupper"><?php the_field("cta_newsletter", "option"); ?></a>
          </div>
        </div>
      </div>
    </div>


    <div class="wrapper cta-1 pad-top-2 bg-2-color">
      <div class="wrapper-padded">
        <div class="def-grid-nine">
          <?php if( have_rows('blocco_tipologia_sponsor', 'option') ) : while ( have_rows('blocco_tipologia_sponsor', 'option') ) : the_row();
          $logo_sponsors = get_sub_field('logo_sponsor', 'option');
            if ( $isMobile == 1 ) {
              $logo_sponsor_URL = $logo_sponsors['sizes']['logo_opt_mob'];
            }
            if ( $isTablet == 1 ) {
              $logo_sponsor_URL = $logo_sponsors['sizes']['logo_opt'];
            }
            if ( $isDesktop == 1 ) {
              $logo_sponsor_URL = $logo_sponsors['sizes']['logo_opt'];
            }
          ?>
            <div class="def-grid-module pad-top-1">
              <?php if( get_sub_field('etichetta_sponsor') ) : ?>
                <div class="block-title-abs cta-1">
                  <?php the_sub_field('etichetta_sponsor'); ?>
                </div>
                <div class="block-title">
                  &nbsp;
                </div>
              <?php else : ?>
                <div class="block-title">
                  &nbsp;
                </div>
              <?php endif; ?>
                    <a href="<?php the_sub_field('url_sponsor'); ?>" target="_blank">
                      <img class="lazy" data-original="<?php echo $logo_sponsors['sizes'][ 'full_desk' ]; ?>" />
                    </a>
                    </div>
          <?php endwhile; endif; ?>

        </div>
      </div>
    </div>















    <div class="wrapper bg-7-color">
      <div class="footer-navi-list">
        <div class="wrapper-padded">
          <div id="footer-overlay-navi-structure" class="no-mobile">
            <div class="flex-hold-child">
              <div class="space">
                <div class="cta-1 txt-1-color">Il Parenti</div>
                <?php wp_nav_menu( array( 'theme_location' => 'parenti-menu' ) ); ?>
                <div class="cta-1 txt-1-color">Produzioni</div>
                <?php wp_nav_menu( array( 'theme_location' => 'produzioni-menu' ) ); ?>
                <div class="cta-1 txt-1-color">Entra nella community</div>
                <?php wp_nav_menu( array( 'theme_location' => 'community-menu' ) ); ?>
              </div>
            </div>

            <div class="flex-hold-child">
              <div class="space">
                <div class="cta-1 txt-1-color">Programma</div>
                <?php wp_nav_menu( array( 'theme_location' => 'programma-menu' ) ); ?>
                <div class="cta-1 txt-1-color">Formazione</div>
                <?php wp_nav_menu( array( 'theme_location' => 'formazione-menu' ) ); ?>
              </div>
            </div>

            <div class="flex-hold-child">
              <div class="space">
                <div class="cta-1 txt-1-color">Sale e Spazi</div>
                <?php wp_nav_menu( array( 'theme_location' => 'salespazi-menu' ) ); ?>
                <div class="cta-1 txt-1-color">Per le aziende</div>
                <?php wp_nav_menu( array( 'theme_location' => 'sostieni-menu' ) ); ?>
              </div>
            </div>

            <div class="flex-hold-child">
              <div class="space">
                <div class="cta-1 txt-1-color">Info e Biglietteria</div>
                <?php wp_nav_menu( array( 'theme_location' => 'infobliglietteria-menu' ) ); ?>
                <div class="cta-1 txt-1-color">Notizie</div>
                <?php wp_nav_menu( array( 'theme_location' => 'notizie-menu' ) ); ?>
              </div>
            </div>

            <div class="flex-hold-child">
              <div class="space">
                <div class="cta-1 txt-1-color">Area Stampa</div>
                <?php wp_nav_menu( array( 'theme_location' => 'areapress-menu' ) ); ?>
              </div>
            </div>
            <?php
            if ( $isMobile == 1 || $isTablet == 1 ) : ?>
          <?php else : ?>
            <div class="flex-hold-child">
              <div class="space">
                <?php include( locate_template ( 'template-parts/banners/modulo-banner-header-footer.php' ) ); ?>
              </div>
            </div>
          <?php endif; ?>



        </div>
      </div>










      <div class="wrapper pad-top-2 pad-bottom-2 bg-2-color">
        <div class="wrapper-padded">
          <div class="fiftyfifty-grid cta-2 txt-3-color">
            <div class="fiftyfifty-grid-module-left">
              <?php dynamic_sidebar( 'footer-info' ); ?>
            </div>
            <div class="fiftyfifty-grid-module-right">
              <?php the_field('privacy_e_cookie', 'option'); ?>
            </div>
          </div>
        </div>
      </div>
  </div>
<?php endif; ?>

<?php
if( $mostrare_player == 1 ) : ?>
  <div class="tfp-audio-player">
    <div class="player-grid">
      <div class="title">
        <p>
          <strong><?php the_field('titolo_audio', 'option'); ?></strong>
        </p>
      </div>
      <div class="player">
        <audio controls>
      <source src="<?php the_field('file_audio', 'option'); ?>" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php wp_footer();
?>
</body>
</html>
