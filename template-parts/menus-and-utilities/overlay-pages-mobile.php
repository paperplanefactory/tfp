<div class="header-overlay-navi-structure-fake-right bg-7-color"></div>
<div class="scroll-opportunity overlay-navi-list">

  <div class="wrapper-padded">
    <div id="header-overlay-navi-structure">
      <div class="flex-hold-child-main-left">


        <div class="flex-hold-child">
          <div class="space">
            <h4 class="txt-1-color"><span class="expandable-overlay plus">Il Parenti</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'parenti-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color"><span class="expandable-overlay plus">Cartellone</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'programma-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color"><span class="expandable-overlay plus">Sale e Spazi</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'salespazi-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color"><span class="expandable-overlay plus">Notizie dal Parenti</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'notizie-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color"><span class="expandable-overlay plus">Info e Biglietteria</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'infobliglietteria-menu' ) ); ?>
            </div>
            <br />
            <h4 class="txt-1-color noblack"><span class="expandable-overlay plus">Tournée e Distribuzione</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'produzioni-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color noblack"><span class="expandable-overlay plus">Formazione</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'formazione-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color noblack"><span class="expandable-overlay plus">Entra nella community</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'community-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color noblack"><span class="expandable-overlay plus">Per le aziende</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'sostieni-menu' ) ); ?>
            </div>
            <h4 class="txt-1-color noblack"><span class="expandable-overlay plus">Area Stampa</span></h4>
            <div class="expandable-content-overlay">
              <?php wp_nav_menu( array( 'theme_location' => 'areapress-menu' ) ); ?>
            </div>
            <br />
            <div class="">
              <div class="space">
                <a href="<?php the_field("url_calendario", "option"); ?>" class="btn-fill-hover red cta-4 allupper"><?php the_field("cta_calendario", "option"); ?></a>
                <a href="<?php the_field("link_biglietti_online", "option"); ?>" target="_blank" class="btn-fill red cta-4 allupper last"><?php the_field("cta_biglietti_online", "option"); ?></a>
                <a href="<?php the_field("carrello_sro", "option"); ?>" target="_blank" class="basket-selector basket-icon btn-fill red" onClick="_gaq.push(['_trackEvent', 'direct_tickets_header_button', 'click', '<?php the_title(); ?>', '0']);"></a>
              </div>
              <div class="search-hold">
                <form action="/risultati-ricerca/" method="post" class="search-check">
                  <input name="keyword" type="text" placeholder="Cerca" class="search-lenght-check" />
                  <input type="submit" value="" />
                </form>
                <div class="search-lenght-message cta-4 pad-top-2 txt-1-color">
                  Per favore digita una parola di almeno 4 lettere.
                </div>
              </div>
            </div>
          </div>
        </div>


        </div>
        <div class="flex-hold-child-main-right">
          <div class="space">
            <?php include( locate_template ( 'template-parts/banners/modulo-banner-header-footer.php' ) ); ?>
            <?php dynamic_sidebar( 'header-links' ); ?>
            <?php dynamic_sidebar( 'header-newsletter' ); ?>
            <div class="cta-1">Social</div>
            <a href="https://www.facebook.com/teatrofrancoparenti" target="_blank" class="overlay-social social-fb"></a>
            <a href="https://twitter.com/teatrofparenti" target="_blank" class="overlay-social social-tw"></a>
            <a href="https://www.youtube.com/user/teatrofrancoparenti" target="_blank" class="overlay-social social-yt"></a>
            <a href="https://www.instagram.com/teatrofrancoparenti/" target="_blank" class="overlay-social social-in"></a>
            <a href="https://www.yelp.it/biz/teatro-franco-parenti-milano" target="_blank" class="overlay-social social-ye"></a>
            <a href="https://www.tripadvisor.it/Attraction_Review-g187849-d2079944-Reviews-Teatro_Franco_Parenti-Milan_Lombardy.html" target="_blank" class="overlay-social social-tr"></a>
            <div class="clearer"></div>
          </div>
          <div class="space spaceline">
            <div class="cta-1 txt-4-color">
              Teatro di Rilevante Interesse Culturale fondato nel 1972
            </div>

            <div class="h5-box links-area txt-1-color">
              <a href="http://fondazionepierlombardo.com/" target="_blank">Fondazione Pier Lombardo</a><br />
              <a href="/associazione-pier-lombardo/" class="wh blocky">Associazione Pier Lombardo</a>
            </div>
          </div>


        </div>
        </div>
        </div>
        </div>

        </div>
