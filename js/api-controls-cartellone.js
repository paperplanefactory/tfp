var filtro;
var term_name;
var term_name_trim;
var term_slug;
var term_id;


$('.disableable').addClass('no-more-requests');
// gestisco la tendina tipi di evento
$('.this-voice').click(function(){
  filtro =  $(this).attr('aria-label-drop-filtro');
  term_name =  $(this).attr('aria-label-term-name');
  if( term_name.length > 15 ) {
    term_name_trim = term_name.substring( 0,15 ) + "...";
  }
  else {
    term_name_trim = term_name;
  }
  term_slug =  $(this).attr('aria-label-term-slug');
  term_id =  $(this).attr('aria-label-term-id');
  get_and_compile_dropdown();
});

// fake modal
$('.text-shortened').click(function(){
  filtro =  $(this).attr('aria-label-drop-filtro');
  $('html').css('overflowY', 'hidden');
  $('body').addClass('occupy-scrollbar');
  $('.modal-set').fadeIn(10);
  if ( filtro === 'tipo-evento' ) {
    $('.fake-select-2').fadeIn(10);
  }
  if ( filtro === 'percorsi' ) {
    $('.fake-select-1').fadeIn(10);
  }
  if ( filtro === 'abbonamenti' ) {
    $('.fake-select-3').fadeIn(10);
  }
});

$('.modal-set').click(function(){
  $('html').css('overflowY', 'scroll');
  $('body').removeClass('occupy-scrollbar');
  $('.modal-set').fadeOut(10);
  $('.top-open').fadeOut(10);
});

// filtro attivato dai menu a tendina
function get_and_compile_dropdown() {
  filter_posts_button();
  $('.filter-voice').removeClass('eraser');
  $( "#tax-info" ).fadeOut(300);
  $( ".abbonamenti-hide" ).slideUp(300);
  if ( filtro === 'tipo-evento' ) {
    $('.top-opener-2-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-2 .top-opener-2-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.fake-select-2 .filter-voice').addClass('eraser');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
  }
  if ( filtro === 'tipo-evento-remover' ) {
    $('.top-opener-2-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-2 .top-opener-2-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-2 .filter-voice').removeClass('eraser');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
  }
  if ( filtro === 'percorsi' ) {
    $('.top-opener-1-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-1 .top-opener-1-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.fake-select-1 .filter-voice').addClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
    show_percorsi_tax_info();
  }
  if ( filtro === 'percorsi-remover' ) {
    $('.top-opener-1-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-1 .top-opener-1-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-1 .filter-voice').removeClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
  }
  if ( filtro === 'abbonamenti' ) {
    $('.top-opener-3-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-3 .top-opener-3-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.fake-select-3 .filter-voice').addClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    show_percorsi_tax_info();
  }
  if ( filtro === 'abbonamenti-remover' ) {
    $('.top-opener-3-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-3 .top-opener-3-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-3 .filter-voice').removeClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
  }
}


// filtro attivato dai menu a tendina
function filter_posts_button() {
  $('html').css('overflowY', 'scroll');
  $('body').removeClass('occupy-scrollbar');
  $('.modal-set').fadeOut(10);
  $('.top-open').fadeOut(10);
  $('.disableable').addClass('no-more-requests');

  window.history.pushState("object or string", "Title", "/cartellone/"+term_slug+"");
  $( "#loading, #loading-past" ).fadeIn(300);
  $( ".fade-on-load" ).fadeTo( 300, 0 );
  $( "#result, #result-past, #tax-info" ).fadeOut(300);
  $( "#result" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=cartellone-program&taxonomies="+term_id+"&e_taxonomies=17", function( response, status, xhr ) {
    if ( status == "error" ) {
      var msg = "Sorry but there was an error: ";
      $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
    }
    else {
      $( "#loading" ).fadeOut(300);
      $( ".fade-on-load" ).fadeTo( 150, 1 );
      $( "#result" ).fadeIn(300);
      $('.no-more-requests').removeClass('no-more-requests');
			$("img.lazymage, img.lazy, div.lazy, li.lazy").lazyload({
      effect : "fadeIn",
      load : function() {
        $(".lazy-placehoder").fadeOut(150);
      }
      });
      $( "#result-past" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=cartellone-past&taxonomies="+term_id+"&e_taxonomies=17", function( response, status, xhr ) {
        if ( status == "error" ) {
          var msg = "Sorry but there was an error: ";
          $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
        }
        else {
          $( "#loading-past" ).fadeOut(300);
          $( "#result-past" ).fadeIn(300);
          $('.no-more-requests').removeClass('no-more-requests');
    			$("img.lazymage, img.lazy, div.lazy, li.lazy").lazyload({
          effect : "fadeIn",
          load : function() {
            $(".lazy-placehoder").fadeOut(150);
          }
          });
        }
      });
    }
  });

}

// mostro il blocco di presentazione della tassonomia percorsi
function show_percorsi_tax_info() {
  $('.disableable').addClass('no-more-requests');
  $( "#tax-info" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=percorsi&percorso="+term_id+"&e_taxonomies=17", function( response, status, xhr ) {
    if ( status == "error" ) {
      var msg = "Sorry but there was an error: ";
      $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
    }
    else {
      $('.no-more-requests').removeClass('no-more-requests');
    }
  });
  if ( filtro === 'percorsi' || filtro === 'abbonamenti' ) {
    $( "#abbonamenti-list" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=elenco-abbonamenti&percorso="+term_id+"&e_taxonomies=17", function( response, status, xhr ) {
      if ( status == "error" ) {
        var msg = "Sorry but there was an error: ";
        $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
      }
      else {
        $('.no-more-requests').removeClass('no-more-requests');
        if ( filtro === 'percorsi' ) {
          $( "#tax-info" ).fadeIn(300);
        }
        if ( filtro === 'abbonamenti' ) {
          $( "#tax-info" ).fadeIn(300);
          $( ".abbonamenti-hide" ).slideDown(300);
        }

      }
    });
  }
}




// faccio la chiamata iniziale
$(document).ready(function() {
  get_and_compile_dropdown();
  //show_percorsi_tax_info();
});
