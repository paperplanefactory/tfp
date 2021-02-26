// impostazioni iniziali
var filtro;
var term_name;
var term_name_trim;
var term_slug;
var term_id;
var fascia_name;

var startTime;
//var hourToApi;
//var hourToUrl;

if ( typeof startDateToApi === 'undefined' || startDateToApi === null || startDateToApi === '' ) {
  var getDateFrom;
  getDateFrom = new Date();
}

else {
  reconvertFrom = startDateToApi.replace(/(\d\d\d\d)(\d\d)(\d\d)/g, '$2/$3/$1');
  getDateFrom = new Date(reconvertFrom);
}


timeInterval = 7;
$('.one-week').click(function(){
  $(this).addClass('current-filter');
  $('.one-month').removeClass('current-filter');
  getDateFrom.setDate(getDateFrom.getDate() - 30);
  timeInterval = 7;
  startDateConverter();
  endDateConverter();
});
$('.one-month').click(function(){
  $(this).addClass('current-filter');
  $('.one-week').removeClass('current-filter');
  getDateFrom.setDate(getDateFrom.getDate() - 7);
  timeInterval = 30;
  startDateConverter();
  endDateConverter();
});
$('.one-week-more').click(function(){
  startDateConverter();
  endDateConverter();
  $("html, body").animate({ scrollTop: 0 }, 200);
});

$('.one-week-less').click(function(){
  getDateFrom.setDate(getDateFrom.getDate() - (timeInterval*2));
  startDateConverter();
  endDateConverter();
  $("html, body").animate({ scrollTop: 0 }, 200);
});


function findStartDayAndMonth() {
  dayFromName = dayFrom.replace(/^0+/, "");
  if ( monthFrom == 1 ) {
    monthFromName = "Gennaio";
  }
  else if ( monthFrom == 2 ) {
    monthFromName = "Febbraio";
  }
  else if ( monthFrom == 3 ) {
    monthFromName = "Marzo";
  }
  else if ( monthFrom == 4 ) {
    monthFromName = "Aprile";
  }
  else if ( monthFrom == 5 ) {
    monthFromName = "Maggio";
  }
  else if ( monthFrom == 6 ) {
    monthFromName = "Giugno";
  }
  else if ( monthFrom == 7 ) {
    monthFromName = "Luglio";
  }
  else if ( monthFrom == 8 ) {
    monthFromName = "Agosto";
  }
  else if ( monthFrom == 9 ) {
    monthFromName = "Settembre";
  }
  else if ( monthFrom == 10 ) {
    monthFromName = "Ottobre";
  }
  else if ( monthFrom == 11 ) {
    monthFromName = "Novembre";
  }
  else if ( monthFrom == 12 ) {
    monthFromName = "Dicembre";
  }
}

function findEndDayAndMonth() {
  dayToName = dayTo.replace(/^0+/, "");
  if ( monthTo == 1 ) {
    monthToName = "Gennaio";
  }
  else if ( monthTo == 2 ) {
    monthToName = "Febbraio";
  }
  else if ( monthTo == 3 ) {
    monthToName = "Marzo";
  }
  else if ( monthTo == 4 ) {
    monthToName = "Aprile";
  }
  else if ( monthTo == 5 ) {
    monthToName = "Maggio";
  }
  else if ( monthTo == 6 ) {
    monthToName = "Giugno";
  }
  else if ( monthTo == 7 ) {
    monthToName = "Luglio";
  }
  else if ( monthTo == 8 ) {
    monthToName = "Agosto";
  }
  else if ( monthTo == 9 ) {
    monthToName = "Settembre";
  }
  else if ( monthTo == 10 ) {
    monthToName = "Ottobre";
  }
  else if ( monthTo == 11 ) {
    monthToName = "Novembre";
  }
  else if ( monthTo == 12 ) {
    monthToName = "Dicembre";
  }
}

function startDateConverter() {
  // recupero l'anno
  yrFrom = getDateFrom.getFullYear(),
  // recupero il mese
  monthFrom = ("0" + (getDateFrom.getMonth() + 1)).slice(-2),
  // recupero il giorno
  dayFrom = ("0" + getDateFrom.getDate()).slice(-2),
  // creo la data per le api
  startDateToApi = yrFrom + '' + monthFrom + '' + dayFrom;
}


function endDateConverter() {
  getDateTo = getDateFrom;
  getDateTo.setDate(getDateFrom.getDate() + timeInterval);
  // recupero l'anno
  yrTo = getDateTo.getFullYear(),
  // recupero il mese
  monthTo = ("0" + (getDateTo.getMonth() + 1)).slice(-2),
  // recupero il giorno
  dayTo = ("0" + getDateTo.getDate()).slice(-2),
  // creo la data per le api
  endDateToApi = yrTo + '' + monthTo + '' + dayTo;
  findStartDayAndMonth();
  findEndDayAndMonth();
  if ( monthFromName === monthToName ) {
    $('.datepicker-from, .datepicker-to').val(dayFromName + " - " + dayToName +" "+ monthToName  );
  }
  else {
    $('.datepicker-from, .datepicker-to').val(dayFromName +" "+ monthFromName + " - " + dayToName +" "+ monthToName );
  }
  filter_posts_button();

}
startDateConverter();
endDateConverter();


$('.datepicker-from').datepicker({
  language: 'en',
  dateFormat: 'd MM',
  todayButton: false,
  clearButton: false,
  autoClose: true,
  inline: false,
  onSelect: function onSelect(fd, date) {
    getDateFrom = new Date(date),
    startDateConverter();
    endDateConverter();
  }
});



