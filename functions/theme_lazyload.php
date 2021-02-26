<?php
function footer_lazyload() {
    echo '
    <script type="text/javascript">
    (function($){
      $("img.lazymage, img.lazy, div.lazy, li.lazy").lazyload({
      effect : "fadeIn",
      load : function() {
        $(".lazy-placehoder").fadeOut(150);
      }
      });
    })(jQuery);
    </script>
';
}
add_action('wp_footer', 'footer_lazyload');

function filter_lazyload($content) {
    return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'preg_lazyload', $content);
}
add_filter('the_content', 'filter_lazyload');


function preg_lazyload($img_match) {

    $img_replace = $img_match[1] . 'src="' . get_stylesheet_directory_uri() . '/images/lazy-load/preload_static.gif" data-original' . substr($img_match[2], 3) . $img_match[3];

    $img_replace = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $img_replace);

    $img_replace .= '<noscript>' . $img_match[0] . '</noscript>';
    return $img_replace;
}


function filter_lazyloadcf($content) {
    return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'preg_lazyloadcf', $content);
}
add_filter('acf_the_content', 'filter_lazyloadcf');


function preg_lazyloadcf($img_match) {

    $img_replace = $img_match[1] . 'src="' . get_stylesheet_directory_uri() . '/images/lazy-load/preload_static.gif" data-original' . substr($img_match[2], 3) . $img_match[3];

    $img_replace = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $img_replace);

    $img_replace .= '<noscript>' . $img_match[0] . '</noscript>';
    return $img_replace;
}
