<?php
// Paperplane _blankTheme - template per header.
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#D10019">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#D10019">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#D10019">
<?php wp_head();
// stabilisco il device
global $isMobile;
global $isTablet;
global $isDesktop;
// oggi
global $today;
global $today_as_acf;
global $todaystamp;
$today = date('d/m/Y');
$today_as_acf = date('Ymd');
$todaystamp = strtotime(str_replace("/", "-", $today));
?>

<html xmlns:esro=https://toptix.com>
<script src="https://tickets.teatrofrancoparenti.it/iframe/esrojsapi.js" type="text/javascript"></script>
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/favicon-16x16.png">
<meta name="msapplication-TileImage" content="<?php bloginfo('stylesheet_directory'); ?>/images/favicon/ms-icon-144x144.png">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7586VD');</script>
<!-- End Google Tag Manager -->
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTMN7586VD"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <?php if( !is_singular( 'lp' ) ) : ?>

    <div id="preheader"></div>
    <div id="just-check-head-height">
      <div class="modal-set"></div>
      <?php include( locate_template ( 'template-parts/menus-and-utilities/avvisi-importanti.php' ) ); ?>
      <?php include( locate_template ( 'template-parts/menus-and-utilities/pop-up.php' ) ); ?>
      <div id="header-expanded" class="bg-2-color">
        <div class="wrapper-padded">
          <div id="header-structure">
            <div class="hamburger hamburger bg-2-color">
              <div class="hamburger-label cta-1 allupper ham-activator">menu</div>
              <button class="nav-icon3 ham-activator" title="Apri / chiudi menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
            <div class="logo">
              <a href="<?php echo home_url(); ?>" rel="bookmark" title="Teatro Franco Parenti - Homepage">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-teatro-franco-parenti.svg" onerror="this.onerror=null; this.src='<?php bloginfo('stylesheet_directory'); ?>/images/logo-teatro-franco-parenti.png'" alt="Teatro Franco Parenti - Homepage" />
              </a>
            </div>
            <div class="sub-navi">
              <a href="#" class="search-icon search-activator" title="Apri / chiudi pannello di ricerca"></a>
              <!--
              <a href="<?php the_field("url_calendario", "option"); ?>" class="btn-fill-hover red cta-4 allupper"><?php the_field("cta_calendario", "option"); ?></a>
            -->
              <a href="<?php the_field("link_biglietti_online", "option"); ?>" target="_self" class="btn-fill red cta-4 allupper last ticketed" onClick="_gaq.push(['_trackEvent', 'tickets_header_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field("cta_biglietti_online", "option"); ?></a>
              <a href="<?php the_field("carrello_sro", "option"); ?>" target="_self" class="basket-selector basket-icon btn-fill red last" onClick="_gaq.push(['_trackEvent', 'direct_tickets_header_button', 'click', '<?php the_title(); ?>', '0']);"><span class="tickets-counter"></span></a>
            </div>
            <div class="menu-main">
              <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
            </div>
          </div>
        </div>
      </div>

      <div id="header" class="hide-my-head bg-2-color">
        <div class="wrapper-padded">
          <div id="header-structure">
            <div class="hamburger hamburger bg-2-color">
              <div class="hamburger-label cta-1 allupper ham-activator">menu</div>
              <button class="nav-icon3 ham-activator" title="Apri / chiudi menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
            <div class="logo">
              <a href="<?php echo home_url(); ?>" rel="bookmark" title="Teatro Franco Parenti - Homepage">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-teatro-franco-parenti.svg" onerror="this.onerror=null; this.src='<?php bloginfo('stylesheet_directory'); ?>/images/logo-teatro-franco-parenti.png'" alt="Teatro Franco Parenti - Homepage" />
              </a>
            </div>
            <div class="menu-main">
              <?php wp_nav_menu( array( 'theme_location' => 'header-compact-menu' ) ); ?>
            </div>
            <div class="navi-icons">
              <!--
              <a href="<?php the_field("url_calendario", "option"); ?>" class="icon-button calendar"></a>
            -->
              <a href="<?php the_field("link_biglietti_online", "option"); ?>" target="_self" class="icon-button tickets"  onClick="_gaq.push(['_trackEvent', 'tickets_header_button_mobile', 'click', '<?php the_title(); ?>', '0']);"></a>
              <a href="tel:<?php the_field("numero_telefono_diretto", "option"); ?>" class="icon-button phone"></a>
              <a href="<?php the_field("carrello_sro", "option"); ?>" target="_self" class="icon-button basket-selector basket-icon" onClick="_gaq.push(['_trackEvent', 'direct_tickets_header_button', 'click', '<?php the_title(); ?>', '0']);"><span class="tickets-counter"></span></a>
            </div>
            <div class="sub-navi">
              <a href="javascript:void(0);" class="search-icon search-activator" title="Apri / chiudi pannello di ricerca"></a>
              <!--
              <a href="<?php the_field("url_calendario", "option"); ?>" class="btn-fill-hover red cta-4 allupper"><?php the_field("cta_calendario", "option"); ?></a>
              -->
              <a href="<?php the_field("link_biglietti_online", "option"); ?>" target="_self" class="btn-fill red cta-4 allupper last ticketed" onClick="_gaq.push(['_trackEvent', 'tickets_header_button', 'click', '<?php the_title(); ?>', '0']);"><?php the_field("cta_biglietti_online", "option"); ?></a>
              <a href="<?php the_field("carrello_sro", "option"); ?>" target="_self" class="basket-selector basket-icon btn-fill red last" onClick="_gaq.push(['_trackEvent', 'direct_tickets_header_button', 'click', '<?php the_title(); ?>', '0']);"><span class="tickets-counter"></span></a>
            </div>
          </div>
        </div>
      </div>

      <div id="header-overlay" class="bg-2-color">
        <div class="wrapper bg-2-color fake-my-z">
          <div class="wrapper-padded">
            <div id="header-structure">
              <div class="hamburger">
                <div class="hamburger-label cta-1 allupper ham-activator">chiudi</div>
                <button class="nav-icon3 ham-activator" title="Apri / chiudi menu">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
              </div>
              <div class="logo">
                <a href="<?php echo home_url(); ?>" rel="bookmark" title="Teatro Franco Parenti - Homepage">
                  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-teatro-franco-parenti.svg" onerror="this.onerror=null; this.src='<?php bloginfo('stylesheet_directory'); ?>/images/logo-teatro-franco-parenti.png'" alt="Teatro Franco Parenti - Homepage" />
                </a>
              </div>
              <div class="navi-icons">
                <a href="<?php the_field("url_calendario", "option"); ?>" class="icon-button calendar"></a>
                <a href="<?php the_field("link_biglietti_online", "option"); ?>" target="_self" class="icon-button tickets"></a>
                <a href="tel:<?php the_field("numero_telefono_diretto", "option"); ?>" class="icon-button phone"></a>
              </div>
              <div class="sub-navi">
                <a href="javascript:void(0);" class="search-icon search-activator" title="Apri / chiudi pannello di ricerca"></a>
                <a href="<?php the_field("url_calendario", "option"); ?>" class="btn-fill-hover red cta-4 allupper"><?php the_field("cta_calendario", "option"); ?></a>
                <a href="<?php the_field("link_biglietti_online", "option"); ?>" target="_self" class="btn-fill red cta-4 allupper last"><?php the_field("cta_biglietti_online", "option"); ?></a>
              </div>
            </div>
          </div>
        </div>
          <?php
          if ( $isMobile == 1 ) {
            include( locate_template ( 'template-parts/menus-and-utilities/overlay-pages-mobile.php' ) );
          }
          if ( $isTablet == 1 ) {
            include( locate_template ( 'template-parts/menus-and-utilities/overlay-pages-tablet.php' ) );
          }
          if ( $isDesktop == 1 ) {
            include( locate_template ( 'template-parts/menus-and-utilities/overlay-pages.php' ) );
          }
          ?>




      <div id="header-search">
        <div class="wrapper-padded">
          <div class="pad-top-3 pad-bottom-3">
            <div class="search-hold">
              <form action="/risultati-ricerca/" method="post" class="search-check">
                <input name="keyword" type="text" placeholder="Cerca" class="search-lenght-check" />
                <input type="submit" value="" />
              </form>
              <div class="search-lenght-message cta-4 pad-top-2 txt-1-color">
                Per favore digita una parola di almeno 4 lettere.
              </div>
              <button class="nav-icon-search search-activator" title="Chiudi menu"></button>
            </div>
          </div>
        </div>
      </div>

      <div id="sub-header-global">
        <div class="wrapper-padded">
          <div class="pad-top-1">
            <div class="menu-main-mobile">
              <?php wp_nav_menu( array( 'theme_location' => 'header-menu-mobile', 'menu_class' => 'menu-magic-menu-mobile' ) ); ?>
            </div>
            <script>
              function adjustMenu() {
                subMenuWidth = 0;
                $(".menu-magic-menu-mobile li").each(function(index) {
                  subMenuWidth += parseInt($(this).width(), 10);
                });
                $(".menu-magic-menu-mobile").css("width", subMenuWidth + 260);
                $(".menu-main-mobile").fadeTo( 100, 1 );
                console.log(subMenuWidth);
              }
              adjustMenu();
              $( window ).resize(function() {
          			adjustMenu();
          		});


            </script>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