// gestisco la tendina tipi di evento
$('.this-voice').click(function(){
  filtro =  $(this).attr('aria-label-drop-filtro');
  term_name =  $(this).attr('aria-label-term-name');
  fascia_name =  $(this).attr('aria-label-term-name');
  hourToUrl = $(this).attr('aria-label-term-daypart');
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
  if ( filtro === 'fascia-oraria' ) {
    $('.fake-select-4').fadeIn(10);
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
  if ( filtro === 'tipo-evento' ) {
    $('.top-opener-2-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-2 .top-opener-2-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.filter-voice').addClass('eraser');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
    $('.top-opener-4-txt-replace').html("Qualsiasi orario").removeClass('txt-3-color');
  }
  if ( filtro === 'tipo-evento-remover' ) {
    $('.top-opener-2-txt-replace').html(term_name_trim).removeClass('txt-3-color');
    $('.fake-select-2 .top-opener-2-txt-replace').html(term_name).removeClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-2 .filter-voice').removeClass('eraser');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
    $('.top-opener-4-txt-replace').html("Qualsiasi orario").removeClass('txt-3-color');
  }
  if ( filtro === 'percorsi' ) {
    $('.top-opener-1-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-1 .top-opener-1-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.fake-select-1 .filter-voice').addClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
    $('.top-opener-4-txt-replace').html("Qualsiasi orario").removeClass('txt-3-color');
  }
  if ( filtro === 'percorsi-remover' ) {
    $('.top-opener-1-txt-replace').html(term_name_trim).removeClass('txt-3-color');
    $('.fake-select-1 .top-opener-1-txt-replace').html(term_name).removeClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-1 .filter-voice').removeClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
    $('.top-opener-4-txt-replace').html("Qualsiasi orario").removeClass('txt-3-color');
  }
  if ( filtro === 'abbonamenti' ) {
    $('.top-opener-3-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-3 .top-opener-3-txt-replace').html(term_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.fake-select-3 .filter-voice').addClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-4-txt-replace').html("Qualsiasi orario").removeClass('txt-3-color');
  }
  if ( filtro === 'abbonamenti-remover' ) {
    $('.top-opener-3-txt-replace').html(term_name_trim).addClass('txt-3-color');
    $('.fake-select-3 .top-opener-3-txt-replace').html(term_name).removeClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-3 .filter-voice').removeClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-4-txt-replace').html("Qualsiasi orario").removeClass('txt-3-color');
  }
  if ( filtro === 'fascia-oraria' ) {
    $('.top-opener-4-txt-replace').html(fascia_name).addClass('txt-3-color');
    $('.fake-select-4 .top-opener-3-txt-replace').html(fascia_name).addClass('txt-3-color');
    $('.this-voice').show();
    $('#turn-off-'+term_id).hide();
    $('.fake-select-4 .filter-voice').addClass('eraser');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
  }
  if ( filtro === 'fascia-oraria-remover' ) {
    $('.top-opener-4-txt-replace').html('Qualsiasi orario').removeClass('txt-3-color');
    $('.fake-select-4 .top-opener-3-txt-replace').html('Qualsiasi orario').removeClass('txt-3-color');
    $('.this-voice').show();
    $('.fake-select-4 .filter-voice').removeClass('eraser');
    $('.top-opener-2-txt-replace').html("Tipo di evento").removeClass('txt-3-color');
    $('.top-opener-1-txt-replace').html("Percorsi").removeClass('txt-3-color');
    $('.top-opener-3-txt-replace').html("Abbonamenti").removeClass('txt-3-color');
  }
}


// filtro attivato dai menu a tendina
function filter_posts_button() {
  $('html').css('overflowY', 'scroll');
  $('body').removeClass('occupy-scrollbar');
  $('.modal-set').fadeOut(10);
  $('.top-open').fadeOut(10);
  $('.disableable').addClass('no-more-requests');

  if (hourToUrl === "giornata") {
    hourToApi = '00:00:01';
    time_interval = "from";
    term_id = '';
  }
  if (hourToUrl === "mattino") {
    hourToApi = '13:00:00';
    time_interval = "to";
    term_id = '';
  }
  if (hourToUrl === "pomeriggio") {
    hourToApi = '20:00:00';
    time_interval = "to";
    term_id = '';
  }
  if (hourToUrl === "sera") {
    hourToApi = '20:00:01';
    time_interval = "from";
    term_id = '';
  }
  if ( typeof hourToUrl === 'undefined' || hourToUrl === null || hourToUrl === '' ) {
    hourToApi = '00:00:01';
    time_interval = "from";
    hourToUrl = "giornata";
  }

  if ( typeof term_slug === 'undefined' || term_slug === null || term_slug === '' ) {
    term_slug = "-";
  }


  window.history.pushState("object or string", "Title", "/calendario-spettacoli/"+startDateToApi+""+endDateToApi+"/"+hourToUrl+"/"+term_slug+"/");
  $('.disableable').addClass('no-more-requests');
  $( "#loading" ).fadeIn(300);
  $( "#result" ).fadeOut(300);
  $( "#result" ).load( "/app/wp-admin/admin-ajax.php?action=api&v=snippet&api=calendario&from="+startDateToApi+"&to="+endDateToApi+"&time="+hourToApi+"&time_interval="+time_interval+"&taxonomies="+term_id+"&date_not_defined=true&source="+here+"&hourToUrl=ii", function( response, status, xhr ) {
    if ( status == "error" ) {
      var msg = "Sorry but there was an error: ";
      $( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
    }
    else {
      $( "#loading" ).fadeOut(300);
      $( "#result" ).fadeIn(300);
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




// faccio la chiamata iniziale
$(document).ready(function() {
  get_and_compile_dropdown();
});
