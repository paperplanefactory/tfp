<div class="top-opener pointerize top-select txt-5-color">
  <span class="top-opener-1 top-opener-txt-replace fake-hover">Anni</span>
  <div class="fake-select fake-select-1 top-open">
    <?php
    $args_top = array(
      'post_type' => 'spettacolo_archivio',
      'parent' => 0
    );
    $terms_top = get_terms( 'stagione', $args_top );
    if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ) {
      echo '<ul>';
      echo '<li id="Anni" class="first-voice-sub this-voice fake-hover" value="'.$term->slug.'">Anni</li>';
      foreach ( $terms_top as $term ) {
        $sugg = $term->slug;
        echo '<li id="'.$term->name.'" class="'.$term->slug.' this-voice fake-hover" value="'.$term->slug.'">' . $term->name . '</li>';
        { ?>
          <script>
          $(document).ready(function() {
            $('.<?php echo $term->slug; ?>').click(function(){
              var to_subb = $(this).attr('id');
              var to_input = $(this).attr('value');
               $('.top-opener-txt-replace').html(to_subb);
               $('.sub-opener').hide();
               $('#stagione').val(to_input);
               $('#sub-opener-<?php echo $term->slug; ?>').fadeTo( 10, 1 );
             });
           });
           </script>
           <?php }
         }
         { ?>
           <script>
           $(document).ready(function() {
              $('.first-voice-sub').click(function(){
                var to_subb = $(this).attr('id');
                var to_input = $(this).attr('id');
                $('.top-opener-txt-replace').html(to_subb);
                $('.sub-opener-box').hide();
                $('#stagione').val("");
                //$('.sub-opener').fadeTo( 150, 0 );
              });
            });
            </script>
            <?php }
         echo '</ul>';
         }
         ?>
       </div>
     </div>







    <?php
    $args_top = array(
      'post_type' => 'spettacolo_archivio',
      'parent' => 0
    );
    $terms_top = get_terms( 'stagione', $args_top );
     if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ){
        $tenda_count = 0;
         foreach ( $terms_top as $term ) {
           $tenda_count ++;
           echo '<div id="sub-opener-'.$term->slug.'" class="top-opener sub-opener sub-opener-box pointerize top-select txt-5-color">';
           echo '<span class="top-opener-'.$term->slug.' sub-opener-txt-replace-'.$tenda_count.' fake-hover">Stagione</span>';
           $args_sub = array(
             'post_type' => 'spettacolo_archivio',
             'hierarchical'=> 1,
             'parent' => $term->term_id
           );
           $terms_sub = get_terms( 'stagione', $args_sub );
            if ( ! empty( $terms_sub ) && ! is_wp_error( $terms_sub ) ){
                echo '<div class="fake-select fake-select-'.$term->slug.' top-open">';
                echo '<ul>';
                echo '<li id="Stagione" class="first-voice this-voice fake-hover" value="'.$term->slug.'">Stagione</li>';
                foreach ( $terms_sub as $term_sub ) {
                  echo '<li id="'.$term_sub->name.'" class="'.$term_sub->slug.' this-voice fake-hover" value="'.$term_sub->slug.'">' . $term_sub->name . '</li>';
                  { ?>
                  <script>
                  $(document).ready(function() {
                    $('.<?php echo $term_sub->slug; ?>').click(function(){
                      var to_subb_subb = $(this).attr('id');
                      var to_subb_subb_input = $(this).attr('value');
                      $('.sub-opener-txt-replace-<?php echo $tenda_count; ?>').html(to_subb_subb);
                      $('.fake-select-<?php echo $term->slug; ?>').hide();
                      $('#sub-opener-<?php echo $term->slug; ?>').fadeTo( 10, 1 );
                      $('#stagione').val(to_subb_subb_input);
                    });
                      $('.first-voice').click(function(){
                        var to_subb_subb = $(this).attr('id');
                        $('.sub-opener-txt-replace-<?php echo $tenda_count; ?>').html(to_subb_subb);
                        $('.sub-opener').hide();
                        $('#sub-opener-<?php echo $term->slug; ?>').fadeTo( 10, 1 );
                        $('#stagione').val("");

                      });
                  });
                  </script>
                  <?php }
                }
                echo '</ul></div>';
            }
             echo '</div>';
             { ?>
             <script>
             $(document).ready(function() {
             // fake modal
             $('.top-opener-<?php echo $term->slug; ?>').click(function(){
               $('html').css('overflowY', 'hidden');
               $('body').addClass('occupy-scrollbar');
               $('.modal-set').fadeIn(300);
               $('.fake-select-<?php echo $term->slug; ?>').fadeIn(10);
             });
             });
             </script>
             <?php }
         }


     }
     ?>


















     <div class="top-opener pointerize top-select txt-5-color">
       <span class="top-opener-2 top-opener-2-txt-replace fake-hover">Tipo di evento</span>
       <div class="fake-select fake-select-2 top-open">
         <?php
         $args_top = array(
           'post_type' => 'spettacolo_archivio',
           'parent' => 0,
           'orderby' => 'term_order'

         );
         $terms_top = get_terms( 'area_attivita', $args_top );
          if ( ! empty( $terms_top ) && ! is_wp_error( $terms_top ) ) {
              echo '<ul class="color-area">';
              echo '<li id="Tipo di evento" class="second-voice this-voice fake-hover" value="'.$term->slug.'">Tipo di evento</li>';
              foreach ( $terms_top as $term ) {
                $sugg = $term->slug;
                echo '<li id="'.$term->name.'" class="drop-'.$term->term_id.'-bg this-voice fake-hover" value="'.$term->slug.'">' . $term->name . '</li>';
                { ?>
                <script>
                $(document).ready(function() {
                  $('.drop-<?php echo $term->term_id; ?>-bg').click(function(){
                    var to_subb = $(this).attr('id');
                    var to_input = $(this).attr('value');

                    $('.top-opener-2-txt-replace').html(to_subb);
                    //$('.sub-opener').hide();
                    $('#area_attivita').val(to_input);
                    //$('#sub-opener-<?php echo $term->slug; ?>').fadeTo( 150, 1 );
                  });
                  $('.first-voice').click(function(){
                    var to_subb = $(this).attr('id');
                    var to_input = $(this).attr('value');
                    $('.top-opener-2-txt-replace').html(to_input);
                    //$('.sub-opener').hide();
                    $('#area_attivita').val("");
                    //$('#sub-opener-<?php echo $term->slug; ?>').fadeTo( 150, 1 );


                  });
                });
                </script>
                <?php }
              }
              echo '</ul>';
          }
          ?>
       </div>
     </div>

     <script>
     $(document).ready(function() {
       $('.sub-opener').hide();
       // fake modal
       $('.top-opener-1').click(function(){
         $('html').css('overflowY', 'hidden');
         $('body').addClass('occupy-scrollbar');
         $('.modal-set').fadeIn(10);
         $('.fake-select-1').fadeIn(10);
       });
       $('.top-opener-2').click(function(){
         $('html').css('overflowY', 'hidden');
         $('body').addClass('occupy-scrollbar');
         $('.modal-set').fadeIn(10);
         $('.fake-select-2').fadeIn(10);
       });
       $('.modal-set, .fake-select, .this-voice').click(function(){
         $('html').css('overflowY', 'scroll');
         $('body').removeClass('occupy-scrollbar');
         $('.modal-set').fadeOut(10);
         $('.fake-select').fadeOut(10);
       });
     });
     </script>
